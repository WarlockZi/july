import Sender from "../Sender/Sender.js";

export default class Task {
  constructor() {
  }


  async create(e) {
    e.preventDefault()
    let task =  new Task()

    let form = e.target.closest('#taskForm')
    let data = task.DTO(form,'value')

    let modal = bootstrap.Modal.getInstance(form)
    modal.hide();

    let sender = new Sender('/task/create', data)
    let res = await sender.send()

    if (res.task) {
      let tasks = document.querySelector('.tasks')
      let tasksCount = tasks.querySelectorAll('.row').length
      if (tasksCount<3){
        tasks.insertAdjacentHTML('afterbegin', res.task)
      }
    }
  }

  DTO(el, type='innerText') {
    let checked
    if (type === 'value') {
      checked = +el.querySelector('.done').checked
    }else{
      checked = +el.querySelector('.done')[type]
    }

      return {
        name: el.querySelector('.name')[type],
        email: el.querySelector('.email')[type],
        task: el.querySelector('.task')[type],
        done: checked,
      }
  }

  async update(button, modal) {

    let row = button.closest('[data-id]')
    let task = new Task
    // debugger
    let data = task.DTO(row)

    modal.querySelector('#email').value = data.email
    modal.querySelector('#name').value = data.name
    modal.querySelector('#task').value = data.task
    modal.querySelector('#done').value = data.done
  }

  async updateOrCreate(event) {
    let button = event.relatedTarget
    let task = new Task
    // debugger
    if (button.id === 'taskCreate') {
      task.create()
    } else if(button.classList.contains('edit')) {
      task.update(button,this)
    }
  }
}
