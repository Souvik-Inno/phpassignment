<?php
class FormData
{
  public $inputFirstName;
  public $inputLastName;
  public $image;
  public $destination;
  public $lines;
  public $phoneNumber;
  public $apiKey = "wPIk6UQ8PzRDPadxH7xfWqwEes9ZHLRm";
  public $emailId;
  public $errors = array();
  function setFirstName($firstName)
  {
    $this->inputFirstName = $firstName;
  }
  function setLastName($lastName)
  {
    $this->inputLastName = $lastName;
  }
  function setImage($img)
  {
    $this->image = $img;
  }
  function setLines($lines)
  {
    $this->lines = $lines;
  }
  function setPhone($number)
  {
    $this->phoneNumber = $number;
  }
  function setEmailId($email)
  {
    $this->emailId = $email;
  }
  function getFirstName()
  {
    return $this->inputFirstName;
  }
  function uploadImage()
  {
    $filename = $this->image['name'];
    $this->destination = 'images/' . $filename;
    move_uploaded_file($this->image['tmp_name'], $this->destination);
  }
  function errorCheck(){
    if (empty($this->inputFirstName)) {
      $this->errors['inputFirstName'] = "First Name is required";
    }
    if (empty($this->inputLastName)) {
      $this->errors['inputLastName'] = "Last Name is required";
    }
    if (count($this->errors) == 0) {
      return true;
    }
    return false;
  }
  function fullErrorCheck()
  {
    if (empty($this->inputFirstName)) {
      $this->errors['inputFirstName'] = "First Name is required";
    }
    if (empty($this->inputLastName)) {
      $this->errors['inputLastName'] = "Last Name is required";
    }
    if(empty($this->image)){
      $this->errors['image'] = "Image is required";
    }
    if(empty($this->image)){
      $this->errors['image'] = "Image is required";
    }
    if(empty($this->phoneNumber)){
      $this->errors['phoneNumber'] = "phoneNumber is required";
    }
    if(empty($this->emailId)){
      $this->errors['emailId'] = "Email Id is required";
    }
    if (count($this->errors) == 0) {
      return true;
    }
    return false;
  }
  function tableData($array)
  {
    if(empty($array)){
      return;
    }
    $this->lines = explode("\n", $array);
    foreach ($this->lines as $line) {
      list($subject, $mark) = explode("|", $line);
      ?>
      <tr>
        <td>
          <?php echo $subject; ?>
        </td>
        <td>
          <?php
          echo $mark; ?>
        </td>
      </tr>
    <?php
    }
  }
  function checkEmail()
  {
    $curl = curl_init();

    curl_setopt_array(
      $curl,
      array(
        CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email={$this->emailId}",
        CURLOPT_HTTPHEADER => array(
          "Content-Type: text/plain",
          "apikey: {$this->apiKey}"
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
      )
    );

    $response = curl_exec($curl);

    $validator = json_decode($response);
    // print_r($validator);

    curl_close($curl);
    if ($validator->format_valid && $validator->smtp_check) {
      echo "<h3>correct email provided</h3>";
    } else {
      echo "<h3 class='bg-danger'>incorrect email provided</h3>";
      die();
    }
  }
}
?>