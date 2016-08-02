<?php

class CentrumLivingSoapObject {

  private static function get_user_credentials() {
    return array(
      'UserName' => 'D99',
      'Password' => 'D991234',
      'SiteID' => '3916349',
      'PmcID' => '1049405'
   );
  }

	private static function get_nameserver() {
		return 'http://realpage.com/webservices';
	}
	private static function get_service_url( $service ) {
		return 'http://OneSite.RealPage.com/WebServices/CrossFire/AvailabilityAndPricing/'. $service . '.asmx?wsdl';
	}

  public function get_availability_info( $service, $method = null, $arg = array() ) {

    $this->header = new SoapHeader( self::get_nameserver(), 'UserAuthInfo', self::get_user_credentials() );
    $this->client = new SoapClient( self::get_service_url( ucwords( $service ) ), array("trace" => 1, "exception" => 0) );
    $this->client->__setSoapHeaders( $this->header );

    $params = new SoapVar("<List xmlns='http://realpage.com/webservices'><listCriteria><ListCriterion><Name>LimitResults</Name><SingleValue>False</SingleValue></ListCriterion></listCriteria></List>", XSD_ANYXML);

    $response = $this->client->List( $params );

    return $response;
  }
}
