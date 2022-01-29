var Turbolinks = require("turbolinks");
if (Turbolinks.supported) {
    Turbolinks.start();
} else {
    console.warn("browser kamu tidak mendukung `Turbolinks`");
}
require("jquery-validation");
require("./bootstrap");
require("./bundle");
require("./scriptsadmin");
require("./charts/chart-sales");
window.Swal = require("sweetalert2");

$(document).on("turbolinks:load", function () {
    console.log("load");
});
