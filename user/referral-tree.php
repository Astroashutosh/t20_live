<?php include('header.php')  ?>

  <div class="dash-main">
    <div class="dash-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle-btn" data-action="toggle-sidebar"><i class="bi bi-list fs-5"></i></button>
        <h6 class="mb-0 d-none d-md-block">My Binary Tree</h6>
      </div>
    </div>

    <div class="dash-content">
      <div class="glass-card p-4 dash-reveal" style="animation-delay: 0.18s;">

          <!-- Loader -->
          <div id="treeLoader" class="text-center py-5">
              <div class="spinner-border text-success" role="status"></div>
              <div class="mt-3 text-success">Loading Binary Tree...</div>
          </div>

          <!-- Tree -->
          <div class="binary-tree d-none" id="binaryTree">

              <!-- Root -->
              <div class="tree-root">
                  <div class="tree-node root" id="rootNode"></div>
              </div>

              <div class="tree-children">

                  <!-- Left -->
                  <div class="tree-parent">
                      <div class="tree-node" id="leftNode"></div>

                      <div class="tree-grandchildren">
                          <div class="tree-item">
                              <div class="tree-node" id="leftLeftNode"></div>
                          </div>

                          <div class="tree-item">
                              <div class="tree-node" id="leftRightNode"></div>
                          </div>
                      </div>
                  </div>

                  <!-- Right -->
                  <div class="tree-parent">
                      <div class="tree-node" id="rightNode"></div>

                      <div class="tree-grandchildren">
                          <div class="tree-item">
                              <div class="tree-node" id="rightLeftNode"></div>
                          </div>

                          <div class="tree-item">
                              <div class="tree-node" id="rightRightNode"></div>
                          </div>
                      </div>
                  </div>

              </div>

          </div>

      </div>

      <!-- Stake Modal -->
      <div class="modal fade" id="treeInformation" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="background: var(--card); border: 1px solid var(--border-strong); border-radius: var(--radius-md);">
            <div class="modal-header border-0">
              <h5 class="modal-title"></h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div id="stakeFormWrap">
                <ul class="list-group">
                    <li class="d-flex justify-content-between">
                        <span>Registration Date</span>
                        <span data-field="activation">17-02-2025 05:20</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>Referred By</span>
                        <span data-field="referred">1253</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>Total PH</span>
                        <span data-field="totalPHCommitted">--</span>
                    </li>
                    <!--<li class="d-flex justify-content-between">-->
                    <!--    <span>Left Business</span>-->
                    <!--    <span data-field="leftBusiness">--</span>-->
                    <!--</li>-->
                    <!--<li class="d-flex justify-content-between">-->
                    <!--    <span>Right Business</span>-->
                    <!--    <span data-field="rightBusiness">--</span>-->
                    <!--</li>-->
                </ul>
              </div>
              
              <div class="text-center py-3">
                <button type="button" id="viewDownline" class="btn btn-veri-outline w-100 mt-2">View Downline</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php')  ?>

<script type="text/javascript">
  $(document).ready(function(){
    let user_id = $("#userid").val();
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.has('id')){

      const user_id = urlParams.get('id');
      loadBinaryTree(user_id);
    }else{
      console.log("root address1",user_id)
     loadBinaryTree(user_id);
    }
    // console.log("root address",user_id)
    // loadBinaryTree(user_id);

    $("#viewDownline").click(function (e) {
      e.preventDefault();
      let user_id = $("#treeInformation").data("address");
      if (!user_id || user_id == '') {
          alert('Enter user ID to see the tree');
          return;
      }
      window.location.href = window.location.pathname + "?id=" + user_id;
      loadBinaryTree(user_id);
    });

});
</script>