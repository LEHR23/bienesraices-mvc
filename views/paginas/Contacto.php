<main class="contenedor seccion">
  <h1>Contacto</h1>
  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp">
    <source srcset="build/img/destacada3.jpg" type="image/jpeg">
    <img src="build/img/destacada3.jpg" alt="Imagen contacto" loading="lazy">
  </picture>

  <h2>Llene el formulario de contacto</h2>
  <form class="formulario">
    <fieldset>
      <legend>Información Personal</legend>

      <label for="nombre">Nombre</label>
      <input id="nombre" type="text" placeholder="Nombre" />

      <label for="correo">Correo</label>
      <input id="correo" type="email" placeholder="Correo electronico" />

      <label for="telefono">Teléfono</label>
      <input id="telefono" type="tel" placeholder="Teléfono" />

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje"></textarea>
    </fieldset>

    <fieldset>
      <legend>Información sobre la propiedad</legend>

      <label for="accion">Vende o Compra</label>
      <select id="accion">
        <option value="" disabled selected>Seleccione</option>
        <option value="compra">Compra</option>
        <option value="vende">Vende</option>
      </select>

      <label for="presupuesto">Precio o Presupuesto</label>
      <input id="presupuesto" type="number" placeholder="Ingresa la cantidad" />
    </fieldset>

    <fieldset>
      <legend>Contacto</legend>
      <p>Como desea ser contactado</p>

      <div class="forma-contacto">
        <label for="contactar-telefono">Teléfono</label>
        <input type="radio" value="telefono" id="contactar-telefono" name="contacto">

        <label for="contactar-correo">Correo electronico</label>
        <input type="radio" value="correo" id="contactar-correo" name="contacto">
      </div>

      <p>Si eligió teléfono, eliga la fecha y hora</p>

      <label for="fecha">Fecha</label>
      <input id="fecha" type="date" />

      <label for="hora">Hora</label>
      <input id="hora" type="time" min="08:00" max="17:00" />
    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde" />
  </form>
</main>