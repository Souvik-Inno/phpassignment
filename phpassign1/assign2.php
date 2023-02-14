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

  <title>PHP Assign</title>
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
  <!-- Header starts here -->
  <header class="bg-dark">
    <div class="header-container container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </div>
  </header>
  <!-- Header Ends here -->

  <!-- Main Section with Form -->
  <div class="main">
    <div class="main-container container">
      <form class="m-5" method="post" action="assign2result.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputFirstName">First Name</label>
          <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" aria-describedby="emailHelp"
            placeholder="Enter First Name">
        </div>
        <div class="form-group">
          <label for="inputLastName">Last Name</label>
          <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Last Name">
        </div>
        <div class="form-group">
          <label for="inputFullName">Full Name</label>
          <input type="text" class="form-control" id="inputFullName" name="inputFullName" placeholder="Full Name"
            disabled>
        </div>
        <div class="form-group">
          <label for="image">Upload Image:</label>
          <input type="file" id="image" name="image" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
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

  <!-- jquery code -->
  <script>
    // for full name from first and last
    $("input[name='inputFirstName'], input[name='inputLastName']").on("input", function () {
      var field1 = $("input[name='inputFirstName']").val();
      var field2 = $("input[name='inputLastName']").val();
      $("input[name='inputFullName']").val(field1 + ' ' + field2);
    });

    // check if image or not
    $("input[type='file']").change(function () {
      var file = this.files[0];
      if (!file.type.match(/image.*/)) {
        alert("The selected file is not an image");
        event.preventDefault();
      }
    });

    // for form validation
    var alphabetRegex = /^[a-zA-Z]+$/;
    $("form").submit(function (event) {
      var inputFirstName = $("input[name='inputFirstName']").val();
      var inputLastName = $("input[name='inputLastName']").val();
      if (!inputFirstName || !inputLastName) {
        alert("Both First Name and Last Name are required fields");
        event.preventDefault();
      }
      if (!alphabetRegex.test(inputFirstName) || !alphabetRegex.test(inputLastName)) {
        alert("Name should contain alphabets only");
        event.preventDefault();
      }
    });
  </script>
</body>

</html>