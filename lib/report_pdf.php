<?php
require('autoload.php');
require('../fpdf17/fpdf.php');

class PDF extends FPDF
{

function Header()
{
    global $titre;

    // Arial gras 15
    $this->SetFont('Arial','B',15);
        

    // Saut de ligne
    $this->Ln(10);
}

function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Arial italique 8
    $this->SetFont('Arial','I',8);
    // Couleur du texte en gris
    $this->SetTextColor(128);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function TitreChapitre($num, $libelle)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Couleur de fond
    $this->SetFillColor(200,220,255);
    // Titre
    $this->Cell(0,6,"Chapitre $num : $libelle",0,1,'L',true);
    // Saut de ligne
    $this->Ln(4);
}

function test()
{
   
}

function AjouterContenu($num, $titre)
{
    $this->AddPage();
    $this->TitreChapitre($num,$titre);
    $this->CorpsChapitre();
}

function addCompanyAdress()
{
	$this->SetFont( 'Arial', '', 10 );
	// Positionnement sur Y
    $this->SetY(50);    
    // Couleur du texte en noir
    $this->SetTextColor(0,0,0);
	// Tableau
	$this->Cell(65,5,utf8_decode("Hydro Evolution"),0,0,'L',false);
	$this->Cell(65,5,utf8_decode("Tél/Phone : 514-416-0335"),0,1,'L',false);
	$this->Cell(65,5,utf8_decode("3990 Jarry Est, Suite 20"),0,0,'L',false);
	$this->Cell(65,5,utf8_decode("E-mail : info@hydro-evolution.com"),0,1,'L',false);
	$this->Cell(65,5,utf8_decode("Montréal, QC H1Z 0A5"),0,0,'L',false);
	$this->Cell(65,5,utf8_decode("Web: www.hydro-evolution.com"),0,1,'L',false);
	
}

function addTabInvoice($date,$salesRep,$contact)
{	
	// "Invoice" cell

$this->SetY(10);
$this->SetX(140);
$this->SetTextColor( 0, 0, 0 );
$this->SetFillColor( 0,139,69 );

$this->Cell( 60, 10, "Facture / Invoice", 1, 1, 'C', true );
$this->SetY(20);
$this->SetX(140);
$this->Cell( 60, 5, "Num/Number :", 0, 1, 'L', false );
$this->SetY(25);
$this->SetX(140);
$this->Cell( 60, 5, "Contact : $contact", 0, 1, 'L', false );
$this->SetY(30);
$this->SetX(140);
$this->Cell( 60, 5, "Date (m/j-d/y) : $date", 0, 1, 'L', false );
$this->SetY(35);
$this->SetX(140);
$this->Cell( 60, 5, "Consultant : $salesRep", 0, 1, 'L', false );
 
}

function drawLine($X1,$Y1,$X2,$Y2)
{
	$this->Line($X1,$Y1,$X2,$Y2);
}

function addClientDetail($companyName,$contact,$phone,$companyAdress)
{
	$this->SetFont( 'Arial', '', 10 );
	$this->drawLine(11,75,65,75);
	//$this->drawLine(76,75,140,75);
	$this->SetY(70);	
   

   
    // Couleur du texte en noir
    $this->SetTextColor(0,0,0);
	
	// Tableau
	$this->Cell(65,5,utf8_decode("Facturé à / Bill To "),0,0,'L',false);
	//$this->Cell(65,6,utf8_decode("Envoyer à / Ship To"),0,1,'L',false);
	$this->Ln(8);
	$this->Cell(30,5,utf8_decode("Nom/Name :"),0,0,'L',false);
	$this->Cell(30,5,utf8_decode("$companyName"),0,1,'L',false);
	$this->Cell(30,5,utf8_decode("Adresse/Adress :"),0,0,'L',false);
	$this->Cell(30,5,utf8_decode("$companyAdress"),0,1,'L',false);
	$this->Cell(30,5,utf8_decode("Contact :"),0,0,'L',false);
	$this->Cell(30,5,utf8_decode("$contact"),0,1,'L',false);
	$this->Cell(30,5,utf8_decode("Tél/Phone :"),0,0,'L',false);
	$this->Cell(30,5,utf8_decode("$phone"),0,1,'L',false);
	
	
	
	
}

function  gstCalculator ($number)
{
	return $number*0.05;
}
function  qstCalculator ($number)
{
	return $number*0.09975;
}

function contentTable($header,$data)
{
    // Couleurs, épaisseur du trait et police grasse
	$this->SetFont( 'Arial', '', 8 );
    $this->SetFillColor(0,139,69);
    $this->SetTextColor(0, 0, 0);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // En-tête
    $w = array(15,25, 45, 40,35, 30);
	$this->Ln();
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],12,$header[$i],1,0,'C',true);
    $this->Ln();
	//$this->Cell(6,$submissionCalculus->del_qty(),'LR',0,'L',$fill);
    // Restauration des couleurs et de la police
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Données
	$subTotal=0.0;
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,"Voir fiche/See list",'LR',0,'L',$fill);
        $this->Cell($w[3],6,number_format((float)$row[3],2,',',' '),'LR',0,'R',$fill);
		$this->Cell($w[4],6,number_format((float)$row[4],2,',',' '),'LR',0,'R',$fill);
		$this->Cell($w[5],6,number_format((float)$row[5],2,',',' '),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
		$subTotal+=(float)$row[5];
    }
    // Trait de terminaison
	$this->Cell(array_sum($w),0,'','T');
	
	$this->Ln(7);
	$this->SetFont( 'Arial', '', 11 );
	$this->setX(140);
	
	
	$this->Cell(30,6,"Sous-total :",0,0,'L',false);
	$this->Cell(30,6,number_format((float)$subTotal,2,',',' ') ,0,1,'R',false );
	$this->setX(140);
	$this->Cell(30,6,"Installation :",0,0,'L',false);
	$this->Cell(30,6,0,0,1,'R',false);
	$this->setX(140);
	$this->Cell(30,6,"Total :",0,0,'L',false);
	$this->Cell(30,6,number_format((float)$subTotal,2,',',' '),1,1,'R',false);
	
	$gstVal = self::gstCalculator($subTotal);
	$this->Ln(7);
	$this->setX(140);
	$this->Cell(30,6,"T.P.S/G.S.T :",0,0,'L',false);
	$this->Cell(30,6,number_format((float)$gstVal,2,',',' '),0,1,'R',false );
	
	$qstVal = self::qstCalculator($subTotal);
	$this->setX(140);
	$this->Cell(30,6,"T.V.Q/Q.S.T :",0,0,'L',false);
	$this->Cell(30,6,number_format((float)$qstVal,2,',',' ') ,0,1,'R',false );
	
	$this->setX(140);
	$this->Cell(30,6,"Total+Taxes :",0,0,'L',false);
	$this->Cell(30,6,number_format((float)$subTotal+$gstVal+$qstVal,2,',',' ') ,1,1,'R',false );
    
}

} // fin classe pdf


if (isset ($_POST['submit']))
{

 $companyName = $_POST['companyName'];
 $contact = $_POST['companyContact'];
 $phone= $_POST['phone'];
 $companyAdress = $_POST['companyAdress'];
 $salesRep = $_POST['representative'];
 
$qty =$_POST['LedQuantity'];
$code= $_POST['LedModel'];
$unitPrice= $_POST['LedUnitPriceLed'];
$subTot = $qty * $unitPrice;

$qty2 =$_POST['LedQuantity2'];
$code2= $_POST['LedModel2'];
$unitPrice2= $_POST['LedUnitPriceLed2'];
$subTot2 = $qty2 * $unitPrice2;



$pdf = new PDF('P','mm','A4');
$header = array('QTE/QTY', 'CODE', 'PRODUIT/PRODUCT', 'PRRIX UNIT/U.PRICE', 'GUARAN/WARR(YRS)', 'SUB-TOT');
$data = array(
          array( $qty, $code, 0, $unitPrice, 0, $subTot ),
          array( $qty2, $code2, 0, $unitPrice2, 0, $subTot2 ),				            
        );
$date=date("m/d/Y");
   
$pdf->AddPage();
$pdf->Image('../Web/images/logo2.jpg',8,10,60,30); 

$pdf->addCompanyAdress();
$pdf->addTabInvoice($date,$salesRep,$contact);
$pdf->addClientDetail($companyName,$contact,$phone,$companyAdress);

// recuperation des donnees
//$data = $pdf->LoadData('pays.txt');
$pdf->contentTable($header,$data);
$submission = New Submission();
$pdf->Write(5,$submission->contratNumber());
$pdf->Output('http://localhost/Hydro-Evolution/lib/report_pdf.php','I');

}

?>