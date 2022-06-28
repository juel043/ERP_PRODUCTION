<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$ordercustomer=$_POST['ordercustomer'];
$marketertitle=$_POST['marketertitle'];
$ordersheet=$_POST['ordersheet'];
$contactperson=$_POST['contactperson'];
$offermaker=$_POST['offermaker'];
$contactnumber1=$_POST['contactnumber1'];
$contactnumber2=$_POST['contactnumber2'];
$designation=$_POST['designation'];
$tweight=$_POST['tweight'];
$theoratical_weight=$_POST['theoratical_weight'];
$deliverdate=$_POST['deliverdate'];
$expt_del_date=$_POST['expt_del_date'];

$id=intval($_GET['id']); 

$sql="update tbl_order_details set Ordercustomer=:ordercustomer,Marketertitle=:marketertitle,Ordersheet=:ordersheet,Contactperson=:contactperson,Offermaker=:offermaker,Contactnumber1=:contactnumber1,Contactnumber2=:contactnumber2,Designation=:designation,Tweight=:tweight,
Theoratical_weight=:theoratical_weight,Deliverdate=:deliverdate,Expt_del_date=:expt_del_date where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':ordercustomer',$ordercustomer,PDO::PARAM_STR);
$query->bindParam(':marketertitle',$marketertitle,PDO::PARAM_STR);
$query->bindParam(':ordersheet',$ordersheet,PDO::PARAM_STR);
$query->bindParam(':contactperson',$contactperson,PDO::PARAM_STR);
$query->bindParam(':offermaker',$offermaker,PDO::PARAM_STR);
$query->bindParam(':contactnumber1',$contactnumber1,PDO::PARAM_STR);
$query->bindParam(':contactnumber2',$contactnumber2,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':tweight',$tweight,PDO::PARAM_STR);
$query->bindParam(':theoratical_weight',$theoratical_weight,PDO::PARAM_STR);
$query->bindParam(':deliverdate',$deliverdate,PDO::PARAM_STR);
$query->bindParam(':expt_del_date',$expt_del_date,PDO::PARAM_STR);

$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>MinMax | Admin Edit Order  Info</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Order</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tbl_order_details.*,tblcustomer.CustomerName,tblcustomer.id as bid from tbl_order_details join tblcustomer on tblcustomer.id=tbl_order_details.Ordercustomer where tbl_order_details.id=:id";

$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Marketer Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="marketertitle" class="form-control" value="<?php echo htmlentities($result->Marketertitle)?>" required>
</div>
<label class="col-sm-2 control-label">Select Customer<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="ordercustomer" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->CustomerName); ?> </option>
<?php $ret="select id,CustomerName from tblcustomer";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->CustomerName==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->CustomerName);?></option>
<?php }}} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Ordersheet<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="ordersheet" rows="3" required><?php echo htmlentities($result->Ordersheet);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contactperson<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="contactperson" class="form-control" value="<?php echo htmlentities($result->Contactperson);?>" required>
</div>

</div>


<div class="form-group">

<label class="col-sm-2 control-label">Offermaker<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="offermaker" class="form-control" value="<?php echo htmlentities($result->Offermaker);?>" required>
</div>

</div>

<div class="form-group">

<label class="col-sm-2 control-label">Contactnumber1<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="contactnumber1" class="form-control" value="<?php echo htmlentities($result->Contactnumber1);?>" required>
</div>

</div>

<div class="form-group">

<label class="col-sm-2 control-label">Contactnumber2<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="contactnumber2" class="form-control" value="<?php echo htmlentities($result->Contactnumber2);?>" required>
</div>

</div>
<div class="form-group">

<label class="col-sm-2 control-label">Designation<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="designation" class="form-control" value="<?php echo htmlentities($result->Designation);?>" required>
</div>

</div>
<div class="form-group">

<label class="col-sm-2 control-label">Tweight<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="tweight" class="form-control" value="<?php echo htmlentities($result->Tweight);?>" required>
</div>

</div>
<div class="form-group">

<label class="col-sm-2 control-label">Theoratical_weight<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="theoratical_weight" class="form-control" value="<?php echo htmlentities($result->Theoratical_weight);?>" required>
</div>

</div>
<div class="form-group">

<label class="col-sm-2 control-label">Deliverdate<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="deliverdate" class="form-control" value="<?php echo htmlentities($result->Deliverdate);?>" required>
</div>

</div>
<div class="form-group">

<label class="col-sm-2 control-label">Expt_del_date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="expt_del_date" class="form-control" value="<?php echo htmlentities($result->Expt_del_date);?>" required>
</div>

</div>
<div class="hr-dashed"></div>								







<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
	
							



<?php }} ?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >
													
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>