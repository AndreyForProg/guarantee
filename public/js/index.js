//беру инпуты для входа админку
const adminPas = document.querySelector('#password')
const btnEnter = document.querySelector('#btnEnter')
const enterAndmin = document.querySelector('.enter_Andmin')
const content_Admin = document.querySelector('.content_Admin')
const exit = document.querySelector('#exit')
const errorMessage = document.querySelector('.errorMessage')

if (!!localStorage.getItem('isLogged')) {
  enterAndmin.style.display = 'none'
  content_Admin.style.display = 'flex'
}

if (!localStorage.getItem('isLogged')) {
  enterAndmin.style.display = 'flex'
  content_Admin.style.display = 'none'
}

//войти в админ панель
btnEnter.addEventListener('click', () => {
  if( adminPas.value === '123' ) {
    localStorage.setItem('isLogged', '1')
    enterAndmin.style.display = 'none'
    content_Admin.style.display = 'flex'
    adminPas.value = ''
  } else {
    errorMessage.textContent = 'не правильный пароль'
  }
})

//выйти из админки
exit.addEventListener('click', () => {
    localStorage.removeItem('isLogged', '1')
    enterAndmin.style.display = 'flex'
    content_Admin.style.display = 'none'
    errorMessage.textContent = ''
})

// переключения между списком данных
const title = document.querySelectorAll('.title')
const contacts = document.querySelector('.content_contacts')
const portfolio = document.querySelector('.portfolio')
const clients = document.querySelector('.clients')


for (let i = 0; i < title.length; i++) {
  title[i].addEventListener('click', (e) => {
    if (e.target.textContent === 'контактные данные') {
      contacts.style.display = 'flex'
      portfolio.style.display = 'none'
      clients.style.display = 'none'
    } else if (e.target.textContent === 'портофолио') {
      contacts.style.display = 'none'
      portfolio.style.display = 'block'
      clients.style.display = 'none'
    } else if (e.target.textContent === 'список клиентов') {
      contacts.style.display = 'none'
      portfolio.style.display = 'none'
      clients.style.display = 'block'
    }
  })
}

//меняем контактные данные в админке
const dataItem = document.querySelectorAll('.dataItem')
const updateBtn = document.querySelectorAll('.updateBtn')
const status = document.querySelector('.status')

for (let i = 0; i < updateBtn.length; i++) {
  let type = ''
  let dataValue = ''
  updateBtn[i].addEventListener('click', (e) => {
    if (e.target.className === 'updateBtn mail') type = 'mail', dataValue = dataItem[i].value
    else if (e.target.className === 'updateBtn inst') type = 'inst', dataValue = dataItem[i].value
    else if (e.target.className === 'updateBtn phone') type = 'phone', dataValue = dataItem[i].value
    else if (e.target.className === 'updateBtn vk') type = 'vk', dataValue = dataItem[i].value
    $.ajax({
      method: 'POST',
      url: 'http://guarantee.loc/index.php',
      data: {
          action: 'updatePhone',
          type: type,
          data: dataValue,
        },
        success: function(data) {
            console.log(data)
          }
        })
    status.textContent = 'данные опубликованы'
  })
}

//добавление картинок
const delPortfolioImg = document.querySelectorAll('.delPortfolioImg') //удаление картинки портфолио
const valuePortImg = document.querySelectorAll('.valuePortImg') //значение картинки портфолио
const dellPortStatus = document.querySelector('.dellPortStatus') //значение картинки портфолио

//удаление картинки портфолио
for (let i = 0; i < delPortfolioImg.length; i++) {
  console.log(delPortfolioImg[i])
  delPortfolioImg[i].addEventListener('click', (e) => {
    $.ajax({
      method: 'POST',
      url: 'http://guarantee.loc/index.php',
      data: {
        action: 'dellPortImg',
        data: valuePortImg[i].value,
      },
      success: function(data) {
        if (data === 'данные удалены') {
          document.getElementById(valuePortImg[i].value).remove();
        }
      }
    })
  })
}

const valueClientImg = document.querySelectorAll('.valueClientImg')
const delClientImg = document.querySelectorAll('.delClientImg')
const dellClientStatus = document.querySelectorAll('.dellClientStatus')

// удаление картинки клиента
for (let i = 0; i < delClientImg.length; i++) {
  delClientImg[i].addEventListener('click', (e) => {
    console.log(valueClientImg[i].value)
    $.ajax({
      method: 'POST',
      url: 'http://guarantee.loc/index.php',
      data: {
        action: 'dellClientImg',
        data: valueClientImg[i].value,
      },
      success: function(data) {
        if (data === 'данные удалены') {
          document.getElementById(valueClientImg[i].value).remove()
        }
      }
    })
  })
}

