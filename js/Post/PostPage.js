import Post from "./Post.js";
import Sender from "../Sender/Sender.js";

export default class PostPage {
  constructor() {
    let page = document.querySelector('.post-page')
    if (!page) return

    page.querySelector('#pagination').onclick = this.getPage.bind(this)

  }

  async getPage({target}) {
    let page = target.innerText
    let data = {page}

    this.sender = new Sender
    let res = await this.sender.send('/post/index', data)
    document.querySelector(".posts").innerHTML = res.html
  }
}