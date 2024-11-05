<?php

session_start();
session_destroy();
echo '
    <script> 
      alert("SESION FINALIZADA CON EXITO");
      location.href = "index.php";
    </script>
   ';