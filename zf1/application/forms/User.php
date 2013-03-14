<?php 
class Application_Form_User extends Zend_Form
{
public function init()
{
    $this->setName('user');
    
    $id = new Zend_Form_Element_Hidden('iduser');
    $id->addFilter('Int');
    
    $name = new Zend_Form_Element_Text('name');
    $name->setLabel('Name')
         ->setRequired(true)
         ->addFilter('StripTags')
         ->addFilter('StringTrim')
         ->addValidator('NotEmpty');
    
    $email = new Zend_Form_Element_Text('email');
    $email->setLabel('Email')
         ->setRequired(true)
         ->addFilter('StripTags')
         ->addFilter('StringTrim')
         ->addValidator('NotEmpty');
    
    $password = new Zend_Form_Element_Password('password');
    $password->setLabel('Password')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty');
    
    $address = new Zend_Form_Element_Text('address');
    $address->setLabel('Address')
            ->setRequired(false)
            ->addFilter('StripTags')
            ->addFilter('StringTrim');
    
    $description = new Zend_Form_Element_Textarea('description');
    $description->setLabel('Description')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
    
    $pets = new Zend_Form_Element_MultiCheckbox('pets');
    $pets->setLabel('Pets')
         ->setRequired(false)
         ->setMultiOptions(array(1=>'Cat', 2=>'Dog', 3=>'Horse'));
    
    $sports = new Zend_Form_Element_Multiselect('sports');
    $sports->setLabel('Sports')
           ->setRequired(true)
           ->setMultiOptions(array(1=>'Futbol', 2=>'Basket', 3=>'Beisbol'));
    
    $gender = new Zend_Form_Element_Radio('genders_idgender');
    $gender->setLabel('Gender')
           ->setRequired(true)
           ->setMultiOptions(array(1=>'H', 2=>'M', 3=>'O'))
           ->addValidator('NotEmpty');
    
    $photo = new Zend_Form_Element_File('photo');
    $photo->setLabel('Photo')
          ->setDestination(APPLICATION_PATH.'/../public/uploads')
          ->addValidator('size', false, 1024000)
          ->setMaxFileSize(1024000);
    
    $city = new Zend_Form_Element_Select('cities_idcity');
    $city->setLabel('City')
         ->setRequired(true)
         ->setMultiOptions(array(1=>'BCN', 2=>'VGO', 3=>'SCQ')) 
         ->addValidator('NotEmpty');
    
    $rol = new Zend_Form_Element_Text('roles_idrol');
    $name->setLabel('Rol')
    ->setRequired(true)
    ->addFilter('StripTags')
    ->addFilter('StringTrim')
    ->addValidator('NotEmpty');
    
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setAttrib('id', 'submitbutton');
    
    $this->addElements(array($id, $name, $email, $password, $address, $description, $pets, $sports, $gender, $photo, $city, $submit));
    }
}
