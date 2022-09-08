<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController {
  public static function index( Router $router ) {

    $propiedades = Propiedad::get( 3 );
    $router->render( 'paginas/Index' , [
      'inicio' => true,
      'propiedades' => $propiedades
    ]);
  }

  public static function nosotros( Router $router ) {
    $router->render( 'paginas/Nosotros' , [
    ]);
  }

  public static function anuncios( Router $router ) {
    $propiedades = Propiedad::all();
    $router->render( 'paginas/Anuncios' , [
      'propiedades' => $propiedades
    ]);
  }

  public static function anuncio( Router $router ) {
    $id = validarORedireccionar( '/anuncios' );
    $propiedad = Propiedad::find( $id );
    $router->render( 'paginas/Anuncio' , [
      'propiedad' => $propiedad
    ]);
  }

  public static function blog( Router $router ) {
    $router->render( 'paginas/Blog' , [
    ]);
  }

  public static function entrada( Router $router ) {
    $router->render( 'paginas/Entrada' , [
    ]);
  }

  public static function contacto( Router $router ) {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
      
    } else {
      $router->render( 'paginas/Contacto' , [
      ]);
    }
  }
  
}