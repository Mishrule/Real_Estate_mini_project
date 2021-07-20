<?php
    require_once('db.php');


    if(isset($_GET['userEdit'])){

        $userEdit = mysqli_real_escape_string($con, $_GET['userEdit']);
        $userMessageArray = array();
        
        $userGetSQL = "SELECT * FROM users WHERE userid = '$userEdit'";
        $userGetResult = mysqli_query($con, $userGetSQL);
        while($userGetRow = mysqli_fetch_array($userGetResult)){
            $userMessageArray['userid'] = $userGetRow['userid']; 
            $userMessageArray['userFirstname'] = $userGetRow['userfirstname']; 
            $userMessageArray['userLastname'] = $userGetRow['userlastname'];
            $userMessageArray['userPassword'] = $userGetRow['userpassword'];
            $userMessageArray['useremail'] = $userGetRow['useremail'];
   
        }
        echo json_encode($userMessageArray);
    }

    //========================= UPDATE
    if(isset($_POST['userUpdateBTN'])){
                      
        $updateuserid = mysqli_real_escape_string($con, $_POST['updateuserid']);
        $updateuserFirstname = mysqli_real_escape_string($con, $_POST['updateuserFirstname']);
        $updateuserLastname = mysqli_real_escape_string($con, $_POST['updateuserLastname']);
        $updateuserPassword = mysqli_real_escape_string($con, $_POST['updateuserPassword']);
        $updateuseremail = mysqli_real_escape_string($con, $_POST['updateuseremail']);

		$userUpdateSQL = "UPDATE users SET userfirstname='$updateuserFirstname', userlastname='$updateuserLastname', userpassword='$updateuserPassword', useremail='$updateuseremail' WHERE userid='$updateuserid'";

			$userUpdateResult = mysqli_query($con, $userUpdateSQL);

			if($userUpdateResult){
				echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>User with ID '.$updateuserid.' is Updated Successfully</strong>
				
			</div>
			
			';
			
			}else{
				echo '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Update User</strong>
				
			</div>
			';
			}

		
	}

     //========================= Delete
     if(isset($_POST['userDelete'])){
        $userDelete = mysqli_real_escape_string($con, $_POST['userDelete']);
       
			$userDeleteSQL = "DELETE FROM users WHERE userid='$userDelete'";
            

			$userDeleteResult = mysqli_query($con, $userDeleteSQL);
                       

			if($userDeleteResult){
				echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>User With ID '.$userDelete.' is Deleted Successfully</strong>
				
			</div>
			
			';
			
			}else{
				echo '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Delete Agent</strong>
				
			</div>
			';
			}

		
	}
?>