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

/*Podria utilizar $_GET[] pero al estar trabajando con URLS me conviene mas parsearlas y tener mas control sobre ellas. */



$get_uri = parse_url($_SERVER['REQUEST_URI']); //Le pido al servidor la URI(parte de la URL a donde se quiere acceder)
$query = $get_uri['query'] //Guardo en $query lo que viene despues de la peticion "?"
parse_str($query, $query_array); // Convierte el query en un array asociativo
$modulo=$query_array['module'];


/* Explicacion del codigo : suponer que tengo una URL -> http://localhost/index.php?module=students
   => $query = "module=students";
       parse_str($query, $query_array);

   =>  $query_array = [
      "module" => "students", 
       ];
*/

$archivo='./routes/studentsRoutes.php' //Lo preparo para modulos futuros. 
$ruta = "/routes/{$modulo}Routes.php"

if (file_exists($ruta)){ // Analiza si el archivo existe y si no es asi agrega un manejador de respuestas 404 si la ruta no existe.
    require_once($ruta);
}
else{
    http_response_code(404); //Muestra error si no existe ningun modulo con el nombre solicitado
    echo "<h1>Error 404</h1><p>La página solicitada no existe.</p>";
    exit();
}
?>