<?php
    class ControllerJob1 extends Controller
    {
        function __construct()
        {
            session_start();
            
            $this->model = new ModelJob1();
            $this->view = new View();
        }
        
        function action_index()        
        {	
            
            unset($_SESSION['fullname']);
            
            $this->view->generate('job1_view.php', 'template_view.php');
            
        }
        
        function action_fullname()
        {	

            if (isset($_POST['do_cut_full_name'])) {
                $fullname = $_POST['surname'].' '.$_POST['firstname'].' '.$_POST['patronymic'];

                $this->model->set_surname(htmlentities(trim($_POST['surname']), ENT_QUOTES, 'UTF-8'));
                $this->model->set_firstname(htmlentities(trim($_POST['firstname']), ENT_QUOTES, 'UTF-8'));
                $this->model->set_patronymic(htmlentities(trim($_POST['patronymic']), ENT_QUOTES, 'UTF-8'));

                $fullname_cutted = $this->model->get_data();

                if (is_bool($fullname_cutted)) {
                    $fullname_cutted = 'Данные для обработки не указаны';
                }
                
                $_SESSION['fullname'] = $fullname_cutted;

                $host = 'http://'.$_SERVER['HTTP_HOST'].Route::get_root_folder();
                header('Location:'.$host.'/job1/fullname');
                
                exit();
            }
            
            if (isset($_SESSION['fullname'])) {
                $fullname_cutted = $_SESSION['fullname'];
            } else {
                $fullname_cutted = '';
            }
                
            $this->view->generate('job1_view.php', 'template_view.php', $fullname_cutted);
            
        }        
        
    }

