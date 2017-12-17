<?php

use \Interop\Container\ContainerInterface as ContainerInterface;

class Customer extends RouteClass{    
    
    function get_customer_list($request, $response, $args){
        $SysPrefs->max_rows_in_search = PHP_INT_MAX;
        
        $retval = $this->__iterate_result(get_customers_search(""));
        
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }
    
    function get_customer_by_id($request, $response, $args){
        $id = $args["id"];
        $retval = get_customer($id);
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }
    
    function get_customer_by_ref($request, $response, $args){
        $ref = $args["ref"];
        $retval = get_customer_by_ref($ref);
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }
    
    function get_customer_name($request, $response, $args){
        $id = $args["id"];
        $retval = array("name"=>get_customer_name($id));
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }
    
    function get_customer_details($request, $response, $args){
        $id = $args["id"];
        
        $retval = get_customer_details($id);
                
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }
    
    function get_customer_habit($request, $response, $args){
        $id = $args["id"];
        
        $retval = get_customer_habit($id);

        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }
    
    function get_customer_contacts($request, $response, $args){
        $id = $args["id"];
        
        $retval = get_customer_contacts($id);
        
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }
    
    function add_customer($request, $response, $args){
        $post = $request->getParsedBody();
        
        add_customer($CustName, $cust_ref, $address, $tax_id, $curr_code, 
            $dimension_id, $dimension2_id, $credit_status, $payment_terms, 
            $discount, $pymt_discount, $credit_limit, $sales_type, $notes
        );
        
        return $response->withHeader('Content-type', 'application/json')->withJson(array("status"=>"success"), 200);
    }
    
    function update_customer($request, $response, $args){
        $id = $args["id"];
        
        return $response->withHeader('Content-type', 'application/json')->withJson(array("status"=>"success"), 200);
    }
    
    function delete_customer($request, $response, $args){
        $id = $args["id"];
        delete_customer($id);
        return $response->withHeader('Content-type', 'application/json')->withJson(array("status"=>"success"), 200);
    }
}