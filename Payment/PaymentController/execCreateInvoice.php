<?php
require_once ('../../model/config.php');
require_once '../PaymentModel/DBconnect.php';
require_once '../PaymentModel/InvoiceClass.php';
require_once '../PaymentModel/DBFunctionsClass.php';
$p_id = $_POST['p_id'];
$tenant_id = $_POST['tenant_id'];
$amount = $_POST['amount'];
$date_recieved = (new \DateTime())->format('Y-m-d H:i:s');
$invoice = new invoiceClass($p_id, $tenant_id, $amount, $date);
DBFunctionsClass::addInvoice($invoice);
header('Location: ../PaymentView/InvoiceAdmin.php');
