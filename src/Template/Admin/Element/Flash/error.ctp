<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div> -->
<div class="col-lg-12" onclick="this.classList.add('hidden');">
<div class="note note-danger">
<p><?= $message ?></p>
</div>
</div>

