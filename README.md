# Odoo REST Web Service
RESTful Web Service for Interfacing with Odoo

# Introduction 

Odoo is a suite of web based open source business apps.
<br/>
The main Odoo Apps include an Open Source CRM, Website Builder, eCommerce, Warehouse Management, Project Management, Billing & Accounting, Point of Sale, Human Resources, Marketing, Manufacturing, Purchase Management, ...
<br/>
<br/>
Odoo Apps can be used as stand-alone applications, but they also integrate seamlessly so you get a full-featured Open Source ERP when you install several Apps.
<br/>
<br/>
This API provides a simple way for interfacing with Odoo and it's various modules.
Though orignally implemented for Customers and Sales modules, it can be used for virtually any other module by just changing the model name and columns.

# API Documentation

The API interfaces with odoo using RPC Calls performed by the ripcord library for PHP, all the handling of the RPC and Authentication is in the Odoo.php file, which has the following structure :

    Odoo($url, $db, $username, $password) // The constructor 
    
    login() // Performs the login operation using ripcord
    
**To start using the API, go to index.php**

    //In index.php, add your parameters here
    $url = '';
    $db = '';
    $username = '';
    $password = '';

**Endpoints :** <br/>

- Customer module
  - get
  - add
  - all
  - edit

*The Customer Module example exhibits the ability to perform a full CRUD operation on the module for any fields, more fields can be easily added to the code in the Customer.php, the main component of any function in the customer module is the "execute_kw" function that performs the RPC call*
  
- Sales Module
  - add
  - display 
  
*The Sales Module example exhibits the ability to perform read and write operations for more complex modules like adding invoices and completing orders , more fields can be easily added to the code in the Customer.php, the main component of any function in the customer module is the "execute_kw" function that performs the RPC call*


**This API can be easily extended by refering to the documentation of odoo functions from the official website.** 
  
# License

The API is licensed under GNU GPL v3, usage and reproduction of this work must be with respect to its terms
