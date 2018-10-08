<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!--<?php 
	//echo $error_image;
	//echo "<br>";
	//echo $error_name;
	 ?>-->

	 

<form action="<?php echo base_url().'index.php/welcome/uploads/';?>" method="post" enctype="multipart/form-data">
	Product name:<input type="text" name="productname" value=""><br>
	Product_image:<input type="file" name="userfile[]" multiple="multiple"><br>
	<input type="submit" name="submit" value="upload">
	
</form>






</body>
</html>