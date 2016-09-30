<?php

require_once('ripcord.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author root
 */
/*

  $this -> $url = 'http://my.aurorasolutions.ca:8069';
  $this -> $db = 'POC-DB';
  $this -> $username = 'm.rashad@aurorasolutions.ca';
  $this -> $password = 'P@ssw0rd';

 */


class Odoo {

    var $username;
    var $password;
    var $common;
    var $uid;
    var $url;
    var $db;

    function Odoo($url, $db, $username, $password) {

        $this->url = $url;
        $this->db = $db;
        $this->username = $username;
        $this->password = $password;
    }

    function login() {

        $this->common = ripcord::client($this->url . "/xmlrpc/2/common");
        $this->common->version();

        $this->user_id = $this->common->authenticate($this->db, $this->username, $this->password, array());

        return $this->user_id;
    }

}
