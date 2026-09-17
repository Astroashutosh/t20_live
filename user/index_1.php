<?php include('header.php')  ?>
  <!-- Main -->
  <div class="dash-main">
    <!-- Topbar -->
    <div class="dash-topbar">
      <div class="dash-topbar__left">
        <button class="sidebar-toggle-btn" data-action="toggle-sidebar"><i class="bi bi-list fs-5"></i></button>
        <!-- <span class="price-pill">1 BNB = <strong id="topbarPrice">$—</strong></span> -->
        <span class="network-badge d-none d-md-inline"><i class="bi bi-diagram-3 me-1"></i>BNB Smart Chain</span>
        <span class="network-badge d-none d-lg-inline"><i class="bi bi-patch-check me-1"></i>Contract Verified</span>
      </div>
      <div class="d-flex align-items-center gap-2">
        <!-- <button class="theme-toggle-btn" data-action="toggle-theme" title="Toggle theme">
          <i class="bi bi-moon-stars-fill"></i>
          <i class="bi bi-sun-fill"></i>
        </button> -->
        <!-- <button class="icon-btn-veri"><i class="bi bi-bell"></i><span class="notif-dot"></span></button> -->
        <!-- <span class="wallet-pill d-none d-sm-flex"> --><span class="wallet-pill d-flex"><span class="pulse-live" style="width:6px;height:6px;border-radius:50%;background:var(--neon);"></span><span data-fill="wallet-address" class="connected_walletdash">Not connected</span></span>
      </div>
    </div>

    <div class="dash-content">

      <!-- Row 1: Available balance + Referral program -->
      <div class="row g-3 mb-3">
        <div class="col-lg-8">
          <div class="glass-card balance-card dash-reveal h-100" style="animation-delay: 0s;">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
              <div>
                <div class="balance-card__label">Total Earning</div>
                <p class="text-secondary small mb-2" style="max-width: 420px;">On-chain withdrawable balance from your help — deposits plus accrued rewards.</p>
                <div class="balance-card__value available_balance" id="stat-available">— USDT</div>
                <!-- <div class="balance-card__sub">Minimum withdrawal: 0.01 BNB</div> -->
              </div>
              <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-veri-primary helpButton" data-bs-toggle="modal" data-bs-target="#stakeModal"><i class="bi bi-plus-circle me-2"></i>Provide Help</button>
                <!-- <button class="btn btn-veri-outline" data-bs-toggle="modal" data-bs-target="#withdrawModal"><i class="bi bi-arrow-down-circle me-2"></i>Get Help</button> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="glass-card referral-mini-card dash-reveal h-100" style="animation-delay: 0.06s;">
            <div class="referral-mini-card__label mb-1">Referral Program</div>
            <div class="referral-person">
              <div class="referral-person__avatar"><i class="bi bi-person"></i></div>
              <div class="flex-grow-1 min-w-0">
                <div class="fw-semibold small" id="stat-userid">—</div>
                <div class="text-secondary mono connected_walletdash" style="font-size: 0.7rem;" data-fill="wallet-address">Not connected</div>
              </div>
              <span class="badge-status badge-success isActive" id="referralStatusBadge">Active</span>
            </div>
            <!-- <div class="d-flex justify-content-between text-secondary small mt-3 mb-1">
              <span>Direct referrals</span><span class="mono" id="stat-directs">—</span>
            </div>
            <div class="d-flex justify-content-between text-secondary small mb-2">
              <span>Referral bonus earned</span><span class="mono" id="stat-refbonus">—</span>
            </div> -->
            <div class="d-flex justify-content-between text-secondary small mt-3 mb-1">
              <span>Left Child</span><span class="mono leftChild" >—</span>
            </div>
            <div class="d-flex justify-content-between text-secondary small mb-2">
              <span>Right Child</span><span class="mono rightChild" >—</span>
            </div>
            <!-- <div class="referral-link-box">
              <input type="text" id="stat-reflink" readonly value="—" class="referral-link">
              <button class="copy-btn" onclick="copyToClipboard(document.getElementById('stat-reflink').value, 'Referral link copied')"><i class="bi bi-copy"></i></button>
            </div> -->
            <div class="mb-2">
              <label class="small text-secondary">Left Referral</label>

              <div class="referral-link-box">
                  <input
                      class="referral-link"
                      id="leftReferralLink"
                      readonly>

                  <button
                      class="copy-btn"
                      onclick="copyToClipboard(document.getElementById('leftReferralLink').value,'Left referral copied')">
                      <i class="bi bi-copy"></i>
                  </button>
              </div>
          </div>

          <div>
              <label class="small text-secondary">Right Referral</label>

              <div class="referral-link-box">
                  <input
                      class="referral-link"
                      id="rightReferralLink"
                      readonly>

                  <button
                      class="copy-btn"
                      onclick="copyToClipboard(document.getElementById('rightReferralLink').value,'Right referral copied')">
                      <i class="bi bi-copy"></i>
                  </button>
              </div>
          </div>

          </div>
        </div>
      </div>

      <!-- Row 2: Contract info + Quick stake -->
      <div class="row g-3 mb-3">
        <div class="col-lg-12">
          <div class="glass-card contract-info-card dash-reveal h-100" style="animation-delay: 0.1s;">
            <div class="d-flex align-items-start gap-3">
              <div class="contract-info-card__icon"><i class="bi bi-file-earmark-lock2"></i></div>
              <div>
                <h6 class="mb-1">Helping Contract</h6>
                <p class="text-secondary small mb-0">A single verified contract shared by every user — your funds are never routed through a personal proxy.</p>
              </div>
            </div>
            <div class="contract-addr-box">
              <code class="contract_addr" >..</code>
              <button class="btn btn-veri-outline btn-sm" onclick="copyToClipboard(document.querySelector('.contract_addr').dataset.address,'Contract address copied')"><i class="bi bi-copy me-1"></i>Copy</button>
              <a href="#" class="btn btn-veri-outline btn-sm"><i class="bi bi-box-arrow-up-right me-1"></i>BscScan</a>
            </div>
            <div class="d-flex justify-content-between text-secondary small mt-3">
              <span>Your total help</span><span class="mono totalPHCommitted" id="stat-staked">—</span>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-6">
          <div class="glass-card quick-stake-card dash-reveal h-100" style="animation-delay: 0.15s;">
            <div class="quick-stake-tabs">
              <button type="button" class="quick-stake-tab active stake" id="qsStakeTab">Stake</button>
              <button type="button" class="quick-stake-tab withdraw" id="qsWithdrawTab">Withdraw</button>
            </div>
            <div class="quick-stake-mini-stats">
              <div class="quick-stake-mini-stat">
                <div class="quick-stake-mini-stat__label">Current APY</div>
                <div class="quick-stake-mini-stat__value" id="stat-apy">—</div>
              </div>
              <div class="quick-stake-mini-stat">
                <div class="quick-stake-mini-stat__label">Available to withdraw</div>
                <div class="quick-stake-mini-stat__value" id="qsAvailable">—</div>
              </div>
            </div>
            <label class="form-label small text-secondary mb-1" id="qsLabel">Amount to stake</label>
            <div class="input-group mb-1">
              <input type="number" step="0.0001" min="0" class="form-control form-veri" id="quickStakeAmount" placeholder="0.00">
              <span class="input-group-text form-veri">BNB</span>
            </div>
            <div class="text-danger small mb-2" id="quickStakeError" style="display:none;"></div>
            <button class="btn btn-veri-primary w-100 mt-2" id="quickStakeSubmit">Confirm Stake</button>
          </div>
        </div> -->
      </div>

      <!-- On-chain snapshot strip -->
      <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
        <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">On-chain Snapshot</div>
        <div class="snapshot-strip">
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Available</div>
            <div class="snapshot-chip__value available_balance" id="snap-available">—</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Total Help Provided</div>
            <div class="snapshot-chip__value totalPHCommitted" id="snap-staked">—</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Total Help Withdrawn</div>
            <div class="snapshot-chip__value totalPHWithdrawn" id="snap-staked">—</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Total Earnings</div>
            <div class="snapshot-chip__value available_balance" id="snap-earnings">—</div>
          </div>
          <!-- <div class="snapshot-chip">
            <div class="snapshot-chip__label">User ID</div>
            <div class="snapshot-chip__value" id="snap-userid">—</div>
          </div> -->
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Registered</div>
            <div class="snapshot-chip__value registrationTime" id="snap-registered">--</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Direct Referrals</div>
            <div class="snapshot-chip__value activeDirectReferrals" id="snap-walletbnb">—</div>
          </div>
        </div>
      </div>
      <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
        <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">On-chain Snapshot</div>
        <div class="snapshot-strip">
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Left Business</div>
            <div class="snapshot-chip__value leftBusiness">—</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Right Business</div>
            <div class="snapshot-chip__value rightBusiness">—</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Left Booster Business</div>
            <div class="snapshot-chip__value leftBoosterBusiness">—</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Right Booster Business</div>
            <div class="snapshot-chip__value rightBoosterBusiness">—</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Total Level Binary</div>
            <div class="snapshot-chip__value totalLevelIncome">--</div>
          </div>
          <div class="snapshot-chip">
            <div class="snapshot-chip__label">Total Booster Binary</div>
            <div class="snapshot-chip__value totalBoosterIncome">--</div>
          </div>
        </div>
      </div>

      <!-- Charts -->
      <!-- <div class="row g-3">
        <div class="col-lg-6">
          <div class="glass-card chart-card dash-reveal" style="animation-delay: 0.1s;">
            <div class="chart-card__head mb-3">
              <h6 class="mb-0">Rewards Earned</h6>
              <span class="chart-live-badge"><span class="pulse-live" style="width:6px;height:6px;border-radius:50%;background:var(--neon); display:inline-block;"></span>Live</span>
            </div>
            <canvas id="earningsChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card chart-card dash-reveal" style="animation-delay: 0.15s;">
            <div class="chart-card__head mb-3">
              <h6 class="mb-0">Staking History</h6>
              <span class="chart-live-badge"><span class="pulse-live" style="width:6px;height:6px;border-radius:50%;background:var(--neon); display:inline-block;"></span>Live</span>
            </div>
            <canvas id="stakingChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card chart-card dash-reveal" style="animation-delay: 0.2s;">
            <div class="chart-card__head mb-3">
              <h6 class="mb-0">Balance Breakdown</h6>
            </div>
            <canvas id="apyChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-4 h-100 d-flex flex-column justify-content-center dash-reveal" style="animation-delay: 0.25s;">
            <div class="stat-card__icon mb-3" style="background: rgba(212,175,55,0.12); color: var(--gold);"><i class="bi bi-clock-history"></i></div>
            <h6 class="mb-2">Next unlock</h6>
            <p class="text-secondary small mb-3">Your current stake unlocks according to the contract's schedule.</p>
            <div class="progress-veri mb-2"><div class="progress-veri__fill" style="width: 64%;"></div></div>
            <div class="d-flex justify-content-between text-secondary small">
              <span>64% elapsed</span><span class="mono">Oct 2, 2026</span>
            </div>
          </div>
        </div>
      </div> -->

    </div>
  </div>
<?php include('footer.php')  ?>
