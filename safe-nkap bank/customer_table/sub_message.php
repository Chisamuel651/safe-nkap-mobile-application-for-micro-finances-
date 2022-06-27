<?php 
    $con = mysqli_connect("localhost","root","Some123one45","safe-nkap-bank") or die("database error");
    // get user message throught ajax
    $getMessage = mysqli_real_escape_string($con, $_POST['text']);

    // check user query to database query
    $check_data = "select replies from chatbot where queries like '%$getMessage%'";
    $validate_data = mysqli_query($con, $check_data) or die("error");

    if (mysqli_num_rows($validate_data) > 0) {
        $fetch_data = mysqli_fetch_assoc($validate_data);
        $reply = $fetch_data['replies'];
        echo $reply;
    } else {
        echo "Sorry! i can't be able to interprete your answer ask me something else :)";
    }
?>