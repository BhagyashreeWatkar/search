<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php foreach ($products as $row) { ?>	 
<form action="<?php echo base_url().'index.php/welcome/update/';?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="productid" value="<?php echo $row->product_id; ?>">
	Product name:<input type="text" name="productname" value="<?php echo $row->product_name; ?>"><br>
	<img style="width:100px;height: 100px;" src="<?php echo base_url().'/uploads/'.$row->product_image; ?>"><br>
	Product_image:<input type="file" name="userfile"><br>
	<input type="submit" name="submit" value="update">
	
</form>
<?php } ?>
</body>
</html>