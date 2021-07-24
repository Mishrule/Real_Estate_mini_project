<?php
include('../scripts/db.php');
 session_start();

$user_login = $_SESSION['user_login'];
$sessionSql = mysqli_query($con, "SELECT username, userid FROM users WHERE username='$user_login'");

$row = mysqli_fetch_array($sessionSql);
$login_Session_userName = $row["username"];
$login_Session_userid = $row["userid"];
if (!isset($_SESSION['user_login'])) {
    header("location:../index.php");
}
?>
