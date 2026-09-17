<?php session_start();?>
<?php include('../config.php')  ?>
<?php
$page = basename($_SERVER['PHP_SELF'], ".php");

$reportPages = [
    'booster-binary-report',
    'level-binary-report',
    'laps-report'
];

$reportsOpen = in_array($page, $reportPages);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard — <?= $title ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/animations.css">
<link rel="stylesheet" href="assets/css/dashboard.css">
<style type="text/css">
  .loader-container {
      display: flex;
      background: rgba(0, 0, 0, 0.65);
      backdrop-filter: blur(4px);
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 100;
  }

  .loader {
      border: 8px solid #f3f3f3;
      border-top: 8px solid #04c96f;
      border-radius: 50%;
      width: 80px;
      height: 80px;
      animation: spin 1.5s linear infinite;
  }

  .loader-text {
      margin-top: 20px;
      font-size: 18px;
      color: #fff;
      font-weight: bold;
  }
  @keyframes spin {
      0% {
          transform: rotate(0deg);
      }
      100% {
          transform: rotate(360deg);
      }
  }
</style>
</head>
<body>
    
<div class="loader-container main_loader " style="display:none;height:100%;width:100%;">
  <div class="loader"></div>
  <p class="loader-text">Please Wait...</p>
</div>
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
    <a href="index" class="dash-nav-link <?= $page == 'index' ? 'active' : '' ?>"><i class="bi bi-grid-1x2-fill"></i>Dashboard</a>
    <a href="phGh" class="dash-nav-link <?= $page == 'phGh' ? 'active' : '' ?>"><i class="bi bi-people"></i>PH GH</a>
    <!-- <a href="#" class="dash-nav-link helpButton" data-bs-toggle="modal" data-bs-target="#stakeModal"><i class="bi bi-plus-circle"></i>Provide Help</a> -->
    <!-- <a href="#" class="dash-nav-link" data-bs-toggle="modal" data-bs-target="#withdrawModal"><i class="bi bi-arrow-down-circle"></i>Get Help</a> -->
    <!--<a href="get-help-request" class="dash-nav-link <?= $page == 'get-help-request' ? 'active' : '' ?>"><i class="bi bi-receipt"></i>Get Help Request</a>-->
    <!-- <a href="transactions" class="dash-nav-link <?= $page == 'transactions' ? 'active' : '' ?>"><i class="bi bi-receipt"></i>Provided Help</a> -->
    <a href="sell" class="dash-nav-link <?= $page == 'sell' ? 'active' : '' ?>" ><i class="bi bi-arrow-down-circle"></i>Sell T20</a>
    
    <a href="direct-referrals" class="dash-nav-link <?= $page == 'direct-referrals' ? 'active' : '' ?>"><i class="bi bi-people"></i>Direct Referrals</a>
    
    
    <a href="staking" class="dash-nav-link <?= $page == 'staking' ? 'active' : '' ?>"><i class="bi bi-people"></i>Staking</a>
    
    
    <a href="referral-tree" class="dash-nav-link <?= $page == 'referral-tree' ? 'active' : '' ?>"><i class="bi bi-people"></i>Binary Tree</a>
    <a href="level-binary-business" class="dash-nav-link <?= $page == 'level-binary-business' ? 'active' : '' ?>"><i class="bi bi-diagram-2"></i>Level Binary Business</a>
    <div class="dash-nav-group">

        <a class="dash-nav-link d-flex justify-content-between align-items-center"
           data-bs-toggle="collapse"
           href="#reportsMenu"
           aria-expanded="<?= $reportsOpen ? 'true' : 'false' ?>">

            <span>
                <i class="bi bi-file-earmark-bar-graph"></i>
                Reports
            </span>

            <i class="bi bi-chevron-down submenu-arrow"></i>
        </a>

        <div class="collapse <?= $reportsOpen ? 'show' : '' ?>" id="reportsMenu">

            <a href="booster-binary-report"
               class="dash-submenu-link <?= $page=='booster-binary-report'?'active':'' ?>">
                <i class="bi bi-dot"></i>
                Booster Binary Report
            </a>

            <a href="level-binary-report"
               class="dash-submenu-link <?= $page=='level-binary-report'?'active':'' ?>">
                <i class="bi bi-dot"></i>
                Level Binary Report
            </a>

            <!-- <a href="laps-report"
               class="dash-submenu-link <?= $page=='laps-report'?'active':'' ?>">
                <i class="bi bi-dot"></i>
                Laps Report
            </a> -->

        </div>
    </div>
    <div class="">
      <a href="<?= $base_url . 'postdata.php?logout=1' ?>" class="dash-nav-link"><i class="bi bi-box-arrow-left"></i>Log Out</a>
    </div>
  </aside>