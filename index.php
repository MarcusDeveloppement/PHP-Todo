<?php 
const ERROR_REQUIRED = 'Veuillez renseigner une tache';
const ERROR_TOO_SHORT = 'Veuillez entrer au moins 5 caractères';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$todo = $_POST['todo'] ?? '';

    if(!$todo) {
        $error = ERROR_REQUIRED;
    }elseif (mb_strlen($todo)<5){
        $error = ERROR_TOO_SHORT;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <?php require_once'./components/head.php' ?>
    <title>Todo</title>
</head>
<body>
    <div class="container">
        <?php require_once './components/header.php'?>
    <div class="content">
        <div class="todo-container">
            <h1>Todo</h1>
            <form class="todo-form" action="/" method="POST">
                <input name= "todo" type="text">
                <button class="btn btn-primary">Ajouter</button>
            </form>
            <?php if($error): ?>
                <p class="text-danger"><?=$error ?></p>
            <?php endif;?>
            <div class="todo-list"></div>
        </div>
    </div>
    <?php require_once './components/footer.php'?>
    </div>
</body>
</html>
