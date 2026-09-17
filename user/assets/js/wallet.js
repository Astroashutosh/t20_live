/* =========================================================
   VeriStake — wallet.js
   Wallet connection + smart contract integration layer.
   Replace CONTRACT_ADDRESS / CONTRACT_ABI with your deployed
   values and this file is ready to talk to a live contract
   via ethers.js (https://docs.ethers.org).
   ========================================================= */

const VeriWallet = (() => {

  // ---- Contract configuration (placeholders — fill in for production) ----
  const NETWORK = {
    chainId: '0x38', // Binance Smart Chain mainnet (56). Use '0x61' for BSC testnet.
    chainName: 'BNB Smart Chain',
    nativeCurrency: { name: 'BNB', symbol: 'BNB', decimals: 18 },
    rpcUrls: ['https://bsc-dataseed.binance.org/'],
    blockExplorerUrls: ['https://bscscan.com/']
  };

  const CONTRACT_ADDRESS = '0x0000000000000000000000000000000000dEaD'; // TODO: replace with verified contract address
  const CONTRACT_ABI = [
    // TODO: paste the verified contract's ABI here, e.g.:
    // "function stake(uint256 amount) external",
    // "function withdraw(uint256 amount) external",
    // "function getUserInfo(address user) external view returns (uint256 staked, uint256 rewards)"
  ];

  let state = {
    address: null,
    chainId: null,
    connected: false
  };

  // ---- Core connection ----
  async function connectWallet() {
    if (typeof window.ethereum === 'undefined') {
      showToast('No wallet found', 'Install MetaMask or another Web3 wallet to continue.', 'warning');
      return null;
    }
    try {
      const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
      const chainId = await window.ethereum.request({ method: 'eth_chainId' });

      if (chainId !== NETWORK.chainId) {
        await switchToBSC();
      }

      state.address = accounts[0];
      state.chainId = chainId;
      state.connected = true;

      sessionStorage.setItem('veri_wallet_address', state.address);

      window.ethereum.on && window.ethereum.on('accountsChanged', (accs) => {
        if (!accs.length) { disconnectWallet(); } else { state.address = accs[0]; onAccountChange(accs[0]); }
      });

      return state.address;
    } catch (err) {
      console.error('Wallet connection failed:', err);
      showToast('Connection cancelled', 'Wallet connection was rejected or failed.', 'danger');
      return null;
    }
  }

  async function switchToBSC() {
    try {
      await window.ethereum.request({
        method: 'wallet_switchEthereumChain',
        params: [{ chainId: NETWORK.chainId }]
      });
    } catch (switchError) {
      if (switchError.code === 4902) {
        await window.ethereum.request({
          method: 'wallet_addEthereumChain',
          params: [NETWORK]
        });
      }
    }
  }

  function disconnectWallet() {
    state = { address: null, chainId: null, connected: false };
    sessionStorage.removeItem('veri_wallet_address');
    onAccountChange(null);
  }

  function onAccountChange(address) {
    document.dispatchEvent(new CustomEvent('veri:accountChanged', { detail: { address } }));
  }

  function getState() { return { ...state }; }

  function shortenAddress(addr) {
    if (!addr) return '';
    return `${addr.slice(0, 6)}...${addr.slice(-4)}`;
  }

  // ---- Placeholder: WalletConnect (requires @walletconnect/web3-provider bundle) ----
  async function connectWalletConnect() {
    showToast('WalletConnect', 'Add the WalletConnect provider bundle to enable this option.', 'warning');
    // Example integration once the bundle is included:
    // const provider = new WalletConnectProvider({ rpc: { 56: NETWORK.rpcUrls[0] } });
    // await provider.enable();
  }

  // ---- Placeholder: ethers.js contract instance ----
  function getContract() {
    if (typeof ethers === 'undefined') {
      console.warn('ethers.js not loaded — include the CDN script to enable contract calls.');
      return null;
    }
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    const signer = provider.getSigner();
    return new ethers.Contract(CONTRACT_ADDRESS, CONTRACT_ABI, signer);
  }

  // ---- Contract read/write placeholders (return dummy data until ABI is wired up) ----
  async function stake(amountBnb) {
    const contract = getContract();
    if (!contract) {
      await simulateDelay();
      return { success: true, txHash: fakeTxHash(), amount: amountBnb };
    }
    // const tx = await contract.stake(ethers.utils.parseEther(String(amountBnb)));
    // await tx.wait();
    // return { success: true, txHash: tx.hash, amount: amountBnb };
  }

  async function withdraw(amountBnb) {
    const contract = getContract();
    if (!contract) {
      await simulateDelay();
      return { success: true, txHash: fakeTxHash(), amount: amountBnb };
    }
    // const tx = await contract.withdraw(ethers.utils.parseEther(String(amountBnb)));
    // await tx.wait();
    // return { success: true, txHash: tx.hash, amount: amountBnb };
  }

  async function getUserData(address) {
    const contract = getContract();
    if (!contract) {
      await simulateDelay(400);
      return {
        userId: 'VS-' + address?.slice(2, 8).toUpperCase(),
        walletAddress: address,
        totalStaked: 4.85,
        totalEarnings: 0.612,
        referralBonus: 0.14,
        availableBalance: 0.752,
        totalWithdrawn: 1.2,
        directReferrals: 6,
        apy: 18.5,
        unlockDate: '2026-10-02'
      };
    }
    // const info = await contract.getUserInfo(address);
    // return { totalStaked: ethers.utils.formatEther(info.staked), ... };
  }

  async function getTransactions() {
    await simulateDelay(300);
    return null; // populated with dummy data directly in transactions.js
  }

  async function register(referralId, walletAddress) {
    await simulateDelay(900);
    return { success: true, userId: 'VS-' + walletAddress?.slice(2, 8).toUpperCase() };
  }

  async function login(walletAddress) {
    await simulateDelay(700);
    return { success: true, walletAddress };
  }

  // ---- Utilities ----
  function fakeTxHash() {
    const chars = '0123456789abcdef';
    let hash = '0x';
    for (let i = 0; i < 64; i++) hash += chars[Math.floor(Math.random() * 16)];
    return hash;
  }

  function simulateDelay(ms = 1200) {
    return new Promise((resolve) => setTimeout(resolve, ms));
  }

  function showToast(title, message, type = 'success') {
    document.dispatchEvent(new CustomEvent('veri:toast', { detail: { title, message, type } }));
  }

  return {
    connectWallet,
    connectWalletConnect,
    disconnectWallet,
    switchToBSC,
    getState,
    shortenAddress,
    stake,
    withdraw,
    getUserData,
    getTransactions,
    register,
    login,
    fakeTxHash,
    showToast,
    CONTRACT_ADDRESS
  };
})();
