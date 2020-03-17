<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use rmrevin\yii\fontawesome\FA;
use Symfony\Polyfill\Php72\Php72;

AppAsset::register($this);
rmrevin\yii\fontawesome\AssetBundle::register($this);

?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>
<?php
if (!isset($_SESSION['userid'])) {

    ?>

<br />
    <h2>
        <div class="text text-primary text-center"> Please login to access this page
    </h2>
    </div><br />
    <div class="text-center"><a class="btn btn-danger btn-background"
            href="<?php echo Url::toRoute('site/login'); ?>">Login</a></div>;
            <?php
} else {
    ?>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><?php echo Html::img('@web/images/logo.png',['class'=> 'logo']) ?></div>
      <div class="list-group list-group-flush">
        <a href ="<?=Url::toRoute('leave/index')?>"class="list-group-item list-group-item-action bg-light">Leave </a>
        <a href="<?=Url::toRoute('approval/index')?>" class="list-group-item list-group-item-action bg-light">Approvals</a>
        <a href="<?=Url::toRoute('users/index')?>" class="list-group-item list-group-item-action bg-light">Leave Days</a>
        <a href="<?=Url::toRoute('users/index')?>" class="list-group-item list-group-item-action bg-light">Profile</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-default toggle-btn" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="<?=Url::toRoute('site/index')?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo FA::icon('user');?>
              <?=Yii::$app->session['username'];
                ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item user-image" href="#"><?php echo Html::img('@web/images/userholder.png',['class'=>'userholder']) ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><?=Yii::$app->session['useremail'];?></a>
                <div class="dropdown-divider"></div>
                <button class="btn btn-secondary btnlogout" type="button"><a class="dropdown-item" href="<?=Url::toRoute('site/logout')?>"><b>Logout</b></a></button>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
      <?=Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ])?>
        <?=Alert::widget()?>
        <?=$content?>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; rabitech <?=date('Y')?></p>

        <p class="pull-right"><?=Yii::powered()?></p>
    </div>
</footer>
<?php
}
?>
<?php $this->endBody()?>

<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
<?php $this->endPage()?>
