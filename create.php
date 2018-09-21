<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  //print_r($_POST);

  // Handle form values sent by addEmployee.php
  $first = $_POST['firstName'];
  $last = $_POST['lastName'];
  $hire = $_POST['hireDate'];

  // do the SQL
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "root";
  $dbname = "apple";

  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $sql =  "INSERT INTO employees";
  $sql .= " (first_name, last_name, hire_date)";
  $sql .= " VALUES (";
  $sql .= "'" . $first . "',";
  $sql .= "'" . $last . "',";
  $sql .= "'" . $hire . "'";
  $sql .=")";

  $result = mysqli_query($connection, $sql);

  if ($result == TRUE) {
    $new_id = mysqli_insert_id($connection);
    header("Location: " . "show.php?id=".$new_id);
    exit();
  }
  else {
    echo "INSERT failed. <br/>";
    echo "SQL command: " . $sql;

    // print out a the error
    echo mysqli_error($connection);
    mysqli_close($connection);

    exit();
  }

  // it's different! you only need to get 1 person, so no loop!


  mysqli_free_result($results);



} else {

  // you got a GET request, so
  // redirect person back to add employee page
  header("Location: " . "addEmployee.php");
  exit();
}
?>
