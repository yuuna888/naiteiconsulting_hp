document.addEventListener("DOMContentLoaded", () => {

  const openBtns = document.querySelectorAll('.youtube-open');
  const modal = document.querySelector('.youtube-modal');
  const player = document.querySelector('.youtube-player');
  const closeBtn = document.querySelector('.youtube-close');
  const bg = document.querySelector('.youtube-modal__bg');

  openBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();

      const id = btn.dataset.video;

      player.innerHTML = `
        <iframe src="https://www.youtube.com/embed/${id}?autoplay=1"
          frameborder="0"
          allow="autoplay; encrypted-media"
          allowfullscreen>
        </iframe>
      `;

      modal.classList.add('active');
    });
  });

  function closeModal() {
    modal.classList.remove('active');
    player.innerHTML = "";
  }

  closeBtn.addEventListener('click', closeModal);
  bg.addEventListener('click', closeModal);

});