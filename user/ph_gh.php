<?php include('header.php'); ?>

<style>
/* =========================================================
   PH / GH — PREMIUM DASHBOARD FRONTEND
   Frontend-only mock mode. No smart-contract dependency.
   ========================================================= */

.phgh-page{
    --phgh-neon:var(--neon,#27e09a);
    --phgh-blue:#7896ff;
    --phgh-purple:#a98cff;
    --phgh-gold:var(--gold,#d4af37);
    --phgh-muted:var(--text-secondary,#899794);
}

.phgh-hero{
    position:relative;
    overflow:hidden;
    padding:24px;
    border-radius:22px;
    margin-bottom:18px;
}
.phgh-hero:before{
    content:"";
    position:absolute;
    width:280px;height:280px;
    right:-100px;top:-160px;
    background:rgba(39,224,154,.12);
    filter:blur(50px);
    border-radius:50%;
    pointer-events:none;
}
.phgh-eyebrow{
    font-size:10px;
    letter-spacing:.16em;
    text-transform:uppercase;
    color:var(--phgh-neon);
    font-weight:800;
}
.phgh-title{
    font-size:26px;
    font-weight:800;
    margin:5px 0 4px;
}
.phgh-subtitle{
    color:var(--phgh-muted);
    font-size:13px;
    margin:0;
}
.phgh-mode{
    display:inline-flex;
    align-items:center;
    gap:7px;
    padding:8px 11px;
    border-radius:10px;
    border:1px solid rgba(39,224,154,.18);
    background:rgba(39,224,154,.06);
    color:var(--phgh-neon);
    font-size:10px;
    font-family:var(--font-mono,monospace);
}
.phgh-mode-dot{
    width:6px;height:6px;border-radius:50%;
    background:var(--phgh-neon);
    box-shadow:0 0 12px var(--phgh-neon);
}

/* Tabs */
.phgh-tabs{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:7px;
    padding:6px;
    border-radius:16px;
    margin-bottom:18px;
}
.phgh-tab{
    position:relative;
    border:0;
    background:transparent;
    color:var(--phgh-muted);
    border-radius:11px;
    padding:13px 15px;
    font-size:12px;
    font-weight:800;
    transition:.2s ease;
}
.phgh-tab:hover{color:#fff;background:rgba(255,255,255,.035)}
.phgh-tab.active.ph{
    color:var(--phgh-neon);
    background:rgba(39,224,154,.10);
    box-shadow:inset 0 0 0 1px rgba(39,224,154,.10);
}
.phgh-tab.active.gh{
    color:#9cb0ff;
    background:rgba(120,150,255,.10);
    box-shadow:inset 0 0 0 1px rgba(120,150,255,.10);
}
.phgh-tab .tab-count{
    display:inline-flex;
    min-width:21px;height:21px;
    padding:0 6px;
    align-items:center;justify-content:center;
    border-radius:20px;
    margin-left:7px;
    font:10px var(--font-mono,monospace);
    background:rgba(255,255,255,.07);
}

/* Stat cards */
.phgh-stat{
    padding:16px;
    height:100%;
    position:relative;
    overflow:hidden;
}
.phgh-stat:after{
    content:"";
    position:absolute;
    width:80px;height:80px;
    right:-30px;bottom:-35px;
    border-radius:50%;
    background:rgba(39,224,154,.08);
}
.phgh-stat.blue:after{background:rgba(120,150,255,.08)}
.phgh-stat.gold:after{background:rgba(212,175,55,.08)}
.phgh-stat__top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:10px;
}
.phgh-stat__icon{
    width:35px;height:35px;
    display:grid;place-items:center;
    border-radius:10px;
    color:var(--phgh-neon);
    background:rgba(39,224,154,.10);
}
.phgh-stat.blue .phgh-stat__icon{
    color:#9cb0ff;background:rgba(120,150,255,.10);
}
.phgh-stat.gold .phgh-stat__icon{
    color:var(--phgh-gold);background:rgba(212,175,55,.10);
}
.phgh-stat__label{
    color:var(--phgh-muted);
    font-size:10px;
    text-transform:uppercase;
    letter-spacing:.06em;
}
.phgh-stat__value{
    margin-top:10px;
    font-size:22px;
    font-weight:800;
    font-family:var(--font-mono,monospace);
}
.phgh-stat__hint{
    color:var(--phgh-muted);
    font-size:10px;
    margin-top:3px;
}

/* Section header */
.phgh-section-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:14px;
    margin-bottom:16px;
}
.phgh-section-title{
    display:flex;
    align-items:center;
    gap:11px;
}
.phgh-section-icon{
    width:42px;height:42px;
    display:grid;place-items:center;
    border-radius:12px;
    color:var(--phgh-neon);
    background:rgba(39,224,154,.10);
}
.phgh-section-icon.blue{
    color:#9cb0ff;background:rgba(120,150,255,.10);
}
.phgh-section-title h5{
    margin:0;
    font-size:15px;
    font-weight:800;
}
.phgh-section-title p{
    margin:3px 0 0;
    color:var(--phgh-muted);
    font-size:11px;
}
.phgh-counter{
    border:1px solid rgba(255,255,255,.08);
    background:rgba(255,255,255,.025);
    padding:7px 10px;
    border-radius:20px;
    font:10px var(--font-mono,monospace);
    white-space:nowrap;
}

/* Request cards */
.phgh-request{
    border:1px solid rgba(255,255,255,.07);
    background:linear-gradient(145deg,rgba(255,255,255,.035),rgba(255,255,255,.015));
    border-radius:16px;
    padding:16px;
    margin-bottom:10px;
    transition:.2s ease;
}
.phgh-request:hover{
    transform:translateY(-1px);
    border-color:rgba(39,224,154,.17);
    background:linear-gradient(145deg,rgba(39,224,154,.045),rgba(255,255,255,.015));
}
.phgh-request{
    position:relative;
}
.phgh-request:before{
    content:"";
    position:absolute;
    left:0;
    top:16px;
    bottom:16px;
    width:2px;
    border-radius:4px;
    background:linear-gradient(180deg,var(--phgh-neon),rgba(39,224,154,0));
    opacity:.75;
}
.phgh-request.gh-request:before{
    background:linear-gradient(180deg,#7896ff,rgba(120,150,255,0));
}

.phgh-request.gh-request:hover{
    border-color:rgba(120,150,255,.17);
    background:linear-gradient(145deg,rgba(120,150,255,.045),rgba(255,255,255,.015));
}
.phgh-request__top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:15px;
}
.phgh-request__id{
    font:10px var(--font-mono,monospace);
    color:var(--phgh-muted);
    margin-bottom:5px;
}
.phgh-request__amount{
    font-size:21px;
    font-weight:850;
    letter-spacing:-.02em;
}
.phgh-status{
    display:inline-flex;
    align-items:center;
    gap:5px;
    border-radius:20px;
    padding:5px 9px;
    font:9px var(--font-mono,monospace);
    color:var(--phgh-neon);
    background:rgba(39,224,154,.08);
}
.phgh-status:before{
    content:"";
    width:5px;height:5px;
    border-radius:50%;
    background:currentColor;
}
.phgh-status.processing{
    color:#f2c96d;background:rgba(242,201,109,.08);
}
.phgh-status.cancelled{
    color:#ff7f8b;background:rgba(255,127,139,.08);
}
.phgh-meta{
    display:flex;
    flex-wrap:wrap;
    gap:8px 18px;
    color:var(--phgh-muted);
    font-size:10px;
    margin-top:11px;
}
.phgh-meta span{
    display:inline-flex;
    align-items:center;
    gap:5px;
}
.phgh-request__actions{
    display:flex;
    justify-content:flex-end;
    align-items:center;
    gap:8px;
    margin-top:12px;
}
.phgh-request__actions .btn{
    flex:0 0 auto;
    width:auto;
    min-width:145px;
    padding:8px 13px;
    border-radius:10px;
    font-size:11px;
    font-weight:800;
    letter-spacing:.01em;
    position:relative;
    overflow:hidden;
    transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease;
}
.phgh-request__actions .btn:hover{
    transform:translateY(-1px);
    box-shadow:0 8px 24px rgba(39,224,154,.16);
}
.phgh-request__actions .btn:before{
    content:"";
    position:absolute;
    top:0;
    left:-120%;
    width:70%;
    height:100%;
    transform:skewX(-20deg);
    background:linear-gradient(90deg,transparent,rgba(255,255,255,.16),transparent);
    transition:left .45s ease;
}
.phgh-request__actions .btn:hover:before{
    left:140%;
}
.phgh-request__actions .btn i{
    position:relative;
    z-index:1;
}
.phgh-request__actions .btn span{
    position:relative;
    z-index:1;
}

/* Empty */
.phgh-empty{
    text-align:center;
    padding:44px 18px;
    color:var(--phgh-muted);
}
.phgh-empty__icon{
    width:58px;height:58px;
    display:grid;place-items:center;
    margin:0 auto 13px;
    border-radius:17px;
    color:#9cb0ff;
    background:rgba(120,150,255,.09);
    font-size:24px;
}
.phgh-empty h6{
    color:#fff;
    font-size:14px;
    margin-bottom:5px;
}
.phgh-empty p{
    font-size:11px;
    margin-bottom:16px;
}

/* Info strip */
.phgh-info{
    display:flex;
    align-items:center;
    gap:11px;
    padding:12px 14px;
    border-radius:13px;
    margin-top:14px;
    background:rgba(255,255,255,.022);
    border:1px solid rgba(255,255,255,.06);
    color:var(--phgh-muted);
    font-size:10px;
}
.phgh-info i{
    color:var(--phgh-neon);
    font-size:15px;
}

/* Modal */
.phgh-modal .modal-content{
    background:#0b1715;
    border:1px solid rgba(255,255,255,.10);
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 30px 100px rgba(0,0,0,.55);
}
.phgh-modal .modal-header{
    border-bottom:1px solid rgba(255,255,255,.07);
    padding:18px 20px;
}
.phgh-modal .modal-body{padding:20px}
.phgh-modal .modal-footer{
    border-top:1px solid rgba(255,255,255,.07);
    padding:14px 20px;
}
.phgh-modal-title{
    display:flex;align-items:center;gap:10px;
    font-size:15px;font-weight:800;
}
.phgh-modal-icon{
    width:36px;height:36px;
    display:grid;place-items:center;
    border-radius:10px;
    color:var(--phgh-neon);
    background:rgba(39,224,154,.10);
}
.phgh-modal-icon.blue{
    color:#9cb0ff;background:rgba(120,150,255,.10);
}
.phgh-confirm-box{
    border:1px solid rgba(255,255,255,.07);
    background:rgba(255,255,255,.025);
    border-radius:14px;
    padding:15px;
}
.phgh-confirm-row{
    display:flex;justify-content:space-between;gap:12px;
    color:var(--phgh-muted);
    font-size:11px;
    padding:5px 0;
}
.phgh-confirm-row strong{color:#fff;font-family:var(--font-mono,monospace)}
.phgh-amount-input{
    background:rgba(255,255,255,.035)!important;
    border:1px solid rgba(255,255,255,.09)!important;
    color:#fff!important;
    min-height:48px;
}
.phgh-amount-input:focus{
    border-color:rgba(120,150,255,.45)!important;
    box-shadow:0 0 0 .2rem rgba(120,150,255,.08)!important;
}
.phgh-demo-warning{
    padding:10px 12px;
    margin-top:12px;
    border-radius:10px;
    background:rgba(212,175,55,.06);
    border:1px solid rgba(212,175,55,.12);
    color:#cdbb80;
    font-size:10px;
}

/* Toast */
#phghToastWrap{
    position:fixed;
    right:20px;
    bottom:20px;
    z-index:99999;
    width:min(360px,calc(100vw - 30px));
}
.phgh-toast{
    display:flex;align-items:flex-start;gap:10px;
    padding:13px 14px;
    border-radius:13px;
    margin-top:8px;
    border:1px solid rgba(255,255,255,.09);
    background:#0d1b18;
    box-shadow:0 18px 45px rgba(0,0,0,.35);
    animation:phghToastIn .25s ease;
}
.phgh-toast i{font-size:16px;color:var(--phgh-neon)}
.phgh-toast.error i{color:#ff7f8b}
.phgh-toast__text{font-size:11px;color:#e9efed}
@keyframes phghToastIn{
    from{opacity:0;transform:translateY(10px)}
    to{opacity:1;transform:translateY(0)}
}

@media(max-width:767px){
    .phgh-hero{padding:18px}
    .phgh-title{font-size:22px}
    .phgh-section-head{align-items:flex-start}
    .phgh-request__top{gap:8px}
    .phgh-request__amount{font-size:18px}
    .phgh-meta{gap:7px 12px}
    .phgh-request__actions{
        justify-content:flex-start;
    }
    .phgh-request__actions .btn{
        min-width:0;
        width:auto;
    }
}

/* Screenshot-inspired GH table */
.phgh-gh-pro{
    border:1px solid rgba(32,227,154,.28);
    border-radius:20px;
    padding:20px;
    background:
        radial-gradient(circle at 92% 8%,rgba(32,227,154,.055),transparent 28%),
        linear-gradient(145deg,rgba(255,255,255,.018),rgba(255,255,255,.006));
}
.phgh-gh-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
    margin-bottom:18px;
}
.phgh-gh-heading{
    display:flex;
    align-items:center;
    gap:12px;
}
.phgh-gh-heading-icon{
    width:48px;height:48px;
    flex:0 0 48px;
    display:grid;place-items:center;
    border-radius:14px;
    color:#6f9aff;
    background:linear-gradient(145deg,rgba(123,147,255,.16),rgba(32,227,154,.055));
    border:1px solid rgba(123,147,255,.16);
    box-shadow:inset 0 0 20px rgba(123,147,255,.04);
}
.phgh-gh-heading h5{
    font-size:16px;
    margin:0 0 3px;
    font-weight:800;
}
.phgh-gh-heading p{
    margin:0;
    color:#7e8b89;
    font-size:10px;
}
.phgh-gh-head-right{
    display:flex;
    align-items:center;
    gap:9px;
}
.phgh-mini-stat{
    min-width:128px;
    padding:10px 13px;
    border-radius:12px;
    border:1px solid rgba(255,255,255,.07);
    background:rgba(255,255,255,.018);
}
.phgh-mini-stat small{
    display:block;
    color:#6d7977;
    font-size:8px;
    text-transform:uppercase;
    letter-spacing:.06em;
}
.phgh-mini-stat strong{
    display:block;
    margin-top:3px;
    font:800 13px var(--font-mono,monospace);
}
.phgh-mini-stat.pending strong{color:#e5bd57}
.phgh-create-btn{
    white-space:nowrap;
    min-height:42px;
    padding:0 17px!important;
    border-radius:11px!important;
    font-size:10px!important;
    font-weight:800!important;
}
.phgh-gh-table{
    width:100%;
}
.phgh-gh-table-head,
.phgh-gh-row{
    display:grid;
    grid-template-columns:1.05fr 1fr 1.15fr 1.15fr .9fr 120px;
    align-items:center;
    gap:14px;
}
.phgh-gh-table-head{
    padding:10px 15px;
    border:1px solid rgba(255,255,255,.055);
    border-radius:12px;
    background:rgba(255,255,255,.018);
    color:#697572;
    font:800 8px var(--font-mono,monospace);
    text-transform:uppercase;
    letter-spacing:.07em;
}
.phgh-gh-row{
    min-height:66px;
    margin-top:7px;
    padding:10px 15px;
    border:1px solid rgba(255,255,255,.065);
    border-radius:12px;
    background:linear-gradient(100deg,rgba(255,255,255,.018),rgba(255,255,255,.008));
    transition:.2s ease;
}
.phgh-gh-row:hover{
    transform:translateY(-1px);
    border-color:rgba(32,227,154,.18);
    box-shadow:0 8px 25px rgba(0,0,0,.12);
}
.phgh-gh-request strong{
    display:block;
    font-size:11px;
    font-weight:800;
}
.phgh-gh-request small{
    display:block;
    color:#5e6b68;
    font:8px var(--font-mono,monospace);
    margin-bottom:2px;
}
.phgh-gh-amount{
    display:flex;
    align-items:center;
    gap:8px;
    font:800 12px var(--font-mono,monospace);
}
.phgh-usdt{
    width:25px;height:25px;
    display:grid;place-items:center;
    border-radius:50%;
    color:#fff;
    background:linear-gradient(145deg,#27d9a0,#12966e);
    font-size:12px;
    font-weight:900;
}
.phgh-gh-wallet,
.phgh-gh-date{
    color:#a2adaa;
    font-size:9px;
}
.phgh-gh-wallet{
    display:flex;
    align-items:center;
    gap:7px;
}
.phgh-gh-wallet i{
    color:#7d8b88;
    font-size:12px;
}
.phgh-copy{
    border:0;
    background:transparent;
    color:#687673;
    padding:2px;
    cursor:pointer;
}
.phgh-copy:hover{color:#20e39a}
.phgh-gh-date strong{
    display:block;
    color:#aeb7b5;
    font-size:9px;
    font-weight:600;
}
.phgh-gh-date small{
    color:#65716e;
    font-size:8px;
}
.phgh-pending{
    width:max-content;
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:6px 9px;
    border-radius:20px;
    color:#e8bb50;
    border:1px solid rgba(232,187,80,.17);
    background:rgba(232,187,80,.055);
    font:800 8px var(--font-mono,monospace);
}
.phgh-pending:before{
    content:"";
    width:5px;height:5px;
    border-radius:50%;
    background:#e8bb50;
    box-shadow:0 0 7px rgba(232,187,80,.6);
}
.phgh-cancel{
    width:100%;
    min-width:0!important;
    padding:8px 10px!important;
    border-radius:9px!important;
    font-size:9px!important;
}
.phgh-gh-empty{
    padding:45px 20px;
    text-align:center;
    border:1px dashed rgba(255,255,255,.08);
    border-radius:13px;
    margin-top:8px;
}
.phgh-gh-empty i{
    display:grid;
    place-items:center;
    width:45px;height:45px;
    margin:0 auto 10px;
    border-radius:13px;
    color:#829cff;
    background:rgba(123,147,255,.08);
}
.phgh-gh-empty h6{
    font-size:12px;
    margin-bottom:4px;
}
.phgh-gh-empty p{
    color:#71807d;
    font-size:9px;
    margin:0;
}
@media(max-width:1050px){
    .phgh-gh-table-head,
    .phgh-gh-row{
        grid-template-columns:1fr 1fr 1.2fr 1fr 100px;
    }
    .phgh-gh-table-head span:nth-child(4),
    .phgh-gh-row > .phgh-gh-date{display:none}
}
@media(max-width:800px){
    .phgh-gh-head{align-items:flex-start;flex-direction:column}
    .phgh-gh-head-right{width:100%;flex-wrap:wrap}
    .phgh-gh-table-head{display:none}
    .phgh-gh-row{
        grid-template-columns:1fr 1fr;
        gap:9px;
        padding:13px;
    }
    .phgh-gh-row > .phgh-gh-date{display:block}
    .phgh-gh-row > .phgh-pending{justify-self:start}
    .phgh-cancel{width:auto!important;min-width:100px!important}
}
@media(max-width:520px){
    .phgh-gh-pro{padding:13px}
    .phgh-gh-head-right{display:grid;grid-template-columns:1fr 1fr}
    .phgh-mini-stat{min-width:0}
    .phgh-create-btn{grid-column:1/-1;width:100%}
    .phgh-gh-row{grid-template-columns:1fr}
}

</style>

<style>
/* =========================================================
   PH / GH — PROFESSIONAL FINANCE / WEB3 UI
   ========================================================= */
.phgh-page{
    --p-green:#20e39a;
    --p-green-soft:rgba(32,227,154,.09);
    --p-blue:#7b93ff;
    --p-blue-soft:rgba(123,147,255,.09);
    --p-line:rgba(255,255,255,.075);
    --p-muted:#82908d;
}
.phgh-hero-pro{
    position:relative;
    overflow:hidden;
    border-radius:20px;
    padding:22px;
    margin-bottom:14px;
}
.phgh-hero-pro:after{
    content:"";
    position:absolute;
    width:360px;height:180px;
    right:-90px;top:-90px;
    background:radial-gradient(circle,rgba(32,227,154,.12),transparent 68%);
    pointer-events:none;
}
.phgh-hero-title{
    display:flex;
    align-items:center;
    gap:12px;
}
.phgh-hero-icon{
    width:44px;height:44px;
    display:grid;place-items:center;
    border-radius:13px;
    color:var(--p-green);
    background:var(--p-green-soft);
    border:1px solid rgba(32,227,154,.12);
    font-size:18px;
}
.phgh-kicker{
    color:var(--p-green);
    font:800 9px var(--font-mono,monospace);
    letter-spacing:.14em;
    text-transform:uppercase;
}
.phgh-hero-title h1{
    font-size:22px;
    font-weight:800;
    margin:2px 0 0;
}
.phgh-hero-copy{
    color:var(--p-muted);
    font-size:11px;
    margin:9px 0 0 56px;
}
.phgh-demo{
    position:relative;
    z-index:2;
    display:flex;
    align-items:center;
    gap:7px;
    border:1px solid rgba(255,255,255,.08);
    background:rgba(255,255,255,.025);
    border-radius:10px;
    padding:8px 10px;
    color:#aeb9b6;
    font:9px var(--font-mono,monospace);
}
.phgh-demo i{color:var(--p-green)}
.phgh-switch{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:15px;
    padding:5px;
    margin-bottom:14px;
    border-radius:14px;
}
.phgh-switch-buttons{
    display:flex;
    gap:4px;
}
.phgh-switch-btn{
    border:0;
    padding:10px 17px;
    border-radius:10px;
    color:var(--p-muted);
    background:transparent;
    font-size:11px;
    font-weight:800;
    transition:.2s;
}
.phgh-switch-btn:hover{color:#fff}
.phgh-switch-btn.active.ph{
    color:var(--p-green);
    background:var(--p-green-soft);
}
.phgh-switch-btn.active.gh{
    color:#9badff;
    background:var(--p-blue-soft);
}
.phgh-switch-meta{
    color:var(--p-muted);
    font:9px var(--font-mono,monospace);
    padding-right:8px;
}
.phgh-metrics{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:10px;
    margin-bottom:14px;
}
.phgh-metric{
    padding:14px 15px;
    border-radius:15px;
    position:relative;
    overflow:hidden;
}
.phgh-metric__label{
    color:var(--p-muted);
    font-size:9px;
    text-transform:uppercase;
    letter-spacing:.07em;
}
.phgh-metric__value{
    font:800 20px var(--font-mono,monospace);
    margin-top:7px;
}
.phgh-metric__bottom{
    display:flex;
    align-items:center;
    gap:6px;
    color:var(--p-muted);
    font-size:9px;
    margin-top:3px;
}
.phgh-metric__icon{
    position:absolute;
    right:13px;top:13px;
    width:31px;height:31px;
    border-radius:9px;
    display:grid;place-items:center;
    color:var(--p-green);
    background:var(--p-green-soft);
}
.phgh-metric.blue .phgh-metric__icon{
    color:#9badff;background:var(--p-blue-soft);
}
.phgh-metric.gold .phgh-metric__icon{
    color:#d8b968;background:rgba(216,185,104,.09);
}
.phgh-workspace{
    padding:17px;
    border-radius:18px;
}
.phgh-workspace-head{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
    margin-bottom:13px;
}
.phgh-workspace-title{
    display:flex;
    align-items:center;
    gap:10px;
}
.phgh-workspace-icon{
    width:36px;height:36px;
    border-radius:10px;
    display:grid;place-items:center;
    color:var(--p-green);
    background:var(--p-green-soft);
}
.phgh-workspace-icon.blue{
    color:#9badff;background:var(--p-blue-soft);
}
.phgh-workspace-title h5{
    margin:0;
    font-size:13px;
    font-weight:800;
}
.phgh-workspace-title p{
    margin:2px 0 0;
    color:var(--p-muted);
    font-size:9px;
}
.phgh-cap{
    padding:6px 9px;
    border-radius:8px;
    background:rgba(255,255,255,.025);
    border:1px solid var(--p-line);
    color:var(--p-muted);
    font:9px var(--font-mono,monospace);
}
.phgh-list-head{
    display:grid;
    grid-template-columns:1.05fr 1.05fr 1fr 1fr 145px;
    gap:12px;
    padding:0 13px 8px;
    color:#5f6c69;
    font:8px var(--font-mono,monospace);
    text-transform:uppercase;
    letter-spacing:.07em;
}
.phgh-order{
    display:grid;
    grid-template-columns:1.05fr 1.05fr 1fr 1fr 145px;
    align-items:center;
    gap:12px;
    min-height:72px;
    padding:11px 13px;
    margin-bottom:7px;
    border-radius:13px;
    border:1px solid var(--p-line);
    background:linear-gradient(100deg,rgba(255,255,255,.025),rgba(255,255,255,.012));
    transition:.2s;
}
.phgh-order:hover{
    transform:translateY(-1px);
    border-color:rgba(32,227,154,.18);
    background:linear-gradient(100deg,rgba(32,227,154,.035),rgba(255,255,255,.012));
}
.phgh-order-main small{
    display:block;
    color:#64716e;
    font:8px var(--font-mono,monospace);
    margin-bottom:3px;
}
.phgh-order-main strong{
    font-size:15px;
    font-weight:800;
}
.phgh-order-text{
    color:#a8b2af;
    font-size:10px;
}
.phgh-order-text i{
    color:#64716e;
    margin-right:5px;
}
.phgh-order-date{
    color:#a8b2af;
    font-size:10px;
}
.phgh-order-date small{
    display:block;
    color:#64716e;
    font-size:8px;
    margin-top:2px;
}
.phgh-state{
    width:max-content;
    display:inline-flex;
    align-items:center;
    gap:5px;
    padding:5px 8px;
    border-radius:20px;
    color:var(--p-green);
    background:var(--p-green-soft);
    font:800 8px var(--font-mono,monospace);
}
.phgh-state:before{
    content:"";
    width:4px;height:4px;
    border-radius:50%;
    background:currentColor;
    box-shadow:0 0 8px currentColor;
}
.phgh-action{
    display:flex;
    justify-content:flex-end;
}
.phgh-action .btn{
    min-width:124px;
    width:auto;
    padding:8px 11px;
    border-radius:9px;
    font-size:10px;
    font-weight:800;
    box-shadow:none;
}
.phgh-action .btn:hover{
    transform:translateY(-1px);
    box-shadow:0 8px 20px rgba(32,227,154,.15);
}
.phgh-info-pro{
    display:flex;
    align-items:center;
    gap:8px;
    padding-top:10px;
    color:#65716e;
    font-size:9px;
}
.phgh-info-pro i{color:var(--p-green)}
.phgh-gh-grid{
    display:grid;
    grid-template-columns:1.3fr .7fr;
    gap:12px;
}
.phgh-gh-create{
    display:flex;
    flex-direction:column;
    justify-content:center;
    min-height:170px;
    padding:18px;
    border-radius:15px;
    border:1px solid rgba(123,147,255,.12);
    background:linear-gradient(145deg,rgba(123,147,255,.045),rgba(255,255,255,.012));
}
.phgh-gh-create h6{
    font-size:14px;
    margin:0 0 5px;
}
.phgh-gh-create p{
    color:var(--p-muted);
    font-size:10px;
    margin:0 0 14px;
}
.phgh-empty-pro{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    min-height:170px;
    text-align:center;
    padding:20px;
    border-radius:15px;
    border:1px dashed rgba(255,255,255,.09);
}
.phgh-empty-pro__icon{
    width:43px;height:43px;
    display:grid;place-items:center;
    border-radius:12px;
    color:#9badff;
    background:var(--p-blue-soft);
    margin-bottom:9px;
}
.phgh-empty-pro h6{
    color:#fff;
    font-size:12px;
    margin-bottom:4px;
}
.phgh-empty-pro p{
    color:var(--p-muted);
    font-size:9px;
    margin-bottom:11px;
}
.phgh-modal-pro .modal-content{
    background:#0b1715;
    border:1px solid rgba(255,255,255,.09);
    border-radius:18px;
}
.phgh-modal-pro .modal-header,
.phgh-modal-pro .modal-footer{
    border-color:rgba(255,255,255,.07);
}
.phgh-modal-pro .modal-title{
    font-size:14px;font-weight:800;
}
.phgh-modal-pro .modal-body{padding:18px}
.phgh-review{
    padding:13px;
    border-radius:12px;
    background:rgba(255,255,255,.025);
    border:1px solid var(--p-line);
}
.phgh-review-row{
    display:flex;
    justify-content:space-between;
    gap:12px;
    padding:5px 0;
    color:var(--p-muted);
    font-size:10px;
}
.phgh-review-row strong{
    color:#fff;
    font:800 10px var(--font-mono,monospace);
}
.phgh-note-pro{
    margin-top:10px;
    padding:9px 11px;
    border-radius:9px;
    background:rgba(216,185,104,.05);
    border:1px solid rgba(216,185,104,.10);
    color:#b9aa7d;
    font-size:9px;
}
@media(max-width:900px){
    .phgh-list-head{display:none}
    .phgh-order{
        grid-template-columns:1fr 1fr;
        gap:10px;
    }
    .phgh-action{justify-content:flex-start}
}
@media(max-width:650px){
    .phgh-metrics{grid-template-columns:1fr}
    .phgh-switch{align-items:stretch;flex-direction:column}
    .phgh-switch-meta{padding:3px 8px 6px}
    .phgh-switch-buttons{width:100%}
    .phgh-switch-btn{flex:1}
    .phgh-order{grid-template-columns:1fr 1fr}
    .phgh-order > :nth-child(4){display:none}
    .phgh-action .btn{min-width:110px}
    .phgh-gh-grid{grid-template-columns:1fr}
    .phgh-hero-copy{margin-left:0}
}
</style>

<style>

/* =========================================================
   MOBILE GH REQUESTS — 2 COLUMN PREMIUM LAYOUT
   ========================================================= */
@media (max-width: 650px){

    /* Keep the GH workspace comfortable on mobile */
    .phgh-gh-pro{
        padding:12px !important;
    }

    /* Header remains compact */
    .phgh-gh-head{
        gap:12px !important;
    }

    .phgh-gh-head-right{
        width:100%;
        display:grid !important;
        grid-template-columns:1fr 1fr;
        gap:7px !important;
    }

    .phgh-mini-stat{
        min-width:0 !important;
        padding:8px 9px !important;
    }

    .phgh-create-btn{
        grid-column:1 / -1;
        width:100%;
        min-height:38px !important;
    }

    /* Hide desktop table heading on mobile */
    .phgh-gh-table-head{
        display:none !important;
    }

    /* Each GH request is now a 2-column card */
    .phgh-gh-row{
        display:grid !important;
        grid-template-columns:minmax(0,1fr) minmax(0,1fr) !important;
        gap:8px !important;
        min-height:0 !important;
        padding:11px !important;
        margin-top:8px !important;
        border-radius:13px !important;
        align-items:center !important;
    }

    /* Request + amount */
    .phgh-gh-row > .phgh-gh-request{
        grid-column:1;
        grid-row:1;
    }

    .phgh-gh-row > .phgh-gh-amount{
        grid-column:2;
        grid-row:1;
        justify-content:flex-end;
        white-space:nowrap;
    }

    /* Wallet + date */
    .phgh-gh-row > .phgh-gh-wallet{
        grid-column:1;
        grid-row:2;
        min-width:0;
    }

    .phgh-gh-row > .phgh-gh-date{
        grid-column:2 !important;
        grid-row:2;
        display:block !important;
        text-align:right;
        min-width:0;
    }

    /* Status + action */
    .phgh-gh-row > :nth-child(5){
        grid-column:1;
        grid-row:3;
    }

    .phgh-gh-row > :nth-child(6){
        grid-column:2;
        grid-row:3;
        display:flex;
        justify-content:flex-end;
    }

    .phgh-gh-row .phgh-gh-request small{
        font-size:7px;
        margin-bottom:2px;
    }

    .phgh-gh-row .phgh-gh-request strong{
        font-size:12px;
    }

    .phgh-gh-row .phgh-gh-amount{
        font-size:10px;
        gap:5px;
    }

    .phgh-gh-row .phgh-usdt{
        width:21px;
        height:21px;
        font-size:10px;
    }

    .phgh-gh-row .phgh-gh-wallet{
        font-size:8px;
        overflow:hidden;
    }

    .phgh-gh-row .phgh-gh-wallet span{
        overflow:hidden;
        text-overflow:ellipsis;
        white-space:nowrap;
    }

    .phgh-gh-row .phgh-gh-date strong{
        font-size:8px;
        white-space:nowrap;
    }

    .phgh-gh-row .phgh-gh-date small{
        font-size:7px;
    }

    .phgh-pending{
        padding:5px 7px !important;
        font-size:7px !important;
    }

    .phgh-cancel{
        width:auto !important;
        min-width:92px !important;
        padding:7px 9px !important;
        font-size:8px !important;
    }
}

/* Very narrow phones: still keep exactly two columns */
@media (max-width: 380px){
    .phgh-gh-pro{
        padding:9px !important;
    }

    .phgh-gh-row{
        gap:6px !important;
        padding:9px !important;
    }

    .phgh-gh-row .phgh-gh-amount{
        font-size:9px;
    }

    .phgh-gh-row .phgh-gh-wallet{
        font-size:7px;
    }

    .phgh-cancel{
        min-width:82px !important;
        padding:6px 7px !important;
    }
}

</style>

<div class="dash-main phgh-page">

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
                <span class="connected_walletdash">0x7A...92F1</span>
            </span>
        </div>
    </div>

    <div class="dash-content">

        <div class="glass-card phgh-hero-pro dash-reveal">
            <div class="d-flex justify-content-between align-items-center gap-3">
                <div>
                    <div class="phgh-hero-title">
                        <div class="phgh-hero-icon"><i class="bi bi-arrow-left-right"></i></div>
                        <div>
                            <div class="phgh-kicker">Community Finance</div>
                            <h1>Help Exchange</h1>
                        </div>
                    </div>
                    <p class="phgh-hero-copy">
                        Provide liquidity to active members or create a request when you need support.
                    </p>
                </div>
                <div class="phgh-demo">
                    <i class="bi bi-lightning-charge-fill"></i>
                    FRONTEND PREVIEW
                </div>
            </div>
        </div>

        <div class="glass-card phgh-switch dash-reveal">
            <div class="phgh-switch-buttons">
                <button id="phTab" class="phgh-switch-btn ph active" onclick="PHGH_PRO.showTab('ph')">
                    <i class="bi bi-arrow-up-right-circle me-1"></i>
                    Provide Help
                    <span class="ms-1" id="tabPhCount">5</span>
                </button>
                <button id="ghTab" class="phgh-switch-btn gh" onclick="PHGH_PRO.showTab('gh')">
                    <i class="bi bi-arrow-down-left-circle me-1"></i>
                    Get Help
                    <span class="ms-1" id="tabGhCount">0</span>
                </button>
            </div>
            <div class="phgh-switch-meta">
                <i class="bi bi-shield-check me-1"></i>Secure demo state
            </div>
        </div>

        <section id="phPage">

            <div class="phgh-metrics">
                <div class="glass-card phgh-metric dash-reveal">
                    <div class="phgh-metric__label">Active PH</div>
                    <div class="phgh-metric__value" id="proPhActive">5</div>
                    <div class="phgh-metric__bottom"><i class="bi bi-circle-fill" style="font-size:4px;color:var(--p-green)"></i> Available now</div>
                    <div class="phgh-metric__icon"><i class="bi bi-layers"></i></div>
                </div>
                <div class="glass-card phgh-metric blue dash-reveal">
                    <div class="phgh-metric__label">Open Volume</div>
                    <div class="phgh-metric__value" id="proPhVolume">1,300</div>
                    <div class="phgh-metric__bottom">USDT active pool</div>
                    <div class="phgh-metric__icon"><i class="bi bi-wallet2"></i></div>
                </div>
                <div class="glass-card phgh-metric gold dash-reveal">
                    <div class="phgh-metric__label">Completed by You</div>
                    <div class="phgh-metric__value" id="proPhHandled">0</div>
                    <div class="phgh-metric__bottom">Frontend activity</div>
                    <div class="phgh-metric__icon"><i class="bi bi-check2-circle"></i></div>
                </div>
            </div>

            <div class="glass-card phgh-workspace dash-reveal">
                <div class="phgh-workspace-head">
                    <div class="phgh-workspace-title">
                        <div class="phgh-workspace-icon"><i class="bi bi-list-check"></i></div>
                        <div>
                            <h5>Available Provide Help</h5>
                            <p>Review an opportunity and choose an amount to support.</p>
                        </div>
                    </div>
                    <div class="phgh-cap" id="phCounter">5 / 5</div>
                </div>

                <div class="phgh-list-head">
                    <span>Request</span>
                    <span>Recipient</span>
                    <span>Created</span>
                    <span>Status</span>
                    <span></span>
                </div>

                <div id="phList"></div>

                <div class="phgh-info-pro">
                    <i class="bi bi-info-circle"></i>
                    <span>Demo mode: confirming an action updates only local frontend state. No token transfer occurs.</span>
                </div>
            </div>
        </section>

        <section id="ghPage" style="display:none;">

    <div class="phgh-gh-pro dash-reveal">

        <div class="phgh-gh-head">

            <div class="phgh-gh-heading">
                <div class="phgh-gh-heading-icon">
                    <i class="bi bi-wallet2"></i>
                </div>

                <div>
                    <h5>My Get Help Requests</h5>
                    <p>Track your Get Help requests and manage them here.</p>
                </div>
            </div>

            <div class="phgh-gh-head-right">

                <div class="phgh-mini-stat">
                    <small>Total Requests</small>
                    <strong id="proGhCount">0</strong>
                </div>

                <div class="phgh-mini-stat pending">
                    <small>Pending Amount</small>
                    <strong><span id="proGhPending">0</span> USDT</strong>
                </div>

                <div class="phgh-mini-stat">
                    <small>Received Amount</small>
                    <strong id="proGhReceived">0 USDT</strong>
                </div>

                <button type="button"
                        class="btn btn-veri-primary phgh-create-btn"
                        onclick="PHGH_PRO.openGhModal()">
                    <i class="bi bi-plus-circle me-1"></i>
                    Create Request
                </button>

            </div>
        </div>

        <div class="phgh-gh-table">

            <div class="phgh-gh-table-head">
                <span>Request</span>
                <span>Amount</span>
                <span>Wallet Address</span>
                <span>Created Date</span>
                <span>Status</span>
                <span>Action</span>
            </div>

            <div id="ghList"></div>

            <div id="ghEmpty" class="phgh-gh-empty">
                <i class="bi bi-inbox"></i>
                <h6>No active Get Help request</h6>
                <p>Create a request to receive funds from the community.</p>
            </div>

        </div>

        <div class="phgh-info-pro">
            <i class="bi bi-shield-check"></i>
            <span>Frontend preview mode. Requests are stored locally; no blockchain transaction is performed.</span>
        </div>

    </div>

</section>

<div class="modal fade phgh-modal-pro" id="proPhModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-3 px-md-4 py-3">
                <h5 class="modal-title">
                    <i class="bi bi-shield-check me-2" style="color:var(--p-green)"></i>
                    Review Provide Help
                </h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="phgh-review">
                    <div class="phgh-review-row"><span>Request</span><strong id="proConfirmId">—</strong></div>
                    <div class="phgh-review-row"><span>Amount</span><strong id="proConfirmAmount">—</strong></div>
                    <div class="phgh-review-row"><span>Recipient</span><strong id="proConfirmWallet">—</strong></div>
                    <div class="phgh-review-row"><span>Status</span><strong style="color:var(--p-green)">PENDING</strong></div>
                </div>
                <div class="phgh-note-pro">
                    <i class="bi bi-info-circle me-1"></i>
                    Preview only. No blockchain transaction or wallet approval is performed.
                </div>
            </div>
            <div class="modal-footer px-3 px-md-4 py-2">
                <button class="btn btn-veri-outline btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-veri-primary btn-sm" id="proConfirmBtn">
                    <i class="bi bi-check2 me-1"></i>Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade phgh-modal-pro" id="proGhModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-3 px-md-4 py-3">
                <h5 class="modal-title">
                    <i class="bi bi-arrow-down-left-circle me-2" style="color:#9badff"></i>
                    Create Get Help Request
                </h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="proGhForm">
                <div class="modal-body">
                    <label class="small text-secondary mb-1">Requested amount</label>
                    <div class="input-group">
                        <input id="proGhAmount" type="number" min="1" step=".01"
                               class="form-control form-veri" placeholder="0.00" required>
                        <span class="input-group-text form-veri">USDT</span>
                    </div>
                    <div class="phgh-note-pro">
                        <i class="bi bi-lightning-charge me-1"></i>
                        Frontend demo mode — the request is stored in localStorage.
                    </div>
                </div>
                <div class="modal-footer px-3 px-md-4 py-2">
                    <button type="button" class="btn btn-veri-outline btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-veri-primary btn-sm" type="submit">
                        <i class="bi bi-plus-circle me-1"></i>Create Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="phghProToast"></div>

<?php include('footer.php'); ?>

<script>
(function(){
    const KEY = 'phgh_professional_demo_v1';

    const DEFAULT = {
        ph:[
            {id:'PH-1025',amount:100,wallet:'0x7A...92F1',time:'11 Sep, 2026 · 04:35 PM',status:'PENDING'},
            {id:'PH-1024',amount:250,wallet:'0x31...8AC2',time:'11 Sep, 2026 · 04:10 PM',status:'PENDING'},
            {id:'PH-1023',amount:500,wallet:'0x91...4BD7',time:'11 Sep, 2026 · 03:52 PM',status:'PENDING'},
            {id:'PH-1022',amount:150,wallet:'0x52...11AC',time:'11 Sep, 2026 · 03:30 PM',status:'PENDING'},
            {id:'PH-1021',amount:300,wallet:'0x88...73DE',time:'11 Sep, 2026 · 03:12 PM',status:'PENDING'}
        ],
        gh:[]
    };

    let state = load();
    let selected = null;

    function load(){
        try{
            const saved = JSON.parse(localStorage.getItem(KEY));
            if(saved && Array.isArray(saved.ph) && Array.isArray(saved.gh)) return saved;
        }catch(e){}
        return JSON.parse(JSON.stringify(DEFAULT));
    }

    function save(){
        localStorage.setItem(KEY, JSON.stringify(state));
    }

    function esc(v){
        return String(v).replace(/[&<>"']/g, function(c){
            return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[c];
        });
    }

    function money(v){
        return Number(v || 0).toLocaleString(undefined,{maximumFractionDigits:2});
    }

    function toast(message,error){
        const box=document.getElementById('phghProToast');
        if(!box) return;

        box.style.cssText='position:fixed;right:18px;bottom:18px;z-index:99999;width:min(340px,calc(100vw - 30px));';

        const el=document.createElement('div');
        el.style.cssText='margin-top:8px;padding:11px 13px;border-radius:11px;border:1px solid rgba(255,255,255,.08);background:#0c1916;color:#eaf0ee;font-size:10px;box-shadow:0 16px 40px rgba(0,0,0,.35);transition:.2s;';

        el.innerHTML='<i class="bi '+(error?'bi-exclamation-circle':'bi-check-circle')+'" style="color:'+(error?'#ff7f8b':'#20e39a')+';margin-right:7px"></i>'+esc(message);

        box.appendChild(el);

        setTimeout(function(){
            el.style.opacity='0';
            setTimeout(function(){ el.remove(); },220);
        },2600);
    }

    function renderPH(){
        const list=document.getElementById('phList');
        if(!list) return;

        const active=state.ph.filter(function(x){
            return x.status==='PENDING';
        }).slice(0,5);

        const volume=active.reduce(function(sum,x){
            return sum+Number(x.amount||0);
        },0);

        const handled=state.ph.filter(function(x){
            return x.status==='COMPLETED';
        }).length;

        document.getElementById('proPhActive').textContent=active.length;
        document.getElementById('proPhVolume').textContent=money(volume);
        document.getElementById('proPhHandled').textContent=handled;
        document.getElementById('phCounter').textContent=active.length+' / 5';
        document.getElementById('tabPhCount').textContent=active.length;

        if(!active.length){
            list.innerHTML=`
                <div class="phgh-empty-pro">
                    <div class="phgh-empty-pro__icon">
                        <i class="bi bi-check2-circle"></i>
                    </div>
                    <h6>No active Provide Help</h6>
                    <p>All currently available requests have been handled.</p>
                </div>`;
            return;
        }

        list.innerHTML=active.map(function(x){
            const parts=String(x.time).split('·');
            const date=parts[0] ? parts[0].trim() : x.time;
            const time=parts[1] ? parts[1].trim() : '';

            return `
                <div class="phgh-order">
                    <div class="phgh-order-main">
                        <small>REQUEST #${esc(x.id)}</small>
                        <strong>${money(x.amount)} USDT</strong>
                    </div>

                    <div class="phgh-order-text">
                        <i class="bi bi-wallet2"></i>${esc(x.wallet)}
                    </div>

                    <div class="phgh-order-date">
                        ${esc(date)}
                        <small>${esc(time)}</small>
                    </div>

                    <div>
                        <span class="phgh-state">${esc(x.status)}</span>
                    </div>

                    <div class="phgh-action">
                        <button type="button"
                                class="btn btn-veri-primary"
                                onclick="PHGH_PRO.openPh('${esc(x.id)}')">
                            <i class="bi bi-hand-thumbs-up me-1"></i>
                            Provide Help
                            <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </div>
                </div>`;
        }).join('');
    }

    function renderGH(){
        const list=document.getElementById('ghList');
        const empty=document.getElementById('ghEmpty');
        if(!list || !empty) return;

        const active=state.gh.filter(function(x){
            return x.status==='PENDING';
        });

        const pending=active.reduce(function(sum,x){
            return sum+Number(x.amount||0);
        },0);

        const received=state.gh.filter(function(x){
            return x.status==='RECEIVED';
        }).reduce(function(sum,x){
            return sum+Number(x.amount||0);
        },0);

        document.getElementById('proGhCount').textContent=state.gh.length;
        document.getElementById('proGhPending').textContent=money(pending);
        document.getElementById('proGhReceived').textContent=money(received)+' USDT';
        document.getElementById('tabGhCount').textContent=active.length;

        if(!active.length){
            list.innerHTML='';
            empty.style.display='block';
            return;
        }

        empty.style.display='none';

        list.innerHTML=active.map(function(x){
            const parts=String(x.time).split('·');
            const date=parts[0] ? parts[0].trim() : x.time;
            const time=parts[1] ? parts[1].trim() : '';

            return `
                <div class="phgh-gh-row">

                    <div class="phgh-gh-request">
                        <small>REQUEST</small>
                        <strong>#${esc(x.id)}</strong>
                    </div>

                    <div class="phgh-gh-amount">
                        <span class="phgh-usdt">₮</span>
                        ${money(x.amount)} USDT
                    </div>

                    <div class="phgh-gh-wallet">
                        <i class="bi bi-wallet2"></i>
                        <span>${esc('0x7A...92F1')}</span>
                        <button type="button"
                                class="phgh-copy"
                                onclick="PHGH_PRO.copyWallet('0x7A...92F1')"
                                title="Copy wallet">
                            <i class="bi bi-copy"></i>
                        </button>
                    </div>

                    <div class="phgh-gh-date">
                        <strong><i class="bi bi-calendar3 me-1"></i>${esc(date)}</strong>
                        <small>${esc(time)}</small>
                    </div>

                    <div>
                        <span class="phgh-pending">${esc(x.status)}</span>
                    </div>

                    <div>
                        <button type="button"
                                class="btn btn-veri-outline phgh-cancel"
                                onclick="PHGH_PRO.cancelGh('${esc(x.id)}')">
                            <i class="bi bi-x-circle me-1"></i>Cancel
                        </button>
                    </div>

                </div>`;
        }).join('');
    }

    function render(){
        renderPH();
        renderGH();
    }

    function showTab(tab){
        const ph=document.getElementById('phPage');
        const gh=document.getElementById('ghPage');
        const pt=document.getElementById('phTab');
        const gt=document.getElementById('ghTab');

        if(tab==='ph'){
            ph.style.display='block';
            gh.style.display='none';
            pt.classList.add('active');
            gt.classList.remove('active');
        }else{
            ph.style.display='none';
            gh.style.display='block';
            gt.classList.add('active');
            pt.classList.remove('active');
        }
    }

    function openPh(id){
        const item=state.ph.find(function(x){
            return x.id===id;
        });

        if(!item || item.status!=='PENDING'){
            toast('This PH request is no longer available.',true);
            return;
        }

        selected=id;

        document.getElementById('proConfirmId').textContent='#'+item.id;
        document.getElementById('proConfirmAmount').textContent=money(item.amount)+' USDT';
        document.getElementById('proConfirmWallet').textContent=item.wallet;

        bootstrap.Modal.getOrCreateInstance(
            document.getElementById('proPhModal')
        ).show();
    }

    function confirmPh(){
        if(!selected) return;

        const item=state.ph.find(function(x){
            return x.id===selected;
        });

        if(!item) return;

        item.status='COMPLETED';

        save();
        render();

        bootstrap.Modal.getInstance(
            document.getElementById('proPhModal')
        )?.hide();

        toast('Request #'+item.id+' completed successfully in demo mode.');

        selected=null;
    }

    function openGhModal(){
        const input=document.getElementById('proGhAmount');

        input.value='';

        bootstrap.Modal.getOrCreateInstance(
            document.getElementById('proGhModal')
        ).show();

        setTimeout(function(){
            input.focus();
        },300);
    }

    function createGh(e){
        e.preventDefault();

        const amount=Number(
            document.getElementById('proGhAmount').value
        );

        if(!amount || amount<=0){
            toast('Enter a valid USDT amount.',true);
            return;
        }

        const max=state.gh.reduce(function(maximum,item){
            const n=parseInt(String(item.id).replace(/\D/g,''),10)||0;
            return Math.max(maximum,n);
        },1020);

        const item={
            id:'GH-'+String(max+1).padStart(4,'0'),
            amount:amount,
            status:'PENDING',
            time:new Date().toLocaleString('en-GB',{
                day:'2-digit',
                month:'short',
                year:'numeric',
                hour:'2-digit',
                minute:'2-digit',
                hour12:true
            }).replace(',',' ·')
        };

        state.gh.unshift(item);

        save();
        render();

        bootstrap.Modal.getInstance(
            document.getElementById('proGhModal')
        )?.hide();

        toast('Request #'+item.id+' created successfully.');
    }

    function cancelGh(id){
        const item=state.gh.find(function(x){
            return x.id===id;
        });

        if(!item) return;

        item.status='CANCELLED';

        save();
        render();

        toast('Request #'+id+' cancelled.');
    }

    function copyWallet(wallet){
        if(navigator.clipboard && navigator.clipboard.writeText){
            navigator.clipboard.writeText(wallet)
                .then(function(){ toast('Wallet address copied.'); })
                .catch(function(){ toast('Unable to copy wallet address.',true); });
        }else{
            const input=document.createElement('textarea');
            input.value=wallet;
            document.body.appendChild(input);
            input.select();
            try{
                document.execCommand('copy');
                toast('Wallet address copied.');
            }catch(e){
                toast('Unable to copy wallet address.',true);
            }
            input.remove();
        }
    }

    function reset(){
        localStorage.removeItem(KEY);
        state=JSON.parse(JSON.stringify(DEFAULT));
        render();
        toast('Demo data reset.');
    }

    document.addEventListener('DOMContentLoaded',function(){

        const confirm=document.getElementById('proConfirmBtn');
        const form=document.getElementById('proGhForm');

        if(confirm) confirm.addEventListener('click',confirmPh);
        if(form) form.addEventListener('submit',createGh);

        render();
    });

    window.PHGH_PRO={
        showTab:showTab,
        openPh:openPh,
        openGhModal:openGhModal,
        cancelGh:cancelGh,
        copyWallet:copyWallet,
        reset:reset
    };
})();
</script>
