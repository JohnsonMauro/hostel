<?php

namespace hostel\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
	public function index() {
		return view('payment.index');
	}

	public function submit() {
		$email = "matheus.lubarino1@gmail.com";
    $token = "46DCB972D4E04E6183C09675C3DAC219";
    
    //URL da chamada para o PagSeguro
    $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/?email=" .$email ."&token=".$token;
    

    //Dados da compra
    $dadosCompra['currency'] = "BRL";
    $dadosCompra['itemId1'] = "0001";
    $dadosCompra['itemDescription1'] = "Notebook Prata";
    $dadosCompra['itemAmount1'] = "243.00";
    $dadosCompra['itemQuantity1'] = "1";
    $dadosCompra['itemWeight1'] = "320";
    
    //Transformando os dados da compra no formato da URL
    $dadosCompra = http_build_query($dadosCompra);
    
    //Realizando a chamada
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $dadosCompra);
    $respostaPagSeguro = curl_exec($curl);
    $http = curl_getinfo($curl);

    if($http['http_code'] != "200"){
    //Criando um log de erro.
        $data = date("Y_m_d");
        $hora = date("H:i:s T");
        $arquivo = fopen("LogErroPagSeguro.$data.txt", "ab");
        fwrite($arquivo,"Log de erro\\\\r\\\\n");
        fwrite($arquivo,"HTTP: ".$http['http_code']." \\\\r\\\\n");
        fwrite($arquivo,"Data: ".$data." \\\\r\\\\n");
        fwrite($arquivo,"Hora: ".$hora." \\\\r\\\\n");
        if($http['http_code'] == "401"){
            echo $http['http_code'];
            fwrite($arquivo,"Erro:".$respostaPagSeguro." \\\\r\\\\n");
            fwrite($arquivo,"Esta mensagem de erro é ocasionada quando as credenciais (e-mail e token) da chamada estão erradas.\\\\r\\\\n");
        }

        else{
            curl_close($curl);
            $respostaPagSeguro= simplexml_load_string($respostaPagSeguro);

            foreach ($respostaPagSeguro->error as $key => $erro) {
            fwrite($arquivo,"-----------------------------------------------------------------------------------------------------------\\\\r\\\\n");
            fwrite($arquivo,"Código do erro: ".$erro->code." \\\\r\\\\n");
            fwrite($arquivo,"Mensagem: ".$erro->message." \\\\r\\\\n");
            fwrite($arquivo,"-----------------------------------------------------------------------------------------------------------\\\\r\\\\n");
            }
            fwrite($arquivo,"Neste caso, você precisa verificar se os dados foram passados de acordo com a documentação do PagSeguro.\\\\r\\\\n");
        }
        fwrite($arquivo,"________________________________________________________________________________________________________________ \\\\r\\\\n");
        fclose($arquivo);
    }

    $respostaPagSeguro= simplexml_load_string($respostaPagSeguro);
    
    //Caso o HTTP for 200 será criada a URL de pagamento
    

    return view('payment.success')->with('code', $respostaPagSeguro->code);
	}
}
