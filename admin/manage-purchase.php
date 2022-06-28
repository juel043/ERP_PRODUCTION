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
$purchasetitle=$_POST['PurchaseBy'];
$purchaseiteam=$_POST['PurchaseIteam'];
$purchaseshop=$_POST['PurchaseShop'];
$requsitiontitle=$_POST['RequisitionTitle'];
$purchasedetails=$_POST['PurchaseDetails'];
// $price=$_POST['Price'];
// $quantity=$_POST['Quantity'];
$mobile=$_POST['Mobile'];

// $t_price=$price*$quantity;

$id=intval($_GET['id']);

$sql="update tbl_purchase set PurchaseBy=:purchasetitle,PurchaseIteam=:purchaseiteam,PurchaseShop=:purchaseshop,RequisitionTitle=:requsitiontitle,PurchaseDetails=:purchasedetails,Mobile=:mobile where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':purchasetitle',$purchasetitle,PDO::PARAM_STR);
$query->bindParam(':purchaseiteam',$purchaseiteam,PDO::PARAM_STR);
$query->bindParam(':purchaseshop',$purchaseshop,PDO::PARAM_STR);
$query->bindParam(':requsitiontitle',$requsitiontitle,PDO::PARAM_STR);
$query->bindParam(':purchasedetails',$requisitiondetails,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);


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
	
	<title>MinMax | Admin Edit  Info</title>

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
					
						<h2 class="page-title">Edit Purchase</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tbl_purchase.*,tbliteam.IteamName,tbl_requisition.RequisitionTitle,tbl_requisition.id as rid,tbliteam.id as bid from tbl_purchase join tbliteam on tbliteam.id=tbl_purchase.PurchaseIteam
 join tbl_requisition on tbl_requisition.id=tbl_purchase.RequisitionTitle where tbl_purchase.id=:id";
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
<label class="col-sm-2 control-label">Purchase By<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="PurchaseBy" class="form-control" value="<?php echo htmlentities($result->PurchaseBy)?>" required>
</div>
<label class="col-sm-2 control-label">Select Iteam<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="PurchaseIteam" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->IteamName); ?> </option>
<?php $ret="select id,IteamName from tbliteam";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->IteamName==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->IteamName);?></option>
<?php }}} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Shop Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="PurchaseShop" class="form-control" value="<?php echo htmlentities($result->PurchaseShop);?>" required>
</div>



<label class="col-sm-2 control-label">Select Work Order<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="RequisitionTitle" required>
<option value="<?php echo htmlentities($result->rid);?>"><?php echo htmlentities($rname=$result->RequisitionTitle); ?> </option>
<?php $ret="select id,RequisitionTitle from tbl_requisition";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultsss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultsss as $resultss)
{
if($resultss->RequisitionTitle==$rname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($resultss->id);?>"><?php echo htmlentities($resultss->RequisitionTitle);?></option>
<?php }}} ?>

</select>
</div> 
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Purchase Details<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="PurchaseDetails" rows="3" required><?php echo htmlentities($result->PurchaseDetails);?></textarea>
</div>
</div>

<!-- <div class="form-group">
<label class="col-sm-2 control-label">Price<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Price" class="form-control" value="<?php echo htmlentities($result->Price);?>"readonly required>
</div>
<label class="col-sm-2 control-label">Quantity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Quantity" class="form-control" value="<?php echo htmlentities($result->Quantity);?>" readonly 
 required>
</div>

</div> -->


<div class="form-group">

<label class="col-sm-2 control-label">Mobile<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Mobile" class="form-control" value="<?php echo htmlentities($result->Mobile);?>" required>
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