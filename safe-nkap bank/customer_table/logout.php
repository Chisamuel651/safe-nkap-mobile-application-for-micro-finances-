<?php 
   include "../connection.php";
   session_start();
   unset($_SESSION["contact"]);
   session_destroy();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout from SAFE_NKAP</title>
</head>
<body>
    
<script type="text/javascript">
    window.location = "login.php";
</script>
</body>
</html>