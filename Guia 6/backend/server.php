<?php
/**
 * DEBUG MODE
 */


 //Muestra los errores en el modo desarrollo. Es recomendable ocultarlos para luego el cliente no vea errores del server.
ini_set('display_errors', 1);
error_reporting(E_ALL);


//Manejo del CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$archivo='./routes/studentsRoutes.php' //Lo preparo para modulos futuros. 

if (file_exists($archivo)){ // Analiza si el archivo existe y si no es asi agrega un manejador de respuestas 404 si la ruta no existe.
    require_once($archivo);
}
else{
    http_response_code(404);
     echo "<h1>Error 404</h1><p>La página solicitada no existe.</p>";
     exit;
}
?>