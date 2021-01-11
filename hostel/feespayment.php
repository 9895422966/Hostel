<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo 'hi'.$_SESSION['login'];

if(isset($_POST['pay'])){
	
$regno=$_SESSION['login'];
$date=$_POST['date'];
$amt=$_POST['pay'];
// $ptype=$_POST['ptype'];
// echo $ptype;
$cardno=$_POST['cardno'];
$cvv=$_POST['cvv'];
$sql = "INSERT INTO `fee` (`bid`, `regno`, `date`, `amount`, `status`, `ptype`, `cardno`, `cvv`) VALUES (NULL, '$regno', '$date', '$amt', 'paid', 'card', '$cardno', '$cvv');";

if(mysqli_query($conn, $sql))
  echo '<script>if(!alert("success")){
	document.location = "feespayment.php";
  }</script>';
else
	// echo '<script>alert("Payment Failed")</script>';
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);

mysqli_close($conn);
// header("location:feespayment.php");

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
	<title>Student Hostel Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">



function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title"> Fees Payment </h2>

						<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<!-- <div class="well row pt-2x pb-3x bk-light"> -->
							<div class="col-md-8 col-md-offset-2">
							
								<form action="" class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Admission no : </label>
									<input type="text" placeholder="Admission No" id="regno" name="regno" class="form-control mb" value='<?php echo $_SESSION['login']; ?>' disabled>
									<label for="" class="text-uppercase text-sm">Date  : </label>
									<input type="date" placeholder="Date" id="date" name="date" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Amount : </label>
									<input type="text" placeholder="Amount" id="amt" name="amt" class="form-control mb" <?php
									 $id= $_SESSION['login']; 
									 $sql="select days from messfee where regno=$id";
										$res = mysqli_query($conn, $sql);
										$row1 = mysqli_fetch_assoc($res);
										?> value='<?php
										echo $row1['days']*200;
									 ?>' disabled>
								    <label for="" class="text-uppercase text-sm">Payment type : </label>
									<input type="text" placeholder="Ptype" id="ptype" name="ptype" value="card" class="form-control mb" disabled>
									<!-- <select id="ptype" class="form-control mb" name="ptype">
                                     <option value="card" name="ptype">debit/credit card</option>
                                     <option value="google pay">google pay</option>
                                     <option value="netbanking">netbanking</option>                                 
                                    </select> -->
									<label for="" class="text-uppercase text-sm">Card no : </label>
									<input type="text" placeholder="Card no" id="cardno" name="cardno" class="form-control mb">
									<label for="" class="text-uppercase text-sm">cvv : </label>
									<input type="text" placeholder="cvv" id="cvv" name="cvv" class="form-control mb">
									<button type="submit" name="pay" class="btn btn-primary btn-block" value="<?php
									 $id= $_SESSION['login']; 
									 $sql="select days from messfee where regno=$id";
										$res = mysqli_query($conn, $sql);
										$row1 = mysqli_fetch_assoc($res);
				
										echo $row1['days']*200;
									 ?>" id="pay">Pay</button>
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
			</div>
		</div>
	</div>
	<script>

	</script>
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