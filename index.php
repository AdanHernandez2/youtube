<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dan tube</title>
    <link rel="stylesheet" href="normalize/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css?v1.0.5">
    <link rel="stylesheet" href="./css/video-js.css">
	<script src="./js/video.js"></script>
</head>
<body>
    <div class="contenido active" id="contenido">
<!-- _______________________________Header_______________________________________________ -->
        <header class="header">
            <div class="contenido-logo">
                <button id="boton-menu" class="boton-menu "><i class="fas fa-bars"></i></button>
                <a href="#" class="logo"><i class="fas fa-play"></i><span>Adán Hernández</span></a>
            </div>

            <div class="barra-busqueda">
                <input type="text" placeholder="Buscar">
                <button type="submit" ><i class="fas fa-search"></i></button>
            </div>

            <div class="botones-header">
                <button><i class="fas fa-upload"></i></button>
                <button><i class="fas fa-bell"></i></button>
                <a href="#"class="avatar"><img src="img/sec32.jpg" alt="avatar"></a>
            </div>
        </header>
<!-- _______________________________/Header_______________________________________________ -->

<!--________________________________ Menu lateral__________________________________________-->
        <div class="menu-lateral">
            <a href="#" class="active"><i class="fas fa-home"></i>Inicio</a>
            <a href="#" ><i class="fas fa-fire"></i>Tendencias</a>
            <a href="#" ><i class="fas fa-star"></i>Suscripciones</a>
            <hr>
            <a href="#" ><i class="fas fa-folder"></i>Instrumental</a>

        </div>
<!-- __________________________________/Menu lateral ______________________________________ -->

<!-- __________________________________Contenido principal_________________________________ -->
        <div class="main">
            <h3 class="titulos">Videos recomendados</h3>
            <div class="grid-videos">
            <?
                require("conexion.php");
                $conexion = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
                if(mysqli_connect_errno()){
                    echo("Fallo al conectar con la base de datos");
                    exit();
                }
                mysqli_select_db($conexion, $DB_NAME) or die ("No se encuentra la base de datos");
                mysqli_set_charset($conexion, "utf8");
                $consulta = "SELECT * FROM misvideos";
                $resultados = mysqli_query($conexion,$consulta);

                while ($fila=mysqli_fetch_array($resultados))
                {
                    $url=$fila['url'];
                    ?>


                <video class="video video-js vjs-16-9 vjs-big-play-centered"controls data-setup="{}" controls id="fm-video"><? echo("<source src='$url' type='video/mp4' />"); ?></video>


                <?}

                     mysqli_close($conexion);

                ?>

            </div>
        </div>
    </div>

    <script>
		var reproductor = videojs('fm-video', {
			fluid: true
		});
	</script>

    <script src="https://kit.fontawesome.com/2ea417da1b.js" crossorigin="anonymous"></script>
    <script src="main.js" charset="utf-8"></script>
</body>
</html>
