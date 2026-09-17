<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>T20 — Verified On-Chain Helping</title>
<meta name="description" content="Stake BNB on a verified, audited smart contract. Transparent rewards, no lock-in tricks, real on-chain data.">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/animations.css">
</head>
<body>

<div class="bg-ambient"></div>
<canvas id="particle-canvas"></canvas>

<!-- Trust ticker -->
<div class="trust-ticker">
  <div class="trust-ticker__track">
    <span class="trust-ticker__item"><span class="trust-ticker__dot"></span>Contract verified on BscScan</span>
    <span class="trust-ticker__item mono">0xdace6b4D4e75A35feA8F63020fECF17e9156C1f4</span>
    <span class="trust-ticker__item"><span class="trust-ticker__dot"></span>Network: BNB Smart Chain</span>
    <span class="trust-ticker__item">Live block <span data-live-block class="mono">—</span></span>
    <span class="trust-ticker__item"><span class="trust-ticker__dot"></span>Audit report available</span>
    <span class="trust-ticker__item"><span class="trust-ticker__dot"></span>Contract verified on BscScan</span>
    <span class="trust-ticker__item mono contract_addr1">0xdace6b4D4e75A35feA8F63020fECF17e9156C1f4</span>
    <span class="trust-ticker__item"><span class="trust-ticker__dot"></span>Network: BNB Smart Chain</span>
    <span class="trust-ticker__item">Live block <span class="mono">—</span></span>
    <span class="trust-ticker__item"><span class="trust-ticker__dot"></span>Audit report available</span>
  </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-veri sticky-top">
  <div class="container">
    <a class="navbar-brand navbar-brand-veri" href="index.html">
      <span class="brand-mark"><i class="bi bi-hexagon-fill"></i></span>T20
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" style="border-color: var(--border);">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
        <li class="nav-item"><a class="nav-link nav-link-veri" href="#features">Features</a></li>
        <li class="nav-item"><a class="nav-link nav-link-veri" href="#how-it-works">How It Works</a></li>
        <li class="nav-item"><a class="nav-link nav-link-veri" href="#roadmap">Roadmap</a></li>
        <li class="nav-item"><a class="nav-link nav-link-veri" href="#faq">FAQ</a></li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0"><a class="btn btn-veri-outline w-100" href="login">Log In</a></li>
        <li class="nav-item mt-2 mt-lg-0 ms-lg-2"><a class="btn btn-veri-primary w-100" href="register">Register</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<header class="section pb-0">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-reveal>
        <div class="eyebrow mb-3">Verified smart contract · BNB Smart Chain</div>
        <h1 class="display-4 mb-4">Help with proof, <span class="text-gradient">not promises.</span></h1>
        <p class="text-secondary fs-5 mb-4" style="max-width: 480px;">
          T20 runs on a single audited, verified contract you can inspect yourself.
          Deposit any amount, earn transparent on-chain rewards, and withdraw on your schedule — no tiers, no hidden mechanics.
        </p>
        <div class="d-flex flex-wrap gap-3 mb-4">
          <button class="btn btn-veri-primary btn-lg" data-action="connect-wallet"><i class="bi bi-wallet2 me-2"></i>Connect Wallet</button>
          <a href="register.html" class="btn btn-veri-outline btn-lg">Create Account</a>
        </div>
        <div class="d-flex gap-4 flex-wrap">
          <div>
            <div class="fs-4 fw-semibold mono"><span data-counter="18.5" data-decimals="1">0</span>%</div>
            <div class="text-secondary small">Current APY</div>
          </div>
          <div>
            <div class="fs-4 fw-semibold mono">$<span data-counter="6.4" data-decimals="1">0</span>M</div>
            <div class="text-secondary small">Total value helped</div>
          </div>
          <div>
            <div class="fs-4 fw-semibold mono"><span data-counter="3120" data-decimals="0">0</span></div>
            <div class="text-secondary small">Active helpers</div>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-reveal>
        <div class="glass-card card-glow-border p-4 float-anim mx-auto" style="max-width: 420px;">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <span class="text-secondary small">Your position</span>
            <span class="badge-status badge-success"><i class="bi bi-check-circle me-1"></i>Active</span>
          </div>
          <div class="mb-3">
            <div class="text-secondary small mb-1">Total helped</div>
            <div class="fs-3 fw-semibold mono">4.8500 <span class="text-secondary fs-6">BNB</span></div>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-6">
              <div class="text-secondary small mb-1">Helps earned</div>
              <div class="fw-semibold mono" style="color: var(--accent);">+0.6120 BNB</div>
            </div>
            <div class="col-6">
              <div class="text-secondary small mb-1">Next unlock</div>
              <div class="fw-semibold mono">Oct 2, 2026</div>
            </div>
          </div>
          <div class="progress-veri mb-2"><div class="progress-veri__fill" style="width: 64%;"></div></div>
          <div class="d-flex justify-content-between text-secondary small mb-4">
            <span>Helping period</span><span>64% complete</span>
          </div>
          <button class="btn btn-veri-primary w-100" data-action="connect-wallet" onclick="getAccount()"><i class="bi bi-plus-circle me-2"></i>Help More</button>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Features -->
<section class="section" id="features">
  <div class="container">
    <div class="text-center mb-5" data-reveal>
      <div class="eyebrow justify-content-center mb-3">Why T20</div>
      <h2 class="display-6">Built for people who check the contract</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100">
          <div class="stat-card__icon" style="background: rgba(34,197,94,0.12); color: var(--primary);"><i class="bi bi-patch-check-fill"></i></div>
          <h5 class="mb-2">Verified &amp; audited</h5>
          <p class="text-secondary mb-0 small">Contract source is verified on BscScan and independently audited. Read it yourself before you deposit a single BNB.</p>
        </div>
      </div>
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100">
          <div class="stat-card__icon" style="background: rgba(0,255,136,0.1); color: var(--neon);"><i class="bi bi-sliders"></i></div>
          <h5 class="mb-2">Help any amount</h5>
          <p class="text-secondary mb-0 small">No forced tiers or packages. Enter the exact amount you want to help and adjust it whenever you like.</p>
        </div>
      </div>
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100">
          <div class="stat-card__icon" style="background: rgba(212,175,55,0.12); color: var(--gold);"><i class="bi bi-people-fill"></i></div>
          <h5 class="mb-2">Simple referral bonus</h5>
          <p class="text-secondary mb-0 small">Invite someone directly and earn a one-time bonus when they stake. Flat, transparent, no multi-level payouts.</p>
        </div>
      </div>
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100">
          <div class="stat-card__icon" style="background: rgba(34,197,94,0.12); color: var(--primary);"><i class="bi bi-graph-up-arrow"></i></div>
          <h5 class="mb-2">Live on-chain data</h5>
          <p class="text-secondary mb-0 small">Every balance, reward, and transaction on your dashboard is read straight from the contract state.</p>
        </div>
      </div>
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100">
          <div class="stat-card__icon" style="background: rgba(0,255,136,0.1); color: var(--neon);"><i class="bi bi-shield-lock-fill"></i></div>
          <h5 class="mb-2">Non-custodial</h5>
          <p class="text-secondary mb-0 small">Your keys, your funds. T20 never takes custody — every action is a wallet-signed transaction.</p>
        </div>
      </div>
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100">
          <div class="stat-card__icon" style="background: rgba(212,175,55,0.12); color: var(--gold);"><i class="bi bi-arrow-left-right"></i></div>
          <h5 class="mb-2">Withdraw anytime</h5>
          <p class="text-secondary mb-0 small">No exit penalties buried in fine print. Unlock schedules are shown up front, in plain terms.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- How it works -->
<section class="section" id="how-it-works" style="background: var(--bg-elevated);">
  <div class="container">
    <div class="text-center mb-5" data-reveal>
      <div class="eyebrow justify-content-center mb-3">Process</div>
      <h2 class="display-6">Three steps, all on-chain</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100 text-center">
          <div class="mono text-secondary small mb-2">Step 01</div>
          <div class="stat-card__icon mx-auto" style="background: rgba(34,197,94,0.12); color: var(--primary);"><i class="bi bi-wallet2"></i></div>
          <h5 class="mb-2">Connect your wallet</h5>
          <p class="text-secondary small mb-0">Link MetaMask or WalletConnect. No sign-up forms, no passwords.</p>
        </div>
      </div>
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100 text-center">
          <div class="mono text-secondary small mb-2">Step 02</div>
          <div class="stat-card__icon mx-auto" style="background: rgba(0,255,136,0.1); color: var(--neon);"><i class="bi bi-cash-coin"></i></div>
          <h5 class="mb-2">Enter an amount &amp; help</h5>
          <p class="text-secondary small mb-0">Choose how much BNB to help and confirm the transaction in your wallet.</p>
        </div>
      </div>
      <div class="col-md-4" data-reveal>
        <div class="glass-card p-4 h-100 text-center">
          <div class="mono text-secondary small mb-2">Step 03</div>
          <div class="stat-card__icon mx-auto" style="background: rgba(212,175,55,0.12); color: var(--gold);"><i class="bi bi-graph-up"></i></div>
          <h5 class="mb-2">Track &amp; withdraw</h5>
          <p class="text-secondary small mb-0">Watch rewards accrue on your dashboard and withdraw whenever your terms allow.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Roadmap -->
<section class="section" id="roadmap">
  <div class="container">
    <div class="text-center mb-5" data-reveal>
      <div class="eyebrow justify-content-center mb-3">Roadmap</div>
      <h2 class="display-6">What's shipped, what's next</h2>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-6" data-reveal>
        <div class="glass-card p-4 h-100">
          <span class="badge-status badge-success mb-3 d-inline-block">Shipped</span>
          <h6 class="mono text-secondary small mb-2">Q1 2026</h6>
          <p class="small mb-0">Contract audit completed, verified on BscScan, testnet staking live.</p>
        </div>
      </div>
      <div class="col-lg-3 col-6" data-reveal>
        <div class="glass-card p-4 h-100">
          <span class="badge-status badge-success mb-3 d-inline-block">Shipped</span>
          <h6 class="mono text-secondary small mb-2">Q2 2026</h6>
          <p class="small mb-0">Mainnet launch on BNB Smart Chain with flat referral rewards.</p>
        </div>
      </div>
      <div class="col-lg-3 col-6" data-reveal>
        <div class="glass-card p-4 h-100">
          <span class="badge-status badge-pending mb-3 d-inline-block">In progress</span>
          <h6 class="mono text-secondary small mb-2">Q3 2026</h6>
          <p class="small mb-0">Dashboard analytics, exportable transaction history, mobile app beta.</p>
        </div>
      </div>
      <div class="col-lg-3 col-6" data-reveal>
        <div class="glass-card p-4 h-100">
          <span class="badge-status badge-pending mb-3 d-inline-block">Planned</span>
          <h6 class="mono text-secondary small mb-2">Q4 2026</h6>
          <p class="small mb-0">Second independent audit and multi-chain expansion.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section" id="faq" style="background: var(--bg-elevated);">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto">
        <div class="text-center mb-5" data-reveal>
          <div class="eyebrow justify-content-center mb-3">FAQ</div>
          <h2 class="display-6">Questions, answered plainly</h2>
        </div>
        <div class="accordion" id="faqAccordion" data-reveal>
          <div class="accordion-item glass-card mb-3" style="border:1px solid var(--border);">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="background: transparent; color: var(--text);">
                Is there a minimum or maximum help?
              </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-secondary">No fixed packages — you enter the exact amount of BNB you'd like to help, subject to a small contract-level minimum shown at the time of helping.</div>
            </div>
          </div>
          <div class="accordion-item glass-card mb-3" style="border:1px solid var(--border);">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="background: transparent; color: var(--text);">
                How does the referral bonus work?
              </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-secondary">You get a one-time, flat bonus when someone you referred directly makes their first help. It isn't paid from other users' deposits, and there are no multi-level payouts.</div>
            </div>
          </div>
          <div class="accordion-item glass-card mb-3" style="border:1px solid var(--border);">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="background: transparent; color: var(--text);">
                Where do rewards come from?
              </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-secondary">Rewards accrue according to the contract's published rate and mechanics. Full logic is visible in the verified source on BscScan — link in the footer.</div>
            </div>
          </div>
          <div class="accordion-item glass-card" style="border:1px solid var(--border);">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" style="background: transparent; color: var(--text);">
                Do I need an account to help?
              </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-secondary">No passwords. Registration just links a referral ID to your wallet address — your wallet signature is your login.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="section">
  <div class="container">
    <div class="glass-card card-glow-border p-5 text-center" data-reveal>
      <h3 class="mb-3">Ready to see the contract for yourself?</h3>
      <p class="text-secondary mb-4">Connect a wallet, review the numbers, help what you're comfortable with.</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <button class="btn btn-veri-primary btn-lg" data-action="connect-wallet"><i class="bi bi-wallet2 me-2"></i>Connect Wallet</button>
        <a href="register" class="btn btn-veri-outline btn-lg">Register</a>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer-veri">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <a class="navbar-brand-veri d-flex mb-3" href="index.html"><span class="brand-mark"><i class="bi bi-hexagon-fill"></i></span>T20</a>
        <p class="text-secondary small">A transparent, non-custodial staking interface for a single verified BNB Smart Chain contract.</p>
      </div>
      <div class="col-lg-2 col-6">
        <h6 class="mb-3">Product</h6>
        <div class="d-flex flex-column gap-2 small">
          <a href="#features" class="text-secondary">Features</a>
          <a href="#how-it-works" class="text-secondary">How it works</a>
          <a href="#roadmap" class="text-secondary">Roadmap</a>
        </div>
      </div>
      <div class="col-lg-2 col-6">
        <h6 class="mb-3">Account</h6>
        <div class="d-flex flex-column gap-2 small">
          <a href="register.html" class="text-secondary">Register</a>
          <a href="login.html" class="text-secondary">Log in</a>
          <a href="dashboard.html" class="text-secondary">Dashboard</a>
        </div>
      </div>
      <div class="col-lg-4">
        <h6 class="mb-3">Contract</h6>
        <div class="d-flex align-items-center gap-2 small text-secondary mono mb-2">
          <span class="contract_addr1">0xdace6b4D4e75A35feA8F63020fECF17e9156C1f4</span>
          <button class="copy-btn" onclick="copyToClipboard(document.querySelector('.contract_addr1').textContent,'Address copied')"><i class="bi bi-copy"></i></button>
        </div>
        <a href="#" class="small" style="color: var(--accent);"><i class="bi bi-box-arrow-up-right me-1"></i>View verified source on BscScan</a>
      </div>
    </div>
    <hr class="divider-glow my-4">
    <div class="d-flex flex-wrap justify-content-between text-secondary small">
      <span>&copy; 2026 T20. Not financial advice — review the contract yourself.</span>
      <span>Built on BNB Smart Chain</span>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/wallet.js"></script>
<script src="assets/js/app.js"></script>
<script src="js/web3.min.js"></script>
<script src="js/abi.js"></script>
<script src="js/contract_setting.js"></script>
</body>
</html>
