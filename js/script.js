

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