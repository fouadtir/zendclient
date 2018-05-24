<?php
class CommandesController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }
    public function indexAction()
    {
      $data = new Application_Model_Commande();
      $dataCommande= $data->selectCommande($_GET['id']);
      echo'
      <table>
      <caption>Liste des commandes</caption>
      <tr>
          <th>Numero commande</th>
          <th>Date de commande</th>
          <th>Nombre d\'article</th>
          <th>Montant HT</th>
      </tr>
      ';
 foreach ($dataCommande as $value) {
echo '
    <tr>
        <td>'.$value->Numero_commande.'</td>
        <td>'.substr($value->Date_commande,0,-9).'</td>
        <td><a href="articles?id='.$value->id_commande.'">'.$value->Nombre_article.'</td>
        <td>'.$value->Montant_HT.'</td>
    </tr>';
   }
   echo '</table>';
    }
}
