document.addEventListener('DOMContentLoaded', () => {
  const ENDPOINT = '/api/readings/last';
  const INTERVAL_MS = 10000;

  function formatSensorValue(sensor) {
    if (sensor.value_float !== null) {
      switch (sensor.sensor_name) {
        case 'TEMPERATURE': return `${sensor.value_float.toFixed(1)} °C`;
        case 'HUMIDITY': return `${sensor.value_float.toFixed(1)} %`;
        case 'SOUND': return `${sensor.value_float.toFixed(1)} dB`;
        case 'LIGHT': return `${sensor.value_float.toFixed(0)} lx`;
        case 'GAS': return `${sensor.value_float.toFixed(0)} ppm`;
        default: return sensor.value_float.toFixed(2);
      }
    } else if (sensor.value_bool !== null) {
      switch (sensor.sensor_name) {
        case 'WATER': return sensor.value_bool ? 'Zjištěn únik vody' : 'Bez úniku';
        case 'PIR': return sensor.value_bool ? 'Pohyb zaznamenán' : 'Bez pohybu';
        default: return sensor.value_bool ? 'ANO' : 'NE';
      }
    }
    return 'N/A';
  }

  async function pollBackend() {
    try {
      const res = await fetch(ENDPOINT, {
        method: 'GET',
        credentials: 'same-origin',
      });

      const text = await res.text();

      console.log('–– RAW RESPONSE START ––');
      console.log(text);
      console.log('–– RAW RESPONSE END ––');

      const data = JSON.parse(text);
      data.forEach(sensor => {
        const el = document.getElementById(`value-${sensor.sensor_name}`);
        if (el) {
          el.textContent = formatSensorValue(sensor);

          // Zvýraznění alertů
          if (sensor.sensor_name === 'WATER' && sensor.value_bool) {
            el.classList.add('alert');
          } else if (sensor.sensor_name === 'WATER') {
            el.classList.remove('alert');
          }

          if (sensor.sensor_name === 'PIR' && sensor.value_bool) {
            el.classList.add('alert');
          } else if (sensor.sensor_name === 'PIR') {
            el.classList.remove('alert');
          }
        }
      });
    } catch (err) {
      console.error('Polling error:', err);
    }
  }

  pollBackend();
  setInterval(pollBackend, INTERVAL_MS);
});