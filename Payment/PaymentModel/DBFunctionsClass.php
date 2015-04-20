<?php

class DBFunctionsClass 
{
           public static function getAllInvoices()
                    {
            $dbcon = Db_connect::getDB();
            $query = "SELECT * FROM payments";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                    }
                    
             public static function getInvoiceById($invoice_id)
                    {
            $dbcon = Db_connect::getDB();
            $query = "SELECT * FROM payments WHERE id= $invoice_id";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                    }
                    
                    public static function getPropertiesID()
                            {
            $dbcon = Db_connect::getDB();
            $query = "SELECT id FROM properties";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                            }

                    public static function  getMyInvoices($tenat_id)
                    {
            $dbcon = Db_connect::getDB();
            $query = "SELECT payments.p_id, payments.tenant_id, payments.amount,
                     properties.id, properties.street FROM payments
                     LEFT JOIN
                     properties ON  payments.p_id = properties.id  WHERE payments.tenant_id = $tenat_id";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                    }
                    
           public static function deleteInvoice($invoice_id) {
            $dbcon = Db_connect::getDB();
            $query = "DELETE FROM payments
                  WHERE id = '$invoice_id'";
            $row_count = $dbcon->exec($query);
            return $row_count;
            
            
    }
    
    public static function updateInvoice($invoice, $invoice_id) {
        $dbcon = Db_connect::getDB();
        $p_id = $invoice->getP_id();
        $tenant_id =  $invoice->getTenant_id();
        $amount =  $invoice->getamount();
        $date =  $invoice->getDate();
        $query =
            "UPDATE payments
             SET  p_id='".$p_id."', tenant_id='".$tenant_id."', amount='".$amount."', date_rec='".$date."' WHERE id='".$invoice_id."' ";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
      public static function addInvoice($invoice) {
        $dbcon = Db_connect::getDB();
        $p_id = $invoice->getP_id();
        $tenant_id =  $invoice->getTenant_id();
        $amount =  $invoice->getamount();
        $date =  $invoice->getDate();
        $query =
            "INSERT INTO payments
                 (p_id, tenant_id, amount, date_rec)
             VALUES
                 ('$p_id', '$tenant_id', '$amount', '$date')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
    
            
}

