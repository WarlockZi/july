import Task from "./Task.js";
import Sender from "../Sender/Sender.js";
import Cookie from "../Cookie/Cookie.js";

export default class TaskPage {
  constructor() {
    this.sender = new Sender
    let page = document.querySelector('.task-page')
    if (!page) return

    let task = new Task

    let modal = document.querySelector('#taskForm')
    modal.addEventListener('shown.bs.modal', task.updateOrCreate)
    modal.addEventListener('hidden.bs.modal', task.clearValidator)

    let form = document.querySelector('#taskForm .needs-validation')
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      } else {
        task.save(event)
      }
      form.classList.add('was-validated')
    }, false)


    let pagination = page.querySelector('#pagination')
    pagination.onclick = this.getPage.bind(this)

    document.querySelectorAll('[data-sort]').forEach((sortEl) => {
      sortEl.addEventListener('click', this.sort)
    })
  }

  sort() {
    let field = this.dataset.sort

    let cookie = new Cookie()
    let str = cookie.cookie.get_cookie('sort')
    let obj = str.split('_')

    let direction = obj[1]

    if (direction === "ASC") {
      cookie.cookie.set_cookie('sort', field + '_DESC')
    } else {
      cookie.cookie.set_cookie('sort', field + '_ASC')
    }
    window.location.href = '/task/index'
    // this.sender.send('/task/sort')
    debugger
  }

  async getPage({target}) {
    let page = target.innerText
    let data = {page}

    let res = await this.sender.send('/task/index', data)
    document.querySelector(".tasks").innerHTML = res.html
  }


}