<?php
$answer['title'] = $_POST['title'];
$answer['message'] = $_POST['message'];
$answer['datevisit'] = $_POST['datevisit'];
echo json_encode($answer);
?>
