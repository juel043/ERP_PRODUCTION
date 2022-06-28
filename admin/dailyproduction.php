<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	


$query = "SELECT * FROM tbl_production ORDER BY id DESC";

$statement = $dbh->prepare($query);

$statement->execute();

$resultp = $statement->fetchAll();


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
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
	
	<title>MinMax |  Daily Production</title>

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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
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
					
						<h2 class="page-title">Daily Production</h2>
 
   <h3 align="center">Add Details</h3>
   <br />
   <form enctype="multipart/form-data" method="post" id="add_details" >
<div class="form-group">
<label  class="col-sm-2 control-label">Select Customer<span style="color:red">*</span></label>
<div    class="col-sm-8" >
<select    name="ordercustomer"  required>
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
</div>
</br>

    <div class="form-group">
    <br>
     <label>Date</label>
     <input style="width:500px;" type="text" name="dates" class="form-control" required />
    </div>
    <div class="form-group">
     <label>Weight</label>
     <input style="width:500px;" type="text" name="Weight" class="form-control" required />
    </div>
    <div class="form-group"> 
     <input  type="submit" name="add" id="add" class="btn btn-success"   value="Add"  />
    </div>
   </form>
   <h3 align="center">View Details</h3>
   <br />
   <table id="countit" style="width:1000px;" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th>Customer</th>
      <th>Dates</th>
      <th>Weight</th>
    
     </tr>
    </thead>
    <tbody  id="table_data">
    <?php
    foreach($resultp as $row)
    {
     echo '
     <tr>
      <td>'.$row["ordercustomer"].'</td>
      <td>'.$row["dates"].'</td>
      <td class="count-me">'.$row["Weight"].'</td>
     
     </tr>
     ';
    }
    ?>
    </tbody>

   </table>
   <div align="center"style="width:1500px;"  >
           <span id="val" style="color:blue;font-weight:bold;"></span>
           <button style="color:blue;font-weight:bold;" type="button" onClick="refreshPage()">Update</button>
   </div>
   

 
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<script type="text/javascript">
$(document).ready(function(){
 
 $('#add_details').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.ordercustomer)
    {
     var html = '<tr>';
     html += '<td>'+data.ordercustomer+'</td>';
     html += '<td>'+data.dates+'</td>';
     html += '<td>'+data.Weight+'</td></tr>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
    }
   }
  })
 });
});
</script>

<script language="javascript" type="text/javascript">


   
   $(document).ready(function(){
    
            var tds = document.getElementById('countit').getElementsByTagName('td');
            var sum = 0;
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'count-me') {
                    sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
            }
            document.getElementById('countit').innerHTML += '<tr><td style="text-align:center" colspan="2">Total =</td><td>' + sum + '</td></tr>';
        


});


        </script>

        <script>
function refreshPage(){
    window.location.reload();
} 


</script>

   


	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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