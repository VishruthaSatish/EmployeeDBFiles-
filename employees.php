
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

      $query = "SELECT * FROM employees";
      //$query .= " ORDER BY hire_date ASC";

      $results = mysqli_query($connection, $query);

      if ($results == FALSE) {
        echo "Database query failed. <br/>";
        echo "SQL command: " . $query;
        exit();
      }
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

          <a href="addEmployee.php" class="btn"> Add Employee </a>


          <table class="table">
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Hire Date</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>

            <?php while ($employee = mysqli_fetch_assoc($results)) { ?>
              <tr>
                <td><?php echo $employee['id']; ?></td>
                <td><?php echo $employee['first_name']; ?></td>
                <td><?php echo $employee['last_name']; ?></td>
                <td><?php echo $employee['hire_date']; ?></td>
                <td><a class="action" href="<?php echo 'show.php?id=' . $employee['id']; ?>">View</a></td>
                <td><a class="action" href="<?php echo 'edit.php?id=' . $employee['id']; ?>">Edit</a></td>
                <td><a class="action" href="<?php echo 'delete.php?id='. $employee["id"]; ?>">Delete</a></td>
              </tr>
            <?php } ?>

          </table>


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
