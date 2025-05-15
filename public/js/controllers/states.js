// const STATUS_ENDPOINT = '/api/sensors/status';
// const STATUS_INTERVAL_MS = 15000;

// async function pollSensorStatus() {
//   try {
//     const res = await fetch(STATUS_ENDPOINT, {
//       method: 'GET',
//       credentials: 'same-origin',
//     });

//     const data = await res.json();
//     data.forEach(sensor => {
//       const el = document.getElementById(`status-${sensor.sensor_name}`);
//       if (el) {
//         el.textContent = sensor.online ? 'Online' : 'Offline';
//         el.style.color = sensor.online ? 'green' : 'red';
//       }
//     });
//   } catch (err) {
//     console.error('Status polling error:', err);
//   }
// }

// pollSensorStatus();
// setInterval(pollSensorStatus, STATUS_INTERVAL_MS);


document.addEventListener('DOMContentLoaded', () => {
  const INTERVAL_MS = 5000;

  const sensors = ['TEMPERATURE', 'HUMIDITY', 'SOUND', 'LIGHT', 'GAS', 'WATER', 'PIR'];

  // Simuluje stav online/offline
  function generateMockStatus() {
    return sensors.map(name => ({
      sensor_name: name,
      online: Math.random() > 0.5
    }));
  }

  function updateStatusUI(statusList) {
    statusList.forEach(sensor => {
      const el = document.getElementById(`status-${sensor.sensor_name}`);
      if (el) {
        el.textContent = sensor.online ? 'Online' : 'Offline';
        el.style.color = sensor.online ? 'var(--color-success)' : 'var(--color-alert)';
      }
    });
  }

  function simulateStatusPolling() {
    const mockStatus = generateMockStatus();
    console.log('Simulovaný stav senzorů:', mockStatus);
    updateStatusUI(mockStatus);
  }

  simulateStatusPolling();
  setInterval(simulateStatusPolling, INTERVAL_MS);
});
