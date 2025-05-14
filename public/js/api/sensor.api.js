document.addEventListener('DOMContentLoaded', () => {
  const ENDPOINT = '/api/readings';  // uprav na reálnou URL
  const INTERVAL_MS = 5000;

  async function pollBackend() {
    try {
      const res = await fetch(ENDPOINT, {
        method: 'GET',
        credentials: 'same-origin',
      });

      // vždycky načteme textovou odpověď
      const text = await res.text();

      // vypsat úplně vše, co dorazí
      console.log('–– RAW RESPONSE START ––');
      console.log(text);
      console.log('–– RAW RESPONSE END ––');

      // pokud je to JSON, můžeme ho zkusit také vypsat strukturovaně
      try {
        const data = JSON.parse(text);
        console.log('Parsed JSON:', data);
      } catch (parseErr) {
        console.warn('Response is not valid JSON, skipping JSON.parse');
      }

    } catch (err) {
      console.error('Polling error:', err);
    }
  }

  // první volání hned po načtení
  pollBackend();
  // pak každých 5 s
  setInterval(pollBackend, INTERVAL_MS);
});
