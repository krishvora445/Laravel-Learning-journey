<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>UI Dev Arsenal</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #080a0d;
    --surface: #0e1117;
    --border: #1c2030;
    --border-bright: #2a3148;
    --text: #e8eaf0;
    --muted: #5a6080;
    --accent: #4f6ef7;
    --accent2: #a78bfa;
    --accent3: #34d399;
    --accent4: #f59e0b;
    --accent5: #f472b6;
    --accent6: #22d3ee;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }

  body {
    background: var(--bg);
    color: var(--text);
    font-family: 'Syne', sans-serif;
    min-height: 100vh;
    overflow-x: hidden;
  }

  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
    pointer-events: none;
    z-index: 9999;
    opacity: 0.5;
  }

  .grid-bg {
    position: fixed;
    inset: 0;
    background-image:
      linear-gradient(var(--border) 1px, transparent 1px),
      linear-gradient(90deg, var(--border) 1px, transparent 1px);
    background-size: 48px 48px;
    opacity: 0.3;
    pointer-events: none;
    z-index: 0;
  }

  .ambient {
    position: fixed;
    border-radius: 50%;
    filter: blur(140px);
    pointer-events: none;
    z-index: 0;
  }
  .ambient-1 { width: 500px; height: 500px; background: radial-gradient(circle, rgba(79,110,247,0.07), transparent 70%); top: -100px; left: -100px; }
  .ambient-2 { width: 400px; height: 400px; background: radial-gradient(circle, rgba(167,139,250,0.05), transparent 70%); bottom: 10%; right: -80px; }

  header {
    position: relative;
    z-index: 10;
    padding: 64px 48px 48px;
    border-bottom: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 24px;
    flex-wrap: wrap;
  }

  .header-label {
    font-family: 'JetBrains Mono', monospace;
    font-size: 10px;
    letter-spacing: 0.2em;
    color: var(--accent);
    text-transform: uppercase;
    margin-bottom: 12px;
  }

  h1 {
    font-size: clamp(42px, 7vw, 96px);
    font-weight: 800;
    line-height: 0.9;
    letter-spacing: -0.03em;
    background: linear-gradient(135deg, #fff 20%, var(--accent2) 60%, var(--accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .header-sub {
    font-family: 'Instrument Serif', serif;
    font-style: italic;
    font-size: 17px;
    color: var(--muted);
    max-width: 320px;
    line-height: 1.6;
  }

  .header-count {
    font-family: 'JetBrains Mono', monospace;
    font-size: 10px;
    color: var(--muted);
    border: 1px solid var(--border-bright);
    padding: 8px 16px;
    border-radius: 3px;
    letter-spacing: 0.1em;
    white-space: nowrap;
    align-self: flex-start;
    margin-top: 8px;
  }

  .stat-strip {
    position: relative;
    z-index: 10;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-bottom: 1px solid var(--border);
  }

  .stat-cell {
    padding: 20px 28px;
    border-right: 1px solid var(--border);
  }
  .stat-cell:last-child { border-right: none; }

  .stat-num {
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -0.02em;
  }
  .stat-lbl {
    font-family: 'JetBrains Mono', monospace;
    font-size: 9px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--muted);
    margin-top: 2px;
  }

  .section-divider {
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 52px 48px 20px;
  }

  .section-tag {
    font-family: 'JetBrains Mono', monospace;
    font-size: 9px;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 2px;
    font-weight: 500;
    white-space: nowrap;
  }

  .tag-ui      { background: rgba(79,110,247,0.12);  color: var(--accent);  border: 1px solid rgba(79,110,247,0.3); }
  .tag-motion  { background: rgba(52,211,153,0.10);  color: var(--accent3); border: 1px solid rgba(52,211,153,0.3); }
  .tag-gems    { background: rgba(245,158,11,0.10);  color: var(--accent4); border: 1px solid rgba(245,158,11,0.3); }
  .tag-tools   { background: rgba(244,114,182,0.10); color: var(--accent5); border: 1px solid rgba(244,114,182,0.3); }

  .section-line {
    flex: 1;
    height: 1px;
    background: linear-gradient(90deg, var(--border-bright), transparent);
  }

  .section-title {
    font-size: clamp(26px, 3vw, 40px);
    font-weight: 800;
    letter-spacing: -0.02em;
    padding: 0 48px 28px;
    position: relative;
    z-index: 10;
  }

  .cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
    gap: 1px;
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    background: var(--border);
    position: relative;
    z-index: 10;
  }

  .card {
    background: var(--surface);
    padding: 28px 30px;
    display: flex;
    flex-direction: column;
    gap: 11px;
    text-decoration: none;
    color: inherit;
    position: relative;
    overflow: hidden;
    transition: background 0.2s ease;
  }

  .card::before {
    content: '';
    position: absolute;
    inset: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
  }

  .card:hover::before { opacity: 1; }
  .card:hover { background: #10131b; }

  .card-accent-ui::before     { background: radial-gradient(circle at 0 0, rgba(79,110,247,0.1), transparent 65%); }
  .card-accent-motion::before { background: radial-gradient(circle at 0 0, rgba(52,211,153,0.1), transparent 65%); }
  .card-accent-gems::before   { background: radial-gradient(circle at 0 0, rgba(245,158,11,0.1), transparent 65%); }
  .card-accent-tools::before  { background: radial-gradient(circle at 0 0, rgba(244,114,182,0.1), transparent 65%); }

  .card-featured {
    grid-column: span 2;
    flex-direction: row;
    align-items: flex-start;
    gap: 28px;
  }

  @media (max-width: 680px) {
    .card-featured { grid-column: span 1; flex-direction: column; }
    header, .section-divider, .section-title { padding-left: 20px; padding-right: 20px; }
    .stat-strip { grid-template-columns: repeat(2, 1fr); }
  }

  .featured-left { flex: 1; display: flex; flex-direction: column; gap: 11px; }

  .featured-stats {
    width: 160px;
    flex-shrink: 0;
    background: var(--bg);
    border: 1px solid var(--border-bright);
    border-radius: 6px;
    padding: 14px;
    display: flex;
    flex-direction: column;
    gap: 0;
  }

  .fstat {
    padding: 10px 0;
    border-bottom: 1px solid var(--border);
  }
  .fstat:last-child { border-bottom: none; padding-bottom: 0; }
  .fstat:first-child { padding-top: 0; }

  .fstat-val {
    font-size: 22px;
    font-weight: 800;
    letter-spacing: -0.02em;
  }
  .fstat-lbl {
    font-family: 'JetBrains Mono', monospace;
    font-size: 8.5px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--muted);
  }

  .card-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
  }

  .card-icon {
    width: 38px; height: 38px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    flex-shrink: 0;
    border: 1px solid var(--border-bright);
  }

  .card-badge {
    font-family: 'JetBrains Mono', monospace;
    font-size: 8px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    padding: 3px 8px;
    border-radius: 2px;
    border: 1px solid;
  }

  .badge-free     { color: var(--accent3); border-color: rgba(52,211,153,0.35);  background: rgba(52,211,153,0.07); }
  .badge-paid     { color: var(--accent4); border-color: rgba(245,158,11,0.35);  background: rgba(245,158,11,0.07); }
  .badge-freemium { color: var(--accent2); border-color: rgba(167,139,250,0.35); background: rgba(167,139,250,0.07); }

  .card-name {
    font-size: 18px;
    font-weight: 700;
    letter-spacing: -0.01em;
    line-height: 1.1;
  }

  .card-url {
    font-family: 'JetBrains Mono', monospace;
    font-size: 9px;
    color: var(--muted);
    word-break: break-all;
  }

  .card-desc {
    font-size: 13px;
    line-height: 1.65;
    color: #8896b0;
    flex: 1;
  }

  .card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    margin-top: 2px;
  }

  .pill {
    font-family: 'JetBrains Mono', monospace;
    font-size: 8px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 3px 8px;
    border-radius: 100px;
    border: 1px solid var(--border-bright);
    color: var(--muted);
    background: var(--bg);
  }

  .card-arrow {
    font-size: 12px;
    color: var(--muted);
    align-self: flex-end;
    margin-top: auto;
    transition: color 0.2s, transform 0.2s;
  }

  .card:hover .card-arrow { color: var(--text); transform: translate(3px, -3px); }

  footer {
    position: relative;
    z-index: 10;
    padding: 36px 48px;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
  }

  .footer-text {
    font-family: 'JetBrains Mono', monospace;
    font-size: 10px;
    letter-spacing: 0.12em;
    color: var(--muted);
  }
</style>
</head>
<body>

<div class="grid-bg"></div>
<div class="ambient ambient-1"></div>
<div class="ambient ambient-2"></div>

<!-- HEADER -->
<header>
  <div>
    <div class="header-label">// dev resource index — 2025</div>
    <h1>UI<br>ARSENAL</h1>
    <div class="header-count">36 RESOURCES &nbsp;·&nbsp; 4 CATEGORIES</div>
  </div>
  <div class="header-sub">
    Every library, tool & hidden gem you need to build exceptional interfaces — curated & categorized.
  </div>
</header>

<!-- STATS -->
<div class="stat-strip">
  <div class="stat-cell">
    <div class="stat-num" style="color:var(--accent)">12</div>
    <div class="stat-lbl">UI Libraries</div>
  </div>
  <div class="stat-cell">
    <div class="stat-num" style="color:var(--accent3)">5</div>
    <div class="stat-lbl">Motion Tools</div>
  </div>
  <div class="stat-cell">
    <div class="stat-num" style="color:var(--accent4)">9</div>
    <div class="stat-lbl">Hidden Gems</div>
  </div>
  <div class="stat-cell">
    <div class="stat-num" style="color:var(--accent5)">10</div>
    <div class="stat-lbl">Dev Tools</div>
  </div>
</div>


<!-- ══════════════════════════
     01 · UI COMPONENT LIBRARIES
     ══════════════════════════ -->

<div class="section-divider">
  <span class="section-tag tag-ui">01 — Component Libraries</span>
  <div class="section-line"></div>
</div>
<div class="section-title">UI Component Libraries</div>

<div class="cards-grid">

  <a href="https://ui.shadcn.com/" target="_blank" class="card card-accent-ui card-featured">
    <div class="featured-left">
      <div class="card-top">
        <div class="card-icon" style="background:rgba(255,255,255,0.04)">🪄</div>
        <span class="card-badge badge-free">FREE / OPEN</span>
      </div>
      <div class="card-name" style="font-size:24px">shadcn/ui</div>
      <div class="card-url">ui.shadcn.com</div>
      <div class="card-desc">
        The component collection that changed the game. Copy-paste primitives built on Radix UI + Tailwind CSS. You own every file — no npm package, no vendor lock-in, infinitely customizable. The current gold standard.
      </div>
      <div class="card-tags">
        <span class="pill">React</span>
        <span class="pill">Tailwind</span>
        <span class="pill">Radix UI</span>
        <span class="pill">TypeScript</span>
        <span class="pill">Copy-Paste</span>
      </div>
    </div>
    <div class="featured-stats">
      <div class="fstat">
        <div class="fstat-val" style="color:var(--accent)">60k+</div>
        <div class="fstat-lbl">GitHub Stars</div>
      </div>
      <div class="fstat">
        <div class="fstat-val" style="color:var(--accent3)">50+</div>
        <div class="fstat-lbl">Components</div>
      </div>
      <div class="fstat">
        <div class="fstat-val" style="color:var(--accent2)">0</div>
        <div class="fstat-lbl">Pkg Dependencies</div>
      </div>
    </div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://ui.aceternity.com/" target="_blank" class="card card-accent-ui">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(79,110,247,0.08)">⚡</div>
      <span class="card-badge badge-freemium">FREEMIUM</span>
    </div>
    <div class="card-name">Aceternity UI</div>
    <div class="card-url">ui.aceternity.com</div>
    <div class="card-desc">Stunning animated components on Framer Motion + Tailwind. Famous for dramatic hover effects, beam animations, spotlight cards. When you need the wow factor.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Framer Motion</span><span class="pill">Tailwind</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://inspira-ui.com/" target="_blank" class="card card-accent-ui">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(167,139,250,0.08)">✨</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Inspira UI</div>
    <div class="card-url">inspira-ui.com</div>
    <div class="card-desc">Vue/Nuxt equivalent of Aceternity — beautiful animated UI components for the Vue ecosystem. Glassmorphism, particles, glowing cards. A must for Vue devs.</div>
    <div class="card-tags"><span class="pill">Vue 3</span><span class="pill">Nuxt</span><span class="pill">Tailwind</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://magicui.design/" target="_blank" class="card card-accent-ui">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(79,110,247,0.08)">🌀</div>
      <span class="card-badge badge-freemium">FREEMIUM</span>
    </div>
    <div class="card-name">Magic UI</div>
    <div class="card-url">magicui.design</div>
    <div class="card-desc">150+ animated components built for React / Next.js. Bento grids, shimmer buttons, animated beams, border effects. The ultimate landing page component set.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Next.js</span><span class="pill">Framer Motion</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://www.radix-ui.com/" target="_blank" class="card card-accent-ui">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(255,255,255,0.04)">🔩</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Radix UI</div>
    <div class="card-url">radix-ui.com</div>
    <div class="card-desc">The headless primitives powering shadcn/ui. Accessible, unstyled, behavior-complete. Dialogs, dropdowns, tooltips — done right with full ARIA support out of the box.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Headless</span><span class="pill">A11y</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://park-ui.com/" target="_blank" class="card card-accent-ui">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(52,211,153,0.08)">🌿</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Park UI</div>
    <div class="card-url">park-ui.com</div>
    <div class="card-desc">Built on Ark UI primitives. Framework-agnostic components for React, Solid, and Vue. Beautifully styled, production-ready, and themeable with Panda CSS.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Solid</span><span class="pill">Vue</span><span class="pill">Panda CSS</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://originui.com/" target="_blank" class="card card-accent-ui">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(79,110,247,0.08)">◎</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Origin UI</div>
    <div class="card-url">originui.com</div>
    <div class="card-desc">Clean, minimal UI components built with Tailwind CSS and shadcn/ui. A growing collection of inputs, forms, and layout patterns that are actually production-useful.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Tailwind</span><span class="pill">shadcn</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://daisyui.com/" target="_blank" class="card card-accent-ui">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(167,139,250,0.08)">🌼</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">daisyUI</div>
    <div class="card-url">daisyui.com</div>
    <div class="card-desc">The most popular Tailwind CSS component library. 48 themes, semantic class names, zero JS dependency. Works with any framework — perfect for rapid prototyping.</div>
    <div class="card-tags"><span class="pill">Tailwind</span><span class="pill">Any Framework</span><span class="pill">48 Themes</span></div>
    <div class="card-arrow">↗</div>
  </a>

</div>


<!-- ══════════════════════════
     02 · ANIMATION & MOTION
     ══════════════════════════ -->

<div class="section-divider" style="padding-top:60px">
  <span class="section-tag tag-motion">02 — Animation</span>
  <div class="section-line"></div>
</div>
<div class="section-title" style="color:var(--accent3)">Animation & Motion</div>

<div class="cards-grid">

  <a href="https://motion.dev/" target="_blank" class="card card-accent-motion card-featured">
    <div class="featured-left">
      <div class="card-top">
        <div class="card-icon" style="background:rgba(52,211,153,0.08)">🎬</div>
        <span class="card-badge badge-free">FREE / OPEN</span>
      </div>
      <div class="card-name" style="font-size:24px">Motion</div>
      <div class="card-url">motion.dev</div>
      <div class="card-desc">
        The definitive animation library for the web — formerly Framer Motion. Declarative animations, gestures, scroll-driven effects, layout transitions, and exit animations. Handles React and vanilla JS, now with Motion+ for extras.
      </div>
      <div class="card-tags">
        <span class="pill">React</span>
        <span class="pill">Vanilla JS</span>
        <span class="pill">Scroll</span>
        <span class="pill">Gestures</span>
        <span class="pill">Layout</span>
      </div>
    </div>
    <div class="featured-stats">
      <div class="fstat">
        <div class="fstat-val" style="color:var(--accent3)">22k+</div>
        <div class="fstat-lbl">GitHub Stars</div>
      </div>
      <div class="fstat">
        <div class="fstat-val" style="color:var(--accent)">~17kb</div>
        <div class="fstat-lbl">Bundle Size</div>
      </div>
    </div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://lenis.darkroom.engineering/" target="_blank" class="card card-accent-motion">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(52,211,153,0.08)">〰️</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Lenis</div>
    <div class="card-url">lenis.darkroom.engineering</div>
    <div class="card-desc">The smoothest scroll library on the web. Buttery inertia-based scrolling in a tiny package. Used by the world's most polished agency sites. Essential for premium feel.</div>
    <div class="card-tags"><span class="pill">Vanilla JS</span><span class="pill">React</span><span class="pill">GSAP compat</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://gsap.com/" target="_blank" class="card card-accent-motion">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(52,211,153,0.08)">🟢</div>
      <span class="card-badge badge-freemium">FREEMIUM</span>
    </div>
    <div class="card-name">GSAP</div>
    <div class="card-url">gsap.com</div>
    <div class="card-desc">The industry-standard JS animation platform. ScrollTrigger, MorphSVG, SplitText — nothing matches GSAP for complex, timeline-based production animations. The pro's choice.</div>
    <div class="card-tags"><span class="pill">Vanilla JS</span><span class="pill">ScrollTrigger</span><span class="pill">SVG</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://auto-animate.formkit.com/" target="_blank" class="card card-accent-motion">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(52,211,153,0.08)">✦</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">AutoAnimate</div>
    <div class="card-url">auto-animate.formkit.com</div>
    <div class="card-desc">Add smooth animations with one line of code. Zero config. React hook or vanilla JS. Handles element adds, removes, and moves automatically — pure magic for list UIs.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Vue</span><span class="pill">1 Line</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://motion-primitives.com/" target="_blank" class="card card-accent-motion">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(52,211,153,0.08)">🔷</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Motion Primitives</div>
    <div class="card-url">motion-primitives.com</div>
    <div class="card-desc">Pre-built Motion-powered UI patterns — animated tabs, morphing dialogs, scroll reveals, staggered lists. The missing animation layer for shadcn/ui users.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Motion</span><span class="pill">shadcn compat</span></div>
    <div class="card-arrow">↗</div>
  </a>

</div>


<!-- ══════════════════════════
     03 · HIDDEN GEMS
     ══════════════════════════ -->

<div class="section-divider" style="padding-top:60px">
  <span class="section-tag tag-gems">03 — Hidden Gems</span>
  <div class="section-line"></div>
</div>
<div class="section-title" style="color:var(--accent4)">Shadow Ecoys &amp; Hidden Gems</div>

<div class="cards-grid">

  <a href="https://www.cult-ui.com/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">🔮</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Cult UI</div>
    <div class="card-url">cult-ui.com</div>
    <div class="card-desc">shadcn-based components most devs haven't discovered. Carousel, family tree, color picker, gradient motion cards — each one a hidden gem built by the community.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">shadcn</span><span class="pill">Underrated</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://ui.lukacho.com/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">💠</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Lukacho UI</div>
    <div class="card-url">ui.lukacho.com</div>
    <div class="card-desc">Unique animated buttons, loaders, and cards you won't find anywhere else. The button collection alone is worth the bookmark — each one is a small masterpiece of micro-interaction.</div>
    <div class="card-tags"><span class="pill">CSS</span><span class="pill">React</span><span class="pill">Micro-interactions</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://www.fancycomponents.dev/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">🎨</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Fancy Components</div>
    <div class="card-url">fancycomponents.dev</div>
    <div class="card-desc">Experimental, scroll-driven, creative components that push boundaries. Text animations, cursor effects, physics UI — the kind of thing you'd find on an award-winning portfolio site.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Experimental</span><span class="pill">Creative</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://mobbin.com/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">📱</div>
      <span class="card-badge badge-freemium">FREEMIUM</span>
    </div>
    <div class="card-name">Mobbin</div>
    <div class="card-url">mobbin.com</div>
    <div class="card-desc">The world's largest mobile & web UI design reference library. Real screenshots from 1000+ top apps — search by pattern, component, or flow. Essential for design inspiration and research.</div>
    <div class="card-tags"><span class="pill">Inspiration</span><span class="pill">iOS</span><span class="pill">Android</span><span class="pill">Web</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://bg.ibelick.com/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">🌈</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">ibelick Backgrounds</div>
    <div class="card-url">bg.ibelick.com</div>
    <div class="card-desc">Copy-paste Tailwind CSS background patterns — grid lines, dots, gradient meshes, aurora effects. Transforms a plain div into something stunning in a single snippet.</div>
    <div class="card-tags"><span class="pill">Tailwind</span><span class="pill">CSS</span><span class="pill">Copy-Paste</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://21st.dev/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">🏪</div>
      <span class="card-badge badge-freemium">FREEMIUM</span>
    </div>
    <div class="card-name">21st.dev</div>
    <div class="card-url">21st.dev</div>
    <div class="card-desc">"npm for UI" — a marketplace where devs share shadcn-compatible components. Thousands of community blocks, charts, hero sections, and more. Growing extremely fast in 2025.</div>
    <div class="card-tags"><span class="pill">Marketplace</span><span class="pill">shadcn</span><span class="pill">Community</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://syntaxui.com/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">⌨️</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Syntax UI</div>
    <div class="card-url">syntaxui.com</div>
    <div class="card-desc">Free UI elements designed for speed. Animated hero sections, feature cards, navbars — production-ready components with Motion baked in. Great for landing pages fast.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Tailwind</span><span class="pill">Landing Pages</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://cssbuttons.app/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">🔘</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">CSS Buttons</div>
    <div class="card-url">cssbuttons.app</div>
    <div class="card-desc">100+ beautifully crafted CSS-only button styles. Pure CSS, copy-paste, no dependencies. Perfect for spicing up any UI without pulling in an entire component library.</div>
    <div class="card-tags"><span class="pill">Pure CSS</span><span class="pill">Copy-Paste</span><span class="pill">Zero Deps</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://uiverse.io/" target="_blank" class="card card-accent-gems">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(245,158,11,0.08)">🪐</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">UIverse</div>
    <div class="card-url">uiverse.io</div>
    <div class="card-desc">Community-built library of 4000+ free CSS & Tailwind UI elements — loaders, buttons, cards, toggles, checkboxes. Every element is a creative, standalone snippet with live preview.</div>
    <div class="card-tags"><span class="pill">CSS</span><span class="pill">Tailwind</span><span class="pill">Community</span><span class="pill">4000+</span></div>
    <div class="card-arrow">↗</div>
  </a>

</div>


<!-- ══════════════════════════
     04 · DEV TOOLS
     ══════════════════════════ -->

<div class="section-divider" style="padding-top:60px">
  <span class="section-tag tag-tools">04 — Tools</span>
  <div class="section-line"></div>
</div>
<div class="section-title" style="color:var(--accent5)">Essential Dev Tools</div>

<div class="cards-grid">

  <a href="https://v0.dev/" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">🤖</div>
      <span class="card-badge badge-freemium">FREEMIUM</span>
    </div>
    <div class="card-name">Vercel v0</div>
    <div class="card-url">v0.dev</div>
    <div class="card-desc">AI that generates shadcn/ui components from text. Describe what you need, get production-ready React + Tailwind code instantly. The fastest way to scaffold complex UI.</div>
    <div class="card-tags"><span class="pill">AI</span><span class="pill">shadcn</span><span class="pill">Codegen</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://storybook.js.org/" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">📖</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Storybook</div>
    <div class="card-url">storybook.js.org</div>
    <div class="card-desc">Build, document, and test UI components in isolation. The industry-standard component workshop for teams. Visual tests, a11y checks, interaction testing — all in one place.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Vue</span><span class="pill">Testing</span><span class="pill">Docs</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://tanstack.com/" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">🦅</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">TanStack</div>
    <div class="card-url">tanstack.com</div>
    <div class="card-desc">Home of TanStack Query, Table, Router, and Form. The best server-state, data-grid, routing, and form libraries in the ecosystem — framework-agnostic and battle-tested.</div>
    <div class="card-tags"><span class="pill">Query</span><span class="pill">Table</span><span class="pill">Router</span><span class="pill">React</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://react-hook-form.com/" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">📋</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">React Hook Form</div>
    <div class="card-url">react-hook-form.com</div>
    <div class="card-desc">The best form library for React. Performant, minimal re-renders, integrates perfectly with Zod + shadcn FormField. Handles validation, errors, and multi-step flows cleanly.</div>
    <div class="card-tags"><span class="pill">React</span><span class="pill">Zod</span><span class="pill">Forms</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://lucide.dev/" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">✦</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Lucide Icons</div>
    <div class="card-url">lucide.dev</div>
    <div class="card-desc">1000+ beautifully consistent open-source icons. SVG, React, Vue, Svelte — official shadcn icon library. Perfectly weighted strokes, pixel-perfect at any size.</div>
    <div class="card-tags"><span class="pill">SVG</span><span class="pill">React</span><span class="pill">1000+ Icons</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://fontsource.org/" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">🔤</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Fontsource</div>
    <div class="card-url">fontsource.org</div>
    <div class="card-desc">Self-host Google Fonts as npm packages. Zero CDN dependency, better privacy, faster loads, offline support. Install any font with npm and import in one line.</div>
    <div class="card-tags"><span class="pill">Fonts</span><span class="pill">npm</span><span class="pill">Privacy</span><span class="pill">Perf</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://github.com/dcastil/tailwind-merge" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">🧩</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">tailwind-merge + clsx</div>
    <div class="card-url">github.com · tailwind-merge</div>
    <div class="card-desc">The combo every Tailwind dev needs. clsx for conditional classes, tailwind-merge for conflict resolution. The cn() utility under the hood of every shadcn component — essential.</div>
    <div class="card-tags"><span class="pill">Tailwind</span><span class="pill">Utility</span><span class="pill">Must-Have</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://www.typescale.com/" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">📐</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Typescale</div>
    <div class="card-url">typescale.com</div>
    <div class="card-desc">Visual type scale generator. Pick a base size and ratio, preview all heading and body sizes in real-time. Exports to CSS variables — an underrated tool for visual consistency.</div>
    <div class="card-tags"><span class="pill">Typography</span><span class="pill">CSS Vars</span><span class="pill">Design</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://www.realfavicongenerator.net/" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">🏷️</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Real Favicon Generator</div>
    <div class="card-url">realfavicongenerator.net</div>
    <div class="card-desc">Upload one image, get a complete favicon set for all platforms — iOS, Android, Windows, macOS, PWA. Generates all the HTML meta tags you need. One tool, done forever.</div>
    <div class="card-tags"><span class="pill">PWA</span><span class="pill">iOS</span><span class="pill">SEO</span><span class="pill">HTML</span></div>
    <div class="card-arrow">↗</div>
  </a>

  <a href="https://tailwindcss.com/docs/theme" target="_blank" class="card card-accent-tools">
    <div class="card-top">
      <div class="card-icon" style="background:rgba(244,114,182,0.08)">🎨</div>
      <span class="card-badge badge-free">FREE</span>
    </div>
    <div class="card-name">Tailwind UI Colors</div>
    <div class="card-url">uicolors.app/create</div>
    <div class="card-desc">Paste any hex color and instantly generate a full Tailwind-compatible 50–950 color palette. Exports as a tailwind.config.js theme block — perfect for building custom brand palettes.</div>
    <div class="card-tags"><span class="pill">Tailwind</span><span class="pill">Colors</span><span class="pill">Palette Gen</span></div>
    <div class="card-arrow">↗</div>
  </a>

</div>


<footer>
  <div class="footer-text">// UI DEV ARSENAL &nbsp;·&nbsp; CURATED 2025</div>
  <div class="footer-text">
    <span style="color:var(--accent3)">● FREE</span> &nbsp;
    <span style="color:var(--accent2)">● FREEMIUM</span> &nbsp;
    <span style="color:var(--accent4)">● PAID</span>
  </div>
</footer>

<script>
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.06 });

  document.querySelectorAll('.card').forEach((card, i) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(14px)';
    card.style.transition = `opacity 0.4s ease ${(i % 6) * 0.06}s, transform 0.4s ease ${(i % 6) * 0.06}s, background 0.2s ease`;
    observer.observe(card);
  });
</script>
</body>
</html>
