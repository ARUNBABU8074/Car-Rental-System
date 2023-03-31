<?php

include 'config.php';

//booking driver date
if(!empty($_POST['pdate'])){
    $pdate= $_POST['pdate'];
    
    $d_id= $_POST['d'];
    $day=date("Y-m-d");
    if($pdate<$day){
        echo '<span>please check the date once again!!!!!</span>';
        echo "<script>$('#bkd').prop('disabled',true);</script>";
    }
    else{
        echo "<script>$('#bkd').prop('disabled',false);</script>";
    $sql="SELECT * FROM `dbook` WHERE `driver_id`='$d_id' AND `stat`=1;";
    $result2 = $conn->query($sql);
			if ($result2->num_rows > 0){
                while ($row = $result2->fetch_assoc()) {
                    $pd=$row['book_date'];
                    $dd=$row['drop_date'];
                    if($pdate>=$pd && $pdate<=$dd){
                        echo '<span> Driver not available in this date</span>';
                        echo "<script>$('#bkd').prop('disabled',true);</script>";
                    }
                    else{
                        echo "<script>$('#bkd').prop('disabled',false);</script>";
                    }
                    if(isset($_POST['ddate'])){
                        $ddate=$_POST['ddate'];
                        if($pdate<=$pd && $ddate>=$dd){
                            echo '<span> driver not available in this date</span>';
                            echo "<script>$('#bkd').prop('disabled',true);</script>";
                        }
                        else{
                            echo "<script>$('#bkd').prop('disabled',false);</script>";
                        }
                    }
                    
                }

            }
            
        }
    
}

//drop-off date
if(!empty($_POST['ddate'])){
    $ddate= $_POST['ddate'];
    $pdate= $_POST['pdate'];
    $d_id= $_POST['d'];
    $day=date("Y-m-d");

    if($ddate<$day || $ddate<$pdate){
        echo '<span>please check the date once again!!!!!</span>';
        echo "<script>$('#bkd').prop('disabled',true);</script>";
    }
    else{
        echo "<script>$('#bkd').prop('disabled',false);</script>";
    $sql="SELECT * FROM `dbook` WHERE `driver_id`='$d_id' AND `stat`=1;";
    $result2 = $conn->query($sql);
			if ($result2->num_rows > 0){
                while ($row = $result2->fetch_assoc()) {
                    $pd=$row['book_date'];
                    $dd=$row['drop_date'];
                    
                    if($ddate>=$pd && $ddate<=$dd){
                        echo '<span> driver not available in this date</span>';
                        echo "<script>$('#bkd').prop('disabled',true);</script>";
                    }
                   else if($pdate<=$pd && $ddate>=$dd){
                        echo '<span> driver not available in this date</span>';
                        echo "<script>$('#bkd').prop('disabled',true);</script>";
                    }
                    else if($ddate==$pd){
                        echo '<span> driver not available in this date</span>';
                        echo "<script>$('#bkd').prop('disabled',true);</script>";
                    }
                    else{
                        echo "<script>$('#bkd').prop('disabled',false);</script>";
                    }
                }

            }
            
        }
    
}

?>