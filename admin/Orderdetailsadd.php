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
 

$sql="INSERT INTO tbl_order_details(Ordercustomer,Marketertitle,Ordersheet,Contactperson,Offermaker,Contactnumber1,Contactnumber2,Designation,Tweight,Theoratical_weight,Deliverdate,Expt_del_date) VALUES(:ordercustomer,:marketertitle,:ordersheet,:contactperson,:offermaker,:contactnumber1,:contactnumber2,:designation,:tweight,:theoratical_weight,:deliverdate,:expt_del_date)";



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
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
 
$msg="Added  successfully";

}
else 
{
$error="  went wrong. Please try again";
}

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
	
	<title>MinMax | Admin </title>

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
					
						<h2 class="page-title">Add Order Details </h2>

						<div class="row"> 

							<div class="col-md-12"> 
								<div class="panel panel-default">

									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label  class="col-sm-2 control-label">Select Customer<span style="color:red">*</span></label>
<div    class="col-sm-4" >
<select   class="selectpicker" name="ordercustomer" size="3"  required>
<option   value=""> Select </option>
<?php $ret="select id,CustomerName from tblcustomer";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CustomerName);?></option>
<?php }} ?>
</select>

</div>

<label class="col-sm-2 control-label">Marketer Name <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="marketertitle" class="form-control" required>
</div>

</div>

<div class="form-group">



<label class="col-sm-2 control-label">Order Sheet  Maker <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="ordersheet" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Contact Person <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="contactperson" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Offer  Maker <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="offermaker" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Contact Number1 <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="contactnumber1" class="form-control" required>
</div>

</div>



<div class="form-group">
<label class="col-sm-2 control-label">Designation <span style="color:red">*</span></label>
<div class="col-sm-4">  
<input type="text" name="designation" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Contact Number2</label>
<div class="col-sm-4">
<input type="text" name="contactnumber2" class="form-control" >
</div>

</div>

<div class="hr-dashed"></div>



<div class="form-group">
<label class="col-sm-2 control-label">Total Weight<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="tweight" class="form-control" >
</div>
<label class="col-sm-2 control-label">Theoratical Weight <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="theoratical_weight" class="form-control" required>
</div>
</div>






<div class="form-group">
<label class="col-sm-2 control-label">Deliver Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="deliverdate" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Expected Deliver Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="expt_del_date" class="form-control" required>
</div>

</div>

</div>
<div class="hr-dashed"></div>





											
<div class="hr-dashed"></div>


<div class="form-group">
</div>
				
<div class="hr-dashed"></div>		
</div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
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