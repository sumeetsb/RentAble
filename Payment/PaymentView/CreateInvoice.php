<?php
require_once ('../../model/config.php');
require_once '../../Model/PaymentModel/DBconnect.php';
require_once '../../Model/PaymentModel/InvoiceClass.php';
require_once '../../Model/PaymentModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../../css/main.css" />
        <link rel="stylesheet" href="../forum.css">
        <title></title>
    </head>
    <body>
<?php
     if ($_POST){
     echo "<b>".$errorList."</b>";
     };

     ?>
        
        <form method='post' action='../PaymentController/execCreateInvoice.php'>
        Enter Tenant ID:<br /> 
        <input class='input-xlarge' type='text' name='tenant_id' value='<?php if(isset($_POST["tenant_id"])) {echo $_POST["tenant_id"];} ?>'/><br />
        
        Property ID:<br /> <input class='input-xlarge' name='p_id' value='<?php if(isset($_POST["p_id"])) {echo $_POST["p_id"];} ?>' />
        </input><br />
        
         Amount:<br /> <input class='input-xlarge' name='amount' value='<?php if(isset($_POST["amount"])) {echo $_POST["amount"];} ?>' />
        </input><br />
        
        <input type='submit'  class='btn btn-primary btn-lg' value='Create Invoice' />
     </form>
        <?php
     include ('../../view/footer.php'); 
     ?>
    </body>
</html>
