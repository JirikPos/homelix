document.addEventListener('DOMContentLoaded', () => {
  const audio = document.getElementById('audio-player');
  const playPauseBtn = document.querySelector('.play-pause');
  const nextBtn = document.querySelector('.next');
  const prevBtn = document.querySelector('.previous');
  const musicTitle = document.querySelector('.music-title');
  const icon = playPauseBtn.querySelector('img');
  const volumeSlider = document.getElementById('volume-slider');

  const playlist = [
    { title: 'Rick Astley – Never Gonna Give You Up', file: '../../public/assets/audio/song1.mp3' },
    { title: 'Europe – The Final Countdown', file: '../../public/assets/audio/2.mp3' },
    { title: 'Queen – Don’t Stop Me Now', file: '../../public/assets/audio/3.mp3' }
  ];

  let currentIndex = 0;
  let isPlaying = false;

  function loadTrack(index) {
    const track = playlist[index];
    if (!track) return;

    audio.src = track.file;
    musicTitle.textContent = track.title;
    audio.load();
  }

  function play() {
    audio.play();
    isPlaying = true;
    icon.src = '../../public/assets/icons/stop.svg';
  }

  function pause() {
    audio.pause();
    isPlaying = false;
    icon.src = '../../public/assets/icons/play.svg';
  }

  function playPauseToggle() {
    isPlaying ? pause() : play();
  }

  function nextTrack() {
    currentIndex = (currentIndex + 1) % playlist.length;
    loadTrack(currentIndex);
    play();
  }

  function prevTrack() {
    currentIndex = (currentIndex - 1 + playlist.length) % playlist.length;
    loadTrack(currentIndex);
    play();
  }

  playPauseBtn.addEventListener('click', playPauseToggle);
  nextBtn.addEventListener('click', nextTrack);
  prevBtn.addEventListener('click', prevTrack);
  audio.addEventListener('ended', nextTrack);
  
  loadTrack(currentIndex);
});
