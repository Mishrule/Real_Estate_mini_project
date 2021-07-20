<?php 
    require_once('db.php');

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
?>