<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use App\Model\CategoriasModel;

    class CategoriasController {
    
        public function new(Request  $request, Response $response, $args){
            $response->getBody()->write("Insertar una nueva Categoria");
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
       
        public function getAll($request, $response, $args){
            $categorias = CategoriasModel::getALL();
            $categoriasJson = json_encode($categorias);
            $response->getBody()->write($categoriasJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }