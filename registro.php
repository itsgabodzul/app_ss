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
                    <p class="tt_form">Nombre(s): <span class="obligacion">*</span></p> 
                    <input type="text" name="nombres" placeholder="Nombre(s)" required  pattern="^(?!\s)[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" 
                    title="El nombre no debe iniciar con espacios ni contener números.">
                </div>
                <div>
                    <p class="tt_form">Apellidos: <span class="obligacion">*</span></p>
                    <input type="text" name="apellidos" placeholder="Apellidos" required  pattern="^(?!\s)[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" 
                    title="No debe iniciar con espacios ni contener números.">
                </div>
                <div>
                    <p class="tt_form">Matricula (Inicia con E): <span class="obligacion">*</span></p>
                    <input type="text" name="matricula" placeholder="Matricula" required pattern="E2\d{7}" title="Debe de iniciar con una E">
                </div>
                <div>
                    <p class="tt_form">Correo Institucional: <span class="obligacion">*</span></p>
                    <input type="text" name="email" placeholder="Correo" required pattern="[a-zA-Z0-9._%+-]+@merida\.tecnm\.mx" 
                    title="El correo debe terminar en @merida.tecnm.mx">
                </div>
                <div >
                <p class="tt_form">Contraseña: <span class="obligacion">*</span></p>
                    <input type="password" name="contrasena" placeholder="Contraseña" required id="password"  minlength="8" 
                    title="La contraseña debe tener al menos 8 caracteres."><button type="button" id="togglePassword">Mostrar</button>
                </div>
                <div>
                    <p class="tt_form">Carrera: <span class="obligacion">*</span></p>
                    <select name="carrera" id="carreras" required>
                        <option value="">Selecciona una carrera</option>
                        <option value="Licenciatura en Administración">Licenciatura en Administración</option>
                        <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                        <option value="Ingeniería Bioquímica">Ingeniería Bioquímica</option>
                        <option value="Ingeniería Biomédica">Ingeniería Biomédica</option>
                        <option value="Ingeniería Civil">Ingeniería Civil</option>
                        <option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option>
                        <option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
                        <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                        <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                        <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                        <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                        <option value="Ingeniería Química">Ingeniería Química</option>
                    </select>
                </div>
                <div class="select">
                    <div>
                        <p class="tt_form">Sexo: <span class="obligacion">*</span></p>
                        <select name="sexo" id="" required>
                            <option value="0">Seleccione</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                    </div>
                    <div>
                        <p class="tt_form">Ingreso: <span class="obligacion">*</span></p>
                        <select name="ingreso" id="" required>
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
    <script>
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("password");

        togglePassword.addEventListener("click", function () {
            if (password.type === "password") {
            password.type = "text";
            togglePassword.textContent = "Ocultar";
            } else {
            password.type = "password";
            togglePassword.textContent = "Mostrar";
            }
        });
    </script>
</body>
</html>