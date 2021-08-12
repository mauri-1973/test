$(document).ready(function(){
	
	busqueda("bit", $('#year').val());
		
	});
	let myChart;
	function busqueda(val, inicio)
	{
		https://mindicador.cl/api/uf/01-01-2021/12-08-2021
		$.ajax({
			type:'POST',
			url: $("#oculto").val()+'/Home/busqueda',
			data:{
			  tipo:val,
			  ini:inicio
			},
			DataType:"json",
			success:function(datos){
				var valores = JSON.parse(datos)
				console.log(valores.datos.tipo, valores.datos.tipo);
				var ctx = document.getElementById('myChart1').getContext('2d');
				if (myChart) {
					myChart.destroy();
				}
				myChart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: valores.datos.fecha.reverse(),
						datasets: [{
							label: valores.datos.tipo,
							data: valores.datos.valor.reverse(),
							borderWidth: 4
						}]
					},
					options: {
						animation: {
							duration: 0, // general animation time
						},
						hover: {
							animationDuration: 0, // duration of animations when hovering an item
						},
						indexAxis: 'x',
							scales: {
							y: {
								beginAtZero: true
							}
						},
						responsiveAnimationDuration: 0, // animation duration after a resize
					}
					
				});
			  
			}
		  });
	}
	function iniciarbusb()
	{
        busqueda($( "#busq" ).val(), $( "#year" ).val());
	}