<?php session_start();
$post=$_POST;

if ($_POST['hmod'] == 2) {
    // if (!isset($_SESSION['originalUserId'])) {
    //     $_SESSION['originalUserId'] = $_SESSION['userId'];
    // }
    // if (!isset($_SESSION['original_wallet_address'])) {
    //     $_SESSION['original_wallet_address'] = $_POST['wallet_address'];
    // }

    // $_SESSION['userId'] = $_POST['userId'];
   
    // if ($_SESSION['originalUserId'] != $_SESSION['userId']) {
    //     require('config.php'); 

    //     $userId = $_POST['userId'];
    //     $query = "SELECT wallet_address FROM users WHERE user_id = ?";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bind_param("s", $userId);
    //     $stmt->execute();
    //     $stmt->bind_result($wallet_address);
    //     $stmt->fetch();
    //     $stmt->close();

    //     $_SESSION['user_wallet_address'] = $wallet_address ?? $_POST['wallet_address'];
    // } else {
        $_SESSION['user_wallet_address'] = $_POST['wallet'];
    // }

    // $userId = $_SESSION['userId'];
    $userWallet = $_SESSION['user_wallet_address'];
    // var_dump($_SESSION);
    // exit(); 

    // if (!empty($userId) || $userId == 0) {
    if (!empty($userWallet)) {
        header("Location: user/index");
        exit();
    }
} elseif ($_POST['hmod'] == 3) {
    $_SESSION['userId'] = $_SESSION['originalUserId'];
    $_SESSION['user_wallet_address'] = $_SESSION['original_wallet_address'];

    header("Location: user/index");
    exit();
}
elseif($_GET['logout']==1){
 session_destroy();
 header("Location: login");
}
elseif($_POST['logout']=='session'){
 print_r($_POST);
}

?>