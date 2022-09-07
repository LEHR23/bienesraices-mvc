<fieldset>
  <legend>Información del vendedor</legend>
  <label for="nombre">Nombre</label>
  <input type="text" id="nombre" placeholder="Nombre Vendedor" name="vendedor[nombre]" value="<?php echo eliminaHTML($vendedor->nombre); ?>">
  <label for="apellido">Apellido</label>
  <input type="text" id="apellido" placeholder="Apellido Vendedor" name="vendedor[apellido]" value="<?php echo eliminaHTML($vendedor->apellido); ?>">
  <label for="telefono">Teléfono</label>
  <input type="tel" id="telefono" placeholder="Teléfono Vendedor" name="vendedor[telefono]" value="<?php echo eliminaHTML($vendedor->telefono); ?>">
</fieldset>
