
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
      <div class="columns">
        <div class="column col-10 col-mx-auto">

          <a href="employees.php" class="btn">Go Back </a>


          <?php

          ?>

          <form action="create.php" method="POST" class="form-group">

            <label class="form-label" for="firstName">First Name</label>
            <input type="text" name="firstName" value="" />


            <label class="form-label" for="lastName">Last Name</label>
            <input type="text" name="lastName" value="" />

            <label class="form-label" for="hireDate">Hire Date</label>
            <input type="text" name="hireDate" value="" />

            <p>
              <input type="submit" value="Create Employee" />
            </p>
          </form>


        </div> <!--//col-10-->
      </div> <!--//columns -->
    </div> <!--// container -->

    <footer>
      &copy; <?php echo date("Y") ?> Cestar College
    </footer>

  </body>
</html>
