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
            html, body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            /*min-height: 100vh;*/
            max-height: 100%;
            background: #f3f4f6 !important;
            color: #111827;
        }

        .max-w-400 {
            max-width: 400px;
            margin: 20px auto;
        }

        .card {
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background-color: #fff;
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
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(148, 163, 184, 0.22);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .site-nav__brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #111827;
            font-weight: 800;
            letter-spacing: 0.02em;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.45);
            border: 1px solid rgba(148, 163, 184, 0.16);
        }

        .site-nav__logo {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: linear-gradient(135deg, #111827, #4f46e5);
            color: #fff;
            font-size: 0.95rem;
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.22);
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
            border-radius: 999px;
            text-decoration: none;
            color: #334155;
            font-weight: 600;
            transition: all 0.2s ease;
            border: 1px solid rgba(148, 163, 184, 0.16);
            background: rgba(255, 255, 255, 0.5);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.7);
        }

        .site-nav__links a:hover {
            background: rgba(238, 242, 255, 0.92);
            color: #1e1b4b;
            border-color: rgba(199, 210, 254, 0.9);
            transform: translateY(-1px);
        }

        .site-nav__links a.is-active {
            background: linear-gradient(135deg, #111827, #4338ca);
            color: #ffffff;
            box-shadow: 0 10px 20px rgba(17, 24, 39, 0.18), inset 0 1px 0 rgba(255, 255, 255, 0.16);
        }

        main {
            width: 98%;
            margin: auto;
            padding: 24px 24px 56px;
        }

        .page-surface {
            min-height: calc(100vh - 140px);
            border-radius: 32px;
            padding: clamp(28px, 4vw, 56px);
            background: #1c2a3e;
            border: 1px solid rgb(41 45 50 / 0.18);
            box-shadow: 0 30px 70px rgba(15, 23, 42, 0.1);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
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
            border-radius: 24px;
            background: linear-gradient(135deg, rgb(6 12 25 / 0.95), rgb(40 38 55 / 0.9));
            color: #fff;
            box-shadow: 0 18px 38px rgba(17, 24, 39, 0.14);
        }

        .page-hero__panel small {
            color: rgba(255, 255, 255, 0.78);
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
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.14);
        }

        .page-stat strong {
            display: block;
            font-size: 1.4rem;
            margin-bottom: 4px;
        }

        .page-stat span {
            color: rgba(255, 255, 255, 0.76);
            font-size: 0.9rem;
        }

        .page-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(238, 242, 255, 0.95);
            color: #4338ca;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .page-hero h1 {
            margin: 14px 0 0;
            font-size: clamp(2.2rem, 4vw, 3.8rem);
            line-height: 1.05;
            letter-spacing: -0.04em;
        }

        .page-hero p {
            margin: 14px 0 0;
            color: #475569;
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
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(148, 163, 184, 0.16);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.75);
        }

        .page-card h2 {
            margin: 0 0 10px;
            font-size: 1rem;
        }

        .page-card p {
            margin: 0;
            color: #475569;
            line-height: 1.65;
        }

        .page-card--featured {
            grid-column: span 6;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.86), rgba(238, 242, 255, 0.88));
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
                border-radius: 22px;
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
            color: #1c1c1a;
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
