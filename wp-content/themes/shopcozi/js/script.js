window.onload = (event) => {

const mobileMenuButtons = document.querySelectorAll('[data-mobile-menu-target]')
const closeMobileButtons = document.querySelectorAll('[mobile-menu-close]')
const menuExpendButtons = document.querySelectorAll('[data-menu-expend]')
let targetContainerID;

mobileMenuButtons.forEach( button => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    const modal = document.querySelector(button.dataset.mobileMenuTarget)
          targetContainerID = modal.id;
    if(document.querySelector(button.dataset.mobileMenuTarget).classList.contains('active')){
      closeModal(modal)
    }else{
      openModal(modal)
    }
  })
})

closeMobileButtons.forEach( button => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    const modal = button.closest('.mobile-menu-container')
    closeModal(modal)
    document.querySelector('[data-mobile-menu-target]').focus()
  })
})

menuExpendButtons.forEach( button => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    const parentLi = button.closest('li')
    parentLi.classList.toggle('open')
    if(parentLi.classList.contains('open')){
      button.innerHTML = '<i class="fa-solid fa-minus"></i>'
    }else{
      button.innerHTML = '<i class="fa-solid fa-plus"></i>'
    }
  })
})

if(document.querySelector('.mobile-menu-container-overlay')){
    document.querySelector('.mobile-menu-container-overlay').addEventListener('click', (event) => {
    document.querySelector('.mobile-menu-container').classList.remove('active')
    document.querySelector('[data-mobile-menu-target]').focus()
  })
}

function openModal(modal) {
  if (modal == null) return
  modal.classList.add('active')
  modal.getElementsByTagName('a')[0].focus()
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
}

};

if(document.querySelector('.btn-search')){
    document.querySelector('.btn-search').addEventListener('click', (event) => {
      event.preventDefault()
      const modal = document.querySelector('.theme-search')
      if(modal.classList.contains('active')){
        closeModal(modal)
      }else{
        openModal(modal)
        document.querySelector('.search-form input[type="search"]').focus()
      }
  })
}

if(document.querySelector('.search-button-close')){
    document.querySelector('.search-button-close').addEventListener('click', (event) => {
      event.preventDefault()
      const modal = document.querySelector('.theme-search')
      closeModal(modal)
  })
}