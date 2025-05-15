// document.addEventListener('DOMContentLoaded', () => {
//   const STATE_ENDPOINT = '/api/peripherals/states';
//   const UPDATE_ENDPOINT = '/api/peripherals'; // /{id}
//   const POLL_INTERVAL = 5000;

//   // Lokální cache stavů pro porovnání
//   const peripheralStateCache = {};

//   async function loadPeripheralStates() {
//     try {
//       const res = await fetch(STATE_ENDPOINT);
//       const data = await res.json();

//       data.forEach(peripheral => {
//         const id = peripheral.id;
//         const expectedState = !!peripheral.value_bool;

//         const checkbox = document.querySelector(`input[data-id="${id}"]`);
//         if (!checkbox) return;

//         // Pokud se stav změnil mimo prohlížeč, synchronizuj
//         if (peripheralStateCache[id] !== expectedState) {
//           checkbox.checked = expectedState;
//           peripheralStateCache[id] = expectedState;
//         }
//       });
//     } catch (err) {
//       console.error('Chyba při načítání stavů periferií:', err);
//     }
//   }

//   async function togglePeripheralState(id, value) {
//     try {
//       await fetch(`${UPDATE_ENDPOINT}/${id}`, {
//         method: 'PATCH',
//         headers: { 'Content-Type': 'application/json' },
//         body: JSON.stringify({ value_bool: value ? 1 : 0 })
//       });

//       peripheralStateCache[id] = value;
//     } catch (err) {
//       console.error(`Nepodařilo se aktualizovat stav periferie #${id}:`, err);
//     }
//   }

//   document.querySelectorAll('input[data-id]').forEach(input => {
//     const id = input.dataset.id;

//     input.addEventListener('change', e => {
//       const value = e.target.checked;
//       togglePeripheralState(id, value);
//     });
//   });

//   // Prvotní načtení + interval
//   loadPeripheralStates();
//   setInterval(loadPeripheralStates, POLL_INTERVAL);
// });


document.addEventListener('DOMContentLoaded', () => {
  const POLL_INTERVAL = 5000;

  const peripheralIds = [1, 2, 3, 4, 5, 6, 7, 8];
  const peripheralStateCache = {};

  function generateMockPeripheralStates() {
    return peripheralIds.map(id => ({
      id,
      value_bool: Math.random() > 0.5 ? 1 : 0
    }));
  }

  function updateUI(states) {
    states.forEach(peripheral => {
      const id = peripheral.id;
      const newState = !!peripheral.value_bool;
      const checkbox = document.querySelector(`input[data-id="${id}"]`);
      if (!checkbox) return;

      if (peripheralStateCache[id] !== newState) {
        checkbox.checked = newState;
        peripheralStateCache[id] = newState;
      }
    });
  }

  function simulatePeripheralPolling() {
    const mock = generateMockPeripheralStates();
    console.log('🧪 Simulovaný stav periferií:', mock);
    updateUI(mock);
  }

  document.querySelectorAll('input[data-id]').forEach(input => {
    const id = input.dataset.id;
    input.addEventListener('change', e => {
      const value = e.target.checked;
      peripheralStateCache[id] = value;
      console.log(`🧑‍💻 Uživatel přepnul periférii #${id} → ${value ? 'Zapnuto' : 'Vypnuto'}`);
    });
  });

  simulatePeripheralPolling();
  setInterval(simulatePeripheralPolling, POLL_INTERVAL);
});
