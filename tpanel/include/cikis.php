<?php

session_start();
session_destroy();
header("Location: ../giris-yap.php?durum=CikisBasarili");

?>

<?php
ob_end_flush(); 
?>