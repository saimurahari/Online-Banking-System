<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
?>
<?php

    if(isset($_POST['submit'])){
        
        include 'connection.php';
        $email = $_POST["email"];
        $fullname = $_POST["fullname"];
        $dob = $_POST["dob"];
        $mobile = $_POST["mobile"];
        $surname = $_POST["surname"];
        $accountnum = $_POST["acc"];
        $mpin = $_POST["mpin"];
        $filename = $_FILES["uploadfile"]['name'];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./uploadimages/".$filename;

        $balance = $_POST['opbalance'];
        

        $existSql = "SELECT * FROM `accountdetails` WHERE `email`='$email' OR `mobile` = '$mobile'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows>0){
            // $exists = true;
            $showError = "Email/Mobile Already Exists";
            echo "<script type='text/javascript'>alert('$showError');</script>";
            
        }
        else{
        $sql = "INSERT INTO accountdetails (email,fullname,surname,accountnum,mobile,dob,profile,mpin) VALUES ('$email','$fullname','$surname','$accountnum','$mobile','$dob','$filename','$mpin')";
        
        $sql2 = "INSERT INTO account (fullname,accountnum,balance) VALUES ('$fullname','$accountnum','$balance')";
        mysqli_query($conn, $sql);
        mysqli_query($conn, $sql2);
        $_SESSION['fullname'] = $fullname;
        }
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
            
		}else{
			$msg = "Failed to upload image";
	}
        
    }


?>
<?php
$showAlert = false;
$showError = false;
$exists= false;
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TSM Banking</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='new.css'>
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
    <h3>Open a new Bank Account</h3>
        <div class="formcontainer">
            
        <form  method="POST" enctype = "multipart/form-data">
            <div class="form-group">
            <label>Full Name:</label><br>
            <input type="text" name="fullname" required>
            </div>
            <div class="form-group">
            <label>Surname:</label><br>
            <input type="text" name="surname" required>
            </div>
            <div class="form-group">
            <label>Email:</label><br>
            <input type="email" name= "email" required>
            </div>
            <div class="form-group">
            <label>Date Of Birth:</label><br>
            <input type="date" name= "dob">
            </div>
            <div class="form-group">
            <label>Mobile No:</label><br>
            <input type="text" name="mobile" required>
            </div>
            <div class="form-group">
            <label>Open Balance:</label><br>
            <input type="text" name="opbalance" required>
            </div>
            <div class="form-group">
            <label>Account Number:</label><br>
            <input type="text" name ="acc" value="<?php echo rand(100000000,999999999)?>" readonly>
            <small>Please note your Account Number. This is not editable</small>
            </div>
            <div class="form-group">
            <label>Profile Photo</label><br>
            <input type="file" name = "uploadfile" required>
            </div>
            
            <div class="form-group">
            <label>MPIN</label><br>
            <input type="password" name = "mpin" minlength="6" maxlength="6" required>
            <small>Enter 6 digit MPIN</small>
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