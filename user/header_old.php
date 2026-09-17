<?php session_start();?>

<?php include('../config.php')  ?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard — <?= $title ?></title>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet" href="assets/css/animations.css">

<link rel="stylesheet" href="assets/css/dashboard.css">

</head>

<body>



<div class="bg-ambient"></div>

<div class="sidebar-overlay"></div>

<input name="userid" id="userid" type="HIDDEN" value="<?php echo $_SESSION['user_wallet_address'];?>">

<input name="baseurl" id="baseurl" type="HIDDEN" value="<?= $base_url ?>">

<div class="dash-body">



  <!-- Sidebar -->

  <aside class="dash-sidebar">

    <a href="index" class="dash-sidebar__brand text-white">

      <span class="brand-mark"><i class="bi bi-hexagon-fill"></i></span><?= $title ?>

    </a>

    <a href="index" class="dash-nav-link active"><i class="bi bi-grid-1x2-fill"></i>Dashboard</a>

    <a href="#" class="dash-nav-link" data-bs-toggle="modal" data-bs-target="#stakeModal"><i class="bi bi-plus-circle"></i>Provide Help</a>

    <!-- <a href="#" class="dash-nav-link" data-bs-toggle="modal" data-bs-target="#withdrawModal"><i class="bi bi-arrow-down-circle"></i>Get Help</a> -->

    <a href="get-help-request" class="dash-nav-link"><i class="bi bi-receipt"></i>Get Help Request</a>

    <a href="transactions" class="dash-nav-link"><i class="bi bi-receipt"></i>Helping Transactions</a>

    <!-- <a href="transactions.html" class="dash-nav-link"><i class="bi bi-receipt"></i>Transactions</a> -->

    <a href="direct-referrals" class="dash-nav-link"><i class="bi bi-people"></i>Direct Referrals</a>

    <!-- <a href="#rewards" class="dash-nav-link"><i class="bi bi-gift"></i>Rewards</a>

    <a href="#settings" class="dash-nav-link"><i class="bi bi-gear"></i>Settings</a> -->

    <div class="mt-auto pt-3">

      <a href="<?= $base_url . 'postdata.php?logout=1' ?>" class="dash-nav-link"><i class="bi bi-box-arrow-left"></i>Log Out</a>

    </div>

  </aside>