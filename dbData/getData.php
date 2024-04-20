<?php
$pdo = new PDO($dsn, $user, $password);


if(isset($_POST['blockUser'])){
    $is_Block = $_POST['blockUser'];
    $userId = $_POST['id'];
    $data = [
        'userId' => $userId,
        'is_Block' => $is_Block
    ];
    $sql = 'UPDATE user SET is_Block= :is_Block WHERE id= :userId';
    $pdo->prepare($sql)->execute($data);
}

if(isset($_POST['deleteUser'])){
    $userId = $_POST['id'];
    $data = [
        'userId' => $userId,
    ];
    $sql = 'DELETE FROM user WHERE id =:userId';
    $pdo->prepare($sql)->execute($data);

}

$sql = 'SELECT * FROM user ORDER BY `id` asc ';
$query = $pdo->query($sql);
$query = $query->fetchAll(PDO::FETCH_ASSOC);
?>