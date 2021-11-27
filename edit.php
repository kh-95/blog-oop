<?php


require './Classes/BlogClass.php';
// require './Classes/dbClass.php';


$id = $_GET['id'];
$errors = [];
# Start Validation .... 

$validate =new Validator;

if(!$validate->validate($id,1)){
    $errors['id'] = "Field Required";
}elseif(!$validate->validate($id,4)){

    $errors['id'] = "Invalid id";
}


if(count($errors) > 0){

    $Message = $errors;

    $_SESSION['Message'] = $Message;

    header("Location: index.php");
    exit();
}else{

    $db =new Database();

 $sql = "select * from blog where id = $id";
$result= $db->query($sql);
 $data = mysqli_fetch_assoc($result);

}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $title=$_POST['title'];

    $content=$_POST['content'];

    
$image=$data['image'];

$blog = new Blog($title,$content);



$blog->update($id );



unlink('./uploads/'.$image); 


}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit</h2>
  
  
  <form   action="edit.php?id=<?php echo $data['id'];?>"  method="post" enctype="multipart/form-data" >


  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $data['title'];?>" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Content</label>
    <input type="text"   class="form-control"  name="content" value="<?php echo $data['content'];?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter content">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file" name="image">

<img src="./uploads/<?php echo $data['image']?>" width="50px"> 
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>