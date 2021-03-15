<?php
namespace App\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Model\EditoresModel;

class EditoresController{
    public function new($request, $response, $args){
        $response->getBody()->write("Insertar un nuevo editor");
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
    public function getALL($request, $response, $args){
        $editores = EditoresModel::getALL();
        $editoresJson = json_encode($editores);
        $response->getBody()->write($editoresJson);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}