<?php

class Application_Form_Modifclient extends Zend_Form
{

    public function init()
    {
      $data = new Application_Model_Client();
      $dataClient= $data->selectClient($_GET['id']);

      $numeroClient = new Zend_Form_Element_Text('numeroClient');
      $numeroClient->setLabel('Numero client');
      $numeroClient->setValue($dataClient[0]->Numero_client);

      $nom = new Zend_Form_Element_Text('nom');
      $nom->setLabel('Nom');
      $nom->setValue($dataClient[0]->Nom);

      $prenom = new Zend_Form_Element_Text('prenom');
      $prenom->setLabel('Prenom');
      $prenom->setValue($dataClient[0]->Prenom);

      $email = new Zend_Form_Element_Text('email');
      $email->setLabel('Email');
      $email->setValue($dataClient[0]->Email);

      $dateNaissance = new Zend_Form_Element_Text('dateNaissance');
      $dateNaissance->setLabel('Date de naissance');
      $dateNaissance->setValue($dataClient[0]->Date_naissance);
      
      $valider = new Zend_Form_Element_Submit('valider');
      $valider->setLabel('Valider');

      $this->addElements(array($numeroClient,$nom,$prenom,$email,$dateNaissance,$valider));
    }


}
