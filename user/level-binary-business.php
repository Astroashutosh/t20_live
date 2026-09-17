<?php include('header.php')  ?>

  <div class="dash-main">
    <div class="dash-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle-btn" data-action="toggle-sidebar"><i class="bi bi-list fs-5"></i></button>
        <h6 class="mb-0 d-none d-md-block">Level Binary Business</h6>
      </div>
    </div>
    
    <div class="dash-content">
      <div class="row g-3 mb-3">
        <div class="col-lg-6">
        <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
        <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Total Left Business</div>
        <div class="snapshot-chip__value totalLeftBusinessAll">—</div>
        <!-- </div>
        </div> -->
        </div>
        </div>
        <div class="col-lg-6">
        <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
        <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Total Right Business</div>
        <div class="snapshot-chip__value totalRightBusinessAll">—</div>
        <!-- </div>
        </div> -->
        </div>
        </div>
      </div>
      
      <div class="row g-3 mb-3">
        <div class="col-lg-6">
        <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
        <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Current Left Business</div>
        <div class="snapshot-chip__value totalLeftBusinessCurrent">—</div>
        <!-- </div>
        </div> -->
        </div>
        </div>
        <div class="col-lg-6">
        <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
        <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Current Right Business</div>
        <div class="snapshot-chip__value totalRightBusinessCurrent">—</div>
        <!-- </div>
        </div> -->
        </div>
        </div>
      </div>


      <div class="row g-3 mb-3">
        <div class="mb-3">
            <label class="form-label small text-secondary">Level</label>

            <select class="form-select form-veri" id="level">
                <?php for($i=1; $i<=70; $i++){?>
                  <option value="<?= $i ?>" >Level <?= $i ?></option>
                <?php } ?>
            </select>
        </div>
      </div>
      
      <div class="row g-3 mb-3">
        <div class="col-lg-6">
          <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
            <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Left Business</div>
            <!-- <div class="snapshot-strip"> -->
              <!-- <div class="snapshot-chip"> -->
                <div class="snapshot-chip__value leftBusiness1">—</div>
              <!-- </div> -->
            <!-- </div> -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
            <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Right Business</div>
            <!-- <div class="snapshot-strip">
              <div class="snapshot-chip"> -->
                
                <div class="snapshot-chip__value rightBusiness1">—</div>
              <!-- </div>
            </div> -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
            <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Total Left Business</div>
            <!-- <div class="snapshot-strip">
              <div class="snapshot-chip"> -->
                <div class="snapshot-chip__value totalLeftBusiness">—</div>
              <!-- </div>
            </div> -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
            <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Total Right Business</div>
            <!-- <div class="snapshot-strip">
              <div class="snapshot-chip"> -->
                
                <div class="snapshot-chip__value totalRightBusiness">—</div>
              <!-- </div>
            </div> -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
            <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Left PH Business</div>
                <div class="snapshot-chip__value leftRecommit">—</div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
            <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Right PH Business</div>
                <div class="snapshot-chip__value rightRecommit">—</div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
            <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Total Left PH Business</div>
                <div class="snapshot-chip__value totalLeftRecommit">—</div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="glass-card p-3 dash-reveal mb-4" style="animation-delay: 0.2s;">
            <div class="text-secondary small mb-2" style="font-family: var(--font-mono); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em;">Total Right PH Business</div>
                <div class="snapshot-chip__value totalRightRecommit">—</div>
          </div>
        </div>
      </div>
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
  document.addEventListener("DOMContentLoaded", function () {
      new Choices("#level", {
          searchEnabled: false,
          itemSelectText: "",
          shouldSort: false,
          allowHTML: false
      });
  });
</script>
<script type="text/javascript">
 $(document).ready(function () {
    getLevelBusiness($("#level").val());

    $("#level").on("change", function () {
        getLevelBusiness($(this).val());
    });

    document.getElementById("level").addEventListener("change", function () {
        getLevelBusiness(this.value);
    });
    
    getTotalLevelBusiness();

});
</script>


