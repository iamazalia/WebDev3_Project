<?php
session_start();
if ($_SESSION["role"] == null) {
    header("Location: login.html");
} else {
    if ($_SESSION["role"] == "admin") {
    } else {
        header("Location: login.html");
    }
}

?>


