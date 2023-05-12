<div class="form-group col-7 col-md-3">
    <label for="isWireless" class="form-label">Souris sans fil</label>
    <select name="isWireless" id="isWireless" class="form-select">
        <option value="0" <?= !$piece->getIsWireless() ? 'selected' : ''; ?>>Non</option>
        <option value="1" <?= !$piece->getIsWireless() ? 'selected' : ''; ?>>Oui</option>
    </select>
</div>
<div class="form-group col-5 col-md-3">
    <label for="buttonNumber" class="form-label">Nombre de touches</label>
    <input type="number" class="form-control" name="buttonNumber" id="buttonNumber" placeholder="5"
        value="<?= $piece->getButtonNumber(); ?>">
</div>