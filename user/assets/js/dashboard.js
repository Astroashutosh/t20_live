/* =========================================================
   VeriStake — dashboard.js
   Loads user data, renders stat cards + charts, and drives
   the stake / withdraw modal flows.
   ========================================================= */

document.addEventListener('DOMContentLoaded', async () => {
  initSidebarToggle();
  // initWalletBadge();

  // const address = sessionStorage.getItem('veri_wallet_address') || '0xDEMO00000000000000000000000000000000AB';
  // document.querySelectorAll('[data-fill="wallet-address"]').forEach(el => el.textContent = VeriWallet.shortenAddress(address));

  // const data = await VeriWallet.getUserData(address);
  // renderStats(data);
  // renderCharts();
  // initStakeModal(data);
  // initWithdrawModal(data);
  // initQuickStake(data);
});

/* ---------- Quick stake / withdraw panel (mirrors balance card actions) ---------- */
function initQuickStake(userData) {
  const stakeTab = document.getElementById('qsStakeTab');
  const withdrawTab = document.getElementById('qsWithdrawTab');
  const label = document.getElementById('qsLabel');
  const amountInput = document.getElementById('quickStakeAmount');
  const errorEl = document.getElementById('quickStakeError');
  const submitBtn = document.getElementById('quickStakeSubmit');
  if (!stakeTab || !withdrawTab) return;

  let mode = 'stake';

  function setMode(next) {
    mode = next;
    amountInput.value = '';
    errorEl.style.display = 'none';
    if (mode === 'stake') {
      stakeTab.classList.add('active');
      withdrawTab.classList.remove('active');
      label.textContent = 'Amount to stake';
      submitBtn.textContent = 'Confirm Stake';
      submitBtn.className = 'btn btn-veri-primary w-100 mt-2';
    } else {
      withdrawTab.classList.add('active');
      stakeTab.classList.remove('active');
      label.textContent = 'Amount to withdraw';
      submitBtn.textContent = 'Confirm Withdraw';
      submitBtn.className = 'btn btn-veri-gold w-100 mt-2';
    }
  }

  stakeTab.addEventListener('click', () => setMode('stake'));
  withdrawTab.addEventListener('click', () => setMode('withdraw'));

  submitBtn.addEventListener('click', async () => {
    const amount = parseFloat(amountInput.value);
    const MIN_STAKE = 0.05;

    if (mode === 'stake' && (!amount || amount < MIN_STAKE)) {
      errorEl.textContent = `Enter an amount of at least ${MIN_STAKE} BNB.`;
      errorEl.style.display = 'block';
      return;
    }
    if (mode === 'withdraw' && (!amount || amount <= 0 || amount > userData.availableBalance)) {
      errorEl.textContent = amount > userData.availableBalance ? 'Amount exceeds your available balance.' : 'Enter a valid amount.';
      errorEl.style.display = 'block';
      return;
    }
    errorEl.style.display = 'none';

    const original = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.innerHTML = `<span class="spinner-veri sm me-2" style="display:inline-block;vertical-align:-3px;"></span> Processing...`;

    const result = mode === 'stake' ? await VeriWallet.stake(amount) : await VeriWallet.withdraw(amount);

    submitBtn.disabled = false;
    submitBtn.textContent = original;

    if (result && result.success) {
      VeriWallet.showToast(
        mode === 'stake' ? 'Stake confirmed' : 'Withdrawal sent',
        `${amount.toFixed(4)} BNB ${mode === 'stake' ? 'staked' : 'withdrawn'}. Tx: ${VeriWallet.shortenAddress(result.txHash)}`,
        'success'
      );
      amountInput.value = '';
    }
  });
}

function initSidebarToggle() {
  const toggleBtn = document.querySelector('[data-action="toggle-sidebar"]');
  const sidebar = document.querySelector('.dash-sidebar');
  const overlay = document.querySelector('.sidebar-overlay');
  if (!toggleBtn || !sidebar) return;
  const open = () => { sidebar.classList.add('show'); overlay.classList.add('show'); };
  const close = () => { sidebar.classList.remove('show'); overlay.classList.remove('show'); };
  toggleBtn.addEventListener('click', open);
  overlay && overlay.addEventListener('click', close);
}

function initWalletBadge() {
  document.addEventListener('veri:accountChanged', (e) => {
    document.querySelectorAll('[data-fill="wallet-address"]').forEach(el => {
      el.textContent = e.detail.address ? VeriWallet.shortenAddress(e.detail.address) : 'Not connected';
    });
  });
}

function renderStats(data) {
  const map = {
    'stat-userid': data.userId,
    'stat-staked': data.totalStaked.toFixed(4) + ' BNB',
    'stat-earnings': '+' + data.totalEarnings.toFixed(4) + ' BNB',
    'stat-refbonus': data.referralBonus.toFixed(4) + ' BNB',
    'stat-available': data.availableBalance.toFixed(4) + ' BNB',
    'stat-withdrawn': data.totalWithdrawn.toFixed(4) + ' BNB',
    'stat-directs': data.directReferrals,
    'stat-apy': data.apy + '%'
  };
  Object.entries(map).forEach(([id, val]) => {
    const el = document.getElementById(id);
    if (el) el.textContent = val;
  });
  const refLink = document.getElementById('stat-reflink');
  if (refLink) refLink.value = `https://veristake.app/register.html?ref=${data.userId}`;

  const heroTotal = document.getElementById('hero-total-value');
  if (heroTotal) {
    const total = data.totalStaked + data.availableBalance;
    heroTotal.textContent = total.toFixed(4) + ' BNB';
  }

  // On-chain snapshot strip
  const snapMap = {
    'snap-available': data.availableBalance.toFixed(4) + ' BNB',
    'snap-staked': data.totalStaked.toFixed(4) + ' BNB',
    'snap-earnings': '+' + data.totalEarnings.toFixed(4) + ' BNB',
    'snap-userid': data.userId,
    'snap-walletbnb': (data.availableBalance + 1.2).toFixed(4) + ' BNB'
  };
  Object.entries(snapMap).forEach(([id, val]) => {
    const el = document.getElementById(id);
    if (el) el.textContent = val;
  });

  // Quick-stake card + top bar
  const qsAvail = document.getElementById('qsAvailable');
  if (qsAvail) qsAvail.textContent = data.availableBalance.toFixed(4) + ' BNB';
  const topbarPrice = document.getElementById('topbarPrice');
  if (topbarPrice) topbarPrice.textContent = '$612.40';
}

function renderCharts() {
  if (typeof Chart === 'undefined') return;
  const months = ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];

  const gridColor = 'rgba(255,255,255,0.05)';
  const textColor = '#94A3B8';
  Chart.defaults.color = textColor;
  Chart.defaults.font.family = "'Inter', sans-serif";

  const earningsCtx = document.getElementById('earningsChart');
  if (earningsCtx) {
    new Chart(earningsCtx, {
      type: 'line',
      data: {
        labels: months,
        datasets: [{
          label: 'Rewards (BNB)',
          data: [0.05, 0.12, 0.21, 0.34, 0.48, 0.61],
          borderColor: '#00FF88',
          backgroundColor: 'rgba(0,255,136,0.12)',
          fill: true,
          tension: 0.4,
          pointBackgroundColor: '#00FF88',
          pointRadius: 3
        }]
      },
      options: {
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { color: gridColor } },
          y: { grid: { color: gridColor } }
        }
      }
    });
  }

  const stakingCtx = document.getElementById('stakingChart');
  if (stakingCtx) {
    new Chart(stakingCtx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
          label: 'Staked (BNB)',
          data: [1.2, 1.8, 2.6, 3.4, 4.1, 4.85],
          backgroundColor: '#22C55E',
          borderRadius: 6,
          maxBarThickness: 34
        }]
      },
      options: {
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { display: false } },
          y: { grid: { color: gridColor } }
        }
      }
    });
  }

  const apyCtx = document.getElementById('apyChart');
  if (apyCtx) {
    new Chart(apyCtx, {
      type: 'doughnut',
      data: {
        labels: ['Staked', 'Available', 'Withdrawn'],
        datasets: [{
          data: [4.85, 0.75, 1.2],
          backgroundColor: ['#22C55E', '#00FF88', '#D4AF37'],
          borderColor: '#121A22',
          borderWidth: 3
        }]
      },
      options: {
        plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, padding: 16 } } },
        cutout: '68%'
      }
    });
  }
}

/* ---------- Stake modal ---------- */
function initStakeModal(userData) {
  const trigger = document.querySelectorAll('[data-action="open-stake"]');
  const form = document.getElementById('stakeForm');
  if (!form) return;

  const amountInput = document.getElementById('stakeAmount');
  const errorEl = document.getElementById('stakeAmountError');
  const MIN = 0.05;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const amount = parseFloat(amountInput.value);
    if (!amount || amount < MIN) {
      amountInput.classList.add('is-invalid');
      errorEl.textContent = `Enter an amount of at least ${MIN} BNB.`;
      return;
    }
    amountInput.classList.remove('is-invalid');

    document.getElementById('stakeFormWrap').classList.add('d-none');
    document.getElementById('stakeLoading').classList.remove('d-none');

    const result = await VeriWallet.stake(amount);

    document.getElementById('stakeLoading').classList.add('d-none');
    if (result && result.success) {
      document.getElementById('stakeSuccessAmount').textContent = amount.toFixed(4) + ' BNB';
      document.getElementById('stakeSuccessHash').textContent = VeriWallet.shortenAddress(result.txHash);
      document.getElementById('stakeSuccess').classList.remove('d-none');
    }
  });

  document.getElementById('stakeModal')?.addEventListener('hidden.bs.modal', () => {
    document.getElementById('stakeFormWrap').classList.remove('d-none');
    document.getElementById('stakeSuccess').classList.add('d-none');
    form.reset();
  });
}

/* ---------- Withdraw modal ---------- */
function initWithdrawModal(userData) {
  const form = document.getElementById('withdrawForm');
  if (!form) return;

  const amountInput = document.getElementById('withdrawAmount');
  const errorEl = document.getElementById('withdrawAmountError');
  const available = userData.availableBalance;

  const availEl = document.getElementById('withdrawAvailable');
  if (availEl) availEl.textContent = available.toFixed(4) + ' BNB';

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const amount = parseFloat(amountInput.value);
    if (!amount || amount <= 0 || amount > available) {
      amountInput.classList.add('is-invalid');
      errorEl.textContent = amount > available ? 'Amount exceeds your available balance.' : 'Enter a valid amount.';
      return;
    }
    amountInput.classList.remove('is-invalid');

    document.getElementById('withdrawFormWrap').classList.add('d-none');
    document.getElementById('withdrawLoading').classList.remove('d-none');

    const result = await VeriWallet.withdraw(amount);

    document.getElementById('withdrawLoading').classList.add('d-none');
    if (result && result.success) {
      document.getElementById('withdrawSuccessAmount').textContent = amount.toFixed(4) + ' BNB';
      document.getElementById('withdrawSuccess').classList.remove('d-none');
    }
  });

  document.getElementById('withdrawModal')?.addEventListener('hidden.bs.modal', () => {
    document.getElementById('withdrawFormWrap').classList.remove('d-none');
    document.getElementById('withdrawSuccess').classList.add('d-none');
    form.reset();
  });
}
