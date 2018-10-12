<?php
namespace App\Helpers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * Helper class Convert Number into words using dataaccess.com API
 * 
 * @author Lalit Patel
 *
 */
class NumberToWord
{
    
    /**
     * 
     * @param Int $number
     * @return string
     */
	public function convert(Int $number){

		$xmlRequest = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/"><Body><NumberToWords xmlns="http://www.dataaccess.com/webservicesserver/"><ubiNum>'.$number.'</ubiNum></NumberToWords></Body></Envelope>';

			$client = new Client();

			try {
			    $response = $client->post(
			    'https://www.dataaccess.com/webservicesserver/numberconversion.wso',
			        [
			            'body'    => $xmlRequest,
			            'headers' => [
			            'Content-Type' => 'text/xml',
			            'SOAPAction' => ''
			            ]
			        ]
			    );

			    if ($response->getStatusCode() === 200) {
				    // Success!
				    $content = (string) $response->getBody();
				    $t_xml = new \DOMDocument();
					$t_xml->loadXML($content);
				   
				    return ucwords(trim($t_xml->textContent));
				} else {
				    return 'Response Failure !!!';
				}
			} catch (\Exception $e) {
			    return 'Exception:' . $e->getMessage();
			}
	}
}