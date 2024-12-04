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
  } else {
      echo "Connection Successful<br>";
  }

  // SQL query to create the MovieTest table
  $sql = "CREATE TABLE MovieTest (
      MovieID INT AUTO_INCREMENT PRIMARY KEY,
      MovieTitle VARCHAR(255) NOT NULL,
      ReleaseYear INT,
      Genre VARCHAR(100),
      Rating DECIMAL(3, 1)
  )";

  // Execute the query
  if ($DBConnect->query($sql) === TRUE) {
      echo "Table 'MovieTest' created successfully!";
  } else {
      echo "Error creating table: " . $DBConnect->error;
  }

  // Close the database connection
  $DBConnect->close();
  ?>
</body>
</html>
