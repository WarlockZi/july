import Auth from './Auth/Auth.js'
import Validator from "./Validator/Validator.js";
import Task from "./Task/Task.js";

let validator = new Validator()
validator.validateForm()

let auth = new Auth()

let task = new Task()

