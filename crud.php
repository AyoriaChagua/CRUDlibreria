<?php include('db.php');

if(isset($_POST['save'])){

    $anio = $_POST['anio'];
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $especialidad = $_POST['especialidad'];
    $editorial = $_POST['editorial'];
    $ubicacion_url = $_POST['ubicacion_url'];

    $stmt1 = $conn->prepare("INSERT INTO libro (anio, autor, titulo, especialidad, editorial, ubicacion_url) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt1->bind_param("ssssss", $anio, $autor, $titulo, $especialidad, $editorial, $ubicacion_url);

    $stmt1->execute();

    if(!$stmt1){
        echo $conn -> error;
    }

    $_SESSION['message'] = 'Libro registrado correctamente';
    $_SESSION['message_type'] = 'success';

}

if(isset($_GET['del'])){
    $id = $_GET['del'];
    $query = $conn -> query("DELETE FROM libro WHERE id = '$id'");
    header('Location: index.php');
    
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $query = $conn->query("SELECT * FROM libro WHERE id = '$id'");
    $getRow = $query->fetch_array();
}


if(isset($_POST['update'])){
    $id = $_GET['edit'];
    $anio = $_POST['anio'];
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $especialidad = $_POST['especialidad'];
    $editorial = $_POST['editorial'];
    $ubicacion_url = $_POST['ubicacion_url'];

    $stmt2 = $conn->prepare("UPDATE libro SET anio = ?, autor =  ?, titulo = ?, especialidad = ?, editorial = ?, ubicacion_url = ? WHERE id=?");

    $stmt2->bind_param('sssssss', $anio, $autor, $titulo, $especialidad, $editorial, $ubicacion_url, $id);

    $stmt2->execute();
    header('Location: index.php');
}




?>

