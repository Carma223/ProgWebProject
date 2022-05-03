<?php 
$dbhost = "localhost";//host donde esta la base datos
$dbname = "collectorDB";//nombre de la BD
$dbuser = "root";// user name
$dbpass = "";// pass de usuario

$conexion = mysqli_connect( $dbhost,$dbuser,$dbpass,$dbname) or die ("Problemas con la conexion");

if(isset($_POST['Email'])){
$correo=$_POST['Email'];
$password=$_POST['Password'];

$sql="INSERT INTO `usuario` (`id`, `correo`, `password`) 
VALUES (NULL, '$correo', '$password');";


mysqli_query($conexion,$sql);
mysqli_close($conexion);
header('Location: login.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend Store</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleValidacion.css">
</head>

<body>
    <?php require_once("header.php");?>
    <h3>
        Registro de Nuevo Usuario
    </h3>
    <main class="contenedor">
        <form class="formulario formulario__login" action="#" method="POST">
        <label class="emailBox">
            <p> Correo electronico:</p>
			<input type="text" id="Email" name="Email" placeholder="Escribe tu correo...">
			<span class="emailText"></span>
		</label>
        <label class="emailBox2">
            <p> Confirma correo electronico:</p>
			<input type="text" id="Email2" name="Email2" placeholder="Confirma tu correo...">
			<span class="emailText2"></span>
		</label>
        <label class="passBox">
            <p>Contraseña:</p> 
			<input type="password" id="Password" name="Password" placeholder="Escribe tu contraseña...">
			<span class="passText"></span>
		</label>
        <label class="passBox2">
            <p>Confirma contraseña:</p> 
			<input type="password" id="Password2" name="Password2" placeholder="Confirma tu contraseña...">
			<span class="passText2"></span>
		</label>
            <label>
                <span class="passEqual"></span>
            </label>
            <div>
                <input class="formulario__submit" id="Button" type="submit" value="Registrarse">
            </div>
        </form>
    </main>
    <footer class="footer">
        <p class="footer__texto">Collector's Isle - Todos los derechos reservados 2022.</p>
    </footer>
    <script>
		const email = document.getElementById("Email");
		const email2 = document.getElementById("Email2");
		const password = document.getElementById("Password");
		const password2 = document.getElementById("Password2");
		const button = document.getElementById("Button");
        const emailPattern = /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/;
        const passPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

		email.addEventListener('input',()=>{
			const emailBox = document.querySelector('.emailBox');
			const emailText = document.querySelector('.emailText');

			if(email.value.match(emailPattern)){
				emailBox.classList.add('valid');
				emailBox.classList.remove('invalid');
				button.disabled = false;
				emailText.innerHTML = "Tu correo electronico es valida"; 
			}else{
				emailBox.classList.add('invalid');
				emailBox.classList.remove('valid');
				button.disabled = true;
				emailText.innerHTML = "Debes escribir un correo valido.";
                return false; 
			}
		});
        
        email2.addEventListener('input',()=>{
			const emailBox2 = document.querySelector('.emailBox2');
			const emailText2 = document.querySelector('.emailText2');

			if(email2.value.match(emailPattern)){
				emailBox2.classList.add('valid');
				emailBox2.classList.remove('invalid');
				button.disabled = false;
				emailText2.innerHTML = "Tu correo electronico es valida"; 
			}else{
				emailBox2.classList.add('invalid');
				emailBox2.classList.remove('valid');
				button.disabled = true;
				emailText2.innerHTML = "Debes escribir un correo valido."; 
                return false;
			}
		});

		password.addEventListener('input',()=>{
			const passBox = document.querySelector('.passBox');
			const passText = document.querySelector('.passText');
            const passEqual = document.querySelector('.passEqual');
			

			if(password.value.match(passPattern)){
				passBox.classList.add('valid');
				passBox.classList.remove('invalid');
				passText.innerHTML = "Tu contraseña es valida"; 
			}else{
				passBox.classList.add('invalid');
				passBox.classList.remove('valid');
				button.disabled = true;
				passText.innerHTML = "Tu contraseña debe contener al menos una Letra mayúscula, una minuscula y un numero";
                return false; 
			}

            if (password.value != password2.value) {
                passEqual.classList.add('invalid');
                passEqual.classList.remove('valid');
				button.disabled = true;
                passEqual.innerHTML = "Las contraseñas no coinciden";
            } else if (password.value == password2.value) {
                passEqual.classList.add('valid');
                passEqual.classList.remove('invalid');
				button.disabled = false;
                passEqual.innerHTML = "Las contraseñas coinciden";
                return false;
            }

		});

        password2.addEventListener('input',()=>{
			const passBox2 = document.querySelector('.passBox2');
			const passText2 = document.querySelector('.passText2');
            const passEqual = document.querySelector('.passEqual');

			if(password2.value.match(passPattern)){
				passBox2.classList.add('valid');
				passBox2.classList.remove('invalid');
				button.disabled = false;
				passText2.innerHTML = "Tu contraseña es valida"; 
			}else{
				passBox2.classList.add('invalid');
				passBox2.classList.remove('valid');
				button.disabled = true;
				passText2.innerHTML = "Tu contraseña debe contener al menos una Letra mayúscula, una minuscula y un numero";
                return false; 
			}

            if (password.value != password2.value) {
                passEqual.classList.add('invalid');
                passEqual.classList.remove('valid');
				button.disabled = true;
                passEqual.innerHTML = "Las contraseñas no coinciden";
            } else if (password.value == password2.value) {
                passEqual.classList.add('valid');
                passEqual.classList.remove('invalid');
				button.disabled = true;
                passEqual.innerHTML = "Las contraseñas coinciden";
                return false;
            }

            
		});
	</script>
</body>
</html>
