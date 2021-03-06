<?php

class RouteClass {
    protected $container;
    
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    
    protected function __iterate_result($result) {
        $retval = array();
        while($data= db_fetch($result)){
            $retval[] = $data;
        }
        return $retval;
    }
    
    protected function __getpostdata($post, $varname, $default=""){
        return isset($post[$varname])?$post[$varname]:$default;
    }
}
