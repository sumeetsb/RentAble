<?php
require_once ('../../model/config.php');
require_once '../../Model/PaymentModel/DBconnect.php';
require_once '../../Model/PaymentModel/InvoiceClass.php';
require_once '../../Model/PaymentModel/DBFunctionsClass.php';
function validateUserInput($userInput)
{
    $error = "";
    if(empty($userInput["p_id"])){
        $error .= "Property ID is required <br />";
    }
    if(empty($userInput["tenant_id"])){
        $error .= "Please, Enter Tenant ID <br />";
    }
    if(empty($userInput["amount"])){
        $error .= "Amount is required <br />";
    }
    if ($error != "")
        {
        return $error;
        }
        else
            {
            $error = "valid";
            return $error;
            }
}
$errorList = validateUserInput($_POST);


if ($errorList!="valid") {    
    include('../PaymentView/CreateInvoice.php');
//    echo $errorList;
}
else {
$p_id = $_POST['p_id'];
$tenant_id = $_POST['tenant_id'];
$amount = $_POST['amount'];
$date_recieved = (new \DateTime())->format('Y-m-d H:i:s');
$invoice = new invoiceClass($p_id, $tenant_id, $amount, $date);
DBFunctionsClass::addInvoice($invoice);
header('Location: ../PaymentView/InvoiceAdmin.php');
}
