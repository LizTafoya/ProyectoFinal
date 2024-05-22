<?php

namespace Controllers;
use MVC\Router;
use Model\producto;

class ProductoController{


     public static function mostrar(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $p= new producto($_POST);
            $producto=$p->all();

            $router->render('/mostrar',[
                'titulo'=> 'PrácticaInventario',
                'producto'=> $producto
               ]);
        }else{
            $p= new producto($_POST);
            $producto=$p->all();

            $router->render('/mostrar',[
                'titulo'=> 'PrácticaInventario',
                'producto'=> $producto
               ]);


        } 
     }

     public static function info(Router $router) {
       $Nombre=$_GET['Nombre'];
            $producto = new producto($_GET);
            $producto = producto::where('Nombre', $Nombre);
            $router->render('/info',[
                'titulo'=> 'PrácticaInventario',
                'producto'=>$producto
               ]);
        
     }

     public static function agregar(Router $router) {
       
        
        $Nombre=$_GET['Nombre'];
            $producto = new producto($_POST);
            $producto = producto::where('Nombre', $Nombre);
       
            $producto->Existencias= $producto->Existencias+1;
            $producto->sincronizar($_POST);
            $producto->guardar();

            $router->render('/agregar',[
                'titulo'=> 'PrácticaInventario',
                'producto'=>$producto
               ]);
        
     }

     public static function restar(Router $router) {
       
        $Nombre=$_GET['Nombre'];
        $producto = new producto($_GET);
        $producto = producto::where('Nombre', $Nombre);

        $producto->Existencias= $producto->Existencias-1;
        $producto->sincronizar($_POST);
        $producto->guardar();
            $router->render('/restar',[
                'titulo'=> 'PrácticaInventario',
                'producto'=>$producto
               ]);
        
     }

     public static function editar(Router $router) {
      
        $Nombre=$_GET['Nombre'];
        $producto = new producto($_POST);
        $producto = producto::where('Nombre', $Nombre);

        $router->render('/editar',[
            'titulo'=> 'PrácticaInventario',
            'producto'=>$producto
           ]);
            


            
        
     }

     public static function editarDatos(Router $router) {
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id=$_GET['id'];
            $producto = new producto($_POST);
            $producto = producto::where('id', $id);
        
            if (isset($_POST["Precio"]) && !empty($_POST["Precio"])) {
                
                $P=$_POST['Precio'];
                $producto->Precioventa=$P;
                $producto->sincronizar($_POST);
                $producto->guardar();


                if (isset($_POST["Descripcion"]) && !empty($_POST["Descripcion"])) {
                    $D=$_POST['Descripcion'];
                    $producto->Descripcion=$D;
                    $producto->sincronizar($_POST);
                    $producto->guardar();

                }
                $alerta="CAMBIOS GUARDADOS";
                    $router->render('/restar',[
                        'titulo'=> 'PrácticaInventario',
                        'producto'=>$producto,
                        'alerta'=>$alerta
                       ]);

            }else{
                $alerta="NO SE HIZO NINGÚN CAMBIO";
                $router->render('/restar',[
                    'titulo'=> 'PrácticaInventario',
                    'producto'=>$producto,
                    'alerta'=>$alerta
                   ]);
            }

        }
        $alerta="NO SE HIZO NINGÚN CAMBIO";
            $router->render('/restar',[
                'titulo'=> 'PrácticaInventario',
                'producto'=>$producto,
                'alerta'=>$alerta
               ]);
        
     }

     public static function eliminar(Router $router) {
        
        $Nombre=$_GET['Nombre'];
            $producto = new producto($_GET);
            $producto = producto::where('Nombre', $Nombre);
            $producto->Eliminar();

            if($producto->Eliminar()){
                $p= new producto($_POST);
                $producto=$p->all();
                $router->render('/mostrar',[
                    'titulo'=> 'PrácticaInventario',
                    'producto'=>$producto
                   ]);
            }
       
            
     }

   

     
}


?>