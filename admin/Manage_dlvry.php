<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from tbl_dlvr_install  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Order  record deleted successfully";
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
	
	<title>MinMax | Admin Manage  </title>

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

						<h2 class="page-title">Manage Dlvry & Install</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Deliver & Details</div>
							<div style="overflow-x:auto;" class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>CustomerTitle</th>
											<th>Date</th>
											<th>Delivery Weight </th>
											<th>Driver Name</th>
											<th>Mobile No</th>
											<th>Vehicale No</th>
											<th>Remarks</th>
											<th>Vimage1</th>
											<th>Vimage2</th>
											<th>Vimage3</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										    <th>CustomerTitle</th>
											<th>Date </th>
											<th>Delivery Weight </th>
											<th>Driver Name</th>
											<th>Mobile No</th>
											<th>Vehicale No</th>
											<th>Remarks</th>
											<th>Vimage1</th>
											<th>Vimage2</th>
											<th>Vimage3</th>
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

<?php $sql = "SELECT tbl_dlvr_install.Ordercustomer,tbl_dlvr_install.id,tbl_dlvr_install.Date1,tbl_dlvr_install.Delivery_Weight,tbl_dlvr_install.Ins_Date,tbl_dlvr_install.Ttl_Lbr_Wrk,tbl_dlvr_install.Vehicale_No,tbl_dlvr_install.Remarks,tbl_dlvr_install.Vimage1,tbl_dlvr_install.Vimage2,tbl_dlvr_install.Vimage3,tblcustomer.CustomerName from tbl_dlvr_install join  tblcustomer on tblcustomer.id=tbl_dlvr_install.Ordercustomer";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->CustomerName);?></td>
											<td><?php echo htmlentities($result->Date1);?></td>
											<td><?php echo htmlentities($result->Delivery_Weight);?></td>
											<td><?php echo htmlentities($result->Ins_Date);?></td>
											<td><?php echo htmlentities($result->Ttl_Lbr_Wrk);?></td>
											<td><?php echo htmlentities($result->Vehicale_No);?></td>
											<td><?php echo htmlentities($result->Remarks);?></td>
											<td><?php echo htmlentities($result->Vimage1);?></td>
											<td><?php echo htmlentities($result->Vimage2);?></td>
											<td><?php echo htmlentities($result->Vimage3);?></td>
										
								
		<td><a href="edit-dlvry.php?id=<?php echo $result->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="Manage_dlvry.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>
</td>
										</tr> 
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

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
