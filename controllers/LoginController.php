<?php

namespace Controllers;
use MVC\Router;

class LoginController{
    

     public static function login(Router $router) {
      $router->render('/login',[
         'titulo'=> 'Mostrar'
        ]);
   }

     public static function logout() {
      echo "Desde logout";
   }

   public static function editar() {
      echo "Desde editar";
   }
}


?>