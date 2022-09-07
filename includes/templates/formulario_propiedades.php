<fieldset>
  <legend>Información general</legend>

  <label for="titulo">Título:</label>
  <input type="text" placeholder="Titulo propiedad" id="titulo" name="propiedad[titulo]" value="<?php echo eliminaHTML($propiedad->titulo); ?>">

  <label for="precio">Precio:</label>
  <input type="number" placeholder="Precio propiedad" id="precio" name="propiedad[precio]" value="<?php echo eliminaHTML($propiedad->precio); ?>">

  <label for="imagen">Imagen:</label>
  <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
  <?php if($propiedad->imagen): ?>
    <img src="/bienesraices/imagenes/<?php echo $propiedad->imagen; ?>.jpg" class="imagen-small">
  <?php endif; ?>

  <label for="descripcion">Descripción:</label>
  <textarea name="propiedad[descripcion]" id="descripcion" cols="30" rows="10"
    placeholder="Descripción propiedad"><?php echo eliminaHTML($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
  <legend>Información propiedad</legend>

  <label for="habitaciones">Habitaciones:</label>
  <input type="number" placeholder="Ej: 3" id="habitaciones" min="1" max="9" name="propiedad[habitaciones]"
    value="<?php echo eliminaHTML($propiedad->habitaciones); ?>">

  <label for="wc">Baños:</label>
  <input type="number" placeholder="Ej: 3" id="wc" min="1" max="9" name="propiedad[wc]" value="<?php echo eliminaHTML($propiedad->wc); ?>">

  <label for="estacionamiento">Estacionamientos:</label>
  <input type="number" placeholder="Ej: 3" id="estacionamiento" name="propiedad[estacionamiento]" min="1" max="9"
    value="<?php echo eliminaHTML($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
  <legend>Vendedor</legend>

  <label for="vendedor">Vendedor:</label>
  <select name="propiedad[vendedorId]">
    <option value="" selected>--Seleccione un vendedor--</option>
    <?php foreach($vendedores as $vendedor): ?>
      <option <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?>
        value="<?php echo $vendedor->id; ?>"><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></option>
    <?php endforeach; ?>
  </select>
</fieldset>