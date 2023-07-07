import Sender from "../Sender/Sender.js";

export default class Comment {
  constructor() {
    this.comments = document.querySelector('.comments')
    if (!this.comments) return

    this.saveCommentButton = document.querySelector('#saveComment')
    this.saveCommentButton.onclick = this.create.bind(this)

    this.commentForm = document.querySelector('#commentForm')
    this.emptyComment = this.commentForm.querySelector('#emptyComment')

    this.comment = this.commentForm.querySelector('#comment')
    this.name = this.commentForm.querySelector('#name')
    this.userId = document.querySelector('#userId')
    this.postId = document.querySelector('#postId')
  }

  async create(e) {
    if (!this.comment.value) {
      this.emptyComment.style.display = 'flex'
      e.preventDefault()
      e.stopPropagation()
      return
    }

    let data = {
      text: this.comment.value,
      user_id: +this.userId.innerText,
      post_id: +this.postId.innerText,
      date: new Date().toISOString().slice(0, 10),
    }
    let sender = new Sender()
    let res = await sender.send('/comment/create', data)
    if (res) {

    }
  }

}