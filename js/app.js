import PostPage from "./Post/PostPage.js";
import Login from "./Auth/Login.js";
import Register from "./Auth/Register.js";

document.addEventListener("DOMContentLoaded", ready)

function ready(){
  new Login()
  new Register()
  new PostPage()
}


