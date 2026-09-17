</div>

<!-- Stake Modal -->
<div class="modal fade" id="stakeModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background: var(--card); border: 1px solid var(--border-strong); border-radius: var(--radius-md);">
      <div class="modal-header border-0">
        <h5 class="modal-title">Provide Help</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="stakeFormWrap">
          <form id="stakeForm">
            <label class="form-label small text-secondary">Amount to help</label>
            <div class="input-group mb-1">
              <input type="number" step="0.0001" min="20" class="form-control form-veri" id="stakeAmount" placeholder="0.00" value="20" readonly required>
              <span class="input-group-text form-veri">USDT</span>
            </div>
            <div class="invalid-feedback d-block text-danger small" id="stakeAmountError" style="display:none !important;"></div>
            <p class="text-secondary small mt-2 mb-4">Minimum stake: <strong>20 USDT</strong>. The amount must be in multiples of <strong>20 USDT</strong>. Your transaction will be sent directly to the verified contract.</p>
            <button type="button" class="btn btn-veri-primary w-100 btn-lg" onclick="stakenow()">Submit</button>
          </form>
        </div>
        <div id="stakeLoading" class="d-none text-center py-4">
          <div class="spinner-veri mx-auto mb-3"></div>
          <p class="text-secondary mb-0">Waiting for confirmation...</p>
        </div>
        <div id="stakeSuccess" class="d-none text-center py-3">
          <svg width="60" height="60" viewBox="0 0 72 72" class="success-pop mx-auto d-block mb-3">
            <circle cx="36" cy="36" r="34" fill="rgba(16,185,129,0.12)" stroke="var(--success)" stroke-width="2"/>
            <path d="M22 37 L31 46 L50 26" fill="none" stroke="var(--success)" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="check-draw"/>
          </svg>
          <h5>Stake confirmed</h5>
          <p class="text-secondary mb-1"><span id="stakeSuccessAmount"></span> staked</p>
          <p class="mono small text-secondary">Tx: <span id="stakeSuccessHash"></span></p>
          <button type="button" class="btn btn-veri-outline w-100 mt-2" data-bs-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Withdraw Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background: var(--card); border: 1px solid var(--border-strong); border-radius: var(--radius-md);">
      <div class="modal-header border-0">
        <h5 class="modal-title">Withdraw</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="withdrawFormWrap">
          <div class="d-flex justify-content-between text-secondary small mb-2">
            <span>Available balance</span><span class="mono" id="withdrawAvailable">—</span>
          </div>
          <form id="withdrawForm">
            <label class="form-label small text-secondary">Amount to withdraw</label>
            <div class="input-group mb-1">
              <input type="number" step="0.0001" min="0" class="form-control form-veri" id="withdrawAmount" placeholder="0.00" required>
              <span class="input-group-text form-veri">BNB</span>
            </div>
            <div class="invalid-feedback d-block text-danger small" id="withdrawAmountError" style="display:none !important;"></div>
            <button type="submit" class="btn btn-veri-primary w-100 btn-lg mt-4">Confirm Withdraw</button>
          </form>
        </div>
        <div id="withdrawLoading" class="d-none text-center py-4">
          <div class="spinner-veri mx-auto mb-3"></div>
          <p class="text-secondary mb-0">Waiting for confirmation...</p>
        </div>
        <div id="withdrawSuccess" class="d-none text-center py-3">
          <svg width="60" height="60" viewBox="0 0 72 72" class="success-pop mx-auto d-block mb-3">
            <circle cx="36" cy="36" r="34" fill="rgba(16,185,129,0.12)" stroke="var(--success)" stroke-width="2"/>
            <path d="M22 37 L31 46 L50 26" fill="none" stroke="var(--success)" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="check-draw"/>
          </svg>
          <h5>Withdrawal sent</h5>
          <p class="text-secondary mb-3"><span id="withdrawSuccessAmount"></span> on its way to your wallet</p>
          <button type="button" class="btn btn-veri-outline w-100" data-bs-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div>
</div>











<!-- Top Up Modal -->
<div class="modal fade" id="topUpModal" tabindex="-1" aria-labelledby="topUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-card border-0">

            <div class="modal-header border-0">
                <h5 class="modal-title" id="topUpModalLabel">
                    <i class="bi bi-arrow-down-circle me-2"></i>
                    Top Up
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>

            <div class="modal-body">

                <div class="text-center mb-3">
                    <div class="text-secondary small mb-1">
                        Top Up Amount
                    </div>

                    <div class="fs-3 fw-bold">
                        20 USDT
                    </div>
                </div>

                <div class="alert alert-info small mb-0">
                    <i class="bi bi-info-circle me-1"></i>
                  For Top Up 20 USDT required .
                </div>

            </div>

            <div class="modal-footer border-0">

                <button
                    type="button"
                    class="btn btn-veri-outline"
                    data-bs-dismiss="modal">
                    Cancel
                </button>

                <button
                    type="button"
                    class="btn btn-veri-primary"
                    id="confirmTopUpBtn"
                    onclick="topUpNow()">
                    <i class="bi bi-check-circle me-2"></i>
                    Confirm Top Up
                </button>

            </div>

        </div>
    </div>
</div>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bignumber.js/9.0.2/bignumber.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<!-- <script src="assets/js/wallet.js"></script> -->
<script src="assets/js/app.js"></script>
<script src="assets/js/dashboard.js"></script>
<script src="../js/web3.min.js"></script>
<script src="../js/abi.js"></script>
<script src="../js/contract_setting.js"></script>
<script src="../js/sell.js"></script>
</body>
</html>