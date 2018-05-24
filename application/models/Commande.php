<?php

class Application_Model_Commande
{
  private $_dbTable;

  public function __construct()
  {
    $this->_dbTable = new Application_Model_DbTable_Commandes();
  }

  public function selectCommande($key)
  {
    $s = $this->_dbTable->select()
    ->from (array('co'=>'commandes'),
    array('co.id_commande','Numero_commande' => 'co.Numero_commande','Date_commande' => 'co.Date_commande',
    'Nombre_article' => new Zend_Db_Expr('COUNT(DISTINCT a.id_article)'),
    'Montant_HT' => new Zend_Db_Expr('SUM(a.Prix_unitaire*a.Quantite)')))
    ->joinLeft (array('a' => 'articles'),'a.id_commande = co.id_commande',array())
    ->joinLeft (array('c' => 'clients'),'co.id_client = c.id',array())
    ->where('co.id_client='. $key .'')
    ->group ("co.id_commande");
    return $this->_dbTable->fetchAll($s);
  }
}
