<?php
$file_url = '/reciept.pdf';
$file_name = 'my_file.pdf';

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file_name . '"');

readfile($file_url);
?>

