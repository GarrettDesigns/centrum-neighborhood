<?php
include('../soap.php');
	$apt_info = new CentrumLivingSoapObject;
	$units = $apt_info->get_availability_info( 'Unit', 'List' );
	$unit_data = $units->ListResult->UnitObject;

    array_multisort($units);
    // $header_array = explode(' ', $apt_info->client->__last_response_headers);
    // preg_match("/(?<=\=)(.*[A-Za-z0-9])/", $header_array[16], $matches);
    foreach ( $unit_data as $unit ) {
        echo '"FloorPlan Code: ' . $unit->FloorPlan->FloorPlanCode . ' -- Floor Number: ' . $unit->UnitDetails->FloorNumber . ' -- Badroom Count: ' . $unit->UnitDetails->Bedrooms . ' -- Unit Number: ' . $unit->Address->UnitNumber . '"';
        echo "\n";
    }
?>
