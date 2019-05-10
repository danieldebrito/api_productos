<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './composer/vendor/autoload.php';
require './AccesoDatos.php';
require './pelicula/peliculaApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->get("/test", function() {
	echo "Hola mundo desde la API";
});

$app->group('/peliculas', function () {
 
  $this->get('/', \peliculaApi::class . ':getAll');

  $this->get('/descripcion/{nombre}', \peliculaApi::class . ':getOneDescrip');


  $this->delete('/{id}[/]', \peliculaApi::class . ':delete');

   /*
  $this->get('/{id}', \productoApi::class . ':getOne');


  
 
  $this->get('/{id}', \cdApi::class . ':traerUno');

  $this->post('/', \cdApi::class . ':CargarUno');


  $this->put('/', \cdApi::class . ':ModificarUno');
  */
     
});

// cors habilitadas
$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
          ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->run();