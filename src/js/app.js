document.addEventListener('DOMContentLoaded', function(){
  eventListeners()
  darkMode()
})

function eventListeners(){
  const mobileMenu = document.querySelector('.mobile-menu')

  mobileMenu.addEventListener('click', navegacionResponsive)

  const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]')
  metodoContacto.forEach(metodo => {
    metodo.addEventListener('click', mostrarMetodosContacto)
  })
}

function navegacionResponsive(){
  const navegacion = document.querySelector('.navegacion')

  navegacion.classList.toggle('mostrar')
}

function darkMode(){
  const modoDarkMode = window.matchMedia('(prefers-color-scheme: dark)')
  if(modoDarkMode.matches){
    document.body.classList.add('dark-mode')
  }else{
    document.body.classList.remove('dark-mode')
  }
  modoDarkMode.addEventListener('change', function(){
    if(modoDarkMode.matches){
      document.body.classList.add('dark-mode')
    }else{
      document.body.classList.remove('dark-mode')
    }
  })
  const botonDarkMode = document.querySelector('.dark-mode-boton')

  botonDarkMode.addEventListener('click', pasarADarkMode)
}

function pasarADarkMode(){
  document.body.classList.toggle('dark-mode')
}

function mostrarMetodosContacto(evento){
  const contactoDiv = document.querySelector('#contacto')
  if(evento.target.value === 'telefono'){
    contactoDiv.innerHTML = `
      <label for="telefono">Número Teléfono</label>
      <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

      <p>Elija la fecha y la hora para la consulta</p>

      <label for="fecha">Fecha</label>
      <input type="date" id="fecha" name="contacto[fecha]">

      <label for="hora">Hora</label>
      <input type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00">
    `
  }
  else{
    contactoDiv.innerHTML = `
      <label for="correo">Correo</label>
      <input type="correo" placeholder="Tu Correo" id="correo" name="contacto[correo]">
    `
  }

}