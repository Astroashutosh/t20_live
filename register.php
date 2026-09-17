<?php include('config.php')  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register — T20</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/animations.css">
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
<canvas id="particle-canvas"></canvas>

<nav class="navbar navbar-expand-lg navbar-veri">
  <div class="container">
    <a class="navbar-brand navbar-brand-veri" href="index">
      <span class="brand-mark"><i class="bi bi-hexagon-fill"></i></span>T20
    </a>
    <a href="login" class="text-secondary small">Already have an account? <span style="color: var(--accent);">Log in</span></a>
  </div>
</nav>

<section class="d-flex align-items-center" style="min-height: calc(100vh - 76px);">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="glass-card card-glow-border p-4 p-md-5" id="registerCard">

          <!-- Form state -->
          <div id="formState">
            <div class="text-center mb-4">
              <div class="eyebrow justify-content-center mb-2">Create account</div>
              <h3 class="mb-1">Link your wallet</h3>
              <p class="text-secondary small">Registration just connects a referral ID to your wallet address. No password required.</p>
            </div>

            <form id="registerForm" novalidate>
              <input name="baseurl" id="baseurl" type="HIDDEN" value="<?= $base_url; ?>">
              <div class="mb-3">
                <label class="form-label small text-secondary">Referral ID</label>
                <input type="text" class="form-control form-veri" id="referralId" value="<?= isset($_GET['ref'])?$_GET['ref']:'' ?>" placeholder="Enter Referral">
              </div>
              <div class="mb-3">
                  <label class="form-label small text-secondary">Position</label>

                  <select class="form-select form-veri" id="position">
                      <option value="left" <?= (($_GET['pos'] ?? '')=='left')?'selected':''; ?>>Left</option>
                      <option value="right" <?= (($_GET['pos'] ?? '')=='right')?'selected':''; ?>>Right</option>
                  </select>
              </div>

              <div class="mb-3">
                <label class="form-label small text-secondary">Wallet address</label>
                <div class="input-group">
                  <!-- <input type="text" class="form-control form-veri mono" id="walletAddressInput" data-fill="wallet-address" placeholder="Not connected" readonly required> -->
                  <input type="text" class="form-control form-veri mono" id="connected_wallet" placeholder="Not connected" readonly required>
                  <button class="btn btn-veri-outline" type="button" id="connectWalletBtn" data-action="connect-wallet" onclick="getAccount()"><i class="bi bi-wallet2 me-2"></i>Connect</button>
                </div>
                <div class="invalid-feedback" id="walletError">Connect your wallet before registering.</div>
              </div>

              <!-- <div class="form-check mb-4 mt-3">
                <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                <label class="form-check-label small text-secondary" for="agreeTerms">
                  I've reviewed the verified contract and understand T20 is non-custodial.
                </label>
              </div> -->

              <button type="button" class="btn btn-veri-primary w-100 btn-lg" id="registerSubmitBtn" onclick="registerNew()">
                Create Account
              </button>
            </form>
          </div>

          <!-- Loading state -->
          <div id="loadingState" class="d-none text-center py-5">
            <div class="spinner-veri mx-auto mb-3"></div>
            <p class="text-secondary mb-0">Confirming registration...</p>
          </div>

          <!-- Success state -->
          <div id="successState" class="d-none text-center py-4">
            <svg width="72" height="72" viewBox="0 0 72 72" class="success-pop mx-auto d-block mb-3">
              <circle cx="36" cy="36" r="34" fill="rgba(16,185,129,0.12)" stroke="var(--success)" stroke-width="2"/>
              <path d="M22 37 L31 46 L50 26" fill="none" stroke="var(--success)" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="check-draw"/>
            </svg>
            <h4 class="mb-2">You're registered</h4>
            <p class="text-secondary mb-1">Account ID</p>
            <p class="mono fs-5 mb-4" id="newUserId">—</p>
            <a href="dashboard.html" class="btn btn-veri-primary w-100 btn-lg">Go to Dashboard</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bignumber.js/9.0.2/bignumber.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<!-- <script src="assets/js/wallet.js"></script> -->
<script src="assets/js/app.js"></script>
<script src="js/web3.min.js"></script>
<script src="js/abi.js"></script>
<script src="js/contract_setting.js"></script>
<!-- <script>
document.getElementById('registerForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const walletInput = document.getElementById('walletAddressInput');
  const errorEl = document.getElementById('walletError');

  if (!walletInput.value) {
    walletInput.classList.add('is-invalid');
    errorEl.style.display = 'block';
    return;
  }
  walletInput.classList.remove('is-invalid');

  document.getElementById('formState').classList.add('d-none');
  document.getElementById('loadingState').classList.remove('d-none');

  const referralId = document.getElementById('referralId').value.trim();
  const result = await VeriWallet.register(referralId, walletInput.value);

  document.getElementById('loadingState').classList.add('d-none');
  if (result.success) {
    document.getElementById('newUserId').textContent = result.userId;
    document.getElementById('successState').classList.remove('d-none');
  } else {
    document.getElementById('formState').classList.remove('d-none');
    VeriWallet.showToast('Registration failed', 'Please try again.', 'danger');
  }
});
</script> -->
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function () {
      new Choices("#position", {
          searchEnabled: false,
          itemSelectText: "",
          shouldSort: false,
          allowHTML: false
      });
  });
</script>
</body>
</html>
