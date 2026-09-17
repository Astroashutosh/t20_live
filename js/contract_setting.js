const main_contract = "0xa2bd5D5fb4FF2eD69E40F63D7c817e22b44332D5";
// const staking_contract = "0x2e943d2Eb028C5c613b741902906071C597dE41b";
const staking_contract = "0x01734DC7F66c82280e82b8f63234b44A54EcfE5B";

const usdt_addr = "0xb0853aDb21765fb2B80558097373DD89CC43F797";
const token_addr = "0xb0853aDb21765fb2B80558097373DD89CC43F797";
const pair_addr = "0xf07c3e75b9f9640f2030011bb158938e9df7dd44";
const router = "0xb0853aDb21765fb2B80558097373DD89CC43F797";
const p = new Web3(window.ethereum);
const mainContract = new p.eth.Contract(e, main_contract);
const stakingContract = new p.eth.Contract(stakingABI, staking_contract);

const tokenContract = new p.eth.Contract(token, token_addr);
const usdtContract = new p.eth.Contract(usdt, usdt_addr);
const routerContract = new p.eth.Contract(routerABI, router);



// OLD TOKEN CONTRACT
let oldToken = null;

async function initOldTokenContract() {
    try {
        const oldTokenAddress = await mainContract.methods.oldToken().call();

        oldToken = new p.eth.Contract(token, oldTokenAddress);

        console.log("Old Token Address:", oldTokenAddress);

        return oldToken;
    } catch (error) {
        console.error("Old token contract initialization error:", error);
        throw error;
    }
}





var account = "";
async function getContractOwner() {
    try {
        const owner = await mainContract.methods.owner().call();
        return owner.toLowerCase();
    } catch (error) {
        console.error("Error fetching contract owner:", error);
        return null;
    }
}
async function getCurrentAccount() {
    accounts = await p.eth.getAccounts();
    var userid = $('#userid').val();
    if (userid > 0 && userid != '') {
        return userid;
    } else {
        return accounts[0];
    }
}
async function getchainId() {
    selectDifferentNetwork = "0";
    const chainId = await ethereum.request({
        method: 'eth_chainId'
    });
    var numericChainID = Web3.utils.hexToNumber(chainId);
    return Promise.resolve(numericChainID);
}
function price(n) {
    return n / 1000000000000000000;
}
async function getAccount() {
    try {
          const accounts = await ethereum.request({
              method: 'eth_requestAccounts'
          });
          var userid = $('#userid').val();
          if (userid > 0 && userid != '') {
              account = userid;
          } else {
              account = accounts[0];
          }
          $(".contract_addr").text(main_contract.substring(0, 6) + "..." + main_contract.substring(main_contract.length - 4)).attr("data-address", main_contract);
          $(".token_addr").text(token_addr.substring(0, 6) + "..." + token_addr.substring(token_addr.length - 4)).attr("data-address", token_addr);
          $(".pair_addr").text(pair_addr.substring(0, 6) + "..." + pair_addr.substring(pair_addr.length - 4)).attr("data-address", pair_addr);
          $(".connected_walletdash").html(account.substring(0, 6) + "..." + account.substring(account.length - 4));
          $("#connected_wallet").val(account.substring(0, 6) + "..." + account.substring(account.length - 4));
          $("#connectWalletBtn").html('<i class="bi bi-check-circle me-2"></i>Connected').prop("disabled", true);
          $(".contract-info").html("<a style='color:black' href='https://testnet.bscscan.com/address/" + main_contract + "' target='_blank'>" + main_contract.substring(0, 5) + "..." + main_contract.substring(39) + " <i class='fa fa-link'></i> </a>");
          $(".contract_scan").attr("href", `https://testnet.bscscan.com/address/${main_contract}`);
          $(".token_scan").attr("href", `https://testnet.bscscan.com/token/${token_addr}`);
          $(".dextools_link").attr("href", `https://www.dextools.io/app/bnb/pair-explorer/${pair_addr}`);
          const chainId = await ethereum.request({
              method: 'eth_chainId'
          });
          var numericChainID = Web3.utils.hexToNumber(chainId);
          if (numericChainID == 97) {
              // const user_details = await mainContract.methods.userBase(account).call();
              // const user_income_details = 0;
              // const user_income_details_extra = 0;
              // const user_cycle = await mainContract.methods.userCycle(account).call();


          await initOldTokenContract();

          const user_details = await mainContract.methods.userBase(account).call();
          const binary_details = await mainContract.methods.binary(account).call();
          const binary_income = await mainContract.methods.getBinaryIncome(account).call();
          const direct_referral_count = await mainContract.methods.getDirectReferralCount(account).call();
          const user_cycle = await mainContract.methods.userCycle(account).call();

            if (user_details['referrer'] != '0x0000000000000000000000000000000000000000') {
                const reff_details = await mainContract.methods.userBase(user_details['referrer']).call();
                $('.sponsor_id').html(reff_details['referralCode']);
            } else {
                $('.sponsor_id').html("No referral..");
            }
            $('.my_id').text(user_details['referralCode']);
            $("#wallet_id").text("Wallet Address".account);
            var baseurl = $('#baseurl').val();
            const leftLink = baseurl + "register.php?ref=" + encodeURIComponent(account) + "&pos=left";
            const rightLink = baseurl + "register.php?ref=" + encodeURIComponent(account) + "&pos=right";
            $("#leftReferralLink").val(leftLink);
            $("#rightReferralLink").val(rightLink);
            $('.my_ref_id').html(user_details['referrer']);
            // $('.activeDirectReferrals').text(user_details['activeDirectReferrals']);
            if (user_details['active']) {
                $('.isActive').text('Active');
            } else {
                $('.isActive').text('Inactive');
            }
            if (!user_details['hasActivePH'] || user_cycle['isCycleCompleted']) {
                $('.helpButton').show();
                
            } else {
                $('.helpButton').hide();
            }
            $('.currentCycle').text(user_cycle['currentCycle']);


            if (user_cycle['currentCycle'] == 30) {
                $('#provideHelp').hide();
                $('#claimBinaryBtn').hide();
                $('#topUP').show();
                $('#phPage').hide();


            } else {
                 $('#provideHelp').show();
                $('#claimBinaryBtn').show();
                $('#topUp').hide();
               $('#phPage').show();


            }



           $('.activeDirectReferrals').text(String(direct_referral_count));

            const totalPH =
                Number(user_details.totalPH || 0) / 1e18;

            const totalBinaryIncome =
                Number(
                    binary_income.totalBinaryIncome !== undefined
                        ? binary_income.totalBinaryIncome
                        : binary_income[0] || 0
                ) / 1e18;

            const totalBoosterIncome =
                Number(
                    binary_income.totalBoosterIncome !== undefined
                        ? binary_income.totalBoosterIncome
                        : binary_income[1] || 0
                ) / 1e18;

            const totalEarnings =
                totalBinaryIncome + totalBoosterIncome;

            const leftBusiness =
                Number(binary_details.leftBusiness || 0) / 1e18;

            const rightBusiness =
                Number(binary_details.rightBusiness || 0) / 1e18;

            const leftBoosterBusiness =
                Number(binary_details.leftBoosterPending || 0) / 1e18;

            const rightBoosterBusiness =
                Number(binary_details.rightBoosterPending || 0) / 1e18;


            // Dashboard values
            $('.available_balance')
                .text('$ ' + totalEarnings.toFixed(4));

            $('.totalPHCommitted')
                .text('$ ' + totalPH.toFixed(4));

            $('.leftBusiness')
                .text('$ ' + leftBusiness.toFixed(4));

            $('.rightBusiness')
                .text('$ ' + rightBusiness.toFixed(4));

            $('.leftBoosterBusiness')
                .text('$ ' + leftBoosterBusiness.toFixed(4));

            $('.rightBoosterBusiness')
                .text('$ ' + rightBoosterBusiness.toFixed(4));

            $('.totalBoosterIncome')
                .text('$ ' + totalBoosterIncome.toFixed(4));

            $('.totalLevelIncome')
                .text('$ ' + totalBinaryIncome.toFixed(4));


            if (binary_details['leftChild'] !== '0x0000000000000000000000000000000000000000') {
                let leftChild = shortAddress(binary_details['leftChild']);
                $('.leftChild').text(leftChild);
            } else {
                $('.leftChild').text('--');
            }
            if (binary_details['rightChild'] !== '0x0000000000000000000000000000000000000000') {
                let rightChild = shortAddress(binary_details['rightChild']);
                $('.rightChild').text(rightChild);
            } else {
                $('.rightChild').text('--');
            }
            let registrationTime = Number(user_details['registrationTime']);
            if (registrationTime > 0) {
                const regDate = new Date(registrationTime * 1000);
                const formattedDate = regDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                });
                $('.registrationTime').text(formattedDate);
            } else {
                $('.registrationTime').text('--');
            }
            const currentPrice = await mainContract.methods.getTokenToUSDT("1000000000000000000").call()
            $('.currentPrice').text(`1 T20 = $ ${(currentPrice / 1e18).toFixed(4)}`);
        } else {
            $(".connect-btn").css('display', 'block');
            toastr.error("Please select binance testnet network on Wallet.");
            return;
        }
    } catch (err) {
        console.log(err);
        // toastr.error("Wallet not connected");
        return;
    }
}
async function getGas() {
    try {
        const gasPrice = await p.eth.getGasPrice();
        return gasPrice;
    } catch (error) {
        console.error("Error fetching gas price:", error);
    }
}
async function registerNew() {
    account = await getCurrentAccount();
    var refid = $('#referralId').val();
    let position = $("#position").val();
    if (refid == '') {
        toastr.error('Referral Id could not be blank');
        return;
    }
    const referAddress = refid;
    const ref_user = await mainContract.methods.userBase(referAddress).call();
    if (!ref_user) {
        toastr.error('Referrer does not exist !');
        return;
    }
    if (referAddress.toLowerCase() != account.toLowerCase()) {
        const user = await mainContract.methods.userBase(account).call();
        if (user.registered) {
            toastr.error('Account already exists');
        } else {
            if (referAddress && referAddress != '0x0000000000000000000000000000000000000000') {
                const pos = position === "left" ? 0 : 1;
                let text = "You are Registering with Sponsor Address " + referAddress + "  \n\nPress Ok to continue!";
                if (confirm(text) === true) {
                    showloader();
                    $('#cover').css('display', 'block');
                    const valueString = '1000000000000000000';
                    const amts = new BigNumber(valueString).times(20);
                    const amount = amts.toString(10);
                    try {
                        const gasPrice = await getGas();
                        const balance = await usdtContract.methods.balanceOf(account).call();
                        if (new BigNumber(balance).isLessThan(amount)) {
                            $('#cover').css('display', 'none');
                            hideloader();
                            toastr.error('Insufficient USDT balance. You need at least 20 USDT.');
                            return;
                        }
                        await usdtContract.methods.approve(main_contract, amount).send({
                            from: account,
                            gasPrice: gasPrice
                        });
                        await mainContract.methods.register(referAddress, pos).send({
                            from: account,
                            gasPrice: gasPrice
                        }).on("receipt", (function (e) {
                            hideloader();
                            toastr.success('Registration done successfully');
                            setTimeout(function () {
                                window.location.href = $('#baseurl').val() + "login.php";
                            }, 2000);
                        })).on("error", (function (e) {
                            $('#cover').css('display', 'none');
                            hideloader();
                            toastr.error('Transaction was canceled or failed');
                        }));
                    } catch (error) {
                        $('#cover').css('display', 'none');
                        hideloader();
                        toastr.error('Something went wrong from blockchain end.');
                    }
                } else {
                    hideloader();
                }
            } else {
                toastr.error('Invalid sponsor id or sponsor id does not exist');
            }
        }
    } else {
        toastr.error('Referral id and your connected id are the same. Please try with a different account.');
    }
}
async function calculateStakingBalance() {
    account = await getCurrentAccount();
    if (account) {
        const user = await mainContract.methods.userBase(account).call();
        if (user.registered) {
            let text = "Are you sure wants to execute ?  Press Ok to continue!";
            if (confirm(text) == true) {
                showloader();
                $('#cover').css('display', 'block');
                getGas().then((gasPrice) => {
                    mainContract.methods.claimLevelBinary(account).send({
                        from: account,
                        gasPrice: gasPrice
                    }).on("receipt", (function (e) {
                        toastr.success('Executed Successfully.');
                        hideloader();
                        setTimeout(function () {
                            window.location.reload(true);
                        }, 2000);
                    })).on("error", (function (e) {
                        hideloader();
                        toastr.error('Error');
                    }));
                }).catch((error) => {
                    hideloader();
                    toastr.error('Something went wrong from blockchain end.');
                });
            } else {
                hideloader();
            }
        } else {
            toastr.error('Account is not registered.');
        }
    } else {
        toastr.error('No dApp wallet connected');
    }
}
async function stakenow() {
    $("#stakeSubmitBtn")
        .prop("disabled", true)
        .html(`
            <span class="spinner-border spinner-border-sm me-2"></span>
            Processing...
        `);
    try {
        account = await getCurrentAccount();
        var stakeAmount = $('#stakeAmount').val();
        const min = await mainContract.methods.MIN_PH_AMOUNT().call() / 1e18;
        if (stakeAmount < min) {
            toastr.error(`Minimum helping amount should be $ ${min}.`);
            return;
        }
        if (account) {
            const user = await mainContract.methods.userBase(account).call();
            const user_cycle = await mainContract.methods.userCycle(account).call();
            if (user.registered) {
                let text = `You are helping with $ ${stakeAmount}. Press Ok to continue!`;
                if (confirm(text)) {
                    showloader();
                    $('#cover').css('display', 'block');
                    const valueString = '1000000000000000000';
                    const amts = new BigNumber(valueString).times(stakeAmount);
                    const amount = amts.toString(10);
                    console.log("amount", amount);
                    const gasPrice = await getGas();
                    await usdtContract.methods.approve(main_contract, amount).send({
                        from: account,
                        gasPrice: gasPrice
                    });
                    if (user_cycle['isCycleCompleted']) {
                        await mainContract.methods.startNewCommitment().send({
                            from: account,
                            gasPrice: gasPrice
                        }).on("transactionHash", function (hash) {
                        })
                            .on("receipt", function (receipt) {
                                toastr.success(`Successfully helped $ ${stakeAmount}`);
                                setTimeout(() => {
                                    window.location.href = 'index.php';
                                }, 2000);
                            })
                            .on("error", function (error) {
                                console.error(error);
                                toastr.error('Transaction failed or was rejected.');
                                hideloader();
                            });
                    } else {
                        await mainContract.methods.createPHOrder().send({
                            from: account,
                            gasPrice: gasPrice
                        })
                            .on("transactionHash", function (hash) {
                            })
                            .on("receipt", function (receipt) {
                                toastr.success(`Successfully helped $ ${stakeAmount}`);
                                setTimeout(() => {
                                    window.location.href = 'index.php';
                                }, 2000);
                            })
                            .on("error", function (error) {
                                console.error(error);
                                toastr.error('Transaction failed or was rejected.');
                                hideloader();
                            });
                    }
                } else {
                    hideloader();
                }
            } else {
                toastr.error('Account is not registered.');
            }
        } else {
            toastr.error('dApp wallet not connected.');
        }
    } catch (error) {
        console.log(error.message);
        toastr.error('Something went wrong from the blockchain end.');
    } finally {
        $('#cover').css('display', 'none');
        hideloader();
    }
}
let currentPage = 1;
const pageSize = 25;
async function helpListLoad() {
    const tbody = $("#txTableBody");
    tbody.html("<tr><td colspan='9' class='text-center'>Loading...</td></tr>");
    try {
        const account = await getCurrentAccount();
        const user = await mainContract.methods.userBase(account).call();
        if (!user.registered) {
            tbody.html("<tr><td colspan='9' class='text-center text-warning'>User not registered.</td></tr>");
            return;
        }
        const orderIds = await mainContract.methods
            .getUserPHOrderIds(account)
            .call();
        tbody.empty();
        if (orderIds.length == 0) {
            tbody.html("<tr><td colspan='9' class='text-center mono text-secondary'>No transactions found.</td></tr>");
            return;
        }
        Array.from(orderIds).reverse();
        const totalPages = Math.ceil(orderIds.length / pageSize);
        const start = (currentPage - 1) * pageSize;
        const end = start + pageSize;
        const pageOrders = orderIds.slice(start, end);
        for (let i = 0; i < pageOrders.length; i++) {
            const orderId = pageOrders[i];
            const order = await mainContract.methods
                .phOrders(orderId)
                .call();
            addTransactionRow(orderId, order);
        }
        buildPagination(totalPages);
    } catch (e) {
        console.log(e);
        tbody.html("<tr><td colspan='9' class='text-center text-danger'>Unable to load data.</td></tr>");
    }
}
function addTransactionRow(orderId, order) {
    console.log(order.lastRecommitTime)
    const tr = $("<tr>");
    const amount = Number(order.amount) / 1e18;
    const date = new Date(Number(order.lastRecommitTime) * 1000);
    const dateString = date.toLocaleString();
    const unlock = Number(order.lastRecommitTime) + (7 * 24 * 60 * 60);
    const now = Math.floor(Date.now() / 1000);
    let action = "";
    if (order.isCompleted) {
        action = '--'
    } else if (now >= unlock) {
        action =
            `<button class="btn btn-success btn-sm"
                onclick="recommit(${orderId},${amount})">
                Recommit
            </button>`;
    } else {
        const remain = unlock - now;
        const days = Math.floor(remain / 86400);
        const hours = Math.floor((remain % 86400) / 3600);
        action =
            `<span class="badge bg-warning text-dark">
                ${days}d ${hours}h left
            </span>`;
    }
    let status = order.isCompleted
        ?
        '<span class="badge bg-success">Completed</span>'
        :
        '<span class="badge bg-primary">Active</span>';
    tr.append(`<td class="mono text-secondary">#${orderId}</td>`);
    tr.append(`<td class="mono text-secondary">${shortAddress(order.user)}</td>`);
    tr.append(`<td class="mono text-secondary">Create Help</td>`);
    tr.append(`<td class="mono text-secondary">$${amount.toFixed(2)}</td>`);
    tr.append(`<td class="mono text-secondary">USDT</td>`);
    tr.append(`<td class="mono text-secondary">${dateString}</td>`);
    tr.append(`<td class="mono text-secondary">${status}</td>`);
    tr.append(`<td class="mono text-secondary">${action}</td>`);
    $("#txTableBody").append(tr);
}
function buildPagination(totalPages) {
    let html = "";
    html += `
        <li class="page-item ${currentPage == 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">Previous</a>
        </li>
    `;
    for (let i = 1; i <= totalPages; i++) {
        html += `
            <li class="page-item ${currentPage == i ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
            </li>
        `;
    }
    html += `
        <li class="page-item ${currentPage == totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Next</a>
        </li>
    `;
    $("#txPagination").html(html);
}
function changePage(page) {
    if (page < 1) return;
    currentPage = page;
    helpListLoad();
}
function shortAddress(addr) {
    return addr.substring(0, 6) + "..." + addr.substring(addr.length - 4);
}
async function recommit(orderId, amount) {
    try {
        const account = await getCurrentAccount();
        const gasPrice = await getGas();
        const valueString = '1000000000000000000';
        const amts = new BigNumber(valueString).times(amount);
        const amount1 = amts.toString(10);
        await usdtContract.methods.approve(main_contract, amount1).send({
            from: account,
            gasPrice: gasPrice
        });
        await mainContract.methods.recommit(orderId).send({
            from: account,
            gasPrice: gasPrice
        });
        toastr.success("Recommit successful");
        helpListLoad();
    } catch (err) {
        console.log(err);
        toastr.error("Transaction failed");
    }
}
function padZero(num) {
    return (num < 10) ? `0${num}` : num;
}
// async function getLevelBusiness1(level) {
//     try {
//         const account = await getCurrentAccount();
//         const user = await mainContract.methods.userBase(account).call();
//         if (!user.registered) return;
//         const data = await mainContract.methods
//             .levelBusiness(account, level)
//             .call();
//         $(".leftBusiness1").text(`$ ${price(data.leftBusiness)}`);
//         $(".rightBusiness1").text(`$ ${price(data.rightBusiness)}`);
//         $(".totalLeftBusiness").text(`$ ${price(data.totalLeftBusiness)}`);
//         $(".totalRightBusiness").text(`$ ${price(data.totalRightBusiness)}`);
//         $(".leftRecommit").text(`$ ${price(data.leftBusinessRecommit)}`);
//         $(".rightRecommit").text(`$ ${price(data.rightBusinessRecommit)}`);
//         $(".totalLeftRecommit").text(`$ ${price(data.leftBusinessRecommit)}`);
//         $(".totalRightRecommit").text(`$ ${price(data.rightBusinessRecommit)}`);
//     } catch (error) {
//         console.log(error);
//     }
// }



async function getLevelBusiness(level) {
    try {
        const account = await getCurrentAccount();

        if (!account) {
            console.log("Wallet not connected");
            return;
        }

        const user = await mainContract.methods
            .userBase(account)
            .call();

        if (!user.registered) {
            console.log("User not registered");
            return;
        }

        // Contract:
        // getLevelBusiness(address,uint8)
        const data = await mainContract.methods
            .levelBusiness(account, Number(level))
            .call();

        // Normal Binary Business
        const leftBusiness =
            Number(data.leftBusiness || data[0] || 0) / 1e18;

        const rightBusiness =
            Number(data.rightBusiness || data[1] || 0) / 1e18;

        const totalLeftBusiness =
            Number(data.totalLeftBusiness || data[2] || 0) / 1e18;

        const totalRightBusiness =
            Number(data.totalRightBusiness || data[3] || 0) / 1e18;

        // PH Binary Business
        const leftBusinessPH =
            Number(data.leftBusinessPH || data[4] || 0) / 1e18;

        const rightBusinessPH =
            Number(data.rightBusinessPH || data[5] || 0) / 1e18;

        const totalLeftBusinessPH =
            Number(data.totalLeftBusinessPH || data[6] || 0) / 1e18;

        const totalRightBusinessPH =
            Number(data.totalRightBusinessPH || data[7] || 0) / 1e18;


        // Selected Level
        $(".leftBusiness1")
            .text(`$ ${leftBusiness.toFixed(4)}`);

        $(".rightBusiness1")
            .text(`$ ${rightBusiness.toFixed(4)}`);

        $(".totalLeftBusiness")
            .text(`$ ${totalLeftBusiness.toFixed(4)}`);

        $(".totalRightBusiness")
            .text(`$ ${totalRightBusiness.toFixed(4)}`);

        // PH Business
        $(".leftRecommit")
            .text(`$ ${leftBusinessPH.toFixed(4)}`);

        $(".rightRecommit")
            .text(`$ ${rightBusinessPH.toFixed(4)}`);

        $(".totalLeftRecommit")
            .text(`$ ${totalLeftBusinessPH.toFixed(4)}`);

     $(".totalRightRecommit")
    .text(`$ ${totalRightBusinessPH.toFixed(4)}`);

    } catch (error) {
        console.error("Level Business Error:", error);

        $(".leftBusiness1").text("$ 0.0000");
        $(".rightBusiness1").text("$ 0.0000");
        $(".totalLeftBusiness").text("$ 0.0000");
        $(".totalRightBusiness").text("$ 0.0000");

        $(".leftRecommit").text("$ 0.0000");
        $(".rightRecommit").text("$ 0.0000");
        $(".totalLeftRecommit").text("$ 0.0000");
        $(".totalRightRecommit").text("$ 0.0000");
    }
}


async function levelIncomes() {
    account = await getCurrentAccount();
    var total_rewards = 0;
    var total_nodes = 0;
    const user = await mainContract.methods.isUserExists(account).call();
    if (user) {
        const data = await mainContract.methods.levelIncome(account).call();
        for (let i = 0; i < data.length; i++) {
            var amt = parseFloat(data[i]) / 1000000000000000000;
            var cls = i + 1;
            $(".inc" + cls).text(amt.toFixed(4));
            total_rewards += amt;
        }
        const data1 = await mainContract.methods.levelWiseUsers(account).call();
        for (let i = 0; i < data1.length; i++) {
            var node = parseFloat(data1[i]);
            var cls1 = i + 1;
            $(".nd" + cls1).text('Total Node Count : ' + node);
            total_nodes += node;
        }
    }
    $(".total_nodes").text(total_nodes);
    $(".total_rewards").text(total_rewards.toFixed(4));
    $(".referral_reward").text(total_rewards.toFixed(4));
}
function addRow1(key, value) {
    const newRow = $('<tr>');
    newRow.append($('<td>').text(key + 1));
    newRow.append($('<td>').text(value / 1000000000000000000));
    $('#data-table1 tbody').append(newRow);
}
async function directPartners() {
    const tbody = $("#txTableBody");
    tbody.html("<tr><td colspan='5' class='mono text-secondary text-center'>Loading...</td></tr>");
    try {
        const account = await getCurrentAccount();
        const referrals = await mainContract.methods
            .getDirectReferralList(account)
            .call();
        console.log("referrals", referrals)
        tbody.empty();
        if (referrals.length === 0) {
            tbody.html("<tr><td colspan='5' class='mono text-secondary text-center'>No direct referrals found.</td></tr>");
            return;
        }
        const parentBinary = await mainContract.methods.binary(account).call();
        for (let i = 0; i < referrals.length; i++) {
            const wallet = referrals[i];
            const user = await mainContract.methods.userBase(wallet).call();
            const regDate = Number(user.registrationTime) > 0
                ?
                new Date(Number(user.registrationTime) * 1000).toLocaleString()
                :
                "--";
            let position = "--";
            if (
              //  parentBinary.leftChild.toLowerCase() === wallet.toLowerCase()
                  user.placementSide==0
            ) {
                position = '<span class="badge bg-primary">Left</span>';
            } else if (
               // parentBinary.rightChild.toLowerCase() === wallet.toLowerCase()
                 user.placementSide==1
            ) {
                position = '<span class="badge bg-success">Right</span>';
            }
            tbody.append(`
                <tr>
                    <td class="mono text-secondary">${i + 1}</td>
                    <td class="mono text-secondary">
                        <a href="https://testnet.bscscan.com/address/${wallet}" target="_blank">
                            ${shortAddress(wallet)}
                        </a>
                    </td>
                    <td class="mono text-secondary">${position}</td>
                    <td class="mono text-secondary">${regDate}</td>
                </tr>
            `);
        }
    } catch (err) {
        console.error(err);
        tbody.html("<tr><td colspan='5' class='text-danger text-center'>Unable to load referrals.</td></tr>");
    }
}
async function logintoaccount() {
    account = await getCurrentAccount();
    var login = await loginprocess(account);
}
async function loginprocess(address) {
    const userdata = await mainContract.methods.userBase(address).call();
    if (userdata) {
        var newForm = jQuery('<form>', {
            'action': $('#baseurl').val() + 'postdata.php',
            'method': 'post'
        });
        input = $("<input>").attr("type", "hidden").attr("name", "wallet").val(address);
        $(newForm).append($(input));
        input = $("<input>").attr("type", "hidden").attr("name", "hmod").val("2");
        $(newForm).append($(input));
        newForm.appendTo('body').submit();
    } else {
        toastr.warning('The connected address is not found in our records. Redirecting to the registration page...');
        setTimeout(function () {
            window.location.href = 'register.php';
        }, 2000);
    }
}
async function viewAccount() {
    try {
        var userid = $('#userid').val();
        if (userid == '' || userid == 'undefined') {
            alert('Enter user address.');
            return
        } else {
            await loginprocess(userid);
        }
    } catch (error) {
        toastr.error('Connect your wallet first');
    }
}
async function viewAccountOld() {
    try {
        var userid = $('#userid').val();
        if (userid == '' || userid == 'undefined') {
            alert('Enter ID number.');
            return
        } else {
            var flag = await mainContract.methods.idToAddress(userid).call();
            if (flag && flag != '0x0000000000000000000000000000000000000000') {
                var newForm = jQuery('<form>', {
                    'action': $('#baseurl').val() + 'postdata.php',
                    'method': 'post'
                });
                var input = $("<input>").attr("type", "hidden").attr("name", "userId").val("" + userid);
                $(newForm).append($(input));
                input = $("<input>").attr("type", "hidden").attr("name", "hmod").val("2");
                $(newForm).append($(input));
                newForm.appendTo('body').submit();
            } else {
                toastr.error('invalid user or user does not exist');
            }
        }
    } catch (error) {
        toastr.error('Connect your wallet first');
    }
}
function copyRef(element) {
    if (navigator.clipboard && window.isSecureContext) {
        return navigator.clipboard.writeText($(element).val());
    } else {
        let $temp = $("<textarea>");
        $("body").append($temp);
        $temp.val($(element).val()).select();
        let success = document.execCommand("copy");
        $temp.remove();
        return success;
    }
}
$(".copy_ref").click(function () {
    let refv = $(".referral-link").val();
    if (refv !== null) {
        copyRef('.referral-link');
        $('#val_err').html("Referral Copied");
        $.magnificPopup.open({
            items: {
                src: '#Error'
            },
            type: 'inline'
        });
    }
});
$(".modal__close").click(function () {
    $.magnificPopup.close();
});
async function RankuserStaking() {
    account = await getCurrentAccount();
    if (account) {
        const user = await mainContract.methods.isUserExists(account).call();
        if (user) {
            const user_income_details = await mainContract.methods.user_details(account).call();
            var myRank = user_income_details['rank'];
            if (myRank == 0) {
                toastr.error('No rank achieved.');
                return;
            }
            let text = "Are you sure wants to execute ?  Press Ok to continue!";
            if (confirm(text) == true) {
                $('#cover').css('display', 'block');
                getGas().then((gasPrice) => {
                    mainContract.methods.RankcalculateBalance(account).send({
                        from: account,
                        gasPrice: gasPrice
                    }).on("receipt", (function (e) {
                        toastr.success('Execute Successfully.');
                        setTimeout(function () {
                            window.location.reload(true);
                        }, 2000);
                    })).on("error", (function (e) {
                        toastr.error('Error');
                    }));
                }).catch((error) => {
                    toastr.error('Something went wrong from blockchain end.');
                });
            }
        } else {
            toastr.error('Account is not registered.');
        }
    } else {
        toastr.error('Referral id and your connected id are same please try with diffrent account');
    }
}
async function rankLoad() {
    account = await getCurrentAccount();
    const user = await mainContract.methods.isUserExists(account).call();
    if (user) {
        const stakeList = await mainContract.methods.RankgetUserStakingTransactions(account).call();
        const startIndex = (currentPage - 1) * pageSize;
        const endIndex = startIndex + pageSize;
        const paginatedStakeList = stakeList.slice(startIndex, endIndex);
        for (const data of paginatedStakeList) {
            rows(data);
        }
    }
}
async function rows(dataObject) {
    const newRow = $('<tr>');
    if (dataObject.id) {
        var id = dataObject.id;
    }
    newRow.append($('<td>').html(id));
    if (dataObject.amount) {
        var amts = dataObject.amount / 1000000000000000000;
    }
    newRow.append($('<td>').html('$ ' + amts));
    if (dataObject.totalRoi) {
        var totalRoi = dataObject.totalRoi / 1000000000000000000;
    }
    newRow.append($('<td>').text('$ ' + totalRoi));
    if (dataObject.dailyReturn) {
        var dailyReturn = dataObject.dailyReturn / 1000000000000000000;
    }
    newRow.append($('<td>').text('$ ' + dailyReturn));
    if (dataObject.rank) {
        var rank = parseInt(dataObject.rank);
    }
    newRow.append($('<td>').text(rank + " RANk"));
    if (dataObject.ROIPer) {
        console.log(dataObject.ROIPer)
        var ROIPer = dataObject.ROIPer / 1000000000000000000;
    }
    if (dataObject.timestamp) {
        var date = new Date(dataObject.timestamp * 1000);
        var formattedDateTime = `${date.getFullYear()}-${padZero(date.getMonth() + 1)}-${padZero(date.getDate())} ${padZero(date.getHours())}:${padZero(date.getMinutes())}:${padZero(date.getSeconds())}`;
    } else {
        var formattedDateTime = '';
    }
    newRow.append($('<td>').text(formattedDateTime));
    $('#data-table tbody').append(newRow);
}
function formatTxType(type) {
    return type
        .replace(/([a-z])([A-Z])/g, '$1 $2')
        .replace(/_/g, ' ')
        .replace(/\s+/g, ' ')
        .trim()
        .replace(/^./, str => str.toUpperCase());
}
async function levelTransFilter(filter = false) {
    try {
        const account = await getCurrentAccount();
        const user = await mainContract.methods.isUserExists(account).call();
        if (user) {
            clearTableRows();
            if (filter) {
                const startDateInput = document.getElementById('start_date').value;
                const endDateInput = document.getElementById('end_date').value;
                startDate = new Date(startDateInput).getTime() / 1000;
                endDate = new Date(endDateInput).getTime() / 1000;
            }
            let i = 0;
            let rowCounter = 1;
            let hasData = true;
            while (hasData) {
                const data_trx = await mainContract.methods.transactions(account, i).call();
                if (!data_trx) {
                    hasData = false;
                    break;
                }
                const transactionTimestamp = parseInt(data_trx['timestamp']);
                const isWithinDateRange =
                    (!filter ||
                        ((!startDate || transactionTimestamp >= startDate) &&
                            (!endDate || transactionTimestamp <= endDate)));
                if (isWithinDateRange) {
                    addRow3(
                        rowCounter++,
                        data_trx['amount'],
                        data_trx['fromAddress'],
                        data_trx['level'],
                        data_trx['description'],
                        data_trx['timestamp'],
                        data_trx['types'],
                    );
                }
                i++;
            }
        }
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}
function clearTableRows() {
    const tableBody = document.querySelector('#data-table5 tbody');
    tableBody.innerHTML = '';
}
function convertTimestamp(timestamp) {
    const date = new Date(timestamp * 1000);
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        timeZoneName: 'short'
    };
    return date.toLocaleDateString(undefined, options);
}
function addRow3(i, amount, fromAddress, level, description, timestamp, types) {
    let time = convertTimestamp(timestamp);
    console.log("add row three timestamp", timestamp);
    let newamount = amount / 1e18;
    newamount = newamount.toFixed(4);
    let trx_type;
    if (types == 0) {
        trx_type = "Direct Income";
    } else if (types == 1) {
        trx_type = "Level Income";
    } else if (types == 2) {
        trx_type = "Level Income";
    }
    const newRow = $('<tr>');
    newRow.append($('<td>').text(i));
    newRow.append($('<td>').text('$ ' + newamount));
    newRow.append($('<td>').text(description));
    newRow.append($('<td>').text(time));
    newRow.append($('<td>').text(trx_type));
    $('#data-table5 tbody').append(newRow);
}
async function currentDayROI() {
    const account = await getCurrentAccount();
    const user = await mainContract.methods.isUserExists(account).call();
    if (user) {
        const stakeList = await mainContract.methods.getUserROITransactions(account).call();
        const currentDate = new Date();
        const currentDay = currentDate.getUTCDate();
        const currentMonth = currentDate.getUTCMonth();
        const currentYear = currentDate.getUTCFullYear();
        for (const data of stakeList) {
            const transactionTimestamp = parseInt(data[3]);
            const transactionDate = new Date(transactionTimestamp * 1000);
            const transactionDay = transactionDate.getUTCDate();
            const transactionMonth = transactionDate.getUTCMonth();
            const transactionYear = transactionDate.getUTCFullYear();
            var nftBaseUrl = '';
            var nftTokenUri = await token.methods.tokenURI(data[4]).call();
            var nftJsonUrl = nftBaseUrl + nftTokenUri;
            var newRow = 'Loading...';
            if (data[4] > 0) {
                $.getJSON(nftJsonUrl, function (nftData) {
                    var imageUrl = nftData.image.replace("ipfs://", "https://ipfs.io/ipfs/");
                    var nftName = nftData.name;
                    var nftDescription = nftData.description;
                    var nftRarity = nftData.attributes.find(attr => attr.trait_type === "Rarity")?.value || "Unknown";
                    var date = new Date(data[3] * 1000);
                    var formattedDateTime = `${date.getFullYear()}-${padZero(date.getMonth() + 1)}-${padZero(date.getDate())} ${padZero(date.getHours())}:${padZero(date.getMinutes())}:${padZero(date.getSeconds())}`;
                    newRow = `<a href="${imageUrl}" target="_blank"><div class="content-item">
                                    <div class="image-info">
                                        <img src="${imageUrl}" alt="${nftName}" style="height: 90px;">                                        
                                        <div class="item-content">
                                            <p class="item-header text-dark">Order No: <b>${data[5]}</b></p>
                                            <p class="item-details text-dark">${nftName} <span class="text-secondary bg-success">WON</span></p>
                                        </div>
                                    </div>  
                                    <div class="gmt-content">
                                        <p class="text-dark text-center"><i><b>${formattedDateTime}</b></i></p>
                                    </div>
                                </div></a>`;
                    console.log(newRow);
                    if (transactionDay === currentDay && transactionMonth === currentMonth && transactionYear === currentYear) {
                        $('.todayROI').empty();
                        $('.todayROI').append(newRow);
                    } else {
                        $('.collectedROI').append(newRow);
                    }
                });
            } else {
                newRow = "Data not found... ";
            }
        }
    }
}
function showloader() {
    $(".main_loader").css('display', 'flex');
    $(".main_loader").addClass('content');
}
function hideloader() {
    $(".main_loader").css('display', 'none');
    $(".main_loader").removeClass('content');
}
async function getTransLog(txType) {
    const tbody = $('#txTableBody');
    tbody.html('<tr><td colspan="5" class="mono text-secondary text-center">Loading...</td></tr>');
    try {
        const account = await getCurrentAccount();
        const userExists = await mainContract.methods.userBase(account).call();
        if (!userExists.registered) {
            tbody.html('<tr><td colspan="5" class="mono text-secondary text-center">User not found.</td></tr>');
            return;
        }
        const {
            sumEarning,
            1: transactions
        } = await mainContract.methods.getTransactionLogByType(account, txType).call();
        let filteredTransactions = Object.values(transactions);
        tbody.empty();
        if (!transactions || transactions.length === 0) {
            tbody.html('<tr><td colspan="5" class="mono text-secondary text-center">No data available.</td></tr>');
            return;
        }
        filteredTransactions.sort((a, b) => b.timestamp - a.timestamp);
        for (let i = 0; i < filteredTransactions.length; i++) {
            const tx = filteredTransactions[i];
            const date = new Date(tx.timestamp * 1000).toLocaleString();
            const amount = tx.amount / 1e18;
            const row = `
                <tr>
                    <td class="mono text-secondary">${i + 1}</td>
                    <td class="mono text-secondary">$ ${amount.toFixed(4)} </td>
                   <td class="mono text-secondary">${date}</td>
                </tr>
            `;
            tbody.append(row);
        }
    } catch (error) {
        console.error('Error fetching withdraw history:', error);
        tbody.html('<tr><td colspan="4" class="text-center">Error loading data.</td></tr>');
    }
}
async function loadBinaryTree(userAddress) {
    $("#treeLoader").removeClass("d-none");
    $("#binaryTree").addClass("d-none");
    try {
        const account = userAddress || await getCurrentAccount();
        const accountActive = await mainContract.methods.userBase(account).call();
        $("#rootNode").html(nodeHtml(account, accountActive.active));
        const root = await mainContract.methods.binary(account).call();
        const rootLeftActive = await mainContract.methods.userBase(root.leftChild).call();
        const rootRightActive = await mainContract.methods.userBase(root.rightChild).call();
        $("#leftNode").html(nodeHtml(root.leftChild, rootLeftActive.active));
        $("#rightNode").html(nodeHtml(root.rightChild, rootRightActive.active));
        if (root.leftChild) {
            const left = await mainContract.methods.binary(root.leftChild).call();
            const leftLeftActive = await mainContract.methods.userBase(left.leftChild).call();
            const leftRightActive = await mainContract.methods.userBase(left.rightChild).call();
            $("#leftLeftNode").html(nodeHtml(left.leftChild, leftLeftActive.active));
            $("#leftRightNode").html(nodeHtml(left.rightChild, leftRightActive.active));
        }
        if (root.rightChild) {
            const right = await mainContract.methods
                .binary(root.rightChild)
                .call();
            const rightLeftActive = await mainContract.methods.userBase(right.leftChild).call();
            const rightRightActive = await mainContract.methods.userBase(right.rightChild).call();
            $("#rightLeftNode").html(nodeHtml(right.leftChild, rightLeftActive.active));
            $("#rightRightNode").html(nodeHtml(right.rightChild, rightRightActive.active));
        }
        show_tree_user_info();
    } catch (e) {
        console.log(e);
    } finally {
        $("#treeLoader").addClass("d-none");
        $("#binaryTree").removeClass("d-none");
    }
}
function nodeHtml(address, active) {
    if (
        !address ||
        address === "0x0000000000000000000000000000000000000000"
    ) {
        return `
            <div class="tree-node empty">
                <div class="tree-node__top">
                    <div class="tree-node__avatar">
                        <i class="bi bi-plus-lg"></i>
                    </div>
                    <div class="tree-node__id">Empty</div>
                </div>
            </div>
        `;
    }
    return `
        <div class="tree-user" data-address="${address}" >
            <div class="tree-node__top">
                <div class="tree-node__avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="tree-node__id">
                    ${shortAddress(address)}
                </div>
            </div>
    
            <div class="tree-node__status ${active ? 'active' : ''}">
                ${active ? 'Active' : 'Inactive'}
            </div>
        </div>
    `;
}
function show_tree_user_info() {
    $(".tree-user").off("click").on("click", async function (e) {
        e.preventDefault();
        let address = $(this).data("address");
        $("#treeInformation .modal-title").text(`ID: ${shortAddress(address)}`);
        $('[data-field="activation"]').text("Loading...");
        $('[data-field="referred"]').text("Loading...");
        try {
            const user = await mainContract.methods.userBase(address).call();
            const binary = await mainContract.methods.binary(address).call();
            $('[data-field="activation"]').text(convertTimestamp(user.registrationTime));
            $('[data-field="referred"]').text(shortAddress(user.referrer));
            $('[data-field="totalPHCommitted"]').text('$ ' + (user.totalPH / 1e18).toFixed(4));
            $('[data-field="leftBusiness"]').text(
                '$ ' + (binary.leftBusiness / 1e18).toFixed(4)
            );
            $('[data-field="rightBusiness"]').text(
                '$ ' + (binary.rightBusiness / 1e18).toFixed(4)
            );
        } catch (e) {
            console.log(e);
        }
        $("#treeInformation").attr("data-address", address).modal("show");
    });
}
let binaryTimerInterval;
async function checkBinaryClaimTimer() {
    account = await getCurrentAccount();
    if (!account) return;
    try {
        let binaryData = await mainContract.methods.binary(account).call();
        let lastClaimWindow = Number(binaryData.lastBinaryRewardTime);
        let currentTime = Math.floor(Date.now() / 1000);
        let currentWindow = Math.floor(currentTime / (12 * 60 * 60));
        let btn = document.getElementById("claimBinaryBtn");
        let text = document.getElementById("claimText");
        if (lastClaimWindow === currentWindow) {
            btn.disabled = true;
            startBinaryCountdown(btn, text);
        } else {
            btn.disabled = false;
            text.innerHTML = "Claim Level Binary";
        }
    } catch (error) {
        console.log(error);
    }
}
function startBinaryCountdown(btn, text) {
    clearInterval(binaryTimerInterval);
    binaryTimerInterval = setInterval(() => {
        const now = new Date();
        let next = new Date(now);
        if (now.getHours() < 12) {
            next.setHours(12, 0, 0, 0);
        } else {
            next.setDate(next.getDate() + 1);
            next.setHours(0, 0, 0, 0);
        }
        const remaining = Math.floor((next - now) / 1000);
        if (remaining <= 0) {
            clearInterval(binaryTimerInterval);
            btn.disabled = false;
            text.innerHTML = "Claim Level Binary";
            checkBinaryClaimTimer();
            return;
        }
        const hours = Math.floor(remaining / 3600);
        const minutes = Math.floor((remaining % 3600) / 60);
        const seconds = remaining % 60;
        text.innerHTML = `<span class="text-danger fw-bold">${hours}h ${minutes}m ${seconds}s</span>`;
    }, 1000);
}
async function getTotalLevelBusiness1() {
    try {
        const account = await getCurrentAccount();
        const user = await mainContract.methods.userBase(account).call();
        if (!user.registered) return;
        let totalLeftBusiness = 0;
        let totalRightBusiness = 0;
        let totalLeftBusinessCurrent = 0;
        let totalRightBusinessCurrent = 0;
        for (let level = 1; level <= 70; level++) {
            const data = await mainContract.methods
                .levelBusiness(account, level)
                .call();
            totalLeftBusiness += Number(data.totalLeftBusiness);
            totalRightBusiness += Number(data.totalRightBusiness);
            if (price(data.leftBusiness) >= 20 && price(data.rightBusiness) >= 20) {
                totalLeftBusinessCurrent += 20;
                totalRightBusinessCurrent += 20;
            }
        }
        $(".totalLeftBusinessAll").text(`$ ${price(totalLeftBusiness)}`);
        $(".totalRightBusinessAll").text(`$ ${price(totalRightBusiness)}`);
        $(".totalLeftBusinessCurrent").text(`$ ${totalLeftBusinessCurrent}`);
        $(".totalRightBusinessCurrent").text(`$ ${totalRightBusinessCurrent}`);
    } catch (error) {
        console.log(error);
    }
}




async function getTotalLevelBusiness() {
    try {
        const account = await getCurrentAccount();

        if (!account) {
            return;
        }

        const user = await mainContract.methods
            .userBase(account)
            .call();

        if (!user.registered) {
            return;
        }

        let totalLeftBusiness = 0;
        let totalRightBusiness = 0;

        let currentLeftBusiness = 0;
        let currentRightBusiness = 0;

        for (let level = 1; level <= 70; level++) {

            const data = await mainContract.methods
                .levelBusiness(account, level)
                .call();

            // Total accumulated business
            totalLeftBusiness +=
                Number(data.totalLeftBusiness || data[2] || 0);

            totalRightBusiness +=
                Number(data.totalRightBusiness || data[3] || 0);

            // Current/unmatched business
            currentLeftBusiness +=
                Number(data.leftBusiness || data[0] || 0);

            currentRightBusiness +=
                Number(data.rightBusiness || data[1] || 0);
        }

        $(".totalLeftBusinessAll")
            .text(`$ ${(totalLeftBusiness / 1e18).toFixed(4)}`);

        $(".totalRightBusinessAll")
            .text(`$ ${(totalRightBusiness / 1e18).toFixed(4)}`);

        $(".totalLeftBusinessCurrent")
            .text(`$ ${(currentLeftBusiness / 1e18).toFixed(4)}`);

        $(".totalRightBusinessCurrent")
            .text(`$ ${(currentRightBusiness / 1e18).toFixed(4)}`);

    } catch (error) {
        console.error("Total Level Business Error:", error);

        $(".totalLeftBusinessAll").text("$ 0.0000");
        $(".totalRightBusinessAll").text("$ 0.0000");
        $(".totalLeftBusinessCurrent").text("$ 0.0000");
        $(".totalRightBusinessCurrent").text("$ 0.0000");
    }
}






// ph gh function




async function loadGHHistory() {
    const tbody = $("#ghTableBody");

    tbody.html(`
        <tr>
            <td colspan="7" class="text-center py-4">
                <span class="spinner-border spinner-border-sm me-2"></span>
                Loading GH history...
            </td>
        </tr>
    `);

    try {
        account = await getCurrentAccount();

        if (!account) {
            tbody.html(`
                <tr>
                    <td colspan="7" class="text-center text-warning py-4">
                        Wallet not connected.
                    </td>
                </tr>
            `);
            return;
        }

        const user = await mainContract.methods
            .userBase(account)
            .call();

        if (!user.registered) {
            tbody.html(`
                <tr>
                    <td colspan="7" class="text-center text-warning py-4">
                        User not registered.
                    </td>
                </tr>
            `);
            return;
        }

        // Latest GH slots
        const slots = await mainContract.methods
            .getLatestGHSlots(account, 50)
            .call();

        tbody.empty();

        if (!slots || slots.length === 0) {
            tbody.html(`
                <tr>
                    <td colspan="7" class="text-center text-secondary py-4">
                        No GH history found.
                    </td>
                </tr>
            `);
            return;
        }

        // Latest first
        slots.reverse();

        slots.forEach((slot) => {
            addGHHistoryRow(slot);
        });

    } catch (error) {
        console.error("GH history error:", error);

        tbody.html(`
            <tr>
                <td colspan="7" class="text-center text-danger py-4">
                    Unable to load GH history.
                </td>
            </tr>
        `);
    }
}


function addGHHistoryRow(slot) {

    const id = slot.id;
    const requestIndex = slot.requestIndex;

    const amount = Number(slot.amount) / 1e18;

    const createTime = Number(slot.createTime);

    const dateString = createTime > 0
        ? new Date(createTime * 1000).toLocaleString()
        : "--";

    let status = "";

    if (slot.completed) {
        status = `
            <span class="badge bg-success">
                Completed
            </span>
        `;
    } else if (slot.active) {
        status = `
            <span class="badge bg-primary">
                Active
            </span>
        `;
    } else {
        status = `
            <span class="badge bg-secondary">
                Inactive
            </span>
        `;
    }

    const tr = $("<tr>");

    tr.append(`
        <td class="mono text-secondary">
            #${id}
        </td>
    `);

    tr.append(`
        <td class="mono text-secondary">
            ${requestIndex}
        </td>
    `);

    tr.append(`
        <td class="mono">
            $${amount.toFixed(2)}
        </td>
    `);

    tr.append(`
        <td class="mono text-secondary">
            ${dateString}
        </td>
    `);

    tr.append(`
        <td class="mono text-secondary">
            Cycle ${slot.cycle}
        </td>
    `);

    tr.append(`
        <td>
            ${status}
        </td>
    `);

    tr.append(`
        <td>
            ${
                slot.active && !slot.completed
                    ? `<span class="text-success">Running</span>`
                    : `<span class="text-secondary">--</span>`
            }
        </td>
    `);

    $("#ghTableBody").append(tr);
}






// top up code 



async function topUpNow() {

    const btn = $("#confirmTopUpBtn");

    btn.prop("disabled", true).html(`
        <span class="spinner-border spinner-border-sm me-2"></span>
        Processing...
    `);

    try {

        account = await getCurrentAccount();

        if (!account) {
            toastr.error("Please connect your wallet.");
            return;
        }

        // Check user registration
        const user = await mainContract.methods
            .userBase(account)
            .call();

        if (!user.registered) {
            toastr.error("Account is not registered.");
            return;
        }

        // Check current cycle state
        const userCycle = await mainContract.methods
            .userCycle(account)
            .call();

        if (!userCycle.needsTopUp) {
            toastr.error("Top Up is not required right now.");
            return;
        }

        // Contract TOPUP_AMOUNT = 20 USDT
        const topUpAmount = new BigNumber("1000000000000000000")
            .times(20)
            .toString(10);

        console.log("Top Up Amount:", topUpAmount);

        showloader();
        $('#cover').css('display', 'block');

        const gasPrice = await getGas();

        /*
         * Step 1:
         * Approve 20 USDT to main contract
         */
        toastr.info("Please confirm USDT approval in your wallet.");

        await usdtContract.methods
            .approve(main_contract, topUpAmount)
            .send({
                from: account,
                gasPrice: gasPrice
            });

        /*
         * Step 2:
         * Call smart contract topUp()
         */
        toastr.info("Please confirm Top Up transaction in your wallet.");

        await mainContract.methods
            .topUp()
            .send({
                from: account,
                gasPrice: gasPrice
            })
            .on("transactionHash", function (hash) {

                console.log("Top Up TX:", hash);

            })
            .on("receipt", function (receipt) {

                console.log("Top Up Receipt:", receipt);

                toastr.success("Top Up completed successfully.");

                const modalElement =
                    document.getElementById("topUpModal");

                const modal =
                    bootstrap.Modal.getInstance(modalElement);

                if (modal) {
                    modal.hide();
                }

                setTimeout(function () {
                    window.location.reload(true);
                }, 2000);

            })
            .on("error", function (error) {

                console.error("Top Up transaction error:", error);

                toastr.error(
                    "Top Up transaction failed or was rejected."
                );

            });

    } catch (error) {

        console.error("Top Up Error:", error);

        if (
            error.code === 4001 ||
            error.code === "ACTION_REJECTED"
        ) {
            toastr.warning("Transaction was rejected by user.");
        } else {
            toastr.error(
                error.message ||
                "Something went wrong from blockchain end."
            );
        }

    } finally {

        $('#cover').css('display', 'none');
        hideloader();

        btn.prop("disabled", false).html(`
            <i class="bi bi-check-circle me-2"></i>
            Confirm Top Up
        `);
    }
}


getAccount();
