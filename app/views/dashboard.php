<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, width=device-width">
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
  <title>Dashboard</title>
</head>

<body>
  <header>
    <div class="frame-parent">
      <div class="homelix-parent">
        <div class="homelix">Homelix</div>
      </div>
      <div class="nav-bar">
        <div class="o-projektu-parent">
          <div class="o-projektu"><a class="nav-link" href="./info-o-projektu.html">O projektu</a></div>
          <img class="nav-icon" alt="" src="../../public/assets/icons/about.svg">
        </div>
        <div class="nav-bar-divider">
        </div>
        <div class="ovldac-panel-parent">
          <div class="ovldac-panel"><a class="nav-link active" href="./dashboard.html">Ovládací panel</a></div>
          <img class="nav-icon" alt="" src="../../public/assets/icons/house.svg">
        </div>
      </div>
      <div class="card">
        <img class="nav-icon" alt="" src="../../public/assets/icons/settings.svg">
      </div>
    </div>
  </header>
  <div>
    <main>
      <div class="dashboard-columns">
        <div class="column">
          <div class="card">
            <div class="card-header">
              <span>Kvalita ovzduší</span>
              <label class="switch">
                <input type="checkbox">
                <span class="slider"></span>
              </label>
            </div>
            <div class="card-value alert">
              <span class="alert">1500</span>
              <img src="../../public/assets/icons/warning.svg" alt="Varování" class="widget-icon">
            </div>
            <div class="card-footer">
              <span class="description">Index kvality ovzduší</span>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <span>Teplota a vlhkost</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-value">25 °C</div>
            <div class="card-footer">
              <span class="description">Aktuální teplota</span>
            </div>
            <div class="card-value">50 %</div>
            <div class="card-footer">
              <span class="description">Aktuální vlhkost</span>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="card-header">
              <span>Zvuková výstraha</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-value">Zapnuto</div>
          </div>

          <div class="card">
            <div class="card-header">
              <span>Pohybové čidlo PIR</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-value">Aktivní</div>
          </div>

          <div class="card">
            <div class="card-header">
              <span>Únik vody</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-value">
              <span class="alert">Zjištěn únik vody</span>
              <img src="../../public/assets/icons/warning.svg" alt="Varování" class="widget-icon">
            </div>
            <div class="card-footer">
              <span class="description">Senzor úniku</span>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="card-header">
              <span>Bezpečný režim</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <span>Hlídání úniku vody</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <span>Noční režim</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <span>Scény</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-value">3 aktivní</div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="card-header">
              <span>Ambientní světlo</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <label class="switch"><input type="checkbox"><span class="slider"></span></label>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer class="footer-bar">
      <a href="https://www.instagram.com/jirik_pos/">Posavád</a> | <a
        href="https://www.instagram.com/poldacz/">Skřivan</a> | <a href="https://www.instagram.com/tomvozka">Vozka</a> |
      ©2025 Všechna práva vyhrazena.
    </footer>
  </div>

</body>

</html>