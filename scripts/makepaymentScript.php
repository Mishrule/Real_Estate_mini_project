<?php 
    require_once('db.php');
    require_once('datetime.php');

    if(isset($_GET['changeRoom'])){
        $propMessageArray = array();
        $changeRoom = mysqli_real_escape_string($con, $_GET['changeRoom']);
        $changeSQL = "SELECT * FROM property WHERE propid = $changeRoom";
        $changeResult =  mysqli_query($con, $changeSQL);
        while($changeRow = mysqli_fetch_array($changeResult)){
            $propMessageArray['amountpermonth'] = $changeRow['propamount'];
            $propMessageArray['amountChargedByAgency'] = $changeRow['propamountcharged'];
        }
        echo json_encode($propMessageArray);
    }

    if(isset($_POST['paymentBTN'])){
        $tenantName = mysqli_real_escape_string($con, $_POST['tenantName']);
        $propertyname = mysqli_real_escape_string($con, $_POST['propertyname']);
        $landlord = mysqli_real_escape_string($con, $_POST['landlord']);
        $rentmonth = mysqli_real_escape_string($con, $_POST['rentmonth']);
        $amountpermonth = mysqli_real_escape_string($con, $_POST['amountpermonth']);
        $amountChargedByAgency = mysqli_real_escape_string($con, $_POST['amountChargedByAgency']);
        $totalPaymentAgency = mysqli_real_escape_string($con, $_POST['totalPaymentAgency']);
        $totalPaymentLandlord = mysqli_real_escape_string($con, $_POST['totalPaymentLandlord']);
        $totalPayment = mysqli_real_escape_string($con, $_POST['totalPayment']);
        $date_year = mysqli_real_escape_string($con, $_POST['date_year']);
        $transactionid = mysqli_real_escape_string($con, $_POST['transactionid']);
        $date_month = mysqli_real_escape_string($con, $_POST['date_month']);

        $transactionSQL = "INSERT INTO payment VALUES('','$tenantName','$propertyname','$landlord','$rentmonth','$amountpermonth','$amountChargedByAgency','$totalPaymentAgency','$totalPaymentLandlord','$totalPayment','$transactionid','$date_month','$date_year','$DateTime')";

        $transactionResult = mysqli_query($con, $transactionSQL);

        if($transactionResult){
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Transaction successfull with Transaction ID '.$transactionid.' </strong>
            </div>
            ';
        }else{
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>'.$mysqli_error($con).' Failed to perform transaction</strong>
            </div>
            ';
        }
    }
?>