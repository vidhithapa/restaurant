<?php
    $name=$_POST['name'];
    $phoner=$_POST['phone'];
    $id=$_POST['id'];
    $table_no=$_POST['table'];
    $payment=$_POST['payment'];
    $desc=$_POST['desc'];

    //database connection
    $conn = new mysqli('localhost:3307','root','','','reserve');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into booking(customer_name,phone_number,customer_id,table_no,payment_no,your_order)
        values(?,?,?,?,?,?");
        $stmt->bind_param("ssiiss",$name,$phone,$id,$table,$payment,$desc);
        $stmt->execute();
        echo "Table Booked successfully...";
        $stmt->close();
        $conn->close();
    }
?>
