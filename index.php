<?php require_once('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reproductor | Fuente Web</title>
    <link rel="stylesheet" href="./font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/stylesa.css">
    <script src="./font-awesome/js/all.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript"src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"></script>
    <script type="text/javascript"src="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"></script>
    
    
    <script src="/js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
        <link rel="stylesheet" href="./css/main.css">
</head>

<body class="text-light bg-dark ">
    <script>
        start_loader();
    </script>
    <header class=" header">
       <?php require_once('header.php');?>
    </header>
    
    <main>
            <section class="banerimagen">
        <div class="card text-bg-dark ">
            <img src="images/rataaa.png" class="card-img" alt="...">
            <div class="titulohero card-img-overlay ">
                <h5 class="card-title">COMPARTE TU  Y ESCUCHA TU MUSICA..</h5>
                <a type="button" class="btn btn-outline-light" href="#reproo">EMPEZAR</a>
            </div>

        </div>

    </section>
    <section class="ultialbums ">
        <div class="texto-ultialbums bg-dark">
            <div class="titulo-ulitalbums">
                <strong>
                    <h4>ULTIMOS AGREGADOS</h4>
                </strong>
            </div>
            <div class="contenido-ultialbums">
                <p>Conoce y escucha lo último en Sort Sound, el lugar para compartir musica de chicos aburridos que
                    ordenan su stash y no mueren el intento </p>
            </div>
        </div>
        <div class="galeria-albumes">

        </div>

    </section>
    <section class="reproduc" id="reproo">
        <div  class="container-fluid  asa  bg-dark ">
            <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card  text-bg-dark rounded-0 shadow ">
                                <div class="card-header  py-1">
                                    <div class="d-flex w-100">
                                        <h5 class="card-title col-auto flex-grow-1 flex-shrink-1">Lista</h5>
                                        <div class="col-auto">
                                            <button class="btn btn-primary rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#music_modal" type="button"><i class="fa fa-plus"></i> Agregar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-sm  ssd">
                                    <ul class="list-group " id="music-list">
                                        <?php 
                                        $music = $conn->query('SELECT * FROM `music_list` order by title asc');
                                        while($row = $music->fetch_assoc()):
                                        ?>
                                        <li class="list-group-item list-group-item-action bg-dark text-light item" data-id="<?= $row['id'] ?>">
                                            <div class="d-flex w-100 align-items-center">
                                                <div class="col-auto pe-2">
                                                    <img src="<?= is_file(explode("?",$row['image_path'])[0]) ? $row['image_path'] : "./images/music-logo.jpg" ?>" alt="" class="img-thumbnail bg-gradient bg-dark mini-display-img">
                                                </div>
                                                <div class="col-auto flex-grow-1 flex-shrink-1 fs-6 aea ">
                                                    <p class="m-0 text-truncate" title="<?= $row['title'] ?>"><?= $row['title'] ?></p>
                                                </div>
                                                <div class="col-auto px-2">
                                                    <button class="btn btn-outline-secondary btn-sm rounded-circle play" data-id="<?= $row['id'] ?>" data-type="pause"><i class="fa fa-play"></i></button>
                                                    <button class="btn btn-outline-primary btn-sm rounded-circle edit" data-id="<?= $row['id'] ?>"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-outline-danger btn-sm rounded-circle delete" data-id="<?= $row['id'] ?>"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="col-md-12 text-center">
                                    <img src="./images/music-logo.jpg" alt="" id="display-img" class="img-fluid border bg-gradient bg-dark">
                                </div>
                                <h4><b id="inplay-title">---</b></h4>
                                <small class="text-muted" id="inplay-duration">--:--</small>
                                <hr>
                                <p id="inplay-description">---</p>
                                <div class="d-flex w-100 justify-content-center">
                                    <div class="mx-1">
                                        <button class="btn btn-sm btn-light bg-gradient text-dark" id="prev-btn"><i class="fa fa-step-backward"></i></button>
                                    </div>
                                    <div class="mx-1">
                                        <button class="btn btn-sm btn-light bg-gradient text-dark" id="play-btn" data-value="play"><i class="fa fa-play"></i></button>
                                    </div>
                                    <div class="mx-1">
                                        <button class="btn btn-sm btn-light bg-gradient text-dark" id="stop-btn"><i class="fa fa-stop"></i></button>
                                    </div>
                                    <div class="mx-1">
                                        <button class="btn btn-sm btn-light bg-gradient text-dark" id="next-btn"><i class="fa fa-step-forward"></i></button>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="mx-1">
                                        <span id="currentTime">--:--</span>
                                    </div>
                                    <div id="range-holder" class="mx-1">
                                        <input type="range" id="playBackSlider" value="0">
                                    </div>
                                    <div class="mx-1">
                                        <span id="vol-icon"><i class="fa fa-volume-up"></i></span> <input type="range" value="100" id="volume">
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>
            <div class="modal text-dark " id="music_modal"  tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md " >
                    <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-music"></i> Agregar Nueva Canción</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" id="music-form">
                                <input type="hidden" name="id" >
                                <div class="form-group mb-3">
                                    <label for="title" class="control-label">Título</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" required placeholder="Nombre - Título">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description" class="control-label">Descripción</label>
                                    <textarea rows="3" name="description" id="description" class="form-control form-control-sm rounded-0" required placeholder="Escribe aquí una descripción"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="audio" class="control-label">Cargar Audio</label>
                                    <input type="file" name="audio" id="audio" class="form-control form-control-sm rounded-0" required accept="audio/*" onchange="displayFileText(this)">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="img" class="control-label">Cargar Imagen</label>
                                    <input type="file" name="img" id="img" class="form-control form-control-sm rounded-0" accept="image/*" onchange="displayImg(this,'dImage')">
                                </div>
                                <div class="form-group mb-3 text-center">
                                    <div class="col-md-6">
                                    <img src="./images/music-logo.jpg" alt="Image" class=" img-fluid img-thumbnail bg-gradient bg-dark" id="dImage">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm rounded-0" form="music-form">Guardar</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal text-dark" id="update_music_modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-music"></i> Actualizar datos de música</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" id="update-music-form">
                                <input type="hidden" name="id" >
                                <div class="form-group mb-3">
                                    <label for="title2" class="control-label">Título</label>
                                    <input type="text" name="title" id="title2" class="form-control form-control-sm rounded-0" required placeholder="Nombre - Título">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description2" class="control-label">Descripción</label>
                                    <textarea rows="3" name="description" id="description2" class="form-control form-control-sm rounded-0" required placeholder="Escribe la descripción aquí"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="audio2" class="control-label">Archivo de audio</label>
                                    <input type="file" name="audio" id="audio2" class="form-control form-control-sm rounded-0" accept="audio/*" onchange="displayFileText(this)">
                                    <small><i><span class="text-muted">Actual:</span> <span id="audio-current"></span></i></small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="img2" class="control-label">Mostrar imagen</label>
                                    <input type="file" name="img" id="img2" class="form-control form-control-sm rounded-0" accept="image/*" onchange="displayImg(this,'dImage2')">
                                </div>
                                <div class="form-group mb-3 text-center">
                                    <div class="col-md-6">
                                    <img src="./images/music-logo.jpg" alt="Image" class="img-fluid img-thumbnail bg-gradient bg-dark" id="dImage2">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm rounded-0" form="update-music-form">Guardar</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        
        </div>

    </section>
    <section class="footer">
            <div class="container ">
            <p>&copy;  2023 Sort Sound. Todos los derechos reservados.</p>
        </div>


    </section>
   
        
        

        
        
    </main>

    <script> 
        $(document).ready(function () {
        $('#tablita').DataTable();
        });
    </script>
</body>
<?php if(isset($conn) && $conn) @$conn->close(); ?>
</html>