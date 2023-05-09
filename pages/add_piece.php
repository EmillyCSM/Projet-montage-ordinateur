<section id="addPiecePage" class="container">
    <h2>Formulaire ajout ou modification de pièce</h2>
    <!-- Type of piece choice-->
    <h4 class="form-label">Choisissez le type de pièce</h4>
    <ul class="list-unstyled d-flex flex-wrap gap-2">
        <?php foreach (Piece::CATEGORIES as $slug => $name) {
            ?>
            <li>
                <a href="?page=add_piece&typePiece=<?= $slug; ?>" class="btn btn-secondary mb-3"><?= $name; ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
    <!-- Include Formular -->

    <?php
    var_dump($_POST);
    if (!empty($_GET['typePiece']) && array_key_exists($_GET['typePiece'], Piece::CATEGORIES)) {
        $type = $_GET['typePiece'];
        include_once 'includes/add_piece/start_form.php';
        include_once 'includes/add_piece/' . $type . '.php';
        include_once 'includes/add_piece/end_form.php';
    }