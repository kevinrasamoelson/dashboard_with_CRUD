<?php

require __DIR__ ."../../vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$nom = $_POST['name'];
$medicament = $_POST['medicament'];
$pharmacie = $_POST['pharmacie'];
$date = $_POST['date'];

$html = '<h1>Pharma-<span style="color:red;">MALA</span ><span style="color:green;">GASY</span></h1>';
$html .= '<img src="image.png">';
$html .= "Votre facture d'ordonance de :  $name";
$html .= "Sortie par :$pharmacie";
$html .= "Fin le : $date";

$options = new Options;
$options ->setChroot(__DIR__);

$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", landscape);

//$dompdf->loadHtml($html);
$dompdf->file_get_contents(design.php);

$dompdf->render();

$dompdf ->addInfo("titre","Ordonnance");
$dompdf->stream("ordonnance.pdf", ["Attachement" => 0] );

