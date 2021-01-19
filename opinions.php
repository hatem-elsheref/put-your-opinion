<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <link rel="stylesheet" type="text/css"  href="css/normalize.css">
	<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <title>website</title>
</head>
<body>
<?php
$MSG=array();
    $con=null;
define('hostname','localhost');
define('username','hatem');
define('password','webserver');
define('db','system');
$con=mysqli_connect(hostname,username,password,db);
        if($con==true){
        }else{
            $MSG['ErrorType']='danger';
            $MSG['ErrorMsg']="Error In Connection -> ".mysqli_error($con);
        }
if(isset($_POST['post_opinion'])){
    
    $username=mysqli_real_escape_string($con,trim(strip_tags(htmlspecialchars($_POST['user_name']))));
    $useropinion=mysqli_real_escape_string($con,trim(strip_tags(htmlspecialchars($_POST['user_opinion']))));
    if(!empty($username)){
        if(!empty($useropinion)){
    $stmt="insert into opinions (opinion_user_name,opinion) values('$username','$useropinion')";
    $result=mysqli_query($con,$stmt);
    if($result){
        $MSG['ErrorType']='success';
        $MSG['ErrorMsg']="Your Opinion Posted Successfully";
    }else{
        $MSG['ErrorType']='warning';
        $MSG['ErrorMsg']="Failed To Post Your Opinion ".mysqli_error($con);
    }
        }else{
        $MSG['ErrorType']='warning';
        $MSG['ErrorMsg']="Your Opinion Is Required";
        }
    }else{
        $MSG['ErrorType']='warning';
        $MSG['ErrorMsg']="Your Name Is Required";
    }
    
}
?>


<!-- Comments Form -->
       <br><br><br>
        <div class="container">
           <?php
            if(count($MSG)!==0 and $MSG['ErrorType']=='success'):?>
            <div class="alert alert-<?=$MSG['ErrorType'];?>"><?=$MSG['ErrorMsg'];?></div>
            <script>
                function refresh()
                {setTimeout(function(){document.location.href="opinions.php"},2000);}
                refresh();
            </script>
            <?php 
            endif; 
                 if(count($MSG)!==0 and $MSG['ErrorType']!=='success'){?>
                 <div class="alert alert-<?=$MSG['ErrorType'];?>"><?=$MSG['ErrorMsg'];?></div>  
                 <?php }?>  
    
                     
            <div class="card my-4">
          <h5 class="card-header"><i class="fa fa-comment"></i> Leave Your Opinion:</h5>
          <div class="card-body">
            <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
              <div class="form-group">
                  <input type="text" name="user_name" class="form-control" placeholder="Your Name"><br>
                <textarea class="form-control" name="user_opinion" rows="2" placeholder="Your Opinion"></textarea>
              </div>
              <button type="submit" name="post_opinion" class="btn btn-primary">post</button>
            </form>
          </div>
        </div>
        </div>
    
    <hr>
    <div class="container">
    <?php
    $stmt="select * from opinions order by opinion_date desc";
    $result=mysqli_query($con,$stmt);
    while($row=mysqli_fetch_assoc($result)){
        echo'<div class="media mb-4">';
        echo'<div class="media-body">';
        echo'<h5 class="mt-0">'.$row['opinion_user_name'].'</h5>';
        echo'<i>'.$row['opinion'].'</i><br>';
        echo'<small>commented on '.$row['opinion_date'].'</small></div></div>';
    }
    ?>
    </div>
</body>
</html>
