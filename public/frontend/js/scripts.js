new WOW().init(); var warnings; function getWarnings(lang) {switch (lang) {case 'es': warnings = {messages: {error_attention: 'Error', warning_attention: 'Atención', incorrect_data: 'Los datos incorrectos', name: 'Ingresá tu nombre y apellido', email: 'Ingresá tu correo electrónico', email_different: 'Los correos electrónicos no coinciden', format: 'Formato de correo electrónico incorrecto', subject: 'Ingresá tu asunto', message: 'Ingresá tu mensaje', search: 'Ingresá algo para la búsqueda', title_project: 'Gracias por confiar en nosotros!', message_project: 'Te responderemos en la brevedad posible', message_captcha: 'No se ha podido verificar el captcha', message_newletter: 'Su registro ha sido procesado con exito.', message_contact: 'Su mensaje ha sido enviado, en las próximás horas nos comunicaremos con usted.', error_exception: 'Ha ocurrido un error intentá más tarde', }, buttons: {btn_okey: 'Aceptar', btn_submit: 'Enviando', btn_submit_message: 'Enviar Mensaje', btn_suscribe: 'Suscribete'} }; return warnings; break; case 'en': warnings = {messages: {error_attention: 'Error', warning_attention: 'Oops', incorrect_data: 'The input data is incorrect', name: 'You must enter the  full name', email: 'You must enter the email address', email_different: "Email address doesn't match", format: 'incorrect email format', phone: 'You must enter the phone number', subject: 'You must enter the subject', message: 'You must enter the  message', search: 'Type in your search', message_project: 'We will be contacting you shortly', message_captcha: 'The captcha could not be verified', message_newletter: 'Your registration has been processed successfully.', message_contact: 'Your message has been sent, we will contact you in the next few hours.', error_exception: "S'omething went wrong. Try again later", }, buttons: {btn_okey: 'Accept', btn_submit: 'Submit', btn_submit_message: 'Submit Message', btn_suscribe: 'Suscribe'} }; return warnings; break; default: warnings = {messages: {error_attention: 'Error', warning_attention: 'Atención', incorrect_data: 'Los datos incorrectos', name: 'Ingresá tu nombre y apellido', email: 'Ingresá tu correo electrónico', email_different: 'Los correos electrónicos no coinciden', subject: 'Ingresá tu asunto', format: 'Formato de correo electrónico incorrecto', message: 'Ingresá tu mensaje', search: 'Ingresá algo para la búsqueda', title_project: 'Gracias por confiar en nosotros!', message_project: 'Te responderemos en la brevedad posible', message_captcha: 'No se ha podido verificar el captcha', message_newletter: 'Su registro ha sido procesado con exito.', message_contact: 'Su mensaje ha sido enviado, en las próximás horas nos comunicaremos con usted.', error_exception: 'Ha ocurrido un error intentá más tarde', }, buttons: {btn_okey: 'Aceptar', btn_submit: 'Enviando', btn_submit_message: 'Enviar Mensaje', btn_suscribe: 'Suscribete'} }; return warnings; break; } } getWarnings($("#lang").val()); $( document ).ready(function() {$("#top-button").click(function() {$("html, body").animate({scrollTop: "0px"}) }); $("#btn-toogle").click(function() {console.log("menu-mobile"); var el = document.getElementById('menu-mobile'); el.style.display = (el.style.display == 'none') ? 'block' : 'none'; }); $('a[href*=#]').click(function() {if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {if ($(this.hash) != '') {if(this.hash.slice(1)!="category-1" && this.hash.slice(1)!="category-2"){$(".li-nav").removeClass('active'); var $target = $(this.hash); $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']'); if ($target.length) {var targetOffset = $target.offset().top - 40; $('html,body').animate({scrollTop: targetOffset }, 1000); return false; } }else{$(".btn-theme").removeClass('active'); if(this.hash.slice(1)=="category-1" ){$("#btn-1").addClass('active'); }else{$("#btn-2").addClass('active'); } } } } }); }); $(window).scroll(function() {60 <= $(window).scrollTop() ? $("#sticky-header").addClass("sticky") : $("#sticky-header").removeClass("sticky"), 800 >= $(window).scrollTop() ? $("#top-button").css("opacity", "0") : $("#top-button").css("opacity", "1") }); $(window).load(function() {$("#mask").hide(), 60 <= $(window).scrollTop() ? $("#sticky-header").addClass("sticky") : $("#sticky-header").removeClass("sticky"), 800 >= $(window).scrollTop() ? $("#top-button").css("opacity", "0") : $("#top-button").css("opacity", "1") }); function enter_name(e) {if (e.keyCode == 13) {if ($("#name").val() != "") {$("#email").focus(); } } } function enter_email(e) {if (e.keyCode == 13) {if ($("#email").val() != "") {$("#message").focus(); } } } function enter_message(e) {if (e.keyCode == 13) {if ($("#message").val() != "") {sendContact(); } } } function buscar() {if ($("#address").val() == "") {launch_toast("Ingresá una dirección"); $("#address").focus(); return false; } else {var address = $("#address").val(); address = address.toLowerCase(); address = address.replace(/\s/g, '-'); var url = $("#url").val(); if ($("#lang").val() == 'es') {window.location = url + "/buscar?type=" + $("#select-type").val() + "&address=" + address; } else {window.location = url + "/en/search?type=" + $("#select-type").val() + "&address=" + address; } } } function enter_address(e) {if (e.keyCode == 13) {buscar(); } } function sendContact() {var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; grecaptcha.ready(function() {grecaptcha.execute($("#captcha-key").val(), {action: 'homepage'}).then(function(token) {$('#captcha').val(token); if ($("#name").val() == "") {launch_toast(warnings.messages.name); $("#name").focus(); return false; } else if ($("#email").val() == "") {launch_toast(warnings.messages.email);; $("#email").focus(); return false; } else if ($("#email").val() != "" && !expr.test($("#email").val())) {launch_toast(warnings.messages.format); $("#email").focus(); return false; } if ($("#message").val() == "") {launch_toast(warnings.messages.message); $("#message").focus(); return false; } else {$("#boton-1").prop('disabled', true); $("#boton-1").html('<i class="fa fa-circle-o-notch fa-spin"></i> ' + warnings.buttons.btn_submit); $.ajax({url: $("#url").val() + '/store_message', type: 'POST', dataType: 'json', data: {name: $("#name").val(), email: $("#email").val(), message: $("#message").val(), captcha: $("#captcha").val() }, success: function(data) {$("#form-1")[0].reset(); $("#boton-1").prop('disabled', false); $("#boton-1").html(warnings.buttons.btn_submit_message); if (data.response == "no-catpcha") {launch_toast(warnings.messages.message_captcha); } else {swal(warnings.messages.message_contact, {allowOutsideClick: false, closeOnClickOutside: false }).then((value) => {location.reload(); }); } }, error: function(msj) {$("#boton-1").prop('disabled', false); $("#boton-1").html(warnings.buttons.btn_submit_message); launch_toast(warnings.messages.error_exception); } }); } }); }); } function launch_toast(e) {$.growl.error({title: "<i class='fa fa-exclamation-circle'></i> Error", message: e }); }