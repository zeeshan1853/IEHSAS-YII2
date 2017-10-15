<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->registerCssFile('@web/css/courses_list.css', ['depends' => AppAsset::className()]); ?>

<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider">
            <li><img src="images/banner.jpg" class="img-responsive" alt=""/>
                <div class="banner_desc">
                    <div class="container">
                        <h1>IEHSAS</h1>
                        <h2>List of all courses</h2>
                    </div>
                    <div class="details">
                        <div class="container">
                            <div class="col-xs-10 dropdown-buttons">   
                                <div class="col-xs-4 dropdown-button">           			
                                    <div class="section_room">
                                        <select id="country" onchange="change_country(this.value)" class="frm-field required">
                                            <option value="null">All Locations</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4 dropdown-button">
                                    <div class="section_room">
                                        <select id="country" onchange="change_country(this.value)" class="frm-field required">
                                            <option value="null">All Property types</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4 dropdown-button">
                                    <div class="section_room">
                                        <select id="country" onchange="change_country(this.value)" class="frm-field required">
                                            <option value="null">All contracts</option>
                                            <option value="null">Sale</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-xs-2 submit_button"> 
                                <form>
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="smart_details">
    <div class="container">
        <div class="col-md-10 dropdown-buttons">   
            <div class="col-md-4 dropdown-button">           			
                <div class="section_room">
                    <select id="country" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">All Locations</option>
                        <option value="null">Business</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 dropdown-button">
                <div class="section_room">
                    <select id="country" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">All Property types</option>
                        <option value="null">House</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 dropdown-button">
                <div class="section_room">
                    <select id="country" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">All contracts</option>
                        <option value="null">Sale</option>
                    </select>
                </div>
            </div>
        </div> 
        <div class="col-md-2 submit_button"> 
            <form>
                <input type="submit" value="Search">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="content_top">
    <div class="container">
        <h4 class="m_3">Most Popular</h4>
        <div class="grid_1">
            <?php foreach ($courses as $course) { ?>
                <div class="col-md-3 box_1">
                    <a href="<?= Url::to(['course/detail', 'id' => (string) $course->_id]) ?>"><img src="images/default_thumbnail.png" class="img-responsive" alt=""/></a>
                    <div class="box_2">
                        <div class="special-wrap"><div class="hot_offer"><span class="m_11">Hot Offer</span></div><div class="forclosure"><span class="m_12">Special Offer</span></div></div>
                    </div>
                    <div class="box_3">
                        <h3><?= Html::a(Html::encode($course->name), ['course/detail', 'id' => (string) $course->_id], ['class' => '']) ?></h3>
                        <div class="boxed_mini_details clearfix">
                            <span class="area first">
                                <strong>Course Duration</strong><i class="fa fa-plane icon1"> </i>
                                <?= $course->duration ?>
                            </span>
                            <span class="status">
                                <strong>Course Fee</strong><i class="fa fa-retweet icon1"> </i>
                                <?= $course->fee ?>
                            </span>
                            <span class="bedrooms last"><strong>Study Mode</strong><i class="fa fa-bed"></i>
                                2</span>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>