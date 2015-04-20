<?php
require_once ('../../model/config.php');
require_once '../PaymentModel/DBconnect.php';
require_once '../PaymentModel/InvoiceClass.php';
require_once '../PaymentModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="../forum.css">
        <title></title>
    </head>
    <body>
<?php

 echo "<form method='post' action='../PaymentController/execCreateInvoice.php'>
        Enter Tenant ID:<br /> <input class='input-xlarge', type='text' name='tenant_id' /><br />
        
        Property ID:<br /> <input class='input-xlarge' name='p_id' />
        </input><br />
        
         Amount:<br /> <input class='input-xlarge' name='amount' />
        </input><br />
        
        <input type='submit'  class='btn btn-primary btn-lg' value='Create Invoice' />
     </form>";
     include ('../../view/footer.php'); 
     ?>
    </body>
</html>
