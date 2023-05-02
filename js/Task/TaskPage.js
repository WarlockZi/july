import Task from "./Task.js";
import Sender from "../Sender/Sender.js";

export default class TaskPage {
  constructor() {
    this.page = document.querySelector('.task-page')
    if (!this.page) return
    let task = new Task
    this.taskForm = document.querySelector('#taskForm')

    this.taskForm.addEventListener('show.bs.modal', task.updateOrCreate)
    this.createBtn = document.querySelector('#taskCreate')

    this.createBtn.onclick = task.create

    this.pagination = this.page.querySelector('#pagination')

    this.pagination.onclick = this.getPage

  }

  async getPage({target}){
    let page = target.innerText
    let data = {page}
    let sender = new Sender('/task/index', data)

    let res = await sender.send()
    document.querySelector(".tasks").innerHTML = res
  }


}