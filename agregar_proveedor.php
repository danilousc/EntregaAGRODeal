<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            background-color: #f7f7f7; 
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #212121;
            z-index: 1;
            background: #e8e8e8;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
            cursor: pointer;
        }
        input[type="submit"]::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 15px;
            background-color: #212121;
            z-index: -1;
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
        }
        input[type="submit"]:hover {
            color: #e8e8e8;
        }
        input[type="submit"]:hover::before {
            width: 100%;
        }
        .regreso {
            text-align: center;
            margin-top: 20px;
        }
        .button-link {
            display: block;
            margin: 30px auto 0;
            font-size: 20px;
            background-color: #82d68d;
            cursor: pointer;
            color: #000000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none; 
            font-weight: bold;
            transition: background-color 0.3s ease; 
        }
        .button-link:hover {
            background-color: #6cbf97; 
            color: #ffffff; 
        }
        .button-regresar {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #212121;
            z-index: 1;
            background: #e8e8e8;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
            cursor: pointer;
        }
        .button-regresar::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 15px;
            background-color: #212121;
            z-index: -1;
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
        }
        .button-regresar:hover {
            color: #82d68d;
        }
        .button-regresar:hover::before {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Proveedor</h1>
        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" required>
            <label for="contacto">Contacto:</label>
            <input type="email" id="contacto" name="contacto" required>
            <input type="submit" value="Agregar Proveedor">
        </form>
        <div class="regreso">
            <button class="button-regresar" onclick="window.location.href = 'proveedores_admin.php';">Regresar</button>
        </div>
    </div>
</body>
</html>
