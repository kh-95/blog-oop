<?php 

require './Classes/BlogClass.php';

// require './Classes/validateClass.php';

$id = $_GET['id'];
$errors = [];
# Start Validation .... 

$validate =new validator ;

if(!$validate->validate($id,1)){
    $errors['id'] = "Field Required";
}elseif(!$validate->validate($id,4)){

    $errors['id'] = "Invalid id";
}


if(count($errors) > 0){

    $Message = $errors;
}else{
  
# Fetch Image .....   

$db =new Database();
$sql = 'select image from blog where id ='.$id;
$result= $db->query($sql);
$data = mysqli_fetch_assoc($result);


  # Delete Logic ..... 
  $sql = "delete from blog where id = $id";
  $result= $db->query($sql);
   
  if($result){
      unlink('./uploads/'.$data['image']);
     
      $message = ['Raw Removed'];
  }else{
      $message = ["Error In Process try again"];
  }

   
   $_SESSION['Message'] = $message;

   header("Location: index.php");

}







?>