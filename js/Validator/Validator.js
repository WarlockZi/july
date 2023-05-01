export default class Validator {

  validateForm() {

    let forms = document.querySelectorAll('.requires-validation')

    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })

  }

  stripTags(text) {
    return text.replace(/(<([^>]+)>)/ig, "");
  }

}