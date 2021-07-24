<?php require_once('../scripts/db.php'); require('session.php');?>
<?php 
	require_once('../scripts/datetime.php');

	$agentMessage = '';
	if(isset($_POST['submit'])){
     
        $agentName = mysqli_real_escape_string($con, $_POST['agentName']);
        $agentBiography = mysqli_real_escape_string($con, $_POST['agentBiography']);
        $agentLocation = mysqli_real_escape_string($con, $_POST['agentLocation']);
        $agentContact = mysqli_real_escape_string($con, $_POST['agentContact']);
        $agentEmail = mysqli_real_escape_string($con, $_POST['agentEmail']);
        // $agentImage = mysqli_real_escape_string($con, $_POST['agentImage']);
        $Image = $_FILES['agentImage']['name'];

		if($agentName == ''){
			$agentMessage = '

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Agent Name cannot be empty.</strong>
			</div>
			';
		}else if($agentBiography == ''){
			$agentMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Agent Biography Cannot be empty.</strong>
				
			</div>
			';
		}else if($agentLocation== ''){
			$agentMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Agent Location cannot be empty.</strong>
				
			</div>
			';
		}else if($agentContact == ''){
			$agentMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Agent Contact Cannot be empty.</strong>
				
			</div>
			';
		}else if($Image == ''){
			$agentMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Agent Image Cannot be empty.</strong>
				
			</div>
			';
		}else {
             
			
    		$Target = "assets/images/" . basename($_FILES['agentImage']['name']);
			$agentRegisterSQL = "INSERT INTO agent VALUES('','$agentName','$agentBiography','$agentLocation','$agentContact','$agentEmail','$Image','$DateTime')";

			$agentRegisterResult = mysqli_query($con, $agentRegisterSQL);
			move_uploaded_file($_FILES['agentImage']['tmp_name'], $Target);

			if($agentRegisterResult){
				$agentMessage = '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$agentName.' Agent Registered Successfully</strong>
				
			</div>
			
			';
			header("Refresh:3");
			}else{
				$agentMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Create Agent</strong>
				
			</div>
			';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.php'); ?>

<body>
    <div id="app">
        <?php require_once('inc/aside.php'); ?>

        <div id="main">
        <?php require_once('inc/nav.php'); ?>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Register An Agent</h3>
                    <p class="text-subtitle text-muted">Add New Agent</p>
                </div>
                
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Add Agent</h3>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                        <div class="row" id="notify">
                                            <?php echo $agentMessage; ?>
                                        </div>
                                            <form class="form form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Agent Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="agentName" class="form-control" name="agentName" placeholder="Agent Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Agent Biograph</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            
                                                            <div class="form-group with-title mb-3">
                                                                <textarea class="form-control" id="agentBiography" name="agentBiography"
                                                                    rows="3"></textarea>
                                                                <label>Agent Biography</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Agent Location</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="agentLocation" class="form-control" name="agentLocation" placeholder="Agent Location">
                                                        </div>
                                                        

                                                        <div class="col-md-4">
                                                            <label>Agent Contact</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="agentContact" class="form-control" name="agentContact" placeholder="Agent Phone Number">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Agent Email</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="email" id="agentEmail" class="form-control" name="agentEmail" placeholder="Agent Email">
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-4">
                                                            <label>Agent Image</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <div class="form-file">
                                                                <input type="file" class="form-file-input" id="agentImage" name="agentImage">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="agentAgreeCheck" class='form-check-input'>
                                                                    <label for="agentAgreeCheck">Agree to Register</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-primary me-1 mb-1">Register Agent</button>
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- <div class="col-md-8 col-12"> -->
                                            <!-- <canvas id="bar"></canvas> -->
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Last 10 Registered Agent</h4>
                                </div>
                                <div class="card-body">
                                <ul class="list-group">
                                <?php 
                                    $retrieveAgentSQL = "SELECT * FROM agent ORDER BY createddate DESC LIMIT 10";
                                    $retrieveAgentResult = mysqli_query($con, $retrieveAgentSQL);
                                    if(mysqli_num_rows($retrieveAgentResult) > 0){
                                        while($retrieveAgentRow = mysqli_fetch_array($retrieveAgentResult)){
                                            echo '
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span> '.$retrieveAgentRow['agentname'].'</span>
                                                <span class="badge bg-info badge-pill badge-round ml-1">'.$retrieveAgentRow['agentcontact'].'</span>
                                            </li>
                                            ';
                                        }
                                    }else{
                                        echo '
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>No Records Found</span>
                                            <span class="badge bg-warning badge-pill badge-round ml-1">0</span>
                                        </li>
                                        ';
                                    }
                                ?>
                                 </ul>       
       
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Rabdan Real Estate</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php require_once('inc/js.php'); ?>
</body>

</html>
<script>
    $(document).ready(function(){
        $('#submit').hide();
        $('#agentAgreeCheck').click(function(){
            if($('#agentAgreeCheck').is(':checked')){
                $('#submit').show();
            }else{
                $('#submit').hide();
            }
        });
        
    })
</script>