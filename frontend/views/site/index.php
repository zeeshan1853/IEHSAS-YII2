<?php
$this->title = 'IEHSAS';
?>

<section id='panels-section' class="padding-ud-10 ">
    <div class="container">
        <div class="row upper-panels">
            <div class="col-md-12">
                <h3 class="text-center">What we offer</h3>
                <p class="text-center">
                    The Quick Brown Fox Jump over the Lazy Dog.The Quick Brown Fox Jump over the Lazy Dog.
                    The Quick Brown Fox Jump over the Lazy Dog.
                </p>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-3">
            <div class="panel" id="services">
                <div class="panel-heading">
                    <h2 class="text-center text-white">Services</h2>
                </div>
                <div class="panel-body text-center">
                    <span class="fa fa-desktop fa-3x"></span>
                    <p class="panel-lato">
                        IEHSAS provide embedded and outsource health and safety advice, solutions and provides technical and strategic consultancy to meet the specific needs of our valued clients.
                    </p>
                    <!--<hr style="border:1px dashed gray">-->
                </div>
                <a href="google.com">
                    <div class="panel-footer text-center">
                        <button class="btn">More Information</button>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel" id="courses">
                <div class="panel-heading">
                    <h2 class="text-center text-white">Courses</h2>
                </div>
                <div class="panel-body text-center">
                    <span class="fa fa-certificate fa-3x"></span>
                    <p>
                        IEHSAS offers a wide range of accredation courses which are design to help you to improve the professional development skills and knowledge.
                    </p>
                </div>
                <div class="panel-footer text-center">
                    <button class="btn">More Information</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel" id="trainings">
                <div class="panel-heading">
                    <h2 class="text-center text-white">Trainings</h2>
                </div>
                <div class="panel-body text-center">
                    <span class="fa fa-wrench  fa-3x"></span>
                    <p>
                        IEHSAS not only boost first class training facilities, but also a team of highly professionals with in-depth industrial experience
                    </p>
                </div>
                <div class="panel-footer text-center">
                    <button class="btn">More Information</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel" id="course-references">
                <div class="panel-heading">
                    <h2 class="text-center text-white">Resources</h2>
                </div>
                <div class="panel-body text-center">
                    <span class="fa fa-briefcase fa-3x"></span>
                    <p>
                        IEHSAS also provide courses free of cost.Our valued clients are already getting free trainings and courses material.we provide career counseling as well to our valued students at our best.
                    </p>
                </div>
                <div class="panel-footer text-center">
                    <button class="btn">More Information</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Upcomming events-->
<?= $this->render('_news') ?>
<!-- News Upcomming events-->
<!-- Features -->
<?= $this->render('_features') ?>
<!-- End Features reendering-->
 <!--affliations feature rendering-->
 <?= $this->render('_affliations') ?>
<!-- End affliations Rendering -->
<!-- Our clients rendering-->
 <?= $this->render('_clients') ?>
<!-- End clients Rendering -->