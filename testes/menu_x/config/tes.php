<?php

/**
 * @author holodek
 * @copyright 2010
 */

$key = 'dskfdhjkjdks';

echo base64_encode('minha casa e velha!!!', $key);

echo base64_decode('aHR0cDovL3d3dy5zaW5kaWZpY2lvcy5jb20uYnIv');

echo crypt('minha casa e velha!!!', $key);
?>