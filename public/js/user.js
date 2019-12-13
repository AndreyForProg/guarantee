// добавить еще 6 картинок
const whatchMore = document.querySelector('.whatch_more')
const portfolio_image = document.querySelectorAll('.portfolio_image')
console.log(portfolio_image)
let i = 1

whatchMore.addEventListener('click', () => {
  i = i + 2
  console.log(i)
  $.ajax({
    method: 'POST',
    url: 'http://guarantee.loc/model/functions.php',
    data: {
      action: 'add6Imgs',
      data: i,
    },
    success: function(data) {
      console.log(data)
      console.log(portfolio_image)
    }
  })
})