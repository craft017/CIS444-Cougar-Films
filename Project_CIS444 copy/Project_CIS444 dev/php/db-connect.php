<!DOCTYPE html>
<html lang='en'>
<head>
</head>
<body>
  <?php
  // Database variables
  $host = 'localhost';
  $username = 'team_1';
  $password = 'w568n78e';
  $dbname = 'team_1';

  // Connection to DB
  $DBConnect = new mysqli($host, $username, $password, $dbname);

  // Check for connection errors
  if ($DBConnect->connect_error) {
      die("Connection failed: " . $DBConnect->connect_error);
  }

  // Close the database connection
  // $DBConnect->close();
  ?>
</body>
</html>
