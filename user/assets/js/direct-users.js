/* =========================================================
   VeriStake — direct-users.js
   Dummy direct-referral list with search/sort + summary stats.
   Referrals here are flat (one level) by design — no team
   hierarchy or multi-level tracking.
   ========================================================= */

const DUMMY_DIRECT_USERS = (() => {
  const packages = ['0.5 BNB', '1.2 BNB', '2.0 BNB', '0.8 BNB', '3.4 BNB'];
  const rows = [];
  for (let i = 1; i <= 18; i++) {
    const joined = new Date(2026, 3 + (i % 4), (i * 2) % 27 + 1);
    rows.push({
      referralId: 'VS-' + (100000 + i * 37).toString(16).toUpperCase().slice(0, 6),
      wallet: '0x' + Math.random().toString(16).slice(2, 10) + '...' + Math.random().toString(16).slice(2, 6),
      joinDate: joined.toISOString().slice(0, 10),
      staked: packages[i % packages.length],
      status: i % 5 === 0 ? 'Inactive' : 'Active'
    });
  }
  return rows;
})();

let directSort = { key: 'joinDate', dir: 'desc' };

document.addEventListener('DOMContentLoaded', () => {
  renderSummary();
  renderDirectTable();
  document.getElementById('directSearch')?.addEventListener('input', renderDirectTable);
  document.querySelectorAll('[data-sort]').forEach(th => {
    th.style.cursor = 'pointer';
    th.addEventListener('click', () => {
      const key = th.dataset.sort;
      directSort.dir = (directSort.key === key && directSort.dir === 'asc') ? 'desc' : 'asc';
      directSort.key = key;
      renderDirectTable();
    });
  });
});

function renderSummary() {
  const total = DUMMY_DIRECT_USERS.length;
  const active = DUMMY_DIRECT_USERS.filter(u => u.status === 'Active').length;
  const bonus = (total * 0.015).toFixed(4);
  document.getElementById('sum-total').textContent = total;
  document.getElementById('sum-active').textContent = active;
  document.getElementById('sum-bonus').textContent = bonus + ' BNB';
}

function renderDirectTable() {
  const tbody = document.getElementById('directTableBody');
  if (!tbody) return;
  const q = (document.getElementById('directSearch')?.value || '').toLowerCase();

  let rows = DUMMY_DIRECT_USERS.filter(u =>
    !q || u.referralId.toLowerCase().includes(q) || u.wallet.toLowerCase().includes(q)
  );

  rows.sort((a, b) => {
    const av = a[directSort.key], bv = b[directSort.key];
    const cmp = String(av).localeCompare(String(bv));
    return directSort.dir === 'asc' ? cmp : -cmp;
  });

  tbody.innerHTML = rows.map(u => `
    <tr>
      <td class="mono">${u.referralId}</td>
      <td class="mono">${u.wallet}</td>
      <td class="mono text-secondary">${u.joinDate}</td>
      <td class="mono">${u.staked}</td>
      <td><span class="badge-status ${u.status === 'Active' ? 'badge-success' : 'badge-failed'}">${u.status}</span></td>
    </tr>`).join('') || `<tr><td colspan="5" class="text-center text-secondary py-4">No matching referrals.</td></tr>`;
}
