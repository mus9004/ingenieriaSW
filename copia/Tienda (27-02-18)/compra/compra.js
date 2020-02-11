//----------------------- stock ---------------------------//
function comprobar_stock(cantidad){
	
	var id_producto=document.formu_compra.id_producto.value;
	var cantidad_producto=document.formu_compra.cantidad_producto.value;
	
	$.ajax({
					
		type:"POST",
		url:"compra/comprobar_stock.php",
		data:{"id_producto":id_producto,"cantidad_producto":cantidad_producto},
	
			success:function(respuesta){
				
				if(respuesta=="exito"){
				
					volar();
				
				}else{
					
					
					swal({
  						title: '¡Imposible!',
  						text: 'Quedan '+cantidad+' unidades en nuestros almacenes. Gracias.',
  						type: 'error',
  						confirmButtonText: 'De acuerdo'
					})				
					//alert("Debe elegir una cantidad menor ya que no hay suficiente stock para este producto en nuestros almacenes. Gracias.");
					
				}
				
			}
				
	});
		
}

function aviso_stock(id_producto){
	
	// alert("hola");
	// variable email,id_producto contiene el email e id_producto.
	/*
	
	swal({
  title: 'Submit email to run ajax request',
  input: 'email',
  showCancelButton: true,
  confirmButtonText: 'Submit',
  showLoaderOnConfirm: true,
  preConfirm: function (email) {
    return new Promise(function (resolve, reject) {
      setTimeout(function() {
        if (email === 'taken@example.com') {
          reject('This email is already taken.')
        } else {
          resolve()
        }
      }, 2000)
    })
  },
  allowOutsideClick: false
}).then(function (email) {
  swal({
    type: 'success',
    title: 'Ajax request finished!',
    html: 'Submitted email: ' + email
  })
})
	
	*/
	
	swal({
  		title: 'Introduce tu email',
  		input: 'email',
  		showCancelButton: true,
  		confirmButtonText: 'Enviar',
  		showLoaderOnConfirm: true,
  		preConfirm: function (email) {
    		return new Promise(function (resolve, reject) {
				// ajax
					$.ajax({ 
		
						type:"POST",
						url:"compra/aviso_stock.php",
						data:{"id_producto":id_producto,"email":email},
						
						success:function(resp){
							
							setTimeout(function() {
						
								if(resp=="fracaso"){
								
									reject('Este email ya existe en nuestra base de datos para este producto.')
								
								} else {
									resolve()
								}
							}, 2000)
							
						}

					});
				// ajax
				
    		})
  		},
  		allowOutsideClick: false
	}).then(function (email) {
  		swal({
    		type: 'success',
    		title: 'Email añadido con exito!',
    		html: 'Email añadido: ' + email
  		})
	})
	
}

//----------------------- stock ---------------------------//

function volar(){
	
	$("#a").effect('transfer', { to: $('#b') }, 500,animacion);
	
	
}

function animacion(){
	
					
	$.ajax({
					
		url:"compra/animacion.php",
	
			success:function(respuesta){
				
				if(respuesta=="animacion1"){
				
					$("#cantidad_de_productos").addClass("numero_carrito lento bounceInDown");
					setTimeout(parar,4000);
					
				
				}
				
				if(respuesta=="animacion2"){
					
					$("#cantidad_de_productos").addClass("numero_carrito lento swing");
				
				}
				
			}
				
	});
				
	cantidad_producto();
	
}

function parar(){
	
	$("#cantidad_de_productos").removeClass("lento bounceInDown");

}



function cantidad_producto(){
	
	var cantidad_producto=document.formu_compra.cantidad_producto.value;
	$.ajax({
					
		type:"POST",
		url:"compra/cantidad_de_productos.php",
		data:{"cantidad_producto":cantidad_producto},
	
			success:function(respuesta){
				
				$("#cantidad_de_productos").html(respuesta);
				
			}
				
	});
	
	aniadir_productos();

}


function aniadir_productos(){
	
	var nombre_producto=document.formu_compra.nombre_producto.value;
	var precio_producto=document.formu_compra.precio_producto.value;
	var cantidad_producto=document.formu_compra.cantidad_producto.value;
	// stock
	var id_producto=document.formu_compra.id_producto.value;
	// stock
	// descargable
	var descargable=document.formu_compra.descargable.value;
	// descargable

	$("#b").effect("bounce",900);
	document.getElementById('player').play();
	
	$.ajax({
					
		type:"POST",
		url:"compra/mostrar_compra.php",
		data:{"nombre_producto":nombre_producto,"precio_producto":precio_producto,"cantidad_producto":cantidad_producto,"id_producto":id_producto,"descargable":descargable},
			
		success:function(respuesta){
				
			$("#mostrar_compra").html(respuesta);
			$("#mostrar_compra").show("fast");
			
		}
			
	});
				
	//$("#mostrar_compra").load("compra/mostrar_compra.php");

	
	
}

$(function(){
     
     	$.ajax({
			
			url:"compra/mostrar_compra.php",
			
			success:function(respuesta){
				
				$("#mostrar_compra").html(respuesta);
				$("#mostrar_compra").show("fast");
			
			
			}
			
			
		});
		
     
	 
});


function eliminar_producto(indice){
	
		
		$.ajax({
			
			url:"compra/eliminar.php",
			data:{"indice":indice},
			
			beforeSend:function(){
				
				$("#n"+indice).show("fast");
				
				
			},

			
			
			success:function(respuesta){
				
				//$("#mostrar_compra").load("compra/mostrar_compra.php");
				
				$.ajax({
			
					url:"compra/mostrar_compra.php",
					
			
					success:function(respuesta){
						
						
						$("#mostrar_compra").html(respuesta);
						$("#mostrar_compra").show("fast");
						$("#cantidad_de_productos").load("compra/cantidad_de_productos2.php");
						
					}			
				});		
			
			}
			
			
		});
	
	
	
	}



