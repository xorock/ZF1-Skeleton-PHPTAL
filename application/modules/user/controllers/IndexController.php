<?php

class User_IndexController extends Zend_Controller_Action {

    protected $_auth = null;
    
    public function init() 
    {
        if (null == $this->_auth) {
            $this->_auth = Zend_Auth::getInstance();
        }
    }

    public function indexAction()
    {
        echo 'User module - index Action';
    }
    
    public function loginAction()
    {
        if ($this->_auth->hasIdentity()) {
            $this->forward('index');
        }
        
        $form = new User_Form_Login();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                \Zend_Debug::dump($formData);
            } else {
                
            }
        }
        $this->view->form = $form;
    }

    public function logoutAction()
    {
        $this->_auth->clearIdentity();
        $this->redirect('/');
    }
    
    public function registerAction()
    {
        if ($this->_auth->hasIdentity()) {
            $this->forward('index');
        }
        
        $form = new User_Form_Register();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                \Zend_Debug::dump($formData);
            } else {
                
            }
        }
        $this->view->form = $form;
    }

}

