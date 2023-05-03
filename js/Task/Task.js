import Sender from "../Sender/Sender.js";

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


  async save(e) {
    e.preventDefault()
    let target = e.target
    debugger
    let form = target.closest('#taskForm')

    let modal = bootstrap.Modal.getInstance(form)
    modal.hide();

    let task = new Task
    let data = task.DTO(form, 'value')

    if (data.id) {
      task.update(data)
    } else {
      task.create(data)
    }
  }

  async update(data) {
    let sender = new Sender('/task/update', data)
    let res = await sender.send()
    if (res.taskHtml) {
      document.querySelector(`[data-id='${data.id}']`).outerHTML = res.taskHtml
    }
  }

  async create(data) {
    let sender = new Sender('/task/create', data)
    let res = await sender.send()
    if (res.taskHtml) {
      let tasks = document.querySelector('.tasks')
      let tasksCount = tasks.querySelectorAll('.row').length
      if (tasksCount < 3) {
        tasks.insertAdjacentHTML('afterbegin', res.task)
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
