<?php 
  require '../db_config.php';   //database connectvity
  session_start();

    $post = file_get_contents('php://input');  
    $post = json_decode($post);


    /* ******************register start********************/
    if($post->functionName === 'register'){
        $name=$post->name;
        $email=$post->email;
        $phone=$post->phone;
        $password=md5($post->pwd);
        $dor=$post->dor;
        $sql = "INSERT INTO register (name,email,phone,password,dor)
        VALUES ('$name','$email','$phone','$password','$dor')";
        if ($conn->query($sql) === TRUE) {
          echo json_encode(1);
        } else {
          echo json_encode(0);
        }
        $conn->close();
    }
   /* ******************register end********************/   

    

    /* ******************Login start********************/
    else if($post->functionName === 'login'){
       $email=$post->email;
       $password=md5($post->pwd);
       $sql = "SELECT * FROM register where email='$email' AND password='$password'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $_SESSION['email']=$row["email"];
            $_SESSION['name']=$row["name"];
            $_SESSION['id']=$row["s_no"];
            echo json_encode(1);
          }
        } else {
          echo json_encode(0);
        }
        $conn->close();
    }

    /* ******************Login end********************/



     /* ******************dashboard start********************/
    else if($post->functionName === 'dashboard'){
      if(empty($_SESSION['email'])){
        echo json_encode(0);
      }else{
        echo json_encode($_SESSION);
      }
    }
    /* ******************dashboard end********************/


   /* ******************logout start********************/
    else if($post->functionName === 'logout'){
      session_destroy();
      echo json_encode(0);
    }
   /* ******************logout end********************/


    /* ******************forgetpwd start********************/
    else if($post->functionName === 'forgetpassword'){
       $email=$post->email;
       $phone=$post->phone;
       $password=md5($post->pwd);
       $sql = "UPDATE register SET password='$password' WHERE email='$email' AND phone='$phone'";

       if ($conn->query($sql) === TRUE) {
         echo json_encode(1);
       }else {
         echo json_encode(0);
       }

       $conn->close();
    }

    /* ******************forgetpwd end********************/

     /* ******************checklogin start********************/
    else if($post->functionName === 'checklogin'){
      if(empty($_SESSION['email'])){
        echo json_encode(0);
      }else{
        echo json_encode(1);
      }
    }
    /* ******************checklogin end********************/
    
    /* ******************changepwd start********************/
    else if($post->functionName === 'Changepassword'){
       $oldpwd=md5($post->oldpwd);
       $newpwd=md5($post->newpwd);
       $userid=$_SESSION['id'];
       $sql = "SELECT * FROM register where s_no='$userid'";
       $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if($row["password"] === $oldpwd){
              $sqll = "UPDATE register SET password='$newpwd' WHERE s_no='$userid'";
              if($conn->query($sqll) === TRUE) {
               echo json_encode(1);
              }
            }
          }
        }
        else {
          echo json_encode(0);
        }
      $conn->close();
    }
    /* ******************changepwd end********************/
    else {
      echo json_encode(0);
    }


?>