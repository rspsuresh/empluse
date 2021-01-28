<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['dob'])
        && isset($_POST['address']) && isset($_POST['phonenumber'])){

		$fname = $user_fun->htmlvalidation($_POST['firstname']);
		$lname = $user_fun->htmlvalidation($_POST['lastname']);
		$email = $user_fun->htmlvalidation($_POST['email']);
		$dob = $user_fun->htmlvalidation($_POST['dob']);
		$address = $user_fun->htmlvalidation($_POST['address']);
		$phone = $user_fun->htmlvalidation($_POST['phonenumber']);


		if((!preg_match('/^[ ]*$/', $fname)) && (!preg_match('/^[ ]*$/', $lname)) &&
            (!preg_match('/^[ ]*$/', $email)) &&
            (!preg_match('/^[ ]*$/', $phone)) &&
            (!preg_match('/^[ ]*$/', $address)) &&
            ($dob != NULL)){

			$field_val['first_name'] = $fname;
            $field_val['last_name'] = $lname;
			$field_val['email'] = $email;
			$field_val['dob'] = $dob;
			$field_val['address'] = $address;
			$field_val['phone_number'] = $phone;

			$insert = $user_fun->insert("users", $field_val);

			if($insert){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Inserted";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Inserted";
			}
		}
		else{

			if(preg_match('/^[ ]*$/', $fname)){
				$json['status'] = 103;
				$json['msg'] = "Please Enter Firstname";
			}
			if(preg_match('/^[ ]*$/', $lname)){
				$json['status'] = 104;
				$json['msg'] = "Please Enter Lastname";
			}
            if(preg_match('/^[ ]*$/', $email)){
                $json['status'] = 105;
                $json['msg'] = "Please Enter Email";
            }
			if(preg_match('/^[ ]*$/', $dob)){
				$json['status'] = 106;
				$json['msg'] = "Please Select DOB";
			}
            if(preg_match('/^[ ]*$/', $address)){
                $json['status'] = 107;
                $json['msg'] = "Please Enter Address";
            }
			if(preg_match('/^[ ]*$/', $phone)){
				$json['status'] = 108;
				$json['msg'] = "Please Enter Phone";
			}
		}
	}
	else{
		$json['status'] = 109;
		$json['msg'] = "Invalid Values Passed";

	}

}
else{

	$json['status'] = 109;
	$json['msg'] = "Invalid Method Found";

}


echo json_encode($json);

?>