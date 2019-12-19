
<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>

<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(["profile", "Go Back"]) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create profile
    </h1>
</div>

<?php echo $this->getContent(); ?>

<?php
    echo $this->tag->form(
        [
            "profile/create",
            "autocomplete" => "off",
            "class" => "form-horizontal",
        "enctype" => "multipart/form-data"
        ]
    );
?>

<div class="form-group">
    <label for="fieldNom" class="col-sm-2 control-label">Nom</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(["nom", "size" => 30, "class" => "form-control", "id" => "fieldNom"]) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldPrenom" class="col-sm-2 control-label">Prenom</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(["prenom", "size" => 30, "class" => "form-control", "id" => "fieldPrenom"]) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldAdress" class="col-sm-2 control-label">Adress</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(["adress", "size" => 30, "class" => "form-control", "id" => "fieldAdress"]) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldImageLien" class="col-sm-2 control-label">Upload your Image</label>
    <div class="col-sm-10">
        <?php echo $this->tag->fileField(["image_lien", "size" => 30, "class" => "form-control", "id" => "fiefieldImageLien"]) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldCvLien" class="col-sm-2 control-label">Upload your cv</label>
    <div class="col-sm-10">
        <?php echo $this->tag->fileField(["cv_lien", "size" => 30, "class" => "form-control", "id" => "fieldCvLien"]) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textArea(["description", "cols" => 30, "rows" => 4, "class" => "form-control", "id" => "fieldDescription"]) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(["Save", "class" => "btn btn-default"]) ?>
    </div>
</div>

<?php echo $this->tag->endForm(); ?>
