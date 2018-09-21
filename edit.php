<?php
if (isset($_GET["id"]) == FALSE) {
  // missing an id parameters, so
  // redirect person back to add employee page
  header("Location: " . "employees.php");
  exit();
}

$id = $_GET["id"];

// get the item from the database, just like show
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
$sql =  "SELECT * from employees";
$sql .= " WHERE id='" . $id . "'";

$results = mysqli_query($connection, $sql);

if ($results == FALSE) {
  echo "Database query failed. <br/>";
  echo "SQL command: " . $sql;
  exit();
}

// it's different! you only need to get 1 person, so no loop!
$person = mysqli_fetch_assoc($results);
//print_r($person);


// check for a POST request

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // get items from DATABASE
  $person = [];
  $person["firstName"] = $_POST['firstName'];
  $person["lastName"] = $_POST['lastName'];
  $person["hireDate"] = $_POST['hireDate'];

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

  $query = "UPDATE employees SET  ";
  $query .= "first_name='" . $person["firstName"] . "', ";
  $query .= "last_name='" . $person["lastName"] . "', ";
  $query .= "hire_date='" . $person["hireDate"] . "' ";
  $query .= "WHERE id='" .$id . "' ";
  $query .= "LIMIT 1";

  $results = mysqli_query($connection, $query);

  // for delete statements, the result is going to be true or false.
  if ($results == TRUE) {
    header("Location: " . "employees.php");
    exit();
  }
  if ($results == FALSE) {
    echo "Database query failed. <br/>";
    echo "SQL command: " . $query;
    exit();
  }

  mysqli_free_result($results);
  mysqli_close($connection);
}








?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/spectre.min.css">
    <link rel="stylesheet" href="../css/spectre-exp.min.css">
    <link rel="stylesheet" href="./css/spectre-icons.min.css">
  </head>
  <body>
    <header>
      <h1> ADMIN AREA </h1>
    </header>

    <nav>
      <ul>
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="employees.php">Employees</a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <div class = "columns">
        <div class="column col-10 col-mx-auto">
        <?php  print_r($person); ?>
          <form action="" method="POST" class="form-group">

            <label class="form-label" for="firstName">First Name</label>
            <input type="text" name="firstName" value="<?php echo $person['first_name']?>" />


            <label class="form-label" for="lastName">Last Name</label>
            <input type="text" name="lastName" value="<?php echo $person['last_name'] ?>" />

            <label class="form-label" for="hireDate">Hire Date</label>
            <input type="text" name="hireDate" value="<?php echo $person['hire_date'] ?>" />

            <p>
              <input type="submit" value="Update Employee" />
            </p>
          </form>


        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->

    <footer>
      &copy; <?php echo date("Y") ?> Cestar College
    </footer>

    <?php
      // clean up and close database
      mysqli_free_result($results);
      mysqli_close($connection);
    ?>

  </body>
</html>
