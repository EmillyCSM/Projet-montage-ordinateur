<form method="post" class="p-3 m-auto">
    <div class="row gap-4">
        <div class="row d-flex gap-4">
            <div class="form-group col-12 col-md-8">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="pieceName" name="name" placeholder="Ajouter le nom"
                    value="<?= $piece->getName(); ?>">
            </div>
            <div class="form-group col-12 col-md-8">
                <label for="brand" class="form-label">Marque</label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="DELL"
                    value="<?= $piece->getBrand(); ?>">
            </div>
            <div class="form-group col-5 col-md-3">
                <label for="buyingPrice" class="form-label">Prix d'achat HT</label>
                <input type="number" step="0.01" class="form-control" name="buyingPrice" id="price" placeholder="64,56"
                    value="<?= $piece->getBuyingPrice(); ?>">
            </div>
        </div>
        <div class="form-group col-7">
            <label for="isDesktop" class="form-label">Pièce compatible avec</label>
            <select name="isDesktop" id="isDesktop" class="form-select">
                <option value="0" <?= !$piece->getIsDesktop() ? 'selected' : ''; ?>>Ordinateur portable</option>
                <option value="1" <?= $piece->getIsDesktop() ? 'selected' : ''; ?>>Tour</option>
            </select>
        </div>