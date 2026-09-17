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
                    <h1 class="phgh-title">Provide Help</h1>
                    <p class="phgh-subtitle">
                        Manage your community Provide Help requests through one premium dashboard.
                    </p>
                </div>

                <div class="phgh-mode">
                    <span class="phgh-mode-dot"></span>
                    BLOCKCHAIN LIVE
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="glass-card phgh-tabs dash-reveal"   id="topUp">
            <!-- <button class="phgh-tab ph active" id="phTab" onclick="PHGH.showTab('ph')">
                <i class="bi bi-hand-thumbs-up-fill me-1"></i>
                Provide Help
                <span class="tab-count" id="tabPhCount">0</span>
            </button> -->

      <button
  
    type="button"
    class="btn btn-veri-outline"
    data-bs-toggle="modal"
    data-bs-target="#topUpModal"
>
    <i class="bi bi-arrow-down-circle me-2"></i>
    <span id="topuptext">Top UP</span>
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
                        <div class="phgh-stat__value totalPHCommitted" >0</div>
                       
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
<div id="phghToastWrap"></div>

<?php include('footer.php'); ?>

<script>

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
                            Loading PH requests...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    `;

    const tbody = document.getElementById("phTableBody");

    try {

        // ============================================
        // GET STARTING ID FROM ghQueueHead
        // ============================================

        let currentId = Number(
            await mainContract.methods
                .ghQueueHead()
                .call()
        );

        console.log("GH Queue Head:", currentId);

        // ============================================
        // NO REQUEST
        // ============================================

        if (!currentId || currentId === 0) {

            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <div class="d-flex flex-column align-items-center justify-content-center">

                            <div class="mb-3"
                                style="
                                    width:52px;
                                    height:52px;
                                    border-radius:14px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    background:rgba(0,255,170,.08);
                                    border:1px solid rgba(0,255,170,.18);
                                ">
                                <i class="bi bi-hand-thumbs-up-fill fs-4"
                                   style="color:var(--neon);"></i>
                            </div>

                            <div class="fw-semibold text-light mb-1">
                                Ready to Provide Help
                            </div>

                            <div class="text-secondary small mb-3">
                                No PH request is currently available.
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

            return;
        }

        // ============================================
        // GET REQUESTS
        //
        // ghQueueHead = 10
        //
        // ghRequests(10)
        // ghRequests(11)
        // ghRequests(12)
        // ghRequests(13)
        // ...
        //
        // jab request nahi milegi -> STOP
        // ============================================

        const requests = [];

        let safetyCounter = 0;

        while (true) {

            safetyCounter++;

            // Safety protection
            if (safetyCounter > 1000) {
                console.warn(
                    "PH loop stopped because safety limit reached."
                );
                break;
            }

            console.log(
                "Checking GH Request ID:",
                currentId
            );

            try {

                const request = await mainContract.methods
                    .ghRequests(currentId)
                    .call();

                console.log(
                    "ghRequests(" + currentId + "):",
                    request
                );

                // ========================================
                // GET REQUEST ID
                // ========================================

                const id =
                    request.id !== undefined
                        ? request.id
                        : request[0];

                // ========================================
                // NO VALUE -> STOP LOOP
                // ========================================

                if (
                    id === undefined ||
                    id === null ||
                    String(id) === "0"
                ) {

                    console.log(
                        "No more GH requests at ID:",
                        currentId
                    );

                    break;
                }

                // ========================================
                // VALID REQUEST
                // ========================================

                requests.push(request);

                // ========================================
                // IMPORTANT:
                // NO ghQueueNext()
                //
                // Just increment ID
                // ========================================

                currentId++;

            } catch (error) {

                console.log(
                    "Stopped at GH Request ID:",
                    currentId,
                    error
                );

                break;
            }
        }

        console.log(
            "Total GH Requests:",
            requests.length
        );

        // ============================================
        // NO HISTORY
        // ============================================

        if (requests.length === 0) {

            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <div class="text-secondary">
                            No PH request is currently available.
                        </div>
                    </td>
                </tr>
            `;

            document.getElementById("phStatActive").innerText = "0";
            document.getElementById("phStatVolume").innerText = "0.00";
            document.getElementById("phCounter").innerText = "0 / 0";

            return;
        }

        // ============================================
        // CLEAR LOADING
        // ============================================

        tbody.innerHTML = "";

        let totalVolume = 0;

        // ============================================
        // SHOW ALL REQUESTS
        // ============================================

        // requests.forEach((request) => {

        //     const id =
        //         request.id !== undefined
        //             ? request.id
        //             : request[0];

        //     const wallet =
        //         request.user !== undefined
        //             ? request.user
        //             : request[1];

        //     const requestIndex =
        //         request.requestIndex !== undefined
        //             ? request.requestIndex
        //             : request[2];

        //     const rawAmount =
        //         request.amount !== undefined
        //             ? request.amount
        //             : request[3];

        //     const amount = Number(
        //         Web3.utils.fromWei(
        //             String(rawAmount),
        //             "ether"
        //         )
        //     );

        //     totalVolume += amount;

        //     const row = document.createElement("tr");

        //     row.innerHTML = `
        //         <td>
        //             <span class="badge bg-secondary">
        //                 #${escapeHtml(id)}
        //             </span>
        //         </td>

        //         <td class="font-monospace">
        //             ${escapeHtml(shortAddress(wallet))}
        //         </td>

        //         <td class="fw-bold text-success">
        //             $${amount.toFixed(2)} USDT
        //         </td>

        //         <td>
        //             #${escapeHtml(requestIndex)}
        //         </td>

        //         <td>
        //             <button
        //                 type="button"
        //                 class="btn btn-success btn-sm"
        //                 onclick="PHGH.openPhConfirm({
        //                     id:'${escapeHtml(id)}',
        //                     amount:'${amount}',
        //                     wallet:'${escapeHtml(wallet)}'
        //                 })">

        //                 <i class="bi bi-hand-thumbs-up me-1"></i>
        //                 Provide Help
        //             </button>
        //         </td>
        //     `;

        //     tbody.appendChild(row);
        // });


requests.forEach((request, index) => {

    const id =
        request.id !== undefined
            ? request.id
            : request[0];

    const wallet =
        request.user !== undefined
            ? request.user
            : request[1];

    const requestIndex =
        request.requestIndex !== undefined
            ? request.requestIndex
            : request[2];

    const rawAmount =
        request.amount !== undefined
            ? request.amount
            : request[3];

    const amount = Number(
        Web3.utils.fromWei(
            String(rawAmount),
            "ether"
        )
    );

    totalVolume += amount;

    // ============================================
    // ONLY FIRST ROW ENABLED
    // ============================================

    const isFirstRow = index === 0;

    const buttonDisabled = !isFirstRow;

    const buttonClass = isFirstRow
        ? "btn btn-success btn-sm"
        : "btn btn-secondary btn-sm";

    const buttonStyle = isFirstRow
        ? ""
        : "opacity:0.55;cursor:not-allowed;";

    const buttonText = isFirstRow
        ? "Provide Help"
        : "Provide Help";

    const row = document.createElement("tr");

    row.innerHTML = `
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
                class="${buttonClass}"
                style="${buttonStyle}"
                ${buttonDisabled ? "disabled" : ""}
                onclick="PHGH.openPhConfirm({
                    id:'${escapeHtml(id)}',
                    amount:'${amount}',
                    wallet:'${escapeHtml(wallet)}'
                })">

                <i class="bi bi-hand-thumbs-up me-1"></i>
                ${buttonText}
            </button>
        </td>
    `;

    tbody.appendChild(row);
});



        // ============================================
        // UPDATE STATS
        // ============================================

        document.getElementById("phStatActive").innerText =
            requests.length;

        document.getElementById("phStatVolume").innerText =
            totalVolume.toFixed(2);

        document.getElementById("phCounter").innerText =
            requests.length + " / " + requests.length;

    } catch(error) {

        console.error(
            "PH Request Error:",
            error
        );

        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-danger py-4">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Unable to load PH requests.
                </td>
            </tr>
        `;

        document.getElementById("phStatActive").innerText = "0";
        document.getElementById("phStatVolume").innerText = "0.00";
        document.getElementById("phCounter").innerText = "0 / 0";
    }
}








    /*
     * Open Bootstrap confirmation popup.
     */
    // function openPhConfirm(request){

    //     selectedPh = request;

    //     document.getElementById('confirmPhId').textContent =
    //         '#' + request.id;

    //     document.getElementById('confirmPhAmount').textContent =
    //         Number(request.amount).toFixed(2) + ' USDT';

    //     document.getElementById('confirmPhWallet').textContent =
    //         shortAddress(request.wallet);

    //     const modal = bootstrap.Modal.getOrCreateInstance(
    //         document.getElementById('phConfirmModal')
    //     );

    //     modal.show();
    // }



function openPhConfirm(request){

    // ============================================
    // GET CONNECTED WALLET
    // ============================================

    getCurrentAccount().then(function(account){

        if(!account){
            showToast(
                "Please connect your wallet.",
                "error"
            );
            return;
        }

        // ========================================
        // OWN WALLET CHECK
        // ========================================

        if(
            request.wallet &&
            account.toLowerCase() === request.wallet.toLowerCase()
        ){

            showToast(
                "Cannot fulfil own GH request",
                "error"
            );

            return;
        }

        // ========================================
        // VALID REQUEST
        // ========================================

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

    }).catch(function(error){

        console.error(
            "Wallet check error:",
            error
        );

        showToast(
            "Unable to verify connected wallet.",
            "error"
        );
    });
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
             * 7. Reload live PH queue after success.
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
    function showTab(tab){
        // PH-only page.
        renderPH();
    }

    document.getElementById('confirmPhBtn')
        .addEventListener('click', confirmPh);
window.PHGH = {
        showTab: showTab,
        openPhConfirm: openPhConfirm,
        openDirectPhConfirm: openDirectPhConfirm,
        renderPH: renderPH
    };

    renderPH();

})();
</script>
