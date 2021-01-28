<?php

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Crud</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		.box-title{
			border-radius: 5px;
			box-shadow: 0px 0px 3px 1px gray;
			padding: 10px 0px;
		}
		.error-msg{
			color: #dc3545;
			font-weight: 600;
		}
		.success-msg{
			color: green;
			font-weight: 600;
		}
        .formoutline{
            border: 1px solid green;
        }
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<div class="row m-3 text-center">
				<div class="col-lg-12">
					<h1 class="box-title">User Create</h1>
				</div>
			</div>
            <form method="POST" id="ins_rec" class="formoutline">
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>First Name</b></label>
                        <input type="text" class="form-control" name="firstname" id="fname" placeholder="Firstname">
                        <span class="error-msg" id="fname_1"></span>
                    </div>
                    <div class="form-group">
                        <label><b>Last Name</b></label>
                        <input type="text" class="form-control" name="lastname" id="lname" placeholder="Lastname">
                        <span class="error-msg" id="lname_1"></span>
                    </div>
                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="YourEmail@email.com">
                        <span class="error-msg" id="email_1"></span>
                    </div>
                    <div class="form-group">
                        <label><b>DOB</b></label>
                        <input type="date" class="form-control" id="dob" name="dob">
                        <span class="error-msg" id="dob_1"></span>
                    </div>
                    <div class="form-group">
                        <label><b>Address</b></label>
                        <input type="text" class="form-control" name="address" id="address"
                               placeholder="Address">
                        <span class="error-msg" id="address_1"></span>
                    </div>
                    <div class="form-group">
                        <label><b>Phone Number</b></label>
                        <input type="text" class="form-control" name="phonenumber" id="phonenumber"
                               placeholder="Phone number">
                        <span class="error-msg" id="phonenumber_1"></span>
                    </div>
                    <div class="form-group">
                        <span class="success-msg" id="sc_msg"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" >Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
			<div class="row mt-5" id="tbl_rec">
			</div>
		</div>
	</div>
	
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
	
$(document).ready(function (){
	$('#tbl_rec').load('record.php');
	//insert Record
	$('#ins_rec').on("submit", function(e){
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:'insprocess.php',
			data:$(this).serialize(),
			success:function(vardata){
				var json = JSON.parse(vardata);
				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#close_click').trigger('click');
				}
				 if(json.status == 102 || json.status==109){
                     $('#sc_msg').text(json.msg);
				}else{
                     $('#sc_msg').text('');
                 }
				 if(json.status == 103){
					$('#fname_1').text(json.msg);
				  }else{
                     $('#fname_1').text('');
                 }
				 if(json.status == 104){
					$('#lname_1').text(json.msg);
				  }else{
                     $('#lname_1').text('');
                 }
				 if(json.status == 105){
					$('#email_1').text(json.msg);
				}else{
                     $('#email_1').text('');
                 }
				 if(json.status == 106){
					$('#dob_1').text(json.msg);
				}else{
                     $('#dob_1').text('');
                 }
				 if(json.status == 107) {
                     $('#address_1').text(json.msg);
                 }else {
                     $('#address_1').text('');
                 }
				 if(json.status==108){
                    $('#phonenumber_1').text(json.msg);
                  }else {
                     $('#phonenumber_1').text('');
                 }
			}
		});
	});
});

</script>

</body>
</html>
