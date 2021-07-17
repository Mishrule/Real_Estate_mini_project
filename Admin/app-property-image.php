<?php require_once('../scripts/db.php'); ?>
<?php 
	require_once('../scripts/datetime.php');

	$propMessage = '';
	if(isset($_POST['submit'])){

        $propertyId = mysqli_real_escape_string($con, $_POST['propertyId']);
        $Image = $_FILES['propImage']['name'];
		// $propIndexNumber = mysqli_real_escape_string($con, $_POST['propIndexNumber']);

		if($propertyId == ''){
			$propMessage = '

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Property Name cannot be empty.</strong>
			</div>
			';
		}else if($Image == ''){
			$propMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Please select an Image.</strong>
				
			</div>
			';
		}else {
            
			$Image = $_FILES['propImage']['name'];
    		$Target = "assets/images/" . basename($_FILES['propImage']['name']);
			$propRegisterSQL = "INSERT INTO propertyimage VALUES('$propertyId','$Image','$DateTime')";

			$propRegisterResult = mysqli_query($con, $propRegisterSQL);
			move_uploaded_file($_FILES['propImage']['tmp_name'], $Target);

			if($propRegisterResult){
				$propMessage = '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Property with ID '.$propertyId.'  has been Added</strong>
				
			</div>
			
			';
			header("Refresh:3");
			}else{
				$propMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Add Property</strong>
				
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
                    <h3>Create Property</h3>
                    <p class="text-subtitle text-muted">Add New Property</p>
                </div>
                
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Add Property</h3>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                        <div class="row" id="notify">
                                            <?php echo $propMessage; ?>
                                        </div>
                                            <form class="form form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Property Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text"
                                                                for="propertyId">Property Name</label>
                                                            <select class="form-select" id="propertyId" name="propertyId">
                                                            <?php 
                                                                $retrievePropSQL = "SELECT * FROM property ORDER BY createddate DESC LIMIT 10";
                                                                $retrievePropResult = mysqli_query($con, $retrievePropSQL);
                                                                if(mysqli_num_rows($retrievePropResult) > 0){
                                                                    while($retrievePropRow = mysqli_fetch_array($retrievePropResult)){
                                                                        echo '
                                                                        <option value="'.$retrievePropRow['propid'].'">'.$retrievePropRow['propname'].'</option>
 
                                                                        ';
                                                                    }
                                                                }else{
                                                                    echo '
                                                                        <option>No Record</option>
                                                                    ';
                                                                }
                                                            ?>
                                                                                                                               
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Property Image</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <div class="form-file">
                                                                <input type="file" class="form-file-input" id="propImage" name="propImage">
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="propertyAgreeCheck" class='form-check-input'>
                                                                    <label for="propertyAgreeCheck">Agree to Add</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-primary me-1 mb-1">Create Property</button>
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
                        <!--
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Last 10 Registered Property</h4>
                                </div>
                                <div class="card-body">
                                <ul class="list-group">
                                <?php 
                                    $retrievePropSQL = "SELECT * FROM property ORDER BY createddate";
                                    $retrievePropResult = mysqli_query($con, $retrievePropSQL);
                                    if(mysqli_num_rows($retrievePropResult) > 0){
                                        while($retrievePropRow = mysqli_fetch_array($retrievePropResult)){
                                            echo '
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span> '.$retrievePropRow['propname'].'</span>
                                                <span class="badge bg-info badge-pill badge-round ml-1">'.$retrievePropRow['propamountcharged'].'</span>
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
                        </div> -->
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
        $('#propertyAgreeCheck').click(function(){
            if($('#propertyAgreeCheck').is(':checked')){
                $('#submit').show();
            }else{
                $('#submit').hide();
            }
        });
        
    })
</script>