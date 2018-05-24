<?php

class ModifClientController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $form = new Application_Form_Modifclient();
      $this->view->form = $form;
      $var = $this->getRequest()->getPost();
      if(isset ($_POST['valider'])){
        $dataClient = new Application_Model_Client();
        $dataClient -> updateClient(array(
          'Numero_client' => $var['numeroClient'],
          'Nom' => $var['nom'],
          'Prenom' => $var['prenom'],
          'Email' => $var['email'],
          'Date_naissance' => $var['dateNaissance']
        ),$_GET['id']);
        header('Location: ../index.php');
        exit();
        echo 'Modification enregistré';
      }

    }


}
