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
$sup_name=$_POST['sup_name'];
$sup_num=$_POST['sup_num'];
$ttl_lbr_wrk=$_POST['ttl_lbr_wrk'];
$remarks=$_POST['remarks'];
$ttl_paymnt=$_POST['ttl_paymnt'];

$id=intval($_GET['id']); 

$sql="update tbl_install set Ordercustomer=:ordercustomer,Date1=:date,Sup_Name=:sup_name,Sup_Num=:sup_num,Ttl_Lbr_Wrk=:ttl_lbr_wrk,Remarks=:remarks,Ttl_Paymnt=:ttl_paymnt where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':ordercustomer',$ordercustomer,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':sup_name',$sup_name,PDO::PARAM_STR);
$query->bindParam(':sup_num',$sup_num,PDO::PARAM_STR);
$query->bindParam(':ttl_lbr_wrk',$ttl_lbr_wrk,PDO::PARAM_STR);
$query->bindParam(':remarks',$remarks,PDO::PARAM_STR);
$query->bindParam(':ttl_paymnt',$ttl_paymnt,PDO::PARAM_STR);
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
	
	<title>MinMax | Admin  Install</title>

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
					
						<h2 class="page-title">Edit   Insatllation</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tbl_install.*,tblcustomer.CustomerName,tblcustomer.id as bid from tbl_install join tblcustomer on tblcustomer.id=tbl_install.Ordercustomer where tbl_install.id=:id";

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
<div class="col-sm-4">
	<input type="text" name="date" class="form-control" value="<?php echo htmlentities($result->Date1);?>" required>
</div>
<label class="col-sm-2 control-label">Super Visor Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="sup_name" class="form-control" value="<?php echo htmlentities($result->Sup_Name);?>" required>
</div>

</div>

<div class="form-group">

<label class="col-sm-2 control-label">Supervisor Phone Number<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="sup_num" class="form-control" value="<?php echo htmlentities($result->Sup_Num);?>" required>
</div>

</div>

<div class="form-group">

<label class="col-sm-2 control-label">Labour Worker<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="ttl_lbr_wrk" class="form-control" value="<?php echo htmlentities($result->Ttl_Lbr_Wrk);?>" required>
</div>

<label class="col-sm-2 control-label">Remarks <span style="color:red">*</span></label>

<div class="col-sm-4">  
		<textarea name="remarks" class="form-control" required><?php echo htmlentities($result->Remarks);?></textarea>
</div>

</div>

<div class="form-group">



<label class="col-sm-2 control-label">Total Payment<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="ttl_paymnt" class="form-control" value="<?php echo htmlentities($result->Ttl_Paymnt);?>" required>
</div>

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