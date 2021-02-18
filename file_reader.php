<!DOCTYPE html>
<html>
<head><?php include("design.css"); ?></head>
<body><?php

/* 
Storing the given data (sheet "Data") within an array.
*/
if (isset($_POST['submit'])) {
	$mimes = array('text/tsv', 'application/octet-stream');
	if(in_array($_FILES['filename']['type'],$mimes)){
	  // do something
	} else {
	  die("Sorry, Please Upload File in tsv Format");
	}

	$file = fopen($_FILES['filename']['tmp_name'], "r") or die("Unable to open file!");
	$data = array();
	$fielsHeading = array();
	$i = 0;
	while (!feof($file)) {
		$string = fgets($file);
		if(preg_match('/\S/', $string)){ 
			$stringContent = explode("\t", $string);
			if($i == 0){
				$errFlag = true; // File Error (Same Field Repiting).
				foreach($stringContent as $values){
					if(($values == "Size") && $errFlag){
						$values = "size";
						$errFlag = false;
					}
					$fielsHeading[] = $values;
				}  
			}
		   else{
				foreach($fielsHeading as $key => $values){	
					$data[$i][$values] = $stringContent[$key];
				}
		   }
		   $i++;
		}
	}

	//Display Data in Table
	if(!empty($data)){
		?><table id="customers">
		  <tr><?php
			foreach($fielsHeading as $key => $values){	
				?><th><?php print($values); ?></th><?php
			}
		  ?></tr><?php
		  
			foreach($data as $keyData => $valuesData){	
				?><tr><?php
					foreach($valuesData as $keyDetails => $details){	
						?><td><?php print($details); ?></td><?php
					}
				?></tr><?php
			}
		?></table><?php
	}
}
?>
</body>
</html>

