<?php include('header.php'); ?>


<div class="dash-main phgh-page">

    <!-- Dashboard Topbar -->
    <div class="dash-topbar">
        <div class="dash-topbar__left">
            <button class="sidebar-toggle-btn" data-action="toggle-sidebar">
                <i class="bi bi-list fs-5"></i>
            </button>

            <span class="network-badge d-none d-md-inline">
                <i class="bi bi-diagram-3 me-1"></i>BNB Smart Chain
            </span>

            <span class="network-badge d-none d-lg-inline">
                <i class="bi bi-patch-check me-1"></i>Contract Verified
            </span>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span class="wallet-pill d-flex">
                <span class="pulse-live" style="width:6px;height:6px;border-radius:50%;background:var(--neon);"></span>
                <span data-fill="wallet-address" class="connected_walletdash">0x7A...92F1</span>
            </span>
        </div>
    </div>

    <div class="dash-content">

        <!-- Premium Header -->
        <div class="glass-card phgh-hero dash-reveal">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 position-relative">
                <div>
                    <div class="phgh-eyebrow">Help Center</div>
                    <h1 class="phgh-title">Provide Help / Get Help</h1>
                    <p class="phgh-subtitle">
                        Manage your community help requests through one premium dashboard.
                    </p>
                </div>

                <div class="phgh-mode">
                    <span class="phgh-mode-dot"></span>
                    BLOCKCHAIN LIVE
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="glass-card phgh-tabs dash-reveal">
            <button class="phgh-tab ph active" id="phTab" onclick="PHGH.showTab('ph')">
                <i class="bi bi-hand-thumbs-up-fill me-1"></i>
                Provide Help
                <span class="tab-count" id="tabPhCount">5</span>
            </button>

            <button class="phgh-tab gh" id="ghTab" onclick="PHGH.showTab('gh')">
                <i class="bi bi-hand-thumbs-down-fill me-1"></i>
                Get Help
                <span class="tab-count" id="tabGhCount">0</span>
            </button>
        </div>

        <!-- ================= PH ================= -->
        <section id="phPage">

            <!-- PH Stats -->
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="glass-card phgh-stat dash-reveal">
                        <div class="phgh-stat__top">
                            <div class="phgh-stat__label">Active Requests</div>
                            <div class="phgh-stat__icon"><i class="bi bi-activity"></i></div>
                        </div>
                        <div class="phgh-stat__value" id="phStatActive">5</div>
                        <div class="phgh-stat__hint">Available to provide help</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card phgh-stat blue dash-reveal">
                        <div class="phgh-stat__top">
                            <div class="phgh-stat__label">Available Volume</div>
                            <div class="phgh-stat__icon"><i class="bi bi-wallet2"></i></div>
                        </div>
                        <div class="phgh-stat__value" id="phStatVolume">1,300</div>
                        <div class="phgh-stat__hint">Total active PH amount</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card phgh-stat gold dash-reveal">
                        <div class="phgh-stat__top">
                            <div class="phgh-stat__label">Handled by You</div>
                            <div class="phgh-stat__icon"><i class="bi bi-check2-circle"></i></div>
                        </div>
                        <div class="phgh-stat__value" id="phStatHandled">0</div>
                        <div class="phgh-stat__hint">Demo completed requests</div>
                    </div>
                </div>
            </div>

            <!-- PH List -->
            <div class="glass-card p-3 p-md-4 dash-reveal">
                <div class="phgh-section-head">
                    <div class="phgh-section-title">
                        <div class="phgh-section-icon">
                            <i class="bi bi-hand-thumbs-up-fill"></i>
                        </div>
                        <div>
                            <h5>Active PH Requests</h5>
                            <p>Maximum 5 active requests are displayed here.</p>
                        </div>
                    </div>

                    <div class="phgh-counter" id="phCounter">5 / 5</div>
                </div>

                <div id="phList"></div>

                <div class="phgh-info">
                    <i class="bi bi-shield-check"></i>
                    <span>
                        Provide Help is processed through the connected wallet and smart contract.
                    </span>
                </div>
            </div>
        </section>

        <!-- ================= GH ================= -->
        <section id="ghPage" style="display:none;">

            <!-- GH Stats -->
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="glass-card phgh-stat blue dash-reveal">
                        <div class="phgh-stat__top">
                            <div class="phgh-stat__label">My GH Requests</div>
                            <div class="phgh-stat__icon"><i class="bi bi-file-earmark-text"></i></div>
                        </div>
                        <div class="phgh-stat__value" id="ghStatCount">0</div>
                        <div class="phgh-stat__hint">Total requests created</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card phgh-stat blue dash-reveal">
                        <div class="phgh-stat__top">
                            <div class="phgh-stat__label">Pending Amount</div>
                            <div class="phgh-stat__icon"><i class="bi bi-hourglass-split"></i></div>
                        </div>
                        <div class="phgh-stat__value" id="ghStatPending">0</div>
                        <div class="phgh-stat__hint">Currently waiting for help</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card phgh-stat gold dash-reveal">
                        <div class="phgh-stat__top">
                            <div class="phgh-stat__label">Received</div>
                            <div class="phgh-stat__icon"><i class="bi bi-cash-coin"></i></div>
                        </div>
                        <div class="phgh-stat__value" id="ghStatReceived">0</div>
                        <div class="phgh-stat__hint">Demo received amount</div>
                    </div>
                </div>
            </div>

            <!-- GH Main -->
            <div class="glass-card p-3 p-md-4 dash-reveal">

                <div class="phgh-section-head">
                    <div class="phgh-section-title">
                        <div class="phgh-section-icon blue">
                            <i class="bi bi-hand-thumbs-down-fill"></i>
                        </div>
                        <div>
                            <h5>Get Help</h5>
                            <p>Create a request when you need community support.</p>
                        </div>
                    </div>

                    <button class="btn btn-veri-primary" onclick="PHGH.openGhModal()">
                        <i class="bi bi-plus-circle me-1"></i>
                        Request Get Help
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Request</th>
                                <th>Amount</th>
                                <th>Created</th>
                                <th>Cycle</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="ghTableBody">
                            <tr>
                                <td colspan="6" class="text-center py-4 text-secondary">
                                    Loading GH history...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="phgh-info">
                    <i class="bi bi-shield-check"></i>
                    <span>
                        GH history is loaded directly from the smart contract.
                    </span>
                </div>
            </div>
        </section>

    </div>
</div>

<!-- ================= PH CONFIRM MODAL ================= -->
<div class="modal fade phgh-modal" id="phConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <div class="phgh-modal-title">
                    <div class="phgh-modal-icon">
                        <i class="bi bi-hand-thumbs-up-fill"></i>
                    </div>
                    Confirm Provide Help
                </div>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p class="text-secondary small mb-3">
                    Review and confirm your Provide Help action.
                </p>

                <div class="phgh-confirm-box">
                    <div class="phgh-confirm-row">
                        <span>Request</span>
                        <strong id="confirmPhId">—</strong>
                    </div>
                    <div class="phgh-confirm-row">
                        <span>Amount</span>
                        <strong id="confirmPhAmount">—</strong>
                    </div>
                    <div class="phgh-confirm-row">
                        <span>Recipient</span>
                        <strong id="confirmPhWallet">—</strong>
                    </div>
                    <div class="phgh-confirm-row">
                        <span>Status</span>
                        <strong style="color:var(--neon)">PENDING</strong>
                    </div>
                </div>

                <div class="phgh-demo-warning">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Confirming this action will request a wallet transaction.
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-veri-outline" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-veri-primary" id="confirmPhBtn">
                    <i class="bi bi-check2-circle me-1"></i>
                    Confirm Provide Help
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ================= GH CREATE MODAL ================= -->
<div class="modal fade phgh-modal" id="ghCreateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <div class="phgh-modal-title">
                    <div class="phgh-modal-icon blue">
                        <i class="bi bi-hand-thumbs-down-fill"></i>
                    </div>
                    Request Get Help
                </div>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form id="ghCreateForm">
                <div class="modal-body">

                    <label class="form-label small text-secondary">
                        Amount Required
                    </label>

                    <div class="input-group">
                        <input
                            type="number"
                            class="form-control phgh-amount-input"
                            id="ghAmount"
                            min="1"
                            step="0.01"
                            placeholder="Enter amount"
                            required>

                        <span class="input-group-text form-veri">USDT</span>
                    </div>

                    <div class="phgh-demo-warning">
                        <i class="bi bi-info-circle me-1"></i>
                        Enter the amount required. The GH transaction will be sent through the connected wallet once the contract method is configured.
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-veri-outline" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-veri-primary">
                        <i class="bi bi-plus-circle me-1"></i>
                        Create Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="phghToastWrap"></div>

<?php include('footer.php'); ?>

<script>
/* =========================================================
   PH / GH LIVE CONTRACT ENGINE
   ========================================================= */

(function(){

    let selectedPh = null;
    let isProvidingHelp = false;

    function escapeHtml(value){
        return String(value).replace(/[&<>"']/g, function(char){
            return {
                '&':'&amp;',
                '<':'&lt;',
                '>':'&gt;',
                '"':'&quot;',
                "'":'&#039;'
            }[char];
        });
    }

    function shortAddress(addr){
        if(!addr){
            return "—";
        }

        return addr.slice(0,6) + "..." + addr.slice(-4);
    }

    function showToast(message, type){
        type = type || 'success';

        const wrap = document.getElementById('phghToastWrap');

        if(!wrap){
            return;
        }

        const toast = document.createElement('div');
        toast.className = 'phgh-toast ' + (type === 'error' ? 'error' : '');

        toast.innerHTML = `
            <i class="bi ${type === 'error' ? 'bi-exclamation-circle' : 'bi-check-circle'}"></i>
            <div class="phgh-toast__text">${escapeHtml(message)}</div>
        `;

        wrap.appendChild(toast);

        setTimeout(function(){
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(8px)';

            setTimeout(function(){
                toast.remove();
            },250);
        },2800);
    }

    /*
     * Live PH request from smart contract.
     * getNextGHRequest() returns:
     * id, user, requestIndex, amount
     */
    async function renderPH(){

        const list = document.getElementById("phList");

        list.innerHTML = `
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Wallet Address</th>
                            <th>Amount</th>
                            <th>Request</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="phTableBody">
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <span class="spinner-border spinner-border-sm me-2"></span>
                                Loading PH request...
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        `;

        const tbody = document.getElementById("phTableBody");

        try{

            const request = await mainContract.methods
                .getNextGHRequest()
                .call();

            const id = request.id !== undefined ? request.id : request[0];
            const wallet = request.user !== undefined ? request.user : request[1];
            const requestIndex =
                request.requestIndex !== undefined
                    ? request.requestIndex
                    : request[2];

            const rawAmount =
                request.amount !== undefined
                    ? request.amount
                    : request[3];

            if(!id || String(id) === "0"){

                tbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="mb-3" style="width:52px;height:52px;border-radius:14px;
                                    display:flex;align-items:center;justify-content:center;
                                    background:rgba(0,255,170,.08);border:1px solid rgba(0,255,170,.18);">
                                    <i class="bi bi-hand-thumbs-up-fill fs-4" style="color:var(--neon);"></i>
                                </div>

                                <div class="fw-semibold text-light mb-1">
                                    Ready to Provide Help
                                </div>

                                <div class="text-secondary small mb-3">
                                    No PH request is currently displayed. You can continue with Provide Help.
                                </div>

                                <button
                                    type="button"
                                    class="btn btn-success btn-sm px-4"
                                    onclick="PHGH.openDirectPhConfirm()">
                                    <i class="bi bi-hand-thumbs-up me-1"></i>
                                    Provide Help
                                </button>
                            </div>
                        </td>
                    </tr>
                `;

                document.getElementById("phStatActive").innerText = "0";
                document.getElementById("phStatVolume").innerText = "0.00";
                document.getElementById("phCounter").innerText = "0 / 0";
                document.getElementById("tabPhCount").innerText = "0";

                return;
            }

            const amount = Number(
                Web3.utils.fromWei(String(rawAmount), "ether")
            );

            tbody.innerHTML = `
                <tr>
                    <td>
                        <span class="badge bg-secondary">
                            #${escapeHtml(id)}
                        </span>
                    </td>

                    <td class="font-monospace">
                        ${escapeHtml(shortAddress(wallet))}
                    </td>

                    <td class="fw-bold text-success">
                        $${amount.toFixed(2)} USDT
                    </td>

                    <td>
                        #${escapeHtml(requestIndex)}
                    </td>

                    <td>
                        <button
                            type="button"
                            class="btn btn-success btn-sm"
                            onclick="PHGH.openPhConfirm({
                                id:'${escapeHtml(id)}',
                                amount:'${amount}',
                                wallet:'${escapeHtml(wallet)}'
                            })">
                            <i class="bi bi-hand-thumbs-up me-1"></i>
                            Provide Help
                        </button>
                    </td>
                </tr>
            `;

            document.getElementById("phStatActive").innerText = "1";
            document.getElementById("phStatVolume").innerText =
                amount.toFixed(2);
            document.getElementById("phCounter").innerText = "1 / 1";
            document.getElementById("tabPhCount").innerText = "1";

        }catch(error){

            console.error("PH Request Error:", error);

            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-danger py-4">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        Unable to load PH request.
                    </td>
                </tr>
            `;

            document.getElementById("phStatActive").innerText = "0";
            document.getElementById("phStatVolume").innerText = "0.00";
            document.getElementById("phCounter").innerText = "0 / 0";
            document.getElementById("tabPhCount").innerText = "0";
        }
    }

    /*
     * Open Bootstrap confirmation popup.
     */
    function openPhConfirm(request){

        selectedPh = request;

        document.getElementById('confirmPhId').textContent =
            '#' + request.id;

        document.getElementById('confirmPhAmount').textContent =
            Number(request.amount).toFixed(2) + ' USDT';

        document.getElementById('confirmPhWallet').textContent =
            shortAddress(request.wallet);

        const modal = bootstrap.Modal.getOrCreateInstance(
            document.getElementById('phConfirmModal')
        );

        modal.show();
    }

    /*
     * Open Provide Help directly when the queue display is empty.
     * The smart contract method decides the eligible PH action.
     */
    function openDirectPhConfirm(){

        selectedPh = {
            id: "NEXT",
            amount: null,
            wallet: null
        };

        document.getElementById('confirmPhId').textContent = "NEXT";
        document.getElementById('confirmPhAmount').textContent = "Contract amount";
        document.getElementById('confirmPhWallet').textContent = "Next eligible request";

        const modal = bootstrap.Modal.getOrCreateInstance(
            document.getElementById('phConfirmModal')
        );

        modal.show();
    }

    /*
     * CONFIRM PROVIDE HELP
     *
     * userCycle(account) -> initialPHCount
     *
     * initialPHCount 0 / 1 -> provideInitialHelp()
     * initialPHCount 2    -> provideHelp()
     * initialPHCount 3    -> provideAdminPH()
     */
    async function confirmPh(){

        if(isProvidingHelp || !selectedPh){
            return;
        }

        const button = document.getElementById('confirmPhBtn');
        const modalElement = document.getElementById('phConfirmModal');
        const modal = bootstrap.Modal.getInstance(modalElement);

        try{

            isProvidingHelp = true;

            button.disabled = true;
            button.innerHTML = `
                <span class="spinner-border spinner-border-sm me-1"></span>
                Processing...
            `;

            const account = await getCurrentAccount();

            if(!account){
                throw new Error("Please connect your wallet.");
            }

            /*
             * 1. Read userCycle from blockchain.
             */
            const cycle = await mainContract.methods
                .userCycle(account)
                .call();

            
            const initialPHCount = Number(
                cycle.initialPHCount !== undefined
                    ? cycle.initialPHCount
                    : cycle[6]
            );

            console.log("userCycle:", cycle);
            console.log("initialPHCount:", initialPHCount);

            let methodName = "";
            let phAmount = "0";

            /*
             * 2. Select PH function according to initialPHCount.
             */
            if(initialPHCount === 0 || initialPHCount === 1){

                methodName = "provideInitialHelp";

                phAmount = await mainContract.methods
                    .PH_AMOUNT()
                    .call();

            }else if(initialPHCount === 2){

                methodName = "provideHelp";

                phAmount = await mainContract.methods
                    .PH_AMOUNT()
                    .call();

            }else if(initialPHCount === 3){

                methodName = "provideAdminPH";

                phAmount = await mainContract.methods
                    .ADMIN_PH_AMOUNT()
                    .call();

            }else{

                throw new Error(
                    "Invalid initialPHCount: " + initialPHCount
                );
            }

         
            await usdtContract.methods
                .approve(main_contract, phAmount)
                .send({
                    from: account,
                    gasPrice: await getGas()
                });

            /*
             * 6. Call selected PH function.
             * No parameter is passed because ABI shows
             * all three functions as nonpayable with no inputs.
             */
            const receipt = await mainContract.methods
                [methodName]()
                .send({
                    from: account,
                    gasPrice: await getGas()
                });

            console.log("PH transaction receipt:", receipt);

            if(modal){
                modal.hide();
            }

            selectedPh = null;

            showToast(
                methodName + " completed successfully."
            );

            /*
             * 7. Reload live GH/PH queue after success.
             */
            await renderPH();

        }catch(error){

            console.error("Provide Help Error:", error);

            let message = "Transaction failed.";

            if(error && error.message){
                message = error.message;
            }

            if(
                error &&
                error.message &&
                error.message.includes("User denied")
            ){
                message = "Transaction rejected by user.";
            }

            showToast(message, "error");

        }finally{

            isProvidingHelp = false;

            button.disabled = false;
            button.innerHTML = `
                <i class="bi bi-check2-circle me-1"></i>
                Confirm Provide Help
            `;
        }
    }

    async function loadGHHistory(){

        const tbody = $("#ghTableBody");

        tbody.html(`
            <tr>
                <td colspan="6" class="text-center py-4">
                    <span class="spinner-border spinner-border-sm me-2"></span>
                    Loading GH history...
                </td>
            </tr>
        `);

        try{

            const currentAccount = await getCurrentAccount();

            if(!currentAccount){
                tbody.html(`
                    <tr>
                        <td colspan="6" class="text-center text-warning py-4">
                            <i class="bi bi-wallet2 me-1"></i>
                            Wallet not connected.
                        </td>
                    </tr>
                `);
                updateGHStats([]);
                return;
            }

            const user = await mainContract.methods
                .userBase(currentAccount)
                .call();

            if(!user.isRegistered && !user.registered){
                tbody.html(`
                    <tr>
                        <td colspan="6" class="text-center text-warning py-4">
                            User is not registered.
                        </td>
                    </tr>
                `);
                updateGHStats([]);
                return;
            }

            const slots = await mainContract.methods
                .getLatestGHSlots(currentAccount, 50)
                .call();

            tbody.empty();

            if(!slots || slots.length === 0){
                tbody.html(`
                    <tr>
                        <td colspan="6" class="text-center text-secondary py-5">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            No GH history found.
                        </td>
                    </tr>
                `);

                updateGHStats([]);
                return;
            }

            const history = Array.from(slots).reverse();

            history.forEach(function(slot){
                addGHTableRow(slot);
            });

            updateGHStats(history);

        }catch(error){

            console.error("GH History Error:", error);

            tbody.html(`
                <tr>
                    <td colspan="6" class="text-center text-danger py-4">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        Unable to load GH history.
                    </td>
                </tr>
            `);

            updateGHStats([]);
        }
    }

    function formatGHAmount(value){

        try{

            const raw = Web3.utils.fromWei(
                String(value || "0"),
                "ether"
            );

            const num = Number(raw);

            if(!Number.isFinite(num)){
                return "0.00";
            }

            return num.toLocaleString(undefined,{
                minimumFractionDigits:2,
                maximumFractionDigits:4
            });

        }catch(error){
            return "0.00";
        }
    }

    function formatGHDate(timestamp){

        const ts = Number(timestamp || 0);

        if(!ts){
            return "--";
        }

        return new Date(ts * 1000).toLocaleString("en-GB",{
            day:"2-digit",
            month:"short",
            year:"numeric",
            hour:"2-digit",
            minute:"2-digit",
            hour12:true
        }).replace(",", " ·");
    }

    function addGHTableRow(slot){

        const id = slot.id;
        const requestIndex = slot.requestIndex;
        const amount = formatGHAmount(slot.amount);
        const date = formatGHDate(slot.createTime);

        let statusHtml = "";

        if(slot.completed){

            statusHtml = `
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle">
                    <i class="bi bi-check-circle me-1"></i>
                    Completed
                </span>
            `;

        }else if(slot.active){

            statusHtml = `
                <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle">
                    <i class="bi bi-activity me-1"></i>
                    Active
                </span>
            `;

        }else{

            statusHtml = `
                <span class="badge rounded-pill bg-secondary-subtle text-secondary border border-secondary-subtle">
                    Inactive
                </span>
            `;
        }

        const tr = `
            <tr>
                <td class="font-monospace text-secondary">
                    #${escapeHtml(id)}
                </td>

                <td class="font-monospace text-secondary">
                    #${escapeHtml(requestIndex)}
                </td>

                <td class="fw-semibold">
                    $${amount}
                    <small class="text-secondary ms-1">USDT</small>
                </td>

                <td class="text-secondary small">
                    ${escapeHtml(date)}
                </td>

                <td>
                    <span class="badge rounded-pill bg-dark border text-light">
                        Cycle ${escapeHtml(slot.cycle)}
                    </span>
                </td>

                <td>
                    ${statusHtml}
                </td>
            </tr>
        `;

        $("#ghTableBody").append(tr);
    }

    function updateGHStats(slots){

        let pending = 0;
        let received = 0;

        slots.forEach(function(slot){

            const amount = Number(
                Web3.utils.fromWei(
                    String(slot.amount || "0"),
                    "ether"
                )
            );

            if(slot.completed){
                received += amount;
            }else if(slot.active){
                pending += amount;
            }
        });

        document.getElementById("ghStatCount").textContent =
            slots.length;

        document.getElementById("ghStatPending").textContent =
            pending.toLocaleString(undefined,{
                minimumFractionDigits:2,
                maximumFractionDigits:4
            });

        document.getElementById("ghStatReceived").textContent =
            received.toLocaleString(undefined,{
                minimumFractionDigits:2,
                maximumFractionDigits:4
            });

        document.getElementById("tabGhCount").textContent =
            slots.filter(function(slot){
                return slot.active && !slot.completed;
            }).length;
    }

    function showTab(tab){

        const phPage = document.getElementById('phPage');
        const ghPage = document.getElementById('ghPage');

        const phTab = document.getElementById('phTab');
        const ghTab = document.getElementById('ghTab');

        if(tab === 'ph'){

            phPage.style.display = 'block';
            ghPage.style.display = 'none';

            phTab.classList.add('active');
            ghTab.classList.remove('active');

            renderPH();

        }else{

            phPage.style.display = 'none';
            ghPage.style.display = 'block';

            ghTab.classList.add('active');
            phTab.classList.remove('active');

            loadGHHistory();
        }
    }

    function openGhModal(){

        const input = document.getElementById('ghAmount');

        input.value = '';

        const modal = bootstrap.Modal.getOrCreateInstance(
            document.getElementById('ghCreateModal')
        );

        modal.show();

        setTimeout(function(){
            input.focus();
        },350);
    }

    function createGh(event){

        event.preventDefault();

        showToast(
            "GH request transaction method is not configured in this frontend.",
            "error"
        );
    }

    function cancelGh(id){

        showToast(
            "GH cancellation must be handled by the smart contract.",
            "error"
        );
    }

    document.getElementById('confirmPhBtn')
        .addEventListener('click', confirmPh);

    document.getElementById('ghCreateForm')
        .addEventListener('submit', createGh);

    window.PHGH = {
        showTab: showTab,
        openPhConfirm: openPhConfirm,
        openDirectPhConfirm: openDirectPhConfirm,
        openGhModal: openGhModal,
        cancelGh: cancelGh,
        renderPH: renderPH
    };

    renderPH();

})();
</script>
