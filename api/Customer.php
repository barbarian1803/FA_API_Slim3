<?php

use \Interop\Container\ContainerInterface as ContainerInterface;

class Customer extends RouteClass {

    function get_customer_list($request, $response, $args) {
        $SysPrefs->max_rows_in_search = PHP_INT_MAX;

        $retval = $this->__iterate_result(get_customers_search(""));

        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }

    function get_customer_by_id($request, $response, $args) {
        $id = $args["id"];
        $retval = get_customer($id);
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }

    function get_customer_by_ref($request, $response, $args) {
        $ref = $args["ref"];
        $retval = get_customer_by_ref($ref);
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }

    function get_customer_name($request, $response, $args) {
        $id = $args["id"];
        $retval = array("name" => get_customer_name($id));
        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }

    function get_customer_details($request, $response, $args) {
        $id = $args["id"];

        $retval = get_customer_details($id);

        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }

    function get_customer_habit($request, $response, $args) {
        $id = $args["id"];

        $retval = get_customer_habit($id);

        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }

    function get_customer_contacts($request, $response, $args) {
        $id = $args["id"];

        $retval = get_customer_contacts($id);

        return $response->withHeader('Content-type', 'application/json')->withJson($retval, 200);
    }

    function add_customer($request, $response, $args) {
        $post = $request->getParsedBody();

        $CustName = $this->__getpostdata($post, "cust_name");
        $cust_ref = $this->__getpostdata($post, "cust_ref");
        $address = $this->__getpostdata($post, "address");
        ;
        $tax_id = $this->__getpostdata($post, "tax_id");
        $curr_code = $this->__getpostdata($post, "curr_code");
        $dimension_id = $this->__getpostdata($post, "dim_id");
        $dimension2_id = $this->__getpostdata($post, "dim2_id");
        $credit_status = $this->__getpostdata($post, "credit_status",1);
        $payment_terms = $this->__getpostdata($post, "payment_terms",1);
        $discount = $this->__getpostdata($post, "discount",0);
        $pymt_discount = $this->__getpostdata($post, "pymt_discount",0);
        $credit_limit = $this->__getpostdata($post, "credit_limit",10000);
        $sales_type = $this->__getpostdata($post, "sales_type",1);
        $notes = $this->__getpostdata($post, "notes");

        add_customer($CustName, $cust_ref, $address, $tax_id, $curr_code, 
            $dimension_id, $dimension2_id, $credit_status, $payment_terms, 
            $discount, $pymt_discount, $credit_limit, $sales_type, $notes
        );


        return $response->withHeader('Content-type', 'application/json')->withJson(array("status" => "success"), 200);
    }

    function update_customer($request, $response, $args) {
        $id = $args["id"];

        $post = $request->getParsedBody();

        $CustName = $this->__getpostdata($post, "cust_name");
        $cust_ref = $this->__getpostdata($post, "cust_ref");
        $address = $this->__getpostdata($post, "address");
        
        $tax_id = $this->__getpostdata($post, "tax_id");
        $curr_code = $this->__getpostdata($post, "curr_code");
        $dimension_id = $this->__getpostdata($post, "dim_id");
        $dimension2_id = $this->__getpostdata($post, "dim2_id");
        $credit_status = $this->__getpostdata($post, "credit_status",1);
        $payment_terms = $this->__getpostdata($post, "payment_terms",1);
        $discount = $this->__getpostdata($post, "discount",0);
        $pymt_discount = $this->__getpostdata($post, "pymt_discount",0);
        $credit_limit = $this->__getpostdata($post, "credit_limit",10000);
        $sales_type = $this->__getpostdata($post, "sales_type",1);
        $notes = $this->__getpostdata($post, "notes");

        update_customer($id, $CustName, $cust_ref, $address, $tax_id, $curr_code, 
            $dimension_id, $dimension2_id, $credit_status, $payment_terms, 
            $discount, $pymt_discount, $credit_limit, $sales_type, $notes
        );
        
        return $response->withHeader('Content-type', 'application/json')->withJson(array("status" => "success"), 200);
    }

    function delete_customer($request, $response, $args) {
        $id = $args["id"];
        delete_customer($id);
        return $response->withHeader('Content-type', 'application/json')->withJson(array("status" => "success"), 200);
    }

}
