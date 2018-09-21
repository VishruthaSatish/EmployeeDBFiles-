<?php
  if (isset($_GET["id"]) == FALSE) {
    // missing an id parameters, so
    // redirect person back to add employee page
    header("Location: " . "employees.php");
    exit();
  }

  $id = $_GET["id"];

  // check for a POST request
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $query = "DELETE FROM employees ";
    $query .= "WHERE id='" . $id . "' ";
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

    <?php


    ?>


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

          <h3> Are you sure you want to delete this employee ? </h3>
          <form action="delete.php?id=<?php echo $id; ?>" method="POST">
            <button type="submit" name="choice"> Yes! </button>
          </form>

        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->

    <footer>
      &copy; <?php echo date("Y") ?> Cestar College
    </footer>

  </body>
</html>
