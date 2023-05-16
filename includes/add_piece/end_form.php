<div class="form-group ">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="pieceDescribe"
        rows="6"><?= $piece->getDescription(); ?></textarea>
</div>
<div class="">
    <button type="submit" class="btn btn-dark w-25 m-auto">Valider</button>
</div>

</div>
</form>
</section>