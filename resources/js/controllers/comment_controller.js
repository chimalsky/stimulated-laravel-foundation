import { Controller } from "stimulus"

export default class extends Controller {
  connect() {
    console.log("Hello, Stimulus!", this.element)
  }

  toggle(ev) {
    let form = this.element.querySelector('form')

    form.classList.toggle('active')
    console.log(form)
  }
}