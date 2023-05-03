import Task from "./Task.js";
import Sender from "../Sender/Sender.js";

export default class TaskPage {
  constructor() {
    this.page = document.querySelector('.task-page')
    if (!this.page) return

    let task = new Task

    this.taskForm = document.querySelector('#taskForm')
    this.taskForm.addEventListener('shown.bs.modal', task.updateOrCreate)
    this.taskForm.addEventListener('hidden.bs.modal', task.clearValidator)

    let form = document.querySelector('#taskForm .needs-validation')
    if (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        } else {
          task.save(event)
        }

        form.classList.add('was-validated')
      }, false)
    }

    // this.createBtn = document.querySelector('#taskSave')
    // this.createBtn.onclick = task.save

    this.pagination = this.page.querySelector('#pagination')
    this.pagination.onclick = this.getPage

    document.querySelectorAll('data-sort').forEach((sort) => {
      sort.parentNode.addEventListener('click', this.sort)
    })
  }

  sort() {

  }

  async getPage({target}) {
    let page = target.innerText
    let data = {page}
    let sender = new Sender('/task/index', data)

    let res = await sender.send()
    document.querySelector(".tasks").innerHTML = res.html
  }


}