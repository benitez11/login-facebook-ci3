   
      <!-- contenido-->
      <div class="row">
        <div class="col-md-12">
            <?php 
            	// echo "<pre>";
            	// print_r($usuarios);
            	// echo "</pre>";
             ?>

             <div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-paper-plane font-yellow-casablanca"></i>
						<span class="caption-subject bold font-yellow-casablanca uppercase">
						Admin </span> <span class="caption-helper">Usuarios</span>
					</div>	
					<div class="actions">								
						<a class="btn btn-circle red-sunglo " href="javascript:void(0);" onclick="usuarios.showAddUserioModal()">
						<i class="fa fa-plus "></i> Nuevo Usuario </a>						
						<a class="btn btn-circle btn-default btn-icon-only fullscreen" href="javascript:;" data-original-title="" title=""></a>
					</div>					
				</div>
		<!-- breadcrumb-->
				  <ul class="page-breadcrumb breadcrumb">
			        <li>
			          <a href="<?php echo site_url() ?>">Home</a>
			          <i class="fa fa-circle"></i>
			        </li>
			        <li>
			          <a href="<?php echo site_url("usuarios/index") ?>">Admin</a>
			          <i class="fa fa-circle"></i>
			        </li>
			        <li>
			          <a href="#">Usuarios</a>
			        </li>
			      </ul>
		<!-- fin  breadcrumb-->
				<div class="portlet-body">

             	  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped users-table" id="users-list" width="100%">
				      <thead>
				       <th>Id</th>
				      <th>Nombre</th>
				      <th>Apellido</th>				      
				      <th>Correo</th>	   
				      <th>Rol</th>
				      <th>Registrado</th>				      
				      <th>Opciones</th>
				      </thead>
				      <?php 
				      foreach ($usuarios as $user): ?>	        
				          <tr class="user-row">
				          	  <td><?php echo $user->usuario_id; ?></td>
				              <td><?php echo $user->nombre; ?></td>
				              <td><?php echo $user->apellidos; ?></td>				              
				              <td><?php echo $user->email; ?></td>	
				              <td><?php echo $user->rol; ?></td>	
				              <td><?php echo $user->fecha_registro; ?></td>					             
				              <td><div class="btn-group">
									<a data-toggle="dropdown" href="javascript:;" class="btn btn-md red" aria-expanded="false">
									<i class="fa fa-user"></i> User <i class="fa fa-angle-down "></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:void(0);"
			                                 onclick="usuarios.editUser(<?php echo $user->usuario_id; ?>);">
			                                 <i class="fa fa-pencil"></i>
			                                  Editar
			                              </a>											
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-trash-o"></i> Delete </a>
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-ban"></i> Ban </a>
										</li>
										<li class="divider">
										</li>										
									</ul>
								</div>				          	
				              </td>
				          </tr>
				      <?php endforeach; ?>
				  </table>
				</div>
			</div>

	<!-- *******************modal ****************** -->

		<div class="modal" id="modal-add-edit-user" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">		
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel"><strong>Agregar Usuario</strong></h4>
		      </div>
		      <div class="modal-body">
		      <?php //echo form_open(site_url("admin/add_member_pro"), array("class" => "form-horizontal")) ?>
		       <form class="form-horizontal" id="form_add_usuario_">
		            <div class="control-group form-group">
		                    <label for="email-in" class="control-label col-md-3 label-heading" for="email">Email</label>
		                    <div class="controls col-lg-9">
		                    	<input type="hidden" id="usuarioId" />
		                        <input type="email" class="form-control" id="email" name="email">
		                    </div>
		            </div>

		            <div class="control-group form-group">
		                    <label for="selectRol-in" class="control-label col-md-3 label-heading" for="selectRol">Rol</label>
		                    <div class="controls col-lg-9">		                    	
		                         <select name="selectRol" id="selectRol" class="form-control">
		                              <option value="">Selecciona un Rol...</option>
		                              <?php foreach ($catRol as $rol): ?>
		                                  <option value="<?php echo $rol->rol_id; ?>" ><?php echo $rol->rol; ?></option>
		                              <?php endforeach; ?>
		                          </select>
		                    </div>
		            </div>


		            <div class="control-group form-group">
		                        <label for="password-in" class="control-label col-md-3 label-heading">Password</label>
		                        <div class="controls col-lg-9">
		                            <input type="password" class="form-control" id="password" name="password" value="">
		                        </div>
		                </div>
		                <div class="control-group form-group">
		                        <label for="cpassword-in" class="control-label col-md-3 label-heading">Confirmar Password</label>
		                        <div class="controls col-lg-9">
		                            <input type="password" class="form-control" id="cpassword" name="cpassword" value="">
		                        </div>
		                </div>
		                <div class="control-group form-group">
		                        <label for="name-in" class="control-label col-md-3 label-heading">Nombre(s)</label>
		                        <div class="controls col-lg-9">
		                            <input type="text" class="form-control" id="nombres" name="nombres">
		                        </div>
		                </div>
		                <div class="control-group form-group">
		                        <label for="name-in" class="control-label col-md-3 label-heading">Apellido</label>
		                        <div class="controls col-lg-9">
		                            <input type="text" class="form-control" id="last_name" name="last_name">
		                        </div>
		                </div>		             

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        <a href="javascript:void(0);" id="btn-add-user" class="btn btn-primary"> Agregar </a>
		      </form>
		      </div>
		    </div>
		  </div>
		</div>

<!-- fin de modal -->

        </div> <!--Fin de md 12 -->
      </div>  <!-- fin de row-->

      <script type="text/javascript">
    
		jQuery(document).ready(function() {  
		    var table = $('#users-list').DataTable(
		    	{
				    "order": [ 0, 'desc' ]
				}		    	
		    	)	  
		  } ); // fin de ready

	var usuarios = {};

	usuarios.addEdit = {  		
		email         : $("#email"),	    
		selectRol     : $("#selectRol"),
	    password      : $("#password"),
	    cpassword     : $("#cpassword"),	    
	    nombres       : $("#nombres"),
	    paterno       : $("#last_name"),		    
    	button        : $("#btn-add-user")
	};

	usuarios.showAddUserioModal = function () {
		$("#modal-add-edit-user").modal({
		    keyboard: false,
		    backdrop: "static",
		    show: true
		});

		//$("#myModalLabel").text('Agregar Usuario');   
		utilerias.removeErrorMessages(); 
		$("#form_add_usuario input[type='text'], #form_add_usuario input[type='password']").each(function () {
		    $(this).val('');
		});
		usuarios.addEdit.button.attr('onclick', 'usuarios.addUser();');
	};


		//Agregar
		usuarios.addUser = function (editMode) {			
		    var data  = usuarios.addEdit;
		    var modal = $("#modal-add-edit-user");
		    var btn   = $("#btn-add-user");
		    var action = "addUsuario";
		    var userId = 0;

		    if ( editMode )
		        var forUpdate = true;
		    else
		        var forUpdate = false;

		    if ( usuarios.validaDatosUsuario(data, forUpdate) ) {
		       
		        if ( editMode === true ) {
		            action = "updateUsuario";
		            userId = $("#usuarioId").val();
		        }
		        
		        var forServer = { 
		            action : action,
		            userId : userId,
		            userData: {
		                email      : data.email.val(),		                
		                password   : data.password.val(),
		                cpassword  : data.cpassword.val(),
		                nombres    : data.nombres.val(),		                		                
		                paterno    : data.paterno.val(),
		                selectRol  : data.selectRol.val()
		            },
		            fieldId: {
		                email      : "email",		                
		                password   : "password",          
		                cpassword  : "cpassword",          		                
		                nombres    : "nombres",
		                paterno    : "paterno",
		                selectRol  : "selectRol"		                
		            }
		        };            

		         $.ajax({                    
                    type: "POST",
                    url: "<?php echo site_url("usuarios/nuevoUsuario/"); ?>",
                    dataType: "json",
                     data: forServer,
                     success: function(response) {                                                  
                          if (response.status == true) {  
                          	location.reload();                                                      
                          } else {
				               for(var i=0; i<response.errors.length; i++) {
		                        var error = response.errors[i];
		                        utilerias.displayErrorMessage($("#"+error.id), error.msg);
		                    }
		                  }
                        },
                        error: function(response) {
                            $('#submit-success').hide();
                            $('#submit-error').html('<?php echo "Hubo en error en la petición"; ?>').show();
                        }
                });

		      
		    }
		};


		usuarios.updateUsuario = function () {
		usuarios.addUser(true);
		};

		usuarios.editUser = function (userId) {
		$("#usuarioId").val(userId);

		var modal = $("#modal-add-edit-user"),
		    data  = usuarios.addEdit,
		    modalTitle = modal.find(".modal-title"),
		    modalBody  = modal.find(".modal-body");		    

		data.button.attr('onclick', 'usuarios.updateUsuario();');

		utilerias.removeErrorMessages();

		modal.modal('show');
		modalTitle.text('Cargando');
		modalBody.hide();		

		$.ajax({
		    type: "POST",
		    url: "<?php echo site_url("usuarios/getUsuariobyId/"); ?>",
		    data: {  userId : userId },
		      dataType: "json",
		    success : function (result) {
		        		      
				//alert(result[0].email);
		        data.email.val( result[0].email );
		        data.selectRol.val( result[0].rol_id );            
		       
		        data.nombres.val( result[0].nombre );
		        data.paterno.val( result[0].apellidos );		        
		        
		        data.password.attr('placeholder', 'Deje en blanco si no desea cambiarlo');
		        data.cpassword.attr('placeholder', 'Deje en blanco si no desea cambiarlo');

		        data.button.text('Actualizar');
		        
		        modalTitle.text( result[0].email );
		        modalBody.show();
		    }
		});
		};


	usuarios.validaDatosUsuario = function (data, forUpdate)
		{
	    var valid = true;	  
	    utilerias.removeErrorMessages();

	    if ( $.trim( data.email.val() ) == "" ) {
	        valid = false;
	        utilerias.displayErrorMessage( data.email, 'Requerido' );
	    }	  	  
	    
	    if ( $.trim( data.selectRol.val() ) == "" ) {
	        valid = false;
	        utilerias.displayErrorMessage( data.selectRol, 'Requerido' );
	    }
	    
	    if ( forUpdate === true )
	    {
	        if ( data.password.val().length > 0 && data.password.val().length < 3 ) {
	            valid = false;
	            utilerias.displayErrorMessage( data.password, 'Error en password' );
	        }

	        if ( data.password.val() != data.cpassword.val() ) {
	            valid = false;
	            utilerias.displayErrorMessage( data.password );
	            utilerias.displayErrorMessage( data.cpassword, 'No coinciden los password' );
	        }
	    }
	    else
	    {
	        if ( $.trim( data.password.val() ) == "" ) {
	            valid = false;
	            utilerias.displayErrorMessage( data.password, 'Error en password'  );
	        }
	        else if ( data.password.val().length < 3 ) {
	            valid = false;
	            utilerias.displayErrorMessage( data.password, 'Debe ser mayor a 3' );
	        }

	        if ( $.trim( data.cpassword.val() ) == "" ) {
	            valid = false;
	            utilerias.displayErrorMessage( data.cpassword, 'Requerido' );
	        }

	        if ( data.password.val() != data.cpassword.val() ) {
	            valid = false;
	            utilerias.displayErrorMessage( data.password );
	            utilerias.displayErrorMessage( data.cpassword, 'No coinciden los password'  );
	        }
	    }

	    return valid;
	};
		</script>

      <!-- fin de contenido-->