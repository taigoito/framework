// Sketch

export default class Sketch {
  constructor(elem, root) {
    this._root = root;
    this._canvas = document.createElement('canvas');
    this._canvas.id = 'canvas';
    elem.appendChild(this._canvas);
  }

  init() {
    this._count = 0;
    this._hue = 0;
    this._particles = [];
    this._frameRate = 60;
    this._resize();
    this._setup();
    this._handleEvents();
  }

  _setup() {
    this._creation(10, this._hue);
    this._draw();
  }

  _creation(num, hue) {
    for (let i = 0; i < num; i++) {
      const x = Math.floor(Math.random() * 180) + this._canvas.width / 2 - 90;
      const y = Math.floor(Math.random() * 180) + 180;
      let radius;
      if (window.innerWidth < 1024) {
        radius = Math.floor(Math.random() * window.innerWidth / 12) + window.innerWidth / 24;
      } else {
        radius = Math.floor(Math.random() * 60) + 30;
      }
      const min = new Vector(0, 0);
      const max = new Vector(this._canvas.width, this._canvas.height);
      const r = this._canvas.height / this._canvas.width;
      const force = new Vector(Math.random() * 4 - 2, Math.random() * r * 4 - 2);
      this._particles[i] = new Particle(x, y, min, max, radius, force, hue);
    }
  }

  _draw() {
    this._count++;
    const ctx = this._canvas.getContext('2d');
    ctx.fillStyle = 'hsla(0, 0%, 100%, .15)';
    ctx.fillRect(0, 0, this._canvas.width, this._canvas.height);
    const len = this._particles.length;
    for (let i = 0; i < len; i++) {
      this._particles[i].update();
      ctx.beginPath();
      const ellipseGradient = ctx.createRadialGradient(this._particles[i].location.x - this._particles[i].radius / 3, this._particles[i].location.y - this._particles[i].radius / 3, 0, this._particles[i].location.x, this._particles[i].location.y, this._particles[i].radius * 2);
      ellipseGradient.addColorStop(0, 'hsla(' + this._particles[i].hue + ', 85%, 100%, .5)');
      ellipseGradient.addColorStop(1, 'hsla(' + this._particles[i].hue + ', 85%, 70%, .7)');
      ctx.fillStyle = ellipseGradient;
      ctx.arc(this._particles[i].location.x, this._particles[i].location.y, this._particles[i].radius, 0, Math.PI * 2);
      ctx.closePath();
      ctx.fill();
    }
    if (this._count > 3600) {
      this._change();
    }
    requestAnimationFrame(() => this._draw());
  }

  _handleEvents() {
    window.addEventListener('reseze', () => this._resize());
  }

  _change() {
    this._count = 0;
    const len = this._particles.length;
    const results = [];
    for (let i = 0; i < len; i++) {
      results.push(this._particles[i].throughCount++);
    }
  }

  _resize() {
    if (window.innerWidth < 1024) {
      this._canvas.width = window.innerWidth;
      this._canvas.height = window.innerHeight;
    } else {
      this._canvas.width = 1024;
      this._canvas.height = window.innerHeight / window.innerWidth * 1024;
    }
    const len = this._particles.length;
    for (let i = 0; i < len; i++) {
      this._particles[i].max.set(this._canvas.width, this._canvas.height);
    }
  }
};

class Particle {
  constructor(x, y, min, max, radius, force, hue) {
    this._min = min;
    this._max = max;
    this.radius = radius;
    this._force = force;
    this.hue = hue;
    this.throughCount = 0;
    this.location = new Vector(x, y);
    this._velocity = new Vector(0, 0);
    this._acceleration = new Vector(0, 0);
    this._gravity = new Vector(0, 1 / 100);
    this._mass = this.radius / 100;
    this._frictionX = 0;
    this._frictionY = 1 / 1000;
    this._acceleration = this._force.mult(this._mass);
  }

  update() {
    this._acceleration = this._acceleration.add(this._gravity);
    this._velocity = this._velocity.add(this._acceleration);
    this._velocity = this._velocity.mult(1 - this._frictionX, 1 - this._frictionY);
    this.location = this.location.add(this._velocity);
    this._acceleration.set(0, 0);
    if (this.throughCount) {
      this._through();
    } else {
      this._bound();
    }
  }

  _bound() {
    if (this.location.x < this._min.x + this.radius) {
      this.location.x = this._min.x + this.radius;
      this._velocity.x *= -1;
    }
    if (this.location.x > this._max.x - this.radius) {
      this.location.x = this._max.x - this.radius;
      this._velocity.x *= -1;
    }
    if (this.location.y < this._min.y - this.radius) {
      this.location.y = this._min.y - this.radius;
      this._velocity.y *= -1;
    }
    if (this.location.y > this._max.y - this.radius) {
      this.location.y = this._max.y - this.radius;
      this._velocity.y *= -1;
    }
  }

  _through() {
    if (this.location.x < this._min.x + this.radius) {
      this.location.x = this._min.x + this.radius;
      this._velocity.x *= -1;
    }
    if (this.location.x > this._max.x - this.radius) {
      this.location.x = this._max.x - this.radius;
      this._velocity.x *= -1;
    }
    if (this.location.y < this._min.y) {
      this.location.y = this._max.y;
      this.throughCount--;
      this.hue += 72;
    }
    if (this.location.y > this._max.y) {
      this.location.y = this._min.y;
      this.throughCount--;
      this.hue += 72;
    }
  }
}

class Vector {
  constructor(x, y) {
    this.set(x, y);
  }

  set(x, y) {
    this.x = x;
    this.y = y;
  }

  add(v) {
    return new Vector(this.x + v.x, this.y + v.y);
  }

  mult(x, y) {
    y = y || x;
    return new Vector(this.x * x, this.y * y);
  };
}
