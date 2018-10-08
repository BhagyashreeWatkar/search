<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="<?php echo base_url().'index.php/welcome/search/';?>" method="multipart/form-data">
	 	<input type="text" name="search" value="">
	 	<input type="submit" name="sub" value="search"><br><br>
	 </form>
<table>
	<thead>
		<tr>
			<th>Company ID</th>
			<th>Company Name</th>
			<th>company image</th>
			<th colspan="2">action</th>
		</tr>
	
</thead>
	<tbody>
		<?php foreach($products as $row) { ?>
		<tr>
			<td><?php echo $row->product_id; ?></td>
			<td><a href="<?php echo base_url().'index.php/welcome/single_product/'.$row->product_id;?>"><?php echo $row->product_name; ?></a></td>
			<td><img style="height:50px; width: 70px;" src="<?php echo base_url().'/uploads/'.$row->product_image; ?>"></td>
			<td>
				<a href="<?php echo base_url().'index.php/welcome/edit_product/'.$row->product_id;?>">Edit</a></td>
			<td><a href="<?php echo base_url().'index.php/welcome/delete_product/'.$row->product_id;?>">Delete</a>
			</td>
		</tr>
	<?php } ?> 
	</tbody>
</table>


<!--<?php 
	//echo $error_image;
	//echo "<br>";
	//echo $error_name;
?>-->


<form action="<?php echo base_url().'index.php/welcome/uploads/';?>" method="post" enctype="multipart/form-data">
	Product name:<input type="text" name="productname" value=""><br>
	Product_image:<input type="file" name="userfile[]" multiple="multiple"><br>
	<input type="submit" name="submit" value="upload">
	<div class="msg"></div>
	
</form>
</body>
</html>