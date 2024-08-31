

const boxes2 = document.querySelectorAll(".box");

window.addEventListener("scroll", () => {


  const triggerBottom = window.innerHeight;

  boxes2.forEach(box => {
    const boxTop = box.getBoundingClientRect().top;

    if (boxTop < triggerBottom) {
      box.classList.add("show");
    } else {
      box.classList.remove("show");
    }


  });
});

const boxes = document.querySelectorAll('.box');

function checkScroll() {
  boxes.forEach(box => {
    const boxTop = box.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;
    if (boxTop < windowHeight * 0.75) {
      box.classList.add('visible');
    } else {
      box.classList.remove('visible');
    }
  });
}

window.addEventListener('scroll', checkScroll);
checkScroll(); // Para comprobar el estado inicial al cargar la página


document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('myForm');
  
    form.addEventListener('submit', function (event) {
      event.preventDefault(); // Evita el envío del formulario
  
      // Obtener los valores del formulario
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const telefono = document.getElementById('phone').value;
      const comentario = document.getElementById('message').value;
     
  
  
      // Crear el mensaje de confirmación
      const confirmationMessage = `Confirma el envío de los siguientes datos:\n\nNombre: ${name}
        \nEmail: ${email}
        \nTeléfono: ${telefono}
         \nComentarios: ${comentario}
        `;
  
      // Mostrar la ventana emergente
      if (confirm(confirmationMessage)) {
        // Si el usuario confirma, enviar el formulario
        form.submit();
      }
    });
  });

  window.onload = function () {
    const canvas = document.getElementById('particleCanvas');
    const ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const particlesArray = [];
    const numberOfParticles = 100;

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    class Particle {
        constructor(x, y, size, dx, dy) {
            this.x = x;
            this.y = y;
            this.size = size;
            this.color = getRandomColor(); // Asignar un color aleatorio
            this.dx = dx;
            this.dy = dy;
        }

        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
            ctx.fillStyle = this.color;
            ctx.fill();
        }

        update() {
            if (this.x + this.size > canvas.width || this.x - this.size < 0) {
                this.dx = -this.dx;
            }
            if (this.y + this.size > canvas.height || this.y - this.size < 0) {
                this.dy = -this.dy;
            }
            this.x += this.dx;
            this.y += this.dy;
        }
    }

    function init() {
        for (let i = 0; i < numberOfParticles; i++) {
            let size = Math.random() * 5 + 2;
            let x = Math.random() * (canvas.width - size * 2) + size;
            let y = Math.random() * (canvas.height - size * 2) + size;
            let dx = (Math.random() - 0.5) * 2;
            let dy = (Math.random() - 0.5) * 2;
            particlesArray.push(new Particle(x, y, size, dx, dy));
        }
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (let i = 0; i < particlesArray.length; i++) {
            particlesArray[i].update();
            particlesArray[i].draw();
        }
        requestAnimationFrame(animate);
    }

    init();
    animate();

    window.addEventListener('resize', function () {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
}

