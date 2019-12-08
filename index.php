<?php
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

    <title class="navbar-brand">Home</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    
 
    
  
     
    <link href="css/nav_home" rel="stylesheet">

  
    <link href="css/slideer.css" rel="stylesheet">
      <link href="css/front_header.css" rel="stylesheet">
           <link href="css/logo.css" rel="stylesheet">
        <link href="css/about_us.css" rel="stylesheet">
        
      <link rel= "stylesheet" href="css/marketing.css">
         <link rel= "stylesheet" href="css/wrapper_block.css">
          <link rel= "stylesheet" href="css/imageblock.css">
                <link rel= "stylesheet" href="css/downhome.css">
                   <link rel= "stylesheet" href="css/floatarea.css">
     
     
     
     
        

        

    <style>
        *{
            overflow-x: hidden;
        }
        .container{
            overflow: hidden;
        }
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 500px) {
        nav > .container {
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
       
    }
        
        
    </style>

</head>

<body>

    <!-- Navigation -->
<?php include('includes/header.php');?>
<?php include('includes/slider.php');?>

   

    <!-- Page Content -->
  
    <div class="container">   
       <div class="imageblock">
         <div class="image_quote">
          <p>"Donate your blood for a reason,let the reason to be life"</p>
           </div>
        </div>
        
        <div class="Mission">
            <div class="Mission_title">
                <p>Our Mission</p>
            </div>
            <div class="Mission_content">
                <p>IBAN is one of the absolute best instances of unselfishness in real life for fulfilling the need of blood to the people. It’s our priority to ensure needy people in case of emergencies. The main intend of IBAN is to encourage blood donation and conduct different awareness program. IBAN is one of the most perfect examples of altruism in action. Through this process it will be easier to find a donor for exact blood type and easy to build the connection between donor and receiver.We provide platform to assists the various Organizations, Clubs, Colleges, Public and Private Institutions to arrange for motivational talks to provide awareness progressively. 
</p>
            </div>
            
            
        </div>
       
        
         <div class="wrapper_block">

       <div class="card_block">
           <div class="display_block">
               <div class="pic_block">
                   <img src="images/pic.jpg">
               </div>
               <div class="name_block">
                   Blood Donor Day
               </div>
           </div>
           <div class="detail_block">
               World Blood Donor Day is observed on 14 June to mark the anniversary of Karl Landsteiner. It was first celebrated in 2004 to spread awareness about the need for regular blood donations and its requirement to save lives.The theme for Blood Donor Day is "Blood donation and universal access to safe blood transfusion" to achieve universal health coverage. The slogan for the campaign is "Safe blood for all" to raise awareness about the universal need for safe blood in the delivery of health care. 
           </div>
       </div>
       <!---->
       <div class="card_block">
           <div class="display_block">
               <div class="pic_block">
                   <img src="images/pic2.jpg">
               </div>
               <div class="name_block">
                   Who can give?
               </div>
           </div>
           <div class="detail_block">
              <ul type="square">	
              <li>You are aged between 17 and 65.</li>
            <li>Your weight should be at least 40kg.</li>
<li>Your health profile is stable like blood pressure, normal heart beating, diabetes, etc.</li>
<li>Person who is pregnancy or at the stage of breastfeeding.</li>
<li>You should not be HIV, AIDS infected.</li>
           </ul>

           </div>
       </div>
       <!---->
       <div class="card_block">
           <div class="display_block">
               <div class="pic_block">
                   <img src="images/pic3.jpg">
               </div>
               <div class="name_block">
                   Why to give?
               </div>
           </div>
           <div class="detail_block">
             <ul type="square">
              <li>Its saves live and improves health.</li>
<li>It will help you to achieve your emotional and physical health at well-being.</li>
<li>It will provide a sense of belonging and reduce isolation.</li>
<li>It maintains healthy heart and liver.</li>
<li>It helps in stimulation of blood cell production.</li>
           </ul>

           </div>
       </div>
       <!---->

    </div>
    
    
          <div class="Goal">
            <div class="Goal_title">
                <p>Goal & Objective </p>
            </div>
            <div class="Goal_content">
                <p>International Blood Association Nepal (IBAN) objective is to wipe off the scarcity of blood and ensure availability of safe and quality blood with other blood components, round the clock and throughout the year. This will lead to alleviation of human sufferings, even to the far-flung remote areas in the country. Motivate and maintain is a permanent well-indexed record of International Blood Association Nepal. Educating the community on the beneficial aspects of blood donation and harmful effect of collecting blood from paid donors which actively encourage International Blood Association Nepal. It organizes and promote knowledge related to the different measures like AIDS, Blood transfusion, Blood Contamination etc. to the general public.
</p>
            </div>
            
            
        </div>

    
    


        

        <!-- Marketing Icons Section -->
        
      

        <!-- /.row -->

        <!-- Portfolio Section -->
       
        
        <div class="icon">
         <h2>Our Donors</h2>
        <div class="row">
                   <?php 
$status=1;
$sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 3";
$query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid" src="images/user.png" alt="" ></a>
                    <div class="card-block">
                        <h4 class="card-title"><a href="#"><?php echo htmlentities($result->FullName);?></a></h4>
<p class="card-text"><b>  Gender :</b> <?php echo htmlentities($result->Gender);?></p>
<p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>

                    </div>
                </div>
            </div>

            <?php }} ?>
          
 



        </div></div>
        <!-- /.row -->

        <div class="blood_list_block">
            
            <div class="blood_list">
               <h2>Blood Groups</h2>
                <img src="images/blood_list.svg">
            </div>
            
            
        </div>
        
        
          <div class="downhome">
            <div class="downhome_title">
                <p> UNIVERSAL DONORS AND RECIPIENTS </p>
            </div>
            <div class="downhome_content">
               <p>

Individuals with sort AB blood are viewed as all-inclusive blood beneficiaries. The reason is that AB blood classifications don't contain common antibodies against the ABO blood gatherings and this keeps away from incongruence responses when an individual who is blood group AB gets blood from a donor who has another ABO blood gathering. Blood group AB is uncommon and in spite of the fact that AB blood classifications can get any kind of blood, they are not ready to give blood to people that are not blood group AB. Type O negative blood is viewed as the all-inclusive blood classification. Individuals with sort O negative blood are called general benefactors since sort O negative blood is perfect to any blood beneficiary's sort. In a perfect world the benefactor’s blood classification ought to consistently be an accurate match to the beneficiary's blood classification. Because any instances where a blood transfusion is required is in a crisis circumstance, type O negative blood is frequently hard to find which further builds the requirement for sort O negative blood benefactors to liberally give their blood to medical clinics and blood donation centres.
</p>
            
            </div>
            
          
            </div>
            
                        <div class="bot">
                <a class="bot-click" href="become-donar.php">
                <p>Become a Donar</p></a>
            </div>
        
       
    
        
        
        

       
    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
       <script src="js/slideer.js"></script>

</body>

</html>
