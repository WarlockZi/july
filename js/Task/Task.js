import Sender from "../Sender/Sender.js";
import Cookie from "../Cookie/Cookie.js";

export default class Task {

  async emptyForm(modal) {
    modal.querySelector('form').classList.remove('was-validated')
    modal.querySelector('#id').value = 0
    modal.querySelector('#email').value = ''
    modal.querySelector('#name').value = ''
    modal.querySelector('#task').value = ''
    modal.querySelector('#done').value = 0
    modal.querySelector('#done').checked = false
  }

  async fillForm(button, modal) {
    let row = button.closest('[data-id]')
    let task = new Task
    let data = task.DTO(row)
    modal.querySelector('#id').value = data.id
    modal.querySelector('#email').value = data.email
    modal.querySelector('#name').value = data.name
    modal.querySelector('#task').value = data.task
    modal.querySelector('#done').value = data.done
  }

  clearValidator() {
    this.querySelector('form').classList.remove('was-validated')
  }

  DTO(el, type = 'innerText') {
    let checked
    let id
    if (type === 'value') {
      checked = +el.querySelector('.done').checked
      id = +el.querySelector('.id').value
    } else {
      checked = +el.querySelector('.done')[type]
      id = +el.dataset.id
    }

    return {
      id: id,
      name: el.querySelector('.name')[type],
      email: el.querySelector('.email')[type],
      task: el.querySelector('.task')[type],
      done: checked,
    }
  }

  toastShow(innerText='') {
    let toasterEl = document.querySelector('.toast')
    if (innerText) {
      toasterEl.querySelector('.toast-body').innerText = "Авторизуйтесь!"
    }
    let toast = new bootstrap.Toast(toasterEl)
    toast.show()
  }

  modalHide() {
    let form = document.querySelector('#taskForm')
    let modal = bootstrap.Modal.getInstance(form)
    modal.hide();
  }


  async save(e) {
    e.preventDefault()

    let task = new Task
    if (!this.checkAuth()) {
      task.modalHide()
      task.toastShow('Авторизуйтесь')
      return false
    }

    task.modalHide()
    let data = task.DTO(form, 'value')

    if (data.id) {
      task.update(data)
    } else {
      task.create(data)
    }
  }

  checkAuth() {
    let cookie = new Cookie()
    let admin = cookie.cookie.get_cookie('admin')
    return admin
  }

  async update(data) {

    let sender = new Sender()
    let res = await sender.send('/task/update', data)
    if (res.taskHtml) {
      document.querySelector(`[data-id='${data.id}']`).outerHTML = res.taskHtml
    }

  }

  async create(data) {
    let sender = new Sender()
    let res = await sender.send('/task/create', data)
    if (res?.task) {
      let task = new Task()
      task.toastShow()
      let tasks = document.querySelector('.tasks')
      let tasksCount = tasks.querySelectorAll('.row').length
      if (tasksCount < 3) {
        tasks.insertAdjacentHTML('beforeend', res.task)
      }
      if (res?.nextPage) {
        let pagination = document.querySelector('#pagination')
        pagination.insertAdjacentHTML('beforeend', res.nextPage)
        pagination.lastElementChild.remove()
      }
    }
  }

  async updateOrCreate(event) {
    let button = event.relatedTarget
    let task = new Task
    if (button.id === 'newTaskBtn') {
      task.emptyForm(this)
    } else if (button.classList.contains('edit')) {
      task.fillForm(button, this)
    }
  }
}
