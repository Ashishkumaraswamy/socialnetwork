<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $post_id=mysqli_real_escape_string($conn, $_GET['post_id']);
        $commentbyid=mysqli_real_escape_string($conn, $_GET['commentby']);
        $msg=mysqli_real_escape_string($conn, $_GET['message']);
        $query=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$commentbyid}");
        $result=mysqli_fetch_assoc($query);
        $sql=mysqli_query($conn,"INSERT INTO comment(postid,commentby,msg) VALUES({$post_id},'{$result['user_name']}','{$msg}')");
        if($sql){
        echo "success";
    	}
    }
?>