<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TSM Banking</title>
    <link rel="icon" href="./Images/icon.ico" type="image/icon type">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="home2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <header>
        
        <div class="topnav" id="myTopnav">
            <a href="#" class="company"><i class="fa fa-university" aria-hidden="true"></i>&nbspTSM Banking</a> 
            <a href="./logout.php">Logout</a>
            <a href="./login.php"><?php echo $_SESSION['email'];?></a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
            <a href="#home" class="active">Home</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
          </div>
    </header>
    <!-- Home Screen -->
    <section>
        <center>
        <h2>Welcome to TSM Banking System!</h2>
        </center>
        <div class="container">
            <h4><b>Transfer Money</b></h4>
            <p>Send or receive money with zero fees, straight from your bank account to almost anyone. You can send or receive money even if your contact is not on Google Pay. 
                Split lunch with a friend, pay the rent, or send money to mom.
                Recharge your mobile in a tap and finish with those monthly bills on Google Pay. Now you’re free to go shopping - online, or in a store. We’ve got you covered with easy access to past transactions, so you’re always in control.
                 Use it wherever you see UPI or Google Pay.
                 Earn scratch cards and other rewards as you use Google Pay worth up to ₹1,00,000*. You don’t need to hunt for coupon codes. If you win, your rewards go straight into your bank account.
                 Pay and receive money instantly using your existing bank accounts. No more reloading mobile wallet balances or withdrawal fees. It’s your money, made simple.
                 Google Pay works with all banks that support BHIM UPI.
            </p>
            <div class="paymenticon">
                <i class="fa fa-paypal"></i>
                <i class="bi bi-credit-card"></i>
                <i class="fa fa-google-wallet" aria-hidden="true"></i>  
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <div class="bankingoptions">
                <a href="#">New Account</a>
                <a href="#">Login Net banking</a>

            </div>

        </div>
        <div class="bc-banner">
            <img src="https://www.hubspot.com/hs-fs/hubfs/lead-capture-3-1.jpg?width=1800&name=lead-capture-3-1.jpg" class="bc-banner-cover img-responsive">
            <div class="center-img"><h2>Banking Made Easy</h2></div>
        </div>
    </section>
      


    <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="foot-container">
                <ul>
                    <i class="fa fa-university" aria-hidden="true"></i>
                    <span>TSM Banking</span><br>
                    <br>
                    <i class="fa fa-map-marker"></i>
                    <span>5th Floor,
                        A-118,Sangareddy, Hyderabad, Telangana - 502001
                    </span><br><br>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>support@tsmbanking.com</span><br><br>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>+91 91XXXXXX10</span>
                </ul>
            </div>
            <div class="foot-about">
                <span>Banking Services</span>
                <ul>
                    <li>Transfer</li>
                    <li>Bill Payments</li>
                    <li>Loan Repayment</li>
                    <li>Mutual Funds</li>
                </ul>
            </div>
            <div class="foot-payment">
                <span>Payments</span>
                <ul>
                    <li>UPI</li>
                    <li>Paytm</li>
                    <li>TSM pay</li>
                    <li>Razor Pay</li>
                </ul>
            </div>
            <div class="foot-payment">
                <span>Branches</span>
                <ul>
                    <li>Hyderabad</li>
                    <li>Sangareddy</li>
                    <li>Mumbai</li>
                    <li>Chennai</li>
                </ul>
            </div>
            <div class="foot-payment">
                <span>Contact us</span>
                <ul>
                    <li>+91 80XXXXXXX0</li>
                    <li>+91 90XXXXXXX0</li>
                    <li>+91 60XXXXXXX0</li>
                    <li>+91 93XXXXXXX0</li>
                </ul>
            </div>
            
            

        </div>
        <center>
        <span>TSMbanking ®</span>
    </center>
    </footer>  
<script src = "./banking.js">
</script>
    
</body>
</html>