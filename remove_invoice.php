<?php
require "dbconnection.php";
$dbcon = createDbConnection();

$body = file_get_contents("php://input");
$dataobject = json_decode($body);

$invoice_item_id = strip_tags($dataobject->invoiceId);

$sql = "DELETE FROM invoice_items WHERE invoiceId = ?";

$statement = $dbcon->prepare($sql);
$statement->execute(array($invoice_item_id));