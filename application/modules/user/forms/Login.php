<?php

use Ztal\Form;

class User_Form_Login extends Form
{

    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('class', 'form-login');

        $username = $this->createElement('text', 'username');
        $username->setLabel('Username:')
                 ->setRequired(true)
                 ->setAttrib('size', 50);
        $password = $this->createElement('password', 'password');
        $password->setLabel('Password:')
                 ->setRequired(true)
                 ->setAttrib('size', 50);
        
        $login = $this->createElement('button', 'submit');
        $login->setLabel("Login")
              ->setIgnore(true);

        $this->addElements(array(
            $username,
            $password,
            $login
        ));
    }

}