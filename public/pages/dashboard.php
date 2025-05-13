<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, width=device-width">
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body>
  <div class="frame-parent">
    <div class="homelix-parent">
      <div class="homelix">Homelix</div>
      <img class="navmenu-icon" alt="" src="Nav/Menu.svg">
    </div>
    <div class="tab-controller">
      <div class="o-projektu-parent">
        <div class="o-projektu">O projektu</div>
        <img class="fi-10206874-icon" alt="" src="fi_10206874.svg">
      </div>
      <div class="tab-controller-child">
      </div>
      <div class="ovldac-panel-parent">
        <div class="ovldac-panel">Ovládací panel</div>
        <img class="home2alt-icon" alt="" src="home/2/alt.svg">
        <img class="fi-1047105-icon" alt="" src="fi_1047105.svg">
      </div>
    </div>
    <div class="navnotifications-parent">
      <img class="navprofile-icon" alt="" src="Nav/Profile.png">
    </div>
  </div>

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


</body>

</html>