<?php


$file = 'NumberOfInstances.txt';

$handle = fopen($file, "r");
echo fread($handle,filesize("NumberOfInstances.txt"));

?>