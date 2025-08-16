<?php
include "../db.php";
$email = filterRequest("email");

$verifycode     = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("users_verifycode" => $verifycode);
    updateData("users", $data, "users_email = '$email'", false);
    sendEmail($email, "Verify Code DAD_APP", "Verfiy Code $verifycode");
}