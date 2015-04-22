<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php'); 
require_once '../../Model/PaymentModel/DBconnect.php';
require_once '../../Model/PaymentModel/InvoiceClass.php';
require_once '../../Model/PaymentModel/DBFunctionsClass.php';
echo "<a href='createInvoice.php' class='btn btn-primary'>Insert new Invoice</a><br />";

  if(isset($_SESSION['admin'])){
if (isset($_POST['action'])){
        $invoice_id = $_POST['invoice_id'];
        DBFunctionsClass::deleteInvoice($invoice_id);
        }
?>
<html>
    <head>
        <title>Add new Invoice</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
         <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Property ID</th>
            <th>Tenant ID</th>
            <th>Amount</th>
             <th>Date</th>
          </tr>
        </thead>
        <tbody>

        <?php        
$result = DBFunctionsClass::getAllInvoices();
foreach ($result as $row)
    {
      echo '<tr><td>' . $id = $row->id;  
      echo "</td>";
      echo '<td>' . $p_id = $row->p_id;
      echo "</td>";
      echo '<td>' . $tenant_id = $row->tenant_id;
      echo "</td>";
      echo '<td>' . $amount = $row->amount;
      echo "</td>";
      echo '<td>' . $date = $row->date_rec;
      echo "</td>";
  
      //Update
      echo "<td><form action='updateInvoice.php' method='post' id='update_invoice'>";
      echo "<input type='hidden' name='invoice_id' value='".$row->id."' />";
      echo "<button  name='edit' class='btn btn-info'>Edit</button></form></td>";
      //Delete
      echo "<td><form action='invoiceadmin.php' method='post' id='delete_invoice'>";
      echo "<input type='hidden' name='action' value='delete_invoice' />";
      echo "<input type='hidden' name='invoice_id' value='".$row->id."' />";
      echo "<button  name='edit' class='btn btn-danger'>Delete</button></form></td></tr>";
    
          
    }   
    echo "</tbody></table>";
     }else {echo "You do not have permission";}
?>       
</body>
</html>
<?php
include ('../../view/footer.php');
?>




