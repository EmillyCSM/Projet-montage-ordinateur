<div class="form-group col-7">
    <label for="isSSD" class="form-label">Type</label>
    <select name="isSSD" id="isSSD" class="form-select">
        <option value="0" <?= !$piece->getIsSSD() ? 'selected' : ''; ?>>Disque dur</option>
        <option value="1" <?= !$piece->getIsSSD() ? 'selected' : ''; ?>>SSD</option>
    </select>
</div>
<div class="form-group col-5 col-md-3">
    <label for="capacity" class="form-label">Capacité (en Go)</label>
    <input type="number" class="form-control" name="capacity" id="capacity" placeholder="960"
        value="<?= $piece->getCapacity(); ?>">
</div>