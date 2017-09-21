<?php
/* @var $this View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\HomeAssets;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

HomeAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="upper-wrapper">
            <section id="slider-section">
                <div id="first-slider">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <button class="btn btn-primary" data-animation="animated bounceInDown" >
                                Get Started
                            </button>
                            <a href="#myNavbar" class="animated infinite bounce smoothScroll">
                                <span class="fa fa-angle-double-down fa-5x text-white" aria-hidden="true">
                                </span>
                            </a>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <!-- Item 1 -->
                            <div class="item active slide1">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-3 text-right">
                                            <img style="max-width: 200px;" class="slider-thumbnail" data-animation="animated zoomInLeft" src="http://s20.postimg.org/pfmmo6qj1/window_domain.png">
                                        </div>
                                        <div class="col-md-9 text-right slider-text">
                                            <h3 data-animation="animated bounceInDown ">
                                                Add images, or even your logo!
                                            </h3>
                                            <h4 data-animation="animated bounceInUp">
                                                Easily use stunning effects
                                            </h4>
                                            <!-- <button class="btn btn-primary text-center" style="margin-right:50%;margin-top:30%">
                                                I am button
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 2 -->
                            <div class="item slide2">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-7 text-left slider-text">
                                            <h3 data-animation="animated bounceInDown"> 50 animation options A beautiful</h3>
                                            <h4 data-animation="animated bounceInUp">Create beautiful slideshows </h4>
                                        </div>
                                        <div class="col-md-5 text-right ">
                                            <img style="max-width: 200px;" class="slider-thumbnail pull-right"  data-animation="animated zoomInLeft" src="http://s20.postimg.org/sp11uneml/rack_server_unlock.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="item slide3">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-7 text-left slider-text">
                                            <h3 data-animation="animated bounceInDown">IEHSAS</h3>
                                            <h4 data-animation="animated bounceInUp">Bootstrap Image Carousel Slider with Animate.css</h4>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <img style="max-width: 200px;" class="slider-thumbnail pull-right" data-animation="animated zoomInLeft" src="http://s20.postimg.org/eq8xvxeq5/globe_network.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 4 -->
                            <div class="item slide4">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-7 text-left slider-text">
                                            <h3 data-animation="animated bounceInDown">We are creative</h3>
                                            <h4 data-animation="animated bounceInUp">Get start your next awesome project</h4>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <img style="max-width: 200px;" class="slider-thumbnail pull-right" data-animation="animated zoomInLeft" src="http://s20.postimg.org/9vf8xngel/internet_speed.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item 4 -->

                        </div>
                        <!-- End Wrapper for slides-->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </section>

            <section class="navigation-bar">
                <nav class="navbar navbar-inverse1 navbar-bg" data-spy="affix" data-offset-top="655">
                    <div class="container-fluid">
                        <div class="navbar-header" >
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><img src="images/IEHSAS.png"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">HSE Cources</a></li>
                                <li><a href="#">Verifications</a></li>
                                <li><a href="form/index.html">Contact Us</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
        </div>

        <div class="container-fluid">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; IEHSAS <?= date('Y') ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
