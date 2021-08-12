var global;
	$(document).ready(function() {
		datatables();
		
	} );
	function datatables()
	{
		$.ajax({
		  type:'POST',
		  url: $("#oculto").val()+'/Home/busqueda',
		  data:{
			tipo:"uf",
		  },
		  DataType:"json",
		  success:function(datos){
			  
			  var valores = JSON.parse(datos);
			  $('#bodyuf').html("");
			  $('#bodyuf').html(valores.datos.html);
			  global = valores.datos.maxfecha;
			  $('#example').DataTable();
			}
		});
	}
	
	function editar(id, fecha, valor)
	{
		$.confirm({
				useBootstrap: false,
				boxWidth: '35%',
				bootstrapClasses: {
					container: 'container',
					containerFluid: 'container-fluid',
					row: 'row',
				},
				title: 'Editar Registro',
				content: '<form>'+
                            '<div class="form-group">'+
                                '<label for="datepicker">Fecha</label>'+
								    '<input data-date-format="dd-mm-yyyy" class="form-control" id="datepicker" aria-describedby="Fechahelp" readonly>'+
                                    '<small id="Fechahelp" class="form-text text-muted" style="display:none">Ingrese la Fecha</small>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="valoruf">Valor</label>'+
                                    '<input type="text" maxlength="10" class="form-control" id="valoruf" value="" aria-describedby="ValorHelp">'+
									'<small id="ValorHelp" class="form-text text-muted" style="display:none">Ingrese el Valor</small>'+
                            '</div>'+
                            '</form>',
				buttons: {
					confirmar: {
						text: 'Editar',
						btnClass: 'btn-blue',
						action: function () {
							
							$("#Fechahelp").css("display","none");
							$("#ValorHelp").css("display","none"); 
							if($("#datepicker").val() == "")
							{
								$("#Fechahelp").css("display","block");
								return false;
							}
							if($("#valoruf").val() == "")
							{
								$("#ValorHelp").css("display","block");
								return false; 
							}
							else{
								console.log($("#valoruf").val().toLocaleString());
								var formatNumber = {
									separador: ".", // separador para los miles
									sepDecimal: ',', // separador para los decimales
									formatear:function (num){
									num +='';
									var splitStr = num.split('.');
									var splitLeft = splitStr[0];
									var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
									var regx = /(\d+)(\d{3})/;
									while (regx.test(splitLeft)) {
									splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
									}
									return this.simbol + splitLeft +splitRight;
									},
									new:function(num, simbol){
									this.simbol = simbol ||'';
									return this.formatear(num);
									}
								}
								$("#fecha"+id+"").html($("#datepicker").val());
								$("#valor"+id+"").html(formatNumber.new($("#valoruf").val().replace(".", "")));
								$.alert('Registro editado correctamente');
							}
						}
					},
					cancelar: {
						text: 'Cancelar',
						action: function () {
							
						}
					}
				},
				onContentReady: function () {
					$('#valoruf').keyup(function (){
						this.value = (this.value + '').replace(/[^0-9]/g, '');
					});
					$('#datepicker').datepicker({
						weekStart: 1,
						autoclose: true,
					});
					$('#datepicker').datepicker("setDate", $("#fecha"+id+"").html());
					$("#valoruf").val($("#valor"+id+"").html());
				}
				
			});
	}
	function eliminar(id)
	{
			$.confirm({
				useBootstrap: false,
				boxWidth: '35%',
				bootstrapClasses: {
					container: 'container',
					containerFluid: 'container-fluid',
					row: 'row',
				},
				title: 'Estimado Usuario',
				content: 'Está seguro de eliminar este registro?',
				buttons: {
					confirmar: {
						text: 'Eliminar',
						btnClass: 'btn-red',
						action: function () {
							$('#'+id+'').remove();
							$.alert('Registro eliminado correctamente');
						}
					},
					cancelar: {
						text: 'Cancelar',
						action: function () {
							
						}
					}
				}
			});
	}