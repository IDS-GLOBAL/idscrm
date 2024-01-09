<?php

class dwzSearch
{
	
	var $itemRecField,
	 $itemTypeField,
	 $itemOperator,
	 $itemLevel,
	 $itemForm_1,
	 $itemForm_2,

	 $host_name, 
	 $database, 
	 $user_name, 
	 $password,
	 
	 $strSQL,
	 $select_Sql,
	 $from_Sql,
	 $where_Sql,
	 $having_Sql,
	 $group_Sql,
	 $sort_Sql,
	
	 $recordset,
	 $recordset_name,
	 $nWhere,
	 $nHaving,
	 $jollyChar,
	 $theDefinedValue,
	 $theNotDefinedValue,
	 $submitName,
	 $formName;
	
	function SetformName($param){
		$this->formName = $param;
	}
		
	function SetsubmitName($param){
		$this->submitName = $param;
	}
	
	function SetRecordset(&$param, $par){
		$this->recordset = $param;
		$this->recordset_name = $par;
	}
	
	function SetSql($param){
		//$this->strSQL = $param;
		if(isset($GLOBALS['query_limit_' .$this->recordset_name])){
			$this->strSQL = $GLOBALS['query_limit_' .$this->recordset_name];
		}else{
			$this->strSQL = $param;
		}
	}
	
	function SetConnection($host, $db, $user, $pwd){
		$this->host_name = $host;
	 	$this->database = $db;
	 	$this->user_name = $user;
		$this->password = $pwd;
	}
	
	function AddFilter($sRecordFields, $sOperator, $sDynOperator, $sFormField_1, $sFormField_2, $sTypeField, $sLevel){
		
		$this->itemRecField[] = $sRecordFields;
		$this->itemTypeField[] = $sTypeField;
		if($sDynOperator != "" && isset($_REQUEST[$sDynOperator])){
			$this->itemOperator[] = $_REQUEST[$sDynOperator];
		}else{
			$this->itemOperator[] = $sOperator;
		}
		if($sOperator == ""){
			$sOperator = "=";
		}
		$this->itemLevel[] = $sLevel;
		$this->itemForm_1[] = $sFormField_1;
		$this->itemForm_2[] = $sFormField_2;				
	}
	
	function Init(){
		$this->itemRecField = array();
	 	$this->itemTypeField = array();
	 	$this->itemOperator = array();
	 	$this->itemLevel = array();
	 	$this->itemForm_1 = array();
	 	$this->itemForm_2 = array();
		
		$this->select_Sql = "";
		$this->from_Sql = "";
		$this->where_Sql = "";
		$this->having_Sql = "";
		$this->group_Sql = "";
		$this->sort_Sql = "";
		
		$this->theDefinedValue = "true";
		$this->theNotDefinedValue = "false";
		$this->jollyChar = "%";
	}	
	
	function Create(){
		
		if($this->submitName != ""){
			if(!isset($_REQUEST[$this->submitName]) || 
				(isset($_REQUEST[$this->submitName]) && $_REQUEST[$this->submitName] == "")){
				return;
			}
		}
		
		$this->SplitSql();
		
		$this->CreateForQuery();
		
		if($this->where_Sql != ""){
			if(strpos(strtolower($this->where_Sql), "where") === false){
				$this->where_Sql = " WHERE " .$this->where_Sql;
			}
		}
		
		if($this->having_Sql != ""){
			if(strpos(strtolower($this->having_Sql), "having") === false){
				$this->having_Sql = " HAVING " .$this->having_Sql;
			}
		}
					
		if(isset($_REQUEST["dwzDebug"]) && $_REQUEST["dwzDebug"] != ""){
			$this->Debug();
		}		
	}
		
	function CreateForQuery(){
		$congFilter = "";
		
		for($i=0; $i<count($this->itemOperator); $i++){
			$tmpFilter = "";
			
			switch(strtolower($this->itemOperator[$i])){
			case "all":
			case "one":
			
				if($this->GetRequest($this->itemForm_1[$i]) != ""){
					if(strtolower($this->itemOperator[$i]) == "all"){
						$inCongFilter_def = " AND ";
					}else{
						$inCongFilter_def = " OR ";
					}
					$val = $this->RemoveDoubleSpace($this->GetRequest($this->itemForm_1[$i]));
					$tmpValue = preg_split("/\s/", $val);
					$tmpInFilter = "";
					$inCongFilter = "";
					for($x=0; $x<count($tmpValue); $x++){
						$tmpInFilter .= $inCongFilter 
										.$this->itemRecField[$i] 
										." like '" 
										.$this->jollyChar 
										.$this->GetItemFilter($i, $tmpValue[$x], "") 
										.$this->jollyChar
										."'";
										
						$inCongFilter = $inCongFilter_def;
					}
					$tmpFilter .= $congFilter ."(" .$tmpInFilter .")";
				}
				break;
				
			case "=":
			case ">":
			case "<":
			case "!=":
			case ">=":
			case "<=":
			
				if($this->GetRequest($this->itemForm_1[$i]) != "" || $this->itemTypeField[$i] == "B"){
					if(strpos($this->GetRequest($this->itemForm_1[$i]), ",") !== false){
						$lista = preg_split("/,/", $this->GetRequest($this->itemForm_1[$i]));
						$filtro = "";
						for($x=0; $x<count($lista); $x++){
							if($filtro != ""){
								$filtro .= " OR ";
							}
							$itemFilter = trim($this->GetItemFilter($i, $lista[$x], "'"));
							if(substr($itemFilter, -1) == ","){
								$itemFilter = substr($itemFilter, 0, strlen($itemFilter) - 1);
							}
							$filtro .= $this->itemRecField[$i] .$this->itemOperator[$i] .$itemFilter;
						}
						$tmpFilter .= $congFilter ."(" .$filtro .")";
					}else{
						$tmpFilter .= $congFilter .$this->itemRecField[$i] 
										.$this->itemOperator[$i] 
										.$this->GetItemFilter($i, $this->GetRequest($this->itemForm_1[$i]), "'");
					}
				}
				break;
				
			case "between":
			
				if($this->GetRequest($this->itemForm_1[$i]) != "" && $this->GetRequest($this->itemForm_2[$i]) != ""){
					$tmpFilter .= $congFilter ."(" .$this->itemRecField[$i] ." between " .$this->GetItemFilter($i, $this->GetRequest($this->itemForm_1[$i]), "'");
					$tmpFilter .= " AND " .$this->GetItemFilter($i, $this->GetRequest($this->itemForm_2[$i]), "'") .")";
					
				}else if($this->GetRequest($this->itemForm_1[$i]) != "" && $this->GetRequest($this->itemForm_2[$i]) == ""){
					$tmpFilter .= $congFilter .$this->itemRecField[$i] .">=" .$this->GetItemFilter($i, $this->GetRequest($this->itemForm_1[$i]), "'");
					
				}else if($this->GetRequest($this->itemForm_1[$i]) == "" && $this->GetRequest($this->itemForm_2[$i]) != ""){
					$tmpFilter .= $congFilter .$this->itemRecField[$i] ."<=" .$this->GetItemFilter($i, $this->GetRequest($this->itemForm_2[$i]), "'");
				}
				break;
				
			case "in":
			case "not in":
				
				if($this->GetRequest($this->itemForm_1[$i]) != ""){
					if(strpos($this->GetRequest($this->itemForm_1[$i]), ",") !== false){
						$lista = preg_split("/,/", $this->GetRequest($this->itemForm_1[$i]));
						$filtro = "";
						for($x=0; $x<count($lista); $x++){
							if($filtro != ""){
								$filtro .= " OR ";
							}
							$itemFilter = trim($this->GetItemFilter($i, $lista[$x], "'"));
							if(substr($itemFilter, -1) == ","){
								$itemFilter = substr($itemFilter, 0, strlen($itemFilter) - 1);
							}else if(substr($itemFilter, -2) == ",'"){
								$itemFilter = substr($itemFilter, 0, strlen($itemFilter) - 2) . "'";
							}
							$filtro .= $itemFilter;
						}
						$tmpFilter .= $congFilter .$this->itemRecField[$i] ." " .$this->itemOperator[$i] ."(" .$filtro .")";
					}else{
						$tmpFilter .= $congFilter .$this->itemRecField[$i] ." " 
									.$this->itemOperator[$i] ."(" 
									.$this->GetItemFilter($i, $this->GetRequest($this->itemForm_1[$i]), "'") .")";
					}
				}
				break;
				
			case "like":
			
				if($this->GetRequest($this->itemForm_1[$i]) != ""){
					if(strpos($this->GetRequest($this->itemForm_1[$i]), ",") !== false){
						$lista = preg_split("/,/", $this->GetRequest($this->itemForm_1[$i]));
						$filtro = "";
						for($x=0; $x<count($lista); $x++){
							if($filtro != ""){
								$filtro .= " OR ";
							}
							$itemFilter = trim($this->GetItemFilter($i, $lista[$x], "'"));
							if(substr($itemFilter, -1) == ","){
								$itemFilter = substr($itemFilter, 0, strlen($itemFilter) - 1);
							}
							$filtro .= $this->itemRecField[$i] ." like '" .$this->jollyChar .$itemFilter .$this->jollyChar ."'";
						}
						$tmpFilter .= $congFilter ."(" .$filtro .")";
					}else{
						$tmpFilter .= $congFilter .$this->itemRecField[$i] ." like '" .$this->jollyChar 
								.$this->GetItemFilter($i, $this->GetRequest($this->itemForm_1[$i]), "") .$this->jollyChar ."'";
					}
				}
			}
				
			if($tmpFilter != ""){
				if($this->inWhere($this->itemRecField[$i])){
					if($this->where_Sql == ""){
						$this->where_Sql = "(" .$tmpFilter .")";
					}else{
						$this->where_Sql .= " AND (" .$tmpFilter .")";
					}
				}else{
					if($this->having_Sql == ""){
						$this->having_Sql = "(" .$tmpFilter .")";
					}else{
						$this->having_Sql .= " AND (" .$tmpFilter .")";
					}
				}
			}
		}		
	 }
	 
	 
	
	function GetRequest($str){
		if(isset($_REQUEST[$str])){
			return $_REQUEST[$str];
		}else{
			return "";
		}
	}
	
	
	function FilterRecordset(){
		//rec.source = GetstrSQL()
		//rec.open()		
		$sql = $this->GetstrSQL();
		
		$conn = mysql_pconnect($this->host_name, $this->user_name, $this->password) or trigger_error(mysql_error(),E_USER_ERROR); 
		mysql_select_db($this->database, $conn);
		
		$GLOBALS[$this->recordset_name] = mysqli_query($idsconnection_mysqli, $sql, $conn);		
		
		$GLOBALS['row_' .$this->recordset_name] = mysqli_fetch_assoc($GLOBALS[$this->recordset_name]);
		$GLOBALS['totalRows_' .$this->recordset_name] = mysqli_num_rows($GLOBALS[$this->recordset_name]);				
	}
	
	function GetstrSQL(){
		return trim($this->select_Sql ." " 
					.$this->from_Sql ." " 
					.$this->where_Sql ." " 
					.$this->group_Sql ." " 
					.$this->having_Sql ." " 
					.$this->sort_Sql);
	}
			
	function GetItemFilter($n, $value, $stringChar){
		if (PHP_VERSION < 6) {
			$value = get_magic_quotes_gpc() ? stripslashes($value) : $value;
		}
		
		$value = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($value) : mysql_escape_string($value);
		  
		$retStr = "";
		if($this->itemTypeField[$n] == "S"){
			$retStr = ($value != "") ? $stringChar . $value .$stringChar : "NULL";
			
		}else if($this->itemTypeField[$n] == "N"){
			$retStr = ($value != "") ? doubleval($value) : "NULL";
						
		}else if($this->itemTypeField[$n] == "D"){
			$retStr = ($value != "") ? $stringChar . $value .$stringChar : "NULL";
						
		}else{
			$retStr = ($value != "") ? $this->theDefinedValue : $this->theNotDefinedValue;			
		}
		return $retStr;
	 }
	
	
	
	
	function HasFilter(){
		if($this->where_Sql != "" || $this->having_Sql != ""){
			return true;
		}else{
			return false;
		}
	}
	
	 function RemoveDoubleSpace($str){
		while(strpos($str, "  ")){
			$str = preg_replace("/\s\s/", " ", $str);
		}
		return $str;
	 }
	
	
	
	function SplitSql(){
		
		//'strSQL = "SELECT CLIENT.CITY, CLIENT.NAME, CLIENT.PHONE, CLIENT.MAIL, CLIENT.ADDRESS, CLIENT.STATE, CLIENT.DESCRIPTION, CLIENT.PRICE, Category.Category, Category.Id AS IdCategory FROM Category INNER JOIN CLIENT ON Category.Id = CLIENT.CATEGORY  "
		$this->strSQL = trim($this->strSQL);
		
		if(substr($this->strSQL, -1) == ";"){
			$this->strSQL = substr($this->strSQL, 0, strlen($this->strSQL) - 1);
		}
		
		$select_pos = strpos(strtolower($this->strSQL), "select");
		$from_pos = strpos(strtolower($this->strSQL), "from");
		$where_pos = strpos(strtolower($this->strSQL), "where");
		$having_pos = strpos(strtolower($this->strSQL), "having");
		$group_pos = strpos(strtolower($this->strSQL), "group by");
		$sort_pos = strpos(strtolower($this->strSQL), "order by");
		
		if($from_pos === false){
			$this->ReportError("The clause FROM in the sql is missing!");
		}
				
		if($select_pos !== false){
			$this->select_Sql = trim(substr($this->strSQL, $select_pos, $from_pos));
		}else{
			$this->ReportError("The clause SELECT in the sql is missing!");
		}
		
		if($where_pos !== false){
			$endFrom = $where_pos; // - 1;
		}else if($group_pos !== false){
			$endFrom = $group_pos; // - 1;
		}else if($having_pos !== false){
			$endFrom = $having_pos; // - 1;
		}else if($sort_pos !== false){
			$endFrom = $sort_pos; // - 1;
		}else{
			$endFrom = strlen($this->strSQL) + 1;
		}
		$this->from_Sql = trim(substr($this->strSQL, $from_pos, $endFrom - $from_pos));
		
		if($where_pos !== false){
			if($group_pos !== false){
				$endWhere = $group_pos; // - 1
			}else if($having_pos !== false){
				$endWhere = $having_pos; // - 1
			}else if($sort_pos !== false){
				$endWhere = $sort_pos; // - 1
			}else{
				$endWhere = strlen($this->strSQL); // + 1;
			}
			$this->where_Sql = trim(substr($this->strSQL, $where_pos, $endWhere - $where_pos));
		}
		
		if($group_pos !== false){
			if($having_pos !== false){
				$endGroup = $having_pos; // - 1;
			}else if($sort_pos !== false){
				$endGroup = $sort_pos; // - 1;
			}else{
				$endGroup = strlen($this->strSQL); // + 1;
			}
			$this->group_Sql = trim(substr($this->strSQL, $group_pos, $endGroup - $group_pos));
		}
		
		if($having_pos !== false){
			if($sort_pos !== false){
				$endHaving = $sort_pos; // - 1
			}else{
				$endHaving = strlen($this->strSQL); // + 1;
			}
			$this->having_Sql = trim(substr($this->strSQL, $having_pos, $endHaving - $having_pos));
		}
				
		if($sort_pos !== false){
			$this->sort_Sql = trim(substr($this->strSQL, $sort_pos));
		}
	}
	
	function inWhere($str){
		if($this->group_Sql != "" && strpos($this->select_Sql, $str) !== false){
			return false;
		}else{
			return true;
		}
	}
	
	function Debug(){
		ob_clean();
		foreach($_POST as $var => $val){
			echo $var ."=" .$val ."<br>";
		}
		echo "<br>";
		echo "SqlBase: " .$this->strSQL ."<br><br>";
		echo "<br>";
		echo "Select: " .$this->select_Sql ."<br><br>";
		echo "From: " .$this->from_Sql ."<br><br>";
		echo "Where: " .$this->where_Sql ."<br><br>";
		echo "Having: " .$this->having_Sql ."<br><br>";
		echo "Group: " .$this->group_Sql ."<br><br>";
		echo "Sort: " .$this->sort_Sql ."<br><br>";		
		echo "Final Sql: " .$this->GetstrSQL();		
		if($this->GetRequest("dwzDebug") == ""){
			exit();
		}
	}
	
	function ReportError($errMsg){
		ob_clean();
		echo "WARNING!!<BR>	";
		echo"Error in the Advanced Search extension<br>";
		echo $errMsg;
		exit();
	}
	
}

?>