//const main_contract = "0x3a850C9C7ba5e87eaA63886b1f4dDAFe9b3D116b";

// const token_contract = "0xefc2cedBDB2ae962F0A2b78de7aBc8622Aa267e9";

// const token_contract = "0xc33c822C8261A71911D3B1B145d6ad2E6D62932D";

const main_contract = "0x71C32196EE080ab47547d038261207B7C9659B0A";

const usdt_addr = "0x55d398326f99059ff775485246999027b3197955";

const router = "0x10ED43C718714eb63d5aA57B78B54704E256024E";



const p = new Web3(window.ethereum);

const mainContract = new p.eth.Contract(e, main_contract);

// const tokenContract = new p.eth.Contract(token, token_contract);

const usdtContract = new p.eth.Contract(usdt, usdt_addr);



const routerContract = new p.eth.Contract(routerABI, router);

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

    console.log("userid",userid);

    if (userid > 0 && userid != '') {

        // return await mainContract.methods.idToAddress(userid).call();

        return userid;

    } else {

        return accounts[0];

    }

}

// async function getCurrentAccount() {

//     if (!window.ethereum) {

//         toastr.error("Please install MetaMask.");

//         return null;

//     }



//     const accounts = await ethereum.request({

//         method: "eth_accounts"

//     });



//     if (accounts.length === 0) {

//         toastr.error("Please connect your wallet first.");

//         return null;

//     }



//     const userid = $('#userid').val();



//     if (userid > 0 && userid !== '') {

//         return await mainContract.methods.idToAddress(userid).call();

//     }



//     return accounts[0];

// }



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

        console.log('called accounts',accounts)

        var userid = $('#userid').val();

        if (userid > 0 && userid != '') {

            // const acc = await mainContract.methods.idToAddress(userid).call();

            account = userid;

        } else {

            account = accounts[0];

        }

        // $("#connected_wallet").html(account.substring(0, 15) + "..." + account.substring(25));

        $(".contract_addr").text(main_contract.substring(0, 6) + "..." + main_contract.substring(main_contract.length - 4)).attr("data-address", main_contract);

        $(".connected_walletdash").html(account.substring(0, 6) + "..." + account.substring(account.length - 4));

        $("#connected_wallet").val(account.substring(0, 6) + "..." + account.substring(account.length - 4));

        $("#connectWalletBtn").html('<i class="bi bi-check-circle me-2"></i>Connected').prop("disabled", true);

        $(".contract-info").html("<a style='color:black' href='https://bscscan.com/address/" + main_contract + "' target='_blank'>" + main_contract.substring(0, 5) + "..." + main_contract.substring(39) + " <i class='fa fa-link'></i> </a>");

        const chainId = await ethereum.request({

            method: 'eth_chainId'

        });

        var numericChainID = Web3.utils.hexToNumber(chainId);

        if (numericChainID == 56 ) {

            // var user = await mainContract.methods.isUserExists(account).call();

            // if (user) {

                // $(".connect-btn").css('display', 'none');

                const user_details = await mainContract.methods.userBase(account).call();

                console.log(user_details);

                const user_income_details = await mainContract.methods.userBinary(account).call();

                console.log(user_income_details);

                if (user_details['referrer'] != '0x0000000000000000000000000000000000000000') {

                    const reff_details = await mainContract.methods.userBase(user_details['referrer']).call();

                 

                    $('.sponsor_id').html(reff_details['referralCode']);

                } else {

                    $('.sponsor_id').html("No referral..");

                }

                $('.my_id').text(user_details['referralCode']);

                $("#wallet_id").text("Wallet Address".account);  

                var baseurl = $('#baseurl').val();

                // let l = baseurl+"register.php?ref=" + user_details['account'];             

                // let l = baseurl+"register.php?ref=" + account;             

                // let id = user_details['account'];

                // let rlink = l;           

                const leftLink = baseurl + "register.php?ref=" + encodeURIComponent(account) + "&pos=left";

                const rightLink = baseurl + "register.php?ref=" + encodeURIComponent(account) + "&pos=right";

                $("#leftReferralLink").val(leftLink);

                $("#rightReferralLink").val(rightLink);

                // $(".copyclipboard1").attr('data-clipboard-text', l);

                // $(".referral-link").val(rlink);

                $('.my_ref_id').html(user_details['referrer']);

                $('.activeDirectReferrals').text(user_details['activeDirectReferrals']);

                if(user_details['isActive']){

                    $('.isActive').text('Active');

                }else{

                    $('.isActive').text('Inactive');

                }



                if(user_details['hasActivePH']){

                    $('.helpButton').hide();

                }else{

                    $('.helpButton').show();

                }

                

                let available_balance = user_details['totalBonusEarned'] / 1000000000000000000;

                $('.available_balance').text('$ '+available_balance.toFixed(4));

                let totalPHCommitted = user_details['totalPHCommitted'] / 1000000000000000000;

                $('.totalPHCommitted').text('$ '+totalPHCommitted.toFixed(4));



                let leftBusiness = user_income_details['leftBusiness'] / 1000000000000000000;

                $('.leftBusiness').text('$ '+leftBusiness.toFixed(4));

                let rightBusiness = user_income_details['rightBusiness'] / 1000000000000000000;

                $('.rightBusiness').text('$ '+rightBusiness.toFixed(4));

                let leftBoosterBusiness = user_income_details['leftBoosterPending'] / 1000000000000000000;

                $('.leftBoosterBusiness').text('$ '+leftBoosterBusiness.toFixed(4));

                let rightBoosterBusiness = user_income_details['rightBoosterPending'] / 1000000000000000000;

                $('.rightBoosterBusiness').text('$ '+rightBoosterBusiness.toFixed(4));

                let totalBoosterIncome = user_income_details['totalBoosterIncome'] / 1000000000000000000;

                $('.totalBoosterIncome').text('$ '+totalBoosterIncome.toFixed(4));

                let totalLevelIncome = user_income_details['totalLevelIncome'] / 1000000000000000000;

                $('.totalLevelIncome').text('$ '+totalLevelIncome.toFixed(4));

                if(user_income_details['leftChild'] !== '0x0000000000000000000000000000000000000000'){

                    let leftChild = shortAddress(user_income_details['leftChild']);

                    $('.leftChild').text(leftChild);

                }else{

                    $('.leftChild').text('--');

                }

                

                if(user_income_details['rightChild'] !== '0x0000000000000000000000000000000000000000'){

                    let rightChild = shortAddress(user_income_details['rightChild']);

                    $('.rightChild').text(rightChild);

                }else{

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



    

        } else {

            $(".connect-btn").css('display', 'block');

            toastr.error("Please select binance mainnet network on Wallet.");

            return;

        }

    } catch (err) {

        

        console.log(err);

        toastr.error("Wallet not connected");

        return;

    }

}



async function getNRX(amount){

    const valueString = '1000000000000000000';

    const amts = new BigNumber(valueString).times(amount);

    const amnt = amts.toString(10);

    let price = await mainContract.methods.getTokenToUSDT(amnt).call();

    let scaledPrice = price / 1e18;

    // console.log(scaledPrice);

    return scaledPrice;

}



function getUserRank(){

    return ['','NRX1', 'NRX2', 'NRX3', 'NRX4', 'NRX5', 'NRX6', 'NRX7', 'NRX8', 'NRX9'];

}



function getUserLeaderRank(){

    return ['', 'Pearl', 'Sapphire', 'Emerald', 'Ruby', 'Diamond', 'Double Diamond'];

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

    console.log("account",account);

    var refid = $('#referralId').val();

    let position = $("#position").val();



    if (refid == '') {

        toastr.error('Referral Id could not be blank');

        return;

    }



    // const referAddress = await mainContract.methods.referralCodeToAddress(refid).call();

    const referAddress = refid;

    console.log("referAddress",referAddress);
    const ref_user = await mainContract.methods.userBase(referAddress).call();
    if (!ref_user.isRegistered) {
        toastr.error('Referrer does not exist !');
        return;
    }
    if (referAddress.toLowerCase() != account.toLowerCase()) {



        // const user = await mainContract.methods.isUserExists(account).call();
        const user = await mainContract.methods.userBase(account).call();

        if (user.isRegistered) {

            toastr.error('Account already exists');

        } else {

            if (referAddress && referAddress != '0x0000000000000000000000000000000000000000') {

                // const valueString = '1000000000000000000';

                // const amts = new BigNumber(valueString).times(invest_amount);

                // const amount = amts.toString(10);



                // let text = "You are Registering with Sponsor Id " + refid + " and Sponsor Address is " + referAddress + "  \n\nPress Ok to continue!";

                const pos = position === "left" ? 0 : 1;

                let text = "You are Registering with Sponsor Address " + referAddress + "  \n\nPress Ok to continue!";

                

                if (confirm(text) === true) {

                    showloader();

                    $('#cover').css('display', 'block');



                    try {

                        const gasPrice = await getGas();

                        console.log("gasPrice",gasPrice);

                        // await token.methods.approve(main_contract, amount).send({

                        //     from: account,

                        //     gasPrice: gasPrice

                        // });



                        await mainContract.methods.register(referAddress, pos).send({

                            from: account,

                            gasPrice: gasPrice

                        }).on("receipt", (function(e) {

                            hideloader();

                            toastr.success('Registration done successfully');

                            setTimeout(function() {

                                window.location.href = $('#baseurl').val() + "login.php";

                            }, 2000);

                        })).on("error", (function(e) {

                            console.log("e",e.message);

                            $('#cover').css('display', 'none');

                            hideloader();

                            toastr.error('Transaction was canceled or failed');

                        }));

                    } catch (error) {

                        console.log(error.message);

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

        if (user.isRegistered) {

            // const owner = await getContractOwner();

            // if (owner !== account.toLowerCase()) {

            //     hideloader();

            //     toastr.error('Only owner can execute this function.');

            //     return;

            // }

            let text = "Are you sure wants to execute ?  Press Ok to continue!";

            if (confirm(text) == true) {

                showloader();



                $('#cover').css('display', 'block');

                getGas().then((gasPrice) => {

                    mainContract.methods.calculateStakingBalance(account).send({

                        from: account,

                        gasPrice: gasPrice

                    }).on("receipt", (function(e) {

                        toastr.success('Executed Successfully.');

                        hideloader();

                        setTimeout(function() {

                            window.location.reload(true);

                        }, 2000);

                    })).on("error", (function(e) {

                        hideloader();

                        toastr.error('Error');

                    }));

                }).catch((error) => {

                    hideloader();

                    toastr.error('Something went wrong from blockchain end.');

                });

            }

            else{

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

    try {

        account = await getCurrentAccount();

        var stakeAmount = $('#stakeAmount').val();

        console.log("stakeAmount",stakeAmount);

        // let tokenType = $('#stake_token').val();

        const min = await mainContract.methods.MIN_PH_AMOUNT().call() / 1e18;

        //const PH_MULTIPLE = await mainContract.methods.PH_MULTIPLE().call() / 1e18;



        // const tokenName = tokenType == 0 ? "Matrix" : "USDT";



        if (stakeAmount < min) {

            toastr.error(`Minimum helping amount should be $ ${min}.`);

            return;

        }

        //if (stakeAmount % PH_MULTIPLE !== 0) {

        //    toastr.error(`Helping amount should be multiple of $ ${PH_MULTIPLE}.`);

        //    return;

        //}



        if (account) {

            const user = await mainContract.methods.userBase(account).call();

            if (user.isRegistered) {

                let text = `You are helping with $ ${stakeAmount}. Press Ok to continue!`;

                if (confirm(text)) {

                    showloader();

                    $('#cover').css('display', 'block');



                    const valueString = '1000000000000000000';

                    const amts = new BigNumber(valueString).times(stakeAmount);

                    const amount = amts.toString(10);

                    console.log("amount",amount);

                    const gasPrice = await getGas();



                    // const selectedToken = tokenType == 0 ? tokenContract : usdtContract;



                    await usdtContract.methods.approve(main_contract, amount).send({

                        from: account,

                        gasPrice: gasPrice

                    });

                    console.log("amount",amount);

                    await mainContract.methods.createPHOrder().send({

                        from: account,

                        gasPrice: gasPrice

                    })

                    .on("transactionHash", function(hash) {

                        console.log("Tx Hash:", hash);

                    })

                    .on("receipt", function(receipt) {

                        toastr.success(`Successfully helped $ ${stakeAmount}`);

                        setTimeout(() => {

                            window.location.href = 'index.php';

                        }, 2000);

                    })

                    .on("error", function(error) {

                        console.error(error);

                        toastr.error('Transaction failed or was rejected.');

                        hideloader();

                    });



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







let currentCountdownDuration = 24; 

let countdownInterval; 



async function show_timer() {

    try {

        const account = await getCurrentAccount();

        const currentTimestampSeconds = Math.floor(new Date().getTime() / 1000);



        const current = await mainContract.methods.getDays(currentTimestampSeconds).call();

        const last_stake = await getLastStake();

        //console.log("Last stake = ",last_stake);



        // Start the countdown based on the initial duration

        startCountdown(current, last_stake, currentCountdownDuration, 'timer24');

    } catch (error) {

        console.error("An error occurred in show_timer: ", error);

    }

}



async  function updateTimer(elementId, endTime) {

    const element = document.getElementById(elementId);

    const now = new Date().getTime();

    const distance = endTime - now;



    // Check if the countdown has ended

    if (distance < 0) {

        element.innerHTML = "00:00:00";



        // Switch to the next countdown duration (24 or 48 hours)

        currentCountdownDuration = currentCountdownDuration === 24 ? 48 : 24;

        console.log(`Switching to ${currentCountdownDuration}-hour countdown.`);

        startCountdown(new Date().getTime() / 1000, await getLastStake(), currentCountdownDuration, elementId);



        return;

    }



    // Calculate hours, minutes, and seconds

    const hours = String(Math.floor(distance / (1000 * 60 * 60))).padStart(2, '0');

    const minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');

    const seconds = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');



    element.innerHTML = `${hours}:${minutes}:${seconds}`;

}



async function withdraw(){

    // alert('ok123');  

    try {

        account = await getCurrentAccount();

        let withdrawAmount = $('.withdrawAmount').val();



        // let tokenType = parseInt($('#withdraw_token').val());

        if (withdrawAmount <= 0) {

            toastr.error(`Invalid amount.`);

            return;

        }



        if (account) {

            const user = await mainContract.methods.isUserExists(account).call();

            if (user) {

                const user_detail = await mainContract.methods.users(account).call();

                

                let user_balance = user_detail['balance'] / 1e18;

                const valueString = '1000000000000000000';

                // let price_amts, realAmt, price;

               //  if(tokenType == 0){

               //      price_amts = new BigNumber(valueString).times(1);  // 1 Matrix

               //      realAmt = price_amts.toString(10);

               //      price = await mainContract.methods.getTokenToUSDT(realAmt).call();



               //  } else {

               //      price_amts = new BigNumber(valueString).times(withdrawAmount); // withdraw amount in USDT

               //      realAmt = price_amts.toString(10);

               //      price = await mainContract.methods.getUsdtToToken(realAmt).call();

               //  }



               if ( (withdrawAmount > user_balance) ) {

                    toastr.error('Your Available Balance is low.');

                    return;

                }



                // const tokenName = tokenType == 0 ? "Matrix" : "USDT";

                let text = `Are you sure want to withdraw ${withdrawAmount}  USDT?  Press Ok to continue!`;

                if (confirm(text)) {

                    showloader(); 

                     alert('ok');   

                    $('#cover').css('display', 'block');

                    // if(tokenType == 0){

                    //     amts = new BigNumber(valueString).times(withdrawAmount);

                    // }else{

                    //     amts = price;

                    // } 

                    // alert('1');

                    let amts = new BigNumber(valueString).times(withdrawAmount);

                    // alert('2');

                    const gasPrice = await getGas();

                    // alert('3');

                    // Withdraw tokens

                    // alert(amts);

                    const amounts = amts.toString(10);

                    // alert(amounts);

                    await mainContract.methods.withdraw(amounts,0).send({

                        from: account,

                        gasPrice: gasPrice

                    });

                    



                    toastr.success('Withdrawal done successfully');

                    setTimeout(() => {

                        window.location.href = 'index.php';

                    }, 2000);

                } else {

                    // Hide loader if user cancels the confirmation

                    hideloader();

                }

            } else {

                toastr.error('Account is not registered.');

            }

        } else {

            toastr.error('No dApp wallet connected.');

        }

    } catch (error) {

        console.log(error.message);

        toastr.error('Something went wrong from the blockchain end.');

    } finally {

        $('#cover').css('display', 'none'); // Ensure cover is hidden

        hideloader(); // Ensure loader is hidden

    }

}





const getDeadline = () => Math.floor(Date.now() / 1000) + 60 * 20;



$(document).on('click', '.getPrice', function() {

    var val = $(this).attr('data-val');

    $('.stakeAmount').val(val);



});



let currentPage = 1;

const pageSize = 25;



async function helpListLoad() {

    const tbody = $("#txTableBody");

    tbody.html("<tr><td colspan='9' class='text-center'>Loading...</td></tr>");



    try {



        const account = await getCurrentAccount();



        const user = await mainContract.methods.userBase(account).call();



        if (!user.isRegistered) {

            tbody.html("<tr><td colspan='9' class='text-center text-warning'>User not registered.</td></tr>");

            return;

        }



        const orderIds = await mainContract.methods

            .getUserPHOrderIds(account)

            .call();

            console.log(orderIds)



        tbody.empty();



        if (orderIds.length == 0) {

            tbody.html("<tr><td colspan='9' class='text-center mono text-secondary'>No transactions found.</td></tr>");

            return;

        }



        // newest first

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



    const tr = $("<tr>");



    const amount = Number(order.amount) / 1e18;



    const date = new Date(Number(order.commitmentTime) * 1000);



    const dateString = date.toLocaleString();



    const unlock = Number(order.commitmentTime) + (7 * 24 * 60 * 60);



    const now = Math.floor(Date.now() / 1000);

    



    let action = "";

    if(order.isCompleted){

        action = '--'

    }else{

        action =

            `<button class="btn btn-success btn-sm"

                onclick="recommit(${orderId},${amount})">

                Recommit

            </button>`;



    }

    // else if (now >= unlock) {



        // action =

        //     `<button class="btn btn-success btn-sm"

        //         onclick="recommit(${orderId},${amount})">

        //         Recommit

        //     </button>`;



    // } else {



    //     const remain = unlock - now;



    //     const days = Math.floor(remain / 86400);

    //     const hours = Math.floor((remain % 86400) / 3600);



    //     action =

    //         `<span class="badge bg-warning text-dark">

    //             ${days}d ${hours}h left

    //         </span>`;

    // }



    let status = order.isCompleted

        ? '<span class="badge bg-success">Completed</span>'

        : '<span class="badge bg-primary">Active</span>';



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

        <li class="page-item ${currentPage==1?'disabled':''}">

            <a class="page-link" href="#" onclick="changePage(${currentPage-1})">Previous</a>

        </li>

    `;



    for(let i=1;i<=totalPages;i++){



        html += `

            <li class="page-item ${currentPage==i?'active':''}">

                <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>

            </li>

        `;

    }



    html += `

        <li class="page-item ${currentPage==totalPages?'disabled':''}">

            <a class="page-link" href="#" onclick="changePage(${currentPage+1})">Next</a>

        </li>

    `;



    $("#txPagination").html(html);

}



function changePage(page){



    if(page<1) return;



    currentPage=page;



    helpListLoad();

}



function shortAddress(addr){

    return addr.substring(0,6)+"..."+addr.substring(addr.length-4);

}



async function recommit(orderId, amount){

    try{



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

            from:account,

            gasPrice:gasPrice

        });

        toastr.success("Recommit successful");

        helpListLoad();



    }catch(err){



        console.log(err);



        toastr.error("Transaction failed");

    }



}



function padZero(num) {

    return (num < 10) ? `0${num}` : num;

}

// RoI data show 

async function Roi_load_old() {

    account = await getCurrentAccount();

    const user = await mainContract.methods.isUserExists(account).call();

    if (user) {

        const stakeList = await mainContract.methods.getUserROITransactions(account).call();

        // Paginate the stakeList

        const startIndex = (currentPage - 1) * pageSize;

        const endIndex = startIndex + pageSize;

        const paginatedStakeList = stakeList.slice(startIndex, endIndex);

        

        for (const data of paginatedStakeList) {

            addRows(i, data);

        }

    }

}

async function Roi_load() {

    const tbody = $('#data-table tbody');

    tbody.html('<tr><td colspan="4" class="text-center">Loading...</td></tr>');



    try {

        account = await getCurrentAccount();

        const user = await mainContract.methods.isUserExists(account).call();



        if (user) {

            const stakeList = await mainContract.methods.getUserROITransactions(account).call();

            const startIndex = (currentPage - 1) * pageSize;

            const endIndex = startIndex + pageSize;

            const paginatedStakeList = stakeList.slice(startIndex, endIndex);

            tbody.empty();



            if (paginatedStakeList.length === 0) {

                tbody.html('<tr><td colspan="4" class="text-center text-warning">No ROI records found.</td></tr>');

                return;

            }

            let i = 1;

            for (const data of paginatedStakeList) {

                await addRows(i, data); 

                i++;

            }

        } else {

            tbody.html('<tr><td colspan="4" class="text-center text-warning">User not found.</td></tr>');

        }



    } catch (error) {

        console.error('Error loading ROI data:', error);

        tbody.html('<tr><td colspan="4" class="text-center text-danger">Error loading data.</td></tr>');

    }

}



$('#nextPageButton').on('click', function() {

    currentPage++;

    $('#data-table tbody').html("<i class='fa fa-spinner fa-spin'></i>");

    $('#data-table tbody').empty();

    Roi_load();

});



$('#prevPageButton').on('click', function() {

    if (currentPage > 1) {

        currentPage--;

        $('#data-table tbody').html("<i class='fa fa-spinner fa-spin'></i>");

        $('#data-table tbody').empty();

        Roi_load();

    }

});

async function addRows(i,dataObject) {

    //var ids = $("#userIDref").val();

    let nrx_value = await getNRX(1);

    const newRow = $('<tr>');

    // if (dataObject.stakeid) {

    //     var id = dataObject.stakeid;

    // }

    newRow.append($('<td>').html(i));

    if (dataObject.stakeamount) {

        var amts = dataObject.stakeamount / 1000000000000000000;

    }

    let amts_nrx =  amts/nrx_value;

    // newRow.append($('<td>').html("$ "+amts.toFixed(4) +' ( NRX '+amts_nrx.toFixed(4)+' )'));

    newRow.append($('<td>').html("$ "+amts.toFixed(4)));



    if (dataObject.roiamount) {

        var roiamount = dataObject.roiamount / 1000000000000000000;

        

    }

    let roiamount_nrx =  roiamount/nrx_value;

    // newRow.append($('<td>').text("$ "+roiamount.toFixed(4) +' ( NRX '+roiamount_nrx.toFixed(4)+' )'));

    newRow.append($('<td>').text("NRX "+roiamount.toFixed(4)));



    // if (dataObject.ROIPer) {

    //     var ROIPer = dataObject.ROIPer / 1000000000000000000;

    // }

    // newRow.append($('<td>').text(ROIPer)); 

  

     



    if (dataObject.timestamp) {

        var date = new Date(dataObject.timestamp * 1000);

        var formattedDateTime = `${date.getFullYear()}-${padZero(date.getMonth() + 1)}-${padZero(date.getDate())} ${padZero(date.getHours())}:${padZero(date.getMinutes())}:${padZero(date.getSeconds())}`;

    } else {

        var formattedDateTime = '';

    }

    newRow.append($('<td>').text(formattedDateTime));

    // if (dataObject.blocked==1) {

    //     var status = "<div class='badge badge-outline-success'>Completed<div>"

    // } else {

    //     var status = "<div class='badge badge-outline-warning'>On Going.<div>";

    // }



    // newRow.append($('<td>').html(status));

    $('#data-table tbody').append(newRow);

}



function padZero(num) {

    return (num < 10) ? `0${num}` : num;

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



// async function directPartners() {

//     const tbody = $('#data-table2 tbody');

//     tbody.html('<tr><td colspan="6" class="text-center">Loading...</td></tr>');



//     try {

//         account = await getCurrentAccount();

//         const user = await mainContract.methods.isUserExists(account).call();



//         if (user) {

//             const data = await mainContract.methods.partners(account).call();

//             tbody.empty();



//             if (data.length === 0) {

//                 tbody.html('<tr><td colspan="6" class="text-center">No partners found.</td></tr>');

//                 return;

//             }

//             for (let i = 0; i < data.length; i++) {

//                 const data1 = await mainContract.methods.users(data[i]).call();

//                 const data1_det = await mainContract.methods.user_details(data[i]).call();



//                 addRow2(

//                     i + 1,

//                     data[i],

//                     data1['id'],

//                     data1['referralCode'],

//                     data1['totalStaked'],

//                     data1['totalTeambuisness'],

//                     data1_det['myTeambuisnessForSponsor']

//                 );

//             }



//         } else {

//             tbody.html('<tr><td colspan="6" class="text-center">User not found.</td></tr>');

//         }



//     } catch (error) {

//         console.error('Error loading direct partners:', error);

//         tbody.html('<tr><td colspan="6" class="text-center text-danger">Error loading data.</td></tr>');

//     }

// }





// async function addRow2(i, value, id, referralCode, totalStaked,totalTeambuisness,myTeambuisnessForSponsor) {

//    let amounts=  totalStaked/1e18;

//    let nrx_value = await getNRX(1);

//    let amounts_nrx = amounts/nrx_value;



//     const newRow = $('<tr>');

    

//     newRow.append($('<td>').text(i));

//     newRow.append($('<td>').text(id));

//     newRow.append($('<td>').text(referralCode));

//     // newRow.append($('<td>').text('$ '+amounts.toFixed(4)+'( NRX '+amounts_nrx.toFixed(4)+' )'));

//     newRow.append($('<td>').text('$ '+amounts.toFixed(4)));

//     newRow.append($('<td>').html('<a href="https://bscscan.com/address/'+value+'" target="_blank">'+value.substring(0, 5) + "..." + value.substring(39)+'</a>'));

//     if(totalStaked>0){

//         status_txt = '<span style="color: #ffffff;;" class="bg history0 nonSelect">Active</span>';

//     }else{

//         status_txt = '<span style="color:red;" class="bg history0 nonSelect">In Active</span>';

//     }

//     newRow.append($('<td>').html(status_txt));



//     $('#data-table2 tbody').append(newRow);

// }



// async function directPartners() {



//     const tbody = $("#txTableBody");

//     tbody.html("<tr><td colspan='5' class='text-center'>Loading...</td></tr>");



//     try {



//         const account = await getCurrentAccount();



//         const referrals = await mainContract.methods

//             .getDirectReferralList(account)

//             .call();

//             console.log("referrals",referrals)



//         tbody.empty();



//         if (referrals.length === 0) {

//             tbody.html("<tr><td colspan='5' class='text-center'>No direct referrals found.</td></tr>");

//             return;

//         }



//         for (let i = 0; i < referrals.length; i++) {



//             const wallet = referrals[i];



//             const user = await mainContract.methods.userBase(wallet).call();



//             const regDate = Number(user.registrationTime) > 0

//                 ? new Date(Number(user.registrationTime) * 1000).toLocaleString()

//                 : "--";



//             const status = user.isActive

//                 ? '<span class="badge bg-success">Active</span>'

//                 : '<span class="badge bg-secondary">Inactive</span>';



//             tbody.append(`

//                 <tr>

//                     <td>${i + 1}</td>

//                     <td class="mono">

//                         <a href="https://testnet.bscscan.com/address/${wallet}"

//                            target="_blank">

//                             ${shortAddress(wallet)}

//                         </a>

//                     </td>

//                     <td>${regDate}</td>

//                 </tr>

//             `);

//         }



//     } catch (err) {



//         console.error(err);



//         tbody.html("<tr><td colspan='5' class='text-danger text-center'>Unable to load referrals.</td></tr>");

//     }

// }



async function directPartners() {



    const tbody = $("#txTableBody");

    tbody.html("<tr><td colspan='5' class='mono text-secondary text-center'>Loading...</td></tr>");



    try {



        const account = await getCurrentAccount();



        const referrals = await mainContract.methods

            .getDirectReferralList(account)

            .call();

            console.log("referrals",referrals)



        tbody.empty();



        if (referrals.length === 0) {

            tbody.html("<tr><td colspan='5' class='mono text-secondary text-center'>No direct referrals found.</td></tr>");

            return;

        }



        const parentBinary = await mainContract.methods.userBinary(account).call();



        for (let i = 0; i < referrals.length; i++) {



            const wallet = referrals[i];



            const user = await mainContract.methods.userBase(wallet).call();



            const regDate = Number(user.registrationTime) > 0

                ? new Date(Number(user.registrationTime) * 1000).toLocaleString()

                : "--";



            let position = "--";



            if (

                parentBinary.leftChild.toLowerCase() === wallet.toLowerCase()

            ) {

                position = '<span class="badge bg-primary">Left</span>';

            } else if (

                parentBinary.rightChild.toLowerCase() === wallet.toLowerCase()

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

    //  console.log("test",account);

    

    var login = await loginprocess(account);

}



async function loginprocess(address) {

    // var flag = await mainContract.methods.isUserExists(address).call();

    const userdata = await mainContract.methods.userBase(address).call();

    if (userdata.isRegistered) {

        // const userdata = await mainContract.methods.userBase(address).call();

        var newForm = jQuery('<form>', {

            'action': $('#baseurl').val() + 'postdata.php',

            'method': 'post'

        });

        // var input = $("<input>").attr("type", "hidden").attr("name", "userId").val("" + userdata["id"]);

        // $(newForm).append($(input));

        input = $("<input>").attr("type", "hidden").attr("name", "wallet").val(address);

        $(newForm).append($(input));

        input = $("<input>").attr("type", "hidden").attr("name", "hmod").val("2");

        $(newForm).append($(input));

        newForm.appendTo('body').submit();

    } else {

        toastr.warning('The connected address is not found in our records. Redirecting to the registration page...');

        setTimeout(function() {

            window.location.href = 'register.php';

        }, 2000);

    }

}



async function viewAccount() {

try{

    var userid = $('#userid').val();

    //console.log("userid",userid);

    if (userid == '' || userid == 'undefined') {

        alert('Enter user address.');

        return 

    } else {

        await loginprocess(userid);

    }

}

catch(error){

toastr.error('Connect your wallet first');

}



}



async function viewAccountOld() {

try{

    var userid = $('#userid').val();



    if (userid == '' || userid == 'undefined') {

        alert('Enter ID number.');

        return 

    } else {

     //   const account = await getCurrentAccount();

     // if(account){

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

        }

        else{

            toastr.error('invalid user or user does not exist');

        }

// }

// else{

//  toastr.error('Connect your wallet first');

// }



    }

}

catch(error){

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



$(".copy_ref").click(function(){

    let refv = $(".referral-link").val();

    if(refv !== null){

        copyRef('.referral-link');

        $('#val_err').html("Referral Copied");          

        $.magnificPopup.open({items: {src: '#Error'},type: 'inline'} );         

    }

});



$(".modal__close").click(function(){

    $.magnificPopup.close();      

});

async function RankuserStaking() {

    account = await getCurrentAccount();



    if (account) {

        const user = await mainContract.methods.isUserExists(account).call();

  

        if (user) {

         const user_income_details = await mainContract.methods.user_details(account).call();

         var myRank = user_income_details['rank'];

         if(myRank==0){

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

                    }).on("receipt", (function(e) {

                        toastr.success('Execute Successfully.');

                        setTimeout(function() {

                            window.location.reload(true);

                        }, 2000);

                    })).on("error", (function(e) {

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

        // Paginate the stakeList

        const startIndex = (currentPage - 1) * pageSize;

        const endIndex = startIndex + pageSize;

        const paginatedStakeList = stakeList.slice(startIndex, endIndex);



        for (const data of paginatedStakeList) {

           

            rows(data);

        }



    }



}



async function rows(dataObject) {

    //var ids = $("#userIDref").val();

    const newRow = $('<tr>');

    if (dataObject.id) {

        var id = dataObject.id;

    }

    newRow.append($('<td>').html(id));

    if (dataObject.amount) {

        var amts = dataObject.amount / 1000000000000000000;

    }

    newRow.append($('<td>').html('$ '+amts));



    if (dataObject.totalRoi) {

        var totalRoi = dataObject.totalRoi / 1000000000000000000;

    }

    newRow.append($('<td>').text('$ '+totalRoi));

    

     if (dataObject.dailyReturn) {

        var dailyReturn = dataObject.dailyReturn / 1000000000000000000;

    }

    newRow.append($('<td>').text('$ '+dailyReturn));

    

    if (dataObject.rank) {

        var rank = parseInt(dataObject.rank);

    }

    newRow.append($('<td>').text(rank + " RANk"));



    if (dataObject.ROIPer) {

        console.log(dataObject.ROIPer)

        var ROIPer = dataObject.ROIPer / 1000000000000000000;

    }



    // newRow.append($('<td>').text(ROIPer));

    // newRow.append($('<td>').html("<a target='_blank' href='https://amoy.polygonscan.com/nft/" + nft_contract + "/" + id + "'>NFT #" + id + "</a>"));



    if (dataObject.timestamp) {

        var date = new Date(dataObject.timestamp * 1000);

        var formattedDateTime = `${date.getFullYear()}-${padZero(date.getMonth() + 1)}-${padZero(date.getDate())} ${padZero(date.getHours())}:${padZero(date.getMinutes())}:${padZero(date.getSeconds())}`;

    } else {

        var formattedDateTime = '';

    }

    newRow.append($('<td>').text(formattedDateTime));

    // var status = "<div class='badge badge-outline-warning'>On Going.<div>";



    // newRow.append($('<td>').html(status));

    $('#data-table tbody').append(newRow);

}



async function levelTrans_old() {

    try {

        const account = await getCurrentAccount();

        const user = await mainContract.methods.isUserExists(account).call();



        if (user) {

            console.log('Fetching data...');

            

            let i = 0;

            let rowCounter = 1;

            

            let hasData = true; 

            

            while (hasData) {

                // const data_trx = await mainContract.methods.transactions(account, i).call();

                const data_trx = await mainContract.methods.getTransactionLog(account).call();

                console.log("All trans = ",i,data_trx);

               // const data_level_trx = await mainContract.methods.LevlTransactions(account, i).call();

               // console.log("level trans = ",data_level_trx);

                

                //if (!data_level_trx && !data_trx) {

              if ( !data_trx) {

                    hasData = false;

                    break;

                }



                

               // if (data_level_trx) {

               //     addRow3(

              //          rowCounter++, 

              //          data_level_trx['amount'], 

               //         data_level_trx['fromAddress'], 

               //         data_level_trx['level'], 

               //         data_level_trx['timestamp'], 

               //         data_level_trx['types'],

               //     );

               // }



                

                if (data_trx) {

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



async function levelTrans() {

    $('.processing').html('<tr><td colspan="6" class="text-center">Loading...</td></tr>');



    try {

        const account = await getCurrentAccount();

        const user = await mainContract.methods.isUserExists(account).call();



        if (user) {

            

            const rawTransactions = await mainContract.methods.getTransactionLog(account).call();

            const transactions = Array.from(rawTransactions);

            

            $('.processing').empty();



            if (transactions.length === 0) {

                $('#transactionsTable tbody').html('<tr><td colspan="6" class="text-center">No data available.</td></tr>');

                return;

            }



            transactions.sort((a, b) => {

                const tsA = a.timestamp || a[5];

                const tsB = b.timestamp || b[5];

                return tsB - tsA;

            });



            for (let i = 0; i < transactions.length; i++) {

                const tx = transactions[i];

                //console.log(tx);

                const id = tx.id || tx[0];

                const fromID = tx.fromID || tx[1];

                const fromAddress = tx.fromAddress || tx[2];

                const shortAddress = fromAddress.substring(0, 5) + "..." + fromAddress.substring(fromAddress.length - 4);

                const txType = tx.txType || tx[3];

                const amountBNB = parseFloat(tx.amount || tx[4]) / 1e18;

                const timestamp = tx[5];

                const date = new Date(timestamp * 1000).toLocaleString();

                const formattedTxType = formatTxType(txType);

                let nrx_value = await getNRX(1);

                const amountNRX = amountBNB/nrx_value;

                // <td>$ ${amountBNB.toFixed(4)} ( NRX ${amountNRX.toFixed(4)} )</td>

                const row = `

                    <tr>

                        <td>${i + 1}</td>

                        <td>$ ${amountBNB.toFixed(4)}</td>

                        <td>${shortAddress}</td>

                        <td>${date}</td>

                        <td>${formattedTxType}</td>

                    </tr>

                `;

                $('#transactionsTable tbody').append(row);

            }



            // Set total amount

            // $('#total-amount').text((sumEarning / 1e18).toFixed(4));

            $('#transactionsTable').DataTable({

                pageLength: 10, 

                order: [[0, 'asc']], 

            });

        }

    } catch (error) {

        console.error('Error fetching data:', error);

    }

}



function formatTxType(type) {

return type

    .replace(/([a-z])([A-Z])/g, '$1 $2')

    .replace(/_/g, ' ')                

    .replace(/\s+/g, ' ')              

    .trim()                            

    .replace(/^./, str => str.toUpperCase()); 

}



// let levelCurrentPage = 1;

// const levelPageSize = 25;



async function levelTransFilter(filter = false) {

    try {

        const account = await getCurrentAccount();

        const user = await mainContract.methods.isUserExists(account).call();



        if (user) {

            clearTableRows();

            if (filter) {

                const startDateInput = document.getElementById('start_date').value;

                const endDateInput = document.getElementById('end_date').value;



                startDate = new Date(startDateInput).getTime() / 1000 ; 



                endDate =  new Date(endDateInput).getTime() / 1000 ; 



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

                               // console.log("is Within Date Range",isWithinDateRange);

                    // const startIndex = (currentPage - 1) * pageSize;

                    // const endIndex = startIndex + pageSize;

                    // const paginated = data_trx.slice(startIndex, endIndex);



                    // if (paginated.length === 0) {

                    //     $('#data-table3 tbody').html(`<tr><td colspan="8" class="text-center">No data</td></tr>`);

                    //     return;

                    // }





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



// $('#levelNext').on('click', function () {

//     levelCurrentPage++;

//     levelTransFilter(true);

// });



// $('#levelPrev').on('click', function () {

//     if (levelCurrentPage > 1) levelCurrentPage--;

//     levelTransFilter(true);

// });





function convertTimestamp(timestamp) {

    // Convert Unix timestamp (seconds) to milliseconds

    const date = new Date(timestamp * 1000);



    // Format the date

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

function addRow3(i, amount,fromAddress,level, description, timestamp, types) {

    let time=   convertTimestamp(timestamp);

    console.log("add row three timestamp",timestamp);

    let newamount = amount/ 1e18;

    newamount=  newamount.toFixed(4);

    let trx_type;

    if(types == 0){

       trx_type = "Direct Income";

     }else if(types == 1){

       trx_type = "Level Income";

     }else if(types == 2){

       trx_type = "Level Income";

     }

      const newRow = $('<tr>');

      newRow.append($('<td>').text(i));

      // newRow.append($('<td>').text(i));

      newRow.append($('<td>').text('$ '+ newamount ));

      //newRow.append($('<td>').text(fromAddress ));

      //newRow.append($('<td>').text(level ));

      // newRow.append($('<td>').text(types));

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



            // var nftBaseUrl = "https://blue-imperial-krill-606.mypinata.cloud/ipfs/";

            // var nftBaseUrl = await nft.methods.baseURI().call();

            var nftBaseUrl = '';

            //var nftTokenUri = await nft.methods.tokenURI(data[4]).call();

            var nftTokenUri = await token.methods.tokenURI(data[4]).call();

            // var nftTokenUri = "QmXBs5QpBMjvfkcvJR6xvppXAGoXUkr9JEMMhuAkC9js61/1.json";

            var nftJsonUrl = nftBaseUrl + nftTokenUri;

            var newRow = 'Loading...';

            if(data[4] > 0){

                $.getJSON(nftJsonUrl, function(nftData) {

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

                    if (transactionDay === currentDay && transactionMonth === currentMonth &&  transactionYear === currentYear) {  

                        $('.todayROI').empty();

                        $('.todayROI').append(newRow);

                    }

                    else{

                        $('.collectedROI').append(newRow);

                    }            

                    

                });

            }else{

                newRow = "Data not found... ";

            }

            

        }

    }

}



//level users



async function levelUsers(level) {

    const tbody = $('#data-table5 tbody');

    tbody.html('<tr><td colspan="8" class="text-center">Loading...</td></tr>');

    try {

        const account = await getCurrentAccount(); 

        const userExists = await mainContract.methods.isUserExists(account).call();



        if (!userExists) {

            alert("User does not exist.");

            return;

        }



        let currentLevelUsers = await mainContract.methods.partners(account).call(); 

        for (let i = 1; i < level; i++) {

            let nextLevelUsers = [];

            for (const user of currentLevelUsers) {

                const partners = await mainContract.methods.partners(user).call(); 

                nextLevelUsers = nextLevelUsers.concat(partners);

            }

            currentLevelUsers = nextLevelUsers; 

        }

        

        tbody.empty();



        if (currentLevelUsers.length == 0) {

            tbody.append(`<tr><td colspan="8" class="text-center">No users found for level ${level}.</td></tr>`);

            return;

        }



        let index = 1;

        for (const userAddress of currentLevelUsers) {

            const userData = await mainContract.methods.users(userAddress).call();

            // console.log(userData);

            const userDetails = await mainContract.methods.user_details(userAddress).call();

            // console.log(userDetails);



            addRow4(index++, userAddress, userData, userDetails, level);

        }

    } catch (error) {

        console.error("Error fetching level users:", error);

        alert("An error occurred while fetching users. Please try again.");

    }

}





async function addRow4(index, userAddress, userData, userDetails, level) {

    const referralCode = userData.referralCode;

    const amount = (userData.totalStaked / 1e18).toFixed(4); 

    let nrx_value = await getNRX(1);

    const amountNRX = amount/nrx_value;



    let totalTeambuisness = userDetails['totalTeambuisness']/1e18;

    let totalTeambuisness_nrx = totalTeambuisness/nrx_value;



    const fromAddress = userAddress.substring(0, 5) + "..." + userAddress.substring(39);

    //const dateTime =  convertTimestamp(timestamp);

    const type = userData.totalStaked > 0 ? 

        '<span style="color: #ffffff;" class="bg history0 nonSelect">Active</span>' : 

        '<span style="color: red;" class="bg history0 nonSelect">Inactive</span>';



    const newRow = $('<tr>');

    newRow.append($('<td>').text(index));

    newRow.append($('<td>').text(referralCode)); 

    // newRow.append($('<td>').html(`$ ${amount} ( NRX ${amountNRX.toFixed(4)} )`)); 

    newRow.append($('<td>').html(`NRX ${amount}`)); 

    newRow.append(

        $('<td>').html(`<a href="https://bscscan.com/address/${userAddress}" target="_blank" style="color:#fff">${fromAddress}</a>`)

    ); 

    // newRow.append($('<td>').html(`$ ${totalTeambuisness} ( NRX ${totalTeambuisness_nrx.toFixed(4)} )`)); 

    newRow.append($('<td>').html(`NRX ${totalTeambuisness}`)); 

    let userRank;

    if(userDetails['rank'] > 0){

        userRank = getUserRank(userDetails['rank']);

    }else{

        userRank = 'No Rank';

    }

    

    newRow.append($('<td>').text(userRank)); 

    newRow.append($('<td>').text(`Level ${level}`)); 

    //newRow.append($('<td>').text(dateTime)); 

    newRow.append($('<td>').html(type)); 



    $('#data-table5 tbody').append(newRow);

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

    const tbody = $('.transaction-table tbody');

    tbody.html('<tr><td colspan="5" class="text-center">Loading...</td></tr>');



    try {

        const account = await getCurrentAccount();

        console.log(account);

        const userExists = await mainContract.methods.isUserExists(account).call();



        if (!userExists) {

            tbody.html('<tr><td colspan="5" class="text-center">User not found.</td></tr>');

            return;

        }



        

        const { sumEarning, 1: transactions } = await mainContract.methods.getTransactionLogByType(account, txType).call();

        

        let filteredTransactions = Object.values(transactions); 

        tbody.empty();



        if (!transactions || transactions.length === 0) {

            tbody.html('<tr><td colspan="5" class="text-center">No withdraw history available.</td></tr>');

            return;

        }

        

        filteredTransactions.sort((a, b) => b.timestamp - a.timestamp);



        for (let i = 0; i < filteredTransactions.length; i++) {

            const tx = filteredTransactions[i];

            const date = new Date(tx.timestamp * 1000).toLocaleString();

            const amount = tx.amount / 1e18;

            let nrx_value = await getNRX(1);

            const amount_nrx = amount / nrx_value;

            let description;

            if(tx.txType == 0){

                description = "NRX";

            }else{

                description = "USDT";

            }

            const fromAddress = tx.fromAddress ;

            const shortAddress = fromAddress.substring(0, 5) + "..." + fromAddress.substring(fromAddress.length - 4);

            

            const row = `

                <tr>

                    <td>${i + 1}</td>

                    <td>${date}</td>

                    <td>${shortAddress}</td>

                    <td>$ ${amount.toFixed(4)} ( NRX ${amount_nrx.toFixed(4)} )</td>

                    <td>${description}</td>

                </tr>

            `;

            tbody.append(row);

        }



    } catch (error) {

        console.error('Error fetching withdraw history:', error);

        tbody.html('<tr><td colspan="4" class="text-center">Error loading data.</td></tr>');

    }

}



async function distribute_royalty(){

    account = await getCurrentAccount();

    if (account) {

        const user = await mainContract.methods.isUserExists(account).call();

        if (user) {

            const owner = await getContractOwner();

            if (owner !== account.toLowerCase()) {

                hideloader();

                toastr.error('Only owner can execute this function.');

                return;

            }

            let text = "Are you sure wants to distribute royalty ?  Press Ok to continue!";

            if (confirm(text) == true) {

                showloader();



                $('#cover').css('display', 'block');

                getGas().then((gasPrice) => {

                    mainContract.methods.distributeRoyalty().send({

                        from: account,

                        gasPrice: gasPrice

                    }).on("receipt", (function(e) {

                        toastr.success('Royalty distributed Successfully.');

                        hideloader();

                        setTimeout(function() {

                            window.location.reload(true);

                        }, 2000);

                    })).on("error", (function(e) {

                        hideloader();

                        toastr.error('Error');

                    }));

                }).catch((error) => {

                    hideloader();

                    toastr.error('Something went wrong from blockchain end.');

                });

            }

            else{

                hideloader();

            }

        } else {

            toastr.error('Account is not registered.');

        }

    } else {

        toastr.error('No dApp wallet connected.');

    }

}



async function getTotalStakingByTeam() {

    const account = await getCurrentAccount();

    if (!account) return toastr.error("No dApp wallet connected!");

    const isUserExists = await mainContract.methods.isUserExists(account).call();

    if (!isUserExists) return toastr.error("Connected wallet does not exist in system!");

    const all_partners = await getAllPartners(account);

    let totalType1 = 0;

    let totalType2 = 0;

    let total = 0;

    for (let partner of all_partners) {

        const stakingArray = await mainContract.methods.getUserStakingTransactions(partner).call();

        if (!Array.isArray(stakingArray)) continue;

        for (let staking of stakingArray) {



            const amount = Number(staking.tokenAmount || staking[3] || 0);

            const type = Number(staking.stakeType || staking[4] || 0);

            if (type === 1) totalType1 += amount;

            else if (type === 2) totalType2 += amount;

        }

    }

    let flexible_tokens = (totalType1/ 1e18);

    let staking_tokens = (totalType2/ 1e18);

    let nrx_value = await getNRX(1);

    let flexible_nrx = flexible_tokens / nrx_value;

    let staking_nrx = staking_tokens / nrx_value;

    

    $('.flexible_tokens').text(`$ ${flexible_tokens.toFixed(4)}`);

    $('.staking_tokens').text(`NRX ${staking_tokens.toFixed(4)}`);

    $('.flexible_nrx').text('( NRX '+flexible_nrx.toFixed(4)+' )');

    $('.staking_nrx').text('( NRX '+staking_nrx.toFixed(4)+' )');

}





async function getAllPartners(user) {

    const visited = new Set();

    const queue = [user];

    const allPartners = [];



    while (queue.length > 0) {

        const current = queue.shift();

        const directPartners = await mainContract.methods.partners(current).call();



        for (const p of directPartners) {

            if (!visited.has(p)) {

                visited.add(p);

                allPartners.push(p);

                queue.push(p);

            }

        }

    }



    return allPartners;

}



async function stakingRequest() {

  const tbody = $('#data-table tbody');

  tbody.html('<tr><td colspan="12" class="text-center">Loading...</td></tr>');



  try {

    const account = await getCurrentAccount();

    const isUser = await mainContract.methods.isUserExists(account).call();



    if (!isUser) {

      tbody.html('<tr><td colspan="12" class="text-center text-warning">User not found.</td></tr>');

      return;

    }



    const stakeList = await mainContract.methods

      .getAllUsersStakingTransactionsDesc()

      .call();

      console.log(stakeList)



    tbody.empty();



    const addresses = stakeList.userAddresses;

    const allResults = stakeList.allResults;



    if (!addresses.length) {

      tbody.html('<tr><td colspan="12" class="text-center text-warning">No records found.</td></tr>');

      return;

    }



    for (let i = 0; i < addresses.length; i++) {

      const userAccount = addresses[i];

      const userStakings = allResults[i];



      if (!userStakings || userStakings.length === 0) continue;



      const user = await mainContract.methods.users(userAccount).call();



      for (const staking of userStakings) {

        await stakingRequestRow(i, userAccount, user, staking);

      }

    }



  } catch (error) {

    console.error('Error loading stake list:', error.message);

    tbody.html('<tr><td colspan="12" class="text-center text-danger">Error loading data.</td></tr>');

  }

}



async function stakingRequestRow(i, userAccount, user, dataObject) {

    let nrx_value = await getNRX(1);

    const newRow = $('<tr>');

    // if (dataObject.id) {

    //     var id = dataObject.id;

    // }

    newRow.append($('<td>').html(i));

    newRow.append($('<td>').html(user.referralCode));

    const addressTd = $('<td>');

    const addressSpan = $('<span>').text(userAccount.slice(0,6)+'....'+userAccount.slice(-4)).css({

        'font-family': 'monospace',

        'margin-right': '8px'

    });

    const copyIcon = $('<i>')

        .addClass('fa fa-copy')

        .css({

            cursor: 'pointer',

            color: '#b0b3b8'

        })

        .attr('title', 'Copy address')

        .on('click', () => {

            navigator.clipboard.writeText(userAccount).then(() => {

                toastr.success(`Address copied successfully.`);

            }).catch(err => {

                console.error('Failed to copy: ', err);

            });

        });



    addressTd.append(addressSpan).append(copyIcon);

    newRow.append(addressTd);

    if (dataObject.amount) {

        let amts = dataObject.amount / 1000000000000000000;

        let amts_nrx = amts / nrx_value;

        // newRow.append($('<td>').html('$ '+amts.toFixed(4)+' ( NRX '+amts_nrx.toFixed(4)+' )'));

        newRow.append($('<td>').html('$ '+amts.toFixed(4)));

    }

    



    if (dataObject.monthlyNRX) {

        let amts1 = dataObject.monthlyNRX / 1000000000000000000;

        newRow.append($('<td>').text('NRX '+amts1.toFixed(4)));

    }

   



    if (dataObject.totalRoi) {

        let totalRoi = dataObject.totalRoi / 1000000000000000000;

        let totalRoi_nrx = totalRoi / nrx_value;

        // newRow.append($('<td>').text('$ '+totalRoi.toFixed(4)+' ( NRX '+totalRoi_nrx.toFixed(4)+' )'));

        newRow.append($('<td>').text('NRX '+totalRoi.toFixed(4)));

    }



    if (dataObject.goldPercent) {

        newRow.append($('<td>').text(dataObject.goldPercent));

    }

    if (dataObject.nrxPercent) {

        newRow.append($('<td>').text(dataObject.nrxPercent));

    }

    if (dataObject.nrxReserved) {

        let nrxReserved = dataObject.nrxReserved / 1000000000000000000;

        newRow.append($('<td>').text('NRX '+nrxReserved.toFixed(4)));

    }

    if (dataObject.roiPaidMonths) {

        newRow.append($('<td>').text(dataObject.roiPaidMonths));

    }

    if (dataObject.timestamp) {

        var date = new Date(dataObject.timestamp * 1000);

        var futureDate = new Date(date);

        futureDate.setDate(futureDate.getDate() + 249);



        var formattedDateTime = `${date.getFullYear()}-${padZero(date.getMonth() + 1)}-${padZero(date.getDate())} ${padZero(date.getHours())}:${padZero(date.getMinutes())}:${padZero(date.getSeconds())}`;



        var formattedFutureDate = `${futureDate.getFullYear()}-${padZero(futureDate.getMonth() + 1)}-${padZero(futureDate.getDate())} ${padZero(futureDate.getHours())}:${padZero(futureDate.getMinutes())}:${padZero(futureDate.getSeconds())}`;

        var today = new Date();

        var timeDifference = futureDate - today;

        var dayDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));



    } else {

        var formattedDateTime = '';

        var formattedFutureDate = '';

        var dayDifference = 0;

    }

    newRow.append($('<td>').text(formattedDateTime));

    let status;

    if(dataObject.approved == false){

        status = "<div class='badge badge-outline-warning'>Pending</div>";

    }else{

        status = "<div class='badge badge-outline-warning'>Approved</div>";

    }

    newRow.append($('<td>').html(status));



    let action;

    if (dataObject.approved) {

        action = "--";

    }else{

        action = `<button class='btn btn-sm btn-primary approve-staking-btn' data-id='${dataObject.id - 1}' data-account='${userAccount}'>Approve</button>`;

    }

     newRow.append($('<td>').html(action));

    $('#data-table tbody').append(newRow);

}



$(document).on('click', '.approve-staking-btn', async function () {

    const button = $(this);

    const id = button.data('id');

    const user = button.data('account');

    button.prop('disabled', true).text('Processing...');



    try {

        await handleStakeApproval(user,id);

        

    } catch (error) {

        console.error('Approval failed:', error);

        alert('Failed to Approve.');

        button.prop('disabled', false).text('Approve');

    }

});



async function handleStakeApproval(user, id) {

    try {

        account = await getCurrentAccount();

        owner = await getContractOwner();

        if (account.toLowerCase() == owner) {

            // console.log(user);

            const stakings = await mainContract.methods.getUserStakingTransactions(user).call();

            // console.log(stakings);

            

            let stakeIndex = parseInt(stakings.length - 1);

            // const stake = stakings[stakeIndex];

            // const stakeAmount = stake.amount;

            // console.log(stakeAmount)

            let text = `Are you sure to approve? Press Ok to continue!`;

            if (confirm(text)) {



                showloader();

                $('#cover').css('display', 'block');

                const gasPrice = await getGas();

                // console.log(stakeAmount);

                const MAX_UINT = '0xffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff';

                await tokenContract.methods.approve(main_contract,MAX_UINT).send({

                    from: account,

                    gasPrice: gasPrice

                })

                await mainContract.methods.approveStake(user, stakeIndex).send({

                    from: account,

                    gasPrice: gasPrice

                })

                .on("transactionHash", function(hash) {

                    console.log("Tx Hash:", hash);

                })

                .on("receipt", function(receipt) {

                    toastr.success(`Successfully approved.`);

                    setTimeout(() => {

                        window.location.href = 'index.php';

                    }, 2000);

                })

                .on("error", function(error) {

                    console.error(error);

                    toastr.error('Transaction failed or was rejected.');

                    hideloader();

                });



            } else {

                hideloader();

            }

            

        } else {

            toastr.error('Restricted Action. Only owner can access this function.');

        }

    } catch (error) {

        console.log(error.message);

        toastr.error('Something went wrong from the blockchain end.');

    } finally {

        $('#cover').css('display', 'none');

        hideloader();

    }

}



async function ownerWithdraw(){

    try {

        account = await getCurrentAccount();

        let withdrawAmount = $('#withdraw_amt').val();

        if (withdrawAmount <= 0) {

            toastr.error(`Invalid amount.`);

            return;

        }

        let owner = await getContractOwner();

        let toAddress = $('#to_address').val();

        if (toAddress == '') {

            toAddress = owner;

        }

        if (account.toLowerCase() == owner) {

                let tokenType = $('#withdraw_token').val();

                const valueString = '1000000000000000000';



                const tokenName = tokenType == 1 ? "USDT" : "NRX";

                let text = `Are you sure want to withdraw ${withdrawAmount}  ${tokenName}?  Press Ok to continue!`;

                if (confirm(text)) {

                    showloader(); 

                    $('#cover').css('display', 'block');

                    let withdraw_token_address; 

                    if(tokenType == 1){

                       withdraw_token_address = usdt_addr;

                    }else{

                       withdraw_token_address = token_contract;

                    } 

                    

                    let amts = new BigNumber(valueString).times(withdrawAmount);

                    const gasPrice = await getGas();

                    const amounts = amts.toString(10);

                    await mainContract.methods.OwnerWithdraw(withdraw_token_address, toAddress, amounts).send({

                        from: account,

                        gasPrice: gasPrice

                    });

                    



                    toastr.success(`Withdrawal of ${tokenName} done successfully`);

                    setTimeout(() => {

                        window.location.href = 'index.php';

                    }, 2000);

                } else {

                    hideloader();

                }

            

        } else {

            toastr.error('No dApp wallet connected.');

        }

    } catch (error) {

        console.log(error.message);

        toastr.error('Something went wrong from the blockchain end.');

    } finally {

        $('#cover').css('display', 'none');

        hideloader();

    }

}



getAccount();