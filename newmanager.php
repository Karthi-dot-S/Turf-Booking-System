<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   

    $connection= mysqli_connect('localhost','root','','turf');
    $msg= "" ;     


    if(isset($_POST['submit'])){
        $manname=$_POST['manname'];
        $manjoin=$_POST['manjoin'];
        $manmobile=$_POST['manmobile'];
        $turfnam=$_POST['turfnam'];
        $manaddress=$_POST['manaddress'];
        //$manphoto=$_FILES['file']['name'];
        $manphoto= $_FILES['file']['name'];
        
        //image Upload
    
       move_uploaded_file($_FILES['file']['tmp_name'],"picture/".$_FILES['file']['name']); 
        
        $res=false;
        $insert_query="INSERT INTO `manager`(`manid`, `manname`, `manjoin`, `manmobile`, `turfnam`, `manaddress`, `manphoto`) VALUES ('','$manname','$manjoin','$manmobile','$turfnam','$manaddress','$manphoto')";
        
        $res= mysqli_query($connection,$insert_query);
            
        if($res==true){
            $msg= "<script language='javascript'>
                                       swal(
                                            'Success!',
                                            'Registration Completed!',
                                            );
				          </script>";
        }
        else{
            die('unsuccessful' .mysqli_error($connection));
        }
        
        
    }

    
        
       
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Manager</title> 
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
    <script src="sweetalert2/sweetalert2.min.js"></script>
  
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
</head>
<body>  
 <?php include 'navbar_admin.php'; ?>
 <br>
  
  
   <div class="container"> 
     <div class="row">
       
        <div class="page-header">
            <h1 style="text-align: center;">New Manager Form</h1>
            <?php echo $msg; ?>
                              
                  
      
      </div> 
       <div class="col-md-3">
         
       </div>
        <div class="col-md-6 animated bounceIn"> 
          
           
            
                <br>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
                
                <div class="input-group">
                  <span class="input-group-addon"><b>Manage Name</b></span>
                  <input id="manname" type="text" class="form-control" name="manname" placeholder="Name" required>
                </div>
                <br> 
                
                 <div class="input-group">
                  <span class="input-group-addon"><b>Mobile</b></span>
                  <input id="manmobile" type="text" class="form-control" name="manmobile" placeholder="Mobile No" required>
                </div>
                <br> 
                
                <div class="input-group">
                  <span class="input-group-addon"><b>Manager Joined On</b></span>
                  <input id="manjoin" type="text" class="form-control" name="manjoin" placeholder="Joining date" required>
                </div>
                <br>
                
              
                
                 <script>
                      $( function() {
                        $( "#manjoin" ).datepicker();
                      } );
                </script> 
                
                  <div class="input-group">
                  <span class="input-group-addon"><b>Manager of</b></span>
                  <input id="turfnam" type="text" class="form-control" name="turfnam" placeholder="Turf Name">
                </div>
                <br>
                
                  <div class="input-group">
                  <span class="input-group-addon"><b>Manager Address</b></span>
                     <textarea rows="4" id="manaddress" type="text" class="form-control" name="manaddress" placeholder="Address"> </textarea>
                  
                </div>
                <br>
                
                 <div class="input-group">
                  <span class="input-group-addon"><b>Manager Photo</b></span>
                  <input  type="file" class="form-control" name="file"> 

              </div>
                
                
                 
                
                <div class="input-group">
                  <input type="submit" name="submit" class="btn btn-success">
                  
                </div>
              </form>   
        </div>  
        <div class="col-md-3"></div>
         
     </div>
         
   
    </div> 
    
   
    
</body>
</html>