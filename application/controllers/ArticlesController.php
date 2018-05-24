<?php
class ArticlesController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }
    public function indexAction()
    {
      $data = new Application_Model_Articles();
      $dataArticle= $data->selectArticle($_GET['id']);
      echo'
      <table>
      <caption>Liste des articles</caption>
      <tr>
          <th>Numero article</th>
          <th>Nom article</th>
          <th>Prix unitiare</th>
          <th>Quantité</th>
      </tr>';
 foreach ($dataArticle as $value) {
echo '
    <tr>
        <td>'.$value->Numero_article.'</td>
        <td>'.$value->Nom_article.'</td>
        <td>'.$value->Prix_unitaire.'</td>
        <td>'.$value->Quantite.'</td>
    </tr>';
     }
   echo '</table>';
  }
}
