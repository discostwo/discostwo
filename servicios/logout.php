<?php
session_start();
session_destroy();

// SE VUELVE AL INDEX
header('Location: ../');
?>
