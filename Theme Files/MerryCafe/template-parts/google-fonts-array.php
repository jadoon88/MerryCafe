<?php

include "googlefontslist.php";

$json = file_get_contents('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCiRSpXRByTg_8jn81Xf-7iytoSUbhja_Y');

//print_r(json_data());

	$result = json_decode($json);

	//print_r($data);

	$font_list = array();

	foreach ($result->items as $font) {

		echo "\"'".$font->family."', ".$font->category."\"		=>		'".$font->family."',<br>";

	}

	//print_r($font_list);

?>
