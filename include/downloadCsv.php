<?php

$title    = $_POST['title'];
$des      = $_POST['des'];
$kw       = $_POST['kw'];
$viewport = $_POST['viewport'];
$img      = $_POST['img'];
$url      = $_POST['dataUrl'];
$array = [
        ['Web URL', $url],
        ['Title', $title], 
        ['Description', $des],
        ['Keywords', $kw],
        ['ViewPort', $viewport],
        ['Logo', $img]
    ];
$filename = $title.".csv";  
ob_start();
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="'.$filename.'"');
$headline = "Meta Result For : ". $url;
$fp = fopen('php://output', 'w');
ob_end_clean();
// fputcsv($fp, $headline);
foreach ($array as $row) {
    fputcsv($fp, $row);
  }
fclose($fp);
exit;  
// array_to_csv_download( $array , $filename);
// function array_to_csv_download($array, $filename, $delimiter=";") {
//     header('Content-Type: application/csv');
//     header('Content-Disposition: attachment; filename="'.$filename.'";');
//     $headline = "Meta Result For : ". $url;
//     $f        = fopen('php://output', 'w');
//     fputcsv($f, $headline, $delimiter );
//     foreach ($array as $line) {
//         fputcsv($f, $line, $delimiter);
//     }
// }  

?>