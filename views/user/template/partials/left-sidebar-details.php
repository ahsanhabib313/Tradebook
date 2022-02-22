
<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title"><?= (($userDetails->id == selfInfo('id')) ? 'Your' : userinfois($userDetails->id, 'first_name' ).'\'s'); ?> Profile Intro</h6>
        <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
    </div>
    <div class="ui-block-content">

        <!-- W-Personal-Info -->

        <ul class="widget w-personal-info item-block">
            <?php
            if(isset($additionAlInfo->about)){
                if($additionAlInfo->about != ''){

            ?>
                <li>
                    <span class="text"><?= $additionAlInfo->about; ?></span>
                </li>
            <?php
                    }
                }
            ?>
            <li>
                <span class="title">Joined:</span>
                <span class="text"><?= date_format( userinfois($userDetails->id, 'created_at'),"d F Y") ; ?></span>
            </li>

            <?php
                if(userinfois($userDetails->id, 'city') != '' || userinfois($userDetails->id, 'country')){
                    $leftSideCountry = userinfois($userDetails->id, 'country');
                    $leftSideCity = userinfois($userDetails->id, 'city');
            ?>
            <li>
                <span class="title">Address:</span>
                <span class="text"><?= (($leftSideCity != '') ? $leftSideCity.', ' : ' ').(($leftSideCountry != '') ? $leftSideCountry : ''); ?></span>
            </li>
            <?php
                }
            ?>

            <li>
                <span class="title">Contact:</span>
                <a href="#" class="text"><?= userinfois($userDetails->id, 'email'); ?></a>
            </li>

            <?php
            if(isset($additionAlInfo->website)){
                if($additionAlInfo->website != ''){
            ?>
            <li>
                <span class="title">WebSite:</span>
                <a target="_blank" href="http://<?= $additionAlInfo->website; ?>" class="text"><?= $additionAlInfo->website; ?></a>
            </li>
            <?php
                    }
                }
            ?>

            <li>
                <span class="title">Followers:</span>
                <span class="text"><?= totalFollower($userDetails->id); ?></span>
            </li>
            <li>
                <span class="title">Following:</span>
                <span class="text"><?= totalFollowing($userDetails->id); ?> </span>
            </li>
        </ul>

        <!-- ... end W-Personal-Info -->
        <!-- W-Socials -->
        <?php
        if(isset($additionAlInfo->facebook) || isset($additionAlInfo->twitter) || isset($additionAlInfo->twitter)){
            ?>
            <div class="widget w-socials">
                <h6 class="title">Other Social Networks:</h6>
                <?php
                if(isset($additionAlInfo->facebook)){
                    if($additionAlInfo->facebook != ''){
                        ?>
                        <a target="_blank" href="https://www.facebook.com/<?= $additionAlInfo->facebook; ?>" class="social-item bg-facebook">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            Facebook
                        </a>
                        <?php
                    }
                }
                ?>

                <?php
                if(isset($additionAlInfo->twitter)){
                    if($additionAlInfo->twitter != ''){
                        ?>
                        <a target="_blank" href="https://twitter.com/<?= $additionAlInfo->twitter; ?>" class="social-item bg-twitter">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            Twitter
                        </a>
                        <?php
                    }
                }
                ?>


                <?php
                if(isset($additionAlInfo->linkedin)){
                    if($additionAlInfo->linkedin != ''){
                        ?>
                        <a target="_blank" href="https://www.linkedin.com/in/<?= $additionAlInfo->linkedin; ?>" class="social-item bg-primary">
                            <i class="fab fa-linkedin"></i>
                            Linkedin
                        </a>
                        <?php
                    }
                }
                ?>


            </div>
            <?php
        }
        ?>
        <!-- ... end W-Socials -->
    </div>
</div>





<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">Rating's </h6>
        <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
    </div>
    <div class="ui-block-content">
        <!-- W-Pool -->

        <ul class="widget w-pool">
            <li>
                <p>Give your rating to Green Goo Rock </p>
            </li>
            <li>
                <div class="skills-item">
                    <div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
												Thomas Bale
											</label>
										</span>
									</span>
                        <span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span>
										<span class="units">62%</span>
									</span>
                    </div>
                    <div class="skills-item-meter">
                        <span class="skills-item-meter-active bg-primary" style="width: 62%"></span>
                    </div>

                    <div class="counter-friends">12 friends Rated Good for this</div>

                    <ul class="friends-harmonic">
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic1.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic2.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic3.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic4.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic5.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic6.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic7.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic8.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic9.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#" class="all-users">+3</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <div class="skills-item">
                    <div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
												Ben Robertson
											</label>
										</span>
									</span>
                        <span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="27" data-from="0"></span>
										<span class="units">27%</span>
									</span>
                    </div>
                    <div class="skills-item-meter">
                        <span class="skills-item-meter-active bg-primary" style="width: 27%"></span>
                    </div>
                    <div class="counter-friends">7 friends Rated Bad for this</div>

                    <ul class="friends-harmonic">
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic7.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic8.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic9.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic10.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic11.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic12.jpg" alt="friend">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../public/assets/user/img/friend-harmonic13.jpg" alt="friend">
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <!-- .. end W-Pool -->
        <a href="#" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Vote Now!</a>
    </div>
</div>


