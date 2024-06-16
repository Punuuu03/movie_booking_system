<?php

@include 'config.php';

if(isset($_POST['add_placement'])){
   $p_name = $_POST['p_name'];
   $p_role = $_POST['p_role'];
   $p_package = $_POST['p_package'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `placement`(name,role, package, image) VALUES('$p_name', '$p_role', '$p_package', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'placement add succesfully';
   }else{
      $message[] = 'could not add the placement';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `placement` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'placement has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'placement could not be deleted';
   };
};

if(isset($_POST['update_placement'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_role = $_POST['update_p_role'];
   $update_p_package = $_POST['update_p_package'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `placement` SET name = '$update_p_name', role = '$update_p_role', package = '$update_p_package', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'placement updated succesfully';
      header('location:admin.php');
   }else{
      $message[] = 'placement could not be updated';
      header('location:admin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Add Placement</title>
   <link rel="stylesheet" href=css/style.css>
<style>
body {
   font-family: Arial, sans-serif;
   background-color: #f8f4e3;
   margin: 0;
   padding: 0;
   color: #333;
}

.container {
   max-width: 1200px;
   margin: 20px auto;
   padding: 20px;
   background-color: #fff;
   border-radius: 10px;
   box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.display-placement-table {
   margin-top: 30px;
}

.display-placement-table table {
   width: 100%;
   border-collapse: collapse;
   border-spacing: 0;
}

.display-placement-table th,
.display-placement-table td {
   padding: 12px 15px;
   text-align: left;
}

.display-placement-table th {
   background-color: #d35400;
   color: #fff;
}

.display-placement-table td {
   border-bottom: 1px solid #ddd;
   background-color: #fff;
}

.display-placement-table img {
   max-width: 100px;
   height: auto;
   border-radius: 5px;
   transition: transform 0.3s;
}

.display-placement-table img:hover {
   transform: scale(1.1);
}

.edit-form-container {
   display: none;
   justify-content: center;
   align-items: center;
   position: fixed;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   width: 80%;
   max-width: 400px;
   height: auto;
   max-height: 80%;
   z-index: 999;
}

.edit-form-container form {
   background-color: #fff;
   padding: 20px;
   border-radius: 10px;
   box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.edit-form-container form img {
   display: block;
   margin-bottom: 10px;
   width: 100%;
}

.edit-form-container form .box {
   width: 100%;
   padding: 10px;
   margin-bottom: 10px;
   border: 1px solid #ccc;
   border-radius: 5px;
   transition: border-color 0.3s;
}

.edit-form-container form .box:focus {
   outline: none;
   border-color: #d35400;
}

.edit-form-container form .btn,
.edit-form-container form .option-btn {
   background-color: #27ae60;
   color: white;
   padding: 10px 20px;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   transition: background-color 0.3s, transform 0.3s;
}

.edit-form-container form .btn:hover,
.edit-form-container form .option-btn:hover {
   background-color: #1e8449;
   transform: scale(1.05);
}

#close-edit {
   margin-left: 10px;
}

.delete-btn,
.option-btn,
.btn {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.3s;
}

.delete-btn,
.option-btn {
    color: #fff;
}

.delete-btn {
    background-color: #c0392b;
}

.delete-btn:hover {
    background-color: #a93226;
    transform: scale(1.05);
}

.option-btn {
    background-color: #2980b9;
}

.option-btn:hover {
    background-color: #2471a3;
    transform: scale(1.05);
}

.btn {
    background-color: #d35400;
    color: #fff;
}

.btn:hover {
    background-color: #ba4a00;
    transform: scale(1.05);
}

.add-placement-form {
   max-width: 600px;
   margin: 0 auto;
   padding: 20px;
   background-color: #ffffff;
   border-radius: 10px;
   box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.add-placement-form h3 {
   margin-top: 0;
   margin-bottom: 20px;
   text-align: center;
   font-size: 1.5em;
}

.add-placement-form .box {
   width: 100%;
   margin-bottom: 15px;
   padding: 12px;
   border: 1px solid #ccc;
   border-radius: 5px;
   box-sizing: border-box;
   transition: border-color 0.3s;
}

.add-placement-form .box:focus {
   outline: none;
   border-color: #d35400;
}

.add-placement-form .btn {
   width: 100%;
   padding: 12px;
   background-color: #d35400;
   color: #fff;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   transition: background-color 0.3s, transform 0.3s;
}

.add-placement-form .btn:hover {
   background-color: #ba4a00;
   transform: scale(1.05);
}

   </style>

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-placement-form" enctype="multipart/form-data">
   <h3>add a new movie</h3>
   <input type="text" name="p_name" placeholder="enter the movie name" class="box" required>
   <input type="text" name="p_role" placeholder="enter the theater name" class="box" required>
   <input type="number" name="p_package" min="0" placeholder="enter the ticket price" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the movie" name="add_placement" class="btn">
</form>

</section>

<section class="display-placement-table">

   <table>

      <thead>
         <th>movie image</th>
         <th>movie name</th>
         <th>theater name</th>
         <th>ticket price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_placement = mysqli_query($conn, "SELECT * FROM `placement`");
            if(mysqli_num_rows($select_placement) > 0){
               while($row = mysqli_fetch_assoc($select_placement)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td>₹<?php echo $row['package']; ?>/-</td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no placement added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `placement` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="text" class="box" required name="update_p_role" value="<?php echo $fetch_edit['role']; ?>">
      <input type="number" min="0" class="box" required name="update_p_package" value="<?php echo $fetch_edit['package']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the movie" name="update_placement" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>
<script src="js/script.js"></script>

</body>
</html>