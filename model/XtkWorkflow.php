<?php

class XtkWorkflow
{
    private $wsdl = '';


    public function __construct()
    {
        // chemin vers mon wsdl des workflows
        // à adapter avec votre fichier wsdl
        $this->wsdl = 'wsdl/xtkworkflow.wsdl';
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

    public function PostEvent($header, $sessionToken, $strWorkflowId, $strActivity, $strTransition, $elemParameters, $bComplete)
    {

        $client = $this->createSoapClient($header);


        try {
            $res = $client->__soapCall('PostEvent', array(
                'parameters' => array(
                    'sessiontoken'    => $sessionToken,
                    'strWorkflowId'   => $strWorkflowId,
                    'strActivity'     => $strActivity,
                    'strTransition'   => $strTransition,
                    'elemParameters'  => new SoapVar('<entity xsi:type=\'ns:Element\' SOAP-ENV:encodingStyle=\'http://xml.apache.org/xml-soap/literalxml\'>'.$elemParameters.'</entity>', XSD_ANYXML),
                    'bComplete'       => $bComplete
                ),
            ));
        } catch (SoapFault $e) {
            var_dump($e->getMessage());
            echo htmlentities($client->__getLastRequest());
            exit(1);
        }



        return 0;
    }

}

