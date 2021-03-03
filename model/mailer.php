<?php
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/ManWatch.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/Watch.php';

$invoice_num=$_GET['id'];
$date=$_GET['date'];

$order=new Order();
$items=$order->fetchOneOrder($_GET['id']);

var_dump($_GET);
var_dump($items);
var_dump($user);
var_dump($_COOKIE);

$firstname=$user->firstname;
$lastname=$user->lastname;
$numadress=$user->numadress;
$adress=$user->adress;
$compadress=$user->compadress;
$postal=$user->postal;
$city=$user->city;
$phone=$user->phone;
$subtotal=0;

for($i=0;isset($items[$i]) && $items[$i];$i++){
    $array=new ManWatch();
    $watch=new Watch();
    $watch->hydrate($array->getProductByID($items[$i]['id_produit']));
    ${"id_produit$i"}=$items[$i]['id_produit'];
    ${"quantite$i"}=$items[$i]['quantite_produit'];
    ${"prix$i"}=$items[$i]['prix'];
    ${"total$i"}=(${"prix$i"})*${"quantite$i"};
    ${"nom_produit$i"}=$watch->getNom();
    ${"marque$i"}=$watch->getMarque();
    $subtotal=$subtotal+${"total$i"};
}

$shipping=7.95*(50/100*$i*7.95);

$total=$subtotal + $shipping;

$html_start = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." end;
}
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#000; "><span style="font-weight: bold; font-size: 14pt;">Von Harper</span><br />2 Rue D\'Hozier<br />13002 Marseille<br /><span style="font-family:dejavusanscondensed;">&#9742;</span>04.91.00.11.22</td>
<td width="50%" style="text-align: right;">Facture N°<br /><span style="font-weight: bold; font-size: 12pt;">' . $invoice_num . '</span></td>
</tr></table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Von Harper SA au capital de 535 900€<br />
RCS Lille B 495 257 360 TVA I.C. FR 25 603 247 952<br />
APE 4269 Z<br />
Page {PAGENO} sur {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<div style="text-align: right">Le ' . $date . '</div>
<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">Facturation :</span><br /><br />' . $lastname . ' ' . $firstname . '<br />' . $numadress . ' ' . $adress . '<br />' . $compadress . '<br />' . $postal . '<br />' . $city . '</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">Adresse : </span><br /><br />' . $lastname . ' ' . $firstname . '<br />' . $numadress . ' ' . $adress . '<br />' . $compadress . '<br />' . $postal . '<br />' . $city . '</td>
</tr></table>
<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="15%">Reference</td>
<td width="10%">Quantite</td>
<td width="45%">Description</td>
<td width="15%">Prix unitaire</td>
<td width="15%">Total</td>
</tr>
</thead>
<tbody>
';

for($i=0;isset($items[$i]) && $items[$i];$i++){
${"html_product$i"}='
        <tr>
        <td align="center">' . ${"id_produit$i"} . '</td>
        <td align="center">' . ${"quantite$i"} . '</td>
        <td>' . ${"nom_produit$i"} . ' - ' . ${"marque$i"} . '</td>
        <td class="cost">' . ${"prix$i"} . '€</td>
        <td class="cost">' . ${"total$i"} . '€</td>
        </tr>';
}

$html_end='
<tr>
<td class="blanktotal" colspan="3" rowspan="3"></td>
<td class="totals">Sous-total :</td>
<td class="totals cost">' . $subtotal . '€</td>
</tr>
<tr>
<td class="totals">Frais de port :</td>
<td class="totals cost">' . $shipping . '€</td>
</tr>
<tr>
<td class="totals"><b>Total :</b></td>
<td class="totals cost"><b>' . $total . '€</b></td>
</tr>
</tr>
</tbody>
</table>
</body>
</html>
';

$html=$html_start;
for($i=0;isset(${"html_product$i"}) && ${"html_product$i"};$i++){
    $html.=${"html_product$i"};
}
$html.=$html_end;

$path = realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/autoload.php';
require_once $path;

$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10,
    'default_font' => 'Courier'
]);

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Facture - Von Harper");
$mpdf->SetAuthor("Von Harper");
$mpdf->SetWatermarkText("Payé");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'Courier';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();