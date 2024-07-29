<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafetería Interactiva</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+BE+VLG:wght@100..400&family=Playwrite+BE+WAL:wght@100..400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+BE+VLG:wght@100..400&family=Playwrite+BE+WAL:wght@100..400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Playwrite+BE+VLG:wght@100..400&family=Playwrite+BE+WAL:wght@100..400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Kalnia+Glaze:wght@100..700&family=Playwrite+BE+VLG:wght@100..400&family=Playwrite+BE+WAL:wght@100..400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Kalnia+Glaze:wght@100..700&family=Playwrite+BE+VLG:wght@100..400&family=Playwrite+BE+WAL:wght@100..400&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-image: url('/cafeteria_js/src/images/fondo2.jpg');
            background-size: cover;
            background-position: center center;
            height: 100vh;
            margin: 0;
        }

        .container {
            border-radius: 5%;
            box-shadow: 2px 2px 5px skyblue;
        }

        .bg-text {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }

        .menu-item {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        h1 {
            font-family: "Playwrite BE WAL", cursive;
            text-shadow: 2px 2px 5px skyblue;
            margin-top: 1%;
        }

        h3 {
            font-family: "Playwrite BE VLG", cursive;
        }

        h4 {
            font-family: "Righteous", sans-serif;
            text-shadow: 2px 2px 5px skyblue;
        }

        p {
            font-family: "Josefin Sans", sans-serif;
            text-align: left;
        }

        hr {
            background-color: white;
        }
    </style>
</head>

<body>

<?php include_once '../includes/navbar.php' ?>

    <div class="container bg-text mt-5 pt-3 justify-content-center p-5">
        <h1>Bienvenido a Nuestra Cafetería</h1>
        <br><br>
        <h3>Menú del Día</h3>
        <hr>
        <div>
            <div class="row">
                <div class="col-md">
                    <div class="menu-item">
                        <h4><u>Platos</u></h4>
                        <p>- Desayunos</p>
                        <p>- Almuerzos</p>
                        <p>- Cenas</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="menu-item">
                        <h4><u>Antojos</u></h4>
                        <p>- Dobladas</p>
                        <p>- Tostadas</p>
                        <p>- Rellenitos</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="menu-item">
                        <h4><u>Bebidas</u></h4>
                        <p>- Cafe</p>
                        <p>- Licuados</p>
                        <p>- Smoothies</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="menu-item">
                        <h4><u>Postres</u></h4>
                        <p>- Pies</p>
                        <p>- Helados</p>
                        <p>- Crepas</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <a href="#contacto" class="btn btn-light btn-lg"><i class="bi bi-telephone-inbound-fill"></i> Contáctanos</a>
            </div>
            <div class="col">
                <a href="https://www.whatsapp.com/?lang=es_LA" class="btn btn-success btn-lg"><i class="bi bi-whatsapp"></i> WhatsApp</a>
            </div>
            <div class="col">
                <a href="https://www.instagram.com/" class="btn btn-warning btn-lg"><i class="bi bi-instagram"></i> Instagram</a>
            </div>
            <div class="col">
                <a href="https://www.facebook.com/" class="btn btn-primary btn-lg"><i class="bi bi-facebook"></i>Facebook</a>
            </div>
            <div class="col">
                <a href="https://x.com/?lang=es" class="btn btn-dark btn-lg"><i class="bi bi-twitter-x"></i> Twitter</a>
            </div>
            <div class="col">
                <a href="https://www.youtube.com/" class="btn btn-danger btn-lg"><i class="bi bi-youtube"></i> Youtube</a>
            </div>
            <div class="col">
                <a href="https://web.telegram.org/" class="btn btn-info btn-lg"><i class="bi bi-telegram"></i> Telegram</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>