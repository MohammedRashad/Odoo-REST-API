<?php

require_once('ripcord.php');
require_once('Odoo.php');
require_once('Customer.php');
require_once('Sales.php');

$url = 'http://meeko.no-ip.org:8069';
$db = 'POC-DB';
$username = 'a.reda@aurorasolutions.ca';
$password = 'P@ssw0rd';

$odoo = new Odoo($url, $db, $username, $password);
$uid = $odoo->login();
echo $uid;

$order = new Sales($odoo);
$user = new Customer($odoo);


 switch ($_GET['customer']) {

    case 'get':

        $user->getCustomer();
        break;

    case 'add':

        $user->addCustomer();
        break;

    case 'all':

        $user->listAll();
        break;

    case 'edit':

        $user->editCustomer();
        break;

    default:

        echo 'Error';
        break;

 }


 switch ($_GET['state']) {

    case 'add':

        $order->addSaleOrder();
        break;

    case 'display':

        $order->displaySaleOrder();
        break;

    default:

        echo 'Error';
        break;
 }
