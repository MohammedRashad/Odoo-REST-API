<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalesManager
 *
 * @author root
 */
require_once('ripcord.php');
require_once('Odoo.php');

class Sales {

    var $odoo;

    public function __construct($odoo) {

        $this->odoo = $odoo;
    }

    function displaySaleOrder() {


        $name = $_POST['name'];

        $models = ripcord::client($this->odoo->url . "/xmlrpc/2/object");


        $order = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'sale.order', 'search_read', array(array(array('customer', '=', true), array('name', '=', $name))), array(
                    'limit' => 1,
                    'fields' => array(
                        'name',
                        'state',
                        'date_order',
                        'user_id')))[0];


        echo json_encode($order);
    }

    function displayAllSalesOrders() {


        $name = $_POST['name'];

        $models = ripcord::client($this->odoo->url . "/xmlrpc/2/object");


        $order = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'sale.order', 'search_read', array(array(array('customer', '=', true), array('name', '=', $name))), array(
                    'limit' => 200,
                    'fields' => array(
                        'name',
                        'state',
                        'date_order',
                        'user_id')));


        echo json_encode($order);
    }

    function addSaleOrder() {

        $customer_id = 0;

        $name = $_POST['name'];

        $models = ripcord::client($this->odoo->url . "/xmlrpc/2/object");

        $customer_ids = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'res.partner', 'search_read', array(array(array('customer', '=', true), array('name', '=', $name))), array(
                    'limit' => 1,
                    'fields' => array('id')))[0];


        foreach ($customer_ids as $uid) {

            $customer_id = $uid;
        }

        $id = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'sale.order', 'create', array(array('partner_id' => $customer_id,)));

        echo json_encode($id);
    }

}
