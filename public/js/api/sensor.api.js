document.addEventListener('DOMContentLoaded', () => {
  const ENDPOINT = '/api/readings';
  const INTERVAL_MS = 5000;

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

  pollBackend();
  setInterval(pollBackend, INTERVAL_MS);
});
