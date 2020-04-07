

$(function(){
	$("#form").validate({
		rules: {
			name: {
				required: true,
				minlength: 3
			},
			company: {
				required: true
			},
			phone: {
				required: true,
				number: true,
				minlength: 9
			},
			email: {
				required: true,
				email: true
			},
			message: {
				required: true
			}
			
		},
		messages:{
			name: {
				required: 'Este campo es obligatorio',
				minlength: 'La longitud mínima: 3'
			},
			company: {
				required: 'Este campo es obligatorio'
			},
			phone: {
				required: 'Este campo es obligatorio',
				number: 'Número de teléfono no válido',
				minlength: 'La logitud mínima: 6'
			},
			email: 'No valida dirección de correo electrónico',
			message: {
				required: 'Este campo es obligatorio'
			}
			
		},
		success: function(label){
			label.html('OK').removeClass('error').addClass('ok');
			setTimeout(function(){
				label.fadeOut(500);
			}, 2000)
		}
			
	});
});