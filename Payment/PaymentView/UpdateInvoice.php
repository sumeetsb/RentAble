<?php
require_once ('../../model/config.php');
require_once '../../Model/PaymentModel/DBconnect.php';
require_once '../../Model/PaymentModel/InvoiceClass.php';
require_once '../../Model/PaymentModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 
$cssArray[] = "register.css";


if(isset($_POST['invoice_id'])){
    $result = DBFunctionsClass::getInvoiceById($_POST['invoice_id']);
} else {
    $result = DBFunctionsClass::getInvoiceById($id);
    
}

    foreach ($result as $row){           
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
        <legend>Update Invoice</legend>
        <form class="form-horizontal" action="../PaymentController/execUpdateInvoice.php?id=<?php echo $row->id ?>" method="post">
    <fieldset style="margin-left: 2%; ">

       <label class="control-label" for="p_id">Property ID</label>
    <?php 
echo '<select name="p_id">';
    $resultForPropertyID = DBFunctionsClass::getPropertiesID();
                    foreach($resultForPropertyID as $rowForID)
                    {
                        echo '<option value="' . $rowForID->id . '">' . $rowForID->id . '</option>';
                    }
echo '</select>'; 
                ?>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="tenant_id">Tenant ID</label>
  <div class="controls">
    <input id="landlord_id" name="tenant_id" type="text" value="<?php echo $tenant_id = $row->tenant_id;
       ?>"  class="input-xlarge">
    
  </div>
  
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="amount">Amount</label>
  <div class="controls">
    <input id="landlord_id" name="amount" type="text" value="<?php echo $amount = $row->amount;
       ?>"  class="input-xlarge">
    
  </div>
  
</div>
  
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="date">Date</label>
  <div class="controls">
    <input id="landlord_id" name="date" type="text" value="<?php echo $date = $row->date_rec;
       ?>"  class="input-xlarge">
    
  </div>
  
  
<div class="control-group">
  <label class="control-label" for="btn"></label>
  <div class="controls">
    <input type="hidden" name='id' value="<?php echo $id = $row->id;?>"/>
    <button id="btn" name="update" class="btn btn-primary">Submit</button>
  </div>
</div>
 <?php  
    }
    if(isset($errors))
        {
        foreach ($errors as $er)
            {
            echo '<p class="error">'.$er.'</p>';
            }
        }
include ('../../view/footer.php'); 
?>
  </body>
</html>






