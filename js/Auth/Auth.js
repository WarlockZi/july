import Sender from "../Sender/Sender.js";
//
// export default class Auth {
//
//   constructor() {
//     this.loginPage = document.querySelector('#login')
//     this.registerPage = document.querySelector('#register')
//     debugger
//     if (!this.loginPage && !this.registerPage) return
//
//     this.password = document.querySelector('#password')
//     this.confirmPassword = document.querySelector('#confirmPassword')
//
//     if (this.loginPage)
//       this.loginPage.onsubmit = this.submit.bind(this)
//     if (this.registerPage)
//       this.registerPage.onsubmit = this.submit.bind(this)
//   }
//
//   async submit(e) {
//     debugger
//     this.validatePasswordConfirm(this)
//     if (!this.loginPage.checkValidity()) {
//       event.preventDefault()
//       event.stopPropagation()
//       this.loginPage.classList.add('was-validated')
//       this.registerPage.classList.add('was-validated')
//     } else {
//       e.preventDefault()
//       let data = {}
//       let form = e.target.closest('form')
//       data.name = form.name.value
//       data.password = form.password.value
//       let sender = new Sender()
//       let path = this.loginPage ? 'login' : 'register'
//       debugger
//       let res = await sender.send(`/auth/${path}`, data)
//
//       if (res.ok) {
//         window.location.href = '/post/index'
//       } else {
//         form.querySelector('.alert').classList.add('show')
//       }
//     }
//   }
//
//   validatePasswordConfirm(self) {
//     debugger
//     if (self.password.value !== self.confirmPassword.value) {
//       self.confirmPassword.setCustomValidity("Invalid field.")
//     } else {
//       self.confirmPassword.setCustomValidity("")
//     }
//     self.confirmPassword.reportValidity();
//   }
//
// }