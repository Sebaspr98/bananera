<?php include('conexion.php') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Principal</title>
</head>

<body>
<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4">Pestañas</h5>
    <a href="index.php" class="text-white h5 bg-dark list-group-item list-group-item-action" aria-current="true">
        Pedidos para exportar</a>
    <a href="fincas.php" class="text-white h5 bg-dark list-group-item list-group-item-action">Fincas</a>
    <a href="camiones.php" class="text-white h5 bg-dark list-group-item list-group-item-action">Camiones</a>
    <a href="insumos.php" class="text-white h5 bg-dark list-group-item list-group-item-action active">Solicitud de insumos</a>    
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
    <div class="container p-4">
        
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php /* session_unset($_SESSION['message']); */
                } ?>
                <div class="card card-body">
                    <form action="guardar.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Empresa que solicita" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripcion de los requimientos"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = ($_SESSION['usuario']['id']);
                        $query = "SELECT * FROM notas where id_usuario = $id";
                        $result_notas = mysqli_query($mysqli, $query);
                        while ($row = mysqli_fetch_array($result_notas)) { ?>
                            <tr>    
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['texto'] ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php 
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>

</html>