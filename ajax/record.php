<?php
include_once('config.php');
$user_fun = new Userfunction();
$counter = 1;


	$select = $user_fun->select("users");




?>
<style>
    .theme-green{
        background-color:green
    }
    th{color:white}
</style>
				<table class="table" style="vertical-align: middle; text-align: center;">
				  <thead class="theme-green">
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">First Name</th>
					  	<th scope="col">Last Name</th>
						<th scope="col">Email</th>
					  	<th scope="col">DOB</th>
						<th scope="col">Address</th>
						<th scope="col">Phone number</th>
					</tr>
				  </thead>
				  <tbody>
				  	<?php if($select){ foreach($select as $se_data){ ?>
					<tr>
					  <th scope="row"><?php echo $counter; $counter++; ?></th>
					  	<td><?php echo $se_data['first_name']; ?></td>
					  	<td><?php echo $se_data['last_name']; ?></td>
					  	<td><?php echo $se_data['email']; ?></td>
						<td><?php echo $se_data['dob']; ?></td>
						<td><?php echo $se_data['address']; ?></td>
						<td><?php echo $se_data['phone_number']; ?></td>
					</tr>
					<?php }}else{ echo "<tr><td colspan='7'><h2>No Result Found</h2></td></tr>"; } ?>
				  </tbody>
				</table>	