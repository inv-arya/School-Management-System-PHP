<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataFile = __DIR__ . '/../data/users.json';
    $data = json_decode(file_get_contents($dataFile), true);

    if ($data['failed_attempts'] >= 3 && time() - strtotime($data['last_failed']) < 300) {
        die(" Access blocked for 5 minutes due to repeated failed attempts.");
    }

    if ($_POST['username'] === $data['username'] && $_POST['password'] === $data['password']) {
        $_SESSION['logged_in'] = true;
        $data['failed_attempts'] = 0;
        file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
        header("Location: dashboard.php");
        exit;
    } else {
        $data['failed_attempts'] += 1;
        $data['last_failed'] = date("Y-m-d H:i:s");
        file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
        echo " Invalid credentials!";
    }
}
?>
