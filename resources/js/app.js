import { Application } from "stimulus"
import { definitionsFromContext } from "stimulus/webpack-helpers"

import $ from 'jquery'
import 'foundation-sites'
import 'datatables.net-zf'

import turbolinks from 'turbolinks'
import trix from 'trix'

import flatpickr from 'flatpickr'
import 'flatpickr/dist/flatpickr.min.css'

/**
 * On initial page load
 */

const application = Application.start()
const context = require.context("./controllers", true, /\.js$/)
application.load(definitionsFromContext(context))

turbolinks.start()

window.$ = $
window.flatpickr = flatpickr

$(document).foundation()

function initDateInputs() {
    let $dateInputs = $("input[type='date']")
    flatpickr($dateInputs, {
        altInput: true,
        altFormat: "F j, Y",
    })
}



