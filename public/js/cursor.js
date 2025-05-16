document.addEventListener('DOMContentLoaded', () => {
  const cursor = document.createElement('div');
  cursor.classList.add('cursor-circle');
  document.body.appendChild(cursor);

  let mouseX = 0, mouseY = 0;
  let circleX = 0, circleY = 0;
  const size = 16; // velikost kolečka
  const speed = 0.25;

  function animateCursor() {
    circleX += (mouseX - circleX) * speed;
    circleY += (mouseY - circleY) * speed;

    cursor.style.left = `${circleX - size / 2}px`;
    cursor.style.top = `${circleY - size / 2}px`;

    requestAnimationFrame(animateCursor);
  }

  document.addEventListener('mousemove', e => {
    mouseX = e.clientX;
    mouseY = e.clientY;
  });

  animateCursor();

  document.querySelectorAll('a, button, .btn-primary, .scene').forEach(el => {
    el.addEventListener('mouseenter', () => cursor.classList.add('hover'));
    el.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
  });
});
