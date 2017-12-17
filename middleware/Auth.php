<?php
use \Interop\Container\ContainerInterface as ContainerInterface;

class Auth {
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    
    public function __invoke($request, $response, $next){
        global $path_to_root;
        global $SysPrefs;
        global $security_areas;
        global $security_sections;
        global $Refs;
        
        $headers = $request->getHeaders();
        
        if( !isset($headers["HTTP_X_USERNAME"]) || !isset($headers["HTTP_X_PASSWORD"]) || !isset($headers["HTTP_X_COMPANY"])){
            return $response->withStatus(403)
                ->withHeader('Content-type', 'text/html')
                ->write('Please provide your authentication');
        }
        
        unset($_SESSION);
        
        $_POST["company_login_name"] = $headers["HTTP_X_COMPANY"][0];
        $_POST["user_name_entry_field"] = $headers["HTTP_X_USERNAME"][0];
        $_POST["password"] = $headers["HTTP_X_PASSWORD"][0];
        
        include_once('session.inc');        
        
        if(!$_SESSION["wa_current_user"]->logged_in()){
            return $response->withStatus(401)
                    ->withHeader('Content-type', 'text/html')
                    ->write('Auth failed');
        }
        $this->container["user"] = $_SESSION["wa_current_user"];
        $response = $next($request, $response);
        return $response;
    }
}
