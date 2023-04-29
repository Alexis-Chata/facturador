<?php

   $carpetaxml = "xml/";
   $carpetacdr = "cdr/";

   $emisor = array(
            "tipo_documento" => 6,
            "ruc" => "20607599727",
            "razon_social" => "INSTITUTO INTERNACIONAL DE SOFTWARE S.A.C.",
            "nombre_comercial" => "ACADEMIA DE SOFTWARE",
            "departamento" => "LAMBAYEQUE",
            "provincia" => "CHICLAYO",
            "distrito" => "CHICLAYO",
            "direccion" => "CALLE OCHO DE OCTUBRE 123",
            "ubigeo" => "140101",
            "usuario_sol" => "MODDATOS",
            "clave_sol" => "MODDATOS"
            );

   $cliente = array(
            "tipo_documento" => "6",
            "ruc" => "20605145648",
            "razon_social" => "AGROINVERSIONES Y SERVICIOS AJINOR S.R.L. - AGROSERVIS AJINOR S.R.L.",
            "direccion" => "MZA. C LOTE. 46 URB. SAN ISIDRO LA LIBERTAD - TRUJILLO - TRUJILLO"
            );

   $cabecera = array(
            "tipo_comprobante" => "07",
            "moneda"          => "PEN",
            "serie"           => "FN01",
            "correlativo"     => 1313,
            "total_op_gravadas" => 0,
            "igv"          => 0,
            "icbper"       => 0,
            "total_op_exoneradas"=> 0.00,
            "total_op_inafectas" => 0.00,
            "total_antes_impuestos" => 0.0,
            "total_impuestos"    => 0.00,
            "total_despues_impuestos"=> 0.00,
            "total_a_pagar"      =>0.00,
            "fecha_emision"      =>"2022-02-21",
            "hora_emision"    =>"19:43:00",
            "forma_pago"      => "Credito",
            "monto_credito"   => 200.00,
            "codigo_motivo"   => "13",
            "descripcion_motivo"=>"MODIFICACION DE CUOTAS",
            "tipo_comp_ref"   => "01",
            "serie_comp_ref"  => "F001",
            "correlativo_comp_ref"  => 111
            );

   $cuotas = array();

   $cuotas[] = array(
            "numero"    => "001",
            "importe"   => 70.00,
            "vencimiento"=> "2022-09-30"
         );

   $cuotas[] = array(
            "numero"    => "002",
            "importe"   => 130.00,
            "vencimiento"=> "2022-10-30"
         );


   $items =array();

   $items[] = array(
            "item"   => 1,
            "cantidad"   => 1,
            "unidad"   => "NIU",
            "nombre" => "MODIFICACION DE CUOTAS",
            "valor_unitario" => 0.00,
            "precio_lista" => 0.00,
            "valor_total" => 0.00,
            "igv"  => 0.00,
            "icbper"  => 0.00,
            "factor_icbper"   => 0.0,
            "total_antes_impuestos" => 0.00,
            "total_impuestos" => 0.00,
            "codigos" => array("S","10","1000","IGV","VAT")
            );



   $nombrexml = $emisor['ruc']."-".$cabecera['tipo_comprobante']."-".$cabecera['serie']."-".$cabecera['correlativo'];


   $doc = new DOMDocument();
   $doc->formatOutput = FALSE;
   $doc->preserveWhiteSpace = TRUE;
   $doc->encoding = 'utf-8';

   $xml = '<?xml version="1.0" encoding="UTF-8"?>
<CreditNote xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ccts="urn:un:unece:uncefact:documentation:2" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2" xmlns:qdt="urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2" xmlns:sac="urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1" xmlns:udt="urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>2.0</cbc:CustomizationID>
    <cbc:ID>'.$cabecera['serie'].'-'.$cabecera['correlativo'].'</cbc:ID>
    <cbc:IssueDate>'.$cabecera['fecha_emision'].'</cbc:IssueDate>
    <cbc:IssueTime>00:00:00</cbc:IssueTime>
    <cbc:DocumentCurrencyCode>'.$cabecera['moneda'].'</cbc:DocumentCurrencyCode>
    <cac:DiscrepancyResponse>
        <cbc:ReferenceID>'.$cabecera['serie_comp_ref'].'-'.$cabecera['correlativo_comp_ref'].'</cbc:ReferenceID>
        <cbc:ResponseCode>'.$cabecera['codigo_motivo'].'</cbc:ResponseCode>
        <cbc:Description><![CDATA['.$cabecera['descripcion_motivo'].']]></cbc:Description>
    </cac:DiscrepancyResponse>
    <cac:BillingReference>
        <cac:InvoiceDocumentReference>
            <cbc:ID>'.$cabecera['serie_comp_ref'].'-'.$cabecera['correlativo_comp_ref'].'</cbc:ID>
            <cbc:DocumentTypeCode>'.$cabecera['tipo_comp_ref'].'</cbc:DocumentTypeCode>
        </cac:InvoiceDocumentReference>
    </cac:BillingReference>
    <cac:Signature>
        <cbc:ID>IDSignST</cbc:ID>
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
                <cbc:URI>#SignatureSP</cbc:URI>
            </cac:ExternalReference>
        </cac:DigitalSignatureAttachment>
    </cac:Signature>
    <cac:AccountingSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID="6" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">'.$emisor['ruc'].'</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA['.$emisor['razon_social'].']]></cbc:Name>
            </cac:PartyName>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA['.$emisor['razon_social'].']]></cbc:RegistrationName>
                <cac:RegistrationAddress>
                    <cbc:AddressTypeCode>0001</cbc:AddressTypeCode>
                </cac:RegistrationAddress>
            </cac:PartyLegalEntity>
        </cac:Party>
    </cac:AccountingSupplierParty>
    <cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID="6" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">10165277189</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
<cbc:RegistrationName><![CDATA[JUAN PEREZ]]></cbc:RegistrationName>
            </cac:PartyLegalEntity>
        </cac:Party>
    </cac:AccountingCustomerParty>';

   $xml.='<cac:PaymentTerms>
      <cbc:ID>FormaPago</cbc:ID>
      <cbc:PaymentMeansID>'.$cabecera['forma_pago'].'</cbc:PaymentMeansID>
      <cbc:Amount currencyID="PEN">'.$cabecera['monto_credito'].'</cbc:Amount>
   </cac:PaymentTerms>';

   foreach ($cuotas as $k => $v) {
      $xml.='<cac:PaymentTerms>
                  <cbc:ID>FormaPago</cbc:ID>
                  <cbc:PaymentMeansID>Cuota'.$v['numero'].'</cbc:PaymentMeansID>
                  <cbc:Amount currencyID="PEN">'.$v['importe'].'</cbc:Amount>
                  <cbc:PaymentDueDate>'.$v['vencimiento'].'</cbc:PaymentDueDate>
            </cac:PaymentTerms>
            ';
   }


    $xml.='<cac:TaxTotal>
        <cbc:TaxAmount currencyID="PEN">'.$cabecera['total_impuestos'].'</cbc:TaxAmount>
        <cac:TaxSubtotal>
    <cbc:TaxableAmount currencyID="PEN">'.$cabecera["total_op_gravadas"].'</cbc:TaxableAmount>
    <cbc:TaxAmount currencyID="PEN">'.$cabecera["igv"].'</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID schemeID="UN/ECE 5153" schemeAgencyID="6">1000</cbc:ID>
                    <cbc:Name>IGV</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
    </cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:PayableAmount currencyID="PEN">'.$cabecera['total_a_pagar'].'</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>';

    foreach($items as $k=>$v){
    $xml.='<cac:CreditNoteLine>
        <cbc:ID>1</cbc:ID>
        <cbc:CreditedQuantity unitCode="NIU">1</cbc:CreditedQuantity>
        <cbc:LineExtensionAmount currencyID="PEN">'.$v['total_antes_impuestos'].'</cbc:LineExtensionAmount>
        <cac:PricingReference>
            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID="PEN">'.$v['precio_lista'].'</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
        </cac:PricingReference>
        <cac:TaxTotal><cbc:TaxAmount currencyID="PEN">'.$v['total_impuestos'].'</cbc:TaxAmount>
            <cac:TaxSubtotal>
   <cbc:TaxableAmount currencyID="PEN">'.$v['valor_total'].'</cbc:TaxableAmount>
   <cbc:TaxAmount currencyID="PEN">'.$v['igv'].'</cbc:TaxAmount>
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
            <cbc:Description><![CDATA['.$v['nombre'].']]></cbc:Description>
            <cac:SellersItemIdentification>
                <cbc:ID><![CDATA[9]]></cbc:ID>
            </cac:SellersItemIdentification></cac:Item>
            <cac:Price>
            <cbc:PriceAmount currencyID="PEN">'.$v['valor_unitario'].'</cbc:PriceAmount>
        </cac:Price>
    </cac:CreditNoteLine>';
    }
$xml.='</CreditNote>';

   $doc->loadXML($xml);
   $doc->save($carpetaxml.$nombrexml.'.XML');


//PASO 02
//FIRMAR EL XML
require_once("signature.php");
$objSignature = new Signature();

$flg_firma = "0";
$ruta = $carpetaxml.$nombrexml.'.XML';

$ruta_firma = "certificado_prueba.pfx";
$pass_firma = "institutoisi";

$resp = $objSignature->signature_xml($flg_firma, $ruta, $ruta_firma, $pass_firma);

print_r($resp);

//PASO 03
$zip = new ZipArchive();
$nombrezip = $nombrexml.".ZIP";
$rutazip = $carpetaxml.$nombrexml.".ZIP";

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
                    <wsse:Username>'.$emisor['ruc'].$emisor['usuario_sol'].'</wsse:Username>
   <wsse:Password>'.$emisor['clave_sol'].'</wsse:Password>
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
// OBTENEMOS RESPUESTA (CDR)
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

         $docCDR = new DOMDocument();
         $cdrContent = file_get_contents($carpetacdr.'R-'.$nombrexml.'/'.'R-'.$nombrexml.'.XML');
         $docCDR->loadXML($cdrContent);

         $responseCode = $docCDR->getElementsByTagName("ResponseCode")->item(0)->nodeValue;

         if($responseCode==0){
            echo "NOTA DE CREDITO APROBADA";
         }else{
            echo "NOTA DE CREDITO RECHAZADA CON CODIGO DE ERROR:".$responseCode;
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
