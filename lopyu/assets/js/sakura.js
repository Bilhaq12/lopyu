class Sakura {
    constructor(x, y, s, r, fn) {
        this.x = x;
        this.y = y;
        this.s = s;
        this.r = r;
        this.fn = fn;
        this.dx = Math.random() * 4 - 2;
        this.dy = Math.random() * 4 - 2;
    }

    update(cw, ch, speed) {
        this.x += this.dx * speed;
        this.y += this.dy * speed;
        this.r += speed * 0.01;

        // Wrap around the screen
        if (this.x > cw) this.x = 0;
        if (this.x < 0) this.x = cw;
        if (this.y > ch) this.y = 0;
        if (this.y < 0) this.y = ch;
    }

    draw(ctx) {
        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.rotate(this.r);
        ctx.scale(this.s, this.s);
        this.fn(ctx);
        ctx.restore();
    }
}

function createPetal(ctx) {
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.bezierCurveTo(-10, -10, -10, 10, 0, 10);
    ctx.bezierCurveTo(10, 10, 10, -10, 0, -10);
    ctx.fill();
}

window.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('sakura');
    const ctx = canvas.getContext('2d');

    let cw = window.innerWidth;
    let ch = window.innerHeight;

    canvas.width = cw;
    canvas.height = ch;

    const sakuraList = [];
    const sakuraCount = 50;

    for (let i = 0; i < sakuraCount; i++) {
        sakuraList.push(new Sakura(
            Math.random() * cw,
            Math.random() * ch,
            Math.random() * 0.5 + 0.5,
            Math.random() * 2 * Math.PI,
            createPetal
        ));
    }

    function animate() {
        ctx.clearRect(0, 0, cw, ch);
        sakuraList.forEach(sakura => {
            sakura.update(cw, ch, 0.5);
            ctx.fillStyle = '#ffd7e6';
            sakura.draw(ctx);
        });
        requestAnimationFrame(animate);
    }

    animate();

    window.addEventListener('resize', () => {
        cw = window.innerWidth;
        ch = window.innerHeight;
        canvas.width = cw;
        canvas.height = ch;
    });
});