<?php
session_start();
session_destroy();
header('location:sign-up.php');
