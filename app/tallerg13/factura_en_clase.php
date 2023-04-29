<?php
    //01 - CREAR XML
    $carpetaxml = "xml/";
    $carpetacdr = "cdr/";

    $empresa = array(
                    "ruc" => "20607599727",
                    "razon_social" => "INSTITUTO INTERNACIONAL DE SOFTWARE S.A.C.",
                    "usuario_emisor" => "MODDATOS",
                    "clave_emisor"  => "MODDATOS"
                );

    $comprobante = array(
                    "tipo"  => "01", //factura
                    "serie" => "F001",
                    "correlativo"   => 123            
            );

    $nombrexml = $empresa['ruc']."-".$comprobante["tipo"]."-".$comprobante['serie']."-".$comprobante['correlativo'];

	$doc = new DOMDocument();
	$doc->formatOutput = FALSE;
	$doc->preserveWhiteSpace = TRUE;
	$doc->encoding = 'utf-8';

	$xml = '<?xml version="1.0" encoding="utf-8"?>
    <Invoice xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ccts="urn:un:unece:uncefact:documentation:2" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2" xmlns:qdt="urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2" xmlns:udt="urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2">
        <ext:UBLExtensions>
            <ext:UBLExtension>
                <ext:ExtensionContent/>
            </ext:UBLExtension>
        </ext:UBLExtensions>
        <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
        <cbc:CustomizationID schemeAgencyName="PE:SUNAT">2.0</cbc:CustomizationID>
        <cbc:ProfileID schemeName="Tipo de Operacion" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo17">0101</cbc:ProfileID>
        <cbc:ID>'.$comprobante['serie'].'-'.$comprobante['correlativo'].'</cbc:ID>
        <cbc:IssueDate>2021-08-07</cbc:IssueDate>
        <cbc:IssueTime>00:00:00</cbc:IssueTime>
        <cbc:DueDate>2021-08-07</cbc:DueDate>
        <cbc:InvoiceTypeCode listAgencyName="PE:SUNAT" listName="Tipo de Documento" listURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo01" listID="0101" name="Tipo de Operacion">01</cbc:InvoiceTypeCode>
        <cbc:DocumentCurrencyCode listID="ISO 4217 Alpha" listName="Currency" listAgencyName="United Nations Economic Commission for Europe">PEN</cbc:DocumentCurrencyCode>
                <cbc:LineCountNumeric>7</cbc:LineCountNumeric>
        <cac:Signature>
            <cbc:ID>'.$comprobante['serie'].'-'.$comprobante['correlativo'].'</cbc:ID>
            <cac:SignatoryParty>
                <cac:PartyIdentification>
                    <cbc:ID>'.$empresa['ruc'].'</cbc:ID>
                </cac:PartyIdentification>
                <cac:PartyName>
                    <cbc:Name><![CDATA['.$empresa['razon_social'].']]></cbc:Name>
                </cac:PartyName>
            </cac:SignatoryParty>
            <cac:DigitalSignatureAttachment>
                <cac:ExternalReference>
                    <cbc:URI>#SignatureSP</cbc:URI>
                </cac:ExternalReference>
            </cac:DigitalSignatureAttachment>
        </cac:Signature>
        <cac:AccountingSupplierParty>
            <cac:Party>
                <cac:PartyIdentification>
                    <cbc:ID schemeID="6" schemeName="Documento de Identidad" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">20607599727</cbc:ID>
                </cac:PartyIdentification>
                <cac:PartyName>
                    <cbc:Name><![CDATA[INSTITUTO INTERNACIONAL DE SOFTWARE S.A.C.]]></cbc:Name>
                </cac:PartyName>
                <cac:PartyTaxScheme>
                    <cbc:RegistrationName><![CDATA[INSTITUTO INTERNACIONAL DE SOFTWARE S.A.C.]]></cbc:RegistrationName>
                    <cbc:CompanyID schemeID="6" schemeName="SUNAT:Identificador de Documento de Identidad" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">20607599727</cbc:CompanyID>
                    <cac:TaxScheme>
                        <cbc:ID schemeID="6" schemeName="SUNAT:Identificador de Documento de Identidad" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">20607599727</cbc:ID>
                    </cac:TaxScheme>
                </cac:PartyTaxScheme>
                <cac:PartyLegalEntity>
                    <cbc:RegistrationName><![CDATA[INSTITUTO INTERNACIONAL DE SOFTWARE S.A.C.]]></cbc:RegistrationName>
                    <cac:RegistrationAddress>
                        <cbc:ID schemeName="Ubigeos" schemeAgencyName="PE:INEI">140101</cbc:ID>
                        <cbc:AddressTypeCode listAgencyName="PE:SUNAT" listName="Establecimientos anexos">0000</cbc:AddressTypeCode>
                        <cbc:CityName><![CDATA[LAMBAYEQUE]]></cbc:CityName>
                        <cbc:CountrySubentity><![CDATA[LAMBAYEQUE]]></cbc:CountrySubentity>
                        <cbc:District><![CDATA[LAMBAYEQUE]]></cbc:District>
                        <cac:AddressLine>
                            <cbc:Line><![CDATA[8 DE OCTUBRE N 123 - LAMBAYEQUE - LAMBAYEQUE - LAMBAYEQUE]]></cbc:Line>
                        </cac:AddressLine>
                        <cac:Country>
                            <cbc:IdentificationCode listID="ISO 3166-1" listAgencyName="United Nations Economic Commission for Europe" listName="Country">PE</cbc:IdentificationCode>
                        </cac:Country>
                    </cac:RegistrationAddress>
                </cac:PartyLegalEntity>
                <cac:Contact>
                    <cbc:Name><![CDATA[]]></cbc:Name>
                </cac:Contact>
            </cac:Party>
        </cac:AccountingSupplierParty>
        <cac:AccountingCustomerParty>
            <cac:Party>
                <cac:PartyIdentification>
                    <cbc:ID schemeID="6" schemeName="Documento de Identidad" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">20605145648</cbc:ID>
                </cac:PartyIdentification>
                <cac:PartyName>
                    <cbc:Name><![CDATA[AGROINVERSIONES Y SERVICIOS AJINOR S.R.L. - AGROSERVIS AJINOR S.R.L.]]></cbc:Name>
                </cac:PartyName>
                <cac:PartyTaxScheme>
                    <cbc:RegistrationName><![CDATA[AGROINVERSIONES Y SERVICIOS AJINOR S.R.L. - AGROSERVIS AJINOR S.R.L.]]></cbc:RegistrationName>
                    <cbc:CompanyID schemeID="6" schemeName="SUNAT:Identificador de Documento de Identidad" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">20605145648</cbc:CompanyID>
                    <cac:TaxScheme>
                        <cbc:ID schemeID="6" schemeName="SUNAT:Identificador de Documento de Identidad" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">20605145648</cbc:ID>
                    </cac:TaxScheme>
                </cac:PartyTaxScheme>
                <cac:PartyLegalEntity>
                    <cbc:RegistrationName><![CDATA[AGROINVERSIONES Y SERVICIOS AJINOR S.R.L. - AGROSERVIS AJINOR S.R.L.]]></cbc:RegistrationName>
                    <cac:RegistrationAddress>
                        <cbc:ID schemeName="Ubigeos" schemeAgencyName="PE:INEI"/>
                        <cbc:CityName><![CDATA[]]></cbc:CityName>
                        <cbc:CountrySubentity><![CDATA[]]></cbc:CountrySubentity>
                        <cbc:District><![CDATA[]]></cbc:District>
                        <cac:AddressLine>
                            <cbc:Line><![CDATA[MZA. C LOTE. 46 URB. SAN ISIDRO LA LIBERTAD - TRUJILLO - TRUJILLO]]></cbc:Line>
                        </cac:AddressLine>                                        
                        <cac:Country>
                            <cbc:IdentificationCode listID="ISO 3166-1" listAgencyName="United Nations Economic Commission for Europe" listName="Country"/>
                        </cac:Country>
                    </cac:RegistrationAddress>
                </cac:PartyLegalEntity>
            </cac:Party>
        </cac:AccountingCustomerParty>
        <cac:PaymentTerms>
          <cbc:ID>FormaPago</cbc:ID>
          <cbc:PaymentMeansID>Contado</cbc:PaymentMeansID>
       </cac:PaymentTerms>	
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID="PEN">28.22</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID="PEN">156.78</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID="PEN">28.22</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:ID schemeID="UN/ECE 5305" schemeName="Tax Category Identifier" schemeAgencyName="United Nations Economic Commission for Europe">S</cbc:ID>
                    <cac:TaxScheme>
                        <cbc:ID schemeID="UN/ECE 5153" schemeAgencyID="6">1000</cbc:ID>
                        <cbc:Name>IGV</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>			
        </cac:TaxTotal>
        <cac:LegalMonetaryTotal>
            <cbc:LineExtensionAmount currencyID="PEN">156.78</cbc:LineExtensionAmount>
            <cbc:TaxInclusiveAmount currencyID="PEN">185.00</cbc:TaxInclusiveAmount>
            <cbc:PayableAmount currencyID="PEN">185.00</cbc:PayableAmount>
        </cac:LegalMonetaryTotal>
        <cac:InvoiceLine>
            <cbc:ID>1</cbc:ID>
            <cbc:InvoicedQuantity unitCode="NIU" unitCodeListID="UN/ECE rec 20" unitCodeListAgencyName="United Nations Economic Commission for Europe">1</cbc:InvoicedQuantity>
            <cbc:LineExtensionAmount currencyID="PEN">156.78</cbc:LineExtensionAmount>
            <cac:PricingReference>
                <cac:AlternativeConditionPrice>
                    <cbc:PriceAmount currencyID="PEN">185.00</cbc:PriceAmount>
                    <cbc:PriceTypeCode listName="Tipo de Precio" listAgencyName="PE:SUNAT" listURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo16">01</cbc:PriceTypeCode>
                </cac:AlternativeConditionPrice>
            </cac:PricingReference>
            <cac:TaxTotal>
                <cbc:TaxAmount currencyID="PEN">28.22</cbc:TaxAmount>
                <cac:TaxSubtotal>
                    <cbc:TaxableAmount currencyID="PEN">156.78</cbc:TaxableAmount>
                    <cbc:TaxAmount currencyID="PEN">28.22</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cbc:ID schemeID="UN/ECE 5305" schemeName="Tax Category Identifier" schemeAgencyName="United Nations Economic Commission for Europe">S</cbc:ID>
                        <cbc:Percent>18</cbc:Percent>
                        <cbc:TaxExemptionReasonCode listAgencyName="PE:SUNAT" listName="Afectacion del IGV" listURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo07">10</cbc:TaxExemptionReasonCode>
                        <cac:TaxScheme>
                            <cbc:ID schemeID="UN/ECE 5153" schemeName="Codigo de tributos" schemeAgencyName="PE:SUNAT">1000</cbc:ID>
                            <cbc:Name>IGV</cbc:Name>
                            <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                        </cac:TaxScheme>
                    </cac:TaxCategory>
                </cac:TaxSubtotal></cac:TaxTotal>
            <cac:Item>
                <cbc:Description><![CDATA[FENA X L]]></cbc:Description>
                <cac:SellersItemIdentification>
                    <cbc:ID><![CDATA[195]]></cbc:ID>
                </cac:SellersItemIdentification>
                <cac:CommodityClassification>
                    <cbc:ItemClassificationCode listID="UNSPSC" listAgencyName="GS1 US" listName="Item Classification">10191509</cbc:ItemClassificationCode>
                </cac:CommodityClassification>
            </cac:Item>
            <cac:Price>
                <cbc:PriceAmount currencyID="PEN">156.78</cbc:PriceAmount>
            </cac:Price>
        </cac:InvoiceLine>
    </Invoice>';

	$doc->loadXML($xml);
	$doc->save($carpetaxml.$nombrexml.'.XML');
    echo "XML ".$nombrexml.".XML GENERADO";


    // 02 - FIRMAR EL XML
require_once("signature.php");
$objSignature = new Signature();

$flg_firma = "0";
$rutaxml = $carpetaxml.$nombrexml.'.XML';

$ruta_firma = "certificado_prueba.pfx";
$pass_firma = "institutoisi";

$resp = $objSignature->signature_xml($flg_firma, $rutaxml, $ruta_firma, $pass_firma);

echo "<br/> XML FIRMADO";

//03 - ZIP DE XML

$zip = new ZipArchive();

$nombrezip = $nombrexml.".ZIP";
$rutazip = $carpetaxml.$nombrexml.".ZIP";

if($zip->open($rutazip,ZIPARCHIVE::CREATE)===true){
	$zip->addFile($rutaxml, $nombrexml.'.XML');
	$zip->close();
}

echo "<br/> ZIP GENERADO";

//04 - PREPARAMOS MENSAJE DE ENVIO

$contenido_del_zip = base64_encode(file_get_contents($rutazip));
$xml_envio ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
        xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://service.sunat.gob.pe" 
        xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
     <soapenv:Header>
            <wsse:Security>
                <wsse:UsernameToken>
                    <wsse:Username>'.$empresa['ruc'].$empresa['usuario_emisor'].'</wsse:Username>
	<wsse:Password>'.$empresa['clave_emisor'].'</wsse:Password>
                </wsse:UsernameToken>
           </wsse:Security>
 </soapenv:Header>
 <soapenv:Body>
	<ser:sendBill>
		<fileName>'.$nombrezip.'</fileName>
		<contentFile>'.$contenido_del_zip.'</contentFile>
	</ser:sendBill>
 </soapenv:Body>
</soapenv:Envelope>';

// 05 - NOS COMUNICAMOS CON LOS SERVICIOS DE SUNAT

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

// 06 - OBTENEMOS RESPUESTA DE SUNAT

$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
if($httpcode == 200){
	$doc = new DOMDocument();
	$doc->loadXML($response);
		if(isset($doc->getElementsByTagName('applicationResponse')->item(0)->nodeValue)){
			$cdr = $doc->getElementsByTagName('applicationResponse')->item(0)->nodeValue;
			$cdr = base64_decode($cdr);			
			file_put_contents($carpetacdr."R-".$nombrezip, $cdr);
			$zip = new ZipArchive;
			if($zip->open($carpetacdr."R-".$nombrezip)===true){
				$zip->extractTo($carpetacdr.'R-'.$nombrexml);
				$zip->close();
			}

            //LEEMOS EL CDR
            $rutacdr = $carpetacdr.'R-'.$nombrexml."/R-".$nombrexml.".XML";
            $cdr_contenido = file_get_contents($rutacdr);
            $doc_cdr = new DOMDocument();
            $doc_cdr->loadXML($cdr_contenido);

            $fecha_respuesta = $doc_cdr->getElementsByTagName("ResponseDate")->item(0)->nodeValue;
            echo "<br/><b>Fecha: ".$fecha_respuesta."</b>";

			echo "<br/>FACTURA ENVIADA CORRECTAMENTE";

            $codigo = $mensaje_sunat = $doc_cdr->getElementsByTagName("DocumentResponse")->item(0)->getElementsByTagName("ResponseCode")->item(0)->nodeValue;
		
            if($codigo==0){
                echo "<br/><B>FACTURA APROBADA</B>";
            }else{
                echo "<br/><B>FACTURA RECHAZADA</B>";
            }

            $mensaje_sunat = $doc_cdr->getElementsByTagName("DocumentResponse")->item(0)->getElementsByTagName("Description")->item(0)->nodeValue;
            echo "<br/><b>".$mensaje_sunat."</b>";

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
