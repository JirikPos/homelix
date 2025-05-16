const STATUS_ENDPOINT = '/api/readings/last';
const STATUS_INTERVAL_MS = 20000;
const OFFLINE_THRESHOLD_MINUTES = 15;

function isSensorOnline(createdAt) {
  const now = new Date();
  const readingTime = new Date(createdAt);
  const diffMs = now - readingTime;
  const diffMinutes = diffMs / 1000 / 60;
  return diffMinutes <= OFFLINE_THRESHOLD_MINUTES;
}

async function pollSensorStatus() {
  try {
    const res = await fetch(STATUS_ENDPOINT, {
      method: 'GET',
      credentials: 'same-origin',
    });

    const data = await res.json();
    data.forEach(sensor => {
      const el = document.getElementById(`status-${sensor.sensor_name}`);
      if (el) {
        const online = isSensorOnline(sensor.created_at);
        el.textContent = online ? 'Online' : 'Offline';
        el.style.color = online ? 'green' : 'red';
      }
    });
  } catch (err) {
    console.error('Status polling error:', err);
  }
}

pollSensorStatus();
setInterval(pollSensorStatus, STATUS_INTERVAL_MS);
