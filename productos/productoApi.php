<?php
require_once 'producto.php';
require_once 'IApiUsable.php';

class productoApi extends producto /* implements IApiUsable */
{

	public function getAll($request, $response, $args) {
		$todos=producto::TraerTodos();
		$newResponse = $response->withJson($todos, 200);  
	return $newResponse;
}

public function delete($request,$response,$args){
	$id = $args["id"];
	$respuesta = producto::Borrar($id);
	$newResponse = $response->withJson($respuesta,200);
	return $newResponse;
}


public function getOne($request, $response, $args) {
	$id=$args['id'];
	 $retorno = producto::TraerUno($id);
	 $newResponse = $response->withJson($retorno, 200);  
	 return $newResponse;
}

public function getOneDescrip($request, $response, $args) {
	$descripcion=$args['descripcion'];
	 $retorno = producto::TraerUnoPorDescrip($descripcion);
	 $newResponse = $response->withJson($retorno, 200);  
	 return $newResponse;
}


	/*
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$elCd=cd::TraerUnCd($id);
     	$newResponse = $response->withJson($elCd, 200);  
    	return $newResponse;
    }

      public function CargarUno($request, $response, $args) {
     	 $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $titulo= $ArrayDeParametros['titulo'];
        $cantante= $ArrayDeParametros['cantante'];
        $año= $ArrayDeParametros['anio'];
        
        $micd = new cd();
        $micd->titulo=$titulo;
        $micd->cantante=$cantante;
        $micd->año=$año;
        $micd->InsertarElCdParametros();

        $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        $response->getBody()->write("se guardo el cd");

        return $response;
    }

     
     public function ModificarUno($request, $response, $args) {
     	//$response->getBody()->write("<h1>Modificar  uno</h1>");
     	$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
	    $micd = new cd();
	    $micd->id=$ArrayDeParametros['id'];
	    $micd->titulo=$ArrayDeParametros['titulo'];
	    $micd->cantante=$ArrayDeParametros['cantante'];
	    $micd->año=$ArrayDeParametros['anio'];

	   	$resultado =$micd->ModificarCdParametros();
	   	$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
		}
		*/


}