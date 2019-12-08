<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Query Sent. We will contact you shortly";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <link href="css/logo.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
    <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>

</head>

<body background="images/abc.jpg">

    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->      
      
                <h3>Send us a Message</h3>
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
              
                   
                       
                        
  <div class="wrapper">
    <form class="login" name="sentMessage" method="post">

<p class="title">Contact Us</p>

      <input type="text" placeholder="Full Name" id="name" name="fullname" autofocus required/>
    <i class="fa fa-user-circle-o" aria-hidden="true"></i>

      
                          
                          
                             
      <input type="tel" placeholder="Mobile No" name="contactno" id="phone" required/>
      <i class="fa fa-mobile" aria-hidden="true"></i>
      
                           
                     
      <input type="email" placeholder="Email Id" name="email" id="email" required/>
      <i class="fa fa-envelope" aria-hidden="true"></i>
      

  
     <input rows="10" cols="100" placeholder="Message" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">
     <i class="fa fa-commenting" aria-hidden="true"></i>

     
                        
                      <button value="submit" name="send" type="submit" >
      <i class="spinner"></i>
      <span class="state">Submit</span>
    </button>
      </form>
              
             
                 
                   
            <!-- Contact Details Column -->
                    <?php 
$pagetype=$_GET['type'];
$sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
           
               
           
              
              
    <div class="content_details">
      <div class="contact-method">
      <i class="fa fa-envelope" aria-hidden="true"></i>
 <span>aloksinha422@gmail.com</span>
     <?php   echo htmlentities($result->EmailId); ?>
      
      </div>
      <div class="contact-method">
       
          <abbr title="Phone">P</abbr>: <?php   echo htmlentities($result->ContactNo); ?>
          <i class="fa fa-mobile" aria-hidden="true"></i>
        <span>+917092440638</span>
      </div>
      <div class="contact-method">
  
         <?php   echo htmlentities($result->Address); ?>
               <i class="fa fa-map-marker" aria-hidden="true"></i>
        <span>Baneshwor,Kathmandu</span>
      </div>
      </div>
             </div>
              
              
            <?php }} ?>  
          
                 
              </div>
                   
     
        <!-- /.row -->


  
    <!-- /.container -->
<?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
               

</body>

</html>
