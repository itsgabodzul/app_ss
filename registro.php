<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin/styles.css">
</head>
<body class="bg_login">
    <div class="cont_login">
        <div class="cont_logo">
            <img class="logo" src="merida.png" alt="">
        </div>
        <div class="campos">
            <form action="guardar_usuario2.php" method="post">
                <div>
                    <p class="tt_form">Nombre(s):</p>
                    <input type="text" name="nombres" placeholder="Nombre(s)" required>
                </div>
                <div>
                    <p class="tt_form">Apellidos:</p>
                    <input type="text" name="apellidos" placeholder="Apellidos" required>
                </div>
                <div>
                    <p class="tt_form">Matricula (Inicia con E):</p>
                    <input type="text" name="matricula" required placeholder="Matricula" required>
                </div>
                <div>
                    <p class="tt_form">Correo Institucional:</p>
                    <input type="text" name="email" placeholder="Correo" required>
                </div>
                <div >
                <p class="tt_form">Contraseña:</p>
                    <input type="text" name="contrasena" placeholder="Contraseña" required>
                </div>
                <div>
                    <p class="tt_form">Carrera:</p>
                    <input type="text" name="carrera" required placeholder="Carrera" required>
                </div>
                <div class="select">
                    <div>
                        <p class="tt_form">Sexo:</p>
                        <select name="sexo" id="">
                            <option value="0">Seleccione</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                    </div>
                    <div>
                        <p class="tt_form">Ingreso:</p>
                        <select name="ingreso" id="">
                            <option value="0">Seleccione</option>
                            <option value="7">Septimo</option>
                            <option value="8">Octavo</option>
                            <option value="9">Noveno</option>
                            <option value="10">Decimo</option>
                            <option value="11">Onceavo</option>
                            <option value="12">Doceavo</option>
                        </select>
                    </div>
                </div> <br>
                <!-- HIDDEN -->
                <input type="hidden"  name="rol" value="estudiante">
                <button  type="submit" class="">Registrarse</button>
            </form>
            <!-- <hr>
            <br>
            <p class="info_final">© 2024 <a class="" href="https://gabodzul.netlify.app/" target="_blank">Gabo Dzul.</a> Todos los derechos reservados.
            </p><br> -->
        </div>
    </div>
    <div></div>
</body>
</html>