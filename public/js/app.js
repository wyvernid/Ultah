// AOS (Animate on Scroll) — lightweight built-in version
document.addEventListener('DOMContentLoaded', () => {

  // --- AOS Observer ---
  const aosElements = document.querySelectorAll('[data-aos]');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const delay = entry.target.getAttribute('data-aos-delay') || 0;
        setTimeout(() => {
          entry.target.classList.add('aos-animate');
        }, parseInt(delay));
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  aosElements.forEach(el => observer.observe(el));

 // --- Mobile nav toggle ---
const toggle = document.getElementById('navToggle');
const navLinks = document.querySelector('.nav-links');
if (toggle && navLinks) {
    toggle.addEventListener('click', () => {
        navLinks.classList.toggle('open');
        toggle.textContent = navLinks.classList.contains('open') ? '✕' : '☰';
    });

    // Tutup menu kalau klik link
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('open');
            toggle.textContent = '☰';
        });
    });
}

  // --- Floating particles (hero) ---
  const hero = document.querySelector('.hero-particles');
  if (hero) {
    setInterval(() => {
      const p = document.createElement('div');
      p.classList.add('particle');
      p.style.left = Math.random() * 100 + '%';
      p.style.animationDuration = (3 + Math.random() * 5) + 's';
      p.style.animationDelay = '0s';
      p.style.width = p.style.height = (4 + Math.random() * 6) + 'px';
      hero.appendChild(p);
      setTimeout(() => p.remove(), 8000);
    }, 600);
  }

  // --- Scroll navbar glass effect ---
  window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
      navbar.style.background = window.scrollY > 50
        ? 'rgba(255,255,255,0.92)'
        : 'rgba(255,255,255,0.75)';
    }
  });

  // --- Konfetti saat halaman load (opsional, hanya di page 1) ---
  if (document.querySelector('.hero-title')) {
    createConfetti();
  }
});

function createConfetti() {
  const colors = ['#38bdf8', '#7dd3fc', '#0284c7', '#e0f2fe', '#bae6fd'];
  for (let i = 0; i < 60; i++) {
    setTimeout(() => {
      const confetti = document.createElement('div');
      confetti.style.cssText = `
        position:fixed; top:-10px;
        left:${Math.random()*100}%;
        width:${6+Math.random()*8}px;
        height:${6+Math.random()*8}px;
        background:${colors[Math.floor(Math.random()*colors.length)]};
        border-radius:${Math.random() > 0.5 ? '50%' : '0'};
        opacity:${0.6+Math.random()*0.4};
        pointer-events:none;
        z-index:9998;
        animation: confettiFall ${2+Math.random()*2}s linear forwards;
      `;
      document.body.appendChild(confetti);
      setTimeout(() => confetti.remove(), 4000);
    }, i * 60);
  }

  // Style untuk animasi konfetti
  if (!document.getElementById('confetti-style')) {
    const style = document.createElement('style');
    style.id = 'confetti-style';
    style.textContent = `
      @keyframes confettiFall {
        to {
          transform: translateY(110vh) rotate(${Math.random()*720}deg);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  }
}