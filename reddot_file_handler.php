<!DOCTYPE html>
<html>
<head>
<style>
html, body {
  align-items: center;
  background: #f2f4f8;
  border: 0;
  display: flex;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 16px;
  height: 100%;
  justify-content: center;
}
</style>
<?php include("design.css"); ?></head>

<body>
<form enctype='multipart/form-data' action='file_reader.php' method='post' >
		
<label>Upload import CSV file Here</label>
</br>
<input size='50' type='file' name='filename'>
</br>
<input type='submit' name='submit' value='Upload Now'>

</form>
