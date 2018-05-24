<?php

class Application_Model_Articles
{
  private $_dbTable;

  public function __construct()
  {
    $this->_dbTable = new Application_Model_DbTable_Articles();
  }
  public function selectArticle($key)
  {
    $s = $this->_dbTable->select()
    ->from (array('a'=>'articles'))
    ->join (array('co' => 'commandes'),'co.id_commande = a.id_commande',array())
    ->where('a.id_commande='. $key .'');
    return $this->_dbTable->fetchAll($s);
  }
  }
