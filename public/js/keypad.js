document.addEventListener('DOMContentLoaded', () => {
  const display = document.querySelector('.keypad-display');
  const buttons = document.querySelectorAll('.keypad .scene');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      const value = button.textContent;

      if (value === '←') {
        display.value = display.value.slice(0, -1);
      } else if (value === '↵') {
        if (display.value.length === 0) return;

        fetch('/api/keypad/verify', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ code: display.value })
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            display.value = '';
          } else {
            display.classList.add('alert');
            setTimeout(() => display.classList.remove('alert'), 1000);
            display.value = '';
          }
        })
        .catch(err => {
          console.error('Chyba požadavku:', err);
        });

      } else {
        if (display.value.length < 6) {
          display.value += value;
        }
      }
    });
  });
});
