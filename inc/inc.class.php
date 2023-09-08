<?php
session_start();
include_once __DIR__ .  '/../classes/user.class.php';
include_once __DIR__ .  '/../classes/category.class.php';
include_once __DIR__ .  '/../classes/brand.class.php';
include_once __DIR__ .  '/../classes/product.class.php';
include_once __DIR__ .  '/../classes/invoices.class.php';
include_once __DIR__ .  '/../classes/order.class.php';
$user = new user();
$category = new category();
$brand = new brand();
$product = new product();
$invoices = new invoices();
$order = new order();
