document.getElementById("registerForm").addEventListener("submit", checkRegisterForm)

function checkRegisterForm(event) {
  event.preventDefault()
  let warning = ""
  let email = document.getElementsByName("email")[0]
  let password1 = document.getElementsByName("password1")[0]
  let password2 = document.getElementsByName("password2")[0]

  if (password1.value == "") {
    password1.classList.add("inputError")
    warning = "PASSWORD IS EMPTY !"
  }
  if (password2.value == "") {
    warning = "CONFIRM PASSWORD PLEASE"
    password1.classList.add("inputError")
  }
  if (password1.value !== password2.value) {
    password1.classList.add("inputError")
    password2.classList.add("inputError")
    warning = "<br>PASSWORDS DONT MATCH !"
  }
  if (email.value == "") {
    warning = "email IS EMPTY !<br>"
    email.classList.add("inputError")
  }
  document.getElementById("warning").innerHTML = warning
  if (warning === "") document.getElementById("registerForm").submit()
}
