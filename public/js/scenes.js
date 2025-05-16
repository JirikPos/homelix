document.addEventListener('DOMContentLoaded', () => {
  const POLL_INTERVAL = 5000;

  const sceneButtons = document.querySelectorAll('.scene');
  let activeSceneId = null;

  function updateSceneUI(activeId) {
    sceneButtons.forEach(btn => {
      const id = parseInt(btn.dataset.id, 10);
      btn.classList.toggle('active-scene', id === Number(activeId));
    });
  }


  async function fetchActiveScene() {
    try {
      const res = await fetch('/api/scenes/active');
      const data = await res.json();
      console.log('Aktivní scéna:', data);
      activeSceneId = data?.id ?? null;
      updateSceneUI(activeSceneId);
    } catch (err) {
      console.error('Chyba při načítání aktivní scény:', err);
    }
  }


  async function activateScene(id) {
    try {
      await fetch('/api/scenes/activate', {
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
      });
    } catch (err) {
      console.error(`Nepodařilo se aktivovat scénu #${id}:`, err);
    }
  }

  async function deactivateScene(id) {
    try {
      await fetch('/api/scenes/deactivate', {
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
      });
    } catch (err) {
      console.error(`Nepodařilo se deaktivovat scénu #${id}:`, err);
    }
  }

  async function handleSceneClick(id) {
    if (activeSceneId === id) {
      await deactivateScene(id);
      activeSceneId = null;
    } else {
      if (activeSceneId !== null) {
        await deactivateScene(activeSceneId);
      }
      await activateScene(id);
      activeSceneId = id;
    }
    updateSceneUI(activeSceneId);
  }

  sceneButtons.forEach(button => {
    const id = parseInt(button.dataset.id, 10);
    button.addEventListener('click', () => handleSceneClick(id));
  });

  fetchActiveScene();
  setInterval(fetchActiveScene, POLL_INTERVAL);
});
