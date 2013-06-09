<?php

class User_Form_Register
    extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('class', 'form-register');

        $firstname = $this->createElement('text', 'firstname');
        $firstname->setLabel('First Name:')
                  ->setRequired(true)
                  ->setAttrib('size', 50);
        $lastname = $this->createElement('text', 'lastname');
        $lastname->setLabel('Last Name:')
                 ->setRequired(true)
                 ->setAttrib('size', 50);
        $username = $this->createElement('text', 'username');
        $username->setLabel('Username:')
                 ->setRequired(true)
                 ->setAttrib('size', 50);
        $email = $this->createElement('text', 'email');
        $email->setLabel('Email:')
              ->setRequired(true)
              ->setAttrib('size', 50)
              ->addValidator('emailAddress');
        $password = $this->createElement('password', 'password');
        $password->setLabel('Password:')
                 ->setRequired(true)
                 ->setAttrib('size', 50);
        $password2 = $this->createElement('password', 'password2');
        $password2->setLabel('Confirm Password::')
                  ->setAttrib('size', 50)
                  ->setRequired(true)
                  ->addValidator('identical', true, array('password'));
        
        $register = $this->createElement('submit', 'register');
        $register->setLabel("Register")
                 ->setIgnore(true);

        $this->addElements(array(
            $firstname,
            $lastname,
            $username,
            $email,
            $password,
            $password2,
            $register
        ));
    }

}