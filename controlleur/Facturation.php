<?php
    include "vue/entete.html.php";
    include_once "modele/bd.facturation.php";
    include_once "modele/bd.activite.php";
    include_once "modele/bd.session.php";
    include_once "modele/bd.participe.php";
    include_once "modele/bd.congressiste.php";
    require('modele/fpdf.php'); 



$congressiste = new Congressiste();
$AllCongressiste = $congressiste->getAllCongressisteNoFacture();


if (isset($_POST['cr'])) {
   $facture = new facturation(0, $_POST["valeurBooleenne"],$_POST["date"],$_POST["congressiste"],$_POST["montant"]);
   $facture->createFacture();
}
if (isset($_POST['md'])) {
    $facture = new facturation($_POST["id_facture"], $_POST["valeurBooleenne2"],$_POST["date"],$_POST["congressiste"],$_POST["montant"]);
    $facture->ModifierFacture();
}
$Total = 'Selectionner un congressiste';


if (isset($_GET["idd_congressiste"])){
    $facture = new facturation();
    $UneFactureId = $facture->GetOneFacture($_GET["id"]);
    
    $valeur_bool =$UneFactureId->StatutPaiement;

    $activite = new Activite();
    $TotActiv = $activite->getTotalMontantActivites($_GET["idd_congressiste"]);

    $session = new Session();
    $TotSession = $session->getTotalMontantSessions($_GET["idd_congressiste"]);

    $congressiste = new Congressiste();
    $TotCong = $congressiste->getTotalMontantCongre($_GET["idd_congressiste"]);
    
    $congressiste = new Congressiste();
    $petitDej = $congressiste->aPrisPetitDejeuner($_GET["idd_congressiste"]);
    if ($petitDej) {
        $PrixPetitDej = 10;
    }else {
        $PrixPetitDej = 0;
    }
    $participe = new Participe();
    $res = $participe->getIdActivitebyIDcongre($_GET["idd_congressiste"]); 
    
    $TotalModif = $TotActiv + $TotSession + $TotCong  + $PrixPetitDej ;

    $DetailFacture = $facture->GetAllDetailFacture($_GET["id"]);
}


if (isset($_GET["id_congressiste"])){

    $congressiste = new Congressiste();
    $petitDej = $congressiste->aPrisPetitDejeuner($_GET["idd_congressiste"]);
    if ($petitDej) {
        $PrixPetitDej = 10;
    }else {
        $PrixPetitDej = 0;
    }

    $activite = new Activite();
    $TotActiv = $activite->getTotalMontantActivites($_GET["create"]);

    $session = new Session();
    $TotSession = $session->getTotalMontantSessions($_GET["create"]);

    $congressiste = new Congressiste();
    $TotCong = $congressiste->getTotalMontantCongre($_GET["create"]);
    
    $participe = new Participe();
    $res = $participe->getIdActivitebyIDcongre($_GET["create"]); 
    
    $Total = $TotActiv + $TotSession + $TotCong + $PrixPetitDej ;
    $TotalFac = $TotActiv + $TotSession + $TotCong + $PrixPetitDej ;   

}


if (!(isset($_GET['filter']) && ($_GET['filter'] === 'paid' || $_GET['filter'] === 'unpaid'))) {
$facture = new facturation();    
$AllFacture = $facture->GetAllFacture(); 
}

if (isset($_GET['filter']) && $_GET['filter'] === 'paid') {
$facturepaid = new facturation();
$AllFacture = $facturepaid->GetAllFacturePaid();

}

if (isset($_GET['filter']) && $_GET['filter'] === 'unpaid') {

    $factureunpaid = new facturation();
    $AllFacture = $factureunpaid->GetAllFactureUnPaid();

}

if (isset($_GET['pdf'])){
    $pdf = new FPDF();
    $pdf->AddPage();
    $euro = iconv('utf-8', 'cp1252', '€');


    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Details de la facture', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', '', 12);

    $pdf->Cell(0, 10, 'Nom: ' . $DetailFacture['congres'][0]->Nom, 0, 1);
    $pdf->Cell(0, 10, 'Prenom: ' . $DetailFacture['congres'][0]->Prenom, 0, 1);

    
    $pdf->Cell(0, 10, 'Hotel: ' . $DetailFacture['congres'][0]->NomHotel, 0, 1);

    if ($DetailFacture['congres'][0]->Dejeuner == 1) {
        $pdf->Cell(0, 10, 'Option : Dejeuner inclus + 10'.$euro, 0, 1);
    }

    $pdf->Cell(0, 10, 'Date: ' . $DetailFacture['congres'][0]->Date, 0, 1);

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Activites:', 0, 1);
    $pdf->SetFont('Arial', '', 12);

    foreach ($DetailFacture['activites'] as $uneActivite) {
        $pdf->Cell(0, 10, $uneActivite['NomActivite'] . ' - Montant: ' . $uneActivite['MontantActivite'].$euro, 0, 1);
    }

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Sessions:', 0, 1);
    $pdf->SetFont('Arial', '', 12);


    foreach ($DetailFacture['sessions'] as $uneSession) {
        $pdf->Cell(0, 10, $uneSession['NomSession'] . ' - Montant: ' . $uneSession['MontantSession'].$euro, 0, 1);
    }

    if ($DetailFacture['congres'][0]->Dejeuner == 1) {
        $pdf->Cell(0, 10, 'Detail Prix:  Activites :' .$TotActiv.$euro. ' + Sessions : '. $TotSession.$euro. ' + Hotel: '. $TotCong .$euro .' + Petit dejeuner : 10'.$euro , 0, 1);

    }else{
    $pdf->Cell(0, 10, 'Detail Prix:  Activites :' .$TotActiv.$euro. ' + Sessions : '. $TotSession.$euro. ' + Hotel: '. $TotCong .$euro , 0, 1);
}
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Total Prix: ' . $TotalModif .$euro, 0, 1);

    $pdf->Output("C:\\wamp64\\www\\ap\\facture\\" . $DetailFacture['congres'][0]->Nom . "detail_facture.pdf", 'F');
    



}






include "vue/VueFacturation.php";
?>

<script>
let valeurParametre = <?php echo json_encode($valeur_bool); ?>;
boolSwitchId(valeurParametre);
</script>