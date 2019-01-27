<?php



use App\Core\Controller;
use App\Core\Layouts;
use App\Models\User;
class Users extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $Layouts = new Layouts("Users/index");
    }
    public function register(){
        if (isset($_POST['register'])) {
            $datas =  array(
                'name' => $_POST['name'],
                'lastname' => $_POST['lastname'],
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
             );
             $password = $datas['password'];
             $password2= $_POST['password2'];
             $name = $datas['name'];
             $errores = '';
             
             //var_dump($datas);
             $user = new User();
             if (isset($datas['name']) && $datas['name'] != null && isset($datas['lastname']) && $datas['lastname'] != null && isset($datas['username']) && $datas['username'] != null && isset($datas['email']) && $datas['email'] != null ) {
                $issitUsername = $user::getUserbyusername($datas['username']);
                //var_dump($issitUsername);
                if ($issitUsername) {
                    $errores = "El apodo ya existe";
                    var_dump($errores);
                    $Layouts = new Layouts("Users/save_user");
                    die();
                }
                $issitEmail = $user::getUserbyeemail($datas['email']);
                if ($issitEmail) {
                    $errores = "El email ya existe";
                    var_dump($errores);
                    $Layouts = new Layouts("Users/save_user");
                    die();
                }
                if (password_verify($password2, $password)) {
                    $message = "Las contraseña coiciden";
                    var_dump($message);
                }else {
                    $errores = "Las contraseñas no son iguales";
                    var_dump($errores);
                    $Layouts = new Layouts("Users/save_user");
                    die();
                }
                $user::saveUser($datas);
                 $message = "Registro existoso";
                 var_dump($message);
            }else {
                $errores= 'Todos campos estan vacios';
                print_r($errores);
                
            }
            
        }
        $Layouts = new Layouts("Users/save_user");
    }
    
}