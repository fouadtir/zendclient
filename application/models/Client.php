<?php

class Application_Model_Client
{
  private $_dbTable;
  private $_dbTableCommande;
  private $_dbTableArticle;

  public function __construct()
  {
    $this->_dbTable = new Application_Model_DbTable_Clients();
    $this->_dbTableCommande = new Application_Model_DbTable_Commandes();
    $this->_dbTableArticle = new Application_Model_DbTable_Articles;
  }

  public function createClient($array)
  {
    $this->_dbTable->insert($array);
  }

  public function updateClient($array,$id)
  {
    $this->_dbTable->update($array,'id = '.$id.'');
  }
  public function selectAllClient()
  {
    $s = $this->_dbTable->select()
    ->from (array('c'=>'clients'),
            array('id' => 'c.id','Numero_client' => 'c.Numero_client','Nom' => 'c.Nom',"Prenom" => 'c.Prenom',
            "Email" => 'c.Email',"Date_naissance" => 'c.Date_naissance','id_commande'=>'co.id_commande',
            'Nombre_commande' => new Zend_Db_Expr('COUNT(DISTINCT co.id_commande)'),
            'Montant_total' => new Zend_Db_Expr('SUM(a.Quantite * a.Prix_unitaire)'),
            'Date_dernier_achat' => new Zend_Db_Expr('MAX(co.Date_commande)')
          ))
    ->joinLeft (array('co' => 'commandes'),'co.id_client = c.id',array())
    ->joinLeft (array('a' => 'articles'),'co.id_commande = a.id_commande',array())
    ->group ("c.id")
    ->setIntegrityCheck(false);
     return $this->_dbTable->fetchAll($s);
  }
  public function selectClient($key)
  {
    $s = $this->_dbTable->select()
    ->from(array('c'=>'clients'))
    ->where('id='.$key.'');
    return $this->_dbTable->fetchAll($s);
  }
  public function deleteClient($key)
  {
    $this->_dbTable->delete('id='.$key.'');

  }
  public function deleteCommande($key)
  {
    $this->_dbTableCommande->delete('id_client='.$key.'');
  }
  public function deleteArticle($key)
  {
    $this->_dbTableArticle->delete('id_commande='.$key.'');

  }

}
