<?php include('includes/header.php') ?>
<?php include('crud.php') ?>

<div class="container p-4">
        <div class="row">
        <div class="col-md-8">
            <?php if (isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset(); } ?>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Año</th>
                            <th>Autor</th>
                            <th>Titulo</th>
                            <th>Especialidad</th>
                            <th>Editorial</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM libro";
                        $listado = $conn ->query($query);
                        
                        while($row = mysqli_fetch_array($listado)){?>
                            <tr>
                                <td><?php echo $row['anio'] ?></td>
                                <td><?php echo $row['autor'] ?></td>
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['especialidad'] ?></td>
                                <td><?php echo $row['editorial'] ?></td>
                                <td>
                                    <div class="container-button">
                                        <div class="button">
                                            <a href="<?php echo $row['ubicacion_url']?>" target="_blank"><img src="css/icons/book.svg" onclick="return confirm('Se le enviará a otra pestaña')"alt="" ></a>
                                        </div>
                                        <div class="button">
                                            <a href="?edit=<?php echo $row['id'] ?>"><img src="css/icons/pencil-fill.svg" onclick="return confirm('Confirmar actualización :)')" alt=""></a>
                                        </div>
                                        
                                        <div class="button">
                                            <a href="?del=<?php echo $row['id'] ?>"><img src="css/icons/trash-fill.svg" onclick="return confirm('Confirmar elimincación :)')" alt="">
                                        </a>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                        <?php } ?>
                    </tbody>
                </table>
        </div>
        <div class="col-md-3">
            
            <div class="card card-body">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="anio" placeholder="Año" value="<?php if (isset($_GET['edit'])){
                                echo $getRow['anio'];
                        }?>"> 
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="autor" placeholder="Autor" value="<?php if (isset($_GET['edit'])){
                                echo $getRow['autor'];
                        }?>">
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="titulo" placeholder="Titulo" value="<?php if(isset($_GET['edit'])){
                                echo $getRow['titulo'];
                        }?>">
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="especialidad" placeholder="Especialidad" value="<?php if(isset($_GET['edit'])){
                                echo $getRow['especialidad'];
                        }?>">
                    </div>
                    <div class="input-group mb-3" >
                        <input class="form-control" type="text" name="editorial" placeholder="Editorial" value="<?php if(isset($_GET['edit'])){
                                echo $getRow['editorial'];
                        } ?>">
                    </div>
                    <div class="input-group mb-3" >
                        <input class="form-control" type="text" name="ubicacion_url" placeholder="Ubicacion URL" value="<?php if(isset($_GET['edit'])){
                                echo $getRow['ubicacion_url'];
                        } ?>">
                    </div>            
                    <div class="input-group mb-3">
                        <div class="d-grid gap-2 col-6 mx-auto" >
                            <?php 

                                if (isset($_GET['edit'])){
                                    ?>
                                    <button type="submit" name="update" class="btn btn-success"> Editar</button>
                                    <?php
                                }else{
                                    ?>
                                    <button type="submit" name="save" class="btn btn-primary"> Register</button>
                                    <?php
                                }
                            ?>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>