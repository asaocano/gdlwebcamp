(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    //Mostrar la página en la que está
    $(
      'body.conferencia .navegacion-principal a:contains("Conferencia")'
    ).addClass("activo");
    $(
      'body.calendario .navegacion-principal a:contains("Calendario")'
    ).addClass("activo");
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass(
      "activo"
    );

    //menú fijo
    var windowHeight = $(window).height();
    var alturaBarra = $(".barra").innerHeight();
    console.log(alturaBarra);
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll > windowHeight) {
        $(".barra").addClass("fixed");
        $("body").css({ "margin-top": alturaBarra + "px" });
      } else {
        console.log("nmms tampoco tanto we");
        $(".barra").removeClass("fixed");
        $("body").css({ "margin-top": "0px" });
      }
    });

    //menu hamburguesa
    $(".menu-movil").on("click", function () {
      $(".navegacion-principal").slideToggle();
    });
    //Datos usuario
    let nombre = document.getElementById("nombre");
    let apellido = document.getElementById("apellido");
    let email = document.getElementById("email");

    //Datos pase
    let pase_dia = document.getElementById("pase-dia");
    let pase_completo = document.getElementById("pase-completo");
    let pase_dos = document.getElementById("pase-dos-dias");

    //Botones y divs
    if (document.getElementById("calcular")) {
      var calcular = document.getElementById("calcular");
      var boletos_dia = document.getElementById("pase-dia");
      var errorDiv = document.getElementById("error");
      var btnRegistro = document.getElementById("btnregistro");
      var lista_productos = document.getElementById("lista-productos");
      var tot = document.getElementById("total");
      var eventos = document.getElementById("eventos");
      var viernes = document.getElementById("viernes");

      //Extras
      var cantEti = document.getElementById("etiquetas");
      var camisas = document.getElementById("camisa-evento");
      var regalo = document.getElementById("regalo");

      //Eventos
      calcular.addEventListener("click", calcularMonto);
      pase_dia.addEventListener("blur", mostrar);
      pase_completo.addEventListener("blur", mostrar);
      pase_dos.addEventListener("blur", mostrar);
      nombre.addEventListener("blur", validar);
      apellido.addEventListener("blur", validar);
      email.addEventListener("blur", validar);
      email.addEventListener("blur", validarCorreo);
      btnRegistro.disabled = true;

      //Funciones
      function calcularMonto() {
        event.preventDefault();
        if (regalo.value === "") {
          alert("Debes seleccionar un regalo");
          regalo.focus();
        } else {
          var boleto1 = parseInt(pase_dia.value, 10) || 0;
          var boleto2 = parseInt(pase_dos.value, 10) || 0;
          var boleto3 = parseInt(pase_completo.value, 10) || 0;
          var eti = parseInt(cantEti.value, 10) || 0;
          var cami = parseInt(camisas.value, 10) || 0;
          var reg = regalo.value;

          var total =
            boleto1 * 30 +
            boleto2 * 45 +
            boleto3 * 50 +
            eti * 2 +
            cami * 10 * 0.93;

          var listaProd = [];
          if (boleto1 >= 1) {
            listaProd.push("Pases por día: " + boleto1);
          }
          if (boleto2 >= 1) {
            listaProd.push("Pases por dos días: " + boleto2);
          }
          if (boleto3 >= 1) {
            listaProd.push("Pases completos: " + boleto3);
          }
          if (eti >= 1) {
            listaProd.push("Paquetes de etiquetas: " + eti);
          }
          if (cami >= 1) {
            listaProd.push("Camisetas: " + cami);
          }
          listaProd.push("Regalo: " + reg);

          lista_productos.style.display = "block";
          lista_productos.innerHTML = "";

          for (var i = 0; i < listaProd.length; i++) {
            lista_productos.innerHTML += listaProd[i] + "<br/>";
          }
          tot.innerHTML = "$" + total.toFixed(2) + "<br/>";
          btnRegistro.disabled = false;
          document.getElementById("total_pedido").value = total;
        }
      }
      function mostrar() {
        var boleto1 = parseInt(pase_dia.value, 10) || 0;
        var boleto2 = parseInt(pase_dos.value, 10) || 0;
        var boleto3 = parseInt(pase_completo.value, 10) || 0;
        var diasElegidos = [];

        if (boleto1 > 0) {
          diasElegidos.push("viernes");
          console.log("abrir");
        } else {
          document.getElementById("viernes").style.display = "none";
        }

        if (boleto2 > 0) {
          diasElegidos.push("viernes", "sabado");
        } else {
          document.getElementById("viernes").style.display = "none";
          document.getElementById("sabado").style.display = "none";
        }
        if (boleto3 > 0) {
          diasElegidos.push("viernes", "sabado", "domingo");
        } else {
          document.getElementById("viernes").style.display = "none";
          document.getElementById("sabado").style.display = "none";
          document.getElementById("domingo").style.display = "none";
        }
        for (var i = 0; i < diasElegidos.length; i++) {
          document.getElementById(diasElegidos[i]).style.display = "block";
        }
      }

      function validar() {
        if (this.value === "") {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "*Los campos son obligatorios";
          this.style.border = "1px solid red";
        } else {
          this.style.border = "1px solid #CCC";
        }
        if (
          nombre.value !== "" &&
          apellido.value !== "" &&
          email.value !== ""
        ) {
          errorDiv.style.display = "none";
        }
      }

      function validarCorreo() {
        if (this.value.indexOf("@") == -1) {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "*El correo debe tener @";
          this.style.border = "1px solid red";
        } else {
          this.style.border = "1px solid #CCC";
          errorDiv.style.display = "none";
        }
      }
    }
  });
})();

$(document).ready(function () {
  //Programa de conferencias
  $(".menu-programa a:first").addClass("activo");
  $(".programa-evento .info-curso:first").show();
  $(".menu-programa a").on("click", function () {
    $(".menu-programa a").removeClass("activo");
    $(this).addClass("activo");
    $(".ocultar").hide();
    var enlace = $(this).attr("href");
    $(enlace).fadeIn(1000);
    return false;
  });

  //animacion números
  /* Se selecciona el resumen evento, que es donde deben ir los números, li que son los elementos de lista, nth-child para seleccionar uno en específico y con "animateNumber"
  se añade el efecto de animación, los parametros que debe llevar es {number: "número al que va a llegar", "tiempo en milisegundos que debe tardar"}
  */
  $(".resumen-evento li:nth-child(1) p").animateNumber({ number: 6 }, 1200);
  $(".resumen-evento li:nth-child(2) p").animateNumber({ number: 15 }, 1200);
  $(".resumen-evento li:nth-child(3) p").animateNumber({ number: 3 }, 1200);
  $(".resumen-evento li:nth-child(4) p").animateNumber({ number: 9 }, 1200);

  //animación cuenta regresiva
  $(".cuenta-regresiva").countdown("2020/09/21 12:00:00", function (event) {
    $("#dias").html(event.strftime("%D"));
    $("#horas").html(event.strftime("%H"));
    $("#minutos").html(event.strftime("%M"));
    $("#segundos").html(event.strftime("%S"));
  });

  //Colorbox
  $(".invitado-info").colorbox({ inline: true, width: "50%" });
});
