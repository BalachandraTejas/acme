<?php
namespace Acme\Controllers;


use Acme\Models\User;
use Acme\Validation\Validator;

class RegisterController extends BaseController
{
  
    public function getShowRegisterPage()
    {
        echo $this->twig->render('register.html');
    }
  
    public function postShowRegisterPage()
    {
        $validation_data = [
      "first_name"  => "min:3",
      "last_name"   => "min:3",
      "username"    => "email|equalTo:verify_username",
      "verify_username" => "email",
      "password"    => "min:3|equalTo:verify_password"
    ];
    //validate data
    $validator = new Validator;
        $errors = $validator->isValid($validation_data);
    
    if(sizeof($errors) )
    {
//      $_SESSION['msg'] = $errors;
//      header("Location: /register");
      echo $this->twig->render('register.html', ['errors' => $errors ]);
      exit();
    }

    //if validation fails, go back to register page and display
    //error message
    
    //save this data into a database
    $user = new User;
        $user->first_name = $_REQUEST['first_name'];
        $user->last_name = $_REQUEST['last_name'];
        $user->username = $_REQUEST['username'];
        $user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $user->save();
        echo 'posted!';
    }
  
    public function getShowLoginPage()
    {
        echo $this->twig->render('login.html');
    }
  
}
