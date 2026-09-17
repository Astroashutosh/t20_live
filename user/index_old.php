<?php include('header.php')  ?>
  <!-- Main -->
  <div class="dash-main">
    <!-- Topbar -->
    <div class="dash-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle-btn" data-action="toggle-sidebar"><i class="bi bi-list fs-5"></i></button>
        <h6 class="mb-0 d-none d-md-block">Dashboard</h6>
      </div>
      <div class="d-flex align-items-center gap-2">
        <span class="wallet-pill d-none d-sm-flex"><span class="pulse-live" style="width:6px;height:6px;border-radius:50%;background:var(--neon);"></span><span data-fill="wallet-address">Not connected</span></span>
        <button class="icon-btn-veri"><i class="bi bi-bell"></i><span class="notif-dot"></span></button>
        <div class="dropdown">
          <button class="icon-btn-veri dropdown-toggle" data-bs-toggle="dropdown" style="border-radius:10px;"><i class="bi bi-person"></i></button>
          <ul class="dropdown-menu dropdown-menu-end" style="background: var(--card); border:1px solid var(--border);">
            <li><a class="dropdown-item text-secondary" href="#settings">Settings</a></li>
            <li><a class="dropdown-item text-secondary" href="index.html">Log out</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="dash-content">

      <!-- Identity row -->
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <div class="glass-card stat-card">
            <div class="text-secondary small mb-1">User ID</div>
            <div class="fw-semibold mono" id="stat-userid">—</div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="glass-card stat-card">
            <div class="text-secondary small mb-1">Referral Link</div>
            <div class="input-group">
              <input type="text" class="form-control form-veri mono small" id="stat-reflink" readonly value="—">
              <button class="btn btn-veri-outline" onclick="copyToClipboard(document.getElementById('stat-reflink').value, 'Referral link copied')"><i class="bi bi-copy"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Stat cards -->
      <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
          <div class="glass-card stat-card" data-reveal>
            <div class="stat-card__icon" style="background: rgba(34,197,94,0.12); color: var(--primary);"><i class="bi bi-coin"></i></div>
            <div class="stat-card__label">Total Stake</div>
            <div class="stat-card__value" id="stat-staked">—</div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="glass-card stat-card" data-reveal>
            <div class="stat-card__icon" style="background: rgba(0,255,136,0.1); color: var(--neon);"><i class="bi bi-graph-up-arrow"></i></div>
            <div class="stat-card__label">Total Earnings</div>
            <div class="stat-card__value" id="stat-earnings">—</div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="glass-card stat-card" data-reveal>
            <div class="stat-card__icon" style="background: rgba(212,175,55,0.12); color: var(--gold);"><i class="bi bi-people-fill"></i></div>
            <div class="stat-card__label">Referral Bonus</div>
            <div class="stat-card__value" id="stat-refbonus">—</div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="glass-card stat-card" data-reveal>
            <div class="stat-card__icon" style="background: rgba(34,197,94,0.12); color: var(--primary);"><i class="bi bi-wallet-fill"></i></div>
            <div class="stat-card__label">Available Balance</div>
            <div class="stat-card__value" id="stat-available">—</div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="glass-card stat-card" data-reveal>
            <div class="stat-card__icon" style="background: rgba(0,255,136,0.1); color: var(--neon);"><i class="bi bi-arrow-down-circle"></i></div>
            <div class="stat-card__label">Total Withdrawn</div>
            <div class="stat-card__value" id="stat-withdrawn">—</div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="glass-card stat-card" data-reveal>
            <div class="stat-card__icon" style="background: rgba(212,175,55,0.12); color: var(--gold);"><i class="bi bi-person-check"></i></div>
            <div class="stat-card__label">Direct Referrals</div>
            <div class="stat-card__value" id="stat-directs">—</div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="glass-card stat-card" data-reveal>
            <div class="stat-card__icon" style="background: rgba(34,197,94,0.12); color: var(--primary);"><i class="bi bi-percent"></i></div>
            <div class="stat-card__label">Current APY</div>
            <div class="stat-card__value" id="stat-apy">—</div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="glass-card stat-card" data-reveal>
            <div class="stat-card__icon" style="background: rgba(0,255,136,0.1); color: var(--neon);"><i class="bi bi-shield-check"></i></div>
            <div class="stat-card__label">Contract Status</div>
            <div class="stat-card__value" style="font-size: 1.05rem; color: var(--success);">Verified</div>
          </div>
        </div>
      </div>

      <!-- Action cards -->
      <div class="row g-3 mb-4">
        <div class="col-md-4">
          <div class="glass-card action-card" data-bs-toggle="modal" data-bs-target="#stakeModal" data-reveal>
            <div class="action-card__icon"><i class="bi bi-plus-circle"></i></div>
            <h6 class="mb-1">Stake Now</h6>
            <p class="text-secondary small mb-0">Deposit any amount into the contract</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="glass-card action-card" data-bs-toggle="modal" data-bs-target="#withdrawModal" data-reveal>
            <div class="action-card__icon"><i class="bi bi-arrow-down-circle"></i></div>
            <h6 class="mb-1">Withdraw</h6>
            <p class="text-secondary small mb-0">Move available balance to your wallet</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="glass-card action-card" data-reveal onclick="window.location.href='transactions.html'">
            <div class="action-card__icon"><i class="bi bi-receipt"></i></div>
            <h6 class="mb-1">View Transactions</h6>
            <p class="text-secondary small mb-0">Full on-chain history</p>
          </div>
        </div>
      </div>

      <!-- Charts -->
      <div class="row g-3">
        <div class="col-lg-6">
          <div class="glass-card chart-card" data-reveal>
            <h6 class="mb-3">Rewards Earned</h6>
            <canvas id="earningsChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card chart-card" data-reveal>
            <h6 class="mb-3">Staking History</h6>
            <canvas id="stakingChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card chart-card" data-reveal>
            <h6 class="mb-3">Balance Breakdown</h6>
            <canvas id="apyChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-4 h-100 d-flex flex-column justify-content-center" data-reveal>
            <div class="stat-card__icon mb-3" style="background: rgba(212,175,55,0.12); color: var(--gold);"><i class="bi bi-clock-history"></i></div>
            <h6 class="mb-2">Next unlock</h6>
            <p class="text-secondary small mb-3">Your current stake unlocks according to the contract's schedule.</p>
            <div class="progress-veri mb-2"><div class="progress-veri__fill" style="width: 64%;"></div></div>
            <div class="d-flex justify-content-between text-secondary small">
              <span>64% elapsed</span><span class="mono">Oct 2, 2026</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
<?php include('footer.php')  ?>
