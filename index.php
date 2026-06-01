<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Bucătarul de Serviciu - Rețete în Română</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Puter.js - AI fara API key -->
    <script src="https://js.puter.com/v2/"></script>

    <style>
        :root {
            --bg: #0f1210;
            --bg2: #18130d;
            --card: rgba(255, 250, 240, .94);
            --card-soft: rgba(255, 255, 255, .72);
            --text: #25170f;
            --muted: #75675d;
            --cream: #fff7ea;
            --cream2: #f8ead4;
            --accent: #b3561c;
            --accent2: #f0a63b;
            --accent3: #2f7d57;
            --red: #b3261e;
            --blue: #255f85;
            --border: rgba(109, 82, 52, .16);
            --shadow: 0 30px 90px rgba(26, 15, 7, .24);
            --shadow-soft: 0 18px 50px rgba(26, 15, 7, .14);
            --radius-xl: 34px;
            --radius-lg: 24px;
            --radius-md: 18px;
            --font: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: var(--font);
            color: var(--text);
            background:
                radial-gradient(circle at 12% 8%, rgba(240, 166, 59, .34), transparent 26%),
                radial-gradient(circle at 88% 4%, rgba(47, 125, 87, .22), transparent 28%),
                radial-gradient(circle at 50% 100%, rgba(179, 86, 28, .20), transparent 38%),
                linear-gradient(135deg, #0f1210 0%, #1b120c 45%, #26170e 100%);
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: -1;
            opacity: .18;
            background-image:
                linear-gradient(rgba(255,255,255,.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.06) 1px, transparent 1px);
            background-size: 52px 52px;
            mask-image: linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,.25));
        }

        .wrap {
            width: min(1220px, calc(100% - 32px));
            margin: 0 auto;
            padding: 28px 0 70px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
            color: rgba(255,255,255,.88);
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-weight: 950;
            letter-spacing: .3px;
        }

        .logo-mark {
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 24px;
            background: linear-gradient(135deg, #f0a63b, #b3561c);
            box-shadow: 0 14px 38px rgba(240, 166, 59, .25);
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.16);
            backdrop-filter: blur(12px);
            font-size: 14px;
            font-weight: 800;
        }

        .status-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #5bff9a;
            box-shadow: 0 0 0 6px rgba(91,255,154,.12);
        }

        .hero {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-xl);
            padding: clamp(22px, 4vw, 42px);
            background:
                linear-gradient(135deg, rgba(255,250,240,.98), rgba(255,236,205,.94)),
                linear-gradient(135deg, rgba(255,255,255,.4), rgba(255,255,255,0));
            border: 1px solid rgba(255,255,255,.55);
            box-shadow: var(--shadow);
        }

        .hero::after {
            content: "";
            position: absolute;
            right: -90px;
            top: -120px;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background:
                radial-gradient(circle, rgba(240,166,59,.36), rgba(179,86,28,.03) 65%, transparent 70%);
            pointer-events: none;
        }

        .hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, .95fr) minmax(420px, 1.25fr);
            gap: clamp(20px, 4vw, 36px);
            align-items: start;
        }

        .intro {
            padding: 4px 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            border-radius: 999px;
            color: #73320f;
            background: rgba(255, 225, 176, .92);
            border: 1px solid rgba(179, 86, 28, .15);
            font-size: 15px;
            font-weight: 950;
            margin-bottom: 18px;
        }

        .eyebrow span {
            font-size: 19px;
        }

        h1 {
            margin: 0 0 14px;
            font-size: clamp(42px, 5.2vw, 76px);
            line-height: .96;
            letter-spacing: -2.4px;
            color: #2b160b;
        }

        .subtitle {
            margin: 0;
            color: #69584b;
            font-size: clamp(14px, 1.8vw, 18px);
            line-height: 1.55;
            max-width: 560px;
        }

        .feature-list {
            display: grid;
            gap: 12px;
            margin-top: 24px;
        }

        .feature {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: #49372b;
            font-size: 14px;
            line-height: 1.4;
        }

        .feature-icon {
            width: 32px;
            height: 32px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            flex: 0 0 auto;
            background: rgba(47, 125, 87, .12);
            color: #2f7d57;
            font-weight: 950;
        }

        .form-card {
            border-radius: 28px;
            background: rgba(255, 253, 248, .86);
            border: 1px solid rgba(109, 82, 52, .14);
            box-shadow: var(--shadow-soft);
            padding: clamp(18px, 3vw, 26px);
            backdrop-filter: blur(12px);
        }

        form {
            display: grid;
            gap: 18px;
        }

        .field {
            display: grid;
            gap: 8px;
        }

        label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            font-size: 15px;
            font-weight: 950;
            color: #3a281d;
            letter-spacing: .2px;
        }

        .label-hint {
            color: #9a8778;
            font-size: 12px;
            font-weight: 800;
        }

        textarea,
        input,
        select {
            width: 100%;
            border: 1px solid rgba(109, 82, 52, .18);
            background: rgba(255, 255, 255, .88);
            border-radius: var(--radius-md);
            color: var(--text);
            padding: 16px 17px;
            font-size: 17px;
            outline: none;
            box-shadow: inset 0 1px 0 rgba(255,255,255,.85);
            transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease, background .2s ease;
        }

        textarea {
            min-height: 122px;
            resize: vertical;
            line-height: 1.5;
        }

        textarea:focus,
        input:focus,
        select:focus {
            border-color: rgba(240, 166, 59, .88);
            box-shadow: 0 0 0 5px rgba(240, 166, 59, .16);
            background: #fff;
        }

        select {
            appearance: none;
            background-image:
                linear-gradient(45deg, transparent 50%, #8c5a2a 50%),
                linear-gradient(135deg, #8c5a2a 50%, transparent 50%);
            background-position:
                calc(100% - 20px) 50%,
                calc(100% - 14px) 50%;
            background-size: 6px 6px, 6px 6px;
            background-repeat: no-repeat;
            padding-right: 42px;
        }

        .row {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 2px;
        }

        .checks {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .check {
            display: flex;
            align-items: center;
            gap: 11px;
            min-height: 58px;
            padding: 14px;
            background: rgba(255,255,255,.72);
            border: 1px solid rgba(109, 82, 52, .17);
            border-radius: var(--radius-md);
            font-size: 15px;
            font-weight: 900;
            cursor: pointer;
            transition: transform .18s ease, border-color .18s ease, background .18s ease, box-shadow .18s ease;
        }

        .check:hover {
            transform: translateY(-1px);
            background: #fff;
            border-color: rgba(240, 166, 59, .45);
            box-shadow: 0 12px 28px rgba(62,39,18,.08);
        }

        .check input {
            width: 22px;
            height: 22px;
            accent-color: var(--accent);
            flex: 0 0 auto;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            margin-top: 4px;
        }

        button,
        .print-btn {
            border: 0;
            border-radius: 18px;
            padding: 17px 24px;
            color: white;
            font-size: 17px;
            font-weight: 950;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 58px;
            transition: transform .18s ease, filter .18s ease, box-shadow .18s ease;
        }

        button {
            background: linear-gradient(135deg, #b3561c, #e37d2b 55%, #f0a63b);
            box-shadow: 0 18px 38px rgba(179, 86, 28, .28);
        }

        .print-btn {
            background: linear-gradient(135deg, #245f85, #3c93bf);
            box-shadow: 0 18px 38px rgba(36, 95, 133, .20);
        }

        button:hover,
        .print-btn:hover {
            transform: translateY(-2px);
            filter: brightness(1.03);
        }

        button:disabled {
            opacity: .68;
            cursor: wait;
            transform: none;
        }

        .note {
            margin-top: 2px;
            border-radius: 18px;
            padding: 14px 16px;
            color: #6e5c4e;
            font-size: 14px;
            line-height: 1.45;
            background: rgba(255, 246, 230, .88);
            border: 1px solid rgba(240, 166, 59, .18);
        }

        .loading,
        .error,
        .recipe {
            margin-top: 24px;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
        }

        .loading {
            display: none;
            padding: 24px;
            color: #fff7ea;
            border: 1px solid rgba(255,255,255,.16);
            background: rgba(255,255,255,.10);
            backdrop-filter: blur(14px);
        }

        .loader-line {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 19px;
            font-weight: 950;
        }

        .spinner {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 3px solid rgba(255,255,255,.22);
            border-top-color: #f0a63b;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .error {
            display: none;
            padding: 22px 24px;
            background: #fff0ed;
            border: 2px solid #ffc5bd;
            color: var(--red);
            font-size: 17px;
            font-weight: 900;
        }

        .recipe {
            display: none;
            overflow: hidden;
            background: var(--card);
            border: 1px solid rgba(255,255,255,.52);
        }

        .recipe-head {
            padding: clamp(22px, 4vw, 34px);
            background:
                radial-gradient(circle at top right, rgba(240,166,59,.34), transparent 32%),
                linear-gradient(135deg, #fffaf2, #ffe7bd);
            border-bottom: 1px solid rgba(109,82,52,.12);
        }

        .recipe-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding: 9px 13px;
            border-radius: 999px;
            background: rgba(47, 125, 87, .12);
            color: #2f7d57;
            font-size: 14px;
            font-weight: 950;
        }

        .recipe h2 {
            margin: 0 0 10px;
            font-size: clamp(34px, 4vw, 58px);
            color: #351b0e;
            line-height: 1.02;
            letter-spacing: -1.3px;
        }

        .desc {
            font-size: clamp(18px, 2vw, 21px);
            line-height: 1.6;
            color: var(--muted);
            max-width: 920px;
        }

        .badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 20px 0 0;
        }

        .badge {
            background: rgba(255,255,255,.70);
            color: #6c2c0f;
            border: 1px solid rgba(179, 86, 28, .16);
            padding: 10px 14px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 950;
            box-shadow: 0 8px 18px rgba(62,39,18,.06);
        }

        .sections {
            display: grid;
            gap: 18px;
            padding: clamp(18px, 3vw, 28px);
        }

        .two-col {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .box {
            position: relative;
            overflow: hidden;
            background: rgba(255,255,255,.78);
            border: 1px solid rgba(109,82,52,.13);
            border-radius: var(--radius-lg);
            padding: 22px;
            box-shadow: 0 14px 32px rgba(62,39,18,.07);
        }

        .box::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 5px;
            background: linear-gradient(180deg, #f0a63b, #b3561c);
            opacity: .8;
        }

        .box h3 {
            margin: 0 0 14px;
            padding-left: 2px;
            font-size: 22px;
            color: #3d1f10;
            letter-spacing: -.3px;
        }

        ul {
            margin: 0;
            padding-left: 24px;
        }

        li {
            font-size: 17px;
            line-height: 1.58;
            margin: 8px 0;
        }

        .step {
            position: relative;
            background: linear-gradient(135deg, rgba(255,250,242,.98), rgba(255,246,230,.94));
            border: 1px solid rgba(109, 82, 52, .13);
            border-radius: 20px;
            padding: 18px 18px 18px 20px;
            margin: 12px 0;
            box-shadow: 0 10px 24px rgba(62,39,18,.06);
        }

        .step-title {
            font-size: 19px;
            font-weight: 950;
            color: #351b0e;
            margin-bottom: 7px;
        }

        .step-time {
            display: inline-block;
            margin-top: 10px;
            color: #6c2c0f;
            background: #ffe6bd;
            border: 1px solid rgba(179,86,28,.12);
            border-radius: 999px;
            padding: 7px 11px;
            font-weight: 900;
            font-size: 13px;
        }

        .green {
            border-color: rgba(47, 125, 87, .20);
            background: #f3fff2;
        }

        .green::before {
            background: linear-gradient(180deg, #5bbf75, #2f7d57);
        }

        .warn {
            border-color: rgba(179, 38, 30, .20);
            background: #fff5f3;
        }

        .warn::before {
            background: linear-gradient(180deg, #ff8a7d, #b3261e);
        }

        .warn h3 {
            color: var(--red);
        }

        .quick {
            font-size: 18px;
            line-height: 1.58;
            background: #f4ffe9;
            border-color: rgba(47, 125, 87, .18);
        }

        .raw {
            display: none;
            margin-top: 20px;
            color: rgba(255,255,255,.82);
        }

        summary {
            cursor: pointer;
            font-weight: 900;
        }

        pre {
            white-space: pre-wrap;
            overflow: auto;
            background: #1f150f;
            color: #fff3df;
            padding: 16px;
            border-radius: 16px;
        }

        .footer {
            margin-top: 18px;
            color: rgba(255,255,255,.62);
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 1040px) {
            .hero-grid {
                grid-template-columns: 1fr;
            }

            .intro {
                max-width: 760px;
            }
        }

        @media (max-width: 820px) {
            .wrap {
                width: min(100% - 20px, 1220px);
                padding-top: 16px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .row,
            .checks,
            .two-col {
                grid-template-columns: 1fr;
            }

            .hero,
            .recipe,
            .loading,
            .error {
                border-radius: 24px;
            }

            h1 {
                font-size: clamp(38px, 12vw, 56px);
            }

            button,
            .print-btn {
                width: 100%;
            }

            .logo-mark {
                width: 40px;
                height: 40px;
            }
        }

        @media print {
            body {
                background: white;
            }

            body::before,
            .topbar,
            .hero,
            .note,
            .actions,
            .error,
            .loading,
            .raw,
            .footer {
                display: none !important;
            }

            .wrap {
                width: 100%;
                padding: 0;
            }

            .recipe,
            .box,
            .step {
                box-shadow: none;
            }

            .recipe {
                display: block !important;
                border: 0;
            }

            .recipe-head,
            .sections {
                padding: 18px;
            }
        }
    </style>
</head>
<body>
<div class="wrap">

    <header class="topbar">
        <div class="logo">
            <div class="logo-mark">🍲</div>
            <div>
                <div>Bucătarul de Serviciu</div>
                <small style="opacity:.72;font-weight:800;">Rețete rapide, clare, în română</small>
            </div>
        </div>

        <div class="status-pill">
            <span class="status-dot"></span>
            Bucătarul este conectat
        </div>
    </header>

    <section class="hero">
        <div class="hero-grid">
            <div class="intro">
                <div class="eyebrow"><span>✦</span> Generator inteligent de rețete</div>

                <h2>Ce gătiți astăzi?</h2>

                <p class="subtitle">
                    Scrieți ingredientele pe care le aveți în casă, alegeți preferințele, iar aplicația va genera rețeta.
                </p>

                <div class="feature-list">
                    <div class="feature">
                        <div class="feature-icon">1</div>
                        <div><strong>Ingrediente din casă.</strong><br>Pornește de la ce aveți deja, fără liste complicate.</div>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">2</div>
                        <div><strong>Pași clari.</strong><br>Explicații simple, potrivite și pentru părinți sau bunici.</div>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">3</div>
                        <div><strong>Gata de printat.</strong><br>Rețeta se poate lista curat, fără formular și fără elemente inutile.</div>
                    </div>
                </div>
            </div>

            <div class="form-card">
                <form id="recipeForm">
                    <div class="field">
                        <label for="ingredients">
                            Ingrediente disponibile
                            <span class="label-hint">* obligatoriu</span>
                        </label>
                        <textarea
                            id="ingredients"
                            placeholder="Exemplu: cartofi, ouă, ceapă, brânză, roșii, piept de pui"
                        ></textarea>
                    </div>

                    <div class="field">
                        <label for="details">
                            Detalii opționale
                            <span class="label-hint">gust, restricții, preferințe</span>
                        </label>
                        <textarea
                            id="details"
                            placeholder="Exemplu: să fie ușor de mestecat, fără prăjeli, avem cuptor, să nu fie picant, să nu fie foarte sărat"
                        ></textarea>
                    </div>

                    <div class="row">
                        <div class="field">
                            <label for="difficulty">Dificultate</label>
                            <select id="difficulty">
                                <option value="foarte ușor">Foarte ușor</option>
                                <option value="ușor">Ușor</option>
                                <option value="mediu">Mediu</option>
                            </select>
                        </div>

                        <div class="field">
                            <label for="time">Timp</label>
                            <select id="time">
                                <option value="15-20 minute">15-20 minute</option>
                                <option value="30-45 minute">30-45 minute</option>
                                <option value="aproximativ 1 oră">~ 1 oră</option>
                                <option value="nu contează" selected>nu contează</option>
                            </select>
                        </div>

                        <div class="field">
                            <label for="servings">Porții</label>
                            <input id="servings" value="2" placeholder="2">
                        </div>

                        <div class="field">
                            <label for="style">Stil</label>
                            <select id="style">
                                <option value="mâncare românească simplă">Mâncare simplă</option>
                                <option value="mâncare de post">Mâncare de post</option>
                                <option value="mic dejun">Mic dejun</option>
                                <option value="prânz">Prânz</option>
                                <option value="cină ușoară">Cină ușoară</option>
                                <option value="supă sau ciorbă">Supă sau ciorbă</option>
                                <option value="mâncare la cuptor">Mâncare la cuptor</option>
                            </select>
                        </div>
                    </div>

                    <div class="checks">
                        <label class="check">
                            <input type="checkbox" id="avoidFrying">
                            Fără prăjeli
                        </label>

                        <label class="check">
                            <input type="checkbox" id="softFood">
                            Ușor de mestecat
                        </label>

                        <label class="check">
                            <input type="checkbox" id="lowSalt">
                            Cu sare puțină
                        </label>
                    </div>

                    <div class="actions">
                        <button type="submit" id="generateBtn">Generare rețeta</button>
                        <a href="javascript:window.print()" class="print-btn" id="printBtn" style="display:none;">Printare rețeta</a>
                    </div>

                    <div class="note">
                    Prima utilizare poate cere autentificare Puter în browser, în funcție de model și limitări. <b>Dacă este nevoie de autentificare, vă puteți autentifica cu contul dvs. Google</b>
Sfat: pentru copii, persoane vârstnice, puteți specifica și observații de genul: „să fie ușor de mestecat”, „fără multă sare”, „fără prăjit”.
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="loading" id="loadingBox">
        <div class="loader-line">
            <span class="spinner"></span>
            <span>Se pregătește rețeta....</span>
        </div>
    </div>

    <div class="error" id="errorBox"></div>

    <details class="raw" id="rawBox">
        <summary>Răspuns brut AI</summary>
        <pre id="rawText"></pre>
    </details>

    <article class="recipe" id="recipeBox">
        <div class="recipe-head">
            <div class="recipe-kicker">Rețeta a fost generată</div>
            <h2 id="title"></h2>
            <div class="desc" id="description"></div>

            <div class="badges">
                <div class="badge" id="badgeTotal"></div>
                <div class="badge" id="badgePrep"></div>
                <div class="badge" id="badgeCook"></div>
                <div class="badge" id="badgeServings"></div>
                <div class="badge" id="badgeDifficulty"></div>
            </div>
        </div>

        <div class="sections" id="sections"></div>
    </article>

    <div class="footer">
        Bucătarul de Serviciu · 2026 @ Cogian Sergiu
    </div>

</div>

<script>
function escapeHtml(value) {
    return String(value ?? "")
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;")
        .replaceAll('"', "&quot;")
        .replaceAll("'", "&#039;");
}

function asArray(value) {
    return Array.isArray(value) ? value : [];
}

function safeText(value, fallback = "") {
    if (value === null || value === undefined) return fallback;
    if (typeof value === "string" || typeof value === "number" || typeof value === "boolean") {
        return String(value);
    }
    return fallback;
}

function listHtml(items) {
    const arr = asArray(items);

    if (arr.length === 0) {
        return "<p style='font-size:17px;margin:0;color:#75675d;'>Nu este cazul.</p>";
    }

    return "<ul>" + arr.map(item => "<li>" + escapeHtml(item) + "</li>").join("") + "</ul>";
}

function box(title, content, extraClass = "") {
    return `
        <section class="box ${extraClass}">
            <h3>${escapeHtml(title)}</h3>
            ${content}
        </section>
    `;
}

function extractJson(text) {
    let cleaned = String(text || "").trim();

    cleaned = cleaned.replace(/^```json\s*/i, "");
    cleaned = cleaned.replace(/^```\s*/i, "");
    cleaned = cleaned.replace(/\s*```$/i, "");
    cleaned = cleaned.trim();

    try {
        return JSON.parse(cleaned);
    } catch (e) {}

    const start = cleaned.indexOf("{");
    const end = cleaned.lastIndexOf("}");

    if (start !== -1 && end !== -1 && end > start) {
        const jsonPart = cleaned.substring(start, end + 1);
        try {
            return JSON.parse(jsonPart);
        } catch (e) {}
    }

    return null;
}

function buildPrompt() {
    const ingredients = document.getElementById("ingredients").value.trim();
    const details = document.getElementById("details").value.trim();
    const difficulty = document.getElementById("difficulty").value;
    const time = document.getElementById("time").value;
    const servings = document.getElementById("servings").value.trim() || "2";
    const style = document.getElementById("style").value;

    const rules = [];

    if (document.getElementById("avoidFrying").checked) {
        rules.push("Evită prăjelile. Preferă fiert, copt, înăbușit sau la cuptor.");
    }

    if (document.getElementById("softFood").checked) {
        rules.push("Rețeta trebuie să fie ușor de mestecat, potrivită pentru persoane mai în vârstă.");
    }

    if (document.getElementById("lowSalt").checked) {
        rules.push("Folosește sare puțină și spune că sarea se poate ajusta la final.");
    }

    const rulesText = rules.length ? rules.map(r => "- " + r).join("\n") : "- Nu există restricții bifate.";

    return `
Ești un bucătar român calm, practic și foarte clar.
Scrii pentru părinții utilizatorului, deci explici simplu, cu pași ușor de urmat.
Tot răspunsul trebuie să fie 100% în limba română.

IMPORTANT:
Răspunde DOAR cu JSON valid.
Nu folosi markdown.
Nu pune text înainte sau după JSON.
Nu pune \`\`\`json.

Ingredientele disponibile în casă:
${ingredients}

Detalii suplimentare:
${details}

Preferințe:
- Dificultate: ${difficulty}
- Timp disponibil: ${time}
- Număr de porții: ${servings}
- Stil de mâncare: ${style}

Reguli suplimentare:
${rulesText}

Reguli pentru rețetă:
- Folosește în principal ingredientele introduse de utilizator.
- Ai voie să presupui doar ingrediente de bază: apă, sare, piper, ulei, zahăr, făină, oțet, ceapă, usturoi, boia, verdeață.
- Dacă lipsește ceva important, pune-l la "ingrediente_care_ar_ajuta".
- Nu recomanda ingrediente exotice sau greu de găsit.
- Explică fiecare pas ca pentru cineva care nu gătește des.
- Include temperaturi, foc mic/mediu/mare și timp aproximativ unde are sens.
- Dacă apare carne, ou, pește sau lactate, include atenționări de siguranță alimentară.
- Nu da sfaturi medicale.
- Nu recomanda consum de alimente alterate.
- Nu spune că ești AI.

Schema JSON obligatorie:
{
  "titlu": "string",
  "descriere": "string",
  "timp_total": "string",
  "timp_pregatire": "string",
  "timp_gatire": "string",
  "portii": "string",
  "dificultate": "string",
  "ingrediente_principale": ["string"],
  "ingrediente_de_baza_presupuse": ["string"],
  "ingrediente_care_ar_ajuta": ["string"],
  "ustensile": ["string"],
  "pasi": [
    {
      "titlu": "string",
      "explicatie": "string",
      "durata": "string"
    }
  ],
  "cum_iti_dai_seama_ca_e_gata": ["string"],
  "sfaturi_pentru_parinti": ["string"],
  "atentionari": ["string"],
  "varianta_rapida": "string",
  "cum_se_pastreaza": "string",
  "idee_de_servire": "string"
}
`;
}

function renderRecipe(recipe) {
    document.getElementById("title").textContent = safeText(recipe.titlu, "Rețetă propusă");
    document.getElementById("description").textContent = safeText(recipe.descriere, "");

    document.getElementById("badgeTotal").textContent = "Timp total: " + safeText(recipe.timp_total, "aproximativ");
    document.getElementById("badgePrep").textContent = "Pregătire: " + safeText(recipe.timp_pregatire, "-");
    document.getElementById("badgeCook").textContent = "Gătire: " + safeText(recipe.timp_gatire, "-");
    document.getElementById("badgeServings").textContent = "Porții: " + safeText(recipe.portii, "-");
    document.getElementById("badgeDifficulty").textContent = "Dificultate: " + safeText(recipe.dificultate, "-");

    let stepsHtml = "";

    asArray(recipe.pasi).forEach((step, index) => {
        if (typeof step === "object" && step !== null) {
            stepsHtml += `
                <div class="step">
                    <div class="step-title">${index + 1}. ${escapeHtml(safeText(step.titlu, "Pas"))}</div>
                    <div style="font-size:17px;line-height:1.58;">${escapeHtml(safeText(step.explicatie, ""))}</div>
                    ${safeText(step.durata, "") ? `<span class="step-time">${escapeHtml(step.durata)}</span>` : ""}
                </div>
            `;
        } else {
            stepsHtml += `
                <div class="step">
                    <div class="step-title">${index + 1}. Pas</div>
                    <div style="font-size:17px;line-height:1.58;">${escapeHtml(step)}</div>
                </div>
            `;
        }
    });

    if (!stepsHtml) {
        stepsHtml = "<p style='font-size:17px;margin:0;color:#75675d;'>Nu s-au primit pași de preparare.</p>";
    }

    let html = "";

    html += `
        <div class="two-col">
            ${box("Ingrediente principale", listHtml(recipe.ingrediente_principale))}
            ${box("Ingrediente de bază presupuse", listHtml(recipe.ingrediente_de_baza_presupuse))}
        </div>
    `;

    html += box("Ingrediente care ar ajuta", listHtml(recipe.ingrediente_care_ar_ajuta));
    html += box("Ustensile necesare", listHtml(recipe.ustensile));
    html += box("Pași de preparare", stepsHtml);
    html += box("Cum vă dați seama că e gata", listHtml(recipe.cum_iti_dai_seama_ca_e_gata), "green");
    html += box("Sfaturi utile pentru părinți", listHtml(recipe.sfaturi_pentru_parinti));

    if (safeText(recipe.varianta_rapida, "")) {
        html += box("Variantă rapidă", `<p style="font-size:18px;line-height:1.58;margin:0;">${escapeHtml(recipe.varianta_rapida)}</p>`, "quick");
    }

    html += `
        <div class="two-col">
            ${box("Cum se păstrează", `<p style="font-size:17px;line-height:1.58;margin:0;">${escapeHtml(safeText(recipe.cum_se_pastreaza, "Nu este specificat."))}</p>`)}
            ${box("Idee de servire", `<p style="font-size:17px;line-height:1.58;margin:0;">${escapeHtml(safeText(recipe.idee_de_servire, "Nu este specificat."))}</p>`)}
        </div>
    `;

    html += box("Atenționări", listHtml(recipe.atentionari), "warn");

    document.getElementById("sections").innerHTML = html;

    document.getElementById("recipeBox").style.display = "block";
    document.getElementById("printBtn").style.display = "inline-flex";
}

document.getElementById("recipeForm").addEventListener("submit", async function (event) {
    event.preventDefault();

    const ingredients = document.getElementById("ingredients").value.trim();
    const errorBox = document.getElementById("errorBox");
    const loadingBox = document.getElementById("loadingBox");
    const recipeBox = document.getElementById("recipeBox");
    const rawBox = document.getElementById("rawBox");
    const rawText = document.getElementById("rawText");
    const button = document.getElementById("generateBtn");

    errorBox.style.display = "none";
    recipeBox.style.display = "none";
    rawBox.style.display = "none";
    rawText.textContent = "";
    document.getElementById("printBtn").style.display = "none";

    if (!ingredients) {
        errorBox.textContent = "Scrieți măcar câteva ingrediente.";
        errorBox.style.display = "block";
        return;
    }

    loadingBox.style.display = "block";
    button.disabled = true;
    button.textContent = "Se generează...";

    try {
        const prompt = buildPrompt();

        const response = await puter.ai.chat(prompt, {
            model: "gpt-5-nano"
        });

        let text = "";

        if (typeof response === "string") {
            text = response;
        } else if (response && typeof response.message === "string") {
            text = response.message;
        } else if (response && response.message && typeof response.message.content === "string") {
            text = response.message.content;
        } else if (response && typeof response.text === "string") {
            text = response.text;
        } else {
            text = JSON.stringify(response, null, 2);
        }

        rawText.textContent = text;

        const recipe = extractJson(text);

        if (!recipe) {
            rawBox.style.display = "block";
            throw new Error("AI-ul a răspuns, dar nu am putut citi JSON-ul. Vedeți răspunsul brut de mai jos.");
        }

        renderRecipe(recipe);

        window.scrollTo({
            top: document.getElementById("recipeBox").offsetTop - 20,
            behavior: "smooth"
        });

    } catch (error) {
        errorBox.textContent = "Eroare: " + (error.message || error);
        errorBox.style.display = "block";
    } finally {
        loadingBox.style.display = "none";
        button.disabled = false;
        button.textContent = "Generare rețeta";
    }
});
</script>
</body>
</html>
