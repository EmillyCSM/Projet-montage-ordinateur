<div class="form-group col-7 col-md-3">
    <label for="isWireless" class="form-label">Clavier sans fil</label>
    <select name="isWireless" id="isWireless" class="form-select">
        <option value="0" <?= !$piece->getIsWireless() ? 'selected' : ''; ?>>Non</option>
        <option value="1" <?= !$piece->getIsWireless() ? 'selected' : ''; ?>>Oui</option>
    </select>
</div>
<div class="form-group col-7 col-md-3">
    <label for="isNumeric" class="form-label">Pavé numérique</label>
    <select name="isNumeric" id="isNumeric" class="form-select">
        <option value="0" <?= !$piece->getIsNumeric() ? 'selected' : ''; ?>>Non</option>
        <option value="1" <?= !$piece->getIsNumeric() ? 'selected' : ''; ?>>Oui</option>
    </select>
</div>
<div class="form-group col-7 col-md-3">
    <label for="isAzerty" class="form-label">Touches AZERTY</label>
    <select name="isAzerty" id="isAzerty" class="form-select">
        <option value="0" <?= !$piece->getIsAzerty() ? 'selected' : ''; ?>>Non</option>
        <option value="1" <?= !$piece->getIsAzerty() ? 'selected' : ''; ?>>Oui</option>
    </select>
</div>