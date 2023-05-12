<div class="form-group col-7 col-md-4">
    <label for="frequencyCPU" class="form-label">Fréquence CPU (en GHz)</label>
    <input type="number" step="0.01" class="form-control" name="frequencyCPU" id="frequencyCPU" placeholder="3,70"
        value="<?= $piece->getfrequencyCPU(); ?>">
</div>
<div class="form-group col-7 col-md-4">
    <label for="heartNumber" class="form-label">Nombre de cœurs</label>
    <input type="number" class="form-control" name="heartNumber" id="heartNumber" placeholder="8"
        value="<?= $piece->getHeartNumber(); ?>">
</div>
<div class="form-group col-12 col-md-7">
    <label for="chipsetCompatibility" class="form-label">Chipsets compatibles</label>
    <input type="text" class="form-control" id="chipsetCompatibility" name="chipsetCompatibility"
        placeholder="Intel H610 Express, AMD B550, etc" value="<?= $piece->getChipsetCompatibility(); ?>">
</div>