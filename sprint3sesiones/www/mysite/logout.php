<?php
// EL c´doigo permite hacer un log out en el caso de que haya una sesión existente.
// Después se redirige a la página login.html.
session_start();
session_destroy();
header('Location: login.html');
?>