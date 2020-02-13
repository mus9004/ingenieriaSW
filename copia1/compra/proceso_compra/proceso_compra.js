//botón siguiente div 1

function esc_div1(){
	
	if($('#envio1').prop('checked') || $('#envio2').prop('checked')){
		
		$("#div1").hide("puff",800,mos_div2);	
		
	}
	
	else{
		
		alert("Debe elegir alguna de las dos opciones");	
	
	}
	
}

function mos_div2(){
	
	$("#div2").show("drop",800);
	
	
	
}

// botón atrás div 2

function a_esc_div2(){
	
	$("#div2").hide("puff",800,mos_div1);	
	
}

function mos_div1(){
	
	$("#div1").show("drop",800);
	
	
	
}

// botón siguiente div 2

function s_esc_div2(){
	
	if($('#pago1').prop('checked') || $('#pago2').prop('checked') || $('#pago3').prop('checked') || $('#pago4').prop('checked') ){
		
		$("#div2").hide("puff",800,mos_div3);	
		
	}
	
	else{
		
		alert("Debe elegir alguna de las dos opciones");	
	
	}
	
}

function mos_div3(){
	
	$("#div3").show("drop",800);
	
	$(function(){
     
     	$.ajax({
			
			url:"mostrar_compra.php",
			
			success:function(respuesta){
				
				$("#mostrar_compra").html(respuesta);
				$("#mostrar_compra").show("fast");
			
			
			}
			
			
		});
		
     
	 
	});
	
}

// botón atrás div 3

function a_esc_div3(){
	
	$("#div3").hide("puff",800,mos_div2);	
	
}

function mos_div2(){
	
	$("#div2").show("drop",800);
	
	
	
}


//-------------- sumar envio ------------------ //

function sumar_envio(){
	
	
	$.ajax({
					
		type:"POST",
		url:"sumar_envio.php",
			
	});
				

}


//-------------- restar envio ------------------ //

function restar_envio(){
	
	
	$.ajax({
					
		type:"POST",
		url:"restar_envio.php",
			
	});
				

}


//----------- mostrar datos transferencia -----------//

function datos_transferencia(){
	
	
	$("#transferencia").show("slow");	
	
	
}


//---------- eliminar productos ------------- //

function eliminar_producto(indice){
	
		
		$.ajax({
			
			url:"../eliminar.php",
			data:{"indice":indice},
			
			beforeSend:function(){
				
				$("#n"+indice).show("fast");
				
				
			},

			
			
			success:function(respuesta){
				
				
				
				$.ajax({
			
					url:"mostrar_compra.php",
					
			
					success:function(respuesta){
						
						
						$("#mostrar_compra").html(respuesta);
						$("#mostrar_compra").show("fast");
						
					}			
				});	
			
			}
			
			
		});
	
	
	
	}
	
//------------------- mostrar compra ---------------------//

$(function(){
     
     	$.ajax({
			
			url:"mostrar_compra.php",
			
			success:function(respuesta){
				
				$("#mostrar_compra").html(respuesta);
				$("#mostrar_compra").show("fast");
			
			
			}
			
			
		});
		
     
	 
});



//----------------- forma de pago ----------------------//

function forma_pago(pago){
	
	$.ajax({
			
		type:"POST",
		url:"forma_pago.php",
		data:{"pago":pago}		
			
	});	
	
}

