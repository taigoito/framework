/*
 * Author: Taigo Ito
 * Site: https://qwel.design
 * Twitter: @taigoito
 * Location: Fukui, Japan
 */

import Scrolling from './_scrolling.js';
import Slidebar from './_slidebar.js';
//import Slider from './_slider.js';
import Sketch from './_sketch.js';
import renderEvilIcons from './_evil-icons.js';

// Scrolling init
const scrolling = new Scrolling();
scrolling.init();

// Slidebar init
const slidebar = new Slidebar({
  root: `${location.protocol}//${location.hostname}/qwel/`
});
slidebar.init();

if (document.body.id === 'index' || document.body.id === 'web' ||
  document.body.id === 'ac' || document.body.id === 'profile') {
  // Slider init
  /*const slider = new Slider({
    hasDraggingHandler: true,
    hasWheelHandler: true,
    hasFade: true,
    hasCaption: true,
    autoPlay: 3000
  });
  slider.init();*/

  // sketch
  const elem = document.getElementById('canvas-wrap');
  const sketch = new Sketch(elem);
  sketch.init();
}

/*if (document.body.id === 'works') {
  // Works
  const elem = document.querySelector('.work-gallery');
  const content = document.querySelector('.work-content');
  const images = content.querySelectorAll('.wp-block-image');
  images.forEach((image) => {
    elem.appendChild(image);
  });
}*/

// Icons init
renderEvilIcons();
