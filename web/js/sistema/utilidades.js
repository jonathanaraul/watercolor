/**
 * @author Jonathan Araul
 *
 */

function creaScriptBD(prefijo){
	
	var tipoReporte = $('[name=tipoReporte]').val();
	var elementos = $("input[type=text],textarea,select");
	
	var patron="-";
	tipoReporte=tipoReporte.replace(patron,'');
	var script= 'CREATE TABLE d100t_'+prefijo+'_'+tipoReporte+' ( d100pk_'+prefijo+'_'+tipoReporte+' int(11) NOT NULL AUTO_INCREMENT,i100fk_usuario INT NOT NULL,'

	$.each(elementos, function(indice, valor) {
		
		var auxiliar = $(valor).val();
		var campo = $.trim($(valor).parent().prev().html());
		

		campo=$.trim(campo.replace("ñ",'ni'));
		campo=$.trim(campo.replace(":",''));
		campo=$.trim(campo.replace(/<[^>]+>/g,''));
		campo=$.trim(campo.replace("+",''));
		campo=$.trim(campo.replace("-",''));
		campo=$.trim(campo.replace("(",''));
		campo=$.trim(campo.replace(")",''));		
		campo=$.trim(campo.replace("%",''));
		campo=$.trim(campo.replace("á",'a'));
		campo=$.trim(campo.replace("é",'e'));
		campo=$.trim(campo.replace("í",'i'));
		campo=$.trim(campo.replace("ó",'o'));
		campo=$.trim(campo.replace("ú",'u'));
		
		campo=$.trim(campo.replace("°",''));
		campo=$.trim(campo.replace(/\W/g,' '));				
		campo=$.trim(campo.replace(/\s/g,''));
		campo=$.trim(campo.replace(/\d/g,''));
		campo=campo.toLowerCase();
		
		var prenombre = $(valor).attr('prenombre');

		if(prenombre != undefined){
			campo = prenombre+'_'+campo;
		}		
		
		if($(valor).first().hasClass('numero')){
			script += 'nu_'+campo+' int(11) NOT NULL,';
		}
		else if($(valor).first().hasClass('texto')){
			script += 'tx_'+campo+' text COLLATE utf8_spanish_ci NOT NULL,';	
		}
		else if($(valor).first().hasClass('fecha')){
			script += 'fe_'+campo+' datetime NOT NULL,';	
		}

		
	});

	script += 'PRIMARY KEY (d100pk_'+prefijo+'_'+tipoReporte+'), INDEX (  i100fk_usuario ),FOREIGN KEY (  i100fk_usuario ) REFERENCES  enasal.i100t_usuario (i100pk_usuario) ON DELETE RESTRICT ON UPDATE RESTRICT );';
	console.log(script);
	return false;
}

function creaScriptBD2(prefijo){
	
	var elementos = $("input[type=text],textarea,select");
	

	var script= 'CREATE TABLE d100t_'+prefijo+' ( d100pk_'+prefijo+' int(11) NOT NULL AUTO_INCREMENT,i100fk_usuario INT NOT NULL,'

	$.each(elementos, function(indice, valor) {
		
		var auxiliar = $(valor).val();
		var campo = $.trim($(valor).parent().prev().html());
		

		campo=$.trim(campo.replace("ñ",'ni'));
		campo=$.trim(campo.replace(":",''));
		campo=$.trim(campo.replace(/<[^>]+>/g,''));
		campo=$.trim(campo.replace("+",''));
		campo=$.trim(campo.replace("-",''));
		campo=$.trim(campo.replace("(",''));
		campo=$.trim(campo.replace(")",''));		
		campo=$.trim(campo.replace("%",''));
		campo=$.trim(campo.replace("á",'a'));
		campo=$.trim(campo.replace("é",'e'));
		campo=$.trim(campo.replace("í",'i'));
		campo=$.trim(campo.replace("ó",'o'));
		campo=$.trim(campo.replace("ú",'u'));
		
		campo=$.trim(campo.replace("°",''));
		campo=$.trim(campo.replace(/\W/g,' '));				
		campo=$.trim(campo.replace(/\s/g,''));
		campo=$.trim(campo.replace(/\d/g,''));
		campo=campo.toLowerCase();
		
		var prenombre = $(valor).attr('prenombre');

		if(prenombre != undefined){
			campo = prenombre+'_'+campo;
		}		
		
		if($(valor).first().hasClass('numero')){
			script += 'nu_'+campo+' int(11) NULL,';
		}
		else if($(valor).first().hasClass('texto')){
			script += 'tx_'+campo+' text COLLATE utf8_spanish_ci NULL,';	
		}
		else if($(valor).first().hasClass('fecha')){
			script += 'fe_'+campo+' datetime NOT NULL,';	
		}

		
	});

	script += 'PRIMARY KEY (d100pk_'+prefijo+'), INDEX (  i100fk_usuario ),FOREIGN KEY (  i100fk_usuario ) REFERENCES  enasal.i100t_usuario (i100pk_usuario) ON DELETE RESTRICT ON UPDATE RESTRICT );';
	console.log(script);
	return false;
}
function insertaId(){
	
	var tipoReporte = $('[name=tipoReporte]').val();
	var elementos =$("input[type=text],textarea,select");
	
	
	var patron="-";
	tipoReporte=tipoReporte.replace(patron,'');

	$.each(elementos, function(indice, valor) {
		var auxiliar = $(valor).val();
		var campo = $.trim($(valor).parent().prev().html());
		

		campo=$.trim(campo.replace("ñ",'ni'));
		campo=$.trim(campo.replace(":",''));
		campo=$.trim(campo.replace(/<[^>]+>/g,''));
		campo=$.trim(campo.replace("+",''));
		campo=$.trim(campo.replace("-",''));
		campo=$.trim(campo.replace("(",''));
		campo=$.trim(campo.replace(")",''));		
		campo=$.trim(campo.replace("%",''));
		campo=$.trim(campo.replace("á",'a'));
		campo=$.trim(campo.replace("é",'e'));
		campo=$.trim(campo.replace("í",'i'));
		campo=$.trim(campo.replace("ó",'o'));
		campo=$.trim(campo.replace("ú",'u'));
		
		campo=$.trim(campo.replace("°",''));
		campo=$.trim(campo.replace(/\W/g,' '));				
		campo=$.trim(campo.replace(/\s/g,''));
		campo=$.trim(campo.replace(/\d/g,''));
		campo=campo.toLowerCase();
		
		var prenombre = $(valor).attr('prenombre');

		if(prenombre != undefined){
			campo = prenombre+'_'+campo;
		}		
		 
		if($(valor).first().hasClass('numero')){
			campo = 'nu_'+campo;
		}
		else if($(valor).first().hasClass('texto')){
			campo = 'tx_'+campo;	
		}
		else if($(valor).first().hasClass('fecha')){
			campo = 'fe_'+campo;
		}
		$(valor).attr('id',campo);
		
	});
	return false;
}
function validaCamposLlenos(elementos) {
	var validacion = true;

	$.each(elementos, function(indice, valor) {
		var auxiliar = $(valor).val();
		var campo = $.trim($(valor).parent().prev().html());

		if(auxiliar == '') {
			
			$('#mensajeajax-negativo').empty();
			$('#mensajeajax-negativo').html('<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong> <i class="icon-remove" ></i> Error </strong> Debe llenar el campo "' + campo+'".<br>');
			$('#mensajeajax-negativo').css('display','block');
			validacion = false;
			return false;
		}
	});
	if(validacion==true){
		$('#mensajeajax-negativo').css('display','none');
	}
	return validacion;
}
function validaCamposRadio(elementos) {
	
	var prueba = false;
	$.each(elementos, function(indice, valor) {
		if($(valor).is(':checked')){
			prueba = true;
		}

	});
	if(prueba == false) { 
		$('#mensajeajax-negativo').empty();
		$('#mensajeajax-negativo').html('<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong> <i class="icon-remove" ></i> Error </strong> Debe especificar el sexo.<br>');
		$('#mensajeajax-negativo').css('display','block');
		return false;
 	}
 	else{
 		$('#mensajeajax-negativo').css('display','none');
 		
 	}
 	return prueba;

}
function validaCamposNumericos(elementos) {
	var validacion = true;

	$.each(elementos, function(indice, valor) {
		var auxiliar = $(valor).val();
		var campo = $.trim($(valor).parent().prev().html());

		if(!isNumber(auxiliar) ){
			jAlert('El valor del campo ' + campo + ' debe ser numerico', 'Error');
			$(valor).css('border', '1px solid red');
			validacion = false;
			return false;
		} else {
			$(valor).css('border', '1px solid #929292');
		}
	});
	return validacion;
}
function validaCamposNumericos2(elementos) {
	var validacion = true;

	$.each(elementos, function(indice, valor) {
		var auxiliar = $(valor).val();
		var campo = $.trim($(valor).parent().prev().html());

		if(auxiliar!= '' &&  !isNumber(auxiliar) ){
			jAlert('El valor del campo ' + campo + ' debe ser numerico', 'Error');
			$(valor).css('border', '1px solid red');
			validacion = false;
			return false;
		} else {
			$(valor).css('border', '1px solid #929292');
		}
	});
	return validacion;
}
function validaCamposFecha(elementos) {
	var validacion = true;

	$.each(elementos, function(indice, valor) {
		var auxiliar = $(valor).val();
		var campo = $.trim($(valor).parent().prev().html());
		if(!checkFecha(auxiliar) ){
			jAlert('El valor del campo ' + campo + ' debe ser de tipo fecha, ej: 1-1-2012', 'Error');
			$(valor).css('border', '1px solid red');
			validacion = false;
			return false;
		} else {
			$(valor).css('border', '1px solid #929292');
		}
	});
	return validacion;
}
function validaCamposSelect(elementos) {
	var validacion = true;

	$.each(elementos, function(indice, valor) {
		var auxiliar = $(valor).val();
		var campo = $.trim($(valor).parent().prev().html());
		if(auxiliar == '0' ){
			jAlert('Debe seleccionar un tipo de ' + campo, 'Error');
			$(valor).css('border', '1px solid red');
			validacion = false;
			return false;
		} else {
			$(valor).css('border', '1px solid #D5D5D5');
		}
	});
	return validacion;
}
function validaEmail(elemento) {
	var validacion = true;

	if(!checkEmail(elemento.val())){
		jAlert('Debe ingresar un correo electrónico válido', 'Error');
		validacion = false;
		$(elemento).css('border', '1px solid red');
								   }
	else {
		$(elemento).css('border', '1px solid #D5D5D5');
		 }						 
	return validacion;
}
function validaCedula(elemento) {
	var validacion = true;

	if(!checkCedula(elemento.val())){
		jAlert('La cedula solo debe contener digitos númericos', 'Error');
		validacion = false;
		$(elemento).css('border', '1px solid red');
								   }
	else {
		$(elemento).css('border', '1px solid #D5D5D5');
		 }						 
	return validacion;
}
function validaPasswords(elemento1,elemento2) {
	
	if(elemento1.val() != elemento2.val()){
		$('#mensajeajax-negativo').empty();
		$('#mensajeajax-negativo').html('<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong> <i class="icon-remove" ></i> Error </strong> Las contraseñas deben ser idénticas.<br>');
		$('#mensajeajax-negativo').css('display','block');
		
		return false;
	}
	else {
		$('#mensajeajax-negativo').css('display','none');
		 }	
	if(elemento1.val().length < 8){

		$('#mensajeajax-negativo').empty();
		$('#mensajeajax-negativo').html('<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong> <i class="icon-remove" ></i> Error </strong> La contraseña debe poseer mínimo 8 caracteres.<br>');
		$('#mensajeajax-negativo').css('display','block');
		return false;
	}		
	else {
		$('#mensajeajax-negativo').css('display','none');
		 }		 
	return true;
}
function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}

function checkEmail(email) {
	
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!filter.test(email)) {
		return false;
	}
	return true;
}

function checkCedula(cedula) {
	if((parseInt(cedula.indexOf('.'))) >= 0) {
		return false;
	} else {
		if(!isNumber(cedula)) {
			return false;
		}
		else{
			return true;
		}
	}
}
function checkFecha(fecha) {
	var arreglo = fecha.split("-");
	
	if(arreglo.length !=3) return false;
	else return true;
}

