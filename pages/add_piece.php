<?php
// if (!empty($_POST)) {
// }
// $_GET['typePiece'] = '';

if (!empty($_GET['typePiece'])) {
    echo $_GET['page'] . '</br>';
    echo $_GET['typePiece'] . '</br>';
    echo $_GET['test'] . '</br>';
}
?>

<section id="addPiecePage" class="container">
    <h2>Formulaire ajout ou modification de pièce</h2>

    <ul>
        <li>
            <a href="?page=add_piece&test=hello&typePiece=screen" class="btn btn-primary mb-3">Ecran</a>
        </li>
    </ul>

    <form method="post" class="p-3 m-auto">
        <div class="row gap-4">
            <div class="row d-flex gap-4">
                <div class="form-group col-12 col-md-8">
                    <label for="pieceName" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="pieceName" name="pieceName" placeholder="Pièce">
                </div>
                <div class="form-group col-12 col-md-8">
                    <label for="brand" class="form-label">Marque</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="DELL">
                </div>
                <div class="form-group col-5 col-md-3">
                    <label for="price" class="form-label">Prix d'achat HT</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="64,56">
                </div>
            </div>
            <div class="form-group col-7">
                <label for="compatibility" class="form-label">Pièce compatible avec</label>
                <select name="compatibility" id="compatibility" class="form-select">
                    <option value="0">Ordinateur portable</option>
                    <option value="1">Tour</option>
                </select>
            </div>
            <div class="form-group ">
                <label for="pieceDescription" class="form-label">Description</label>
                <textarea class="form-control" id="pieceDescribe" rows="6"></textarea>
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark w-25 m-auto">Ajouter</button>
            </div>
            <!-- Ajout champs enfant  -->

        </div>
    </form>
</section>