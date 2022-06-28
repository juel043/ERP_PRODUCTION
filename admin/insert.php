<?php



session_start();
include('includes/config.php');

$data = array(
 ':ordercustomer'  => $_POST["ordercustomer"],
 ':dates'  => $_POST["dates"],
 ':Weight'  => $_POST["Weight"]
); 

$query = "
 INSERT INTO tbl_production 
(ordercustomer,dates,Weight) 
VALUES (:ordercustomer,:dates, :Weight)
";

$statement = $dbh->prepare($query);

if($statement->execute($data))
{
 $output = array(
  'ordercustomer' => $_POST['ordercustomer'],
  'dates' => $_POST['dates'],
  'Weight'  => $_POST['Weight']
 );

 echo json_encode($output);
}

?>


