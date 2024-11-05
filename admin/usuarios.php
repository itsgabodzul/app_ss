<?php require "seguridad.php";
$usuario = $_SESSION['username_admin'];
$id_admin = $_SESSION["id_admin"];
?>
<?php 
if($id_admin != 1){
    header("Location:principal.php");
}?>
<?php include "cookie.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body class="panel">
    <div class="contenedor">
        <?php include "menu_panel.php"?>
        <div class="cont_panel">
            <div class="header_panel">
                <a href="salir.php">Salir <i class="fas fa-times-circle"></i></a>
            </div>
            <div class="info_panel">
                <h1>Usuarios</h1>
                <br>    
                <div class="cont_info">
                <a href="crear_usuario.php" class="btn"><i class="fas fa-plus"></i> Crear usuario</a><br><br>
                <table class="tablaspanel">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>EMAIL</th>
                            <th>ELIMINAR</th>
                        </tr>
                        <?php require "conexion.php";
                        $todos_datos = "SELECT * FROM usuarios ORDER BY id ASC";
                        $resultado = mysqli_query($conectar, $todos_datos);

                        while ($fila = mysqli_fetch_assoc($resultado)){
                        ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td>
                                    <?php echo $fila['nombres']; ?>
                                </td>
                                <td><?php echo $fila['apellidos']; ?></td>
                                <td><?php echo $fila['email']; ?></td>
                                <td><a class="eliminar" href="#" onClick="validar('eliminar_usuario.php?id=<?php echo $fila['id']; ?>')"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php }?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="validar.js"></script>
</html>

