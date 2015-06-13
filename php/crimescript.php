<?php
/**
 * User: Axel - Prague Hacks Team 4
 * Date: 13/06/2015
 * Time: 08:38
 *
 */
$i        = 0;
$url      = 'http://www.mapakriminality.cz/?do=getAreaGeometry&zoomLevel=3&versionId=3&timeFrom=147&timeTo=147&language=cz&minTime=&maxTime=&crimeTypes=101-903&crimeType=';
$response = file_get_contents( $url );
//$response = ltrim ($response, '[');/$response = rtrim ($response, '}');
//echo $response;
$res = json_decode( $response );
///var_dump( $res );
$temp_arr = [ ];

for ( $i = 0; $i < count( $res ); $i ++ ) {
	foreach ( $res[ $i ] as $key => $value ) {

		// Check only Local Police department in Prague 7 or 8
		if ( $key == 'Contact_address' && ( strpos( $value, 'Praha 7' ) or strpos( $value, 'Praha 8' ) ) ) {

			// Get all the crime stats for targeted department
			$url_data        = 'http://www.mapakriminality.cz/api/crimes?areacode=' . $res[ $i ]->Code . '&crimetypes=101-903';

			// Get JSON
			$response_data   = file_get_contents( $url_data );
			$res_data_object = json_decode( $response_data );
			$res_data_array  = (array) $res_data_object;

			$temp_arr[ $i ]         = (array) $res[ $i ];
			$temp_arr[ $i ]['Data'] = '';
			array_push( $temp_arr[ $i ], (array) $res_data_array );
			$temp_arr[ $i ]['Data'] = $temp_arr[ $i ]['0']['crimes'];
			unset ( $temp_arr[ $i ]['0'] );

		}
	}
}
$temp_arr = array_values( $temp_arr );
$output   = json_encode( $temp_arr );
$myfile = fopen( "../json/crimedata.json", "w" ) or die( "Unable to open file!" );
$txt = $output;
if (fwrite( $myfile, $txt )) {
	echo 'The data has been fetched from Mapakriminality.cz</br>';
	echo 'You\'ll find the generated file into /json/ folder';
}
else {
	echo 'An error has occured';
}
fclose( $myfile );
?>
