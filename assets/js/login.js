document.getElementById('loginForm').addEventListener('submit', checkLoginForm)

function checkLoginForm(event) {
  event.preventDefault()
  let warning = ''
  let username = document.getElementsByName('username')[0].value
  let password = document.getElementsByName('password')[0].value
  if (username == '') warning = 'USERNAME IS EMPTY !<br>'
  if (password == '') warning += '<br>PASSWORD IS EMPTY !'
  document.getElementById('warning').innerHTML = warning
  if (warning === '') document.getElementById('loginForm').submit()
}
