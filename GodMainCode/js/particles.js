(function(window) {
    var ParticleSystem = function(container, options) {
        this.container = document.getElementById(container);
        this.options = Object.assign({
            type: 'sakura',
            count: 50,
            speed: 1,
            size: 6,
            opacity: 0.6,
        }, options);
        
        this.particles = [];
        this.canvas = null;
        this.ctx = null;
        this.animationId = null;
    };

    ParticleSystem.prototype.init = function() {
        if (!this.container) return;
        
        this.canvas = document.createElement('canvas');
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
        this.canvas.style.cssText = 'position: absolute; top: 0; left: 0; width: 100%; height: 100%;';
        this.container.appendChild(this.canvas);
        
        this.ctx = this.canvas.getContext('2d');
        
        this.createParticles();
        this.animate();
        
        window.addEventListener('resize', this.resize.bind(this));
    };

    ParticleSystem.prototype.createParticles = function() {
        this.particles = [];
        
        for (var i = 0; i < this.options.count; i++) {
            this.particles.push(this.createParticle());
        }
    };

    ParticleSystem.prototype.createParticle = function() {
        var x = Math.random() * this.canvas.width;
        var y = Math.random() * this.canvas.height;
        
        return {
            x: x,
            y: y,
            size: this.options.size + (Math.random() - 0.5) * 4,
            speedY: this.options.speed + Math.random() * 0.5,
            speedX: (Math.random() - 0.5) * 0.5,
            opacity: this.options.opacity + (Math.random() - 0.5) * 0.3,
            rotation: Math.random() * Math.PI * 2,
            rotationSpeed: (Math.random() - 0.5) * 0.02,
            drift: Math.random() * Math.PI * 2,
            driftSpeed: 0.01 + Math.random() * 0.01,
        };
    };

    ParticleSystem.prototype.drawParticle = function(p) {
        this.ctx.save();
        this.ctx.translate(p.x, p.y);
        this.ctx.rotate(p.rotation);
        this.ctx.globalAlpha = p.opacity;
        
        if (this.options.type === 'sakura') {
            this.drawSakura(p.size);
        } else {
            this.drawSnowflake(p.size);
        }
        
        this.ctx.restore();
    };

    ParticleSystem.prototype.drawSakura = function(size) {
        this.ctx.fillStyle = 'rgba(255, 183, 197, 0.8)';
        this.ctx.beginPath();
        
        for (var i = 0; i < 5; i++) {
            var angle = (i * Math.PI * 2) / 5 - Math.PI / 2;
            var x = Math.cos(angle) * size;
            var y = Math.sin(angle) * size;
            
            if (i === 0) {
                this.ctx.moveTo(x, y);
            } else {
                var cp1x = Math.cos(angle - 0.2) * size * 1.5;
                var cp1y = Math.sin(angle - 0.2) * size * 1.5;
                var cp2x = Math.cos(angle + 0.2) * size * 1.5;
                var cp2y = Math.sin(angle + 0.2) * size * 1.5;
                this.ctx.bezierCurveTo(cp1x, cp1y, cp2x, cp2y, x, y);
            }
        }
        
        this.ctx.closePath();
        this.ctx.fill();
        
        this.ctx.fillStyle = 'rgba(255, 200, 210, 0.6)';
        this.ctx.beginPath();
        this.ctx.arc(0, 0, size * 0.3, 0, Math.PI * 2);
        this.ctx.fill();
    };

    ParticleSystem.prototype.drawSnowflake = function(size) {
        this.ctx.strokeStyle = 'rgba(255, 255, 255, 0.9)';
        this.ctx.lineWidth = 1;
        
        for (var i = 0; i < 6; i++) {
            this.ctx.beginPath();
            var angle = (i * Math.PI * 2) / 6;
            this.ctx.moveTo(0, 0);
            
            var length = size;
            var x = Math.cos(angle) * length;
            var y = Math.sin(angle) * length;
            this.ctx.lineTo(x, y);
            
            var branchLength = length * 0.4;
            var branchAngle = Math.PI / 6;
            
            var bx1 = Math.cos(angle + branchAngle) * branchLength + x * 0.6;
            var by1 = Math.sin(angle + branchAngle) * branchLength + y * 0.6;
            this.ctx.moveTo(x * 0.6, y * 0.6);
            this.ctx.lineTo(bx1, by1);
            
            var bx2 = Math.cos(angle - branchAngle) * branchLength + x * 0.6;
            var by2 = Math.sin(angle - branchAngle) * branchLength + y * 0.6;
            this.ctx.moveTo(x * 0.6, y * 0.6);
            this.ctx.lineTo(bx2, by2);
            
            this.ctx.stroke();
        }
    };

    ParticleSystem.prototype.updateParticle = function(p) {
        p.y += p.speedY;
        p.drift += p.driftSpeed;
        p.x += Math.sin(p.drift) * 0.5 + p.speedX;
        p.rotation += p.rotationSpeed;
        
        if (p.y > this.canvas.height + 20) {
            p.y = -20;
            p.x = Math.random() * this.canvas.width;
        }
        
        if (p.x < -20) p.x = this.canvas.width + 20;
        if (p.x > this.canvas.width + 20) p.x = -20;
    };

    ParticleSystem.prototype.animate = function() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        for (var i = 0; i < this.particles.length; i++) {
            this.updateParticle(this.particles[i]);
            this.drawParticle(this.particles[i]);
        }
        
        this.animationId = requestAnimationFrame(this.animate.bind(this));
    };

    ParticleSystem.prototype.resize = function() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    };

    ParticleSystem.prototype.destroy = function() {
        if (this.animationId) {
            cancelAnimationFrame(this.animationId);
        }
        if (this.canvas) {
            this.container.removeChild(this.canvas);
        }
        window.removeEventListener('resize', this.resize.bind(this));
    };

    window.ParticleSystem = ParticleSystem;
})(window);