<?php include('header.php')  ?>

  <div class="dash-main">
    <div class="dash-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle-btn" data-action="toggle-sidebar"><i class="bi bi-list fs-5"></i></button>
        <h6 class="mb-0 d-none d-md-block">Transactions</h6>
      </div>
      <!-- <span class="wallet-pill d-none d-sm-flex"><span data-fill="wallet-address">Not connected</span></span> -->
    </div>

    <div class="dash-content">
      <!-- <div class="row g-3 mb-3">
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text form-veri"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control form-veri" id="txSearch" placeholder="Search by ID, wallet, or hash">
          </div>
        </div>
        <div class="col-6 col-md-3">
          <select class="form-select form-veri" id="txTypeFilter">
            <option value="all">All types</option>
            <option value="Stake">Stake</option>
            <option value="Withdraw">Withdraw</option>
            <option value="Referral Bonus">Referral Bonus</option>
            <option value="Reward">Reward</option>
          </select>
        </div>
        <div class="col-6 col-md-3">
          <select class="form-select form-veri" id="txStatusFilter">
            <option value="all">All statuses</option>
            <option value="Success">Success</option>
            <option value="Pending">Pending</option>
            <option value="Failed">Failed</option>
          </select>
        </div>
      </div> -->

      <div class="glass-card table-responsive-veri">
        <div class="table-responsive">
          <table class="table table-veri mb-0">
            <thead>
              <tr>
                <th>Transaction ID</th>
                <th>Wallet</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Token</th>
                <th>Date</th>
                <th>Status</th>
                <!-- <th>Hash</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="txTableBody"></tbody>
          </table>
        </div>
      </div>

      <nav class="mt-3">
        <ul class="pagination justify-content-center" id="txPagination"></ul>
      </nav>
    </div>
  </div>
</div>

<?php include('footer.php')  ?>
<style>
.pagination .page-link { background: var(--card); border-color: var(--border); color: var(--text-secondary); }
.pagination .page-item.active .page-link { background: var(--primary); border-color: var(--primary); color: #06110A; }
.pagination .page-item.disabled .page-link { background: var(--bg-elevated); color: var(--text-muted); }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    helpListLoad();

});
</script>

