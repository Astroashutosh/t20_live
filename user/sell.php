<?php include('header.php')  ?>
  <!-- Main -->
  <div class="dash-main">
    <!-- Topbar -->
    <div class="dash-topbar">
      <div class="dash-topbar__left">
        <button class="sidebar-toggle-btn" data-action="toggle-sidebar"><i class="bi bi-list fs-5"></i></button>
        <span class="network-badge d-none d-md-inline"><i class="bi bi-diagram-3 me-1"></i>BNB Smart Chain</span>
        <span class="network-badge d-none d-lg-inline"><i class="bi bi-patch-check me-1"></i>Contract Verified</span>
      </div>
      <div class="d-flex align-items-center gap-2">
        <span class="wallet-pill d-flex"><span class="pulse-live" style="width:6px;height:6px;border-radius:50%;background:var(--neon);"></span><span data-fill="wallet-address" class="connected_walletdash">Not connected</span></span>
      </div>
    </div>

    <div class="dash-content">
      <!-- Page heading -->
      <div class="dash-reveal mb-4" style="animation-delay:.02s;">
        <span class="eyebrow">Swap</span>
        <h1 class="display-font mb-1" style="font-size:1.9rem;">Sell T20</h1>
        <p class="text-secondary mb-0">Sell your T20 tokens for USDT</p>
      </div>
      <div class="swap-wrap">

        <!-- ============ SELL CARD ============ -->
        <div class="glass-card card-glow-border swap-card dash-reveal" style="animation-delay:.08s;">

          <div class="swap-io">
            <!-- You Sell -->
            <div class="swap-panel">
              <div class="swap-panel__head">
                <span class="swap-panel__label">You Sell</span>
                <span class="swap-panel__balance">
                  <i class="bi bi-wallet2"></i> Balance: <span class="t20_balance">00</span> T20
                </span>
              </div>
              <div class="swap-panel__row">
                <span class="swap-token-badge">
                  <span class="swap-token-badge__icon swap-token-badge__icon--t20">T20</span>
                  <span class="swap-token-badge__symbol">T20</span>
                </span>
                <input type="text" inputmode="decimal" id="t20AmountInput" class="swap-amount-input" placeholder="0.0">
              </div>
              <div class="swap-panel__sub">
                <button class="swap-max-btn me-2">MAX</button>
              </div>
            </div>

            <!-- Flip / direction divider — sits exactly on the seam -->
            <div class="swap-divider">
              <span class="swap-flip-btn"><i class="bi bi-arrow-down"></i></span>
            </div>

            <!-- You Receive -->
            <div class="swap-panel swap-panel--readonly">
              <div class="swap-panel__head">
                <span class="swap-panel__label">You Receive</span>
                <span class="swap-panel__balance"><i class="bi bi-wallet2"></i> Balance: <span class="usdt_balance">00</span></span>
              </div>
              <div class="swap-panel__row">
                <span class="swap-token-badge">
                  <!--<span class="swap-token-badge__icon swap-token-badge__icon--usdt">$</span>-->
                    <span class="swap-token-badge__icon swap-token-badge__icon--usdt">
                        <svg viewBox="0 0 64 64" aria-label="Tether USDT">
                            <circle cx="32" cy="32" r="32" fill="#26A17B"/>
                            <path fill="#fff" d="M17 14h30v10H36v26h-8V24H17V14z"/>
                            <path fill="#fff" d="M13 27c4.5 2.8 11.2 4.5 19 4.5s14.5-1.7 19-4.5v6c-4.5 2.6-11.2 4.2-19 4.2S17.5 35.6 13 33v-6z"/>
                        </svg>
                    </span>
                  <span class="swap-token-badge__symbol">USDT</span>
                </span>
                <input type="text" id="usdtAmountInput" class="swap-amount-input" placeholder="0.0" readonly tabindex="-1">
              </div>
            </div>
          </div><!-- /.swap-io -->

          <!-- Submit -->
          <button type="button" id="sellSubmitBtn" class="btn-veri-primary btn-ripple w-100 mt-3" style="font-size:.98rem;">
            Enter Amount
          </button>
        </div>

        <!-- ============ STATE REFERENCE (design only — not wired) ============ -->
        <!-- <div class="glass-card dash-reveal mt-3 p-3" style="animation-delay:.14s;">
          <div class="swap-panel__label mb-2" style="font-size:.72rem; text-transform:uppercase; letter-spacing:.06em; color:var(--text-muted);">
            Button &amp; validation states
          </div>
          <div class="state-swatch-row mb-2">
            <span class="badge-status badge-pending"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
            <span class="badge-status badge-success"><i class="bi bi-check-circle me-1"></i>Success</span>
            <span class="badge-status badge-failed"><i class="bi bi-x-circle me-1"></i>Failed</span>
            <span class="badge-status" style="background:rgba(148,163,184,.12); color:var(--text-secondary); border:1px solid var(--border);"><i class="bi bi-wallet2 me-1"></i>Wallet not connected</span>
            <span class="badge-status" style="background:rgba(245,158,11,.15); color:var(--warning); border:1px solid rgba(245,158,11,.35);"><i class="bi bi-exclamation-triangle me-1"></i>Insufficient balance</span>
          </div>
          <button class="btn-veri-primary w-100 mb-2" disabled style="opacity:.45; cursor:not-allowed; box-shadow:none;">
            Enter an amount
          </button>
          <button class="btn-veri-primary w-100" disabled style="box-shadow:none;">
            <span class="spinner-veri sm" style="border-color: rgba(6,17,10,.25); border-top-color:#06110A; display:inline-block; vertical-align:-3px; margin-right:.5rem;"></span>
            Confirm in wallet…
          </button>
          <p class="state-note mb-0 mt-2">
            Disabled/empty, loading, and validation states shown above as visual reference only.
          </p>
        </div> -->

      </div>

    </div>
  </div>
<?php include('footer.php')  ?>

