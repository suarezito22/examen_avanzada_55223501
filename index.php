
<?php


include_once 'config/database.php';


include_once 'controllers/NotaController.php';


$database = new Database();
$db = $database->getConnection();


$notaController = new NotaController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'registrar') {
    $mensaje = $notaController->registrarNota($_POST['estudiante'], $_POST['descripcion'], $_POST['nota']);
}

$notas = $notaController->listarNotas();
$promedio = $notaController->obtenerPromedio();  


include_once 'views/index.php';
