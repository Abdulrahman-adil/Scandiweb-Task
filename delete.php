<?php 
// session_start();
// include 'functions/connection.php';
// if(isset($_POST['item_delete_multi'])){
//     $all_id = $_POST['item_delete_id'];
//     $extract_id = implode(',',$all_id ); 
//     echo "IDs to delete: " . $extract_id . "<br>";

//     $query = "DELETE FROM products WHERE id IN($extract_id)";
//     echo "Query: " . $query . "<br>";

//     $query_run = mysqli_query($connection, $query);

//     if($query_run) {
//         $_SESSION['status'] = "data Deleted Successfully";
//         header("Location: home.php");
//     }else{
//         $_SESSION['status'] = "data not Deleted Successfully";
//         header("Location: home.php");
//     }
// }

?>