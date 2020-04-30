<?php
$answer['title'] = $_POST['title'];
$answer['message'] = $_POST['message'];
$answer['datevisit'] = $_POST['datevisit'];
$answer['apitoken'] = $_POST['apitoken'];
echo json_encode($answer);
?>
