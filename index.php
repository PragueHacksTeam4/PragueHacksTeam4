<?php
/**
 * Created by PhpStorm.
 * User: ADA-LT
 * Date: 13/06/2015
 * Time: 08:38
 *
 */
?>

<?php

$url      = 'http://www.mapakriminality.cz/?do=getAreaGeometry&zoomLevel=3&versionId=3&timeFrom=147&timeTo=147&language=cz&minTime=&maxTime=&crimeTypes=101-903&crimeType=';
$response = file_get_contents( $url );
echo '<pre>';
print_r( $response );
echo '</pre>';
?>
