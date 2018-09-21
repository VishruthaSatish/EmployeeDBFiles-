
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
      <div class="column">
        <div class="column col-10 col-mx-auto">
          <?php

            if (isset($_GET["id"]) == FALSE) {
              echo "<p>ID is missing </p>";
            }
            else {
              // get the id from the URL
              $id = $_GET["id"];
              echo $id;
              echo "<br />";

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

              echo "<p><strong>First Name: </strong>" . $person["first_name"] . "</p>";
              echo "<p><strong>Last Name: </strong>" . $person["last_name"] . "</p>";
              echo "<p><strong>Hire Date: </strong>" . $person["hire_date"] . "</p>";

              echo "<br/>";

              mysqli_free_result($results);
              mysqli_close($connection);

            }
          ?>

          <p>
            <a href="employees.php" class="btn">Go Back</a>
          </p>

        </div> <!--//col-10-->
      </div> <!--//columns -->
    </div> <!--// container -->

    <footer>
      &copy; <?php echo date("Y") ?> Cestar College
    </footer>



  </body>
</html>
