import Sender from "../Sender/Sender.js";
import Cookie from "../Cookie/Cookie.js";

export default class Post {

  async emptyForm(modal) {
    modal.querySelector('form').classList.remove('was-validated')
    modal.querySelector('#id').value = 0
    modal.querySelector('#email').value = ''
    modal.querySelector('#name').value = ''
    modal.querySelector('#post').value = ''
    modal.querySelector('#done').value = 0
    modal.querySelector('#done').checked = false
  }

  async fillForm(button, modal) {
    let row = button.closest('[data-id]')
    let post = new Post
    let data = post.DTO(row)
    modal.querySelector('#id').value = data.id
    modal.querySelector('#email').value = data.email
    modal.querySelector('#name').value = data.name
    modal.querySelector('#post').value = data.post
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
      post: el.querySelector('.post')[type],
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
    let form = document.querySelector('#postForm')
    let modal = bootstrap.Modal.getInstance(form)
    modal.hide();
  }


  async save(e) {
    e.preventDefault()

    let post = new Post
    if (!this.checkAuth()) {
      post.modalHide()
      post.toastShow('Авторизуйтесь')
      return false
    }

    post.modalHide()
    let data = post.DTO(form, 'value')

    if (data.id) {
      post.update(data)
    } else {
      post.create(data)
    }
  }

  checkAuth() {
    let cookie = new Cookie()
    let admin = cookie.cookie.get_cookie('admin')
    return admin
  }

  async update(data) {
    let sender = new Sender()
    let res = await sender.send('/post/update', data)
    if (res.postHtml) {
      document.querySelector(`[data-id='${data.id}']`).outerHTML = res.postHtml
    }
  }

  async create(data) {
    let sender = new Sender()
    let res = await sender.send('/post/create', data)
    if (res?.post) {
      let post = new Post()
      post.toastShow()
      let posts = document.querySelector('.posts')
      let postsCount = posts.querySelectorAll('.row').length
      if (postsCount < 3) {
        posts.insertAdjacentHTML('beforeend', res.post)
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
    let post = new Post
    if (button.id === 'newTaskBtn') {
      post.emptyForm(this)
    } else if (button.classList.contains('edit')) {
      post.fillForm(button, this)
    }
  }
}
