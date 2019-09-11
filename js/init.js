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

// Scrolling init
const scrolling = new Scrolling();
scrolling.init();

// Slidebar init
const slidebar = new Slidebar();
slidebar.init();

if (document.body.id === 'index') {
  // Slider init
  const slider = new Slider({
    hasDraggingHandler: true,
    hasWheelHandler: true,
    hasFade: true,
    hasCaption: true
  });
  slider.init();
}

if (document.body.id === 'works') {
  // Works
  const elem = document.querySelector('.work-gallery');
  const content = document.querySelector('.work-content');
  const images = content.querySelectorAll('img'); // Since the post data is old, use the old specification
  //const images = content.querySelectorAll('.wp-block-image');
  images.forEach((image) => {
    elem.appendChild(image);
  });
}

// Icons init
renderEvilIcons();
