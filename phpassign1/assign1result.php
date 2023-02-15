<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- style.css -->
  <link rel="stylesheet" href="css/style.css">

  <title>Assign1 Result</title>
</head>

<body>
  <div class="main">
    <div class="main-container container flex-col">
      <?php
        require 'classFormData.php';
        $formData = new FormData();
        if (isset($_POST['submit'])) {
          $formData->setFirstName($_POST['inputFirstName']);
          $formData->setLastName($_POST['inputLastName']);
          $fullName = $formData->inputFirstName . ' ' . $formData->inputLastName;
          if (!$formData->errorCheck()) {
            foreach ($formData->errors as $value) {
              ?>
              <h4>
                <?php echo "$value"; ?>
                <br>
              </h4>
            <?php
            }
            die();
          }
        }
      ?>
      <h2>
        Hello
        <?php echo "$fullName";?>
      </h2>
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