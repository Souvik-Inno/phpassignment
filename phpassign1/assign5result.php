<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- style.css -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Assign1 Result</title>
</head>

<body>
  <div class="main bg-success">
    <div class="main-container container">
      <?php
        require 'classFormData.php';
        $formData = new FormData();
        if (isset($_FILES['image']) && !isset($errors['fileType'])) {
          $image = $_FILES['image'];
          $formData->setImage($image);
          $formData->uploadImage();
        }
      ?>
      <img src='<?php echo "$formData->destination" ?>' alt="profile pic" height="300px">
      <h4>
        <?php
          if (isset($_POST['submit'])) {
            $formData->setFirstName($_POST['inputFirstName']);
            $formData->setLastName($_POST['inputLastName']);
            $fullName = $formData->inputFirstName . ' ' . $formData->inputLastName;
            if ($formData->errorCheck()) {
              // form data is valid
              echo "Hello $fullName";
            } else {
              //   form data is not valid, show error messages
              foreach ($errors as $value) {
                echo "$value <br>";
              }
            }
          }
        ?>
      </h4>
      <table>
        <tr>
          <th>Subject</th>
          <th>Marks</th>
        </tr>
        <?php 
          if (isset($_POST['submit'])) {
            $formData->tableData($_POST['marks']);
          }
        ?>
      </table>
          <?php 
            if (isset($_POST['submit'])) {
              $formData->setPhone($_POST['inputPhone']);
            }
          ?>
      <h4>
          Your Phone number is: <?php echo "$formData->phoneNumber" ?>
      </h4>
      <?php 
        if (isset($_POST['submit'])) {
          $formData->setEmailId($_POST['inputEmail']);
          $formData->checkEmail();
        }
      ?>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>