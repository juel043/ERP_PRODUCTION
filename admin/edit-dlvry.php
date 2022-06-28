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
$date=$_POST['date'];
$delivery_weight=$_POST['delivery_weight'];
$ins_date=$_POST['ins_date'];
$ttl_lbr_wrk=$_POST['ttl_lbr_wrk'];
$remarks=$_POST['remarks'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);

$id=intval($_GET['id']); 

$sql="update tbl_dlvr_install set Ordercustomer=:ordercustomer,Date1=:date,Delivery_Weight=:delivery_weight,Ins_Date=:ins_date,Ttl_Lbr_Wrk=:ttl_lbr_wrk,Remarks=:remarks,Vimage1=:vimage1,Vimage2=:vimage2,Vimage3=:vimage3 where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':ordercustomer',$ordercustomer,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':delivery_weight',$delivery_weight,PDO::PARAM_STR);
$query->bindParam(':ins_date',$ins_date,PDO::PARAM_STR);
$query->bindParam(':ttl_lbr_wrk',$ttl_lbr_wrk,PDO::PARAM_STR);
$query->bindParam(':remarks',$remarks,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
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
	
	<title>MinMax | Admin Delivery Install</title>

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
					
						<h2 class="page-title">Edit Delivery & Insatll</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tbl_dlvr_install.*,tblcustomer.CustomerName,tblcustomer.id as bid from tbl_dlvr_install join tblcustomer on tblcustomer.id=tbl_dlvr_install.Ordercustomer where tbl_dlvr_install.id=:id";

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
<label class="col-sm-2 control-label">Date<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="date" rows="3" required><?php echo htmlentities($result->Date1);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Delivery Weight<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="delivery_weight" class="form-control" value="<?php echo htmlentities($result->Delivery_Weight);?>" required>
</div>

</div>


<div class="form-group">

<label class="col-sm-2 control-label">Mobile No<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="ttl_lbr_wrk" class="form-control" value="<?php echo htmlentities($result->Ttl_Lbr_Wrk);?>" required>
</div>

</div>
<div class="form-group">

<label class="col-sm-2 control-label">Driver Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="ins_date" class="form-control" value="<?php echo htmlentities($result->Ins_Date);?>" required>
</div>

<label class="col-sm-2 control-label">Vehicale  No<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicale_no" class="form-control" value="<?php echo htmlentities($result->Vehicale_No);?>"  required>
</div>

</div>

<div class="form-group">

<label class="col-sm-2 control-label">Remarks <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="remarks" class="form-control" value="<?php echo htmlentities($result->Remarks);?>" required>
</div>

</div>

<div class="form-group">


<div class="col-sm-4">
	<div class="car-info-box" style="height: 200px; width: 200px;">
		<a href="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" download>
		<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="<?php echo htmlentities($result->Vimage1);?>"></a>
</div>
Attachment <span style="color:red">*</span><input type="file" name="img1" required>
</div>


<div class="col-sm-4">
<div class="car-info-box" style="height: 200px; width: 200px;">
		<a href="img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" download>
		<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="<?php echo htmlentities($result->Vimage2);?>"></a>
</div>
Attachment 2<input type="file" name="img2">
</div>
<div class="col-sm-4">
<div class="car-info-box" style="height: 200px; width: 200px;">
		<a href="img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" download>
		<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="<?php echo htmlentities($result->Vimage3);?>"></a>
</div>
Attachment 3<input type="file" name="img3">
</div>



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