import Sender from "../Sender/Sender.js";

export default class Register {
  constructor() {
    this.registerPage = document.querySelector('#register')
    if (!this.registerPage) return

    this.password = document.querySelector('#password')
    this.confirmPassword = document.querySelector('#confirmPassword')
    this.registerPage.onsubmit = this.submit.bind(this)
  }

  async submit(e) {
    this.validatePasswordConfirm(this)
    if (!this.registerPage.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
      this.registerPage.classList.add('was-validated')
    } else {
      e.preventDefault()
      let data = {}
      let form = e.target.closest('form')
      data.email = form.email.value
      data.password = form.password.value
      let sender = new Sender()
      let res = await sender.send(`/auth/register`, data)

      if (res?.ok) {
        window.location.href = '/post/index'
      } else if(res?.error) {
        let alert  = form.querySelector('.alert')
        alert.classList.remove('d-none')
        alert.innerText = res?.error
      }
    }
  }

  validatePasswordConfirm(self) {

    if (self.password.value !== self.confirmPassword.value) {
      self.confirmPassword.setCustomValidity("Invalid field.")
    } else {
      self.confirmPassword.setCustomValidity("")
    }
    self.confirmPassword.reportValidity();
  }
}