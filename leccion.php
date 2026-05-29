<?php include("header-leccion.php"); ?>

<!-- TABS DE LECCIÓN -->
<section class="leccion-section">

  <!-- BARRA DE TABS -->
  <nav class="leccion-tabs" role="tablist">

    <button class="tab-btn active" data-tab="vocabulario" role="tab" aria-selected="true">
      <span class="tab-icono">🎴</span>
      <span class="tab-label">VOCABULARIO</span>
    </button>

    <button class="tab-btn" data-tab="gramatica" role="tab" aria-selected="false">
      <span class="tab-icono tab-kanji">ま</span>
      <span class="tab-label">GRAMÁTICA</span>
    </button>

    <button class="tab-btn" data-tab="ejercicios" role="tab" aria-selected="false">
      <span class="tab-icono">🐰</span>
      <span class="tab-label">EJERCICIOS</span>
    </button>

    <button class="tab-btn" data-tab="audio" role="tab" aria-selected="false">
      <span class="tab-icono">🎵</span>
      <span class="tab-label">AUDIO</span>
    </button>

    <button class="tab-btn" data-tab="cultura" role="tab" aria-selected="false">
      <span class="tab-icono">⛩️</span>
      <span class="tab-label">CULTURA</span>
    </button>

  </nav>

  <!-- CONTENIDO TABS -->
  <div class="leccion-contenido">

    <!-- ==================== VOCABULARIO ==================== -->
    <div id="vocabulario" class="tab-contenido active">
      <div class="container">
        <div class="vocab-grid">

          <div class="vocab-item">
            <img src="img/vocab/makemasu.png" alt="Perder">
            <p class="vocab-romaji">MAKEMASU</p>
            <p class="vocab-japones">まけます</p>
            <p class="vocab-traduccion">Perder</p>
          </div>

          <div class="vocab-item">
            <img src="img/vocab/kachimasu.png" alt="Ganar">
            <p class="vocab-romaji">KACHIMASU</p>
            <p class="vocab-japones">かちます</p>
            <p class="vocab-traduccion">Ganar</p>
          </div>

          <div class="vocab-item">
            <img src="img/vocab/yamemasu.png" alt="Dimitir">
            <p class="vocab-romaji">[KAISHA O] YAMEMASU</p>
            <p class="vocab-japones">[かいしゃを] やめます</p>
            <p class="vocab-traduccion">Dimitir, dejar (una empresa)</p>
          </div>

          <div class="vocab-item">
            <img src="img/vocab/ryugaku.png" alt="Viajar al extranjero">
            <p class="vocab-romaji">RYŪGAKUSHIMASU</p>
            <p class="vocab-japones">りゅうがくします</p>
            <p class="vocab-traduccion">Viajar al extranjero</p>
          </div>

          <div class="vocab-item">
            <img src="img/vocab/fuben.png" alt="Inconveniente">
            <p class="vocab-romaji">FUBEN[NA]</p>
            <p class="vocab-japones">ふべん[な]</p>
            <p class="vocab-traduccion">Inconveniente</p>
          </div>

          <div class="vocab-item">
            <img src="img/vocab/hoso.png" alt="Transmisión">
            <p class="vocab-romaji">HŌSŌ</p>
            <p class="vocab-japones">ほうそう</p>
            <p class="vocab-traduccion">Transmisión, anuncio</p>
          </div>

          <div class="vocab-item">
            <img src="img/vocab/uso.png" alt="Mentira">
            <p class="vocab-romaji">USO</p>
            <p class="vocab-japones">うそ</p>
            <p class="vocab-traduccion">Mentira</p>
          </div>

        </div>
      </div>
    </div>

    <!-- ==================== GRAMÁTICA ==================== -->
    <div id="gramatica" class="tab-contenido">
      <div class="container">

        <div class="gramatica-bloque">
          <div class="gramatica-forma">
            Forma: <strong>と思います（とおもいます）</strong>
          </div>
          <p class="gramatica-explicacion">Se utiliza para indicar lo que uno piensa o cree.</p>

          <h3 class="gramatica-subtitulo">Forma informal + と思います</h3>

          <p class="gramatica-explicacion">Esta forma tiene varios usos:</p>

          <p class="gramatica-explicacion"><strong>1) Para expresar suposiciones:</strong></p>
          <div class="gramatica-ejemplos">
            <p>明日雨がふると思います – Creo que mañana lloverá</p>
            <p>テレーザちゃんはもうねたと思います – Creo que Teresa ya se ha ido a dormir.</p>
            <p>母も日本へ来ると思います – Creo que mi madre también vendrá a Japón</p>
          </div>

          <p class="gramatica-explicacion mt-4">Cuando la suposición es negativa, la frase que antecede a と es negativa.</p>
          <div class="gramatica-ejemplos">
            <p>ミラーさんはこのニュースをしらないと思います – Creo que el Sr. Miller no conoce esta noticia.</p>
          </div>

          <p class="gramatica-explicacion mt-4"><strong>2) Para manifestar una opinión:</strong></p>
          <div class="gramatica-ejemplos">
            <p>日本はぶっかが高いと思います – Pienso que el costo de vida en Japón es alto.</p>
            <p>ちかてつはべんりだと思います – Pienso que el metro es útil.</p>
            <p>ねこはとてもかわいいと思います – Pienso que los gatos son muy lindos.</p>
            <p>東京はしずかじゃないと思います – Pienso que Tokio no es tranquilo.</p>
          </div>

          <p class="gramatica-explicacion mt-4">Traduce las siguientes oraciones al japonés:</p>
          <div class="gramatica-ejemplos">
            <p>- Creo que Sato juega al golf.</p>
            <p>- Creo que Yamada ya regresó.</p>
            <p>- Creo que mañana hará frío.</p>
            <p>- Pienso que los coches son útiles.</p>
            <p>- Pienso que los niños tienen que jugar fuera.</p>
            <p>- ¿Qué opinas sobre este manga? / Pienso que es interesante.</p>
          </div>
        </div>

      </div>
    </div>

    <!-- ==================== EJERCICIOS ==================== -->
    <div id="ejercicios" class="tab-contenido">
      <div class="container">
        <form id="form-ejercicios" novalidate>

          <h3 class="ejercicio-titulo">COMPLETA LA FRASE (ELIGE LA OPCIÓN CORRECTA)</h3>

          <div class="ejercicio-item" data-respuesta="a" data-explicacion="ANTES DE 〜と思います USAMOS FORMA SIMPLE.">
            <p class="ejercicio-pregunta">1. 日本語は______と思います。</p>
            <div class="ejercicio-opciones">
              <label class="ejercicio-opcion"><input type="radio" name="p1" value="a"> A) むずかしい</label>
              <label class="ejercicio-opcion"><input type="radio" name="p1" value="b"> B) むずかしいです</label>
              <label class="ejercicio-opcion"><input type="radio" name="p1" value="c"> C) むずかしいだ</label>
            </div>
            <div class="ejercicio-feedback"></div>
          </div>

          <div class="ejercicio-item" data-respuesta="b" data-explicacion="">
            <p class="ejercicio-pregunta">2. 明日、雨が______と思います。</p>
            <div class="ejercicio-opciones">
              <label class="ejercicio-opcion"><input type="radio" name="p2" value="a"> A) ふります</label>
              <label class="ejercicio-opcion"><input type="radio" name="p2" value="b"> B) ふる</label>
              <label class="ejercicio-opcion"><input type="radio" name="p2" value="c"> C) ふった</label>
            </div>
            <div class="ejercicio-feedback"></div>
          </div>

          <div class="ejercicio-item" data-respuesta="c" data-explicacion="">
            <p class="ejercicio-pregunta">3. この映画は面白い（___）と思います。</p>
            <div class="ejercicio-opciones">
              <label class="ejercicio-opcion"><input type="radio" name="p3" value="a"> A) です</label>
              <label class="ejercicio-opcion"><input type="radio" name="p3" value="b"> B) だ</label>
              <label class="ejercicio-opcion"><input type="radio" name="p3" value="c"> C) Ø</label>
            </div>
            <div class="ejercicio-feedback"></div>
          </div>

          <div class="ejercicio-item" data-respuesta="b" data-explicacion="">
            <p class="ejercicio-pregunta">4. 明日は忙しい（___）と思います。</p>
            <div class="ejercicio-opciones">
              <label class="ejercicio-opcion"><input type="radio" name="p4" value="a"> A) です</label>
              <label class="ejercicio-opcion"><input type="radio" name="p4" value="b"> B) Ø</label>
            </div>
            <div class="ejercicio-feedback"></div>
          </div>

          <h3 class="ejercicio-titulo mt-5">TRADUCCIÓN GUIADA (ELIGE LA TRADUCCIÓN CORRECTA)</h3>
          <p class="ejercicio-instruccion">👉 "CREO QUE EL JAPONÉS ES INTERESANTE."</p>

          <div class="ejercicio-item" data-respuesta="a" data-explicacion="">
            <div class="ejercicio-opciones">
              <label class="ejercicio-opcion"><input type="radio" name="p5" value="a"> A) 日本語はおもしろいと思います。</label>
              <label class="ejercicio-opcion"><input type="radio" name="p5" value="b"> B) 日本語はおもしろいですと思います。</label>
              <label class="ejercicio-opcion"><input type="radio" name="p5" value="c"> C) 日本語がおもしろいと思いますです。</label>
            </div>
            <div class="ejercicio-feedback"></div>
          </div>

          <div class="ejercicio-botones">
            <button type="button" class="btn miBoton" id="btn-corregir">¡CORREGIR!</button>
            <button type="button" class="btn miBoton btn-volver" id="btn-volver">VOLVER ATRÁS</button>
          </div>

        </form>
      </div>
    </div>

    <!-- ==================== AUDIO ==================== -->
    <div id="audio" class="tab-contenido">
      <div class="container">
        <div class="audio-lista">

          <div class="audio-item">
            <p class="audio-titulo">Diálogo 1 — Conversación cotidiana</p>
            <audio controls class="audio-player">
              <source src="audio/leccion1-dialogo1.mp3" type="audio/mpeg">
              Tu navegador no soporta el elemento de audio.
            </audio>
          </div>

          <div class="audio-item">
            <p class="audio-titulo">Diálogo 2 — Expresar opiniones</p>
            <audio controls class="audio-player">
              <source src="audio/leccion1-dialogo2.mp3" type="audio/mpeg">
              Tu navegador no soporta el elemento de audio.
            </audio>
          </div>

          <div class="audio-item">
            <p class="audio-titulo">Vocabulario — Pronunciación</p>
            <audio controls class="audio-player">
              <source src="audio/leccion1-vocab.mp3" type="audio/mpeg">
              Tu navegador no soporta el elemento de audio.
            </audio>
          </div>

        </div>
      </div>
    </div>

    <!-- ==================== CULTURA ==================== -->
    <div id="cultura" class="tab-contenido">
      <div class="container">

        <div class="cultura-bloque">
          <h3 class="cultura-titulo">La cultura del trabajo en Japón</h3>
          <img src="img/cultura/trabajo-japon.jpg" alt="Cultura del trabajo en Japón" class="cultura-img">
          <p class="cultura-contenido">
            En Japón, el trabajo ocupa un lugar central en la vida social. El concepto de
            <em>karoshi</em> (muerte por exceso de trabajo) refleja la intensidad con la que
            muchos japoneses se dedican a su empleo. Sin embargo, en los últimos años el país
            ha impulsado reformas para reducir las horas de trabajo y promover un mejor equilibrio
            entre vida personal y laboral.
          </p>
        </div>

      </div>
    </div>

  </div>

</section>

<?php include("footer-leccion.php"); ?>