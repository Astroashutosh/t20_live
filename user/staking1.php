
<?php include('header.php'); ?>

<style>
.stake-page{
    --s-green:var(--neon,#20e39a);
    --s-blue:#7b93ff;
    --s-gold:var(--gold,#d4af37);
    --s-muted:var(--text-secondary,#82908d)
}

.stake-hero{
    position:relative;
    overflow:hidden;
    padding:22px;
    border-radius:20px;
    margin-bottom:14px
}

.stake-hero:after{
    content:"";
    position:absolute;
    width:380px;
    height:200px;
    right:-100px;
    top:-100px;
    background:radial-gradient(
        circle,
        rgba(32,227,154,.13),
        transparent 68%
    );
    pointer-events:none
}

.stake-hero-inner{
    position:relative;
    z-index:2;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px
}

.stake-title{
    display:flex;
    align-items:center;
    gap:12px
}

.stake-title-icon{
    width:46px;
    height:46px;
    display:grid;
    place-items:center;
    border-radius:13px;
    color:var(--s-green);
    background:rgba(32,227,154,.09);
    border:1px solid rgba(32,227,154,.13);
    font-size:19px
}

.stake-kicker{
    color:var(--s-green);
    font:800 9px var(--font-mono,monospace);
    letter-spacing:.14em;
    text-transform:uppercase
}

.stake-title h1{
    margin:2px 0 0;
    font-size:22px;
    font-weight:800
}

.stake-copy{
    color:var(--s-muted);
    font-size:11px;
    margin:8px 0 0 58px
}

.stake-live{
    display:inline-flex;
    align-items:center;
    gap:7px;
    padding:8px 10px;
    border:1px solid rgba(255,255,255,.08);
    background:rgba(255,255,255,.025);
    border-radius:10px;
    color:#aeb9b6;
    font:9px var(--font-mono,monospace)
}

.stake-live-dot{
    width:6px;
    height:6px;
    border-radius:50%;
    background:var(--s-green);
    box-shadow:0 0 10px var(--s-green)
}

.stake-metrics{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:10px;
    margin-bottom:14px
}

.stake-metric{
    position:relative;
    overflow:hidden;
    padding:15px;
    border-radius:15px
}

.stake-metric:after{
    content:"";
    position:absolute;
    right:-35px;
    bottom:-40px;
    width:100px;
    height:100px;
    border-radius:50%;
    background:rgba(32,227,154,.07)
}

.stake-metric.blue:after{
    background:rgba(123,147,255,.07)
}

.stake-metric.gold:after{
    background:rgba(212,175,55,.07)
}

.stake-metric.purple:after{
    background:rgba(175,123,255,.07)
}

.stake-metric__label{
    color:var(--s-muted);
    font-size:9px;
    text-transform:uppercase;
    letter-spacing:.07em
}

.stake-metric__value{
    margin-top:7px;
    font:800 20px var(--font-mono,monospace)
}

.stake-metric__hint{
    color:var(--s-muted);
    font-size:9px;
    margin-top:3px
}

.stake-metric__icon{
    position:absolute;
    right:13px;
    top:13px;
    width:32px;
    height:32px;
    display:grid;
    place-items:center;
    border-radius:9px;
    color:var(--s-green);
    background:rgba(32,227,154,.09)
}

.stake-metric.blue .stake-metric__icon{
    color:#9badff;
    background:rgba(123,147,255,.09)
}

.stake-metric.gold .stake-metric__icon{
    color:#d8b968;
    background:rgba(216,185,104,.09)
}

.stake-metric.purple .stake-metric__icon{
    color:#c39aff;
    background:rgba(175,123,255,.09)
}

.stake-workspace{
    padding:17px;
    border-radius:18px
}

.stake-workspace-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:15px;
    margin-bottom:13px
}

.stake-workspace-title{
    display:flex;
    align-items:center;
    gap:10px
}

.stake-workspace-icon{
    width:36px;
    height:36px;
    display:grid;
    place-items:center;
    border-radius:10px;
    color:var(--s-green);
    background:rgba(32,227,154,.09)
}

.stake-workspace-title h5{
    margin:0;
    font-size:13px;
    font-weight:800
}

.stake-workspace-title p{
    margin:2px 0 0;
    color:var(--s-muted);
    font-size:9px
}

.stake-head-actions{
    display:flex;
    align-items:center;
    gap:7px
}

.stake-count{
    padding:6px 9px;
    border-radius:8px;
    background:rgba(255,255,255,.025);
    border:1px solid rgba(255,255,255,.07);
    color:var(--s-muted);
    font:9px var(--font-mono,monospace)
}

.stake-table-head,
.stake-row{
    display:grid;
    grid-template-columns:1.05fr 1fr 1fr 1fr 1fr 115px;
    gap:12px;
    align-items:center
}

.stake-table-head{
    padding:0 13px 8px;
    color:#5f6c69;
    font:800 8px var(--font-mono,monospace);
    text-transform:uppercase;
    letter-spacing:.07em
}

.stake-row{
    min-height:70px;
    padding:10px 13px;
    margin-bottom:7px;
    border-radius:13px;
    border:1px solid rgba(255,255,255,.07);
    background:linear-gradient(
        100deg,
        rgba(255,255,255,.025),
        rgba(255,255,255,.012)
    );
    transition:.2s;
    position:relative
}

.stake-row:before{
    content:"";
    position:absolute;
    left:0;
    top:13px;
    bottom:13px;
    width:2px;
    border-radius:4px;
    background:linear-gradient(
        180deg,
        var(--s-green),
        rgba(32,227,154,0)
    )
}

.stake-row:hover{
    transform:translateY(-1px);
    border-color:rgba(32,227,154,.18);
    background:linear-gradient(
        100deg,
        rgba(32,227,154,.035),
        rgba(255,255,255,.012)
    )
}

.stake-row-main small,
.stake-cell small{
    display:block;
    color:#64716e;
    font:8px var(--font-mono,monospace);
    margin-bottom:3px
}

.stake-row-main strong{
    color:#f0f4f3;
    font-size:14px;
    font-weight:800
}

.stake-cell{
    color:#a8b2af;
    font-size:10px
}

.stake-cell strong{
    color:#dce3e1;
    font-size:10px
}

.stake-amount{
    display:flex;
    align-items:center;
    gap:7px;
    font:800 11px var(--font-mono,monospace)
}

.stake-token{
    width:25px;
    height:25px;
    display:grid;
    place-items:center;
    border-radius:50%;
    background:linear-gradient(145deg,#27d9a0,#12966e);
    color:#fff;
    font-size:11px;
    font-weight:900
}

.stake-status{
    display:inline-flex;
    align-items:center;
    gap:5px;
    width:max-content;
    padding:5px 8px;
    border-radius:20px;
    color:var(--s-green);
    background:rgba(32,227,154,.08);
    font:800 8px var(--font-mono,monospace)
}

.stake-status:before{
    content:"";
    width:4px;
    height:4px;
    border-radius:50%;
    background:currentColor;
    box-shadow:0 0 8px currentColor
}

.stake-status.waiting{
    color:#d8b968;
    background:rgba(216,185,104,.08)
}

.stake-action{
    display:flex;
    justify-content:flex-end
}

.stake-action .btn{
    min-width:105px;
    padding:7px 10px;
    border-radius:9px;
    font-size:9px;
    font-weight:800
}

.stake-empty{
    display:none;
    min-height:220px;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    border:1px dashed rgba(255,255,255,.08);
    border-radius:13px
}

.stake-empty-icon{
    width:46px;
    height:46px;
    display:grid;
    place-items:center;
    margin-bottom:10px;
    border-radius:13px;
    color:var(--s-green);
    background:rgba(32,227,154,.08);
    font-size:19px
}

.stake-empty h6{
    color:#fff;
    font-size:12px;
    margin-bottom:4px
}

.stake-empty p{
    color:var(--s-muted);
    font-size:9px;
    margin-bottom:12px
}

.stake-modal .modal-content{
    background:#0b1715;
    border:1px solid rgba(255,255,255,.09);
    border-radius:18px;
    box-shadow:0 30px 90px rgba(0,0,0,.55)
}

.stake-modal .modal-header,
.stake-modal .modal-footer{
    border-color:rgba(255,255,255,.07)
}

.stake-modal .modal-title{
    font-size:14px;
    font-weight:800
}

.stake-form-box{
    padding:14px;
    border-radius:13px;
    border:1px solid rgba(255,255,255,.07);
    background:rgba(255,255,255,.022)
}

.stake-input{
    min-height:48px;
    color:#fff!important;
    background:rgba(255,255,255,.035)!important;
    border:1px solid rgba(255,255,255,.09)!important
}

.stake-input:focus{
    border-color:rgba(32,227,154,.4)!important;
    box-shadow:0 0 0 .2rem rgba(32,227,154,.07)!important
}

.stake-balance-line{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:8px;
    color:var(--s-muted);
    font-size:9px
}

.stake-max{
    border:0;
    color:var(--s-green);
    background:rgba(32,227,154,.07);
    border-radius:6px;
    padding:4px 7px;
    font:800 8px var(--font-mono,monospace);
    cursor:pointer
}

.stake-review{
    margin-top:12px;
    padding:12px;
    border-radius:11px;
    background:rgba(32,227,154,.035);
    border:1px solid rgba(32,227,154,.08)
}

.stake-review-row{
    display:flex;
    justify-content:space-between;
    padding:4px 0;
    color:var(--s-muted);
    font-size:9px
}

.stake-review-row strong{
    color:#fff;
    font:800 9px var(--font-mono,monospace)
}

#stakeToast{
    position:fixed;
    right:18px;
    bottom:18px;
    z-index:99999;
    width:min(340px,calc(100vw - 30px))
}

.stake-toast{
    margin-top:7px;
    padding:11px 13px;
    border-radius:11px;
    border:1px solid rgba(255,255,255,.08);
    background:#0c1916;
    color:#eaf0ee;
    font-size:10px;
    box-shadow:0 16px 40px rgba(0,0,0,.35)
}

@media(max-width:1100px){
    .stake-metrics{
        grid-template-columns:repeat(2,1fr)
    }
}

@media(max-width:1000px){
    .stake-table-head,
    .stake-row{
        grid-template-columns:1fr 1fr 1fr 1fr 105px
    }

    .stake-table-head span:nth-child(4),
    .stake-row>.stake-cell:nth-child(4){
        display:none
    }
}

@media(max-width:767px){
    .stake-hero-inner{
        align-items:flex-start;
        flex-direction:column
    }

    .stake-copy{
        margin-left:0
    }

    .stake-live{
        align-self:flex-start
    }

    .stake-metrics{
        grid-template-columns:1fr
    }

    .stake-workspace-head{
        align-items:flex-start;
        flex-direction:column
    }

    .stake-head-actions{
        width:100%;
        justify-content:space-between
    }

    .stake-table-head{
        display:none
    }

    .stake-row{
        grid-template-columns:1fr 1fr;
        gap:9px;
        padding:12px
    }

    .stake-row>.stake-cell:nth-child(4){
        display:block
    }

    .stake-action{
        justify-content:flex-start
    }
}

@media(max-width:420px){
    .stake-workspace{
        padding:12px
    }

    .stake-row-main strong{
        font-size:12px
    }

    .stake-cell{
        font-size:8px
    }

    .stake-action .btn{
        min-width:92px;
        font-size:8px
    }
}



.history-switch-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
}

@media (max-width: 576px) {

    .stake-history-header {
        flex-direction: column;
        align-items: stretch !important;
        gap: 12px;
    }

    .history-switch-buttons {
        width: 100%;
    }

    .history-switch-buttons .btn {
        flex: 1;
    }
}

</style>


<div class="dash-main stake-page">

    <div class="dash-topbar">

        <div class="dash-topbar__left">

            <button
                class="sidebar-toggle-btn"
                data-action="toggle-sidebar">
                <i class="bi bi-list fs-5"></i>
            </button>

            <span class="network-badge d-none d-md-inline">
                <i class="bi bi-diagram-3 me-1"></i>
                BNB Smart Chain
            </span>

            <span class="network-badge d-none d-lg-inline">
                <i class="bi bi-patch-check me-1"></i>
                Contract Verified
            </span>

        </div>

        <div class="d-flex align-items-center gap-2">

            <span class="wallet-pill d-flex">

                <span
                    class="pulse-live"
                    style="
                        width:6px;
                        height:6px;
                        border-radius:50%;
                        background:var(--neon);
                    ">
                </span>

                <span class="connected_walletdash">
                    0x...
                </span>

            </span>

        </div>

    </div>


    <div class="dash-content">

        <!-- HERO -->
        <div class="glass-card stake-hero dash-reveal">

            <div class="stake-hero-inner">

                <div>

                    <div class="stake-title">

                        <div class="stake-title-icon">
                            <i class="bi bi-lock-fill"></i>
                        </div>

                        <div>
                            <div class="stake-kicker">
                                Asset Growth
                            </div>

                            <h1>Staking</h1>
                        </div>

                    </div>

                    <p class="stake-copy">
                        Stake your OLD TOKEN directly into the staking contract
                        and earn NEW TOKEN rewards every 15 days.
                    </p>

                </div>

                <div class="stake-live">
                    <span class="stake-live-dot"></span>
                    STAKING ACTIVE
                </div>

            </div>

        </div>


        <!-- METRICS -->
        <div class="stake-metrics">

            <div class="glass-card stake-metric dash-reveal">

                <div class="stake-metric__label">
                    Wallet Balance
                </div>

                <div
                    class="stake-metric__value"
                    id="stakeWalletBalance">
                    0 OLD
                </div>

                <div class="stake-metric__hint">
                    Available to stake
                </div>

                <div class="stake-metric__icon">
                    <i class="bi bi-wallet2"></i>
                </div>

            </div>


            <div class="glass-card stake-metric blue dash-reveal">

                <div class="stake-metric__label">
                    Total Staked
                </div>

                <div
                    class="stake-metric__value"
                    id="stakeTotal">
                    0 OLD
                </div>

                <div class="stake-metric__hint">
                    Current staked amount
                </div>

                <div class="stake-metric__icon">
                    <i class="bi bi-layers"></i>
                </div>

            </div>


            <div class="glass-card stake-metric gold dash-reveal">

                <div class="stake-metric__label">
                    Current Capital
                </div>

                <div
                    class="stake-metric__value"
                    id="stakeCapital">
                    0 OLD
                </div>

                <div class="stake-metric__hint">
                    Current reward capital
                </div>

                <div class="stake-metric__icon">
                    <i class="bi bi-bank"></i>
                </div>

            </div>


            <div class="glass-card stake-metric purple dash-reveal">

                <!-- <div class="stake-metric__label">
                    Next Reward
                </div>

                <div
                    class="stake-metric__value"
                    id="stakeNextClaim">
                    --
                </div>

                <div class="stake-metric__hint">
                    10% after 15 days
                </div> -->

<div class="stake-metric__label">
    Reward Available
</div>

<div
    class="stake-metric__value"
    id="stakeNextClaim">
    10%
</div>

<div class="stake-metric__hint">
    Claim anytime
</div>




                <div class="stake-metric__icon">
                    <i class="bi bi-gift"></i>
                </div>

            </div>

        </div>


        <!-- HISTORY -->
        <div class="glass-card stake-workspace dash-reveal">

            <div class="stake-workspace-head">

            <div class="stake-history-header">

    <div>
        <h5 id="historyTitle">Staking History</h5>

       
    </div>

    <div class="history-switch-buttons">

        <button
            type="button"
            id="stakingHistoryBtn"
            class="btn btn-veri-primary btn-sm"
            onclick="STAKING_PAGE.showStakingHistory()">

            <i class="bi bi-lock-fill me-1"></i>
            Staking History

        </button>

        <button
            type="button"
            id="claimHistoryBtn"
            class="btn btn-veri-outline btn-sm"
            onclick="STAKING_PAGE.showClaimHistory()">

            <i class="bi bi-gift me-1"></i>
            Claim History

        </button>

    </div>

</div>

            <div class="stake-head-actions">



    <button
        type="button"
        class="btn btn-veri-primary btn-sm"
        onclick="STAKING_PAGE.openModal()">

        <i class="bi bi-plus-circle me-1"></i>
        Stake Now

    </button>

    <button
        type="button"
        id="claimRewardBtn"
        class="btn btn-veri-outline btn-sm"
        onclick="STAKING_PAGE.claimReward()">

        <i class="bi bi-gift me-1"></i>
        Claim Reward

    </button>

</div>

            </div>


            <div class="stake-table-head"   id="historyTableHead">

                <span>Stake</span>
                <span>Amount</span>
                <span>Start Date</span>
                <span>Capital</span>
                <span>Status</span>
                <span>Action</span>

            </div>


            <div id="stakeList"></div>


            <div id="stakeEmpty" class="stake-empty">

                <div class="stake-empty-icon">
                    <i class="bi bi-lock"></i>
                </div>

                <h6>No staking history</h6>

                <p>
                    Start your first stake to see it appear here.
                </p>

                <button
                    type="button"
                    class="btn btn-veri-primary btn-sm"
                    onclick="STAKING_PAGE.openModal()">

                    <i class="bi bi-plus-circle me-1"></i>
                    Stake Now

                </button>

            </div>


        </div>

    </div>

</div>


<!-- STAKE MODAL -->
<div
    class="modal fade stake-modal"
    id="stakeNowModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header px-3 px-md-4 py-3">

                <h5 class="modal-title">

                    <i
                        class="bi bi-lock-fill me-2"
                        style="color:var(--s-green)">
                    </i>

                    Stake OLD TOKEN

                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <form id="stakeForm">

                <div class="modal-body">

                    <div class="stake-form-box">

                        <label class="small text-secondary mb-1">
                            Amount of OLD TOKEN to stake
                        </label>

                        <div class="input-group">

                            <input
                                type="number"
                                id="stakeAmount"
                                class="form-control stake-input"
                                min="0.000000000000000001"
                                step="any"
                                placeholder="0.00"
                                required>

                            <span class="input-group-text form-veri">
                                OLD
                            </span>

                        </div>


                        <div class="stake-balance-line">

                            <span>
                                Available balance:
                                <strong id="stakeAvailable">
                                    0 OLD
                                </strong>
                            </span>

                            <button
                                type="button"
                                class="stake-max"
                                onclick="STAKING_PAGE.setMax()">
                                MAX
                            </button>

                        </div>


                        <div class="stake-review">

                            <div class="stake-review-row">

                                <span>
                                    Stake amount
                                </span>

                                <strong id="reviewAmount">
                                    0 OLD
                                </strong>

                            </div>


                            <div class="stake-review-row">

                                <span>
                                    Claim period
                                </span>

                                <strong>
                                    15 Days
                                </strong>

                            </div>


                            <div class="stake-review-row">

                                <span>
                                    Reward
                                </span>

                                <strong
                                    style="color:var(--s-green)">
                                    10%
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="modal-footer px-3 px-md-4 py-2">

                    <button
                        type="button"
                        class="btn btn-veri-outline btn-sm"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button
                        type="submit"
                        id="confirmStakeBtn"
                        class="btn btn-veri-primary btn-sm">

                        <i class="bi bi-check2-circle me-1"></i>
                        Confirm Stake

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<div id="stakeToast"></div>


<?php include('footer.php'); ?>


<script>
(function () {

    /*
    ============================================================
    REAL T20 STAKING CONTRACT

    stakingContract
        -> T20Staking contract

    oldToken
        -> OLD T20 ERC20 token

    staking_contract
        -> staking contract address

    Contract functions used:

        oldT20Token()
        newT20Token()

        stake(amount)

        claimReward()

        getUserInfo(address)

        canClaim(address)

        nextClaimTime(address)

        pendingReward(address)

        timeUntilClaim(address)

        getUserStakeLogIds(address)

        getStakeLog(id)

    ============================================================
    */

    const DECIMALS = 18;
    const CLAIM_PERIOD = 15 * 24 * 60 * 60;
    const REWARD_PERCENT = 10;


    function toast(message, error = false) {

        if (typeof toastr !== "undefined") {

            if (error) {
                toastr.error(message);
            } else {
                toastr.success(message);
            }

            return;
        }

        const wrapper =
            document.getElementById("stakeToast");

        if (!wrapper) return;

        const element =
            document.createElement("div");

        element.className = "stake-toast";

        element.innerHTML =
            '<i class="bi ' +
            (error
                ? 'bi-exclamation-circle'
                : 'bi-check-circle') +
            '" style="color:' +
            (error
                ? '#ff7f8b'
                : '#20e39a') +
            ';margin-right:7px"></i>' +
            escapeHtml(message);

        wrapper.appendChild(element);

        setTimeout(function () {

            element.style.opacity = "0";

            setTimeout(function () {
                element.remove();
            }, 220);

        }, 2600);
    }


    function escapeHtml(value) {

        return String(value ?? "")
            .replace(/[&<>"']/g, function (c) {

                return {
                    "&": "&amp;",
                    "<": "&lt;",
                    ">": "&gt;",
                    '"': "&quot;",
                    "'": "&#039;"
                }[c];

            });

    }


    function money(value) {

        return Number(value || 0)
            .toLocaleString(undefined, {
                minimumFractionDigits: 0,
                maximumFractionDigits: 6
            });

    }


    function tokenToNumber(value) {

        if (
            window.Web3 &&
            Web3.utils &&
            Web3.utils.fromWei
        ) {

            return Number(
                Web3.utils.fromWei(
                    String(value || "0"),
                    "ether"
                )
            );

        }

        return Number(value || 0) / 1e18;

    }


    function numberToWei(value) {

        if (
            window.Web3 &&
            Web3.utils &&
            Web3.utils.toWei
        ) {

            return Web3.utils.toWei(
                String(value),
                "ether"
            );

        }

        if (window.BigNumber) {

            return new BigNumber(String(value))
                .times("1000000000000000000")
                .integerValue(
                    BigNumber.ROUND_DOWN
                )
                .toFixed(0);

        }

        throw new Error(
            "Web3.js or BigNumber.js is required."
        );

    }


    async function getAccountSafe() {

        if (
            typeof getCurrentAccount === "function"
        ) {

            const account =
                await getCurrentAccount();

            if (account) {
                return account;
            }

        }


        if (window.ethereum) {

            const accounts =
                await ethereum.request({
                    method: "eth_requestAccounts"
                });

            return accounts &&
                accounts[0]
                ? accounts[0]
                : "";

        }

        return "";

    }


    async function getGasPriceSafe() {

        if (typeof getGas === "function") {

            return await getGas();

        }

        if (
            window.p &&
            p.eth &&
            p.eth.getGasPrice
        ) {

            return await p.eth.getGasPrice();

        }

        return undefined;

    }


    function setButtonLoading(loading) {

        const button =
            document.getElementById(
                "confirmStakeBtn"
            );

        if (!button) return;


        if (loading) {

            button.dataset.oldHtml =
                button.innerHTML;

            button.disabled = true;

            button.innerHTML =
                '<span class="spinner-border ' +
                'spinner-border-sm me-2"></span>' +
                'Processing...';

        } else {

            button.disabled = false;

            button.innerHTML =
                button.dataset.oldHtml ||
                '<i class="bi bi-check2-circle me-1"></i>' +
                'Confirm Stake';

        }

    }


    async function loadWalletBalance() {

        try {

            const account =
                await getAccountSafe();

            if (!account) {

                $("#stakeWalletBalance")
                    .text("0 OLD");

                $("#stakeAvailable")
                    .text("0 OLD");

                return 0;

            }


            const raw =
                await usdtContract.methods
                    .balanceOf(account)
                    .call();

            const balance =
                tokenToNumber(raw);


            $("#stakeWalletBalance")
                .text(money(balance) + " OLD");

            $("#stakeAvailable")
                .text(money(balance) + " OLD");


            return balance;

        } catch (error) {

            console.error(
                "OLD TOKEN balance error:",
                error
            );

            return 0;

        }

    }


    async function loadUserInfo() {

        try {

            const account =
                await getAccountSafe();

            if (!account) {

                resetMetrics();

                return null;

            }


            const user =
                await stakingContract.methods
                    .getUserInfo(account)
                    .call();


            const stakedAmount =
                user.stakedAmount !== undefined
                    ? user.stakedAmount
                    : user[0];

            const capital =
                user.capital !== undefined
                    ? user.capital
                    : user[1];

            const claimedCycles =
                user.claimedCycles !== undefined
                    ? user.claimedCycles
                    : user[2];

            const startTime =
                user.startTime !== undefined
                    ? user.startTime
                    : user[3];

            const lastClaimTime =
                user.lastClaimTime !== undefined
                    ? user.lastClaimTime
                    : user[4];

            const active =
                user.active !== undefined
                    ? user.active
                    : user[5];


            const staked =
                tokenToNumber(stakedAmount);

            const currentCapital =
                tokenToNumber(capital);


            $("#stakeTotal")
                .text(money(staked) + " OLD");

            $("#stakeCapital")
                .text(
                    money(currentCapital) +
                    " OLD"
                );


            updateNextClaim(
                lastClaimTime,
                active
            );


            return {
                stakedAmount,
                capital,
                claimedCycles,
                startTime,
                lastClaimTime,
                active
            };

        } catch (error) {

            console.error(
                "User staking info error:",
                error
            );

            resetMetrics();

            return null;

        }

    }


    function resetMetrics() {

        $("#stakeTotal")
            .text("0 OLD");

        $("#stakeCapital")
            .text("0 OLD");

        $("#stakeNextClaim")
            .text("--");

    }


    function updateNextClaim(
        lastClaimTime,
        active
    ) {

        if (!active) {

            $("#stakeNextClaim")
                .text("--");

            $("#claimRewardBtn")
                .prop("disabled", true);

            return;

        }


        const next =
            Number(lastClaimTime || 0) +
            CLAIM_PERIOD;

        const now =
            Math.floor(Date.now() / 1000);

        if (now >= next) {

            $("#stakeNextClaim")
                .text("READY");

            $("#claimRewardBtn")
                .prop("disabled", false);

            return;

        }


        const remain = next - now;

        const days =
            Math.floor(remain / 86400);

        const hours =
            Math.floor(
                (remain % 86400) / 3600
            );

        const minutes =
            Math.floor(
                (remain % 3600) / 60
            );


        $("#stakeNextClaim")
            .text(
                days +
                "d " +
                hours +
                "h " +
                minutes +
                "m"
            );

        $("#claimRewardBtn")
            .prop("disabled", true);

    }


    // async function loadClaimStatus() {

    //     try {

    //         const account =
    //             await getAccountSafe();

    //         if (!account) return;


    //         const canClaim =
    //             await stakingContract.methods
    //                 .canClaim(account)
    //                 .call();


    //         $("#claimRewardBtn")
    //             .prop(
    //                 "disabled",
    //                 !canClaim
    //             );


    //     } catch (error) {

    //         console.error(
    //             "Claim status error:",
    //             error
    //         );

    //     }

    // }


async function loadClaimStatus() {

    try {

        const account = await getAccountSafe();

        if (!account) {
            $("#claimRewardBtn").prop("disabled", true);
            return;
        }

        const user = await stakingContract.methods
            .getUserInfo(account)
            .call();

        const active =
            user.active !== undefined
                ? user.active
                : user[5];

        const capital =
            user.capital !== undefined
                ? user.capital
                : user[1];

        const hasCapital =
            Number(capital) > 0;

        $("#claimRewardBtn").prop(
            "disabled",
            !(active && hasCapital)
        );

    } catch (error) {

        console.error(
            "Claim status error:",
            error
        );

        $("#claimRewardBtn").prop(
            "disabled",
            true
        );
    }
}



    async function loadPendingReward() {

        try {

            const account =
                await getAccountSafe();

            if (!account) return 0;


            const raw =
                await stakingContract.methods
                    .pendingReward(account)
                    .call();


            return tokenToNumber(raw);

        } catch (error) {

            console.error(
                "Pending reward error:",
                error
            );

            return 0;

        }

    }


    async function loadHistory() {

        const list =
            document.getElementById(
                "stakeList"
            );

        const empty =
            document.getElementById(
                "stakeEmpty"
            );

        if (!list || !empty) return;


        list.innerHTML = `
            <div
                class="text-center text-secondary py-5"
                style="font-size:10px">

                <span
                    class="spinner-border spinner-border-sm me-2">
                </span>

                Loading staking history...

            </div>
        `;

        empty.style.display = "none";


        try {

            const account =
                await getAccountSafe();

            if (!account) {

                list.innerHTML = "";

                empty.style.display = "flex";

                return;

            }


            const ids =
                await stakingContract.methods
                    .getUserStakeLogIds(account)
                    .call();


            if (!ids || ids.length === 0) {

                list.innerHTML = "";

                empty.style.display = "flex";

                $("#stakeHistoryCount")
                    .text("0");

                return;

            }


            const rows = [];


            for (
                let i = ids.length - 1;
                i >= 0;
                i--
            ) {

                const stakeId =
                    ids[i];


                try {

                    const stake =
                        await stakingContract.methods
                            .getStakeLog(stakeId)
                            .call();


                    rows.push(
                        renderStakeRow(
                            stakeId,
                            stake
                        )
                    );

                } catch (error) {

                    console.error(
                        "Stake log error:",
                        stakeId,
                        error
                    );

                }

            }


            list.innerHTML =
                rows.join("");


            empty.style.display =
                rows.length
                    ? "none"
                    : "flex";


            $("#stakeHistoryCount")
                .text(rows.length);


        } catch (error) {

            console.error(
                "Stake history error:",
                error
            );


            list.innerHTML = `
                <div
                    class="text-center text-danger py-5"
                    style="font-size:10px">

                    Unable to load staking history.

                </div>
            `;

        }

    }


    function renderStakeRow(
        stakeId,
        stake
    ) {

        const user =
            stake.user !== undefined
                ? stake.user
                : stake[0];

        const amountRaw =
            stake.amount !== undefined
                ? stake.amount
                : stake[1];

        const capitalAfterRaw =
            stake.capitalAfterStake !== undefined
                ? stake.capitalAfterStake
                : stake[2];

        const timestamp =
            stake.timestamp !== undefined
                ? stake.timestamp
                : stake[3];


        const amount =
            tokenToNumber(amountRaw);

        const capitalAfter =
            tokenToNumber(
                capitalAfterRaw
            );


        const date =
            new Date(
                Number(timestamp) * 1000
            );


        const dateText =
            date.toLocaleDateString(
                "en-GB",
                {
                    day: "2-digit",
                    month: "short",
                    year: "numeric"
                }
            );


        const timeText =
            date.toLocaleTimeString(
                "en-US",
                {
                    hour: "2-digit",
                    minute: "2-digit"
                }
            );


        return `
            <div class="stake-row">

                <div class="stake-row-main">

                    <small>
                        STAKE #${escapeHtml(stakeId)}
                    </small>

                    <strong>
                        ${money(amount)} OLD
                    </strong>

                </div>


                <div class="stake-amount">

                    <span class="stake-token">
                        O
                    </span>

                    ${money(amount)} OLD

                </div>


                <div class="stake-cell">

                    <strong>
                        ${escapeHtml(dateText)}
                    </strong>

                    <small>
                        ${escapeHtml(timeText)}
                    </small>

                </div>


                <div class="stake-cell">

                    <strong>
                        ${money(capitalAfter)} OLD
                    </strong>

                    <small>
                        Capital after stake
                    </small>

                </div>


                <div>

                    <span class="stake-status">
                        ACTIVE
                    </span>

                    <small
                        style="
                            display:block;
                            color:#64716e;
                            font-size:7px;
                            margin-top:4px;
                        ">

                        On-chain

                    </small>

                </div>


                <div class="stake-action">

                    <button
                        type="button"
                        class="btn btn-veri-outline"
                        onclick="STAKING_PAGE.openModal()">

                        <i class="bi bi-plus-circle me-1"></i>

                        Stake More

                    </button>

                </div>

            </div>
        `;

    }


    async function openModal() {

        $("#stakeAmount").val("");

        $("#reviewAmount")
            .text("0 OLD");


        await loadWalletBalance();


        if (window.bootstrap) {

            bootstrap.Modal
                .getOrCreateInstance(
                    document.getElementById(
                        "stakeNowModal"
                    )
                )
                .show();

        }

    }


    async function setMax() {

        const balance =
            await loadWalletBalance();


        $("#stakeAmount")
            .val(
                balance > 0
                    ? balance
                    : ""
            );


        updateReview();

    }


    function updateReview() {

        const amount =
            Number(
                $("#stakeAmount").val() || 0
            );


        $("#reviewAmount")
            .text(
                money(amount) +
                " OLD"
            );

    }


    async function stakeNow() {

        const amountInput =
            String(
                $("#stakeAmount").val() || ""
            ).trim();


        if (
            !amountInput ||
            Number(amountInput) <= 0
        ) {

            toast(
                "Please enter a valid staking amount.",
                true
            );

            return;

        }


        try {

            setButtonLoading(true);


            const account =
                await getAccountSafe();


            if (!account) {

                toast(
                    "Please connect your wallet.",
                    true
                );

                return;

            }


            const amount =
                numberToWei(
                    amountInput
                );


            const rawBalance =
                await usdtContract.methods
                    .balanceOf(account)
                    .call();


            if (window.BigNumber) {

                if (
                    new BigNumber(
                        String(rawBalance)
                    ).lt(
                        new BigNumber(
                            String(amount)
                        )
                    )
                ) {

                    toast(
                        "Insufficient OLD TOKEN balance.",
                        true
                    );

                    return;

                }

            } else {

                if (
                    BigInt(rawBalance) <
                    BigInt(amount)
                ) {

                    toast(
                        "Insufficient OLD TOKEN balance.",
                        true
                    );

                    return;

                }

            }


            const allowance =
                await usdtContract.methods
                    .allowance(
                        account,
                        staking_contract
                    )
                    .call();


            const gasPrice =
                await getGasPriceSafe();


            if (
                window.BigNumber
                    ? new BigNumber(
                        String(allowance)
                    ).lt(
                        new BigNumber(
                            String(amount)
                        )
                    )
                    : BigInt(allowance) <
                      BigInt(amount)
            ) {

                toast(
                    "Please confirm OLD TOKEN approval.",
                    false
                );


                const approveTx =
                    usdtContract.methods
                        .approve(
                            staking_contract,
                            amount
                        )
                        .send(
                            Object.assign(
                                {
                                    from: account
                                },
                                gasPrice
                                    ? {
                                        gasPrice:
                                            gasPrice
                                    }
                                    : {}
                            )
                        );


                await approveTx;

            }


            /*
             * STAKE
             *
             * Actual contract:
             *
             * stakingContract.stake(amount)
             */
            toast(
                "Approval successful. Confirm staking transaction.",
                false
            );


            const tx =
                stakingContract.methods
                    .stake(amount)
                    .send(
                        Object.assign(
                            {
                                from: account
                            },
                            gasPrice
                                ? {
                                    gasPrice:
                                        gasPrice
                                }
                                : {}
                        )
                    );


            let txHash = "";


            if (
                tx &&
                typeof tx.on === "function"
            ) {

                tx.on(
                    "transactionHash",
                    function (hash) {

                        txHash = hash;

                        console.log(
                            "stake transaction:",
                            hash
                        );

                    }
                );

            }


            await tx;


            if (window.bootstrap) {

                bootstrap.Modal
                    .getOrCreateInstance(
                        document.getElementById(
                            "stakeNowModal"
                        )
                    )
                    .hide();

            }


            toast(
                "Successfully staked " +
                money(
                    Number(amountInput)
                ) +
                " OLD TOKEN."
            );


            /*
             * Refresh blockchain data
             */
            await refreshPageData();


            if (txHash) {

                console.log(
                    "Stake transaction hash:",
                    txHash
                );

            }


        } catch (error) {

            console.error(
                "Staking transaction error:",
                error
            );


            let message =
                "Staking transaction failed.";


            if (error && error.message) {

                const text =
                    error.message.toLowerCase();


                if (
                    text.includes(
                        "user denied"
                    ) ||
                    text.includes(
                        "user rejected"
                    )
                ) {

                    message =
                        "Transaction was rejected in wallet.";

                } else if (
                    text.includes(
                        "insufficient"
                    )
                ) {

                    message =
                        "Insufficient OLD TOKEN or BNB for gas.";

                } else if (
                    text.includes(
                        "amount must be greater"
                    )
                ) {

                    message =
                        "Staking amount must be greater than zero.";

                } else {

                    message =
                        error.message;

                }

            }


            toast(
                message,
                true
            );

        } finally {

            if (
                typeof hideloader === "function"
            ) {
                hideloader();
            }

            $("#cover")
                .css("display", "none");

            setButtonLoading(false);

        }

    }


    async function claimReward() {

        try {

            const account =
                await getAccountSafe();


            if (!account) {

                toast(
                    "Please connect your wallet.",
                    true
                );

                return;

            }


            const canClaim =
                await stakingContract.methods
                    .canClaim(account)
                    .call();


            // if (!canClaim) {

            //     const remaining =
            //         await stakingContract.methods
            //             .timeUntilClaim(account)
            //             .call();


            //     const seconds =
            //         Number(remaining || 0);


            //     const days =
            //         Math.floor(
            //             seconds / 86400
            //         );


            //     const hours =
            //         Math.floor(
            //             (seconds % 86400) /
            //             3600
            //         );


            //     toast(
            //         "Claim is not available yet. " +
            //         days +
            //         "d " +
            //         hours +
            //         "h remaining.",
            //         true
            //     );

            //     return;

            // }


            const rewardRaw =
                await stakingContract.methods
                    .pendingReward(account)
                    .call();


            const reward =
                tokenToNumber(
                    rewardRaw
                );


            if (reward <= 0) {

                toast(
                    "No reward available.",
                    true
                );

                return;

            }


            const confirmed =
                confirm(
                    "Claim " +
                    money(reward) +
                    " NEW TOKEN reward?\n\n" +
                    "Press OK to continue."
                );


            if (!confirmed) return;


            showloader();

            $("#cover")
                .css("display", "block");


            const gasPrice =
                await getGasPriceSafe();


            toast(
                "Please confirm reward claim in your wallet."
            );


            const tx =
                stakingContract.methods
                    .claimReward()
                    .send(
                        Object.assign(
                            {
                                from: account
                            },
                            gasPrice
                                ? {
                                    gasPrice:
                                        gasPrice
                                }
                                : {}
                        )
                    );


            let txHash = "";


            if (
                tx &&
                typeof tx.on === "function"
            ) {

                tx.on(
                    "transactionHash",
                    function (hash) {

                        txHash = hash;

                        console.log(
                            "claimReward tx:",
                            hash
                        );

                    }
                );

            }


            await tx;


            toast(
                money(reward) +
                " NEW TOKEN reward claimed successfully."
            );


            await refreshPageData();


            if (txHash) {

                console.log(
                    "Claim transaction hash:",
                    txHash
                );

            }

        } catch (error) {

            console.error(
                "claimReward error:",
                error
            );


            let message =
                "Reward claim failed.";


            if (
                error &&
                error.message
            ) {

                const text =
                    error.message.toLowerCase();


                if (
                    text.includes(
                        "user denied"
                    ) ||
                    text.includes(
                        "user rejected"
                    )
                ) {

                    message =
                        "Transaction was rejected in wallet.";

                } else if (
                    text.includes(
                        "15 days not completed"
                    )
                ) {

                    message =
                        "15 days have not completed yet.";

                } else if (
                    text.includes(
                        "insufficient new t20"
                    )
                ) {

                    message =
                        "Staking contract has insufficient NEW TOKEN rewards.";

                } else {

                    message =
                        error.message;

                }

            }


            toast(
                message,
                true
            );

        } finally {

            $("#cover")
                .css("display", "none");

            if (
                typeof hideloader === "function"
            ) {
                hideloader();
            }

        }

    }


    async function refreshPageData() {

        await loadWalletBalance();

        await loadUserInfo();

        await loadClaimStatus();

        await loadHistory();

    }
    










// claim history




async function loadClaimHistory() {

    const list =
        document.getElementById("stakeList");

    const empty =
        document.getElementById("stakeEmpty");

    if (!list || !empty) return;

    list.innerHTML = `
        <div
            class="text-center text-secondary py-5"
            style="font-size:10px">

            <span class="spinner-border spinner-border-sm me-2"></span>

            Loading claim history...

        </div>
    `;

    empty.style.display = "none";


    try {

        const account =
            await getCurrentAccount();

        if (!account) {

            list.innerHTML = "";

            empty.style.display = "flex";

            return;
        }


        /*
         * Get user's claim IDs directly
         * from staking contract
         */
        const ids =
            await stakingContract.methods
                .getUserClaimLogIds(account)
                .call();


      if (!ids || ids.length === 0) {

    list.innerHTML = "";
    empty.style.display = "flex";

    const historyCount =
        document.getElementById("stakeHistoryCount");

    if (historyCount) {
        historyCount.innerText = "0";
    }

    return;
}


        const rows = [];


        /*
         * Latest claim first
         */
        for (
            let i = ids.length - 1;
            i >= 0;
            i--
        ) {

            const claimId =
                ids[i];


            try {

                const claim =
                    await stakingContract.methods
                        .getClaimLog(claimId)
                        .call();


                rows.push(
                    renderClaimRow(
                        claimId,
                        claim
                    )
                );


            } catch (error) {

                console.error(
                    "Claim log error:",
                    claimId,
                    error
                );

            }

        }


        list.innerHTML =
            rows.join("");


        empty.style.display =
            rows.length
                ? "none"
                : "flex";


const historyCount =
    document.getElementById("stakeHistoryCount");

if (historyCount) {
    historyCount.innerText = rows.length;
}


        // document.getElementById(
        //     "stakeHistoryCount"
        // ).innerText = rows.length;


    } catch (error) {

        console.error(
            "Claim history error:",
            error
        );


        list.innerHTML = `
            <div
                class="text-center text-danger py-5"
                style="font-size:10px">

                Unable to load claim history.

            </div>
        `;

    }

}



function renderClaimRow(
    claimId,
    claim
) {

    const cycle =
        claim.cycle !== undefined
            ? claim.cycle
            : claim[1];

    const capitalBeforeRaw =
        claim.capitalBefore !== undefined
            ? claim.capitalBefore
            : claim[2];

    const rewardRaw =
        claim.reward !== undefined
            ? claim.reward
            : claim[3];

    const capitalAfterRaw =
        claim.capitalAfter !== undefined
            ? claim.capitalAfter
            : claim[4];

    const timestamp =
        claim.timestamp !== undefined
            ? claim.timestamp
            : claim[5];


    const capitalBefore =
        tokenToNumber(
            capitalBeforeRaw
        );

    const reward =
        tokenToNumber(
            rewardRaw
        );

    const capitalAfter =
        tokenToNumber(
            capitalAfterRaw
        );


    const date =
        new Date(
            Number(timestamp) * 1000
        );


    const dateText =
        date.toLocaleDateString(
            "en-GB",
            {
                day: "2-digit",
                month: "short",
                year: "numeric"
            }
        );


    const timeText =
        date.toLocaleTimeString(
            "en-US",
            {
                hour: "2-digit",
                minute: "2-digit"
            }
        );


    return `
        <div class="stake-row">

            <div class="stake-row-main">

                <small>
                    CLAIM #${escapeHtml(claimId)}
                </small>

                <strong>
                    CYCLE ${escapeHtml(cycle)}
                </strong>

            </div>


            <div class="stake-amount">

                <span class="stake-token">
                    N
                </span>

                <span
                    style="color:var(--s-green)">
                    +${money(reward)} NEW
                </span>

            </div>


            <div class="stake-cell">

                <strong>
                    ${escapeHtml(dateText)}
                </strong>

                <small>
                    ${escapeHtml(timeText)}
                </small>

            </div>


            <div class="stake-cell">

                <strong>
                    ${money(capitalBefore)} OLD
                </strong>

                <small>
                    After:
                    ${money(capitalAfter)} OLD
                </small>

            </div>


            <div>

                <span class="stake-status">
                    CLAIMED
                </span>

                <small
                    style="
                        display:block;
                        color:#64716e;
                        font-size:7px;
                        margin-top:4px;
                    ">

                    On-chain

                </small>

            </div>


            <div class="stake-action">

                <span
                    class="btn btn-veri-outline"
                    style="
                        cursor:default;
                        opacity:.8;
                    ">

                    <i class="bi bi-check-circle me-1"></i>

                    Completed

                </span>

            </div>

        </div>
    `;

}







async function showClaimHistory() {

    document.getElementById(
        "historyTitle"
    ).innerText = "Claim History";





    document.getElementById(
        "historyTableHead"
    ).innerHTML = `
        <span>Claim</span>
        <span>Reward</span>
        <span>Date</span>
        <span>Capital</span>
        <span>Status</span>
        <span>Action</span>
    `;


    document.getElementById(
        "claimHistoryBtn"
    ).classList.remove(
        "btn-veri-outline"
    );

    document.getElementById(
        "claimHistoryBtn"
    ).classList.add(
        "btn-veri-primary"
    );


    document.getElementById(
        "stakingHistoryBtn"
    ).classList.remove(
        "btn-veri-primary"
    );

    document.getElementById(
        "stakingHistoryBtn"
    ).classList.add(
        "btn-veri-outline"
    );


    await loadClaimHistory();

}





async function showStakingHistory() {

    document.getElementById(
        "historyTitle"
    ).innerText = "Staking History";





    document.getElementById(
        "historyTableHead"
    ).innerHTML = `
        <span>Stake</span>
        <span>Amount</span>
        <span>Date</span>
        <span>Capital</span>
        <span>Status</span>
        <span>Action</span>
    `;


    document.getElementById(
        "stakingHistoryBtn"
    ).classList.remove(
        "btn-veri-outline"
    );

    document.getElementById(
        "stakingHistoryBtn"
    ).classList.add(
        "btn-veri-primary"
    );


    document.getElementById(
        "claimHistoryBtn"
    ).classList.remove(
        "btn-veri-primary"
    );

    document.getElementById(
        "claimHistoryBtn"
    ).classList.add(
        "btn-veri-outline"
    );


    await loadHistory();

}














    document.addEventListener(
        "DOMContentLoaded",
        async function () {

            /*
             * Amount preview
             */
            const amountInput =
                document.getElementById(
                    "stakeAmount"
                );


            if (amountInput) {

                amountInput.addEventListener(
                    "input",
                    updateReview
                );

            }


            /*
             * Form submit
             */
            const form =
                document.getElementById(
                    "stakeForm"
                );


            if (form) {

                form.addEventListener(
                    "submit",
                    function (event) {

                        event.preventDefault();

                        stakeNow();

                    }
                );

            }


            /*
             * Initial blockchain load
             */
            await refreshPageData();


            /*
             * Keep claim countdown updated
             */
            setInterval(
                async function () {

                    try {

                        const account =
                            await getAccountSafe();

                        if (!account) return;


                        const user =
                            await stakingContract
                                .methods
                                .getUserInfo(account)
                                .call();


                        const lastClaim =
                            user.lastClaimTime !== undefined
                                ? user.lastClaimTime
                                : user[4];

                        const active =
                            user.active !== undefined
                                ? user.active
                                : user[5];


                        // updateNextClaim(
                        //     lastClaim,
                        //     active
                        // );


                    } catch (error) {

                        console.error(
                            "Claim timer error:",
                            error
                        );

                    }

                },
                30000
            );

        }
    );


window.STAKING_PAGE = {

    openModal,
    setMax,
    claimReward,
    stakeNow,

    showStakingHistory,
    showClaimHistory

};


})();


















</script>

