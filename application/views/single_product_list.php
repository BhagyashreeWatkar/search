<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Company ID</th>
			<th>Company Name</th>
			<th>company image</th>
			
		</tr>
	
</thead>
	<tbody>
		<?php foreach($products as $row) { ?>
		<tr>
			<td><?php echo $row->product_id; ?></td>
			<td><?php echo $row->product_name; ?></td>
			<td><img style="height:50px; width: 70px;" src="<?php echo base_url().'/uploads/'.$row->product_image; ?>"></td>
			<!--<td>
				<a href="<?php echo base_url().'index.php/welcome/edit_product/'.$row->product_id;?>">Edit</a></td>
			<td><a href="<?php echo base_url().'index.php/welcome/delete_product/'.$row->product_id;?>">Delete</a>
			</td>-->
		</tr>
	<?php } ?> 
	</tbody>
</table>  
</body>
</html>