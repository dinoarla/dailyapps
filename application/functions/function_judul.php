<?php
function format_judul($input, $maxWords, $maxChars)
{
    $words = preg_split('/\s+/', $input);
    $words = array_slice($words, 0, $maxWords);
    $words = array_reverse($words);

    $chars = 0;
    $truncated = array();

    while(count($words) > 0)
    {
        $fragment = trim(array_pop($words));
        $chars += strlen($fragment);

        if($chars > $maxChars) break;

        $truncated[] = $fragment;
    }

    $result = implode($truncated, ' ');

    return $result . ($input == $result ? '' : '...');
}

function get_starred($str) {
  $str_array =str_split($str);
 foreach($str_array as $key => $char) {
  if($key == 0 || $key == count($str_array)-1) continue;
  if($char != '-') $str[$key] = '*';
 }
  return $str;
}

?>