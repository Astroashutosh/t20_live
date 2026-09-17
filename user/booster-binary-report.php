<?php include('header.php')  ?>

  <div class="dash-main">
    <div class="dash-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle-btn" data-action="toggle-sidebar"><i class="bi bi-list fs-5"></i></button>
        <h6 class="mb-0 d-none d-md-block">Booster Binary Report</h6>
      </div>
    </div>

    <div class="dash-content">
      

      <div class="glass-card table-responsive-veri">
        <div class="table-responsive">
          <table class="table table-veri mb-0">
            <thead>
              <tr>
                <th>Transaction ID</th>
                <!--<th>Wallet</th>-->
                <th>Amount</th>
                <th>Date</th>
                
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
    getTransLog("boosterBinary");

});
</script>


