<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Direct Users — VeriStake</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/animations.css">
<link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="bg-ambient"></div>
<div class="sidebar-overlay"></div>

<div class="dash-body">
  <aside class="dash-sidebar">
    <a href="index.html" class="dash-sidebar__brand text-white">
      <span class="brand-mark"><i class="bi bi-hexagon-fill"></i></span>VeriStake
    </a>
    <a href="dashboard.html" class="dash-nav-link"><i class="bi bi-grid-1x2-fill"></i>Dashboard</a>
    <a href="dashboard.html#" class="dash-nav-link"><i class="bi bi-plus-circle"></i>Stake Now</a>
    <a href="dashboard.html#" class="dash-nav-link"><i class="bi bi-arrow-down-circle"></i>Withdraw</a>
    <a href="transactions.html" class="dash-nav-link"><i class="bi bi-receipt"></i>Transactions</a>
    <a href="direct-users.html" class="dash-nav-link active"><i class="bi bi-people"></i>Direct Users</a>
    <a href="#rewards" class="dash-nav-link"><i class="bi bi-gift"></i>Rewards</a>
    <a href="#settings" class="dash-nav-link"><i class="bi bi-gear"></i>Settings</a>
    <div class="mt-auto pt-3">
      <a href="index.html" class="dash-nav-link"><i class="bi bi-box-arrow-left"></i>Log Out</a>
    </div>
  </aside>

  <div class="dash-main">
    <div class="dash-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle-btn" data-action="toggle-sidebar"><i class="bi bi-list fs-5"></i></button>
        <h6 class="mb-0 d-none d-md-block">Direct Users</h6>
      </div>
      <span class="wallet-pill d-none d-sm-flex"><span data-fill="wallet-address">Not connected</span></span>
    </div>

    <div class="dash-content">
      <p class="text-secondary small mb-4">People you referred directly. VeriStake pays a flat, one-time bonus per referral — there's no deeper network or team hierarchy to track.</p>

      <div class="row g-3 mb-4">
        <div class="col-md-4">
          <div class="glass-card stat-card">
            <div class="stat-card__icon" style="background: rgba(34,197,94,0.12); color: var(--primary);"><i class="bi bi-people-fill"></i></div>
            <div class="stat-card__label">Total Direct Users</div>
            <div class="stat-card__value" id="sum-total">—</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="glass-card stat-card">
            <div class="stat-card__icon" style="background: rgba(0,255,136,0.1); color: var(--neon);"><i class="bi bi-person-check-fill"></i></div>
            <div class="stat-card__label">Active Users</div>
            <div class="stat-card__value" id="sum-active">—</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="glass-card stat-card">
            <div class="stat-card__icon" style="background: rgba(212,175,55,0.12); color: var(--gold);"><i class="bi bi-gift-fill"></i></div>
            <div class="stat-card__label">Referral Rewards Earned</div>
            <div class="stat-card__value" id="sum-bonus">—</div>
          </div>
        </div>
      </div>

      <div class="mb-3">
        <div class="input-group" style="max-width: 360px;">
          <span class="input-group-text form-veri"><i class="bi bi-search"></i></span>
          <input type="text" class="form-control form-veri" id="directSearch" placeholder="Search referral ID or wallet">
        </div>
      </div>

      <div class="glass-card table-responsive-veri">
        <div class="table-responsive">
          <table class="table table-veri mb-0">
            <thead>
              <tr>
                <th data-sort="referralId">Referral ID <i class="bi bi-arrow-down-up small"></i></th>
                <th data-sort="wallet">Wallet Address</th>
                <th data-sort="joinDate">Join Date <i class="bi bi-arrow-down-up small"></i></th>
                <th data-sort="staked">Staked</th>
                <th data-sort="status">Status</th>
              </tr>
            </thead>
            <tbody id="directTableBody"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/wallet.js"></script>
<script src="js/app.js"></script>
<script src="js/direct-users.js"></script>
</body>
</html>
