<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login( Router $router ) {
        
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);

            $errores = '';

            if(empty($errores)) {
                // Verificar si el usuario existe
                $resultado = $auth->existeUsuario();

                if(!$resultado) {
                    $errores = Admin::getErrores();
                }

                $autenticado = $auth->verificarPassword($resultado);

                if($autenticado) {
                    header('Location: /admin');
                }

            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout( Router $router ) {
        echo "desde el logout";
    }
}
