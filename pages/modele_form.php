<?php



?>
<section id="model_form" class="container">
    <h1 class="mt-4 mb-4">Formulaire de création d'un modèle</h1>
    <form method="post"  class="row">
        <div class="row gap-4 ">
            <div class="row col-12 gap-4">
                <div class=" col-5 form-group ">
                    <label for="graficCard" class="mb-2">Carte graphique</label>
                    <select name="graficCard" class="form-select">
                        <option value="">- Carte graphique -</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class=" col-5 form-group">
                    <label for="keyboard" class="mb-2">Clavier</label>
                    <select name="keyboard" class="form-select">
                        <option value="">- Clavier -</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class=" col-5 form-group">
                    <label for="motherBoard" class="mb-2">Carte mère</label>
                    <select name="motherBoard" class="form-select">
                        <option value="">- Carte mère -</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class=" col-5 form-group">
                    <label for="mouse" class="mb-2">Souris</label>
                    <select name="mouse" class="form-select">
                        <option value="">- Souris -</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class=" col-5 form-group">
                    <label for="processor" class="mb-2">Processeur</label>
                    <select name="processor" class="form-select">
                        <option value="">- Processeur -</option>
                        <option value=""></option>
                    </select>
                </div>

                <div class="col-5 form-group">
                    <label for="supply" class="mb-2">Alimentation</label>
                    <select name="supply" class="form-select">
                        <option value="">- Alimentation -</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-5 form-group">
                    <label for="isDesktop" class="mb-2">Type</label>
                    <select name="isDesktop" class="form-select">
                        <option value="">- type -</option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-5 form-group">
                    <label for="name" class="mb-2">Nom du modèle</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-12 row">
                <div class="col-4 form-group">
                    <label for="ram" class="mb-2">Ram</label>
                    <select name="ram" class="form-select">
                        <option value="">- RAM -</option>
                        <option value=""></option>
                    </select>
                    <label for="ramQT" class="mb-2">Quantité RAM</label>
                    <input type="text" name="ramQT" class="form-control">
                </div>
                <div class=" col-4 form-group">
                    <label for="hardDisk" class="mb-2">Disque dur</label>
                    <select name="hardDisk" class="form-select">
                        <option value="">- Disque dur -</option>
                        <option value=""></option>
                    </select>
                    <label for="hardDiskQT" class="mb-2">Quantité disque dur</label>
                    <input type="text" name="hardDiskQT" class="form-control">
                </div>
                <div class=" col-4 form-group ">
                    <label for="screen" class="mb-2">Écrans</label>
                    <select name="screen" class="form-select">
                        <option value="">- Écrans -</option>
                        <option value=""></option>
                    </select>
                    <label for="screenQT" class="mb-2">Quantité écrans</label>
                    <input type="text" name="screenQT" class="form-control mb-3">
                </div>
                <div class="form-group">
            <label for="description" class="mb-2">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-5"></textarea>
        </div>
                <button type="submit" class="btn btn-dark m-auto w-25">Valider</button>
            </div>
            
        </div>

    </form>
</section>