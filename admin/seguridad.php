<?php
session_start();

if ($_SESSION["autentificado_admin"] != "SI") {
    // echo '
    // <script>
    // location.href="index.php" 
    // </script>'
	header("Location: index.php");
	exit();
}
