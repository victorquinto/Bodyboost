<?php

include_once('conexao.php');

if(isset($_POST['id'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    if(!filter_var($id, FILTER_VALIDATE_INT)){
        die(' ID invalido.');
    }
    $stmt = $conexao->prepare("DELETE FROM pjp WHERE id=?");

    if($stmt===false){
        die('Prepare failed: ' . htmlspecialchars($conexao->error));
    }

    $stmt->bind_param("i", $id);

    if($stmt->execute()){
        header('Location:home.html');
        exit();
    }else{
        die('Execute failed:' . htmlspecialchars($stmt->error));

    }
    
    $stmt->close();
}else{
    header('Location:sistemap.php');
    exit();
}

$conexao->close();
?>