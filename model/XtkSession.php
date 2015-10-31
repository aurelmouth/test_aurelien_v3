<?php
class XtkSession
{
	private $wsdl = '';
	private $header = '';
	private $sessionToken = '';

	public function __construct()
	{
		// chemin vers mon wsdl de la session contenant la méthode Logon
		// à adapter avec votre fichier wsdl
		$this->wsdl = 'wsdl/xtksession.wsdl';
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
	
	public function Logon($login, $password)
	{
		$client = new SoapClient($this->wsdl, array(
			'exceptions'    => TRUE,
		));

		try {
			$res = $client->__soapCall('Logon', array(
				'parameters' => array(
					'sessiontoken'    => '',
					'strLogin'        => $login,
					'strPassword'     => $password,
					'elemParameters'  => ''
				),
			));
		} catch (SoapFault $e) {
			//var_dump($e->getMessage());
			//exit(1);
			return 0;
		}
		
		// construction des headers HTTP.
		$headers = array(
			'Content-Type'      => 'text/xml; charset=utf-8',
			'X-Security-Token'  => $res->pstrSecurityToken,
			'cookie'            => sprintf('__sessiontoken=%s', $res->pstrSessionToken),
		);
		$this->sessionToken = $res->pstrSessionToken;
		$header = '';
		foreach ($headers as $key => $value) {
			$header .= sprintf("%s: %s", $key, $value);
			$header .= PHP_EOL;
		}
		$this->header = $header;
		return 1;
	}
	
	public function Write($header, $sessionToken, $requete)
	{
		$client = $this->createSoapClient($header);
		try {
			$res = $client->__soapCall('Write', array(
				'parameters' => array(
					'sessiontoken'  => $sessionToken,
					'domDoc'		=> new SoapVar('<entity xsi:type=\'ns:Element\' SOAP-ENV:encodingStyle=\'http://xml.apache.org/xml-soap/literalxml\'>'.$requete.'</entity>', XSD_ANYXML)
				)
			));
		} catch (SoapFault $e) {
			//var_dump($e->getMessage());
			return 0;
		}

		return 1;
	}
	
	public function get_header()
	{
		return $this->header;
	}
	
	public function get_sessionToken()
	{
		return $this->sessionToken;
	}
}