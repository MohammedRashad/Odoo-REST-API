<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('ripcord.php');
require_once('Odoo.php');

class Customer {

    var $odoo;

    public function __construct($odoo) {

        $this->odoo = $odoo;
    }



    function editCustomer() {

        $name = $_POST['name'];

        $key = $_POST['key'];
        $value = $_POST['value'];


        $models = ripcord::client($this->odoo->url . "/xmlrpc/2/object");


        $customer_ids = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'res.partner', 'search_read', array(array(array('customer', '=', true), array('name', '=', $name))), array(
                    'limit' => 1,
                    'fields' => array('id')))[0];


        foreach ($customer_ids as $uid) {

            $customer_id = $uid;
        }


        $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'res.partner', 'write', array(array($customer_id), array($key => $value)));
    }


    function getCustomer() {

        $name = $_POST['name'];

        $models = ripcord::client($this->odoo->url . "/xmlrpc/2/object");

        $client = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'res.partner', 'search_read', array(array(array('customer', '=', true), array('name', '=', $name))), array(
                    'limit' => 1,
                    'fields' => array(
                        'birthdate',
                        'phone',
                        'function',
                        'name',
                        'email',
                        'address',
                        'website')))[0];


        self::response($client);
    }

    function addCustomer() {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $phone = $_POST['phone'];
        $website = $_POST['website'];
        $birthdate = $_POST['birthdate'];

        $models = ripcord::client($this->odoo->url . "/xmlrpc/2/object");

        //Add user to DB
        $id = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'res.partner', 'create', array(array('name' => $name,
                'birthdate' => $birthdate,
                'phone' => $phone,
                'function' => $title,
                'email' => $email,
                'website' => $website)));

        //Display Profile 
        $client = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'res.partner', 'search_read', array(array(array('customer', '=', true), array('name', '=', $name))), array(
                    'limit' => 1,
                    'fields' => array('birthdate', 'phone', 'function', 'name',
                        'email',
                        'address',
                        'website')))[0];


        self::response($client);
    }

    function listAll() {

 
        $models = ripcord::client($this->odoo->url . "/xmlrpc/2/object");
 
        $client = $models->execute_kw($this->odoo->db, $this->odoo->user_id, $this->odoo->password, 'res.partner', 'search_read', array(array(array('customer', '=', true))), array(
            'limit' => 100,
            'fields' => array(
                'birthdate',
                'phone',
                'function',
                'name',
                'email',
                'address',
                'website',
        )));
 
        self::response($client);
    }

    function response($client) {

        echo json_encode($client);
        //
    }

}
