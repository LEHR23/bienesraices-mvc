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
      $phpmailer->Host = $_ENV['EMAIL_SERVER'];
      $phpmailer->SMTPAuth = true;
      $phpmailer->Port = $_ENV['EMAIL_PORT'];
      $phpmailer->Username = $_ENV['EMAIL_USER'];
      $phpmailer->Password = $_ENV['EMAIL_PASS'];
      $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 

      $phpmailer->setFrom( 'dev@lernesto.net', 'Bienes raices' );
      $phpmailer->addAddress( 'dev@lernesto.net' , 'Ernesto' );
      $phpmailer->Subject = 'demo bienes raices';
      $phpmailer->isHTML( true );
      $phpmailer->CharSet = 'UTF-8';

      $contenido = "<html>
      <style>
        h1, h2, p, span, div, body{
          margin: 0;
          padding: 0;
          box-sizing: content-box;
        }
        .contenedor{
          width: 100vw;
          height: 100vh;
          font-family: 'Courier New', Courier, monospace;
        }
        .resaltado{
          background-color: #333333;
          text-align: center;
          color: white;
        }
        .logo{
          font-size: 40px;
          padding: 10px;
        }
        p{
          margin: 15px 20px 0 15px;
          font-weight: bold;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        span{
          font-weight: 400;
        }
        .ultimo{
          margin-bottom: 15px;
        }
        .info{
          padding: 5px;
        }
        .contenedor-contacto{
          display: flex;
          justify-content: space-around;
        }
        .copyright{
          width: 100%;
          margin: 0;
          padding: 15px 0;
        }
        @media (min-width: 400px) {
          .contenedor-contacto{
            flex-direction: row;
          }
        }
      </style>
    
      <div class='contenedor'>
        <h1 class='resaltado logo'>Bienes Raices</h1>";
      $contenido .= '<p>El usuario: <span>' . $_POST['contacto']['nombre'] . '</span></p>';

      $contenido .= '<p class="ultimo">Se encuentra interesado en : <span>' . $_POST['contacto']['accion'] . '</span></p>';

      $contenido .= '<h2 class="resaltado info">Envio la siguiente información</h2>';

      $contenido .= '<p class="ultimo">' . $_POST['contacto']['mensaje'] . '</p>';
      
      $contenido .= '<div>
      <h2 class="resaltado info">Información de la propiedad</h2>';

      if($_POST['contacto']['accion'] === 'comprar' ){
        $contenido .= '<p class="ultimo">Presupuesto del usuario: <span>' . $_POST['contacto']['presupuesto'] . '</span></p>';
      } else {
        $contenido .= '<p class="ultimo">Precio de la propiedad: <span>' . $_POST['contacto']['presupuesto'] . '</span></p>';
      }

      $contenido .= '<h2 class="resaltado info">Forma de contacto: <span></span></h2>';

      if( $_POST['contacto']['contacto'] === 'telefono' ) {
        $contenido .= '<div class="contenedor-contacto ultimo">';
        $contenido .= '<p>Teléfono: <span>' . $_POST['contacto']['telefono'] . '</span></p>';
        $contenido .= '<p>Día: <span>' . $_POST['contacto']['fecha'] . '</span></p>';
        $contenido .= '<p>Hora: <span>' . $_POST['contacto']['hora'] . '</span></p>';
        $contenido .= '</div>';
      } else {
        $contenido .= '<p class="ultimo">Correo: <span>' . $_POST['contacto']['correo'] . '</span></p>';
      }
        
      $contenido .= '</div>
      <p class="resaltado copyright">Todos los derechos reservados 2023 &copy;</p>
    </div>
  </html>';

      $phpmailer->Body = $contenido;
      $phpmailer->AltBody = 'Este es el contenido en texto plano';

      try {
        //code...
        if($phpmailer->send()){
          $respuesta = 'Mensaje enviado correctamente';
        } else {
          $respuesta = 'Error al enviar el mensaje';
        }
      } catch (\Throwable $th) {
        //throw $th;
        $respuesta = $th;
      }
    }
    $router->render( 'paginas/Contacto' , [
      'respuesta' => $respuesta ?? null
    ]);
  }
  
}