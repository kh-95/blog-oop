<?php

require 'dbClass.php';

require 'validateClass.php';


class Blog {

private $title;

private $content; 

private $image;




function __construct($val1,$val2)
{
    $this->title=$val1;
    $this->content=$val2; 
  

}
// create blog

public function create(){

$validate = new Validator;

$title= $validate->Clean($this->title);

$content= $validate->Clean($this->content);

$image = $validate->Clean( $this->image);

   # Image File Data  .... 
   $file_tmp  =  $_FILES['image']['tmp_name'];
   $file_name =  $_FILES['image']['name'];  
   $file_size =  $_FILES['image']['size'];
   $file_type =  $_FILES['image']['type'];   

   $file_ex   = explode('.',$file_name);
   $updated_ex = strtolower(end($file_ex));

 


 $errors=[];


  # validate title

 if(!$validate->validate($title,1)){

$errors['Title']="field required";
 }elseif(!$validate->validate($title,2)){

    $errors['Title']="field must be charcter";

 }

# validate content
if(!$validate->validate($content,1)){

    $errors['Content']="field required";
     }elseif(!$validate->validate($content,3)){
    
        $errors['Content']="field must be more than 50 char";
    
     }



     #validate image


  if(!$validate->validate($file_name,1)){
    $errors['Image'] = "Field Required";
}elseif(!$validate->validate($updated_ex,8)){
    $errors['Image'] = "Invalid Extension";
}

if(count($errors) > 0){

    foreach($errors as $key => $error){
        echo "* ".$key." : ".$error."<br>";
    }

 }else{

# Upload Image ..... 
$finalName = rand().time().'.'.$updated_ex;

$disPath = './uploads/'.$finalName;

   # Upload Image ..... 
   $finalName = rand().time().'.'.$updated_ex;

   $disPath = './uploads/'.$finalName;

 if(move_uploaded_file($file_tmp,$disPath)){

    $db =new Database();

    $sql="insert into blog (title,content,image) values ('$this->title','$this->content','$finalName')";

    $result= $db->query($sql);


    if($result){
        $errors['Message'] = ['Raw Inserted'];
    }else{
    
        $message = ['Error Try Again'];

    }

}else{

    $message = ["Error In Upload Image Try Again"];
 }

 $_SESSION['Message'] = $message;
 header("Location: index.php");
 exit();

 }

}
 



//edit blog 

public function update($id){


    $validate = new Validator;

$title= $validate->Clean($this->title);

$content= $validate->Clean($this->content);

$image = $validate->Clean( $this->image);

   # Image File Data  .... 
   $file_tmp  =  $_FILES['image']['tmp_name'];
   $file_name =  $_FILES['image']['name'];  
   $file_size =  $_FILES['image']['size'];
   $file_type =  $_FILES['image']['type'];   

   $file_ex   = explode('.',$file_name);
   $updated_ex = strtolower(end($file_ex));

 


 $errors=[];


  # validate title

 if(!$validate->validate($title,1)){

$errors['Title']="field required";
 }elseif(!$validate->validate($title,2)){

    $errors['Title']="field must be charcter";

 }

# validate content
if(!$validate->validate($content,1)){

    $errors['Content']="field required";
     }elseif(!$validate->validate($content,3)){
    
        $errors['Content']="field must be more than 50 char";
    
     }



     #validate image


  if(!$validate->validate($file_name,1)){
    $errors['Image'] = "Field Required";
}elseif(!$validate->validate($updated_ex,8)){
    $errors['Image'] = "Invalid Extension";
}

if(count($errors) > 0){

    foreach($errors as $key => $error){
        echo "* ".$key." : ".$error."<br>";
    }

 }else{

# Upload Image ..... 
$finalName = rand().time().'.'.$updated_ex;

$disPath = './uploads/'.$finalName;

   # Upload Image ..... 
   $finalName = rand().time().'.'.$updated_ex;

   $disPath = './uploads/'.$finalName;

 if(move_uploaded_file($file_tmp,$disPath)){

    $db =new Database();

    $sql = "update blog set title = '$title' , content = '$content' , image = '$finalName' where id = $id";

    $result=$db->query($sql);

    if($result){


     
        $errors['message']= ['Raw updated'];

        header ("Location: index.php");

    }else{
        $errors['message'] = ['Error Try Again'];
    }
    



}





 }
}






/// delete




}

?>