<?php

require '../../../model/config.php';

if(isset($_POST['form_submitted']) && isset($_POST['id'])) {

    $property_ids = $_POST['id'];

 
    foreach ($property_ids as $property_id) {
     
        $property_name = $_POST['property_name'][$property_id];
        $type = $_POST['type'][$property_id];
        $location = $_POST['location'][$property_id];
        $size = $_POST['size'][$property_id];
        $room = $_POST['room'][$property_id];
        $price = $_POST['price'][$property_id];

      
        $query = "UPDATE properties SET properties_name = '$property_name',type = '$type',
                  location = '$location',size = '$size',room = '$room',price = '$price'
                  WHERE id = $property_id";

      
        if (mysqli_query($conn, $query)) {
            echo "Property with ID $property_id updated successfully.<br>";
            header('location:../../agentproperties_listing.php');
        }
        else {
            echo "Error updating property with ID $property_id: " . mysqli_error($conn) . "<br>";
        }
    }
} else {
    echo "Form not submitted or no properties selected.";
}

mysqli_close($conn);
?>
