<?php

class Application_Form_AjoutClient extends Zend_Form
{

    public function init()
    {
      $this->setMethod('post');

      $this->addElement('text', 'numeroClient',array(
          'label' => 'Numero Client :',
          'id' => 'numeroClient',
          'required' => true,
          'class' => 'validate'
      ));

      $this->addElement('text', 'nom',array(
          'label' => 'Nom :',
          'id' => 'nom',
          'required' => true,
          'class' => 'validate'
      ));

      $this->addElement('text', 'prenom',array(
          'label' => 'Prenom :',
          'id' => 'prenom',
          'required' => true,
          'class' => 'validate'
      ));

      $this->addElement('text', 'email',array(
          'label' => 'Email :',
          'id' => 'email',
          'required' => true,
          'class' => 'validate'
      ));

      $this->addElement('text', 'dateNaissance',array(
          'label' => 'Date de naissance :',
          'id' => 'dateNaissance',
          'required' => true,
          'class' => 'validate'
      ));

      $this->addElement('submit', 'valider',array(
          'label' => 'Valider',
          'id' => 'valider',
          'required' => true,
          
      ));


    }


}
