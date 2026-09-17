/* =========================================================
   VeriStake — transactions.js
   Dummy transaction history + search/filter/pagination.
   ========================================================= */

const DUMMY_TRANSACTIONS = (() => {
  const types = ['Stake', 'Withdraw', 'Referral Bonus', 'Reward'];
  const statuses = ['Success', 'Success', 'Success', 'Pending', 'Failed'];
  const rows = [];
  for (let i = 1; i <= 47; i++) {
    const type = types[i % types.length];
    const status = statuses[i % statuses.length];
    const amount = (Math.random() * 2 + 0.02).toFixed(4);
    const date = new Date(2026, 5, 30 - i);
    rows.push({
      id: 'TX-' + String(10000 + i),
      wallet: '0x' + Math.random().toString(16).slice(2, 10) + '...' + Math.random().toString(16).slice(2, 6),
      type,
      amount,
      token: 'BNB',
      date: date.toISOString().slice(0, 10),
      status,
      hash: VeriWallet.fakeTxHash()
    });
  }
  return rows;
})();

let currentPage = 1;
const PAGE_SIZE = 10;
let filtered = [...DUMMY_TRANSACTIONS];

document.addEventListener('DOMContentLoaded', () => {
  renderTable();
  document.getElementById('txSearch')?.addEventListener('input', applyFilters);
  document.getElementById('txTypeFilter')?.addEventListener('change', applyFilters);
  document.getElementById('txStatusFilter')?.addEventListener('change', applyFilters);
});

function applyFilters() {
  const q = (document.getElementById('txSearch').value || '').toLowerCase();
  const type = document.getElementById('txTypeFilter').value;
  const status = document.getElementById('txStatusFilter').value;

  filtered = DUMMY_TRANSACTIONS.filter(tx => {
    const matchesQ = !q || tx.id.toLowerCase().includes(q) || tx.wallet.toLowerCase().includes(q) || tx.hash.toLowerCase().includes(q);
    const matchesType = type === 'all' || tx.type === type;
    const matchesStatus = status === 'all' || tx.status === status;
    return matchesQ && matchesType && matchesStatus;
  });
  currentPage = 1;
  renderTable();
}

function renderTable() {
  const tbody = document.getElementById('txTableBody');
  if (!tbody) return;
  const start = (currentPage - 1) * PAGE_SIZE;
  const pageRows = filtered.slice(start, start + PAGE_SIZE);

  tbody.innerHTML = pageRows.map(tx => `
    <tr>
      <td class="mono">${tx.id}</td>
      <td class="mono">${tx.wallet}</td>
      <td>${tx.type}</td>
      <td class="mono">${tx.amount}</td>
      <td>${tx.token}</td>
      <td class="mono text-secondary">${tx.date}</td>
      <td><span class="badge-status ${badgeClass(tx.status)}">${tx.status}</span></td>
      <td>
        <div class="d-flex align-items-center gap-2">
          <span class="mono text-secondary">${tx.hash.slice(0, 8)}...${tx.hash.slice(-6)}</span>
          <button class="copy-btn" onclick="copyToClipboard('${tx.hash}', 'Transaction hash copied')"><i class="bi bi-copy"></i></button>
          <a href="#" class="copy-btn" title="View on BscScan"><i class="bi bi-box-arrow-up-right"></i></a>
        </div>
      </td>
    </tr>`).join('') || `<tr><td colspan="8" class="text-center text-secondary py-4">No transactions match your filters.</td></tr>`;

  renderPagination();
}

function badgeClass(status) {
  return { Success: 'badge-success', Pending: 'badge-pending', Failed: 'badge-failed' }[status] || 'badge-pending';
}

function renderPagination() {
  const pagEl = document.getElementById('txPagination');
  if (!pagEl) return;
  const totalPages = Math.max(1, Math.ceil(filtered.length / PAGE_SIZE));
  let html = '';
  html += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}"><a class="page-link" href="#" data-page="${currentPage - 1}">Prev</a></li>`;
  for (let p = 1; p <= totalPages; p++) {
    html += `<li class="page-item ${p === currentPage ? 'active' : ''}"><a class="page-link" href="#" data-page="${p}">${p}</a></li>`;
  }
  html += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}"><a class="page-link" href="#" data-page="${currentPage + 1}">Next</a></li>`;
  pagEl.innerHTML = html;

  pagEl.querySelectorAll('.page-link').forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const page = parseInt(link.dataset.page);
      if (page >= 1 && page <= totalPages) { currentPage = page; renderTable(); }
    });
  });
}
