<?php
if (isset($_POST['submit'])) {

    include 'connection.php';
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $dob = $_POST["dob"];
    $fathername = $_POST["fathername"];
    $account = $_POST["account"];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
	$folder = "./uploadimages/".$filename;
    function UserID()
        {
        $starting_digit=5;
        $first_part1=rand(0,99);
        if(strlen($first_part1)==1) { $first_part="0".$first_part1; } else { $first_part=$first_part1; }
        $second_part1=rand(1,999);
        if(strlen($second_part1)==1) { $second_part="00".$second_part1; } elseif(strlen($second_part1)==2) { $second_part="0".$second_part1; } else { $second_part=$second_part1; }
        $third_part1=rand(1,9999);
        if(strlen($third_part1)==1) { $third_part="000".$third_part1; } elseif(strlen($third_part1)==2) { $third_part="00".$third_part1; } elseif(strlen($third_part1)==3) { $third_part="0".$third_part1; } else { $third_part=$third_part1; }
        $userid=$starting_digit.$first_part."-".$second_part."-".$third_part;
        return $userid;
        }
        $code = UserID();
        
		
		// Get all the submitted data from the form
        $sql = "INSERT INTO accountdetails (email,fullname,dob,fathername,adhar,accountnum) VALUES ('$email','$fullname','$dob','$fathername','$filename','$account')";
		// Execute query
      
		mysqli_query($conn, $sql);
       
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
            
		}else{
			$msg = "Failed to upload image";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='newaccount.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    
    

</head>
<body>
    <header>
        <section>
            <div class="bc-banner">
            <img src="./Images/new_banner.png" class="bc-banner-cover img-responsive">
            <div class="centered"><h1>Open a new banking account and get 500 Rs Free!!</h1></div>
            </div>
            <div class="formcontainer">

            <div class="container">
            <form method="POST" enctype = "multipart/form-data" onsubmit="alert('your Customer Id is <?php echo $activationcode ?>');">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>   
                    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Full name</label>
                    <input type="text" name = "fullname" class="form-control" id="exampleInputPassword1" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Date of Birth</label>
                    <input type="date" name = "dob" class="form-control" id="exampleInputPassword1" placeholder="Date of birth">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Father name</label>
                    <input type="text" name = "fathername" class="form-control" id="exampleInputPassword1" placeholder="Father Name">
                </div>
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Account Number</label>
                    <input type="text" name ="account" class="form-control" id="exampleInputPassword1" value="<?php echo "$code" ?>">
                </div>  
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Adhar Proof</label>
                    <input type="file" name = "uploadfile" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit"  name ="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
   
                
            </div>
           
        </section>
    </header>

</body>
</html>