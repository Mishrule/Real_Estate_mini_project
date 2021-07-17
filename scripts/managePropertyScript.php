<?php
    require_once('db.php');


    if(isset($_GET['propEdit'])){
        $propEdit = mysqli_real_escape_string($con, $_GET['propEdit']);
        $propMessageArray = array();
        
        $propGetSQL = "SELECT * FROM property WHERE propid = '$propEdit'";
        $propGetResult = mysqli_query($con, $propGetSQL);
        while($propGetRow = mysqli_fetch_array($propGetResult)){
            $propMessageArray['propertyid'] = $propGetRow['propid']; 
            $propMessageArray['propertyName'] = $propGetRow['propname']; 
            $propMessageArray['propertyDescription'] = $propGetRow['propDescription'];
            $propMessageArray['propertyLocation'] = $propGetRow['proplocation'];
            $propMessageArray['propertyStatus'] = $propGetRow['propstatus'];
            $propMessageArray['propertyNumRoom'] = $propGetRow['proprooms'];
            $propMessageArray['propertyBath'] = $propGetRow['propbathrooms'];
            $propMessageArray['propertyGarage'] = $propGetRow['propgarage'];
            $propMessageArray['propertyWater'] = $propGetRow['propwater'];
            $propMessageArray['propertyRoomTypes'] = $propGetRow['propfloortype'];
            $propMessageArray['propertAgentNameTxt'] = $propGetRow['propagentname'];
            $propMessageArray['propertyLandLordTxt'] = $propGetRow['proplandlord'];
            $propMessageArray['roomActionText'] = $propGetRow['proproomaction'];
            $propMessageArray['propertyAmount'] = $propGetRow['propamount'];
            $propMessageArray['propertyAmountCharged'] = $propGetRow['propamountcharged'];
           
        }
        echo json_encode($propMessageArray);
    }

    //========================= UPDATE
    if(isset($_POST['propUpdateBTN'])){
        $updatePropertyId = mysqli_real_escape_string($con, $_POST['updatePropertyId']);
        $updatePropertyName = mysqli_real_escape_string($con, $_POST['updatePropertyName']);
        $updatePropertyDescription = mysqli_real_escape_string($con, $_POST['updatePropertyDescription']);
        $updatePropertyLocation = mysqli_real_escape_string($con, $_POST['updatePropertyLocation']);
        $updatePropertyStatus = mysqli_real_escape_string($con, $_POST['updatePropertyStatus']);
        $updatePropertyNumRoom = mysqli_real_escape_string($con, $_POST['updatePropertyNumRoom']);
        $updatePropertyBath = mysqli_real_escape_string($con, $_POST['updatePropertyBath']);
        $updatePropertyGarage = mysqli_real_escape_string($con, $_POST['updatePropertyGarage']);
        $updatePropertyWater = mysqli_real_escape_string($con, $_POST['updatePropertyWater']);
        $updatePropertyRoomTypes = mysqli_real_escape_string($con, $_POST['updatePropertyRoomTypes']);
        $updatePropertAgentNameTxt = mysqli_real_escape_string($con, $_POST['updatePropertAgentNameTxt']);
        $updatePropertyLandLordTxt = mysqli_real_escape_string($con, $_POST['updatePropertyLandLordTxt']);
        $updateRoomActionText = mysqli_real_escape_string($con, $_POST['updateRoomActionText']);
        $updatePropertyAmount = mysqli_real_escape_string($con, $_POST['updatePropertyAmount']);
        $updatePropertyAmountCharged = mysqli_real_escape_string($con, $_POST['updatePropertyAmountCharged']);
        $updatePropertyTotal = intval($updatePropertyAmount) + intval($updatePropertyAmountCharged);

			$propUpdateSQL = "UPDATE property SET propname='$updatePropertyName', propDescription='$updatePropertyDescription', proplocation='$updatePropertyLocation', propstatus='$updatePropertyStatus', proprooms='$updatePropertyNumRoom', propbathrooms='$updatePropertyBath', propgarage='$updatePropertyGarage', propwater='$updatePropertyWater', propfloortype='$updatePropertyRoomTypes', propagentname='$updatePropertAgentNameTxt', proplandlord='$updatePropertyLandLordTxt', proproomaction='$updateRoomActionText', propamount='$updatePropertyAmount', propamountcharged='$updatePropertyAmountCharged', proptotal='$updatePropertyTotal' WHERE propid='$updatePropertyId'";

			$propUpdateResult = mysqli_query($con, $propUpdateSQL);

			if($propUpdateResult){
				echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$updatePropertyName.' Property Updated Successfully</strong>
				
			</div>
			
			';
			
			}else{
				echo '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Update Property</strong>
				
			</div>
			';
			}

		
	}

     //========================= Delete
     if(isset($_POST['propDelete'])){
        $propDelete = mysqli_real_escape_string($con, $_POST['propDelete']);
       
			$propDeleteSQL = "DELETE FROM property WHERE propid='$propDelete'";
            $propImageDeleteSQL = "DELETE FROM propertyimage WHERE propid='$propDelete'";

			$propDeleteResult = mysqli_query($con, $propDeleteSQL);
            $propImageDeleteResult = mysqli_query($con, $propImageDeleteSQL);
            

			if($propDeleteResult && $propImageDeleteResult){
				echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$propDelete.' Property Deleted Successfully</strong>
				
			</div>
			
			';
			
			}else{
				echo '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Delete Property</strong>
				
			</div>
			';
			}

		
	}
?>