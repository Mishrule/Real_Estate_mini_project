<?php
    require_once('db.php');


    if(isset($_GET['landlordEdit'])){

        $landlordEdit = mysqli_real_escape_string($con, $_GET['landlordEdit']);
        $landlordMessageArray = array();
        
        $landlordGetSQL = "SELECT * FROM landlord WHERE landlordid = '$landlordEdit'";
        $landlordGetResult = mysqli_query($con, $landlordGetSQL);
        while($landlordGetRow = mysqli_fetch_array($landlordGetResult)){
            $landlordMessageArray['landlordId'] = $landlordGetRow['landlordid']; 
            $landlordMessageArray['landlordName'] = $landlordGetRow['landlordname']; 
            $landlordMessageArray['landlordBiography'] = $landlordGetRow['landlordbio'];
            $landlordMessageArray['landlordLocation'] = $landlordGetRow['landlordlocation'];
            $landlordMessageArray['landlordContact'] = $landlordGetRow['landlordcontact'];
            $landlordMessageArray['landlordPassword'] = $landlordGetRow['landlordpassword'];
            $landlordMessageArray['landlordEmail'] = $landlordGetRow['landlordemail'];
            
           
        }
        echo json_encode($landlordMessageArray);
    }

    //========================= UPDATE
    if(isset($_POST['landlordUpdateBTN'])){

        $updateLandlordId = mysqli_real_escape_string($con, $_POST['updateLandLordId']);
        $updateLandlordName = mysqli_real_escape_string($con, $_POST['updateLandLordName']);
        $updateLandlordBiography = mysqli_real_escape_string($con, $_POST['updateLandLordBiography']);
        $updateLandlordLocation = mysqli_real_escape_string($con, $_POST['updateLandLordLocation']);
        $updateLandlordContact = mysqli_real_escape_string($con, $_POST['updateLandLordContact']);
        $updateLandlordPassword = mysqli_real_escape_string($con, $_POST['updateLandLordPassword']);
        $updateLandlordEmail = mysqli_real_escape_string($con, $_POST['updateLandLordEmail']);
        
       

			 $landlordUpdateSQL = "UPDATE landlord SET landlordname='$updateLandlordName', landlordbio='$updateLandlordBiography', landlordlocation='$updateLandlordLocation', landlordcontact='$updateLandlordContact', landlordpassword='$updateLandlordPassword',  landlordemail='$updateLandlordEmail' WHERE landlordid='$updateLandlordId'";

			$landlordUpdateResult = mysqli_query($con, $landlordUpdateSQL);

			if($landlordUpdateResult){
				echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$updateLandlordName.' Landlord Updated Successfully</strong>
				
			</div>
			
			';
			
			}else{
				echo '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Update Landlord</strong>
				
			</div>
			';
			}

		
	}

     //========================= Delete
     if(isset($_POST['landlordDelete'])){
        $landlordDelete = mysqli_real_escape_string($con, $_POST['landlordDelete']);
       
			$landlordDeleteSQL = "DELETE FROM landlord WHERE landlordid='$landlordDelete'";
            

			$landlordDeleteResult = mysqli_query($con, $landlordDeleteSQL);
                       

			if($landlordDeleteResult){
				echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$landlordDelete.' Landlord Deleted Successfully</strong>
				
			</div>
			
			';
			
			}else{
				echo '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Delete Landlord</strong>
				
			</div>
			';
			}

		
	}
?>