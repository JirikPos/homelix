<!DOCTYPE html>
<html lang="cs">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, width=device-width">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  <meta name="author" content="Posavád, Skřivan, Vozka">
  <meta name="keywords" content="smart home, chytrá domácnost, automatizace, inteligentní domácnost">
  <meta name="description"
    content="Objevte moderní chytrou domácnost s Homelix. Řešení pro bezpečnost, komfort a úsporu energie – vše ovládané jednoduše přes mobil nebo hlasem.">
  <title>Dashboard</title>
  <link rel="shortcut icon" href="../../public/assets/images/icon.png" type="image/png">
  <script defer src="../../public/js/cursor.js"></script>
  <link rel="stylesheet" href="../../public/css/style.css">

</head>

<body>
  <header>
    <div class="frame-parent">
      <a href="/dashboard">
        <img class="homelix-logo" src="../../public/assets/images/logo.png" alt="">
      </a>
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
      <div class="card" id="openExportPopup">
        <img class="nav-icon" alt="" src="../../public/assets/icons/settings.svg">
      </div>
    </div>
  </header>
  <div>
    <main>
      <div class="dashboard-columns">
        <div class="column">
          <!-- Kvalita ovzduší / GAS -->
          <div class="card">
            <div class="card-header">
              <span>Kvalita ovzduší</span>
              <img src="../../public/assets/icons/wind.svg" alt="Varování" class="widget-icon">
            </div>
            <div class="card-value" id="value-GAS">
              <span class="alert">Načítám…</span>
              <img src="../../public/assets/icons/warning.svg" alt="Varování" class="widget-icon">
            </div>
            <div class="card-footer">
              <span class="description">Index kvality ovzduší</span>
            </div>
          </div>

          <!-- Teplota a vlhkost -->
          <div class="card">
            <div class="card-header">
              <span>Teplota a vlhkost</span>
              <img src="../../public/assets/icons/temperature.svg" alt="">
            </div>
            <div class="card-value" id="value-TEMPERATURE">Načítám…</div>
            <div class="card-footer">
              <span class="description">Aktuální teplota</span>
            </div>
            <div class="card-value" id="value-HUMIDITY">Načítám…</div>
            <div class="card-footer">
              <span class="description">Aktuální vlhkost</span>
            </div>
          </div>

          <!-- Světlo -->
          <div class="card">
            <div class="card-header">
              <span>Hladina světla</span>
              <img src="../../public/assets/icons/day.svg" alt="">
            </div>
            <div class="card-value" id="value-LIGHT">Načítám…</div>
            <div class="card-footer">
              <span class="description">Aktuální hladina světla v místnosti</span>
            </div>
          </div>
        </div>

        <div class="column">
          <!-- Zvuk -->
          <div class="card">
            <div class="card-header">
              <span>Hlasitost místnosti</span>
              <img src="../../public/assets/icons/sound.svg" alt="">
            </div>
            <div class="card-value" id="value-SOUND">Načítám…</div>
            <div class="card-footer">
              <span>Aktuální hlasitost v místnosti</span>
            </div>
          </div>

          <!-- PIR -->
          <div class="card">
            <div class="card-header">
              <span>Pohybové čidlo PIR</span>
              <img src="../../public/assets/icons/pir.svg" alt="">
            </div>
            <div class="card-value" id="value-PIR">Načítám…</div>
            <div class="card-footer">
              <span>Zjišťuje pohyb v místnosti</span>
            </div>
          </div>

          <!-- Únik vody -->
          <div class="card">
            <div class="card-header">
              <span>Únik vody</span>
              <img src="../../public/assets/icons/water-dropplet.svg" alt="">
            </div>
            <div class="card-value" id="value-WATER">
              <span>Načítám…</span>
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
              <span>Ambientní světlo 1</span>
              <label class="switch">
                <input type="checkbox" id="peripheral-1" data-id="1">
                <span class="slider"></span>
              </label>
            </div>
            <div class="card-header">
              <span>Ambientní světlo 2</span>
              <label class="switch">
                <input type="checkbox" id="peripheral-2" data-id="2">
                <span class="slider"></span>
              </label>
            </div>
            <div class="card-header">
              <span>Ventilátor</span>
              <label class="switch">
                <input type="checkbox" id="peripheral-3" data-id="3">
                <span class="slider"></span>
              </label>
            </div>
            <div class="card-header">
              <span>Relé čerpadla</span>
              <label class="switch">
                <input type="checkbox" id="peripheral-4" data-id="4">
                <span class="slider"></span>
              </label>
            </div>
            <div class="card-header">
              <span>Zvukový signál</span>
              <label class="switch">
                <input type="checkbox" id="peripheral-5" data-id="5">
                <span class="slider"></span>
              </label>
            </div>
            <div class="card-header">
              <span>LED pásek</span>
              <label class="switch">
                <input type="checkbox" id="peripheral-6" data-id="6">
                <span class="slider"></span>
              </label>
            </div>
            <div class="card-header">
              <span>Závora</span>
              <label class="switch">
                <input type="checkbox" id="peripheral-7" data-id="7">
                <span class="slider"></span>
              </label>
            </div>
            <div class="card-header">
              <span>Noční osvětlení</span>
              <label class="switch">
                <input type="checkbox" id="peripheral-8" data-id="8">
                <span class="slider"></span>
              </label>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <span>Scény</span>
              <img src="../../public/assets/icons/computer.svg" alt="">
            </div>
            <div class="scenes">
              <div>
                <button class="scene" data-id="3"><img src="../../public/assets/icons/day.svg" alt=""></button>
                <span>Den</span>
              </div>
              <div>
                <button class="scene" data-id="4"><img src="../../public/assets/icons/night.svg" alt=""></button>
                <span>Noc</span>
              </div>
              <div>
                <button class="scene" data-id="2"><img src="../../public/assets/icons/leave.svg" alt=""></button>
                <span>Odchod</span>
              </div>
              <div>
                <button class="scene" data-id="1"><img src="../../public/assets/icons/arrive.svg" alt=""></button>
                <span>Příchod</span>
              </div>
            </div>

          </div>

          <div class="card">
            <div class="card-header">
              <span>Přehrát hudbu</span>
              <img class="widget-icon" src="../../public/assets/icons/spotify.svg" alt="Spotify logo">
            </div>
            <div>
              <div class="music-control">
                <div>
                  <span>Právě hraje</span>
                  <div>
                    <span class="music-title">Není vybráno</span>
                  </div>
                </div>
                <div class="music-controls">
                  <button class="previous"><img src="../../public/assets/icons/previous.svg" alt=""></button>
                  <button class="play-pause"><img src="../../public/assets/icons/play.svg" alt=""></button>
                  <button class="next"><img src="../../public/assets/icons/next.svg" alt=""></button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="card-header">
              <span>Teplotní senzor</span>
              <span id="status-TEMPERATURE" class="sensor-status">Načítám…</span>
            </div>
            <div class="card-header">
              <span>Vlhkostní senzor</span>
              <span id="status-HUMIDITY" class="sensor-status">Načítám…</span>
            </div>
            <div class="card-header">
              <span>Hlukový senzor</span>
              <span id="status-SOUND" class="sensor-status">Načítám…</span>
            </div>
            <div class="card-header">
              <span>Senzor světla</span>
              <span id="status-LIGHT" class="sensor-status">Načítám…</span>
            </div>
            <div class="card-header">
              <span>Senzor plynu</span>
              <span id="status-GAS" class="sensor-status">Načítám…</span>
            </div>
            <div class="card-header">
              <span>Senzor vody</span>
              <span id="status-WATER" class="sensor-status">Načítám…</span>
            </div>
            <div class="card-header">
              <span>Pohybový senzor (PIR)</span>
              <span id="status-PIR" class="sensor-status">Načítám…</span>
            </div>
          </div>

          <div class="card">
            <div>
              <input type="text" class="keypad-display" readonly placeholder="Zadejte kód">
            </div>
            <div class="keypad">
              <div><button class="key">1</button></div>
              <div><button class="key">2</button></div>
              <div><button class="key">3</button></div>
              <div><button class="key">4</button></div>
              <div><button class="key">5</button></div>
              <div><button class="key">6</button></div>
              <div><button class="key">7</button></div>
              <div><button class="key">8</button></div>
              <div><button class="key">9</button></div>
              <div><button class="key">←</button></div>
              <div><button class="key">0</button></div>
              <div><button class="key">↵</button></div>
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
  <audio id="audio-player" preload="auto"></audio>

  <div class="overlay-popup" id="exportPopup">
    <div class="popup">
      <div class="popup-header">
        <h2>Export dat ze senzorů</h2>
        <span class="close-popup" id="closeExportPopup">&times;</span>
      </div>

      <div class="popup-body">
        <p>Vyberte senzory, které chcete exportovat:</p>
        <div id="sensorList" class="sensor-list">
          <!-- Checkboxy se doplní JavaScriptem -->
        </div>
      </div>

      <div class="popup-footer">
        <button class="btn-cancel" id="closeExportPopup2">Zavřít</button>
        <button class="btn-primary" id="exportSensorsBtn">Exportovat</button>
      </div>
    </div>
  </div>


  <script src="../../public/js/sensor.js"></script>
  <script src="../../public/js/states.js"></script>
  <script src="../../public/js/pheriperals.js"></script>
  <script src="../../public/js/music.js"></script>
  <script src="../../public/js/keypad.js"></script>
  <script src="../../public/js/scenes.js"></script>
  <script src="../../public/js/alarm.js"></script>
  <script src="../../public/js/export.js"></script>
  <script src="../../public/js/popup.js"></script>
</body>

</html>