<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

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
      $phpmailer = new PHPMailer();
      $phpmailer->isSMTP();
      $phpmailer->Host = 'smtp.mailtrap.io';
      $phpmailer->SMTPAuth = true;
      $phpmailer->Port = 2525;
      $phpmailer->Username = '9cd3af9d945dbb';
      $phpmailer->Password = '289b4c0dfc448e';
      $phpmailer->SMPTSecure = 'tls';

      $phpmailer->setFrom( 'admin@bienesraices.com' );
      $phpmailer->addAddress( 'admin@bienesraices.com' , 'bienesraices.com' );
      $phpmailer->Subject = 'Tienes un nuevo mensaje';
      $phpmailer->isHTML( true );
      $phpmailer->CharSet = 'UTF-8';

      $contenido = '<html>';
      $contenido .= '<p>Nombre: ' . $_POST['contacto']['nombre'] . '</p>';
      $contenido .= '<p>Correo: ' . $_POST['contacto']['correo'] . '</p>';

      if( $_POST['contacto']['contacto'] === 'telefono' ) {
        $contenido .= '<p>Eligió ser contactado por teléfono:</p>';
        $contenido .= '<p>Teléfono: ' . $_POST['contacto']['telefono'] . '</p>';
        $contenido .= '<p>Fecha: ' . $_POST['contacto']['fecha'] . '</p>';
        $contenido .= '<p>Hora: ' . $_POST['contacto']['hora'] . '</p>';
      } else {
        $contenido .= '<p>Eligió ser contactado por correo:</p>';
        $contenido .= '<p>Correo: ' . $_POST['contacto']['correo'] . '</p>';
      }

      $contenido .= '<p>Mensaje: ' . $_POST['contacto']['mensaje'] . '</p>';
      $contenido .= '<p>Vende o Compra: ' . $_POST['contacto']['accion'] . '</p>';
      $contenido .= '<p>Precio o Presupuesto: $' . $_POST['contacto']['presupuesto'] . '</p>';
      $contenido .= '</html>';

      $phpmailer->Body = $contenido;
      $phpmailer->AltBody = 'Este es el contenido en texto plano';

      if($phpmailer->send()){
        $respuesta = 'Mensaje enviado correctamente';
      } else {
        $respuesta = 'Error al enviar el mensaje';
      }
    }
    $router->render( 'paginas/Contacto' , [
      'respuesta' => $respuesta ?? null
    ]);
  }
  
}