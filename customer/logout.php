<?php
session_start();
session_destroy();
header('location:../vegetable/index.php');
