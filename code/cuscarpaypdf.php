<?php


require('invoice.php');
require_once 'config.php';
$dbid=$_POST['dbid'];
$query="SELECT * from carpay where book_id='$dbid';" ;
$data = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($data ))   
{
    $day=date("Y-m-d");
    $d=$row['pdate'];
    $b=$row['book_id'];
    $amount=$row['amount'];
    $query1="SELECT * from tbl_booking where book_id='$b';" ;
$data1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_assoc($data1);
$cus_id=$row1['cus_id'];
$d_id=$row1['driver_id'];
$carid=$row1['car_id'];
$from="hi";
$to="bi";
$fd=$row1['book_date'];
$td=$row1['drop_date'];
$km=$row1['end_km']-$row1['start_km'];
$query2="SELECT * from customer,car where customer.cus_id='$cus_id' and car.car_id='$carid';" ;
$data2 = mysqli_query($conn,$query2);
$row2 = mysqli_fetch_assoc($data2);
$cname=$row2['fname'];
$clname=$row2['lname'];
$email=$row2['email'];
$phone=$row2['phone'];
$r_id=$row2['renter_id'];
$query3="SELECT * from renter where renter_id='$r_id';" ;
$data3 = mysqli_query($conn,$query3);
$row3 = mysqli_fetch_assoc($data3);
$dname=$row3['fname'];
$dlname=$row3['lname'];
$demail=$row3['email'];
$dphone=$row3['phone'];
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->Image('images/logo.png',10,10,40,20);

$pdf->fact_dev( "Car ", "Rental" );
$pdf->temporaire( "Car Rental" );
$pdf->addDate($day);

$pdf->addPageNumber("1");
$pdf->SetXY(50, 500);
$pdf->addSociete( "Payment Done By:\n\n",
                  "\n ".$cname ." ".$clname.
                  "\n Email : ".$email.
                  "\n Phone: " .$phone);

$pdf->addClientAdresse( "Payment To:\n\n".
$dname ." ".$dlname.
"\n Email : ".$demail.
"\n Phone: " .$dphone);
$pdf->addReglement("Online");
$pdf->addEcheance($d);
$pdf->addNumTVA($row['payment_id']);

$cols=array( "NO"    => 23,
             "DESCRIPTION"  => 78,
             "Days"     => 30,
             "KM driven"      => 26,
            "Amount" => 30,
           
            );
$pdf->addCols( $cols);
$cols=array( "NO"    => "L",
             "DESCRIPTION"  => "L",
             "Days"     => "C",
             "KM driven"      => "R",
             "Amount" => "R",
            
            );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 109;
$line = array( "NO"    => "1",
               "DESCRIPTION"  => "This is your payment details"."\n" 
                              
                                 ,
               "Days"     => "from: ".$fd."\n"."To : ".$td
                                ,
               "KM driven"      => $km."KM",
                "Amount" => $amount,
          
            );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;


$y   += $size + 2;

// $pdf->addCadreTVAs();
        


$pdf->Output();
}
?>