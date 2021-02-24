<?php
    header('Access-Control-Allow-Origin: *');
    
    include_once('../models/StudentsModel.php');
    $students_model = new StudentsModel();
    $RA = "";
    $name = "";
    $cpf = "";
    $email = "";

    $op = $_GET['op'];
    if(isset($op)){
        switch ($op) {
            case 0:
                $name = $_GET['name'];
                $cpf = $_GET['cpf'];
                $email = $_GET['email'];
                if(strlen($cpf) != 11){
                    print_r(json_encode(['status'=>'false']));
                }else if($students_model->insert($name, $cpf, $email)){
                    print_r(json_encode(['status'=>'true']));
                }else{
                    print_r(json_encode(['status'=>'false']));
                }
                break;
            case 1:
                $RA = $_GET['RA'];
                $name = $_GET['name'];
                $email = $_GET['email'];
                if($students_model->update($RA,$name, $email) == 1){
                    print_r(json_encode(['status'=>'true']));
                }else{
                    print_r(json_encode(['status'=>'false']));
                }
                break;
            case 2:
                $RA = $_GET['RA'];
                
                if($students_model->delete($RA)){
                    print_r(json_encode(['status'=>'true']));
                }else{
                    print_r(json_encode(['status'=>'false']));
                }
                break;
            case 3:
                $result = $students_model->list();
                
                print_r(json_encode($result));
                break;
            case 4:
                $result = $students_model->getStudent($_GET['RA']);
                print_r(json_encode($result));
                break;
            default:
                echo "invalido";
                break;
        }
    }
    

    
?>