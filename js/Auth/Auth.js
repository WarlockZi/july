import Sender from "../Sender/Sender.js";

export default class Auth {
  constructor(props) {
    this.loginBtn = document.querySelector('#loginBtn')
    if (this.loginBtn) {
      this.loginBtn.addEventListener('click', this.submit)
    }
    this.validateForm()
  }

  async submit(e) {

    e.preventDefault()
    let data = {}
    let form = e.target.closest('form')
    data.name = form.name.value
    data.password = form.password.value
    let sender = new Sender('/auth/login', data)
    let res = await sender.send()

    debugger
    if (res.ok) {
      window.location.href = '/task/index'
    }else{
      form.querySelector('.wrong-data').style.display = 'flex'
    }


  }

  validateForm() {
    let forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })

  }

  stripTags(text) {
    return text.replace(/(<([^>]+)>)/ig, "");
  }
}