/*
 * Author: Taigo Ito
 * Site: https://qwel.design
 * Twitter: @taigoito
 * Location: Fukui, Japan
 */

import Scrolling from './_scrolling.js';
import Slidebar from './_slidebar.js';
import Slider from './_slider.js';
import renderEvilIcons from './_evil-icons.js';

const HOST = `${location.protocol}//${location.hostname}`;
const ROOT = '/sample/';

// Scrolling init
const scrolling = new Scrolling();
scrolling.init();

// Slidebar init
const slidebar = new Slidebar({
  root: `${HOST}${ROOT}`,
  nav: document.querySelector('.footer-nav')
});
slidebar.init();

if (document.body.id === 'index') {
  // Word flip
  const words = document.querySelectorAll('.hero__animate');
  let count = 0;
  words[0].classList.add('animate');
  setInterval(() => {
    words[count % 3].classList.remove('animate');
    count++;
    words[count % 3].classList.add('animate');
  }, 4000);

  // Slider init
  /*const slider = new Slider({
    hasDraggingHandler: true,
    hasWheelHandler: true,
    hasFade: true,
    hasCaption: true,
    autoPlay: 3000
  });
  slider.init();*/
}

// Icons init
renderEvilIcons();
