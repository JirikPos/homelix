document.addEventListener('DOMContentLoaded', () => {
  const STATE_ENDPOINT = '/api/peripherals/states';
  const UPDATE_ENDPOINT = '/api/peripherals';
  const POLL_INTERVAL = 5000;

  const peripheralStateCache = {};

  async function loadPeripheralStates() {
    try {
      const res = await fetch(STATE_ENDPOINT);
      const data = await res.json();

      data.forEach(peripheral => {
        const id = peripheral.id;
        const expectedState = !!peripheral.value_bool;

        const checkbox = document.querySelector(`input[data-id="${id}"]`);
        if (!checkbox) return;

        // Pokud se stav změnil mimo prohlížeč, synchronizuj
        if (peripheralStateCache[id] !== expectedState) {
          checkbox.checked = expectedState;
          peripheralStateCache[id] = expectedState;
        }
      });
    } catch (err) {
      console.error('Chyba při načítání stavů periferií:', err);
    }
  }

  async function togglePeripheralState(id, value) {
    try {
      await fetch(`${UPDATE_ENDPOINT}/${id}`, {
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ value_bool: value ? 1 : 0 })
      });

      peripheralStateCache[id] = value;
    } catch (err) {
      console.error(`Nepodařilo se aktualizovat stav periferie #${id}:`, err);
    }
  }

  document.querySelectorAll('input[data-id]').forEach(input => {
    const id = input.dataset.id;

    input.addEventListener('change', e => {
      const value = e.target.checked;
      togglePeripheralState(id, value);
    });
  });

  loadPeripheralStates();
  setInterval(loadPeripheralStates, POLL_INTERVAL);
});

