<?php
declare(strict_types=1);
?>
<dialog class="project-modal" id="projectModal" aria-label="Vista de imagen">
  <button class="modal-close" id="modalClose" aria-label="Cerrar vista" type="button">
    <?= icon('close') ?>
  </button>
  <div class="modal-content-wrap">
    <img id="modalImage" src="" alt="">
    <div class="modal-info" id="modalInfo">
      <h3 id="modalTitle"></h3>
      <p id="modalDescription"></p>
    </div>
  </div>
</dialog>
