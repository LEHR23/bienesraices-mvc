<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
  public static function index(Router $router) {
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();
    $router->render('propiedades/Admin', [
      'propiedades' => $propiedades,
      'resultado' => $_GET['resultado'] ?? null,
      'vendedores' => $vendedores
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
    $id = validarORedireccionar('/admin');
    $propiedad = Propiedad::find($id);
    $vendedores = Vendedor::all();
    $errores = Propiedad::getErrores();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $args = $_POST['propiedad'];
      $propiedad->sincronizar($args);
      $errores = $propiedad->validar();
      $nombreImagen = md5(uniqid(rand(), true));
      if($_FILES['propiedad']['tmp_name']['imagen']){
        $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
      } 

      if(empty($errores)){
        if($_FILES['propiedad']['tmp_name']['imagen']){
          $imagen->save(CARPETA_IMAGENES . $nombreImagen . ".jpg");
        }

        $resultado = $propiedad->guardar();

        if($resultado){
          header('Location: /admin?resultado=2');
        } else {
          echo 'Error al insertar';
        }
      }
    }
    $router->render('propiedades/Actualizar', [
      'propiedad' => $propiedad,
      'vendedores' => $vendedores,
      'errores' => $errores
    ]);
  }
  
  public static function eliminar() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if($id){
        $tipo = $_POST['tipo'];

        if(validarTipoContenido($tipo)){
          $propiedad = Propiedad::find($id);
          $resultado = $propiedad->eliminar();
       }
        if($resultado){
          $propiedad->borrarImagen();
          header('Location: /admin?resultado=3');
        } 
      }
    }
  }
}