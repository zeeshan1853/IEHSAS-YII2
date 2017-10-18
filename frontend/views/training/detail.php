<!-- banner -->
<div id="home" class="w3ls-banner"> 
    <!-- banner-text -->
    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides callbacks callbacks1" id="slider4">
                <li>
                    <div class="w3layouts-banner-top">
                        <div class="agileits-banner-info">
                            <h3> <span><?= isset($training->name) ? $training->name : 'Training Name' ?></span></h3>
                        </div>	

                    </div>
                </li>
                <li>
                    <div class="w3layouts-banner-top w3layouts-banner-top1">
                        <div class="agileits-banner-info">
                            <h3> <span>Training Name</span></h3>
                        </div>	

                    </div>
                </li>
                <li>
                    <div class="w3layouts-banner-top w3layouts-banner-top2">
                        <div class="agileits-banner-info">
                            <h3> <span>Training Name</span></h3>
                        </div>	
                    </div>
                </li>
                <li>
                    <div class="w3layouts-banner-top w3layouts-banner-top3">
                        <div class="agileits-banner-info">
                            <h3> <span>Training Name</span></h3>
                        </div>	

                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>

        <!--//banner text-->
    </div>
    <!--banner form-->
    <div id="horizontalTab">
        <ul class="resp-tabs-list">
            <li>Detail</li>
            <li>Schedule</li>
            <li>Registration</li>
        </ul>
        <div class="resp-tabs-container">
            <div class="tab1">
                <div class="register">
                    <h6>Training Detail</h6>
                    <p><?= isset($training->detail) ? $training->detail : '' ?></p>
                </div>
            </div>

            <div class="tab2">
                <div class="reset">
                    <div>
                        <table class="table">
                            <tr>
                                <th> Duration </th> 
                                <td> <?= isset($training->duration) ? $training->duration : '' ?> </td> 
                            </tr>
                            <tr>
                                <th> Fee </th> 
                                <td> <?= isset($training->fee) ? $training->fee : '' ?> </td> 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab3">
                <h6>Fill in our Registration Form</h6>
                <form action="#" method="post">
                    <div class="fields left-agileits">
                        <input type="text" name="Firstname" placeholder="First Name" required="" />
                    </div>
                    <div class="fields right-agileits">
                        <input type="text" name="Laststname" placeholder="Last Name" required="" />
                    </div>
                    <div class="fields">
                        <input type="email" name="Email" placeholder="Email" required="" />
                    </div>
                    <div class="fields">
                        <textarea name="Comments" placeholder="Comments, Complements or Questions" required=""></textarea>
                    </div>
                    <input type="submit" value="Register">
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--//banner form--> 
</div>	
<!-- //banner --> 
