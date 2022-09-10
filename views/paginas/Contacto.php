<main class="contenedor seccion">
  <h1>Contacto</h1>
  <?php if ( $respuesta ) { ?>
    <p class="alerta exito">Mensaje enviado correctamente</p>
  <?php } ?>
  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp">
    <source srcset="build/img/destacada3.jpg" type="image/jpeg">
    <img src="build/img/destacada3.jpg" alt="Imagen contacto" loading="lazy">
  </picture>

  <h2>Llene el formulario de contacto</h2>
  <form class="formulario" action="/contacto" method="POST">
    <fieldset>
      <legend>Información Personal</legend>

      <label for="nombre">Nombre</label>
      <input id="nombre" type="text" placeholder="Nombre" name="contacto[nombre]" require/>

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" name="contacto[mensaje]" require></textarea>
    </fieldset>

    <fieldset>
      <legend>Información sobre la propiedad</legend>

      <label for="accion">Vende o Compra</label>
      <select id="accion" name="contacto[accion]" require>
        <option value="" disabled selected>Seleccione</option>
        <option value="compra">Compra</option>
        <option value="vende">Vende</option>
      </select>

      <label for="presupuesto">Precio o Presupuesto</label>
      <input id="presupuesto" type="number" placeholder="Ingresa la cantidad" name="contacto[presupuesto]" require/>
    </fieldset>

    <fieldset>
      <legend>Contacto</legend>
      <p>Como desea ser contactado</p>

      <div class="forma-contacto">
        <label for="contactar-telefono">Teléfono</label>
        <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" require/>

        <label for="contactar-correo">Correo electronico</label>
        <input type="radio" value="correo" id="contactar-correo" name="contacto[contacto]" require/>
      </div>

      <div id="contacto"></div>

    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde" />
  </form>
</main>