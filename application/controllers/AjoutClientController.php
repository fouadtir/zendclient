<?php

class AjoutClientController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_AjoutClient();
        $this->view->form = $form;
        if($this->getRequest()->isXmlHttpRequest()){
          $value = $this->getRequest()->getPost();
            $client = new Application_Model_Client();
            $client ->createClient(array(
              'Numero_client' => $value['numeroClient'],
              'Nom' => $value['nom'],
              'Prenom' => $value['prenom'],
              'Email' => $value['email'],
              'Date_naissance' => $value['dateNaissance']
            ));
                  $this->_helper->layout()->disableLayout();
                  $this->_helper->viewRenderer->setNoRender(true);
                  echo json_encode('success');
            } else {
            echo 'les champs ne sont pas remplis';
            }

  }

}
