// добавить еще 6 картинок portfolio
const whatchMore = document.querySelector('.whatch_more')
const portfolio_image = document.querySelectorAll('.portfolio_image')

for (let i = 0; i < portfolio_image.length; i++) {
  if (i > 5) {
    portfolio_image[i].style.display = 'none'
  }
}

let a = 9

whatchMore.addEventListener('click', () => {
  for (let y = 6; y < a; y++) {
    portfolio_image[y].style.display = ''
  }
  a = a + 3
})

//скрываем лишнии картинки клиентов
const clientImg = document.querySelectorAll('.client_image');

for (let i = 0; i < clientImg.length; i++) {
  if (i > 3) {
    clientImg[i].style.display = 'none'
  }
}