
const rightButton = document.querySelector('.button-arrow.-right');
const leftButton = document.querySelector('.button-arrow.-left');
const cards = document.querySelector('.cards');
let totalPixels = 0;

function moveToRight() {
  totalPixels += 100;
  cards.style.transform = `translateX(${totalPixels}px)`;
}

function moveToLeft() {
  totalPixels -= 100;
  cards.style.transform = `translateX(${totalPixels}px)`;
}

leftButton.addEventListener('click', moveToLeft);

rightButton.addEventListener('click', moveToRight);


document.addEventListener('keyup', event => {
  const key = event.key;

  if (key === 'ArrowRight') {
    moveToRight();
  }

  if (key === 'ArrowLeft') {
    moveToLeft();
  }
});

