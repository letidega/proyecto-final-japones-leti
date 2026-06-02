
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

// =============================================
// CALENDARIO — MI PERFIL
// =============================================
var calDias = document.getElementById('cal-dias');
var calTitulo = document.getElementById('cal-mes-titulo');
var btnIzq = document.querySelector('.cal-flecha-izq');
var btnDer = document.querySelector('.cal-flecha-der');

if (calDias && calTitulo) {

  var meses = [
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
  ];

  var hoy = new Date();
  var mesActual = hoy.getMonth();
  var añoActual = hoy.getFullYear();

  function renderCalendario(mes, año) {
    calTitulo.textContent = meses[mes] + ' ' + año;
    calDias.innerHTML = '';

    var primerDia = new Date(año, mes, 1).getDay();
    var offset = primerDia === 0 ? 6 : primerDia - 1;
    var totalDias = new Date(año, mes + 1, 0).getDate();

    for (var i = 0; i < offset; i++) {
      var vacio = document.createElement('div');
      vacio.classList.add('cal-dia', 'vacio');
      calDias.appendChild(vacio);
    }

    for (var d = 1; d <= totalDias; d++) {
      var dia = document.createElement('div');
      dia.classList.add('cal-dia');
      dia.textContent = d;

      if (
        d === hoy.getDate() &&
        mes === hoy.getMonth() &&
        año === hoy.getFullYear()
      ) {
        dia.classList.add('hoy');
      }

      calDias.appendChild(dia);
    }
  }

  renderCalendario(mesActual, añoActual);

  if (btnIzq) {
    btnIzq.addEventListener('click', function() {
      mesActual--;
      if (mesActual < 0) {
        mesActual = 11;
        añoActual--;
      }
      renderCalendario(mesActual, añoActual);
    });
  }

  if (btnDer) {
    btnDer.addEventListener('click', function() {
      mesActual++;
      if (mesActual > 11) {
        mesActual = 0;
        añoActual++;
      }
      renderCalendario(mesActual, añoActual);
    });
  }

}

// Abrir formulario insertar curso 
function toggleFormulario(id) {
  var form = document.getElementById(id);
  if (form.style.display === 'none') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
}

// =============================================
// SLIDER DE RESEÑAS
// =============================================
var resenas = document.querySelectorAll('.resena-item');
var flechaIzq = document.getElementById('flecha-izq');
var flechaDer = document.getElementById('flecha-der');
var resenaActual = 0;

function mostrarResena(indice) {
  resenas.forEach(function(r) {
    r.classList.remove('active');
  });
  resenas[indice].classList.add('active');
}

if (flechaDer) {
  flechaDer.addEventListener('click', function() {
    resenaActual = (resenaActual + 1) % resenas.length;
    mostrarResena(resenaActual);
  });
}

if (flechaIzq) {
  flechaIzq.addEventListener('click', function() {
    resenaActual = (resenaActual - 1 + resenas.length) % resenas.length;
    mostrarResena(resenaActual);
  });
}