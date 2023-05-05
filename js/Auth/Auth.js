import Sender from "../Sender/Sender.js";

export default class Auth {

  constructor() {
    this.loginPage = document.querySelector('#login')
    if (!this.loginPage) return

    this.loginPage.onsubmit = this.submit.bind(this)

    this.alert = document.querySelector('.alert')
    this.alert.addEventListener("close.bs.alert", this.alertClose.bind(this))
  }

  alertClose(e) {
    this.alert.classList.remove('show');
    e.preventDefault()
    return false;
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
      data.name = form.name.value
      data.password = form.password.value
      let sender = new Sender()
      let res = await sender.send('/auth/login', data)

      if (res.ok) {
        window.location.href = '/task/index'
      } else {
        form.querySelector('.alert').classList.add('show')
      }
    }
  }

}