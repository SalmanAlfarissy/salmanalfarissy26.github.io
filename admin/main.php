<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page=='home') include 'dasboard.php';
if ($page=='kategori') include 'kategori.php';
if ($page=='project') include 'project.php';