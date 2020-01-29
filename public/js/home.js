$("#cartao-de-credito").click(function() {
    if ($("#cartao-de-credito").prop("checked")) {
      $(".troco").css("display", "none")
    }
  })
  $("#dinheiro").click(function() {
      $(".troco").css("display", "block")
  })
  $(function(){var o=$(".formulario");$(window).scroll(function(){$(this).scrollTop()>20?o.addClass("formulario-fixo"):o.removeClass("formulario-fixo")})});