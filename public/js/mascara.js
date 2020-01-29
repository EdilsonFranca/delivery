//mascara para cep
$(document).ready(function () { 
    var $CampoCep = $(".form-cep");
    $CampoCep.mask('00000-000', {reverse: true});
});