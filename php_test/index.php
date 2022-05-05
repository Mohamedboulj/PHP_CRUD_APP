<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title>Document</title>
</head>

<body>
  <?php

  require_once(
    "./connexion.php"
  );
  

  // $sql = "CREATE TABLE Product (" .
  //   "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, " .
  //   "product_name VARCHAR(30) NOT NULL);";


  // if ($mysqli->query($sql)) {
  //   printf("Table products created successfully.<br />");
  // }
  // if ($mysqli->errno) {
  //   printf("Could not create table: %s<br />", $mysqli->error);
  // }


  // $mysqli->close();


  ?>
  <?php
  
  if(isset($_POST["name"])){
  $name = $_POST["name"];
  
  $sql = "INSERT INTO product (product_name) VALUES ('$name')";
   mysqli_query($mysqli,$sql);

  }

  


  ?>
  <div class="container w-50 py-4">


    <form action="" method="post">
      <input type="hidden" value="<?php $row['id'] ?>">
      <div class="mb-3">
        <label class="form-label" for="name">product name</label>
        <input class="form-control" id="name" type="text"  name="name" placeholder="Enter product name" />
      </div>



      <div class="d-grid">
        <button class="btn btn-secondary btn-lg" value="submit" type="submit">Submit</button>
      </div>

    </form>

  </div>
  <?php
  

  $sql = "SELECT * FROM product";
  echo "<div class='container'>";
  if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
    
    echo "<table  class='table table-bordered table-sm table-striped'  >";
       echo "<tr>";
       echo "<th class='text-center'>numero de produit</th>";
       echo "<th class='text-center'>nom de produit</th>";
       echo "<th class='text-center'>Action</th>";
       echo "</tr>";
      while ($row = $result->fetch_array()) {
      ?>
      <tr >
        <td class='text-center'> <?php echo $row['id'];  ?>  </td>
        <td class='text-center'> <?php echo$row['product_name'];?> </td>
        <td class='text-center'><a href=edit.php?id=<?php echo $row['id'] ;?> class="btn btn-primary"> Edit</a>&nbsp;<a href=index.php?id=<?php echo $row['id'] ;?> class="btn btn-danger"> Delete</a> </td>
        <!-- <td border='1px'><a href=edit.php?id=<?php echo $row['id'] ;?> class="btn btn-danger"> Delete</a></td> -->
        </tr>
        <?php
      } 
    echo "</table>";
      $result->free();
    } else {
      echo "No records matching your query were found.";
    }
  } else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
  }
  echo "</div>";

  
  
  
  if (isset($_GET["id"])) {
    $id= $_GET["id"];
    echo "<span>ok</span>"  ;
    $sqlDelete = "DELETE FROM product WHERE id ='$id' " ;
    mysqli_query($mysqli,$sqlDelete);
  }
 
    

  


  // $mysqli->close();
  ?>
</body>

</html>