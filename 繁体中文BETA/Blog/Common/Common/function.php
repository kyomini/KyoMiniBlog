<?php

function p($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}
function filecontents()
{
	$content = file_get_contents(__flel__);
}



/*msubstr*/
function subtext($text, $length)
{
    if(mb_strlen($text, 'utf8') > $length) 
     return mb_substr($text, 0, $length, 'utf8').'...';
     return $text;
}


?>
