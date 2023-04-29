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
            "usuario_emisor" => "MODDATOS",
            "clave_emisor" => "MODDATOS",
            "id" => "test-85e5b0ae-255c-4891-a595-0b98c65c9854",
            "clave" => "test-Hty/M6QshYvPgItX2P0+Kw=="
            );

   $cliente = array(
            "tipo_documento" => "6",
            "ruc" => "20605145648",
            "razon_social" => "AGROINVERSIONES Y SERVICIOS AJINOR S.R.L. - AGROSERVIS AJINOR S.R.L.",
            "direccion" => "MZA. C LOTE. 46 URB. SAN ISIDRO LA LIBERTAD - TRUJILLO - TRUJILLO"
            );

   $cabecera = array(
            "tipo_comprobante" => "09",
            "serie"           => "T001",
            "correlativo"     => 989,
            "fecha_emision"   => date("Y-m-d"),
            "fecha_envio"     => date("Y-m-d"),
            "codigo_motivo_traslado" => "01",
            "motivo_traslado"        => "VENTA",
            "unidad_peso"            => "KGM",
            "peso"                   => 5500,
            "modo_transporte"        => "01", // 01 publico - 02 privado
            "transportista_tipo_doc" => "6", //6->RUC
            "transportista_nro_doc"  => "20602323454",
            "transportista_nombre"   => "EL VIAJERO SAC",
            "vehiculo_placa"         => "M1X328",
            "conductor_tipo_doc"     => "1",
            "conductor_nro_doc"      => "12345678",
            "conductor_nombres"      => "JOSE",
            "conductor_apellidos"    => "PEREZ",
            "conductor_licencia"     => "C12345678",
            "partida_ubigeo"         => "140101",
            "partida_direccion"      => "MI ORIGEN 123 - LAMBAYEQUE",
            "destino_ubigeo"         => "140103",
            "destino_direccion"      => "MI DESTINO 456 - MORROPE"
            );

   $items =array();
   
   $items[] = array(
            "item"   => 1,
            "codigo"   => 11,
            "cantidad"   => 1,
            "unidad"   => "NIU",
            "nombre" => "MOCHILA"
            );

   $items[] = array(
            "item"   => 2,
            "codigo"   => 22,
            "cantidad"   => 2,
            "unidad"   => "NIU",
            "nombre" => "LIBRO COQUITO"
            );


   $items[] = array(
            "item"   => 3,
            "codigo"   => 33,
            "cantidad"   => 3,
            "unidad"   => "NIU",
            "nombre" => "MANZANA"
            );

   $nombrexml = $emisor['ruc']."-".$cabecera['tipo_comprobante']."-".$cabecera['serie']."-".$cabecera['correlativo'];


   $doc = new DOMDocument();
   $doc->formatOutput = FALSE;
   $doc->preserveWhiteSpace = TRUE;
   $doc->encoding = 'utf-8';

   $xml = '<?xml version="1.0" encoding="utf-8"?>
   <DespatchAdvice xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:qdt="urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2" xmlns:ccts="urn:un:unece:uncefact:documentation:2" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:udt="urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:sac="urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1" xmlns="urn:oasis:names:specification:ubl:schema:xsd:DespatchAdvice-2">
           <ext:UBLExtensions>
               <ext:UBLExtension>
                   <ext:ExtensionContent/>
               </ext:UBLExtension>
           </ext:UBLExtensions>
           <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
           <cbc:CustomizationID>2.0</cbc:CustomizationID>
       <cbc:ID>'.$cabecera['serie'].'-'.$cabecera['correlativo'].'</cbc:ID>
       <cbc:IssueDate>'.$cabecera['fecha_emision'].'</cbc:IssueDate>
       <cbc:IssueTime>10:10:10</cbc:IssueTime>
       <cbc:DespatchAdviceTypeCode>'.$cabecera['tipo_comprobante'].'</cbc:DespatchAdviceTypeCode>
       <cbc:Note>--</cbc:Note>
      <cac:Signature>
         <cbc:ID>'.$cabecera['serie'].'-'.$cabecera['correlativo'].'</cbc:ID>
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
               <cbc:URI>#'.$cabecera['serie'].'-'.$cabecera['correlativo'].'</cbc:URI>
            </cac:ExternalReference>
         </cac:DigitalSignatureAttachment>
      </cac:Signature>    
       <cac:DespatchSupplierParty>
               <cac:Party>
               <cac:PartyIdentification>
               <cbc:ID schemeID="'.$emisor['tipo_documento'].'" schemeName="Documento de Identidad" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">'.$emisor['ruc'].'</cbc:ID>
            </cac:PartyIdentification>                 
                   <cac:PartyLegalEntity>
       <cbc:RegistrationName><![CDATA['.$emisor['razon_social'].']]></cbc:RegistrationName>
                   </cac:PartyLegalEntity>
               </cac:Party>
           </cac:DespatchSupplierParty>       
       <cac:DeliveryCustomerParty>
               <cac:Party>
            <cac:PartyIdentification>
               <cbc:ID schemeID="'.$cliente['tipo_documento'].'" schemeName="Documento de Identidad" schemeAgencyName="PE:SUNAT" schemeURI="urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo06">'.$cliente['ruc'].'</cbc:ID>
            </cac:PartyIdentification>            
                   <cac:PartyLegalEntity>
       <cbc:RegistrationName><![CDATA['.$cliente['razon_social'].']]></cbc:RegistrationName>
                   </cac:PartyLegalEntity>
               </cac:Party>
           </cac:DeliveryCustomerParty>
       
       <cac:Shipment>
               <cbc:ID>1</cbc:ID>
               <cbc:HandlingCode>'.$cabecera['codigo_motivo_traslado'].'</cbc:HandlingCode>
               <cbc:GrossWeightMeasure unitCode="'.$cabecera['unidad_peso'].'">'.$cabecera['peso'].'</cbc:GrossWeightMeasure>
               <cac:ShipmentStage>
                   <cbc:TransportModeCode>'.$cabecera['modo_transporte'].'</cbc:TransportModeCode>
                   <cac:TransitPeriod>
                       <cbc:StartDate>'.$cabecera['fecha_envio'].'</cbc:StartDate>
                   </cac:TransitPeriod>';
               if($cabecera['modo_transporte']=='01'){
                  $xml.='<cac:CarrierParty>
                     <cac:PartyIdentification>
                        <cbc:ID schemeID="'.$cabecera['transportista_tipo_doc'].'">'.$cabecera['transportista_nro_doc'].'</cbc:ID>
                     </cac:PartyIdentification>
                     <cac:PartyLegalEntity>
                        <cbc:RegistrationName><![CDATA['.$cabecera['transportista_nombre'].']]></cbc:RegistrationName>
                     </cac:PartyLegalEntity>
                  </cac:CarrierParty>';
               }
               if($cabecera['modo_transporte']=='02'){
                   $xml.='<cac:DriverPerson>
                     <cbc:ID schemeID="'.$cabecera['conductor_tipo_doc'].'">'.$cabecera['conductor_nro_doc'].'</cbc:ID>
                     <cbc:FirstName><![CDATA['.$cabecera['conductor_nombres'].']]></cbc:FirstName>
                     <cbc:FamilyName>'.$cabecera['conductor_apellidos'].'</cbc:FamilyName>
                     <cbc:JobTitle>Principal</cbc:JobTitle>
                     <cac:IdentityDocumentReference>
                        <cbc:ID><![CDATA['.$cabecera['conductor_licencia'].']]></cbc:ID>
                     </cac:IdentityDocumentReference>
                  </cac:DriverPerson>';
               }
                  $xml.='</cac:ShipmentStage>
                  <cac:Delivery>
                   <cac:DeliveryAddress>
                       <cbc:ID>'.$cabecera['destino_ubigeo'].'</cbc:ID>
                       <cbc:AddressTypeCode listID="'.$cliente['ruc'].'" listAgencyName="PE:SUNAT" listName="Establecimientos anexos">0</cbc:AddressTypeCode>
                       <cac:AddressLine>
                        <cbc:Line><![CDATA['.$cabecera['destino_direccion'].']]></cbc:Line>
                     </cac:AddressLine>
                   </cac:DeliveryAddress>
                   <cac:Despatch>
                  <cac:DespatchAddress>
                     <cbc:ID schemeName="Ubigeos" schemeAgencyName="PE:INEI">'.$cabecera['partida_ubigeo'].'</cbc:ID>
                     <cbc:AddressTypeCode listID="'.$emisor['ruc'].'" listAgencyName="PE:SUNAT" listName="Establecimientos anexos">0</cbc:AddressTypeCode>
                     <cac:AddressLine>
                        <cbc:Line><![CDATA['.$cabecera['partida_direccion'].']]></cbc:Line>
                     </cac:AddressLine>
                  </cac:DespatchAddress>
               </cac:Despatch>			                
               </cac:Delivery>';
               if($cabecera['modo_transporte']=='02'){
                  $xml.='<cac:TransportHandlingUnit>
                     <cac:TransportEquipment>
                     <cbc:ID><![CDATA['.$cabecera['vehiculo_placa'].']]></cbc:ID>
                     </cac:TransportEquipment>
                  </cac:TransportHandlingUnit>';
               }
      $xml.='</cac:Shipment>';

      foreach($items as $k=>$v){
      $xml.='<cac:DespatchLine>
       <cbc:ID>'.$v['item'].'</cbc:ID>
       <cbc:DeliveredQuantity unitCode="'.$v['unidad'].'">'.$v['cantidad'].'</cbc:DeliveredQuantity>
       <cac:OrderLineReference>
       <cbc:LineID>'.$v['item'].'</cbc:LineID>
       </cac:OrderLineReference>       
       <cac:Item>
                   <cbc:Description><![CDATA['.$v['nombre'].']]></cbc:Description>
                   <cac:SellersItemIdentification>
                       <cbc:ID>'.$v['codigo'].'</cbc:ID>
                   </cac:SellersItemIdentification></cac:Item>
           </cac:DespatchLine>';
      }

      $xml.='</DespatchAdvice>';

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
$nombrezip = $nombrexml.".zip";
$rutazip = $carpetaxml.$nombrexml.".zip";

if($zip->open($rutazip,ZIPARCHIVE::CREATE)===true){
   $zip->addFile($carpetaxml.$nombrexml.'.XML', $nombrexml.'.XML');
   $zip->close();
}

///=====================================================================
///=====================================================================
//OBTENEMOS EL TOKEN

//$ws = "https://api-seguridad.sunat.gob.pe/v1/clientessol/".$emisor['id']."/oauth2/token/";
$ws = "https://gre-test.nubefact.com/v1/clientessol/".$emisor['id']."/oauth2/token/";
echo $ws;
$header = array(
         "Content-type: application/x-www-form-urlencoded"
      );

$datos_envio["grant_type"]="password";
$datos_envio["scope"]="https://api-cpe.sunat.gob.pe";
$datos_envio["client_id"]=$emisor['id'];
$datos_envio["client_secret"]=$emisor['clave'];
$datos_envio["username"]=$emisor['ruc'].$emisor['usuario_emisor'];
$datos_envio["password"]=$emisor['clave_emisor'];

$datos_envio = http_build_query($datos_envio);
echo "<br/>".$datos_envio."<br/>";
$ch = curl_init();
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
curl_setopt($ch,CURLOPT_URL,$ws);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
curl_setopt($ch,CURLOPT_TIMEOUT,30);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datos_envio);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
//curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem");
$response = curl_exec($ch);

$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);

echo "<br/>httpcode token=".$httpcode."<br/>";
var_dump($response);

$token = json_decode($response,true);
echo $token['access_token'];

curl_close($ch);

//ENVIAMOS LA GUIA

//$ws = "https://api-cpe.sunat.gob.pe/v1/contribuyente/gem/comprobantes/".$nombrexml;
$ws = "https://gre-test.nubefact.com/v1/contribuyente/gem/comprobantes/".$nombrexml;
$header = array(
         "Content-type: Application/json",
         "Accept: */*",
         "Authorization:Bearer ".$token['access_token']
      );
$contenido_del_zip = base64_encode(file_get_contents($rutazip));
$hash = hash("sha256",file_get_contents($rutazip));

$datos_envio = array();
$datos_envio["archivo"]=array(
            "nomArchivo"=>$nombrezip,
            "arcGreZip"=>$contenido_del_zip,
            "hashZip"=>$hash
    );
echo "<br/>";

$datos_envio = json_encode($datos_envio);

echo $datos_envio ;

$ch = curl_init();
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
curl_setopt($ch,CURLOPT_URL,$ws);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
curl_setopt($ch,CURLOPT_TIMEOUT,30);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datos_envio);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
//curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem");
$response = curl_exec($ch);


echo "<br/>";
$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
echo "<br/>httpcode token=".$httpcode."<br/>";

echo $response;
$numTicket = "";
if($httpcode == 200){
    $ticket_resp = json_decode($response,true);
    $numTicket = $ticket_resp['numTicket'];
}else{

}
curl_close($ch);
//sleep(2); //DE SER NECESARIO GENERAMOS A PROPÓSITO UNA 
            //ESPERA DE 2 SEGUNDOS DANDO TIEMPO A PROCESEN LA GUIA
//CONSULTAMOS EL TICKET
//$numTicket = "ced410f3-0395-45c9-9ff0-e99d729c6656";
//$ws = "https://api-cpe.sunat.gob.pe/v1/contribuyente/gem/comprobantes/envios/".$numTicket;
$ws = "https://gre-test.nubefact.com/v1/contribuyente/gem/comprobantes/envios/".$numTicket;
echo $ws."<br/>";
$header = array(
        "Content-type: Application/json",
         "Accept: */*",
         "Authorization:Bearer ".$token['access_token']
      );

$ch = curl_init();
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
curl_setopt($ch,CURLOPT_URL,$ws);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
curl_setopt($ch,CURLOPT_TIMEOUT,30);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
//curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem");
$response = curl_exec($ch);


//PASO 06 
// OBTENEMOS RESPUESTA (CDR)
echo "<br/>";
$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
echo "<br/>httpcode token=".$httpcode."<br/>";

echo $response;
if($httpcode == 200){
    $cdr_resp = json_decode($response,true);
    if(isset($cdr_resp['indCdrGenerado']) && $cdr_resp['indCdrGenerado']==1){
        $cdr = $cdr_resp['arcCdr'];
        $cdr = base64_decode($cdr);

         file_put_contents($carpetacdr."R-".$nombrezip, $cdr);
         $zip = new ZipArchive;
         if($zip->open($carpetacdr."R-".$nombrezip)===true){
            $zip->extractTo($carpetacdr.'R-'.$nombrexml);
            $zip->close();
         }
         
         $objCdrXML = new DOMDocument();
         $rutacdr = $carpetacdr.'R-'.$nombrexml.'/R-'.$nombrexml.'.XML';
         $objCdrXML->loadXML(file_get_contents($rutacdr));
         $mensaje = $objCdrXML->getElementsByTagName("Description")->item(0)->nodeValue;
         echo "<br/><b>".$mensaje."</b><br/>";
         
         //$receptor = $objCdrXML->getElementsByTagName("DocumentResponse")->item(0)->getElementsByTagName("RecipientParty")->item(0)->getElementsByTagName("ID")->item(0)->nodeValue;
         //$receptor = $objCdrXML->getElementsByTagName("ID")->item(6)->nodeValue;
         //echo "<br/><b>".$receptor."</b><br/>";

         echo "GUIA ENVIADA CORRECTAMENTE </br>";

         $responseCode = $objCdrXML->getElementsByTagName("ResponseCode")->item(0)->nodeValue;

         if($responseCode==0){
            echo "GUIA REMISION APROBADA";   
         }else{
            echo "GUIA RECHAZADA CON CODIGO DE ERROR:".$responseCode;
         }

    }
}else{
   echo "PROBLEMAS EN COMUNICACION CON WS";
}
curl_close($ch);
?>