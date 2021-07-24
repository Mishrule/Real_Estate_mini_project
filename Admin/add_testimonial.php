<?php require_once('../scripts/db.php'); require('session.php');?>
<?php 
	require_once('../scripts/datetime.php');

	$testimonalMessage = '';
	if(isset($_POST['submit'])){
     
        $testimonalName = mysqli_real_escape_string($con, $_POST['testimonalName']);
        $testimonalDescription = mysqli_real_escape_string($con, $_POST['testimonalDescription']);
        $testimonalLocation = mysqli_real_escape_string($con, $_POST['testimonalLocation']);
        
        // $testimonalImage = mysqli_real_escape_string($con, $_POST['testimonalImage']);
        $Image = $_FILES['testimonalImage']['name'];

		if($testimonalName == ''){
			$testimonalMessage = '

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Testmonial Name cannot be empty.</strong>
			</div>
			';
		}else if($testimonalDescription == ''){
			$testimonalMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Testimonal Description Cannot be empty.</strong>
				
			</div>
			';
		}else if($testimonalLocation== ''){
			$testimonalMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Testimonal Location cannot be empty.</strong>
				
			</div>
			';
		}else if($Image == ''){
			$testimonalMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Testimal Image Cannot be empty.</strong>
				
			</div>
			';
		}else {
            $Target = "assets/images/" . basename($_FILES['testimonalImage']['name']);
			$testimonalRegisterSQL = "INSERT INTO testimonial VALUES('','$testimonalName','$testimonalDescription','$testimonalLocation','$Image','$DateTime')";

			$testimonalRegisterResult = mysqli_query($con, $testimonalRegisterSQL);
			move_uploaded_file($_FILES['testimonalImage']['tmp_name'], $Target);

			if($testimonalRegisterResult){
				$testimonalMessage = '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$testimonalName.' testimonal Registered Successfully</strong>
				
			</div>
			
			';
			header("Refresh:3");
			}else{
				$testimonalMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Create testimonal</strong>
				
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
                    <h3>Register Testimonial</h3>
                    <p class="text-subtitle text-muted">Add New Testimonial</p>
                </div>
                
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Add Testimonial</h3>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                        <div class="row" id="notify">
                                            <?php echo $testimonalMessage; ?>
                                        </div>
                                            <form class="form form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Testimonial Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="testimonalName" class="form-control" name="testimonalName" placeholder="Testimonal Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Testimonial Description</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            
                                                            <div class="form-group with-title mb-3">
                                                                <textarea class="form-control" id="testimonalDescription" name="testimonalDescription"
                                                                    rows="3"></textarea>
                                                                <label>Testimonal Description</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Testimonal Location</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="testimonalLocation" class="form-control" name="testimonalLocation" placeholder="Testimonal Location">
                                                        </div>
                                                        

                                                                                                                
                                                        <div class="col-md-4">
                                                            <label>Testimonal Image</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <div class="form-file">
                                                                <input type="file" class="form-file-input" id="testimonalImage" name="testimonalImage">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="testimonalAgreeCheck" class='form-check-input'>
                                                                    <label for="testimonalAgreeCheck">Agree to Register</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-primary me-1 mb-1">Register testimonal</button>
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
                                    <h4>Last 10 Registered Testimonal</h4>
                                </div>
                                <div class="card-body">
                                <ul class="list-group">
                                <?php 
                                    $retrieveTestimonalSQL = "SELECT * FROM testimonial ORDER BY createddate DESC LIMIT 10";
                                    $retrieveTestimonalResult = mysqli_query($con, $retrieveTestimonalSQL);
                                    if(mysqli_num_rows($retrieveTestimonalResult) > 0){
                                        while($retrieveTestimonalRow = mysqli_fetch_array($retrieveTestimonalResult)){
                                            echo '
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span> '.$retrieveTestimonalRow['testimonalname'].'</span>
                                                <span class="badge bg-info badge-pill badge-round ml-1">'.$retrieveTestimonalRow['createddate'].'</span>
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
        $('#testimonalAgreeCheck').click(function(){
            if($('#testimonalAgreeCheck').is(':checked')){
                $('#submit').show();
            }else{
                $('#submit').hide();
            }
        });
        
    })
</script>