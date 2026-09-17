<?php include('config.php')  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Log In — T20</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/animations.css">
</head>
<body>

<div class="bg-ambient"></div>
<canvas id="particle-canvas"></canvas>

<nav class="navbar navbar-expand-lg navbar-veri">
  <div class="container">
    <a class="navbar-brand navbar-brand-veri" href="login">
      <span class="brand-mark"><i class="bi bi-hexagon-fill"></i></span>T20
    </a>
    <a href="register" class="text-secondary small">New here? <span style="color: var(--accent);">Create an account</span></a>
  </div>
</nav>

<section class="d-flex align-items-center" style="min-height: calc(100vh - 76px);">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <div class="glass-card card-glow-border p-4 p-md-5 text-center" id="loginCard">

          <div id="loginFormState">
            <input name="baseurl" id="baseurl" type="HIDDEN" value="<?= $base_url; ?>">
            <div class="mb-4">
              <div class="stat-card__icon mx-auto mb-3" style="background: rgba(34,197,94,0.12); color: var(--primary);"><i class="bi bi-shield-lock-fill"></i></div>
              <h3 class="mb-1">Log in with your wallet</h3>
              <p class="text-secondary small mb-0">There's no username or password — your wallet signature is your identity.</p>
            </div>

            <!-- <div class="glass-card p-3 mb-4" style="background: rgba(255,255,255,0.02);">
              <div class="text-secondary small mb-1" >Wallet address</div>
              <div class="mono" id="loginWalletDisplay" data-fill="wallet-address">Not connected</div>
            </div>

            <button class="btn btn-veri-outline w-100 mb-3" onclick="getAccount()" data-action="connect-wallet"><i class="bi bi-wallet2 me-2"></i>Connect Wallet</button> -->

            <div class="d-grid gap-2 mb-3">
               <!-- <button type="button" class="btn btn-veri-outline" onclick="addBSCNetwork()">
                    <i class="bi bi-diagram-3 me-2"></i>
                    Add BNB Testnet
                </button>-->

                <button type="button" class="btn btn-veri-outline" onclick="addUSDTToken()">
                    <i class="bi bi-coin me-2"></i>
                    Add T20M Token
                </button>
            </div>
            <button onclick="logintoaccount()" class="btn btn-veri-primary w-100 btn-lg" id="loginBtn"><i class="bi bi-box-arrow-in-right me-2"></i>Log In</button>
          </div>

          <div id="loginLoadingState" class="d-none py-4">
            <div class="spinner-veri mx-auto mb-3"></div>
            <p class="text-secondary mb-0">Verifying wallet signature...</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bignumber.js/9.0.2/bignumber.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="assets/js/wallet.js"></script> -->
<script src="assets/js/app.js"></script>
<script src="js/web3.min.js"></script>
<script src="js/abi.js"></script>
<script src="js/contract_setting.js"></script>
<script>
// document.getElementById('loginBtn').addEventListener('click', async () => {
//   const state = VeriWallet.getState();
//   if (!state.address) {
//     VeriWallet.showToast('Connect wallet first', 'You need to connect a wallet before logging in.', 'warning');
//     return;
//   }
//   document.getElementById('loginFormState').classList.add('d-none');
//   document.getElementById('loginLoadingState').classList.remove('d-none');

//   const result = await VeriWallet.login(state.address);
//   if (result.success) {
//     window.location.href = 'dashboard.html';
//   }
// });

async function addBSCNetwork() {
    return;
    if (!window.ethereum) {
        toastr.error("Please install MetaMask.");
        return;
    }

    try {
        await ethereum.request({
            method: "wallet_addEthereumChain",
            params: [{
                chainId: "0x61", // 97
                chainName: "BNB Smart Chain Testnet",
                nativeCurrency: {
                    name: "tBNB",
                    symbol: "tBNB",
                    decimals: 18
                },
                rpcUrls: [
                    "https://data-seed-prebsc-1-s1.binance.org:8545/"
                ],
                blockExplorerUrls: [
                    "https://testnet.bscscan.com"
                ]
            }]
        });

        toastr.success("BNB Testnet added.");
    } catch (err) {
        console.log(err);
    }
}

async function addUSDTToken() {

    if (!window.ethereum) {
        toastr.error("Please install MetaMask.");
        return;
    }

    try {

        await ethereum.request({
            method: "wallet_watchAsset",
            params: {
                type: "ERC20",
                options: {
                    address: "0xB7fE3f419C675bB830759a59b6Edc26C88e854FD",
                    symbol: "T20M",
                    decimals: 18,
                   // image: "https://cryptologos.cc/logos/tether-usdt-logo.png"
                }
            }
        });

        toastr.success("T20M token added.");

    } catch (err) {
        console.log(err);
    }
}
</script>
</script>
</body>
</html>
