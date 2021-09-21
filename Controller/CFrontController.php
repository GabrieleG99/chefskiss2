<?php

//require_once 'chefskiss/StartSmarty.php';

//require_once '../autoload.php';

class CFrontController
{

    public function run($path){

        $method = $_SERVER['REQUEST_METHOD'];

        $param = array();
        $url = explode('?', $path);
        $path = $url[0];
        $params = explode('&' ,$url[1]);
        for($i = 0; $i < count($params); $i++){
            $param[$i] = $params[$i];
        }
        $num = count($param);

        $resource = explode('/', $path);

        array_shift($resource);
        array_shift($resource);

        if ($resource[0] != 'api'){

            $controller = 'C' . $resource[0];
            $dir = 'Controller';
            $elementDir = scandir($dir);

            if (in_array($controller . ".php", $elementDir)) {
                if (isset($resource[1])) {
                    $function = $resource[1];
                    if (method_exists($controller, $function)) {

                        if ($num == 0) $controller::$function();
                        else if ($num == 1) $controller::$function($param[0]);
                        else if ($num == 2) $controller::$function($param[0], $param[1]);


                    }
                    else {
                        if (CUtente::isLogged()){
                            $utente = unserialize($_SESSION['utente']);
                            if ($utente->getPrivilegi() == 3){
                                header('Location: /chefkiss/Admin/homepage');
                            } else {
                                CGestioneRicerca::blogHome();
                            }
                        } else {
                            CGestioneRicerca::blogHome();
                        }
                    }
                } else {
                    if (CUtente::isLogged()){
                        $utente = unserialize($_SESSION['utente']);
                        if ($utente->getPrivilegi() == 3){
                            header('Location: /chefkiss/Admin/homepage');
                        } else {
                            CGestioneRicerca::blogHome();
                        }
                    } else {
                        CGestioneRicerca::blogHome();
                    }
                }
            } else {
                if (CUtente::isLogged()){
                    $utente = unserialize($_SESSION['utente']);
                    if ($utente->getPrivilegi() == 3){
                        header('Location: /chefkiss/Admin/homepage');
                    } else {
                        CGestioneRicerca::blogHome();
                    }
                } else {
                    CGestioneRicerca::blogHome();
                }
            }
        }
    }

}