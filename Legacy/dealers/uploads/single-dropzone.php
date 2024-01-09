<?php



if(!$_FILES) exit;



//echo 'Hello can you read me?';


//print_r($_FILES);
if ($_FILES['file']['name']) {
		
				//echo $_FILES['file']['name'];

                //$name = md5(rand(100, 200));
				$name = $_FILES['file']['name'];
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = 'images/' . $filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                echo 'uploads/images/' . $filename;//change this URL




}else{
echo 'Error!';
}






?>