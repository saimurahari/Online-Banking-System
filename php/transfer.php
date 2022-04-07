<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
    
?>
<?php
include 'connection.php';
$sql = mysqli_query($conn, "SELECT * FROM accountdetails WHERE accountnum='$_SESSION[accountnum]';");
$sql2 = mysqli_query($conn,"SELECT * FROM account WHERE accountnum='$_SESSION[accountnum]';");
?>
<?php
  $row = mysqli_fetch_assoc($sql);
  $row2 = mysqli_fetch_assoc($sql2);
?>


<?php

if(isset($_POST['submit'])){
    
    include 'connection.php';
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $accountnum = $_POST["accountnum"];
    $amount = $_POST["amount"];
    $date = date('m/d/Y h:i:s', time());
    $credit = "null";

    $existSql = "SELECT * FROM `accountdetails` WHERE `email`='$email' OR 'fullname'='$fullname' OR 'accountnum'='$accountnum'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if(!$numExistRows){
        // $exists = true;
        $showError = "enter valid name";
        echo "<script type='text/javascript'>alert('$showError');</script>";
        
    }
    else{
    $sql = "UPDATE account SET balance=balance+'$amount' WHERE accountnum='$accountnum'";
    mysqli_query($conn, $sql);
    $sql2 = "UPDATE account SET balance=balance-'$amount' WHERE accountnum='$_SESSION[accountnum]'";
    mysqli_query($conn, $sql2);
    $sql3 = "INSERT INTO transaction (holderaccountnum,date,credit,debit,accountnum) VALUES ('$_SESSION[accountnum]','$date','$credit','$amount','$accountnum')";
    $sql4 = "INSERT INTO transaction1 (accountholder,date,credit,debit,accountnum) VALUES('$accountnum','$date','$amount','$credit','$_SESSION[accountnum]')";
    mysqli_query($conn,$sql3);
    mysqli_query($conn, $sql4);
    $_SESSION['fullname'] = $fullname;
    header("location:customerlog.php");
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
    <link rel='stylesheet' type='text/css' media='screen' href='transfer.css'>
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
    
 
    <div class="profileimg">
      <?php  
      echo "<img src = './uploadimages/".$row['profile']."'>";
    ?>
    <center>
    <h3>Welcome <?php echo $row['fullname'];?>!!</h3>
    </center>
    </div>
    <div class="head"><br>

    <h3>Balance amount:<br>INR <?php echo $row2['balance']?></h3>
 
    </div>

    <div class="aware">
    
    <div class="navform">
    <marquee direction="left">Avoid using public computers or public wireless access points for online banking and other activities involving sensitive information when possible.
Always “sign out” or “log off” of password protected websites when finished to prevent unauthorized access.  Simply closing the browser window may not actually end your session.</marquee>
</div>
      <nav class="usernav">
      
        <a href="./customerlog.php">My Profile</a>
        <a href="./transfer.php">Fund Transfer</a>
        <a href="./benificiary.php">Benificiary</a>
        <a href="#"onclick="alert('This feature is currently under process we will update soon!')>Add Fund</a>
        <a href="./customerlog.php">Check Balance</a>
        <a href="#">Check Statement</a>
        <a href="logout.php"><i class="fa fa-power-off"></i></a>
      </nav>
    </div>
  </div>
  </div>
  <div class="container">
      <h2>Fund Transfer</h2>
      <div class="formcontainer">
      <form  method="POST" enctype = "multipart/form-data" onsubmit="alertfunction()" >
        <div class="form-group">
              <label>Full Name:</label><br>
              <input type="text" name="fullname" required>
              </div>

        <div class="form-group">
              <label>Email:</label><br>
              <input type="email" name="email" required>
              </div>
              <div class="form-group">
              <label>Account Number:</label><br>
              <input type="text" name="accountnum" required>
              </div>
              <div class="form-group">
              <label>Amount:</label><br>
              <input type="text" name="amount" required>
              </div>
              
              <input type = "submit" name="submit">
              
        </form>
      </div>

  </div>
  


</body>
<script src = "./banking.js">
</script>

<script>
  function alertfunction() {
    
    alert("Amount debited and Transfered to  account number <?php echo $accountnum ?>");
  
}

</script>

</html>