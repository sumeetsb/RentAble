<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php'); 
require_once '../PaymentModel/DBconnect.php';
require_once '../PaymentModel/InvoiceClass.php';
require_once '../PaymentModel/DBFunctionsClass.php';
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='ivinog-facilitator@mail.ru'; // Business email ID
$amount = 100;
$tenat_id = $_SESSION['id'];
$result = DBFunctionsClass::getMyInvoices($tenat_id);
if (!$result)
    {
    echo "You don't have active invoices!";
    }
    else
    {
?>
<h4>My Invoices</h4>

 <?php foreach ($result as $row){ ?>
<div class="invoice">
    
    <label><?php echo$row->street?></label>
    <br />
    <label><?php echo$row->amount?></label>
   
    <div class="btn">
    <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?php echo $row->street; ?>">
    <input type="hidden" name="userid" value="<?php echo $_SESSION['id']; ?>">
    <input type="hidden" name="amount" value="<?php echo $row->amount; ?>">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="CAD">
    <input type="hidden" name="handling" value="0">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form> 
    </div>
</div>
<?php
    }
 }
include ('../../view/footer.php'); 
?>
