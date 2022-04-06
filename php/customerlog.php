<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
    
?>
<?php
include "connection.php";

    $sql = mysqli_query($conn, "SELECT * FROM accountdetails WHERE accountnum='$_SESSION[accountnum]';");
    $sql2 = mysqli_query($conn,"SELECT * FROM account WHERE accountnum='$_SESSION[accountnum]';");
?>
<?php
  $row = mysqli_fetch_assoc($sql);
  $row2 = mysqli_fetch_assoc($sql2);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TSM Banking</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='customerlog.css'>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
<header>
        
        <div class="topnav" id="myTopnav">
            <a href="#" class="company"><i class="fa fa-university" aria-hidden="true"></i>&nbspTSM Banking</a> 
            
            <a href="./home.php"><?php echo $_SESSION['email'];?></a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
            <a href="./home.php" class="active">Home</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
        </div>
</header>
<div class="profile">
  <div class="profilecontainer">
    <h3>Welcome to <?php echo $row['fullname'];?>!!</h3>
 
    <div class="profileimg">
      <?php  
      echo "<img src = './uploadimages/".$row['profile']."'>";
    ?>
    
    <a href="./logout.php">Logout</a>
    
    </div>
    <div class="aware">
    <marquee direction="left">Avoid using public computers or public wireless access points for online banking and other activities involving sensitive information when possible.
Always “sign out” or “log off” of password protected websites when finished to prevent unauthorized access.  Simply closing the browser window may not actually end your session.</marquee>
</div>
    <div>
      <nav class="usernav">
        <a href="#">My Profile</a>
        <a href="#">My Account</a>
        <a href="#">Fund Transfer</a>
        <a href="#">Check Balance</a>
        <a href="#">Check Statement</a>
        <a href="logout.php"><i class="fa fa-power-off"></i></a>
      </nav>
    </div>
  </div>
  </div>
<div class="formcontainer">
  <div class="detailform">
    <center>
    <h3>Account Details</h3>
    </center>
    <div class="details">
      <a>Account Number: <?php  echo $row['accountnum']?></a>
      <a>Customer Name: <?php  echo $row['fullname']."  ".$row['surname']?></a>
      <a>Email: <?php  echo $row['email']?></a>
      <a>Mobile number: <?php  echo $row['mobile']?></a>
      <a>Date of Birth: <?php  echo $row['dob']?></a>
      <a>Account Type: Savings</a>
    </div>
  </div>
  <div class="formcont">
    <center>
    <h3>Balance Amount</h3>
    </center>
    <div class="balanceamount">
      <a>Account Number:&nbsp;&nbsp;<?php  echo $row['accountnum']?><br>
      Balance amount: &nbsp;&nbsp;INR <?php echo $row2['balance']?>
    </a>
    <a onclick="alert('This feature is currently under process we will update soon!')">Add Amount at your nearby centers</a>
    
    </div>
    <div class="social">
      <center>
      <a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
    </center>
    </div>

  </div>
</div>
  




</body>
<script src = "./banking.js">
</script>

</html>