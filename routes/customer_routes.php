<?php

require_once $path_to_root.'/sales/includes/db/customers_db.inc';
require_once $path_to_root.'/includes/db/crm_contacts_db.inc';

require_once 'api/Customer.php';

$customer_acl = new AccessLevel($this->getContainer(),"SA_CUSTOMER");

$this->group('customer/', function() {
    
    $this->get('list', \Customer::class . ':get_customer_list');
    
    $this->get('by_id/{id}', \Customer::class . ':get_customer_by_id');
    
    $this->get('by_ref/{ref}', \Customer::class . ':get_customer_by_ref');
    
    $this->get('name/{id}', \Customer::class . ':get_customer_name');
    
    $this->get('details/{id}', \Customer::class . ':get_customer_details');
    
    $this->get('habit/{id}', \Customer::class . ':get_customer_habit');
    
    $this->get('contacts/{id}', \Customer::class . ':get_customer_contacts');
    
    $this->post('add', \Customer::class . ':add_customer');
    
    $this->put('update/{id}', \Customer::class . ':update_customer');
    
    $this->delete('delete/{id}', \Customer::class . ':delete_customer');
    
})->add($customer_acl);