import { Controller } from "stimulus"
import moment from 'moment'

export default class extends Controller {
  initialize() {
      let date = this.element.innerHTML
      date = moment().fromNow(date)
  }
}