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
  <meta name="keywords" content="smart home, chytrá domácnost, automatizace, inteligentní domácnost">
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
      <nav class="nav-bar">
        <div class="ovldac-panel-parent">
          <div class="ovldac-panel"><a class="nav-link active" href="./dashboard">Ovládací panel</a></div>
          <img class="nav-icon" alt="" src="../../public/assets/icons/house.svg">
        </div>
        <div class="nav-bar-divider">
        </div>
        <div class="o-projektu-parent">
          <div class="o-projektu"><a class="nav-link" href="./info-o-projektu">O projektu</a></div>
          <img class="nav-icon" alt="" src="../../public/assets/icons/about.svg">
        </div>

      </nav>
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
              <img src="../../public/assets/icons/wind.svg" alt="Varování" class="widget-icon">
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
              <img src="../../public/assets/icons/temperature.svg" alt="">
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
          <div class="card">
            <div class="card-header">
              <span>Hladina světla</span>
              <img src="../../public/assets/icons/day.svg" alt="">
            </div>
            <div class="card-value">450 L</div>
            <div class="card-footer">
              <span class="description">Aktuální hladina světla v místnosti</span>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="card-header">
              <span>Hlasitost místnosti</span>
              <img src="../../public/assets/icons/sound.svg" alt="">
            </div>
            <div class="card-value">45 dB</div>
            <div class="card-footer">
              <span>Aktuální hlasitost v místnosti</span>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <span>Pohybové čidlo PIR</span>
              <img src="../../public/assets/icons/pir.svg" alt="">
            </div>
            <div class="card-value">Pohyb zaznemanán</div>
            <div class="card-footer">
              <span>Zjišťuje pohyb v místnosti</span>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <span>Únik vody</span>
              <img src="../../public/assets/icons/water-dropplet.svg" alt="">
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
          <div class="card">
            <div class="card-header">
              <span>Scény</span>
              <img src="../../public/assets/icons/computer.svg" alt="">
            </div>
            <div class="scenes">
              <div>
                <button class="scene"><img src="../../public/assets/icons/day.svg" alt=""></button>
                <span>Den</span>
              </div>
              <div>
                <button class="scene"><img src="../../public/assets/icons/night.svg" alt=""></button>
                <span>Noc</span>
              </div>
              <div>
                <button class="scene"><img src="../../public/assets/icons/leave.svg" alt=""></button>
                <span>Odchod</span>
              </div>
              <div>
                <button class="scene"><img src="../../public/assets/icons/arrive.svg" alt=""></button>
                <span>Příchod</span>
              </div>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="card-header">
              <span>Ambientní světlo</span>
              <span>Online</span>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <span>Online</span>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <span>Online</span>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <span>Online</span>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <span>Online</span>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <span>Online</span>
            </div>
            <div class="card-header">
              <span>Ambientní světlo</span>
              <span>Online</span>
            </div>
          </div>
          <div class="card">
            <div>
              <input type="text" class="keypad-display" readonly placeholder="Zadejte kód">
            </div>
            <div class="keypad">
              <div><button class="scene">1</button></div>
              <div><button class="scene">2</button></div>
              <div><button class="scene">3</button></div>
              <div><button class="scene">4</button></div>
              <div><button class="scene">5</button></div>
              <div><button class="scene">6</button></div>
              <div><button class="scene">7</button></div>
              <div><button class="scene">8</button></div>
              <div><button class="scene">9</button></div>
              <div><button class="scene">←</button></div>
              <div><button class="scene">0</button></div>
              <div><button class="scene">↵</button></div>
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
<script src="../../public/js/api/sensor.api.js"></script>
</html>