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
	    		
	    	   /* $iduser = $form->getValue('iduser');
	    		$name = $form->getValue('name');
	    		$email = $form->getValue('email');
	    		$password = $form->getValue('password');
	    		$address = $form->getValue('address');
	    		$description = $form->getValue('description');
	    		$pets = $form->getValue('pets');
	    		$photo = $form->getValue('photo');
	    		$gender = $form->getValue('genders_idgender');
	    		$city = $form->getValue('cities_idcity');
	    		$rol = $form->getValue('roles_idrol');*/
	    		
	    		$data = array(
	    		        $form->getValue('iduser'),
	    		        $form->getValue('name'),
	    		        $form->getValue('email'),
	    		        $form->getValue('password'),
	    		        $form->getValue('address'),
	    		        $form->getValue('description'),
	    		        $form->getValue('pets'),
	    		        $form->getValue('photo'),
	    		        $form->getValue('genders_idgender'),
	    		        $form->getValue('cities_idcity'),
	    		        $form->getValue('roles_idrol')
	    		);
	    		
	    		
	    		$users = new Application_Model_DbTable_User();
	    		$users->addAlbum($data);
	    		$this->_helper->redirector('index');
	    	} else {
	    		$form->populate($formData);
	    	}
	    }
	}
	
	public function editAction()
	{
	    $form = new Application_Form_Album();
	    $form->submit->setLabel('Save');
	    $this->view->form = $form;
	    if ($this->getRequest()->isPost()) {
	    	$formData = $this->getRequest()->getPost();
	    	if ($form->isValid($formData)) {
	    		$id = (int)$form->getValue('id');
	    		$artist = $form->getValue('artist');
	    		$title = $form->getValue('title');
	    		$albums = new Application_Model_DbTable_Album();
	    		$albums->updateAlbum($id, $artist, $title);
	    		$this->_helper->redirector('index');
	    	} else {
	    		$form->populate($formData);
	    	}
	    } else {
	    	$id = $this->_getParam('id', 0);
	    	if ($id > 0) {
	    		$albums = new Application_Model_DbTable_Album();
	    		$form->populate($albums->getAlbum($id));
	    	}
	    }	 
	}
	
	public function deleteAction()
	{
	    if ($this->getRequest()->isPost()) {
	    	$del = $this->getRequest()->getPost('del');
	    	if ($del == 'Yes') {
	    		$id = $this->getRequest()->getPost('id');
	    		$albums = new Application_Model_DbTable_Album();
	    		$albums->deleteAlbum($id);
	    	}
	    	$this->_helper->redirector('index');
	    } else {
	    	$id = $this->_getParam('id', 0);
	    	$albums = new Application_Model_DbTable_Album();
	    	$this->view->album = $albums->getAlbum($id);
	    }	 
	}
}