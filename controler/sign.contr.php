<?php

require_once('./modele/SignIn.php');
require_once('./modele/SignUp.php');


class Sign
{
    public function signInPage(){
        Renderer::render('signIn','template');
    }
    
    public function signUpPage(){
        Renderer::render('signUp','template');
    }

    public function signIn(){
        if((isset($_POST['email']) AND isset($_POST['password'])) AND (!empty($_POST['email']) AND (!empty($_POST['password'])))){
            $user = new SignIn($_POST['email'], $_POST['password']);
            $user->set();
        }
        Redirection::redirect('index.php');
    }

    public function signUp(){
        if(isset($_POST['pseudo']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirmed'])){
            if(!empty($_POST['pseudo']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirmed'])){
                $user = new SignUp($_POST['pseudo'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $_POST['passwordConfirmed']);
                $user->set();

            }
        }
        Redirection::redirect('index.php');
    }
}