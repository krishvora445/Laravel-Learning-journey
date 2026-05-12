@props([
    'title' => 'krish',
])


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <script
        src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4">
    </script>
    <style>
        *, *::before, *::after {
            border-radius: 0 !important;
        }

        html, body {
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
            max-height: 100%;
            background: #000 !important;
            color: #fff;
        }

        body {
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .max-w-400 {
            max-width: 400px;
            margin: 20px auto;
        }

        .card {
            padding: 1rem;
            background-color: #000;
            border: 1px solid #fff;
        }

        .site-nav {
            position: sticky;
            top: 0;
            z-index: 20;
            padding: 16px 20px 0;
        }

        .site-nav__inner {
            max-width: 1400px;
            margin: 0 auto;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            background: #000;
            border: 1px solid #fff;
        }

        .site-nav__brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #fff;
            font-weight: 800;
            letter-spacing: 0.02em;
            padding: 6px 10px;
            background: #000;
            border: 1px solid #fff;
        }

        .site-nav__logo {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            background: #fff;
            font-size: 0.95rem;
            color: #000;
            border: 1px solid #fff;
        }

        .site-nav__links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .site-nav__links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.2s ease;
            border: 1px solid #fff;
            background: #000;
        }

        .site-nav__links a:hover {
            background: #fff;
            color: #000;
        }

        .site-nav__links a.is-active {
            background: #fff;
            color: #000;
        }

        main {
            width: 98%;
            margin: auto;
            padding: 24px 24px 56px;
        }

        .page-surface {
            min-height: calc(100vh - 140px);
            padding: clamp(28px, 4vw, 56px);
            background-color: #000;
            background-image: url('/images/monogram-line-seamless-pattern.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border: 1px solid #fff;
        }

        .page-hero {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(320px, 0.9fr);
            gap: 20px;
            align-items: stretch;
        }

        .page-hero__copy {
            max-width: 760px;
        }

        .page-hero__panel {
            display: grid;
            gap: 14px;
            padding: 20px;
            background: #000;
            color: #fff;
            border: 1px solid #fff;
        }

        .page-hero__panel small {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.88rem;
            letter-spacing: 0.03em;
        }

        .page-hero__stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .page-stat {
            padding: 14px;
            background: #000;
            border: 1px solid #fff;
        }

        .page-stat strong {
            display: block;
            font-size: 1.4rem;
            margin-bottom: 4px;
        }

        .page-stat span {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .page-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            background: #fff;
            color: #000;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            border: 1px solid #fff;
        }

        .page-hero h1 {
            margin: 14px 0 0;
            font-size: clamp(2.2rem, 4vw, 3.8rem);
            line-height: 1.05;
            letter-spacing: -0.04em;
        }

        .page-hero p {
            margin: 14px 0 0;
            color: rgba(255, 255, 255, 0.88);
            font-size: 1.02rem;
            line-height: 1.7;
        }

        .page-grid {
            margin-top: 28px;
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 18px;
        }

        .page-card {
            grid-column: span 3;
            padding: 20px;
            background: #000;
            border: 1px solid #fff;
        }

        .page-card h2 {
            margin: 0 0 10px;
            font-size: 1rem;
        }

        .page-card p {
            margin: 0;
            color: rgba(255, 255, 255, 0.88);
            line-height: 1.65;
        }

        .page-card--featured {
            grid-column: span 6;
            background: #000;
        }

        @media (max-width: 900px) {
            .page-hero {
                grid-template-columns: 1fr;
            }

            .page-card,
            .page-card--featured {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 640px) {
            .page-surface {
                padding: 20px;
            }
        }

        @media (max-width: 640px) {
            .site-nav__inner {
                flex-direction: column;
                align-items: stretch;
            }

            .site-nav__links {
                justify-content: center;
            }
        }

        .Company{
            color: #fff;
        }
    </style>
</head>
<body >
<nav class="site-nav">
    <div class="site-nav__inner">

            <span class="site-nav__logo">LJ</span>

            <span class="font-extrabold Company">The Idea Company</span>

        <ul class="site-nav__links">
            <li><a href="/" class="{{ request()->is('/') ? 'is-active' : '' }}">Home</a></li>
            <li><a href="/ideas" class="{{ request()->is('ideas') ? 'is-active' : '' }}">Ideas</a></li>
            <li><a href="/about" class="{{ request()->is('about') ? 'is-active' : '' }}">About</a></li>
        </ul>
    </div>
</nav>


    <main>
        <div class="page-surface">
            {{ $slot }}
        </div>
    </main>
</body>
</html>
