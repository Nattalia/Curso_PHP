<?php
class UserController extends Zend_Controller_Action
{
	public function init()
	{
		/* Initialize action controller here */
	}

	public function indexAction()
	{
		$users = new Application_Model_DbTable_User();
        $this->view->users = $users->fetchAll();
	}
	
	public function addAction()
	{
	    $form = new Application_Form_User();	    
	    $form->submit->setLabel('Add');
	    $this->view->form = $form;
	    if ($this->getRequest()->isPost()) {
	    	$formData = $this->getRequest()->getPost();
	    	if ($form->isValid($formData)) {
	    		$data = array(
	    		        "iduser" => $form->getValue('iduser'),
	    		        "name" => $form->getValue('name'),
	    		        "email" => $form->getValue('email'),
	    		        "password" => $form->getValue('password'),
	    		        "address" => $form->getValue('address'),
	    		        "description" => $form->getValue('description'),
	    		        "pets" => $form->getValue('pets'),
	    		        "photo" => $form->getValue('photo'),
	    		        "genders_idgender" => $form->getValue('genders_idgender'),
	    		        "cities_idcity" => $form->getValue('cities_idcity'),
	    		        "roles_idrol" => $form->getValue('roles_idrol')
	    		);
	    			    		
	    		$users = new Application_Model_DbTable_User();
	    		$users->addUser($data);
	    		$this->_helper->redirector('index');
	    	} else {
	    		$form->populate($formData);
	    	}
	    }
	}
	
	public function editAction()
	{
	    $form = new Application_Form_User();
	    $form->submit->setLabel('Save');
	    $this->view->form = $form;
	    if ($this->getRequest()->isPost()) {
	    	$formData = $this->getRequest()->getPost();
	    	if ($form->isValid($formData)) {
	    	    $id = (int)$form->getValue('iduser');
	    	    $data = array(
	    		        "iduser" => $form->getValue('iduser'),
	    		        "name" => $form->getValue('name'),
	    		        "email" => $form->getValue('email'),
	    		        "password" => $form->getValue('password'),
	    		        "address" => $form->getValue('address'),
	    		        "description" => $form->getValue('description'),
	    		        "pets" => $form->getValue('pets'),
	    		        "photo" => $form->getValue('photo'),
	    		        "genders_idgender" => $form->getValue('genders_idgender'),
	    		        "cities_idcity" => $form->getValue('cities_idcity'),
	    		        "roles_idrol" => $form->getValue('roles_idrol')
	    		);
	    		
	    		
	    		$users = new Application_Model_DbTable_User();
	    		$users->updateUser($id, $data);
	    		$this->_helper->redirector('index');
	    	} else {
	    		$form->populate($formData);
	    	}
	    } else {
	    	$id = $this->_getParam('id', 0);
	    	if ($id > 0) {
	    		$users = new Application_Model_DbTable_User();
	    		$form->populate($users->getUser($id));
	    	}
	    }	 
	}
	
	public function deleteAction()
	{
	    if ($this->getRequest()->isPost()) {
	    	$del = $this->getRequest()->getPost('del');
	    	if ($del == 'Yes') {
	    		$id = $this->getRequest()->getPost('id');	    	
	    		$users = new Application_Model_DbTable_User();
	    		$users->deleteUser($id);
	    	}
	    	$this->_helper->redirector('index');
	    } else {
	    	$id = $this->_getParam('id', 0);	    	
	    	$users = new Application_Model_DbTable_User();
	    	$this->view->user = $users->getUser($id);
	    }	 
	}
}