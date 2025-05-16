document.addEventListener('DOMContentLoaded', () => {
  const ALARM_ENDPOINT = '/api/alert';
  const POLL_INTERVAL = 10000;

  const audio = new Audio('../../public/assets/audio/system/alarm.mp3');
  audio.loop = true;

  let alarmActive = false;
  let lastMessage = '';

  function speakMessage(message) {
    const synth = window.speechSynthesis;
    if (!synth || !message) return;

    if (synth.speaking) synth.cancel();

    const utterance = new SpeechSynthesisUtterance(message);
    utterance.lang = 'cs-CZ';
    synth.speak(utterance);
  }

  async function checkAlarm() {
    try {
      const res = await fetch(ALARM_ENDPOINT);
      const data = await res.json();
      console.log('Aktivní alarm:', data);

      const active = !!data.active;
      const message = data.message ?? '';

      if (active && !alarmActive) {
        await audio.play().catch(err => console.error('Chyba při přehrávání alarmu:', err));
        document.body.classList.add('alarm-active');
        alarmActive = true;

        if (message && message !== lastMessage) {
          speakMessage(message);
          lastMessage = message;
        }
      }

      if (!active && alarmActive) {
        audio.pause();
        audio.currentTime = 0;
        document.body.classList.remove('alarm-active');
        window.speechSynthesis.cancel();
        alarmActive = false;
        lastMessage = '';
      }
    } catch (err) {
      console.error('Chyba při načítání alarmu:', err);
    }
  }

  checkAlarm();
  setInterval(checkAlarm, POLL_INTERVAL);
});
