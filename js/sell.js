
const SLIPPAGE_BPS = 50;     // 0.5%
const SWAP_DEADLINE_MINS = 20;

let t20BalanceRaw = "0";     // wei string, kept for MAX + validation
let sellQuoteTimer = null;
// ---------------------------------------------------------
// Balances
// ---------------------------------------------------------
async function refreshSellBalances() {
    const acc = await getCurrentAccount();
    // const acc = "0xAcd1Dc6626466732d6a4CB74B6947dD2eE866003";
    if (!acc) return;

    try {
        const [t20Bal, usdtBal] = await Promise.all([
            tokenContract.methods.balanceOf(acc).call(),
            usdtContract.methods.balanceOf(acc).call()
        ]);

        t20BalanceRaw = t20Bal;
        // console.log(t20BalanceRaw)

        $('.t20_balance').text(Number(price(t20Bal)).toLocaleString(undefined, { maximumFractionDigits: 4 }));
        $('.usdt_balance').text(Number(price(usdtBal)).toLocaleString(undefined, { maximumFractionDigits: 4 }));
    } catch (error) {
        console.log(error);
    }
}

// ---------------------------------------------------------
// Quote (You Sell -> You Receive), read-only output field
// ---------------------------------------------------------
async function getSellQuote(amountT20) {
    if (!amountT20 || Number(amountT20) <= 0) return null;

    const amountWei = new BigNumber(amountT20).times('1000000000000000000').toFixed(0);

    try {
        const amounts = await routerContract.methods
            .getAmountsOut(amountWei, [token_addr, usdt_addr])
            .call();

            console.log(amounts);

        return amounts[1]; // USDT out, wei string
    } catch (error) {
        console.log(error);
        return null;
    }
}

async function updateReceiveField() {
    const val = $('#t20AmountInput').val();
    const out = await getSellQuote(val);

    // This is the only place that ever writes to the read-only field.
    $('#usdtAmountInput').val(out ? price(out).toFixed(4) : '');
    // console.log("validateSellForm 2")
    validateSellForm();
}

// ---------------------------------------------------------
// Validation / button state
// ---------------------------------------------------------
async function validateSellForm() {
    const btn = $('#sellSubmitBtn');
    
    if (!account) {
        btn.prop('disabled', false).html('Connect Wallet');
        return;
    }

    const val = parseFloat($('#t20AmountInput').val());

    if (!val || val <= 0) {
        btn.prop('disabled', true).html('Enter an amount');
        return;
    }

    const balance = t20BalanceRaw ? price(t20BalanceRaw) : 0;

    if (val > balance) {
        btn.prop('disabled', true).html('Insufficient T20 balance');
        return;
    }

    const allowance = await tokenContract.methods.allowance(account, router).call();

    if (val > price(allowance)) {
        btn.prop('disabled', false).html('Approve T20');
        
    }else{
        btn.prop('disabled', false).html('Sell');
    }
    
    
}

// ---------------------------------------------------------
// Sell action: approve (if needed) then swap
// ---------------------------------------------------------
async function sellT20() {
    account = await getCurrentAccount();

    if (!account) {
        toastr.error('Wallet not connected');
        return;
    }

    const inputVal = $('#t20AmountInput').val();
    const amount = parseFloat(inputVal);

    if (!amount || amount <= 0) {
        toastr.error('Please enter a valid amount.');
        return;
    }

    const balance = t20BalanceRaw ? price(t20BalanceRaw) : 0;

    if (amount > balance) {
        toastr.error('Insufficient T20 balance.');
        return;
    }

    const amountWei = new BigNumber(inputVal).times('1000000000000000000').toFixed(0);
    const btn = $('#sellSubmitBtn');

    showloader();
    $('#cover').css('display', 'block');
    btn.prop('disabled', true);

    try {
        const gasPrice = await getGas();

        const allowance = await tokenContract.methods.allowance(account, router).call();
        console.log(allowance)
        if (new BigNumber(allowance).isLessThan(amountWei)) {

            btn.html('<span class="spinner-border spinner-border-sm me-2"></span>Approving T20…');

            await tokenContract.methods.approve(router, amountWei).send({
                from: account,
                gasPrice: gasPrice
            });
        }

        const amounts = await routerContract.methods
            .getAmountsOut(amountWei, [token_addr, usdt_addr])
            .call();

        const expectedOut = amounts[1];
        const amountOutMin = new BigNumber(expectedOut)
            .times(10000 - SLIPPAGE_BPS)
            .dividedBy(10000)
            .toFixed(0);

        const deadline = Math.floor(Date.now() / 1000) + SWAP_DEADLINE_MINS * 60;

        btn.html('<span class="spinner-border spinner-border-sm me-2"></span>Confirm in wallet…');

        await routerContract.methods
            .swapExactTokensForTokensSupportingFeeOnTransferTokens(
                amountWei,
                0,
                [token_addr, usdt_addr],
                account,
                deadline
            )
            .send({
                from: account,
                gasPrice: gasPrice
            })
            .on('receipt', function () {
                toastr.success('Successfully sold T20 for USDT.');
                $('#t20AmountInput').val('');
                $('#usdtAmountInput').val('');
                refreshSellBalances();
            })
            .on('error', function (err) {
                console.log(err);
                toastr.error('Transaction was canceled or failed.');
            });

    } catch (error) {
        console.log(error);
        toastr.error('Something went wrong from the blockchain end.');
    } finally {
        $('#cover').css('display', 'none');
        hideloader();
        // console.log("validateSellForm 3")
        validateSellForm();
    }
}

// ---------------------------------------------------------
// Wire up + init
// ---------------------------------------------------------
$(document).ready(function () {

    $('#t20AmountInput').on('input', function () {
        clearTimeout(sellQuoteTimer);
        sellQuoteTimer = setTimeout(updateReceiveField, 400);
    });

    $('.swap-max-btn').on('click', function (e) {
        e.preventDefault();
        if (!t20BalanceRaw) return;
        $('#t20AmountInput').val(price(t20BalanceRaw));
        updateReceiveField();
    });

    $('#sellSubmitBtn').on('click', function (e) {
        e.preventDefault();
        if ($(this).text().trim() === 'Connect Wallet') {
            getAccount(); // existing connect flow from contract_setting.js
            return;
        }
        sellT20();
    });

    (async function initSellPage() {
        account = await getCurrentAccount();
        await refreshSellBalances();
        // console.log("validateSellForm 1")
        validateSellForm();
    })();
});
