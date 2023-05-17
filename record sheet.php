<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'PLV_ClINIC';

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Fetching data from the database
    $result = $conn->query("SELECT * FROM Clinic_Records");

    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>First Name</th>';
        echo '<th>Middle Name</th>';
        echo '<th>Last Name</th>';
        echo '<th>Complaint</th>';
        echo '<th>Management</th>';
        echo '<th>Date</th>';
        echo '<th>Contact Number</th>';
        echo '<th>Gender</th>';
        echo '<th>Case Diagnosis</th>';
        echo '<th>Current Symptoms</th>';
        echo '<th>Other Symptoms</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['middle_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['complaint'] . '</td>';
            echo '<td>' . $row['management'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['contact_number'] . '</td>';
            echo '<td>' . $row['gender'] . '</td>';
            echo '<td>' . $row['case_diagnosis'] . '</td>';
            echo '<td>' . $row['current_symptoms'] . '</td>';
            echo '<td>' . $row['other_symptoms'] . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No records found.";
    }

    $conn->close();
    ?>
    </div>
    <br><br><br><br><br><br><br><br>
    <div class="container-fluid row" id="special-div">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 id="latenum1">Number of Today's Patients: <span id="tot-patients"></span></h3>
      </div>
    </div>

    <?php 
        $conn = new mysqli($host, $username, $password, $database);
        $total = $conn->query
        ("SELECT COUNT(*) FROM Clinic_Records")->fetch_row()[0];
        $conn->close();
        echo "<script>document.getElementById('tot-patients').innerHTML = $total;</script>";
      ?>

<div class="container-fluid row">
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

<button id="backhome" class="btn btn-lg bg-light btn-block"><a id="d" href="dashboard.html" style="text-decoration: none;">Back to Dashboard</a></button>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="display-6 text-center text-dark fs-6 fw-lighter lh-base mt-2">
  © Pamantasan ng Lungsod ng Valenzuela Clinic | All rights reserved 2023.
  </footer>
</body>
</html>
