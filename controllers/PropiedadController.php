<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
  public static function index(Router $router) {
    $propiedades = Propiedad::all();
    $router->render('propiedades/Admin', [
      'propiedades' => $propiedades,
      'resultado' => $_GET['resultado'] ?? null
    ]);
  }

  public static function crear(Router $router) {
    $propiedad = new Propiedad;
    $vendedores = Vendedor::all();
    $errores = Propiedad::getErrores();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $propiedad = new Propiedad($_POST['propiedad']);

      $nombreImagen = md5(uniqid(rand(), true));
      if($_FILES['propiedad']['tmp_name']['imagen']){
        $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
      }

      $errores = $propiedad->validar();
      if(empty($errores)){
        if(!is_dir(CARPETA_IMAGENES)){
          mkdir(CARPETA_IMAGENES);
        }

        $imagen->save(CARPETA_IMAGENES . $nombreImagen . ".jpg");
        
        $resultado = $propiedad->guardar();

        if($resultado){
          header('Location: /admin?resultado=1');
        } else {
          echo 'Error al insertar';
        }
      }
    }
    $router->render('propiedades/Crear', [
      'propiedad' => $propiedad,
      'vendedores' => $vendedores,
      'errores' => $errores
    ]);
  }

  public static function actualizar(Router $router) {
    $id = validarORedireccionar('/bienesraices/admin');
    $propiedad = Propiedad::find($id);
    $errores = Propiedad::getErrores();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $args = $_POST['propiedad'];
      $propiedad->sincronizar($args);
      $errores = $propiedad->validar();
      if(empty($errores)) {
        $carpetaImagenes = __DIR__ . "/../imagenes/";
        if(!is_dir($carpetaImagenes)) {
          mkdir($carpetaImagenes);
        }
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        // Subida de archivos
        move_uploaded_file($_FILES['propiedad']['tmp_name']['imagen'], $carpetaImagenes . $nombreImagen);
        $propiedad->setImagen($nombreImagen);
        $propiedad->guardar();
        header('Location: /bienesraices/admin?resultado=2');
      }
    }
    $router->render('propiedades/Actualizar', [
      'propiedad' => $propiedad,
      'errores' => $errores
    ]);
  }
}