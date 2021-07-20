<?php require_once('../scripts/db.php'); ?>
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
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Payment</h3>
                    <p class="text-subtitle text-muted">Make Payment</p>
                </div>
                
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Pay</h3>
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
                                                            <label>Tenant Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="tenantName" class="form-control" name="tenantName" placeholder="Name of Tenant">
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <label>Property Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                           <select class="form-select" id="propertyname" name="propertyname">
                                                               <option>Please Select</option>
                                                           <?php 
                                                                $propSQL = "SELECT * FROM property";
                                                                $propResult = mysqli_query($con, $propSQL);
                                                                if(mysqli_num_rows($propResult)>0){
                                                                    while($propRow = mysqli_fetch_array($propResult)){
                                                                        echo'
                                                                            <option value="'.$propRow['propid'].'">'.$propRow['propname'].'</option>
                                                                        ';
                                                                    }
                                                                }else{
                                                                    echo'
                                                                        <option value="None">None</option>
                                                                    ';
                                                                }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        

                                                        <div class="col-md-4">
                                                            <label>Name of Landlord</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            
                                                            <select class="form-select" id="landlord" name="landlord">
                                                            <?php 
                                                                $landlordSQL = "SELECT * FROM landlord";
                                                                $landlordResult = mysqli_query($con, $landlordSQL);
                                                                if(mysqli_num_rows($landlordResult)>0){
                                                                    while($landlordRow = mysqli_fetch_array($landlordResult)){
                                                                        echo'
                                                                            <option value="'.$landlordRow['landlordname'].'">'.$landlordRow['landlordname'].'</option>
                                                                        ';
                                                                    }
                                                                }else{
                                                                    echo'
                                                                        <option value="None">None</option>
                                                                    ';
                                                                }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Number of Month to rent</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="rentmonth" class="form-control" name="rentmonth" placeholder="Number of Month to Rent">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Amount per Month</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="amountpermonth" class="form-control" name="amountpermonth" placeholder="Amount per Month" disabled>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Amount Charged by Agency</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="amountChargedByAgency" class="form-control" name="amountChargedByAgency" placeholder="Amount Charged by Agency" disabled>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Total Payment</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="totalPayment" class="form-control" name="totalPayment" placeholder="TotalPayment">
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
                        <p>2020 &copy; Rabdan Real Estate</p>
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

        $('#propertyname').change(function(){
            var changeRoom = $('#propertyname').val();
            // alert(changeRoom);
            $.ajax({
                url:'../scripts/makepaymentScript.php',
                method:'GET',
                dataType: 'json',
                data:{changeRoom},
                success: function(data){
                    $('#amountpermonth').val(data.amountpermonth);
                    $('#amountChargedByAgency').val(data.amountChargedByAgency);
                }
            })
        });
        
        $('#rentmonth').keyup(function(){
            var rentmonth = $('#rentmonth').val();
            alert(rentmonth);
        });
    })
</script>