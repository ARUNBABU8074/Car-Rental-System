<?php
// (c) Xavier Nicolay
// Exemple de génération de devis/facture PDF

require('invoice.php');
require_once 'config.php';
$query="SELECT * from driverpay where dbook_id='1';" ;
$data = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($data ))   
{
    $day=date("Y-m-d");
    $d=$row['pdate'];
    $b=$row['dbook_id'];
    $query1="SELECT * from dbook where book_id='$b';" ;
$data1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_assoc($data1);
$cus_id=$row1['cus_id'];
$d_id=$row1['driver_id'];
$query2="SELECT * from customer where cus_id='$cus_id';" ;
$data2 = mysqli_query($conn,$query2);
$row2 = mysqli_fetch_assoc($data2);
$cname=$row2['fname'];
$clname=$row2['lname'];
$email=$row2['email'];
$phone=$row2['phone'];
$query3="SELECT * from driver where driver_id='$d_id';" ;
$data3 = mysqli_query($conn,$query3);
$row3 = mysqli_fetch_assoc($data3);
$dname=$row3['fname'];
$dlname=$row3['lname'];
$demail=$row3['email'];
$dphone=$row3['phone'];
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "Payment Done By:\n\n",
                  "\n".$cname ." ".$clname.
                  "\n Email : ".$email.
                  "\n Phone: " .$phone);
$pdf->fact_dev( "Car ", "Rental" );
$pdf->temporaire( "Car Rental" );
$pdf->addDate($day);
// $pdf->addClient("CL01");
$pdf->addPageNumber("1");
$pdf->addClientAdresse( "Payment To:\n\n".
$dname ." ".$dlname.
"\n Email : ".$demail.
"\n Phone: " .$dphone);
$pdf->addReglement("Online");
$pdf->addEcheance($d);
$pdf->addNumTVA($row['payment_id']);
// $pdf->addReference("Devis ... du ....");
$cols=array( "NO"    => 23,
             "DESCRIPTION"  => 78,
             "KM DRIVEN"     => 22,
             "AMOUNT"      => 26,
            //  "MONTANT H.T." => 30,
            //  "TVA"          => 11 
            );
$pdf->addCols( $cols);
$cols=array( "NO"    => "L",
             "DESCRIPTION"  => "L",
             "KM DRIVEN"     => "C",
             "AMOUNT"      => "R",
            //  "MONTANT H.T." => "R",
            //  "TVA"          => "C" 
            );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 109;
$line = array( "NO"    => "1",
               "DESCRIPTION"  => "This payment is for driving car\n" 
                                //  ."Processeur AMD 1Ghz\n" .
                                //  "128Mo SDRAM, 30 Go Disque, CD-ROM, Floppy, Carte vidéo"
                                 ,
               "KM DRIVEN"     => "1",
               "AMOUNT"      => "600.00",
            //    "MONTANT H.T." => "600.00",
            //    "TVA"          => "1" 
            );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

// $line = array( "REFERENCE"    => "REF2",
//                "DESIGNATION"  => "Câble RS232",
//                "QUANTITE"     => "1",
//                "P.U. HT"      => "10.00",
//                "MONTANT H.T." => "60.00",
//                "TVA"          => "1" );
// $size = $pdf->addLine( $y, $line );
$y   += $size + 2;

$pdf->addCadreTVAs();
        
// invoice = array( "px_unit" => value,
//                  "qte"     => qte,
//                  "tva"     => code_tva );
// tab_tva = array( "1"       => 19.6,
//                  "2"       => 5.5, ... );
// params  = array( "RemiseGlobale" => [0|1],
//                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
//                      "remise"         => value,     // {montant de la remise}
//                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
//                  "FraisPort"     => [0|1],
//                      "portTTC"        => value,     // montant des frais de ports TTC
//                                                     // par defaut la TVA = 19.6 %
//                      "portHT"         => value,     // montant des frais de ports HT
//                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
//                  "AccompteExige" => [0|1],
//                      "accompte"         => value    // montant de l'acompte (TTC)
//                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
//                  "Remarque" => "texte"              // texte
// $tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
//                     array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
// $tab_tva = array( "1"       => 19.6,
//                   "2"       => 5.5);
// $params  = array( "RemiseGlobale" => 1,
//                       "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
//                       "remise"         => 0,       // {montant de la remise}
//                       "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
//                   "FraisPort"     => 1,
//                       "portTTC"        => 10,      // montant des frais de ports TTC
//                                                    // par defaut la TVA = 19.6 %
//                       "portHT"         => 0,       // montant des frais de ports HT
//                       "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
//                   "AccompteExige" => 1,
//                       "accompte"         => 0,     // montant de l'acompte (TTC)
//                       "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
//                   "Remarque" => "Avec un acompte, svp..." );

// $pdf->addTVAs( $params, $tab_tva, $tot_prods);
// $pdf->addCadreEurosFrancs();
$pdf->Output();
}
?>