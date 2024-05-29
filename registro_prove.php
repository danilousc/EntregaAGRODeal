<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroDeal - Registro</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        #logo img {
            width: 100px;
            height: auto;
            display: block;
            margin: 10px auto;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 80vh;
            padding: 20px;
        }

        .registro {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .registro h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        .registro input {
            font-size: 1em;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
        }

        .registro button[type="submit"] {
            font-size: 1em;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            width: 100%;
        }

        .registro button[type="submit"]:hover {
            background-color: #45a049;
        }

        .button-link {
            display: block;
            font-size: 1em;
            color: #4CAF50;
            text-decoration: none;
            margin-top: 20px;
            transition: color 0.3s ease;
        }

        .button-link:hover {
            color: #388E3C;
        }

        footer {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<?php
    include("registrar_prove.php");
?>
<body>
    <header>
        <h1>AgroDeal</h1>
        <div id="logo">
            <img src="/agrodeal/usuario/logo.jpeg" alt="Logo AgroDeal">
        </div>
    </header>
    <main>
        <section class="registro">
            <h2>Registro</h2>
            <form action="" method="POST" id="registro-form">
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                <input type="email" id="correo" name="correo" placeholder="Correo electrónico" required>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                <input type="text" id="ubicacion" name="ubicacion" placeholder="Ubicación" required>
                <button type="submit" name="submit">Registrarse</button>
            </form>
            <a class="button-link" href="index_prove.php">Inicio</a>
        </section>        
    </main>
    <footer>
        <p>&copy; 2024 AgroDeal</p>
    </footer>
</body>
</html>
