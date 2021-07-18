<?php
    require_once('db.php');


    if(isset($_GET['agentEdit'])){

        $agentEdit = mysqli_real_escape_string($con, $_GET['agentEdit']);
        $agentMessageArray = array();
        
        $agentGetSQL = "SELECT * FROM agent WHERE agentid = '$agentEdit'";
        $agentGetResult = mysqli_query($con, $agentGetSQL);
        while($agentGetRow = mysqli_fetch_array($agentGetResult)){
            $agentMessageArray['agentId'] = $agentGetRow['agentid']; 
            $agentMessageArray['agentName'] = $agentGetRow['agentname']; 
            $agentMessageArray['agentBiography'] = $agentGetRow['agentbio'];
            $agentMessageArray['agentLocation'] = $agentGetRow['agentlocation'];
            $agentMessageArray['agentContact'] = $agentGetRow['agentcontact'];
            $agentMessageArray['agentEmail'] = $agentGetRow['agentemail'];
            
           
        }
        echo json_encode($agentMessageArray);
    }

    //========================= UPDATE
    if(isset($_POST['agentUpdateBTN'])){

        $updateAgentId = mysqli_real_escape_string($con, $_POST['updateAgentId']);
        $updateAgentName = mysqli_real_escape_string($con, $_POST['updateAgentName']);
        $updateAgentBiography = mysqli_real_escape_string($con, $_POST['updateAgentBiography']);
        $updateAgentLocation = mysqli_real_escape_string($con, $_POST['updateAgentLocation']);
        $updateAgentContact = mysqli_real_escape_string($con, $_POST['updateAgentContact']);
        $updateAgentEmail = mysqli_real_escape_string($con, $_POST['updateAgentEmail']);
        

			$agentUpdateSQL = "UPDATE agent SET agentname='$updateAgentName', agentbio='$updateAgentBiography', agentlocation='$updateAgentLocation', agentcontact='$updateAgentContact', agentemail='$updateAgentEmail' WHERE agentid='$updateAgentId'";

			$agentUpdateResult = mysqli_query($con, $agentUpdateSQL);

			if($agentUpdateResult){
				echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$updateAgentName.' Agent Updated Successfully</strong>
				
			</div>
			
			';
			
			}else{
				echo '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Update Agent</strong>
				
			</div>
			';
			}

		
	}

     //========================= Delete
     if(isset($_POST['agentDelete'])){
        $agentDelete = mysqli_real_escape_string($con, $_POST['agentDelete']);
       
			$agentDeleteSQL = "DELETE FROM agent WHERE agentid='$agentDelete'";
            

			$agentDeleteResult = mysqli_query($con, $agentDeleteSQL);
                       

			if($agentDeleteResult){
				echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$agentDelete.' Agent Deleted Successfully</strong>
				
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