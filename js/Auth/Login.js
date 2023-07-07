import Sender from "../Sender/Sender.js";

export default class Login {
  constructor() {
    this.loginPage = document.querySelector('#login')
    if (!this.loginPage) return
    this.password = document.querySelector('#password')
    this.email = document.querySelector('#email')
    this.loginPage.onsubmit = this.submit.bind(this)
  }

  async submit(e) {
    if (!this.loginPage.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
      this.loginPage.classList.add('was-validated')
    } else {
      e.preventDefault()
      let data = {}
      let form = e.target.closest('form')
      data.email = form.email.value
      data.password = form.password.value
      let sender = new Sender()
      let res = await sender.send(`/auth/login`, data)

      if (res.ok) {
        window.location.href = '/post/index'
      } else {
        form.querySelector('.alert').classList.remove('d-none')
      }
    }
  }

}