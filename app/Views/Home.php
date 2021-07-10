<?php ob_start();
$title="COMMANDER ARTICLE";

$css = SRC_ASSETS."css/pageCommande.css";

//for having the number of product in the panier
// $numberProduct = $number_of_product;
?>






<h1>
    ULYSSE
</h1>








<?php 

$content = ob_get_clean();

require_once(SRC_VIEWS.'layouts/app.php');

?>