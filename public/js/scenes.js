// document.addEventListener('DOMContentLoaded', () => {
//   const SCENE_ENDPOINT = '/api/scenes';
//   const POLL_INTERVAL = 5000;

//   const sceneButtons = document.querySelectorAll('.scene');
//   let activeSceneId = null;

//   function updateSceneUI(activeId) {
//     sceneButtons.forEach(btn => {
//       const id = parseInt(btn.dataset.id, 10);
//       btn.classList.toggle('active', id === activeId);
//     });
//   }

//   async function fetchActiveScene() {
//     try {
//       const res = await fetch(`${SCENE_ENDPOINT}/active`);
//       const data = await res.json();
//       activeSceneId = data?.id ?? null;
//       updateSceneUI(activeSceneId);
//     } catch (err) {
//       console.error('Chyba při načítání aktivní scény:', err);
//     }
//   }

//   async function setSceneActive(id, active) {
//     try {
//       await fetch(`${SCENE_ENDPOINT}/${id}`, {
//         method: 'PATCH',
//         headers: { 'Content-Type': 'application/json' },
//         body: JSON.stringify({ active: !!active })
//       });
//     } catch (err) {
//       console.error(`Nepodařilo se ${active ? 'aktivovat' : 'deaktivovat'} scénu #${id}:`, err);
//     }
//   }

//   async function handleSceneClick(id) {
//     if (activeSceneId === id) {
//       await setSceneActive(id, false); // deaktivuj
//       activeSceneId = null;
//     } else {
//       if (activeSceneId !== null) {
//         await setSceneActive(activeSceneId, false); // nejdřív deaktivuj předchozí
//       }
//       await setSceneActive(id, true); // aktivuj novou
//       activeSceneId = id;
//     }
//     updateSceneUI(activeSceneId);
//   }

//   sceneButtons.forEach(button => {
//     const id = parseInt(button.dataset.id, 10);
//     button.addEventListener('click', () => handleSceneClick(id));
//   });

//   fetchActiveScene();
//   setInterval(fetchActiveScene, POLL_INTERVAL);
// });



document.addEventListener('DOMContentLoaded', () => {
  const POLL_INTERVAL = 5000;

  const sceneButtons = document.querySelectorAll('.scene');
  let activeSceneId = null;

  function updateSceneUI(activeId) {
    sceneButtons.forEach(btn => {
      const id = parseInt(btn.dataset.id, 10);
      btn.classList.toggle('active-scene', id === activeId);
    });
  }

  function mockFetchActiveScene() {
    updateSceneUI(activeSceneId);
  }

  function mockActivateScene(id) {
    if (activeSceneId === id) {
      activeSceneId = null;
    } else {
      activeSceneId = id;
    }
    updateSceneUI(activeSceneId);
  }

  sceneButtons.forEach(button => {
    button.addEventListener('click', () => {
      const id = parseInt(button.dataset.id, 10);
      mockActivateScene(id);
    });
  });

  mockFetchActiveScene();
  setInterval(mockFetchActiveScene, POLL_INTERVAL);
});
