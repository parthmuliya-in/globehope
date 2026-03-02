<?php
require '../../include/config.php';

if(isset($_GET['destination_id'])){

    $destination_id = intval($_GET['destination_id']);

    $query = mysqli_query($conn,
        "SELECT id, title FROM itineraries 
         WHERE destination_id = $destination_id"
    );

    if(mysqli_num_rows($query) > 0){

        while($row = mysqli_fetch_assoc($query)){
            echo "<label>
                    <input type='checkbox' 
                           name='related_itineraries[]' 
                           value='{$row['id']}'>
                    ".htmlspecialchars($row['title'])."
                  </label>";
        }

    } else {
        echo "<p style='color:#999;'>No itineraries found for this destination</p>";
    }
}
?>