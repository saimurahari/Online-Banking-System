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
$sql3 = mysqli_query($conn, "SELECT * FROM transaction WHERE holderaccountnum='$_SESSION[accountnum]';");
$sql4 = mysqli_query($conn, "SELECT * FROM transaction1 WHERE accountholder='$_SESSION[accountnum]';");
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
    <link rel='stylesheet' type='text/css' media='screen' href='transaction.css'>
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
<div class="formcontainer">
    <h3>Statement</h3>
</div>
<center>
<div class="table">
    <table border="2px" id="exportpdf">
        <tr>
            <th>Account holder</th>
            <th>Date</th>
            <th>Credit</th>
            <th>Debit</th>
            
            <th>Account Number</th>
        </tr>
        
        <?php
        while($row3 = mysqli_fetch_assoc($sql3))
        {
?>
        <tr>

            <td><?php echo $row3['holderaccountnum']?></td>
            <td><?php echo $row3['date']?></td>
            <td><?php echo $row3['credit']?></td>
            <td><?php echo $row3['debit']?></td>
            <td><?php echo $row3['accountnum']?></td>
            
        </tr>
        
        <?php
        }
        ?>
        <?php
        while($row4 = mysqli_fetch_assoc($sql4))
        {
?>
        <tr>
            <td><?php echo $row4['accountholder']?></td>
            <td><?php echo $row4['date']?></td>
            <td><?php echo $row4['credit']?></td>
            <td><?php echo $row4['debit']?></td>
            <td><?php echo $row4['accountnum']?></td>
            
            
        </tr>
        
        <?php
        }
        ?>
        
    </table>
    <input type="button" id="btnExport" value="Export" onclick="Export()" />
</div>
</center>
  </div>

</body>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('exportpdf'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width:500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("<?php echo $_SESSION['accountnum']?>.pdf");
                }
            });
        }
    </script>
</html>
