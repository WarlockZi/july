import Comment from "./Comment/Comment.js";
import Login from "./Auth/Login.js";
import Register from "./Auth/Register.js";
import PostPage from "./Post/PostPage.js";

document.addEventListener("DOMContentLoaded", ready)

function ready() {
  new Login()
  new Register()
  new Comment()
  new PostPage()
}


