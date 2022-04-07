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
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];  
    $mobile = $_POST["mobile"];
    $accountnum = $_POST["accountnum"];
    $bankname = $_POST["bankname"];
    $ifsc = $_POST["ifsc"];

    $existSql = "SELECT * FROM `accountdetails` WHERE `accountnum` = '$accountnum'";
    $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if(!$numExistRows){
            // $exists = true;
            $showError = "Please Enter valid account number";
            echo "<script type='text/javascript'>alert('$showError');</script>";
        
        }

        else{
            $sql = "INSERT INTO benificiary (holdername,holderaccountnum,fullname,email,mobile,accountnum,bankname,ifsc) VALUES ('$row[fullname]','$row[accountnum]','$fullname','$email','$mobile','$accountnum','$bankname','$ifsc')";
            mysqli_query($conn, $sql);    
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
    <link rel='stylesheet' type='text/css' media='screen' href='addbenificiary.css'>
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
    <h3>Add Benificiary</h3>
        <div class="formcontainer">
            
        <form  method="POST" enctype = "multipart/form-data">
            <div class="form-group">
            <label>Full Name:</label><br>
            <input type="text" name="fullname" required>
            </div>
            <div class="form-group">
            <label>Email:</label><br>
            <input type="text" name="email" required>
            </div>
            <div class="form-group">
            <label>Mobile:</label><br>
            <input type="text" name="mobile" required>
            </div>
            <div class="form-group">
            <label>Account Number:</label><br>
            <input type="text" name="accountnum" required>
            </div>
            <div class="form-group">
            <label>Bank Name:</label><br>
            <input type="text" name="bankname" value="TSM Bank" readonly required>
            </div>
            <div class="form-group">
            <label>IFSC Code:</label><br>
            <input type="text" name="ifsc" value="TSM0123456" readonly required>
            </div>
    
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
        </div>
    </div>
</section>

<script src = "./banking.js">
</script>


</body>
</html>