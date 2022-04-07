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
    $sql3 = mysqli_query($conn,"SELECT * FROM benificiary WHERE holderaccountnum='$_SESSION[accountnum]';");
    $sql4 = mysqli_query($conn,"SELECT * FROM benificiary WHERE holderaccountnum='$_SESSION[accountnum]';");

?>
<?php
  $row = mysqli_fetch_assoc($sql);
  $row2 = mysqli_fetch_assoc($sql2);
  $row3 = mysqli_fetch_assoc($sql3);
  

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TSM Banking</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='benificiary.css'>
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
      
        <a href="#">My Profile</a>
        <a href="#">My Account</a>
        <a href="#">Fund Transfer</a>
        <a href="./benificiary.php">Benificiary</a>
        <a href="#">Add Fund</a>
        <a href="#">Check Balance</a>
        <a href="#">Check Statement</a>
        <a href="logout.php"><i class="fa fa-power-off"></i></a>
      </nav>
    </div>
  </div>
  </div>
<div class="formcontainer">
    <center>
        
    <h3>Benificiary</h3>
    <a href="./addbenificiary.php">Add New Benificiary</a>
    </center>
    </div>
    <div class="centerben">
    <div class="detailform">
    <center>
    <h3>Benificiary Details</h3>
    
<div class="table">
    <table border="2px">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Account Number</th>
            <th>Bankname</th>
            <th>IFSC</th>
        </tr>
        <?php
        while($row4 = mysqli_fetch_assoc($sql4)){
?>
        <tr>

            <td><?php echo $row4['fullname']?></td>
            <td><?php echo $row4['email']?></td>
            <td><?php echo $row4['mobile']?></td>
            <td><?php echo $row4['accountnum']?></td>
            <td><?php echo $row4['bankname']?></td>
            <td><?php echo $row4['ifsc']?></td>
        </tr>
        <?php
        }
        ?>
       



    </table>
    </div>

  </div>
  </div>

  




</body>
<script src = "./banking.js">
</script>

</html>