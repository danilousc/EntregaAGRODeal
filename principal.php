<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgroDeal</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
      color: #333;
    }

    header {
      background-color: #4CAF50;
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    header h1 {
      margin: 0;
      font-size: 2em;
      color: #fff;
      text-align: center;
      display: block;
    }

    .regreso {
      text-align: right;
      padding: 10px;
    }

    main {
      display: flex;
      justify-content: center;
      align-items: center; 
      flex-direction: column;
      height: 80vh;
      gap: 20px;
      padding: 20px;
    }

    .seccion {
      text-align: center;
      width: 100%;
      max-width: 400px;
    }

    button {
      padding: 15px 25px;
      font-size: 1em;
      border: unset;
      border-radius: 15px;
      color: #212121;
      z-index: 1;
      background: #e8e8e8;
      position: relative;
      font-weight: 1000;
      width: 100%;
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

    footer {
      background-color: #4CAF50;
      color: #fff;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
      font-weight: bold;
    }
    #btn-cerrar-sesion {
      font-size: 1em; 
      padding: 15px 25px; 
      border: unset;
      border-radius: 15px;
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
      margin-top: 20px; 
    }
    #btn-cerrar-sesion:hover {
      background-color: #fff;
      color: #4CAF50;
    }
  </style>
</head>
<body id="pagina-principal">
  <header id="pagina-principal-header">
      <h1>AgroDeal</h1>
  </header>
  <main>
    <section class="seccion">
      <div class="button-wrapper">
        <button class="button-link" onclick="window.location.href = 'inventario.php';">Productos disponibles</button>
      </div>
    </section>
    <section class="seccion">
      <div class="button-wrapper">
        <button class="button-link" onclick="window.location.href = 'proveedores.php';">Consulta proveedores</button>
      </div>
    </section>
    <section class="seccion">
      <div class="button-wrapper">
        <button class="button-link" onclick="window.location.href = 'carrito.php';">Tus compras</button>
      </div>
      <div class="regreso">
      <button id="btn-cerrar-sesion" onclick="window.location.href = 'index.php';">Cerrar sesión</button>
    </div>
    </section>
  </main>
  <footer>
    <p>&copy; 2024 AgroDeal</p>
  </footer>
</body>
</html>
