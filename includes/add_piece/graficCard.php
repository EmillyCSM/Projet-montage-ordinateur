<div class="form-group col-12 col-md-8">
    <label for="chipset" class="form-label">Chipset</label>
    <input type="text" class="form-control" id="chipset" name="chipset" placeholder="AMD Radeon / NVIDIA"
        value="<?= $piece->getChipset(); ?>">
</div>
<div class="form-group col-5 col-md-3">
    <label for="memory" class="form-label">Mémoire (en Go)</label>
    <input type="number" step="0.01" class="form-control" name="memory" id="memory" placeholder="255,55"
        value="<?= $piece->getMemory(); ?>">
</div>