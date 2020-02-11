window.onload=function(){
	
	var pos=window.name || 0;
	window.scrollTo(0,pos);
	
}
window.onunload=function(){
	
	window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
	
}


function ventana_modal(id_producto){
	
	$.ajax({
		type:"POST",
		url:"subir_archivos/ventana_modal.php",
		data:{"id_producto":id_producto},
		
		success: function(resp){
			
			$('#div-results3').html(resp);
		
		}
	
	
	});

}

/* Script written by Miguel Nunez @ minuvasoft10.com */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var id_producto=$("#id_producto").val();
	var file = _("file1").files[0];
	//alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	formdata.append("id_producto", id_producto);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "subir_archivos/zip.php");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Subidos "+event.loaded+" bytes de "+event.total+" bytes";
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% Subido... Por favor, espere.";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Subida Fallida";
}
function abortHandler(event){
	_("status").innerHTML = "Subida Abortada";
}