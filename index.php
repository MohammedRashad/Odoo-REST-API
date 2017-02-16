<?php

require_once('ripcord.php');
require_once('Odoo.php');
require_once('Customer.php');
require_once('Sales.php');

$url = '';
$db = '';
$username = '';
$password = '';

//Doing Authenication of Odoo
$odoo = new Odoo($url, $db, $username, $password);
$uid = $odoo->login();
echo $uid;


//Comment the Sales section if working with Customers module and vice versa

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

//Sales module Section

$order = new Sales($odoo);

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
