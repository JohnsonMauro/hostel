@extends('layouts.app')

@section('content')
	
<form method="post" target="pagseguro"  
action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
          
        <!-- Campos obrigatórios -->  
        <input name="receiverEmail" type="hidden" value="suporte@lojamodelo.com.br">  
        <input name="currency" type="hidden" value="BRL">  
  
        <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
        <input name="itemId1" type="hidden" value="0001">  
        <input name="itemDescription1" type="hidden" value="Notebook Prata">  
        <input name="itemAmount1" type="hidden" value="24300.00">  
        <input name="itemQuantity1" type="hidden" value="1">  
        <input name="itemWeight1" type="hidden" value="1000">  
        <input name="itemId2" type="hidden" value="0002">  
        <input name="itemDescription2" type="hidden" value="Notebook Rosa">  
        <input name="itemAmount2" type="hidden" value="25600.00">  
        <input name="itemQuantity2" type="hidden" value="2">  
        <input name="itemWeight2" type="hidden" value="750">  
  
        <!-- Código de referência do pagamento no seu sistema (opcional) -->  
        <input name="reference" type="hidden" value="REF1234">  
          
        <!-- Informações de frete (opcionais) -->  
        <input name="shippingType" type="hidden" value="1">  
        <input name="shippingAddressPostalCode" type="hidden" value="01452002">  
        <input name="shippingAddressStreet" type="hidden" value="Av. Brig. Faria Lima">  
        <input name="shippingAddressNumber" type="hidden" value="1384">  
        <input name="shippingAddressComplement" type="hidden" value="5o andar">  
        <input name="shippingAddressDistrict" type="hidden" value="Jardim Paulistano">  
        <input name="shippingAddressCity" type="hidden" value="Sao Paulo">  
        <input name="shippingAddressState" type="hidden" value="SP">  
        <input name="shippingAddressCountry" type="hidden" value="BRA">  
  
        <!-- Dados do comprador (opcionais) -->  
        <input name="senderName" type="hidden" value="José Comprador">  
        <input name="senderAreaCode" type="hidden" value="11">  
        <input name="senderPhone" type="hidden" value="56273440">  
        <input name="senderEmail" type="hidden" value="comprador@uol.com.br">  
  
        <!-- submit do form (obrigatório) -->  
        <input alt="Pague com PagSeguro" name="submit"  type="image"  
src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"/>  
          
</form> 	
	
@endsection