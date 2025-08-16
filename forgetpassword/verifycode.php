<?php 

include "../db.php" ;

$email  = filterRequest("email") ; 

$verifycode = filterRequest("verifycode") ; 


$stmt = $con->prepare("SELECT * FROM users WHERE users_email = '$email' AND users_verifycode = '$verifycode' ") ; 
 
$stmt->execute() ; 

$count = $stmt->rowCount() ; 

echo json_encode(['count' => $count]);