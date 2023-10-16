<?php
// Fonctions servant à appeler les pages qui n'ont pas de données provenant de la base de données 
class Controller_Produits extends Controller
{
    // Affichage de la page d'accueil

    public function Accueil()
    {

        $session = new Session();
        if (isset($_SESSION['panier'])) {


            $cart = $_SESSION['panier'];

            if (!empty($cart)) {

                $ids = array_keys($cart);
                if (empty($ids)) {
                    $arr = array();
                } else {
                    $arr = implode(',', $ids);
                }
                $produit = new model_produit;
                $lines = $produit->find_in();
            } else {
                $arr = array();
            }
        }
        $search = "";
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }


        $produit = new model_produit;
        $produits = $produit->all();

        $myView = new View('accueil');
        if (!empty($lines)) {
            $produits['panier'] = $lines;
        }
        $produits['titre'] = 'Accueil';

        $myView->render($produits);
    }


    public function maj_panier($reponse)
    {

        $session = new Session();
        $id = isset($reponse['id']) ? $reponse['id'] : -1;
        $add = isset($reponse['add']);
        $del = isset($reponse['del']);
        $raz = isset($reponse['raz']);
        $plus = isset($reponse['plus']);
        $moins = isset($reponse['moins']);


        if ($id > 0) {
            $products  = new model_produit;
            $rep = $products->find(
                array(
                    'id' =>  $id,
                )
            );
        } else {

            unset($_SESSION['panier']);
            $session->setFlash("OK,panier bien supprimé");
        }

        if (!empty($rep)) {
            $rep = $rep[0];

            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = [];
            }
            if ($raz) {
                unset($_SESSION['panier']);
                $session->setFlash("OK,panier bien supprimé");
                $session->render('shopping');
            }
            if ($add or $plus) {
                if (isset($_SESSION['panier'][$rep->id])) {
                    $_SESSION['panier'][$rep->id]++;
                } else {
                    $_SESSION['panier'][$rep->id] = 1;
                }

                $session->setFlash("OK,item $rep->id bien ajoué", 'success');
            }
            if ($moins) {
                if (isset($_SESSION['panier'][$rep->id]) and $_SESSION['panier'][$rep->id] > 1) {
                    $_SESSION['panier'][$rep->id]--;
                } else {
                    unset($_SESSION['panier'][$rep->id]);
                }

                $session->setFlash("OK,item $rep->id bien ajoué", 'success');
            }
            if ($del) {
                if (isset($_SESSION['panier'][$rep->id])) {
                    unset($_SESSION['panier'][$rep->id]);
                }
                $session->setFlash("OK,item $rep->id bien supprimé");
            }
        }


        $session->render('accueil');
    }
}
