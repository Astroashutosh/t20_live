/* =========================================================
   VeriStake — app.js
   Shared behavior across all public pages: ambient particle
   canvas, scroll reveals, toast system, live ticker, and
   generic "Connect Wallet" button wiring.
   ========================================================= */

document.addEventListener('DOMContentLoaded', () => {
  initParticleCanvas();
  initScrollReveal();
  initToastSystem();
  initTicker();
  // initConnectButtons();
  initSmoothAnchors();
  initCounters();
});

/* ---------- Ambient particle network ---------- */
function initParticleCanvas() {
  const canvas = document.getElementById('particle-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  let w, h, particles;

  const COUNT = window.innerWidth < 768 ? 34 : 64;

  function resize() {
    w = canvas.width = canvas.offsetWidth;
    h = canvas.height = canvas.offsetHeight;
  }

  function makeParticles() {
    particles = Array.from({ length: COUNT }, () => ({
      x: Math.random() * w,
      y: Math.random() * h,
      vx: (Math.random() - 0.5) * 0.35,
      vy: (Math.random() - 0.5) * 0.35,
      r: Math.random() * 1.6 + 0.6
    }));
  }

  function step() {
    ctx.clearRect(0, 0, w, h);
    particles.forEach(p => {
      p.x += p.vx; p.y += p.vy;
      if (p.x < 0 || p.x > w) p.vx *= -1;
      if (p.y < 0 || p.y > h) p.vy *= -1;
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(0, 255, 136, 0.55)';
      ctx.fill();
    });
    for (let i = 0; i < particles.length; i++) {
      for (let j = i + 1; j < particles.length; j++) {
        const a = particles[i], b = particles[j];
        const dist = Math.hypot(a.x - b.x, a.y - b.y);
        if (dist < 130) {
          ctx.strokeStyle = `rgba(34, 197, 94, ${0.18 * (1 - dist / 130)})`;
          ctx.lineWidth = 1;
          ctx.beginPath();
          ctx.moveTo(a.x, a.y);
          ctx.lineTo(b.x, b.y);
          ctx.stroke();
        }
      }
    }
    requestAnimationFrame(step);
  }

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  resize();
  makeParticles();
  window.addEventListener('resize', () => { resize(); makeParticles(); });
  if (!prefersReduced) requestAnimationFrame(step);
}

/* ---------- Scroll reveal (IntersectionObserver) ---------- */
function initScrollReveal() {
  const items = document.querySelectorAll('[data-reveal]');
  if (!items.length) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });
  items.forEach((el, i) => {
    el.style.transitionDelay = `${Math.min(i % 4, 3) * 90}ms`;
    io.observe(el);
  });
}

/* ---------- Toast system ---------- */
function initToastSystem() {
  let container = document.getElementById('veri-toast-container');
  if (!container) {
    container = document.createElement('div');
    container.id = 'veri-toast-container';
    container.className = 'toast-container position-fixed bottom-0 end-0 p-3';
    container.style.zIndex = 1080;
    document.body.appendChild(container);
  }

  document.addEventListener('veri:toast', (e) => {
    const { title, message, type } = e.detail;
    const icon = { success: 'bi-check-circle-fill', danger: 'bi-x-circle-fill', warning: 'bi-exclamation-triangle-fill' }[type] || 'bi-info-circle-fill';
    const color = { success: 'var(--success)', danger: 'var(--danger)', warning: 'var(--warning)' }[type] || 'var(--accent)';

    const toastEl = document.createElement('div');
    toastEl.className = 'toast toast-veri align-items-center border-0 mb-2';
    toastEl.setAttribute('role', 'alert');
    toastEl.innerHTML = `
      <div class="d-flex">
        <div class="toast-body d-flex align-items-start gap-2">
          <i class="bi ${icon} mt-1" style="color:${color}"></i>
          <div>
            <div class="fw-semibold">${title}</div>
            <div class="text-secondary small">${message}</div>
          </div>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>`;
    container.appendChild(toastEl);
    const toast = new bootstrap.Toast(toastEl, { delay: 4500 });
    toast.show();
    toastEl.addEventListener('hidden.bs.toast', () => toastEl.remove());
  });
}

/* ---------- Live trust ticker (mock block height) ---------- */
function initTicker() {
  const blockEl = document.querySelector('[data-live-block]');
  if (!blockEl) return;
  let block = 41928374 + Math.floor(Math.random() * 500);
  blockEl.textContent = block.toLocaleString();
  setInterval(() => {
    block += Math.floor(Math.random() * 3) + 1;
    blockEl.textContent = block.toLocaleString();
  }, 3000);
}

/* ---------- Connect wallet buttons (public pages) ---------- */
// function initConnectButtons() {
//   document.querySelectorAll('[data-action="connect-wallet"]').forEach(btn => {
//     btn.addEventListener('click', async () => {
//       const original = btn.innerHTML;
//       btn.disabled = true;
//       btn.innerHTML = `<span class="spinner-veri sm me-2" style="display:inline-block;vertical-align:-3px;"></span> Connecting...`;
//       const address = await VeriWallet.connectWallet();
//       btn.disabled = false;
//       if (address) {
//         btn.innerHTML = `<i class="bi bi-wallet2 me-2"></i>${VeriWallet.shortenAddress(address)}`;
//         document.querySelectorAll('[data-fill="wallet-address"]').forEach(el => {
//           if (el.tagName === 'INPUT') el.value = address; else el.textContent = address;
//         });
//         VeriWallet.showToast('Wallet connected', `Connected as ${VeriWallet.shortenAddress(address)}`, 'success');
//       } else {
//         btn.innerHTML = original;
//       }
//     });
//   });
// }

/* ---------- Smooth anchor scrolling for in-page nav ---------- */
function initSmoothAnchors() {
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', (e) => {
      const id = a.getAttribute('href');
      if (id.length > 1 && document.querySelector(id)) {
        e.preventDefault();
        document.querySelector(id).scrollIntoView({ behavior: 'smooth', block: 'start' });
        const navCollapse = document.querySelector('.navbar-collapse.show');
        if (navCollapse) bootstrap.Collapse.getInstance(navCollapse)?.hide();
      }
    });
  });
}

/* ---------- Animated counters ---------- */
function initCounters() {
  const counters = document.querySelectorAll('[data-counter]');
  if (!counters.length) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      const target = parseFloat(el.dataset.counter);
      const decimals = el.dataset.decimals ? parseInt(el.dataset.decimals) : 0;
      const duration = 1400;
      const start = performance.now();
      function tick(now) {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = (target * eased).toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        if (progress < 1) requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
      io.unobserve(el);
    });
  }, { threshold: 0.4 });
  counters.forEach(el => io.observe(el));
}

/* ---------- Copy to clipboard helper (used across pages) ---------- */
function copyToClipboard(text, label = 'Copied') {
  navigator.clipboard.writeText(text).then(() => {
    document.dispatchEvent(new CustomEvent('veri:toast', { detail: { title: label, message: text.length > 24 ? text.slice(0, 10) + '...' + text.slice(-8) : text, type: 'success' } }));
  });
}
