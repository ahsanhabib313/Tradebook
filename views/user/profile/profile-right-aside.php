<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">


            <div class="ui-block" data-mh="pie-chart">
                <div class="ui-block-title">
                    <div class="h6 title">Colors Pie Chart</div>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg></a>
                </div>
                <div class="ui-block-content">
                    <div class="chart-with-statistic">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
                                    <span>
                                        <span class="statistics-point bg-purple"></span>
                                        Copies
                                    </span>
                                </div>
                                <div class="count-stat">8247</div>
                            </li>
                            <li>
                                <div class="points">
                                    <span>
                                        <span class="statistics-point bg-breez"></span>
                                        Followers
                                    </span>
                                </div>
                                <div class="count-stat"><?= totalFollower($userDetails->id); ?></div>
                            </li>
                            <li>
                                <div class="points">
                                    <span>
                                        <span class="statistics-point bg-primary"></span>
                                        Volume Trades
                                    </span>
                                </div>
                                <div class="count-stat">1498</div>
                            </li>

                        </ul>


                        <div class="chart-js chart-js-pie-color">
                            <canvas id="pie-color-chart" width="180" height="180"></canvas>
                            <div class="general-statistics">165%
                                <span>Aerage Daily Profit</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <?php
            if ($userDetails->id != selfInfo('id')) {
            ?>
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Similar Traders</h6>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg></a>
                    </div>
                    <div class="ui-block-content">
                        <!-- W-Faved-Page -->

                        <ul class="widget w-faved-page">
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page1.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page2.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page3.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page4.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page5.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page6.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page7.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page8.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page9.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page7.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page10.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page11.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page7.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/faved-page12.jpg" alt="user">
                                </a>
                            </li>
                            <li class="all-users">
                                <a href="#">+5k</a>
                            </li>
                        </ul>

                        <!-- ... end W-Faved-Page -->
                    </div>
                </div>
            <?php } ?>

            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Twitter Feed</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg></a>
                </div>


                <!-- W-Twitter -->

                <ul class="widget w-twitter">
                    <li class="twitter-item">
                        <div class="author-folder">
                            <img src="../public/assets/user/img/twitter-avatar.png" alt="avatar">
                            <div class="author">
                                <a href="#" class="author-name">Green Goo Rock</a>
                                <a href="#" class="group">@greengoo_rock</a>
                                <span class="verified"><i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <p>This Friday at 8pm we’ll be playing a song of our new album, come and join us! <a href="#" class="link-post">#NewsoftheGoo</a></p>
                        <span class="post__date">
                            <time class="published" datetime="2017-03-24T18:18">
                                4 hours ago
                            </time>
                        </span>
                    </li>
                    <li class="twitter-item">
                        <div class="author-folder">
                            <img src="../public/assets/user/img/twitter-avatar.png" alt="avatar">
                            <div class="author">
                                <a href="#" class="author-name">Green Goo Rock</a>
                                <a href="#" class="group">@greengoo_rock</a>
                                <span class="verified"><i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <p>Tickets for the Marina Party are now available on <a href="#" class="link-post">www.ggrock.com</a></p>
                        <span class="post__date">
                            <time class="published" datetime="2017-03-24T18:18">
                                Yesterday
                            </time>
                        </span>
                    </li>
                    <li class="twitter-item">
                        <div class="author-folder">
                            <img src="../public/assets/user/img/twitter-avatar.png" alt="avatar">
                            <div class="author">
                                <a href="#" class="author-name">Green Goo Rock</a>
                                <a href="#" class="group">@greengoo_rock</a>
                                <span class="verified"><i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <p>We had a great time playing in Italy. Thanks a lot to the incredible fans! <a href="#" class="link-post">#GGinRome #PisaArena </a></p>
                        <span class="post__date">
                            <time class="published" datetime="2017-03-24T18:18">
                                5 days ago
                            </time>
                        </span>
                    </li>
                </ul>

                <!-- ... end W-Twitter -->
            </div>


            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Green Goo's Poll</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg></a>
                </div>
                <div class="ui-block-content">
                    <!-- W-Pool -->

                    <ul class="widget w-pool">
                        <li>
                            <p>If you had to choose, which actor do you prefer to be the next Darkman? </p>
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

                                <div class="counter-friends">12 friends voted for this</div>

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
                                <div class="counter-friends">7 friends voted for this</div>

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

                        <li>
                            <div class="skills-item">
                                <div class="skills-item-info">
                                    <span class="skills-item-title">
                                        <span class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios">
                                                Michael Streiton
                                            </label>
                                        </span>
                                    </span>
                                    <span class="skills-item-count">
                                        <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="11" data-from="0"></span>
                                        <span class="units">11%</span>
                                    </span>
                                </div>
                                <div class="skills-item-meter">
                                    <span class="skills-item-meter-active bg-primary" style="width: 11%"></span>
                                </div>

                                <div class="counter-friends">2 people voted for this</div>

                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="../public/assets/user/img/friend-harmonic14.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="../public/assets/user/img/friend-harmonic15.jpg" alt="friend">
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



        </div>