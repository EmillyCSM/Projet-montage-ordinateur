<!--  Insertion champs selon la pièce choisie -->
<div class="form-group col-7">
    <label for="typePiece" class="form-label">Type</label>
    <select name="typePiece" id="typePiece" class="form-select">
        <?php foreach (Piece::CATEGORIES as $slug => $name) {
            echo "<option value='$slug'>$name</option>";
        }
        ?>
    </select>
</div>