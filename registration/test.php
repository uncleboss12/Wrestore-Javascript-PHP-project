<!DOCTYPE html>
<!--  http://localhost/wrestoreBCK1/index.html  -->
<!--[if IE 6]-->
<html id="ie6" lang="en-US">
<!--[if IE 7]-->
<html id="ie7" lang="en-US">
<!--[if IE 8]-->
<html id="ie8" lang="en-US">
<!--[if !(IE 6) | !(IE 7) | !(IE 8)]-->
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Register | Wrestore</title>

</head>

<body>

  <?php
  $servername = "localhost:3306";
  $username = "root";
  $password = "";
  $dbname = "wrestore1";
  $users_register = "user_list"; //"user_list2";

  // Create connection and query
  $connection_login = new mysqli($servername, $username, $password, $dbname);

  //Query to SELECT data from DB
  $query_consulta = "SELECT * FROM $users_register";
  $result1 = mysqli_query($connection_login,$query_consulta);
  $fila = mysqli_fetch_row($result1);
  echo $fila[0]."<br>";
  echo $fila[1]."<br>";
  echo $fila[2]."<br>";
  echo $fila[3]."<br>";
  echo $fila[4]."<br>";
  echo $fila[5]."<br>";
  echo $fila[6]."<br>";

  //Query to INSERT data to DB
  $query_insert_1 = "INSERT INTO $users_register (firstname, lastname, email,username,password,REG_DATE)
  VALUES ('John', 'Doe2', 'john@example.com','userjohn','passss',NOW())";

  $result2 = mysqli_query($connection_login,$query_insert_1);


  $connection_login->close();
  ?>

</body>
</html>
