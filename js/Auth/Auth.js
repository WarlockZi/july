import Sender from "../Sender/Sender.js";

export default class Auth {
  constructor(props) {
    this.name = document.querySelector('#name')
    this.password = document.querySelector('#password')
    this.loginBtn = document.querySelector('#loginBtn')
    if (this.loginBtn) {
      this.loginBtn.addEventListener('click', this.submit.bind(this))
    }
  }

  async submit(e) {
    e.preventDefault()
    let data = {}
    data.name = this.name.value
    data.password = this.password.value
    let sender = new Sender('/auth/login', data)
    let res = await sender.send()

    // let parsed = await JSON.parse(res)
    debugger
    if (res.ok) {
      window.location.href = '/task/index'
    }

  }
}