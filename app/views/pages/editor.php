<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo STYLE; ?>/index.css">

<div id="main">
  <div class="container mt-3">
    <div class="green_bar mb-2"> Editor in Chief</div>
    <dl class="row featurette mx-auto ">
      <dt class="col-sm-3"> NAME</dt>
      <dd class="col-sm-9"> <?php echo $data['editor']->editorName; ?></dd>
      <dt class="col-sm-3"> email</dt>
      <dd class="col-sm-9"><?php echo $data['editor']->editorEmail; ?></dd>
      <dt class="col-sm-3">Deatil</dt>
      <dd class="col-sm-9"><?php echo $data['editor']->editorDetail; ?></dd>
    </dl>
    <div class="green_bar">Associate Editors</div>
    <?php foreach ($data['associate'] as  $detail) :  ?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <strong> <?php echo $detail->aseditorName . ",&nbsp" . $detail->aseditorEmail; ?></strong>
          <p class="card-text"> <?php echo $detail->aseditorCollege; ?></p>
        </li>
      <?php endforeach; ?>

      <p class="lead text-center">Our representive Associate Proferssors who helped us alot During this project</p>


  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>