<?php
    class Route
    {
        private static $root_folder = '';
        
        static function get_root_folder() {
            return self::$root_folder;
        }        
        
        static function start()
        {
            // контроллер и действие по умолчанию
            $controller_name = 'Main';
            $action_name = 'index';

            $routes = explode('/', $_SERVER['REQUEST_URI']);
            
            /*
            echo 'routes:', '<br>';
            print_r($routes);
            */

            if (!empty($routes[1])) {
                if ($routes[1] !== 'ingate1-3') {
                    
                    $controller_name = $routes[1];
                    
                    if (!empty($routes[2])) {
                        $action_name = $routes[2];
                    }
                    
                } else {
                    
                    self::$root_folder = '/ingate1-3';
                    
                    if (!empty($routes[2])) {
                        $controller_name = $routes[2];
                    }
                    
                    if (!empty($routes[3])) {
                        $action_name = $routes[3];
                    }

                }
            }

            // добавляем префиксы
            $controller_name = strtolower($controller_name);
            $controller_file = 'controller_'.$controller_name.'.php';
            $controller_path = "app/controllers/".$controller_file;
                                    
            $model_file = 'model_'.$controller_name.'.php';
            $model_path = "app/models/".$model_file;
            
            $model_name = 'Model'.ucfirst($controller_name);
            $controller_name = 'Controller'.ucfirst($controller_name);
                       
            $action_name = strtolower($action_name);
            $action_name = 'action_'.$action_name;

            /*
            echo "Model: $model_name <br>";
            echo "Controller: $controller_name <br>";
            echo "Action: $action_name <br>";

            echo "ModelFile: $model_file <br>";
            echo "ModelPath: $model_path <br>";
            echo "ControllerFile: $controller_file <br>";
            echo "ControllerPath: $controller_path <br>";
            */

            if (file_exists($model_path)){
                include "app/models/".$model_file;
            }

            // подцепляем файл с классом контроллера

            if (file_exists($controller_path)) {
                include "app/controllers/".$controller_file;
            } else {
                Route::ErrorPage404();
            }

            // создаем контроллер
            $controller = new $controller_name;
            $action = $action_name;

            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                // здесь также разумнее было бы кинуть исключение
                Route::ErrorPage404();
            }

        }

        function ErrorPage404()
        {
            $host = 'http://'.$_SERVER['HTTP_HOST'].self::$root_folder.'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host.'404');
        }

    }

