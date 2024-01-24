<?php
/*
Table export

--
-- Table structure for table `cheverolet`
--

CREATE TABLE `cheverolet` (
  `cheverolet_id` int(11) NOT NULL auto_increment,
  `cheverolet` varchar(255) NOT NULL,
  PRIMARY KEY  (`cheverolet_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- Table structure for table `yukon`
--

CREATE TABLE `yukon` (
  `yukon_id` int(11) NOT NULL auto_increment,
  `cheverolet_id` int(11) NOT NULL,
  `yukon` varchar(255) NOT NULL,
  PRIMARY KEY  (`yukon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


*/
include("conndb.php");
function createoptions($table , $id , $field)
{
    $sql = "select * from $table ORDER BY $field";
    $res = mysqli_query($idsconnection_mysqli, $sql);
    while ($a = mysqli_fetch_assoc($res))
    echo "<option value=\"{$a[$id]}\">$a[$field]</option>";
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>Select test</title>
            <script type="text/javascript" src="jquery.js"></script>
            <script type="text/javascript" charset="utf-8">
            $(function(){
              $("select#cheverolet").change(function(){
                $.getJSON("select.php",{cheverolet: $(this).val(), ajax: 'true'}, function(j){
                  var options = '';
                  for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
                  }
                  $("select#yukon").html(options);
                })
              })


            })
            </script>
    </head>

        <select id="cheverolet">
        <option value="-1">--Select--</option>
		<?php
        createoptions("cheverolet", "cheverolet_id", "cheverolet");
        ?>
        </select>
        <select id="yukon">
        </select>

    </body>
</html>