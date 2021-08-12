<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('graficos');
	}
	public function uf()
	{
		return view('uf');
	}
	public function busqueda()
	{
		/* GET PARAMETERS */
		  if ( $this->request->getPost('tipo')!==null){
			$tipo= $this->request->getPost('tipo'); 
		  } else {
			$retorno= json_encode(array("estado" => "error"));
		  }
	  
		  if ($tipo =="bit"){
			$apiUrl = 'https://mindicador.cl/api/bitcoin/'.$this->request->getPost('ini');
			
		  }
		  if ($tipo =="utm"){
			$apiUrl = 'https://mindicador.cl/api/utm/'.$this->request->getPost('ini');
			
		  }
		  if ($tipo =="dol"){
			$apiUrl = 'https://mindicador.cl/api/dolar/'.$this->request->getPost('ini');
			
		  }
		  if ($tipo =="eu"){
			$apiUrl = 'https://mindicador.cl/api/euro/'.$this->request->getPost('ini');
			
		  }
		  if ($tipo =="ipc"){
			$apiUrl = 'https://mindicador.cl/api/ipc/'.$this->request->getPost('ini');
			
		  }
		  if ($tipo =="uf"){
			$apiUrl = 'https://mindicador.cl/api/uf/2021';
			
		  }
		//Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
		if ( ini_get('allow_url_fopen') ) {
			$json = file_get_contents($apiUrl);
		} else {
			//De otra forma utilizamos cURL
			$curl = curl_init($apiUrl);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$json = curl_exec($curl);
			curl_close($curl);
		}
		$dailyIndicators = json_decode($json);
		if ($dailyIndicators != "")
		{
			if($tipo != "uf")
			{
				$fecha = [];
				$valor = [];
				foreach ($dailyIndicators->serie as $key) {
					$fecha[] = date("d-m-Y", strtotime($key->fecha));
					if ($tipo != "ipc"){
						$valor[] = (int)$key->valor;
					}
					else
					{
						$valor[] = $key->valor;
					}
				}
				$retorno= json_encode(array("estado" => "ok", "datos" => array("fecha" => $fecha, "valor" => $valor, "tipo" =>$dailyIndicators->nombre ) ));
			}
			else
			{
                $html = "";
				$cont = 1;
				$val = 0;
				foreach ($dailyIndicators->serie as $key) {
					if($cont == 1)
					{
					    $val = 	date("d-m-Y", strtotime($key->fecha));
					}
					$html .= "<tr id=".$cont."><td>".$cont."</td><td id='fecha".$cont."'>".date("d-m-Y", strtotime($key->fecha))."</td><td id='valor".$cont."'>".number_format((int)$key->valor, 0, ",", ".")."</td><td><button type='button' class='btn btn-primary btn-sm' onclick='editar(".$cont.",\"".date("d-m-Y", strtotime($key->fecha))."\", \"".number_format((int)$key->valor, 0, ",", ".")."\")'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='eliminar(".$cont.")'><i class='fa fa-trash' aria-hidden='true'></i></button>
					</td></tr>";
					$cont++;
				}
				$retorno= json_encode(array("estado" => "ok", "datos" => array("html" => $html, "maxfecha" => $val) ));
			}
			
		}
		else
		{
			$retorno= json_encode(array("estado" => "error"));
		}
		
		
		echo $retorno;
	}
}
