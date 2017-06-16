<?php

namespace hostel\Services\PagSeguro;

class PagSeguroService implements IPagSeguroService
{

	protected $email;
  protected $token;
  protected $http;
  protected $respostaPagSeguro;
  protected $curl;

	public function __construct()
	{
		$this->email = "matheus.lubarino1@gmail.com";
		$this->token = "46DCB972D4E04E6183C09675C3DAC219";
	}

	public function send()
	{
		 $this->curl = curl_init($this->getURL());
     curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->getRequestData());
     $this->respostaPagSeguro = curl_exec($this->curl);
     $this->http = curl_getinfo($this->curl);		
     $this->createLog();
     $this->respostaPagSeguro = simplexml_load_string($this->respostaPagSeguro);
     return $this->respostaPagSeguro->code;
	}

	public function getURL() 
	{
		return "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/?email=" .$this->email ."&token=".$this->token;
	}

	public function getRequestData()
	{
		$dadosCompra['currency'] = "BRL";
    $dadosCompra['itemId1'] = "0001";
    $dadosCompra['itemDescription1'] = "Notebook Prata";
    $dadosCompra['itemAmount1'] = "243.00";
    $dadosCompra['itemQuantity1'] = "1";
    $dadosCompra['itemWeight1'] = "320";
    $dadosCompra = http_build_query($dadosCompra);

    return $dadosCompra;
	}

	public function createLog()
	{
		$http = $this->http;

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
            fwrite($arquivo,"Erro:".$this->respostaPagSeguro." \\\\r\\\\n");
            fwrite($arquivo,"Esta mensagem de erro é ocasionada quando as credenciais (e-mail e token) da chamada estão erradas.\\\\r\\\\n");
        
        }else{
            curl_close($this->curl);
            $this->respostaPagSeguro= simplexml_load_string($this->respostaPagSeguro);

            foreach ($this->respostaPagSeguro->error as $key => $erro) {
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
	}

}