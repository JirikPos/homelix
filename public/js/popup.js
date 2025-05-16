document.addEventListener('DOMContentLoaded', () => {
  const popup = document.getElementById('exportPopup');
  const closeBtn = document.getElementById('closeExportPopup');
  const closeBtn2 = document.getElementById('closeExportPopup2');
  const openBtn = document.getElementById('openExportPopup');

  openBtn?.addEventListener('click', () => popup.classList.add('active'));
  closeBtn?.addEventListener('click', () => popup.classList.remove('active'));
  closeBtn2?.addEventListener('click', () => popup.classList.remove('active'));
});
