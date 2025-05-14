<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/style.css">
  <meta name="author" content="Posavád, Skřivan, Vozka">
  <meta name="keywords" content="smart hone, chytrá domácnost, automatizace, inteligentní domácnost">
  <meta name="description"
    content="Objevte moderní chytrou domácnost s Homelix. Řešení pro bezpečnost, komfort a úsporu energie – vše ovládané jednoduše přes mobil nebo hlasem.">
  <title>O projektu</title>
</head>

<body>
  <header>
    <div class="frame-parent">
      <div class="homelix-parent">
        <div class="homelix">Homelix</div>
      </div>
      <div class="nav-bar">
        <div class="o-projektu-parent">
          <div class="o-projektu"><a class="nav-link active" href="./info-o-projektu">O projektu</a></div>
          <img class="nav-icon" alt="" src="../../public/assets/icons/about.svg">
        </div>
        <div class="nav-bar-divider">
        </div>
        <div class="ovldac-panel-parent">
          <div class="ovldac-panel"><a class="nav-link" href="./dashboard">Ovládací panel</a></div>
          <img class="nav-icon" alt="" src="../../public/assets/icons/house.svg">
        </div>
      </div>
      <div class="card">
        <img class="nav-icon" alt="" src="../../public/assets/icons/settings.svg">
      </div>
    </div>
  </header>
  <main>
    <div class="main-content">
      <h1>Homelix - Správa chytré domácnosti</h1>
      <h2>Popis projektu:</h2>
      <p>Homelix je webová aplikace pro správu chytré domácnosti, která umožňuje uživatelům ovládat zařízení jako
        osvětlení, teplotu, vlhkost, pohybová čidla a monitorovat kvalitu ovzduší. Aplikace také poskytuje varování při
        úniku vody a nabízí zvukové výstrahy. Systém shromažďuje data ze senzorů (pomocí Arduina) a ukládá je do
        databáze a poté je zobrazuje v dashboard.</p>
      <h2>Hlavní funkce:</h2>
      <ul>
        <li>Ovládání osvětlení</li>
        <li>Měření kvality ovzduší</li>
        <li>Sledování teploty a vlhkosti</li>
        <li>Pohybová čidla</li>
        <li>Varování při úniku vody</li>
        <li>Zvuková výstraha</li>
        <li>Možnost přidávat scény</li>
        <li>Zapínání různých režimů</li>
      </ul>
      <h2>Rozdělení úkolů:</h2>
      <ul>
        <li>
          <h3>Jirka Posavád - SQL/PHP (Vedoucí)</h3>
        </li>

        <p>Měl v rámci projektu na starosti návrh a vytvoření databáze, která slouží k ukládání údajů naměřených
          hodnotách
          ze senzorů. Kromě toho naprogramoval Arduino, který sbírá data ze senzoru (např. teplota,
          vlhkost, kvalita ovzduší, pohyb) a zajišťuje jejich přenos do databáze.</p>
        <li>
          <h3>Jan Skřivan - CSS</h3>
        </li>
        <p>Měl v rámci projektu na starosti návrh a realizaci vzhledu webové aplikace. Vytvořil grafický návrh
          uživatelského rozhraní ve Figmě a následně ho převedl do kódu pomocí CSS. Zajišťovala konzistentní vizuální
          styl
          aplikace, barevné schéma, rozvržení komponent.</p>
        <li>
          <h3>Tomáš Vozka - HTML</h3>
        </li>
        <p>Měl v rámci projektu na starosti tvorbu HTML struktury webové aplikace. Vytvořil všechny potřebné HTML
          soubory,
          které definují
          strukturu jednotlivých stránek, dashboard pro zobrazení dat ze senzorů,
          ovládací prvky pro zařízení a další interaktivní části aplikace.</p>
      </ul>
    </div>
  </main>
  <footer class="footer-bar">
    © <a href="https://www.instagram.com/jirik_pos/">Posavád</a> | <a
      href="https://www.instagram.com/poldacz/">Skřivan</a> | <a href="https://www.instagram.com/tomvozka">Vozka</a> |
    2025
  </footer>
</body>

</html>