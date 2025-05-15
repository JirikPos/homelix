// document.addEventListener('DOMContentLoaded', () => {
//   const ALARM_ENDPOINT = '/api/alarm/status';
//   const POLL_INTERVAL = 3000;

//   const audio = new Audio('/assets/audio/alarm.mp3');
//   audio.loop = true;

//   let alarmActive = false;
//   let lastMessage = '';

//   function speakMessage(message) {
//     const synth = window.speechSynthesis;
//     if (!synth) return;

//     if (synth.speaking) synth.cancel();

//     const utterance = new SpeechSynthesisUtterance(message);
//     utterance.lang = 'cs-CZ';
//     synth.speak(utterance);
//   }

//   async function checkAlarm() {
//     try {
//       const res = await fetch(ALARM_ENDPOINT);
//       const { active, message } = await res.json();

//       if (active && !alarmActive) {
//         audio.play().catch(err => console.error('Chyba při přehrávání alarmu:', err));
//         document.body.classList.add('alarm-active');
//         alarmActive = true;

//         if (message && message !== lastMessage) {
//           speakMessage(message);
//           lastMessage = message;
//         }
//       }

//       if (!active && alarmActive) {
//         audio.pause();
//         audio.currentTime = 0;
//         document.body.classList.remove('alarm-active');
//         window.speechSynthesis.cancel();
//         alarmActive = false;
//         lastMessage = '';
//       }
//     } catch (err) {
//       console.error('Chyba při načítání alarmu:', err);
//     }
//   }

//   checkAlarm();
//   setInterval(checkAlarm, POLL_INTERVAL);
// });

document.addEventListener('DOMContentLoaded', () => {
  const audio = new Audio('../../public/assets/audio/system/alarm.mp3');
  audio.loop = true;

  let alarmActive = false;
  let currentMessage = '';
  let speakInterval = null;
  let audioInitialized = false;

  const testMessages = [
    'Pozor! Byl detekován únik plynu.',
    'Varování! Zjištěn únik vody. Kontaktuji majitele nemovitosti.',
  ];

  function speakLoop(message) {
    const synth = window.speechSynthesis;
    if (!synth) return;

    if (synth.speaking) synth.cancel();

    const utterance = new SpeechSynthesisUtterance(message);
    utterance.lang = 'cs-CZ';
    synth.speak(utterance);
  }

  function startAlarm(message) {
    if (alarmActive || !audioInitialized) return;

    alarmActive = true;
    currentMessage = message;

    audio.play().catch(e => console.warn('Audio error:', e));
    document.body.classList.add('alarm-active');
    speakLoop(currentMessage);
    speakInterval = setInterval(() => speakLoop(currentMessage), 6000);
  }

  function stopAlarm() {
    if (!alarmActive) return;

    alarmActive = false;
    audio.pause();
    audio.currentTime = 0;
    window.speechSynthesis.cancel();
    clearInterval(speakInterval);
    document.body.classList.remove('alarm-active');
  }

  function initAudioPlayback() {
    if (audioInitialized) return;
    audio.play().then(() => {
      audio.pause();
      audio.currentTime = 0;
      audioInitialized = true;
      console.log('✅ Audio initialized');
    }).catch(err => console.warn('Audio init error:', err));
  }

  document.body.addEventListener('click', initAudioPlayback, { once: true });

  setTimeout(() => {
    const msg = testMessages[1];
    console.log('🚨 Spouštím alarm:', msg);
    // startAlarm(msg);
  }, 1000);

  window.stopAlarm = stopAlarm;
});
