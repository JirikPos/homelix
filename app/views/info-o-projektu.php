<!DOCTYPE html>
<html lang="cs">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Posavád, Skřivan, Vozka" />
  <meta name="keywords" content="smart home, chytrá domácnost, automatizace, inteligentní domácnost" />
  <meta name="description" content="Objevte moderní chytrou domácnost s Homelix. Řešení pro bezpečnost, komfort a úsporu energie – vše ovládané jednoduše přes mobil nebo hlasem." />
  <title>O projektu</title>
  <link rel="shortcut icon" href="../../public/assets/images/icon.png" type="image/png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../public/css/style.css" />
  <script defer src="../../public/js/cursor.js"></script>
</head>

<body>
  <header>
    <div class="frame-parent">
      <div class="homelix-parent">
        <img class="homelix-logo" src="../../public/assets/images/logo.png" alt="Logo Homelix" />
      </div>
      <nav class="nav-bar">
        <div class="ovldac-panel-parent">
          <div class="ovldac-panel">
            <a class="nav-link" href="./dashboard">Ovládací panel</a>
          </div>
          <img class="nav-icon" src="../../public/assets/icons/house.svg" alt="Ikona panelu" />
        </div>
        <div class="nav-bar-divider"></div>
        <div class="o-projektu-parent">
          <div class="o-projektu">
            <a class="nav-link active" href="./info-o-projektu">O projektu</a>
          </div>
          <img class="nav-icon" src="../../public/assets/icons/about.svg" alt="Ikona info" />
        </div>
      </nav>
      <div class="card">
        <!-- <img class="nav-icon" src="../../public/assets/icons/settings.svg" alt="Ikona nastavení" /> -->
      </div>
    </div>
  </header>

  <main>
    <div class="card">
      <h1>Homelix – Inteligentní správa domácnosti</h1>

      <section>
        <h2>Popis projektu</h2>
        <p>
          Homelix je webová aplikace pro komplexní správu chytré domácnosti. Umožňuje uživatelům vzdáleně ovládat zařízení,
          jako je osvětlení, ventilace a další periferie. Sleduje aktuální hodnoty senzorů (teplota, vlhkost, pohyb, kvalita ovzduší)
          a v reálném čase vyhodnocuje bezpečnostní situace. Při hrozbě, jako je únik vody nebo pohyb v režimu „nepřítomnost“,
          systém automaticky spustí výstrahu a upozorní vlastníka. Data jsou sbírána pomocí Arduina, ukládána do databáze
          a vizualizována v přehledném dashboardu.
        </p>
      </section>

      <section>
        <h2>Klíčové funkce</h2>
        <ul>
          <li>Ovládání osvětlení a dalších zařízení</li>
          <li>Sledování kvality ovzduší</li>
          <li>Monitoring teploty a vlhkosti</li>
          <li>Detekce pohybu pomocí PIR senzorů</li>
          <li>Výstrahy při úniku vody</li>
          <li>Zvukové a vizuální notifikace</li>
          <li>Možnost definice a aktivace scén (např. Noc, Odchod)</li>
          <li>Automatizace režimů dle aktuální situace</li>
        </ul>
      </section>

      <section>
        <h2>Rozdělení práce v týmu</h2>
        <ul>
          <li>
            <h3>Jiří Posavád – Vedoucí týmu, Backend (SQL, PHP), Architekt řešení</h3>
            <p>
              Jiří měl na starosti vedení celého vývoje projektu Homelix. Navrhl architekturu systému, včetně návrhu databázového schématu,
              logiky backendu a komunikačního rozhraní mezi senzory a aplikací. Implementoval většinu aplikační logiky v PHP, včetně správy senzorových dat,
              vyhodnocování bezpečnostních událostí, alarmového systému a automatizace scén. Zajistil také přenos dat z mikrokontrolérů (Arduino) do databáze
              a vytvořil jednotný datový tok v celém systému.
            </p>
          </li>
          <li>
            <h3>Jan Skřivan – Frontend design (CSS)</h3>
            <p>
              Vytvořil kompletní vizuální podobu aplikace. Na základě návrhu ve Figmě připravil responzivní UI pomocí CSS,
              včetně typografie, barevného schématu a rozvržení komponent.
            </p>
          </li>
          <li>
            <h3>Tomáš Vozka – HTML struktura</h3>
            <p>
              Navrhl a vytvořil HTML strukturu aplikace. Zajišťoval přehledné rozvržení dashboardu, navigace a interaktivních prvků
              s důrazem na přístupnost a použitelnost.
            </p>
          </li>
        </ul>
      </section>

    </div>
  </main>


  <footer class="footer-bar">
    ©
    <a href="https://www.instagram.com/jirik_pos/">Posavád</a> |
    <a href="https://www.instagram.com/poldacz/">Skřivan</a> |
    <a href="https://www.instagram.com/tomvozka">Vozka</a> |
    2025
  </footer>
</body>

</html>