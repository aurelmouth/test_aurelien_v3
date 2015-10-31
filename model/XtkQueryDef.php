<?php
class XtkQueryDef
{
	private $wsdl = '';

	public function __construct()
	{
		// chemin vers mon wsdl de la session contenant la méthode Logon
		// à adapter avec votre fichier wsdl
		$this->wsdl = 'wsdl/xtkquerydef.wsdl';
	}
	
	private function createSoapClient($header)
	{
		$client = new SoapClient($this->wsdl, array(
			'trace'         => TRUE, // pour rendre possible l'affichage du xml soap généré
			'exceptions'    => TRUE,
			'stream_context' => stream_context_create(
				array(
					'http' => array(
						'header' => $header,
					)
				)
			),
		));
		return $client;
	}
	
	public function ExecuteQuery($header, $sessionToken)
	{
		$client = $this->createSoapClient($header);
		try {
			$res = $client->__soapCall('ExecuteQuery', array(
				'parameters' => array(
					'sessiontoken'  => $sessionToken,
					'entity'		=> new SoapVar('<entity xsi:type=\'ns:Element\' SOAP-ENV:encodingStyle=\'http://xml.apache.org/xml-soap/literalxml\'><queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef" lineCount="15"><select><node expr="@id"/><node expr="@email"/><node expr="@lastName"/><node expr="@firstName"/></select></queryDef></entity>', XSD_ANYXML)
				)
			));
		} catch (SoapFault $e) {
			var_dump($e->getMessage());
		}

		$dom = new DomDocument();
		$dom->loadXML($client->__getLastResponse());
		return $dom->getElementsByTagName('recipient');
	}
	
	public function ExecuteQueryByRequest($header, $sessionToken, $requete)
	{
		$client = $this->createSoapClient($header);
		try {
			$res = $client->__soapCall('ExecuteQuery', array(
				'parameters' => array(
					'sessiontoken'  => $sessionToken,
					'entity'		=> new SoapVar('<entity xsi:type=\'ns:Element\' SOAP-ENV:encodingStyle=\'http://xml.apache.org/xml-soap/literalxml\'>'.$requete.'</entity>', XSD_ANYXML)
				)
			));
		} catch (SoapFault $e) {
			var_dump($e->getMessage());
		}

		$dom = new DomDocument();
		$dom->loadXML($client->__getLastResponse());
		return $dom;
	}
}