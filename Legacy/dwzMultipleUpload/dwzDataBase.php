<?php

if (!class_exists("dwzDataBase")){
class dwzDataBase{
	
	var $db;
	var $debug;
	var $last_sql;
	var $hasError;
	var $lastError;
	
	function dwzDataBase(){
		$this->db["conn_is_open"] = false;
		$this->debug = false;
		$this->hasError = false;
		$this->lastError = "";
	}
	
	function SetConn($hostname, 
					 $database, 
					 $username, 
					 $password){
		$this->db["hostname"] = $hostname;
		$this->db["database"] = $database;
		$this->db["username"] = $username;
		$this->db["password"] = $password;
	}
	
	function ExecuteSql($sql){
		if(!$this->db["conn_is_open"]){
			$this->Open();	
		}
		
		$this->hasError = false;
		$this->lastError = "";
		
		$this->SelectDb();
		
		$this->last_sql = $sql;
		
		$result = mysqli_query($idsconnection_mysqli, $sql, $this->db["connessione"]);
		
		if($result === false){
			$this->hasError = true;
			$this->lastError = mysql_error();
			return mysql_error();
		}

		return $result;
	}
	
	function Select($select){
		if(!$this->db["conn_is_open"]){
			$this->Open();	
		}
		
		$this->hasError = false;
		$this->lastError = "";
		
		$this->SelectDb();
		
		$sql = "SELECT ";

		$cong = "";
		
		if(isset($select["fields"]) && count($select["fields"]) != 0){
			foreach($select["fields"] as $field){
				$sql .= $cong .$field["name"];
				$cong = ", ";
			}
		}else{
			$sql .= " * ";
		}
		
		$sql .= " FROM " .$select["table_name"];
		
		$cong = "";
		
		if(count($select["where"]) != 0){
			$sql .= " WHERE ";
			foreach($select["where"] as $field){
				$def_value = (array_key_exists("def_value", $field) ? $field["def_value"] : "");
				$not_def_value = (array_key_exists("not_def_value", $field) ? $field["not_def_value"] : "");
				$sql .= $cong .$field["name"] ." = %s";
				$args[] = $this->GetSQLValueString($field["value"], $field["type"], $def_value, $not_def_value);
				$cong = " AND ";
			}
		}
						
		$selectSQL = v $sql, $args);		
		
		$this->last_sql = $selectSQL;
		
		if($this->debug){
			echo $selectSQL;
			exit();
		}
		
		$result = mysqli_query($idsconnection_mysqli, $selectSQL, $this->db["connessione"]);

		if($result === false){
			$this->hasError = true;
			$this->lastError = mysql_error();
			return mysql_error();
		}

		return $result;
	}
	
	function Insert($insert){
		if(!$this->db["conn_is_open"]){
			$this->Open();	
		}
		
		$this->hasError = false;
		$this->lastError = "";
		
		$this->SelectDb();
				
		$sql_fields = "INSERT INTO " .$insert["table_name"] ." ( ";
		$sql_values = "";
		$args;
		$cong = "";
		
		foreach($insert["fields"] as $field){
			$def_value = (array_key_exists("def_value", $field) ? $field["def_value"] : "");
			$not_def_value = (array_key_exists("not_def_value", $field) ? $field["not_def_value"] : "");
			$sql_fields .= $cong .$field["name"];
										
			$sql_values .= $cong ." %s";
			$args[] = $this->GetSQLValueString($field["value"], $field["type"], $def_value, $not_def_value);
			$cong = ", ";
		}
		$total_sql = $sql_fields ." ) VALUES ( " .$sql_values ." )";
		
		$insertSQL = v $total_sql, $args);		
		
		$this->last_sql = $insertSQL;
		
		if($this->debug){
			echo $insertSQL;
			exit();
		}
		
		$result = mysqli_query($idsconnection_mysqli, $insertSQL, $this->db["connessione"]);

		if($result === false){
			$this->hasError = true;
			$this->lastError = mysql_error();
			return mysql_error();
		}

		return $result;
	}
			
	function Update($update){
		if(!$this->db["conn_is_open"]){
			$this->Open();	
		}
		
		$this->hasError = false;
		$this->lastError = "";
		
		$this->SelectDb();
		
		$and;
		$sql = "UPDATE " .$update["table_name"] ." SET ";
		$args;
		$cong = "";
		
		foreach($update["fields"] as $field){
			$def_value = (array_key_exists("def_value", $field) ? $field["def_value"] : "");
			$not_def_value = (array_key_exists("not_def_value", $field) ? $field["not_def_value"] : "");			
			$sql .= $cong .$field["name"] ." = %s";
			$args[] = $this->GetSQLValueString($field["value"], $field["type"], $def_value, $not_def_value);
			$cong = ", ";
		}
		
		$cong = "";
		
		if(count($update["where"]) != 0){
			$sql .= " WHERE ";
			foreach($update["where"] as $field){
				$def_value = (array_key_exists("def_value", $field) ? $field["def_value"] : "");
				$not_def_value = (array_key_exists("not_def_value", $field) ? $field["not_def_value"] : "");
				
				if(isset($field["operator"])){
					switch($field["operator"]){
						case "Not Null":
							$sql .= $cong ." Not " .$field["name"] ." Is Null ";
							break;
						case "Null":
							$sql .= $cong .$field["name"] ." Is Null ";
							break;
						default:
							$sql .= $cong .$field["name"] ." " .$field["operator"] ." %s";
							$args[] = $this->GetSQLValueString($field["value"], $field["type"], $def_value, $not_def_value);
							break;
					}
				}else{
					 $sql .= $cong .$field["name"] . " = %s"; 
					 $args[] = $this->GetSQLValueString($field["value"], $field["type"], $def_value, $not_def_value);
				}				
				
				$cong = " AND ";
			}
		}		
						
		$updateSQL = v $sql, $args);		
		
		$this->last_sql = $updateSQL;
		
		if($this->debug){
			echo $updateSQL;
			exit();
		}
		
		$result = mysqli_query($idsconnection_mysqli, $updateSQL, $this->db["connessione"]);

		if($result === false){
			$this->hasError = true;
			$this->lastError = mysql_error();
			return mysql_error();
		}

		return $result;
	}
	
	function Delete($delete){
		if(!$this->db["conn_is_open"]){
			$this->Open();	
		}
		
		$this->hasError = false;
		$this->lastError = "";
		
		$this->SelectDb();
		
		$and;
		$sql = "DELETE FROM " .$delete["table_name"];
		$args;
		$cong = "";
		
		
		if(count($delete["where"]) != 0){
			$sql .= " WHERE ";
			foreach($delete["where"] as $field){
				$def_value = (array_key_exists("def_value", $field) ? $field["def_value"] : "");
				$not_def_value = (array_key_exists("not_def_value", $field) ? $field["not_def_value"] : "");							
				if(isset($field["operator"])){
					switch($field["operator"]){
						case "Not Null":
							$sql .= $cong ." Not " .$field["name"] ." Is Null ";
							break;
						case "Null":
							$sql .= $cong .$field["name"] ." Is Null ";
							break;
						default:
							$sql .= $cong .$field["name"] ." " .$field["operator"] ." %s";
							$args[] = $this->GetSQLValueString($field["value"], $field["type"], $def_value, $not_def_value);
							break;
					}
				}else{
					 $sql .= $cong .$field["name"] . " = %s"; 
					 $args[] = $this->GetSQLValueString($field["value"], $field["type"], $def_value, $not_def_value);
				}				
				$cong = " AND ";
			}
		}
				
		$deleteSQL = v $sql, $args);		
		
		$this->last_sql = $deleteSQL;
		
		if($this->debug){
			echo $deleteSQL;
			exit();
		}
		
		$result = mysqli_query($idsconnection_mysqli, $deleteSQL, $this->db["connessione"]);

		if($result === false){
			$this->hasError = true;
			$this->lastError = mysql_error();
			return mysql_error();
		}
                
		return $result;		
	}
	
	function HasError(){
		return $this->hasError;
	}
	function GetLastError(){
		return $this->lastError;
	}
	
	function GetSql(){
		return $this->last_sql;
	}
	function GetLast_id(){
		return @mysql_insert_id($this->db["connessione"]);
	}
	
	function Open(){
		$this->db["connessione"] = mysql_connect($this->db["hostname"], $this->db["username"],$this->db["password"])
				 or trigger_error(mysql_error(),E_USER_ERROR);				 
		$this->db["conn_is_open"] = true;
	}
	
	function Close(){
		if($this->db["conn_is_open"]){
			@mysql_close($this->db["connessione"]);
		}		
		$this->db["conn_is_open"] = false;
	}
	
	function SelectDb(){
		mysql_select_db($this->db["database"], $this->db["connessione"]);
	}
	
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
	  if (PHP_VERSION < 6) {
		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
	  }
	
	  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
	
	  switch ($theType) {
		case "text":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;    
		case "long":
		case "int":
		  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
		  break;
		case "double":
		  $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
		  break;
		case "date":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;
		case "defined":
		  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
		  break;
	  }
	  return $theValue;
	}

}
}
?>