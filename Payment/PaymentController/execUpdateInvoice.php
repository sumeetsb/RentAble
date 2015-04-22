<?php
require_once ('../../model/config.php');
require_once '../../Model/PaymentModel/DBconnect.php';
require_once '../../Model/PaymentModel/InvoiceClass.php';
require_once '../../Model/PaymentModel/DBFunctionsClass.php';
$cssArray[] = "register_prop.css";
function classloader($class) {
    $classStr = '../../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

///IF user logged in AND user is landlord, show property registration form
///ELSE go back to home
$p_id = "";
$tenant_id = "";
$amount = "";
$errors = array();

if(isset($_SESSION['admin'])){
    $errors = array();
//    $landlord_id = $_SESSION['id'];
    if(isset($_POST['update'])){
        
        $p_id = htmlspecialchars($_POST['p_id']);
        $tenant_id = htmlspecialchars($_POST['tenant_id']);
        $amount = htmlspecialchars($_POST['amount']);
  
        $validator = new Validation();
        $validator->todoVal("p_id", $p_id, "required");
        $validator->todoVal("tenant_id", $tenant_id, "required");
        $validator->todoVal("amount", $amount, "required");
        $validator->validate();
        
        $errors = $validator->errors;
        if(empty($errors)){
$p_id = $_POST['p_id'];
$tenant_id = $_POST['tenant_id'];
$amount = $_POST['amount'];
$date_rec = $_POST['date'];
$invoice = new invoiceClass($p_id, $tenant_id, $amount, $date_rec);
DBFunctionsClass::updateInvoice($invoice, $_POST['id']);
header('Location: ../PaymentView/InvoiceAdmin.php');
}else {
    $id = $_POST['id'];
    include ('../PaymentView/UpdateInvoice.php');
}
    
    
}

        }
        
        

