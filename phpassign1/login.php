<?php

  /* Setting the login as true in session 
  *  and relocating to homepage.
  */
  session_start();
  if (isset($_POST['loginSubmit'])) {
    $_SESSION['logged'] = true;
    $_SESSION['email'] = $_POST['loginEmail'];
    $_SESSION['pass'] = $_POST['loginPass'];
    header('Location: assign4.php');
  }
?>
