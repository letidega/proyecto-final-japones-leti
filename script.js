
// HOME — EXPANDING FLEX CARDS LITERATURA
const options = document.querySelectorAll(".literatura .option");

options.forEach(option => {
  option.addEventListener("click", () => {
    options.forEach(o => o.classList.remove("active"));
    option.classList.add("active");
  });
});

// =============================================
// SISTEMA DE TABS — LECCIÓN
// =============================================
const tabBtns = document.querySelectorAll('.tab-btn');
const tabContenidos = document.querySelectorAll('.tab-contenido');

tabBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    tabBtns.forEach(b => {
      b.classList.remove('active');
      b.setAttribute('aria-selected', 'false');
    });
    tabContenidos.forEach(c => c.classList.remove('active'));
    btn.classList.add('active');
    btn.setAttribute('aria-selected', 'true');
    document.getElementById(btn.dataset.tab).classList.add('active');
  });
});

// =============================================
// CORRECCIÓN DE EJERCICIOS
// =============================================
const btnCorregir = document.getElementById('btn-corregir');

if (btnCorregir) {
  btnCorregir.addEventListener('click', () => {
    const items = document.querySelectorAll('.ejercicio-item');
    let correctas = 0;
    let sinResponder = 0;

    items.forEach(item => {
      const respuestaCorrecta = item.dataset.respuesta;
      const explicacion = item.dataset.explicacion;
      const seleccionada = item.querySelector('input[type="radio"]:checked');
      const feedback = item.querySelector('.ejercicio-feedback');

      if (!seleccionada) {
        sinResponder++;
        feedback.className = 'ejercicio-feedback incorrecto';
        feedback.textContent = '⚠️ Sin responder';
        return;
      }

      if (seleccionada.value === respuestaCorrecta) {
        correctas++;
        feedback.className = 'ejercicio-feedback correcto';
        feedback.innerHTML = '✅ RESPUESTA CORRECTA'
          + (explicacion ? ' — <em>' + explicacion + '</em>' : '');
      } else {
        feedback.className = 'ejercicio-feedback incorrecto';
        feedback.innerHTML = '❌ INCORRECTO. Correcta: <strong>'
          + respuestaCorrecta.toUpperCase() + '</strong>'
          + (explicacion ? ' — <em>' + explicacion + '</em>' : '');
      }
    });

    // Scroll al primer error
    const primerError = document.querySelector('.ejercicio-feedback.incorrecto');
    if (primerError) {
      primerError.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  });
}

// =============================================
// BOTÓN VOLVER ATRÁS
// =============================================
const btnVolver = document.getElementById('btn-volver');

if (btnVolver) {
  btnVolver.addEventListener('click', () => {
    history.back();
  });
}