<?php  

require './Classes/dbClass.php';

$db =new Database();

 $sql = "select * from blog";
 $result  =  $db->query($sql);

?>









<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Blog - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>Read Blog </h1> 
            <br>

        </div>

        <?php 
        
           if(isset($_SESSION['message'])){
               echo $_SESSION['message'];
               unset($_SESSION['message']);
           }
        
        ?>


    <a href="create.php">+ Blog</a>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>

                <th>action</th>         
            </tr>

        <?php 
            while($data = mysqli_fetch_assoc($result)){
        ?>
           <tr>
           <td><?php echo $data['id'];?></td>
           <td><?php echo $data['title'];?></td>
           <td><?php echo $data['content'];?></td>
           <td><img src="./uploads/<?php echo $data['image']?>" width="50px"> </td>
         
                 <td>
                     
                 <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                </td> 
           </tr> 
         <?php  } ?>
       
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>




