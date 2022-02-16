<?php
sleep(2);
header('Content-Type: application/json; charset=UTF-8');
$stuff = array('first' => 'first thing',
                'second' => 'second thing');
echo(json_encode($stuff));

?>
