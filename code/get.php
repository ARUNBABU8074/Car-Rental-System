<?php
// Fetch the data from the API
$data = file_get_contents('http://postalpincode.in/api/pincode/'.$_POST['pincode']);
$data = json_decode($data);

// Check if the data is valid
if(isset($data->PostOffice[0])){
    // Create an array to store the names of all the post offices
    $postOffices = array();
    
    // Loop through all the post offices and store their names in the array
    foreach($data->PostOffice as $postOffice){
        $postOffices[] = $postOffice->Name;
    }
    $postOffices['dis']=$data->PostOffice['0']->District;
    // Output the array as a JSON-encoded string
    echo json_encode($postOffices);
} else {
    echo 'no';
}
?>