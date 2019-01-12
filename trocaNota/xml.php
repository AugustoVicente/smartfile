<?php
#versao do encoding xml
$dom = new DOMDocument("1.0", "ISO-8859-1");

#retirar os espacos em branco
$dom->preserveWhiteSpace = false;

#gerar o codigo
$dom->formatOutput = true;

#criando o nó principal (root)
$ProductReportDetail = $dom->createElement("ProductReportDetail");

#nó filho (contato)
$WagonInformation = $dom->createElement("WagonInformation");
$WaybillInformation = $dom->createElement("WaybillInformation");
$ClientInformation = $dom->createElement("ClientInformation");
$ClassificationDate = $dom->createElement("ClassificationDate",">2017-01-30T17:55:09");
$WeightInformation = $dom->createElement("WeightInformation");
$Destiny = $dom->createElement("Destiny","Londrina");
$ClassifierInformation = $dom->createElement("ClassifierInformation");
$ProductInformation = $dom->createElement("ProductInformation");
#nó neto
$WagonCode = $dom->createElement("WagonCode");

$WaybillInvoiceKey = $dom->createElement("WaybillInvoiceKey");


$NameClient = $dom->createElement("Name");
$IdentificationClient = $dom->createElement("Identification");


$ValueWeigth = $dom->createElement("Value");
$UnitOfMeasureWeigth = $dom->createElement("UnitOfMeasure");


$NameClassifier = $dom->createElement("Name");
$IdentificationClassifier = $dom->createElement("Identification");

$TypeProduct = $dom->createElement("Type");
$IdentificationProduct = $dom->createElement("Identification");
$DescriptionProduct = $dom->createElement("Description");
$Classifications = $dom->createElement("Classifications");
$Classification = $dom->createElement("Classification");
$ItemClassification = $dom->createElement("Item");
$ValueClassification = $dom->createElement("Value");


/*-------------------Valores-----------------------------*/
$idLaudo   =$_REQUEST['idLaudo'];
include'../ClassPHP/Laudo.php';
$ClasseLaudo = new Laudo();
include '../ClassPHP/dateParse.php';
$dt          = new DateConverter();
$idLaudo    =$_REQUEST['idLaudo'];
$laudo      =$ClasseLaudo->BuscarLaudo($idLaudo);

/*       Informações do laudo*/
$tipoTransporte = $laudo->tipoTransporte;
$idTransporte   = $laudo->idTransporte;
$Dt             = $laudo->data;
$data           = $dt->getDateFromDate($Dt);
$notafiscal     = $laudo->nota_fiscal;
$cliente        = $laudo->cliente;
$acao           = $laudo->tipo_acao;
$os             = $laudo->numeroOs;
$cidade         = $laudo->cidade;
$furos          = $laudo->furos;
$lacres         = $laudo->lacres;
$responsavel    = $laudo->nome;
$Produto        = $laudo->nomeProduto;
/*----------------------------------------------------*/

#setanto nomes e atributos dos elementos xml (nós)
$WagonCode = $dom->createElement("WagonCode", "061651");
 
$WaybillInvoiceKey = $dom->createElement("WaybillInvoiceKey", $notafiscal);


$NameClient = $dom->createElement("NameClient", $cliente);
$IdentificationClient = $dom->createElement("IdentificationClient","50.420.,/0001-98");

$ValueWeigth = $dom->createElement("ValueWeigth", "2");
$UnitOfMeasureWeigth = $dom->createElement("UnitOfMeasureWeigth", "TON");

$NameClassifier = $dom->createElement("NameClassifier", "Bruno");
$IdentificationClassifier = $dom->createElement("IdentificationClassifier", "646.770.150-07");

$TypeProduct = $dom->createElement("TypeProduct", "EMB");
$IdentificationProduct = $dom->createElement("IdentificationProduct", "3");
$DescriptionProduct = $dom->createElement("DescriptionProduct", "Transgenico");

$ItemClassification = $dom->createElement("ItemClassification", "1");
$ValueClassification = $dom->createElement("ValueClassification", "13");
#adiciona os nós (informacaoes do contato) em contato
$WagonInformation->appendChild($WagonCode);
$WaybillInformation->appendChild($WaybillInvoiceKey);
$ClientInformation->appendChild($NameClient);
$ClientInformation->appendChild($IdentificationClient);
$WeightInformation->appendChild($ValueWeigth);
$WeightInformation->appendChild($UnitOfMeasureWeigth);
$ClassifierInformation->appendChild($NameClassifier);
$ClassifierInformation->appendChild($IdentificationClassifier);
$Classifications->appendChild($Classification);
$Classification->appendChild($ItemClassification);
$Classification->appendChild($ValueClassification);
$ProductInformation->appendChild($TypeProduct);
$ProductInformation->appendChild($IdentificationProduct);
$ProductInformation->appendChild($DescriptionProduct);
$ProductInformation->appendChild($Classifications);







#adiciona o nó contato em (root) agenda
$ProductReportDetail->appendChild($WagonInformation);
$ProductReportDetail->appendChild($WaybillInformation);
$ProductReportDetail->appendChild($ClientInformation);
$ProductReportDetail->appendChild($WeightInformation);
$ProductReportDetail->appendChild($ClassifierInformation);
$ProductReportDetail->appendChild($ProductInformation);
$dom->appendChild($ProductReportDetail);

# Para salvar o arquivo, descomente a linha
$dom->save("laudo.xml");

#cabeçalho da página
header("Content-Type: text/xml");
# imprime o xml na tela
print $dom->saveXML();
?>