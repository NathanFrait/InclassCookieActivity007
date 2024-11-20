<?php

//This function was created by ChatGPT since there were deprecation issues with  the utf8_encode() function.
//custom_utf8_encode() is a local version of the utf8_encode() function that works with all versions of PHP
function custom_utf8_encode($string) {
    return preg_replace_callback(
        '/[\x80-\xFF]/',
        function ($match) {
            return chr(0xC0 | (ord($match[0]) >> 6)) .
                   chr(0x80 | (ord($match[0]) & 0x3F));
        },
        $string
    );
}


function generateReviewStars($rating) {
  $output = "";
  for ($i=0; $i<$rating; $i++) {
    $output .= '<i class="star icon"></i>';
  }
  return $output;
}


function generateRatingStars($rating) {
  $output = "";
  for ($i=0; $i<$rating; $i++) {
    $output .= '<i class="orange star icon"></i>';
  }
  for ($i=$rating; $i<5; $i++) {
    $output .= '<i class="empty star icon"></i>';
  }
  
  return $output;
}


function generateLink($url,$label) {
    return "<a href='$url'>$label</a>";
}



function outputFilterOptions($data, $valueField, $dataField) {
  while ($single = $data->fetch()) { 
    echo '<option value=' . $single[$valueField] . '>';
    echo custom_utf8_encode($single[$dataField]);
    echo '</option>'; 
  }       
}

function makeArtistName($first, $last) {
    return custom_utf8_encode($first . ' ' . $last);
}

?>