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
const scrolling = new Scrolling({
  offset: -1
});
scrolling.init();

// Slidebar init
const slidebar = new Slidebar({
  root: `${HOST}${ROOT}`,
  nav: document.querySelector('.footer-nav')
});
slidebar.init();

if (document.body.id === 'index') {
  // Slider init
  const slider = new Slider({
    hasDraggingHandler: true,
    hasWheelHandler: true,
    hasFade: true,
    hasCaption: true,
    autoPlay: 3000
  });
  slider.init();
}

if (document.body.id === 'works') {
  // Works
  const elem = document.querySelector('.article-work__gallery');
  const content = document.querySelector('.article-work__content');
  const images = content.querySelectorAll('.wp-block-image');
  images.forEach((image) => {
    elem.appendChild(image);
  });
}

// Icons init
renderEvilIcons();
