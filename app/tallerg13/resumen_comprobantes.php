<?php 

	$carpetaxml = "xml/";
	$carpetacdr = "cdr/";

	$emisor = array(
			"tipo_documento" => 6,
			"ruc"	=> "20607599727",
			"razon_social" => "INSTITUTO INTERNACIONAL DE SOFTWARE S.A.C.",
			"nombre_comercial" => "ACADEMIA DE SOFTWARE",
			"departamento" => "LAMBAYEQUE",
			"provincia" => "CHICLAYO",
			"distrito" => "CHICLAYO",
			"direccion" => "CALLE OCHO DE OCTUBRE 123",
			"ubigeo" => "140101",
			"usuario_emisor" => "MODDATOS",
			"clave_emisor" => "MODDATOS"
			);

	$cabecera = array(
				"tipo_comprobante" => "RC",
				"fecha_referencia" => date("Y-m-d"), // fecha de los comprobantes
				"fecha_envio"		=> date("Y-m-d"), // fecha que se envia el resumen
				"serie"				=> date("Ymd"), // basada en fecha de envio
				"correlativo"		=> 10
				);

	$nombrexml = $emisor['ruc']."-".$cabecera['tipo_comprobante']."-".$cabecera['serie']."-".$cabecera['correlativo'];

	$doc = new DOMDocument();
	$doc->formatOutput = FALSE;
	$doc->preserveWhiteSpace = TRUE;
	$doc->encoding = 'utf-8';

	$xml = '<?xml version="1.0" encoding="iso-8859-1" standalone="no"?>
<SummaryDocuments xmlns="urn:sunat:names:specification:ubl:peru:schema:xsd:SummaryDocuments-1" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2" xmlns:sac="urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1" xmlns:qdt="urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2" xmlns:udt="urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2">
        <ext:UBLExtensions>
            <ext:UBLExtension>
                            <ext:ExtensionContent/>
            </ext:UBLExtension>
        </ext:UBLExtensions>
        <cbc:UBLVersionID>2.0</cbc:UBLVersionID>
        <cbc:CustomizationID>1.1</cbc:CustomizationID>
        <cbc:ID>'.$cabecera['tipo_comprobante'].'-'.$cabecera['serie'].'-'.$cabecera['correlativo'].'</cbc:ID>
        <cbc:ReferenceDate>'.$cabecera['fecha_referencia'].'</cbc:ReferenceDate>
        <cbc:IssueDate>'.$cabecera['fecha_envio'].'</cbc:IssueDate>
        <cac:Signature>
            <cbc:ID>'.$cabecera['tipo_comprobante'].'-'.$cabecera['serie'].'-'.$cabecera['correlativo'].'</cbc:ID>
            <cac:SignatoryParty>
                <cac:PartyIdentification>
                    <cbc:ID>'.$emisor['ruc'].'</cbc:ID>
                </cac:PartyIdentification>
                <cac:PartyName>
                    <cbc:Name><![CDATA['.$emisor['razon_social'].']]></cbc:Name>
                </cac:PartyName>
            </cac:SignatoryParty>
            <cac:DigitalSignatureAttachment>
                <cac:ExternalReference>
                    <cbc:URI>'.$cabecera['tipo_comprobante'].'-'.$cabecera['serie'].'-'.$cabecera['correlativo'].'</cbc:URI>
                </cac:ExternalReference>
            </cac:DigitalSignatureAttachment>
        </cac:Signature>
        <cac:AccountingSupplierParty>
            <cbc:CustomerAssignedAccountID>'.$emisor['ruc'].'</cbc:CustomerAssignedAccountID>
            <cbc:AdditionalAccountID>6</cbc:AdditionalAccountID>
            <cac:Party>
                <cac:PartyLegalEntity>
                    <cbc:RegistrationName><![CDATA['.$emisor['razon_social'].']]></cbc:RegistrationName>
                </cac:PartyLegalEntity>
            </cac:Party>
        </cac:AccountingSupplierParty>
        <sac:SummaryDocumentsLine>
            <cbc:LineID>1</cbc:LineID>
            <cbc:DocumentTypeCode>03</cbc:DocumentTypeCode>
            <cbc:ID>B001-10225</cbc:ID><cac:Status>
                <cbc:ConditionCode>1</cbc:ConditionCode>
            </cac:Status>                
            <sac:TotalAmount currencyID="PEN">45.00</sac:TotalAmount><sac:BillingPayment>
		                <cbc:PaidAmount currencyID="PEN">38.14</cbc:PaidAmount>
		                <cbc:InstructionID>01</cbc:InstructionID>
		            </sac:BillingPayment><cac:TaxTotal>
                <cbc:TaxAmount currencyID="PEN">6.86</cbc:TaxAmount>
                <cac:TaxSubtotal>
                    <cbc:TaxAmount currencyID="PEN">6.86</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cac:TaxScheme>
                            <cbc:ID>1000</cbc:ID>
                            <cbc:Name>IGV</cbc:Name>
                            <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                        </cac:TaxScheme>
                    </cac:TaxCategory>
                </cac:TaxSubtotal>
            </cac:TaxTotal>
        </sac:SummaryDocumentsLine>
		<sac:SummaryDocumentsLine>
            <cbc:LineID>2</cbc:LineID>
            <cbc:DocumentTypeCode>03</cbc:DocumentTypeCode>
            <cbc:ID>B001-10226</cbc:ID><cac:Status>
                <cbc:ConditionCode>1</cbc:ConditionCode>
            </cac:Status>                
            <sac:TotalAmount currencyID="PEN">45.00</sac:TotalAmount><sac:BillingPayment>
		                <cbc:PaidAmount currencyID="PEN">38.14</cbc:PaidAmount>
		                <cbc:InstructionID>01</cbc:InstructionID>
		            </sac:BillingPayment><cac:TaxTotal>
                <cbc:TaxAmount currencyID="PEN">6.86</cbc:TaxAmount>
                <cac:TaxSubtotal>
                    <cbc:TaxAmount currencyID="PEN">6.86</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cac:TaxScheme>
                            <cbc:ID>1000</cbc:ID>
                            <cbc:Name>IGV</cbc:Name>
                            <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                        </cac:TaxScheme>
                    </cac:TaxCategory>
                </cac:TaxSubtotal>
            </cac:TaxTotal>
        </sac:SummaryDocumentsLine>        
    </SummaryDocuments>
';

	$doc->loadXML($xml);
	$doc->save($carpetaxml.$nombrexml.'.XML');

//PASO 02
//FIRMAR EL XML
require_once("signature.php");
$objSignature = new Signature();

$flg_firma = "0";
$ruta = $carpetaxml.$nombrexml.'.XML';

$ruta_certificado = "certificado_prueba.pfx";
$pass_certificado = "institutoisi";

$resp = $objSignature->signature_xml($flg_firma, $ruta, $ruta_certificado, $pass_certificado);

print_r($resp);
echo '<br/>';
//PASO 03
$zip = new ZipArchive();
$nombrezip = $nombrexml.".ZIP";
$rutazip = $carpetaxml.$nombrezip;

if($zip->open($rutazip,ZIPARCHIVE::CREATE)===true){
	$zip->addFile($carpetaxml.$nombrexml.'.XML', $nombrexml.'.XML');
	$zip->close();
}

//PASO 04
//PREPARAR EL ENVÍO DEL XML
$contenido_del_zip = base64_encode(file_get_contents($rutazip));
$xml_envio ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
        xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://service.sunat.gob.pe" 
        xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
     <soapenv:Header>
            <wsse:Security>
                <wsse:UsernameToken>
                    <wsse:Username>'.$emisor['ruc'].$emisor['usuario_emisor'].'</wsse:Username>
	<wsse:Password>'.$emisor['clave_emisor'].'</wsse:Password>
                </wsse:UsernameToken>
           </wsse:Security>
 </soapenv:Header>
 <soapenv:Body>
	<ser:sendSummary>
		<fileName>'.$nombrezip.'</fileName>
		<contentFile>'.$contenido_del_zip.'</contentFile>
	</ser:sendSummary>
 </soapenv:Body>
</soapenv:Envelope>';	


//PASO 05
//ENVÍO DEL CPE A WS DE SUNAT

$ws = "https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService";
$header = array(
			"Content-type: text/xml; charset=\"utf-8\"",
			"Accept: text/xml",
			"Cache-Control: no-cache",
			"Pragma: no-cache",
			"SOAPAction: ",
			"Content-lenght: ".strlen($xml_envio)
		);

$ch = curl_init();
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
curl_setopt($ch,CURLOPT_URL,$ws);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
curl_setopt($ch,CURLOPT_TIMEOUT,30);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$xml_envio);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
//curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem");
$response = curl_exec($ch);


//PASO 06 
// OBTENEMOS EL TICKET
$ticket = "";
$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
if($httpcode == 200){
	$doc = new DOMDocument();
	$doc->loadXML($response);
		if(isset($doc->getElementsByTagName('ticket')->item(0)->nodeValue)){
			$ticket = $doc->getElementsByTagName('ticket')->item(0)->nodeValue;
			echo "TODO OK - TICKET: ".$ticket.'<br/>';
		}else{		
			$codigo = $doc->getElementsByTagName("faultcode")->item(0)->nodeValue;
			$mensaje = $doc->getElementsByTagName("faultstring")->item(0)->nodeValue;
			echo "error ".$codigo.": ".$mensaje.'<br/>'; 
		}
}else{
		echo curl_error($ch);
		echo "Problema de conexión";
}
curl_close($ch);
//----------------------------------------------------------

//PASO 07
//CONSULTAMOS EL TICKET

$xml_envio ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
        xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://service.sunat.gob.pe" 
        xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
     <soapenv:Header>
            <wsse:Security>
                <wsse:UsernameToken>
                    <wsse:Username>'.$emisor['ruc'].$emisor['usuario_emisor'].'</wsse:Username>
	<wsse:Password>'.$emisor['clave_emisor'].'</wsse:Password>
                </wsse:UsernameToken>
           </wsse:Security>
 </soapenv:Header>
 <soapenv:Body>
	<ser:getStatus>
		<ticket>'.$ticket.'</ticket>
	</ser:getStatus>
 </soapenv:Body>
</soapenv:Envelope>';	

$ws = "https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService";
$header = array(
			"Content-type: text/xml; charset=\"utf-8\"",
			"Accept: text/xml",
			"Cache-Control: no-cache",
			"Pragma: no-cache",
			"SOAPAction: ",
			"Content-lenght: ".strlen($xml_envio)
		);

$ch = curl_init();
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
curl_setopt($ch,CURLOPT_URL,$ws);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
curl_setopt($ch,CURLOPT_TIMEOUT,30);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$xml_envio);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
//curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem");
$response = curl_exec($ch);

$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
if($httpcode == 200){
	$doc = new DOMDocument();
	$doc->loadXML($response);
		if(isset($doc->getElementsByTagName('content')->item(0)->nodeValue)){
			$cdr = $doc->getElementsByTagName('content')->item(0)->nodeValue;
			$cdr = base64_decode($cdr);			
			file_put_contents($carpetacdr."R-".$nombrezip, $cdr);
			$zip = new ZipArchive;
			if($zip->open($carpetacdr."R-".$nombrezip)===true){
				$zip->extractTo($carpetacdr.'R-'.$nombrexml);
				$zip->close();
			}
			echo "RESUMEN CONSULTADO CORRECTAMENTE </br>";


		 $docCDR = new DOMDocument();
         $cdrContent = file_get_contents($carpetacdr.'R-'.$nombrexml.'/'.'R-'.$nombrexml.'.XML');
         $docCDR->loadXML($cdrContent);

         $responseCode = $docCDR->getElementsByTagName("ResponseCode")->item(0)->nodeValue;

         if($responseCode==0){
            echo "RESUMEN APROBADO";   
         }else{
            echo "RESUMEN RECHAZADO CON CODIGO DE ERROR:".$responseCode;
         }

         echo "<br/>";
         echo $docCDR->getElementsByTagName("Description")->item(0)->nodeValue;

		}else{		
			$codigo = $doc->getElementsByTagName("faultcode")->item(0)->nodeValue;
			$mensaje = $doc->getElementsByTagName("faultstring")->item(0)->nodeValue;
			echo "error ".$codigo.": ".$mensaje; 
		}

}else{
		echo curl_error($ch);
		echo "Problema de conexión";
}
curl_close($ch);
?>