<?php
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $complaint = $_POST['complaint'];
    $management = $_POST['management'];
    $date = $_POST['date'];
    $contact_number = $_POST['contact_number'];
    $gender = $_POST['Sex'];
    $case_diagnosis = $_POST['case_diagnosis'];
    $current_symptoms = $_POST['current_symptoms'];
    $other_symptoms = $_POST['other_symptoms'];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'PLV_ClINIC';

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }


    $sql = "INSERT INTO Clinic_Records (first_name, middle_name, last_name, complaint, management, date, contact_number, gender, case_diagnosis, current_symptoms, other_symptoms)
            VALUES ('$first_name', '$middle_name', '$last_name', '$complaint', '$management', '$date', '$contact_number', '$gender', '$case_diagnosis', '$current_symptoms', '$other_symptoms')";

    if ($conn->query($sql) === TRUE) {
        echo "Form data saved successfully";
        echo "<script>alert('Patient\'s Information Added');</script>";
        echo "<script>location.reload();</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PLVCliniclogo.jpg" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Patient Registration Form</title>
    <style>
        .form-label {
            font-weight: bold;
        }

        .fs-7 {
            font-size: 0.65em;
        }
    </style>
</head>
<body class="container-fluid p-0 d-flex flex-column justify-content-center align-items-stretch bg-dark">
    <header class="my-0">
        <h2 class="display-3 text-light text-center bg-primary">PLV Clinic Patient's Information</h2>
    </header>

    <div class="d-flex justify-content-center"> 
    <main id="patientRegForm" class="container-fluid p-sm-0 p-md-5 m-sm-0 m-md-2 mb-5 pb-5 bg-dark border-5 rounded">
        
        <div class="d-flex justify-content-between text-white align-items-center">
            <h3 class="display-6 fs-2 fw-bold">Patient Registration Form</h3>
            <a href="./dashboard.html" type="button" class="btn btn-info fs-4 d-flex justify-content-center text-white">Dashboard</a>
        </div>
        <div class="text-white display-6 fs-5 fw-bold">Welcome, Admin<span id="patientName"></span>.</div>

        <div class="mt-4">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform" class="bg-white p-4 rounded">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">First Name:</span>
                  </div>
                  <input class="form-control" type="text" name="first_name" autocomplete="name" required>
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Middle Name:</span>
                  </div>
                  <input class="form-control" type="text" name="middle_name" autocomplete="name">
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Last Name:</span>
                  </div>
                  <input class="form-control" type="text" name="last_name" required>
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Complaint:</span>
                  </div>
                  <input class="form-control" type="text" name="complaint" required>
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Management:</span>
                  </div>
                  <input class="form-control" type="text" name="management" required>
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Date:</span>
                  </div>
                  <input class="form-control" type="date" name="date" style="height: 40px;" required>
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Contact Number (mobile):</span>
                  </div>
                  <input class="form-control" type="number" name="contact_number" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Gender:</span>
                </div>
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Sex" id="maleRadio" value="Male" required>
                        <label class="form-check-label" for="maleRadio">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Sex" id="femaleRadio" value="Female" required>
                        <label class="form-check-label" for="femaleRadio">Female</label>
                    </div>
                </div>
            </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Case Verification:</span>
                  </div>
                  <input class="form-control" type="text" name="case_diagnosis" required>
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Current Symptoms:</span>
                  </div>
                    <select name="current_symptoms" class="custom-select form-control">
                        <option selected disabled>Choose Symptom</option>
                        <option value="Chest Pain">Chest Pain</option>
                        <option value="Respiratory">Respiratory</option>
                        <option value="Hematological">Hematological</option>
                        <option value="Lympathic">Lympathic</option>
                        <option value="Neurological">Neurological</option>
                        <option value="Psychiatric">Psychiatric</option>
                        <option value="Gastrointestinal">Gastrointestinal</option>
                        <option value="Weight Loss">Weight Loss</option>
                    </select>
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">others?</span>
                  </div>
                  <input class="form-control" type="text" name="other_symptoms" placeholder="(If yes, please provide the diagnosis.)">
              </div>
              <div class="text-center mt-5">
                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Reset</button> -->
                  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetForm()">Reset</button>
              </div>
          </form>
          </div>
    </main>
    </div>
    <footer class="display-6 text-center text-white bg-dark fs-6 fw-lighter lh-base mt-2">
        © Pamantasan ng Lungsod ng Valenzuela Clinic | All rights reserved 2023.
    </footer>

    <script>
        function resetForm() {
            document.getElementById("myform").reset(); 
        }
    </script>

</body>
</html>