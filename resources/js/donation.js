require("tinymce");
require("tinymce/themes/silver/theme.min.js");
require("tinymce/icons/default/icons.min.js");
/** Tinymce */
$(".date-picker-alt").datepicker();
var _tinymce_basic = ".tinymce-basic";
if ($(_tinymce_basic).exists()) {
    tinymce.init({
        selector: _tinymce_basic,
        content_css: true,
        skin: false,
        branding: false,
    });
}
