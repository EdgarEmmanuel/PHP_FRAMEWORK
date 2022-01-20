<?php
$data = str_replace('public', '', $_SERVER['DOCUMENT_ROOT']);
require_once($data."src/Views/header.php");
?>

<h1>WELCOME HERE</h1>

<?php
require_once($data."src/Views/footer.php");
?>