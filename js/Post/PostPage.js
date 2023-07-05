import Post from "./Post.js";
import Sender from "../Sender/Sender.js";
import Cookie from "../Cookie/Cookie.js";

export default class PostPage {
  constructor() {
    this.sender = new Sender
    let page = document.querySelector('.post-page')
    if (!page) return

    let post = new Post

    let modal = document.querySelector('#postForm')
    modal.addEventListener('shown.bs.modal', post.updateOrCreate)
    modal.addEventListener('hidden.bs.modal', post.clearValidator)

    let form = document.querySelector('#postForm .needs-validation')
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      } else {
        post.save(event)
      }
      form.classList.add('was-validated')
    }, false)

    let pagination = page.querySelector('#pagination')
    pagination.onclick = this.getPage.bind(this)
  }

  async getPage({target}) {
    let page = target.innerText
    let data = {page}
    debugger

    let res = await this.sender.send('/post/index', data)
    document.querySelector(".posts").innerHTML = res.html
  }
}