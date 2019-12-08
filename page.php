<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Notice</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
 
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
       <link href="css/about_us.css" rel="stylesheet">
               <link href="css/logo.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
        footer{
            position: relative;
            bottom: 0px;
        }
      
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>

</head>

<body>


<?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container">
                    <?php 
$pagetype=$_GET['type'];
$sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
       
        <br>
        
        <br>
        
        <br>
        
        <br>

       

        <p><?php  echo $result->detail; ?> </p>

    </div>
    <!-- /.container -->
    <?php } } ?>
    
    
                
   
    
    
    
    
    

    <!-- Footer -->
   <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
