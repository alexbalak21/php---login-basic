document.getElementById('registerForm').addEventListener('submit', checkRegisterForm)

function checkRegisterForm(event) {
  event.preventDefault()
  let warning = ''
  let username = document.getElementsByName('username')[0].value
  let password1 = document.getElementsByName('password1')[0].value
  let password2 = document.getElementsByName('password2')[0].value
  if (username == '') warning = 'USERNAME IS EMPTY !<br>'
  if (password1 == '') warning += '<br>PASSWORD IS EMPTY !'
  if (password1 !== password2) warning += '<br>PASSWORDS DONT MATCH !'
  document.getElementById('warning').innerHTML = warning
  if (warning === '') document.getElementById('registerForm').submit()
}
