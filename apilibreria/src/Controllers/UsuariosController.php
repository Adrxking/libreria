<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use App\Model\UsuariosModel;
    class UsuariosController {
    
        public function new(Request  $request, Response $response, $args){
            $parametros = $request->getParsedBody();
           
            $uid = (int)$parametros['usuarioid'];
            $nombre = $parametros['nombre'];
            $apellidos = $parametros['apellidos'];
            $direccion = $parametros['direccion'];
            $anionac = (int)$parametros['anioNac'];
            $ciudad = $parametros['ciudad'];
            $valores = array($uid, $nombre, $apellidos, $direccion, $ciudad, $anionac);
            $result = UsuariosModel::new($valores);
            $response->getBody()->write($result);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }

        public function delete(Request $request, Response $response, $args) {
            $parametros = $request->getQueryParams();
            $id = $parametros['usuarioid'];
          
            $valoresParametros = array ($id);
            $usuarios = UsuariosModel::delete($valoresParametros);
            $usuariosJson = json_encode($usuarios);
            $response->getBody()->write($usuariosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200); 
          });
       
        public function getAll($request, $response, $args){
            $usuarios = UsuariosModel::getAll();
            $usuariosJson = json_encode($usuarios);
            $response->getBody()->write($usuariosJson);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
            }
    }
