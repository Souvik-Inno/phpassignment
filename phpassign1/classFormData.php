<?php

  /** 
   *  Class containing all the data entered through the forms.
   *  Contains Methods to set the class variables and
   *  work with them to give desired outputs.
   */
  class FormData {

    /** 
     *  Declaring variables.
     *  @var string $inputFirstName For storing first name from form.
     *  @var string $inputLastName For storing last name from form.
     *  @var array $image For storing image array containing name, tmp_name etc.
     *  @var string $destiation For storing destination of image.
     *  @var string[] $tableDataArray For storing string array of subject and marks.
     *  @var int $phoneNumber For storing phone Number from form.
     *  @var string $apiKey For storing apiKey for mail verification.
     *  @var string $emailId For storing email id from form.
     *  @var array $errors For storing errors generated.
     */
    public $inputFirstName;
    public $inputLastName;
    public $image;
    public $destination;
    public $tableDataArray;
    public $phoneNumber;
    public $apiKey = "wPIk6UQ8PzRDPadxH7xfWqwEes9ZHLRm";
    public $emailId;
    public $errors = array(
      'inputFirstName' => '',
      'inputLastName' => '',
      'image' => '',
      'tableDataArray' => '',
      'phoneNumber' => '',
      'emailId' => ''
    );

    /**
     *  Function to set first name.
     *  @param string $firstName Stores first name.
     */
    public function setFirstName($firstName) {
      $this->inputFirstName = $firstName;
    }

    /**
     *  Function to set Last name.
     *  @param string $lastName Stores last name.
     */
    public function setLastName($lastName) {
      $this->inputLastName = $lastName;
    }

    /**
     *  Function to set image.
     *  @param string $img Stores image.
     */
    public function setImage($img) {
      $this->image = $img;
    }

    /**
     *  Function to set number.
     *  @param int $number Stores phone number.
     */
    public function setPhone($number) {
      $this->phoneNumber = $number;
    }

    /**
     *  Function to set email id.
     *  @param string $email Stores email id.
     */
    public function setEmailId($email) {
      $this->emailId = $email;
    }

    /**
     *  Function to set Subject and Marks for table.
     *  @param string $tableDataArray Stores table data as string.
     */
    public function setTableDataArray($tableDataArray){
      $this->tableDataArray = $tableDataArray;
    }

    /**
     *  Function to upload image.
     *  Moves the uploaded image to destination in server.
     */
    public function uploadImage() {
      $filename = $this->image['name'];
      $this->destination = 'images/' . $filename;
      move_uploaded_file($this->image['tmp_name'], $this->destination);
    }

    /**
     * Checks error in first and last name.
     */
    public function errorCheck() {
      $errorCount = 0;
      if (empty($this->inputFirstName)) {
        $this->errors['inputFirstName'] = "*First Name is required.";
        $errorCount++;
      }
      if (empty($this->inputLastName)) {
        $this->errors['inputLastName'] = "*Last Name is required.";
        $errorCount++;
      }
      if ($errorCount == 0) {
        return TRUE;
      }
      return FALSE;
    }

    /**
     * Checks error in firstname, lastname and image.
     */
    public function errorCheck2() {
      $errorCount = 0;
      if (empty($this->inputFirstName)) {
        $this->errors['inputFirstName'] = "*First Name is required.";
        $errorCount++;
      }
      if (empty($this->inputLastName)) {
        $this->errors['inputLastName'] = "*Last Name is required.";
        $errorCount++;
      }
      if (empty($this->image) || !@exif_imagetype($this->destination)) {
        $this->errors['image'] = "*Image is required.";
        $errorCount++;
      }
      if ($errorCount == 0) {
        return TRUE;
      }
      return FALSE;
    }

    /**
     * Checks error in firstname, lastname, image and marks.
     */
    public function errorCheck3() {
      $errorCount = 0;
      if (empty($this->inputFirstName)) {
        $this->errors['inputFirstName'] = "*First Name is required.";
        $errorCount++;
      }
      if (empty($this->inputLastName)) {
        $this->errors['inputLastName'] = "*Last Name is required.";
        $errorCount++;
      }
      if (empty($this->image) || !@exif_imagetype($this->destination)) {
        $this->errors['image'] = "*Image is required.";
        $errorCount++;
      }
      if(empty($this->tableDataArray)){
        $this->errors['tableDataArray'] = "*Subject and Marks are required.";
        $errorCount++;
      }
      if ($errorCount == 0) {
        return TRUE;
      }
      return FALSE;
    }

    /**
     * Checks errors in firstname, lastname,
     * Image, marks and phonenumber.
     */
    public function errorCheck4() {
      $errorCount = 0;
      if (empty($this->inputFirstName)) {
        $this->errors['inputFirstName'] = "*First Name is required.";
        $errorCount++;
      }
      if (empty($this->inputLastName)) {
        $this->errors['inputLastName'] = "*Last Name is required.";
        $errorCount++;
      }
      if (empty($this->image) || !@exif_imagetype($this->destination)) {
        $this->errors['image'] = "*Image is required.";
        $errorCount++;
      }
      if (empty($this->tableDataArray)) {
        $this->errors['tableDataArray'] = "*Subject and Marks are Required.";
      }
      if (empty($this->phoneNumber) || strlen($this->phoneNumber) < 13) {
        $this->errors['phoneNumber'] = "*PhoneNumber is required.";
        $errorCount++;
      }
      if ($errorCount == 0) {
        return TRUE;
      }
      return FALSE;
    }

    /**
     * Checks errors in firstname, lastname, image, phonenumber and email.
     */
    public function fullErrorCheck() {
      $errorCount = 0;
      if (empty($this->inputFirstName)) {
        $this->errors['inputFirstName'] = "*First Name is required.";
        $errorCount++;
      }
      if (empty($this->inputLastName)) {
        $this->errors['inputLastName'] = "*Last Name is required.";
        $errorCount++;
      }
      if (empty($this->image) || !@exif_imagetype($this->destination)) {
        $this->errors['image'] = "*Image is required.";
        $errorCount++;
      }
      if (empty($this->tableDataArray)) {
        $this->errors['tableDataArray'] = "*Subject and Marks are Required.";
      }
      if (empty($this->phoneNumber) || strlen($this->phoneNumber) < 13) {
        $this->errors['phoneNumber'] = "*PhoneNumber is required.";
        $errorCount++;
      }
      if (empty($this->emailId)) {
        $this->errors['emailId'] = "*Email Id is required.";
        $errorCount++;
      }
      else if (!$this->checkEmail()) {
        $this->errors['emailId'] = "*Invalid Email is entered.";
        $errorCount++;
      }
      if ($errorCount == 0) {
        return TRUE;
      }
      return FALSE;
    }

    /**
     * Function to print subject and marks in a table row.
     */
    public function tableData() {
      $lines = explode("\n", $this->tableDataArray);
      foreach ($lines as $line) {
        list($subject, $mark) = explode("|", $line);
        ?>
        <tr>
          <td>
            <?php echo $subject; ?>
          </td>
          <td>
            <?php echo $mark; ?>
          </td>
        </tr>
        <?php
      }
    }

    /**
     * Function to check if provided email is correct.
     * Uses mailboxlayer api to verify the mail.
     * @var string $apiKey is required to connect to the api.
     */
    public function checkEmail() {
      $curl = curl_init();
      curl_setopt_array(
        $curl,
        array(
          CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email={$this->emailId}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: text/plain",
            "apikey: {$this->apiKey}"
          ),
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => TRUE,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET"
        )
      );
      $response = curl_exec($curl);
      $validator = json_decode($response);
      curl_close($curl);
      if($validator == NULL) {
        return FALSE;
      }
      if ($validator->format_valid && $validator->smtp_check) {
        return TRUE;
      } else {
        print_r($validator);
        return FALSE;
      }
    }

  }
?>