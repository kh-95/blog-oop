<?php


require './Classes/BlogClass.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

$title=$_POST['title'];

$content=$_POST['content'];

//  $image = $_POST['image'];








$blog = new Blog ($title,$content);


$blog->create();

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Record</h2>
  
  
  <form   action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post"  enctype="multipart/form-data">


  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Content</label>
    <input type="text"   class="form-control"  name="content" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Content">
  </div>

  
 

  
  <div class="form-group">
    <label >Image</label>
    <input type="file"   class="form-control" name="image"  placeholder="Upload UR Image">
  </div>


  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

</body>
</html>