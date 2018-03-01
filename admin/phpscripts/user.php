<?php
  function createUser($fname, $username, $password, $email, $userlvl) {
    include('connect.php');
    //clean variables first
    //insert is very picky, you don't want to fill out every column (ex. id, ip)
    $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$userlvl}', 'no', 0, 0)";
    //echo $userString;
    $userQuery = mysqli_query($link, $userString);
    if($userQuery){
      redirect_to("admin_index.php");
    }else{
      $message = "There was a problem setting up this user.";
      return $message;
    }
    mysqli_close($link);
  }

  function editUser($id, $fname, $username, $password, $email){
    include('connect.php');
    $updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
    //echo $updatestring;
    $updatequery = mysqli_query($link, $updatestring);
    if($updatequery){
      redirect_to("admin_index.php");
    }else{
      $message = "There was a problem changing your infomation, please contact your web admin.";
      return $message;
    }
    mysqli_close($link);
  }
  // 
  // function trackPasswordChange($password){
  //   include('connect.php');
  // }

  function deleteUser($id){
    //echo $id;
    include('connect.php');
    $delstring = "DELETE FROM tbl_user WHERE user_id={$id}"; //be very specific so that you don't delete the wrong or multiple users
    $delquery = mysqli_query($link, $delstring);
    if($delquery){
      redirect_to("../admin_index.php");
    }else{
      $message = "F%*K, call security... ";
      return $message;
    }
    mysqli_close($link);
  }
?>
