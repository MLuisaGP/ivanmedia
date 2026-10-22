<?php
declare(strict_types=1);
?>
<dialog class="project-modal" id="projectModal" aria-label="Detalle del proyecto">
  <button class="modal-close" id="modalClose" aria-label="Cerrar proyecto" type="button">
    <?= icon('close') ?>
  </button>
  <img id="modalImage" src="" alt="">
  <div class="modal-info">
    <span>Proyecto seleccionado</span>
    <h3 id="modalTitle"></h3>
    <p id="modalDescription"></p>
  </div>
</dialog>
