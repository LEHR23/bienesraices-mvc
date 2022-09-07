document.addEventListener('DOMContentLoaded', function(){
  eventListeners()
  darkMode()
})

function eventListeners(){
  const mobileMenu = document.querySelector('.mobile-menu')

  mobileMenu.addEventListener('click', navegacionResponsive)
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