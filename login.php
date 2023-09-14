<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
    <title>Login</title>
</head>

<body>
    <center>
        <h1>Bienvenido</h1>
        <form class="user" action="./controlador/SQLlogin.php " method="POST" name="form"
            onsubmit="return validarformularioIn();">
            <div class="form-group">
                <label class="labels">
                    Usuario
                </label>
                <input type="text" class="form-control form-control-user" id="txtusuarioLogin" name="usuarioLogin"
                    aria-describedby="emailHelp" placeholder="Ingrese el su nombre de usuario...">
            </div>

            <div class="form-group">
                <label class="labels">
                    Clave
                </label>
                <input type="password" class="form-control form-control-user" id="txtclaveLogin"
                    placeholder="ingrese su clave..." name="claveLogin">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    
                </div>
            </div>
            <button class="btn btn-primary btn-user btn-block" id="btn-iniciar-sesion">
                Iniciar Sesión
            </button>

        </form>
     
    </center>
</body>
<script src="./personalizados/funcionlogin.js"></script>

</html>