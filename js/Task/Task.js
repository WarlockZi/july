import Sender from "../Sender/Sender";

export default class Task {
  constructor() {
    this.form = document.querySelector('#taskForm')

    this.email = this.form.querySelector('#email')
    this.name = this.form.querySelector('#name')
    this.task = this.form.querySelector('#task')
    this.done = this.form.querySelector('#done')

    this.createBtn = this.form.querySelector('#task-create')
    if (this.createBtn) {
      this.createBtn.onclick = this.create.bind(this)
    }
  }

  async create(e) {

    e.preventDefault()
    let data = {
      name: this.name.value,
      email: this.email.value,
      task: this.task.value,
      done: this.done.value,
    }
    let sender = new Sender('/task/create',data)
    let res = await sender.send()
    this.form.classList.toggle('show')
    if (res.created){

    }


  }

}