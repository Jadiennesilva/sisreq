

$(document).ready(function(e) {
	$("#insert_form_tipo_usuario").on('submit', function(e) {
		e.preventDefault();
        $('#modalAddTipoUsuario').modal('hide');
        
		var dados = jQuery( this ).serialize();
        
		jQuery.ajax({
            type: "POST",
            url: "index.php?ajax=tipo_usuario",
            data: dados,
            success: function( data )
            {
            

            	if(data.split(":")[1] == 'sucesso'){
            		
            		$("#botao-modal-resposta").click(function(){
            			window.location.href='?page=tipo_usuario';
            		});
            		$("#textoModalResposta").text("Tipo Usuario enviado com sucesso! ");                	
            		$("#modalResposta").modal("show");
            		
            	}
            	else
            	{
            		
                	$("#textoModalResposta").text("Falha ao inserir Tipo Usuario, fale com o suporte. ");                	
            		$("#modalResposta").modal("show");
            	}

            }
        });
		
		
	});
	
	
});
   
