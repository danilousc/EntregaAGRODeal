<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroDeal - Iniciar Sesión</title>
    <style>
        button {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #212121;
            z-index: 1;
            background: #e8e8e8;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
        }

        button::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 15px;
            background-color: #212121;
            z-index: -1;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
        }

        button:hover {
            color: #e8e8e8;
        }

        button:hover::before {
            width: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0; 
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2em;
            color: #4CAF50;
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
            height: 80vh;
            flex-direction: column;
            gap: 20px;
        }

        .login, .registro {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .login form, .registro button {
            margin: 0;
        }

        .login input, .registro button {
            font-size: 1em;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .login input {
            background-color: #e6e6fa;
        }

        .button-link {
            background: none;
            border: none;
            color: #4CAF50;
            cursor: pointer;
            text-decoration: underline;
        }

        .registro h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        footer {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>AgroDeal Para Proveedores</h1>
        <div id="logo">
            <img src="/agrodeal/usuario/logo.jpeg" alt="Logo AgroDeal">
        </div>
    </header>
    <main>
        <section class="login">
            <form action="sesion_prove.php" method="POST">
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Entrar</button>
            </form>
        </section>
        <section class="registro">
            <h2>¿No tienes cuenta?</h2>
            <button onclick="window.location.href = 'registro_prove.php';">Regístrate</button>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 AgroDeal</p>
    </footer>
</body>
</html>
