<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
$fullname=$_POST['fullname'];
$mobile=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blodgroup=$_POST['bloodgroup'];
$address=$_POST['address'];
$message=$_POST['message'];
$status=1;
$sql="INSERT INTO  tblblooddonars(FullName,MobileNumber,EmailId,Age,Gender,BloodGroup,Address,Message,status) VALUES(:fullname,:mobile,:email,:age,:gender,:blodgroup,:address,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':blodgroup',$blodgroup,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
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

    <title>Be a Donor</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
            <link href="css/logo.css" rel="stylesheet"> 
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

<body background="images/buss.jpg">

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        
        <div class="wrapper">
        <form class="login" name="donar" method="post">


<p class="title">Become a Blood Donor</p>
     
     
    
      <input type="text" placeholder="Full Name" name="fullname" autofocus/>
    <i class="fa fa-user-circle-o" aria-hidden="true"></i>

      

      <input type="text" placeholder="Age" name="age" autofocus/>
      <i class="fa fa-child" aria-hidden="true"></i>
      
     
      

      
           <select name="gender" class="form-control" required>
            <option value="">Gender</option>
            <option value="Male">Male</option>
            <i class="fa fa-male" aria-hidden="true"></i>
            <option value="Female">Female</option>
            <i class="fa fa-female" aria-hidden="true"></i>
            </select>
                
            
                    
     
        
            <select name="bloodgroup" class="form-control" required >
                  
                  <?php $sql = "SELECT * from  tblbloodgroup ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {               ?>  
            <option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
            <?php }} ?>
             </select>
      
      
     
      <input type="email" placeholder="Email Id" name="emailid" pattern=".+@gmail\.com|.+@hotmail\.com" />
      <i class="fa fa-envelope" aria-hidden="true"></i>
      
   
      <input type="number" placeholder="Mobile No" name="mobileno" pattern = "/^\d{10}$" / >
      <i class="fa fa-mobile" aria-hidden="true"></i>
      

      <input type="text" placeholder="Address" name="address" />
      <i class="fa fa-address-book" aria-hidden="true"></i>


    
      <input type="text" placeholder="Message" name="message" />
      <i class="fa fa-commenting" aria-hidden="true"></i>
      
        <input type='file' name='file' />



    <button value="submit" name="submit" type="submit" >
      <i class="spinner"></i>
      <span class="state">Submit</span>
    </button>
<!--
<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>


</div>


-->

        <!-- /.row -->
</form>   
        <!-- /.row -->
</div>
  <?php include('includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/bootstrap/js/form.js"></script>
    
    </div>

</body>

</html>
