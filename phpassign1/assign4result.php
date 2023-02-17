<?php
  session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags. -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS. -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Including style.css. -->
  <link rel="stylesheet" href="css/style.css">

  <title>Assign4 Result</title>
  <!-- Including jquery. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="bg-image">
  <div class="main m-3">
    <div class="main-container container-form flex-col blur-container">
      <?php
        // Creating class object and passing value to it.
        require 'classFormData.php';
        $formData = new FormData();
        if (isset($_FILES['image']) && !isset($errors['fileType'])) {
          $image = $_FILES['image'];
          $formData->setImage($image);
          $formData->setFirstName($_POST['inputFirstName']);
          $formData->setLastName($_POST['inputLastName']);
          $fullName = $formData->inputFirstName . ' ' . $formData->inputLastName;
          $formData->setPhone($_POST['inputPhone']);
          $formData->uploadImage();
          if (!$formData->errorCheck4()) {
            foreach ($formData->errors as $value) {
              ?>
              <h4>
                <?php echo "$value"; ?>
                <br>
              </h4>
              <?php
            }
            exit();
          }
          
        }
      ?>
      <!-- Show the contents. -->
      <img src='<?php echo "$formData->destination" ?>' alt="profile pic" class="profile-pic">
      <h2>
        Hello
        <?php echo "$fullName" ?>
      </h2>
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
      <h4>
        Your Phone number is:
        <?php echo "$formData->phoneNumber" ?>
      </h4>
      <a href="assign4.php">Go Back</a>
    </div>
  </div>

</body>

</html>