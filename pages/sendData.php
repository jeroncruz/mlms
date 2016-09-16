<?php
require ("controller/connection.php");
require('controller/createdata.php');

if (isset($_REQUEST)){

    $tfFirstName = $_POST['tfFirstName'];
    $tfMiddleName = $_POST['tfMiddleName'];
    $tfLastName= $_POST['tfLastName'];
    $tfAddress=$_POST['tfAddress'];
    $tfContactNo=$_POST['tfContactNo'];
    $tfDate=$_POST['tfDate'];
    $gender=$_POST['intGender'];
    $civilStatus=$_POST['intCivilStatus'];
	$dateCreated = date('Y-m-d',strtotime($tfDate));
	
    $createCustomer =  new createCustomer();
    $createCustomer->Create($tfFirstName,$tfMiddleName,$tfLastName,$tfAddress,$tfContactNo,$dateCreated,$gender,$civilStatus);
}

?>