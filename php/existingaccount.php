<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
?>
<?php
include 'connection.php';
if(isset($_POST['submit'])){

$accountnum = $_POST["accountnum"];
$mpin = $_POST["mpin"];

$sql = "SELECT * FROM accountdetails WHERE accountnum = '$accountnum' AND MPIN = '$mpin'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num > 0)
   {
    session_start();
    $_SESSION['accloggedin'] = true;
    $_SESSION['accountnum'] = $accountnum;
    header("location:customerlog.php");
   }
else
   {
    $showError = "Account Number/MPIN is Incorrect";
    echo "<script type='text/javascript'>alert('$showError');</script>";
   }
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TSM Banking</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='existingaccount.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
</head>
<body>

<header>
        
        <div class="topnav" id="myTopnav">
            <a href="#" class="company"><i class="fa fa-university" aria-hidden="true"></i>&nbspTSM Banking</a> 
            <a href="./logout.php">Logout</a>
            <a href="./login.php"><?php echo $_SESSION['email'];?></a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
            <a href="./home.php" class="active">Home</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
          </div>
    </header>

<section>
    <div class="container">
      <div class="head">
        <label>Welcome to TSM BANKING</label>
        <small>One stop solution for All Banking Needs</small>
    </div>
        <div class="formcontainer">
            
        <form  method="POST" enctype = "multipart/form-data">
            
            <div class="form-group">
            <label>Account Number:</label><br>
            <input type="text" name ="accountnum">
            <small>Please enter your Account Number.</small>
            </div>
            <div class="form-group">
            <label>MPIN</label><br>
            <input type="password" name ="mpin" minlength="6" maxlength="6" required>
            <small>Enter 6 digit MPIN</small>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
        </div>
    </div>
</section>

</body>
</html>