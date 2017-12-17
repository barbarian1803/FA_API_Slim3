<?php

use \Interop\Container\ContainerInterface as ContainerInterface;

class AccessLevel {
    
    protected $container;
    protected $access_level;


    public function __construct(ContainerInterface $container, $access_level) {
        $this->container = $container;
        $this->access_level = $access_level;
    }
    
    public function __invoke($request, $response, $next){
        $acl = $this->access_level;
        $check = $this->container->get('user')->can_access($acl);
        
        if(!$check){
            return $response->withStatus(401)->write("Not accessible");
        }
        
        $response = $next($request, $response);
        return $response;
    }
}
