document.addEventListener('DOMContentLoaded', () => {
  const sensorListContainer = document.getElementById('sensorList');
  const exportBtn = document.getElementById('exportSensorsBtn');

  async function loadSensors() {
    const res = await fetch('/api/sensors');
    const sensors = await res.json();

    sensors.forEach(sensor => {
      const label = document.createElement('label');
      label.style.display = 'block';

      const checkbox = document.createElement('input');
      checkbox.type = 'checkbox';
      checkbox.value = sensor.id;
      checkbox.name = 'sensor_ids[]';

      label.appendChild(checkbox);
      label.append(` ${sensor.name}`);
      sensorListContainer.appendChild(label);
    });
  }

  exportBtn.addEventListener('click', () => {
    const selected = [...document.querySelectorAll('input[name="sensor_ids[]"]:checked')]
      .map(cb => cb.value);

    if (selected.length === 0) {
      alert('Vyber alespoň jeden senzor.');
      return;
    }

    const params = new URLSearchParams();
    selected.forEach(id => params.append('sensor_ids[]', id));
    window.location.href = `/api/export?${params.toString()}`;
  });

  loadSensors();
});
