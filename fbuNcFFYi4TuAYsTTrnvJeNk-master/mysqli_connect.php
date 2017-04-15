<?php

DEFINE ('USER','root');
DEFINE ('PASSWORD','s.01021158');
DEFINE ('HOST','localhost');
DEFINE ('DB', 'RATEMYCOURSE');

$dbc = @mysqli_connect(HOST,USER,PASSWORD,DB)
OR die('Could not connect to Database' .mysqli_connect_error);


?>