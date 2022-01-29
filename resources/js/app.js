var Turbolinks = require("turbolinks");
if (Turbolinks.supported) {
    Turbolinks.start();
} else {
    console.warn("browser kamu tidak mendukung `Turbolinks`");
}

require("jquery-validation");
require("./bootstrap");
require("bootstrap/dist/js/bootstrap.bundle.min.js");
require("./bundle");
require("./scripts");

$(document).ready(function () {
    //set content margin nav bottom
    setContent();
});

function setContent() {
    var navHeight = $(".navbar").height();
    $(".nk-content").css("margin-bottom", navHeight);
}
