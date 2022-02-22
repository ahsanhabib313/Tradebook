{% extends user/template/app %}


{% block title %}Protfolio{% endblock %}

{% block pushInHead %}
<link type="text/css" href="../public/assets/user/plugins/star-rating-svg/src/css/star-rating-svg.css" />
<style type="text/css">
    .header-spacer {
        height: 70px;
    }

    /* My Rating */
    .my-rating {
        width: 130px;
        margin: 0 auto;
    }

    .my-rating .jq-star {
        float: left;
    }

    .my-rating .jq-star svg {
        width: 100% !important;
        height: 100% !important;
    }
</style>
{% endblock %}

{% block content %}
<!-- Top Header-Profile -->

<div class="main-header">
    <div class="content-bg-wrap bg-account"></div>
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                <div class="main-header-content">
                    <h1>Choose Portfolio You Like</h1>
                    <p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile
                        information, settings, read notifications and requests, view your latest messages, change your pasword and much
                        more! Also you can create or manage your own favourite page, have fun!</p>
                </div>
            </div>
        </div>
    </div>
    <!--    <img class="img-bottom" src="../public/assets/user/img/account-bottom.png" alt="friends">-->
</div>
<div class="profile-section" style="background-color: #022778; color:#fff !important; margin-top: -30px; margin-bottom: 40px">
    <div class="row">
        <div class="col col-xl-12 m-auto col-lg-12 col-md-12">
            <ul class="profile-menu">
                <li>
                    <a href="#" class="active" style="color: #fff !important;">Overview</a>
                </li>
                <li>
                    <a href="statistics" style="color: #fff !important;">Statistics</a>
                </li>
                <li>
                    <a href="portfolio" style="color: #fff !important;">Portfolio</a>
                </li>
                <li>
                    <a href="#" style="color: #fff !important;">Deals & Orders</a>
                </li>
                <li>
                    <a href="#" style="color: #fff !important;">Financial Report</a>
                </li>
                <li>
                    <a href="#" style="color: #fff !important;">Activity Log</a>
                </li>
                <li>
                    <a href="#" style="color: #fff !important;">More</a>
                </li>

            </ul>
        </div>
    </div>

</div>


<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex1200">
                <div class="ui-block-title">

                    <div class="w-select">
                        <fieldset class="form-group">
                            <select class="selectpicker form-control">
                                <option value="NU">GAINED AT LEAST</option>
                                <option value="NU">10%</option>
                                <option value="NU">20%</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="w-select">
                        <fieldset class="form-group">
                            <select name="rating" form="filter-form" class="selectpicker form-control">
                                <option value="NU">RATING</option>
                                <option value="5">5 Star</option>
                                <option value="4.5">4.5 Star</option>
                                <option value="4">4 Star</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="w-select">
                        <fieldset class="form-group">
                            <select class="selectpicker form-control">
                                <option value="NU">DURING THE</option>
                                <option value="NU">Current Month</option>
                            </select>
                        </fieldset>
                    </div>


                    <form id="filter-form" method="get" action="portfolio">
                        <button name="filter" value="subnitf" type="submit" class="btn btn-primary btn-md-2">Filter</button>
                    </form>


                    <form method="get" action="portfolio" class="w-search">
                        <div class="form-group with-button">
                            <input name="srccopier" class="form-control" type="text" placeholder="Search Copiers......">
                            <button>
                                <svg class="olymp-magnifying-glass-icon">
                                    <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">


            <div class="row">
                <?php
                // Test Text
                $hb = 1;
                ?>
                {% foreach($myallcopies as $value): %}
                <?php
                $hb++;
                ?>
                <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="ui-block">

                        <!-- Friend Item -->
                        <div class="friend-item">
                            <div class="friend-header-thumb">
                                <img src="../public/assets/user/img/friend9.jpg" alt="friend">
                            </div>

                            <div class="friend-item-content">

                                <div class="more">
                                    <svg class="olymp-three-dots-icon">
                                        <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a class="user-report" data-toggle="modal" data-target="#user-report-popup" data-userid="<?= $value->friend_id ?>" href="#">Report Profile</a>
                                        </li>
                                        <li>
                                            <a onclick="blockUser(event, <?= $value->friend_id ?>)" href="#">Block Profile</a>
                                        </li>
                                        <li>
                                            <a href="#">Turn Off Notifications</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="friend-avatar">
                                    <div class="author-thumb">
                                        <img src="../public/assets/user/img/avatar16.jpg" alt="author">
                                    </div>
                                    <div class="author-content">
                                        <a href="#" class="h5 author-name"><?= userinfois($value->friend_id); ?></a>
                                        <div class="country">Joined <?= timeis(userinfois($value->friend_id, 'created_at'), 'moment'); ?> </div>
                                    </div>
                                </div>

                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="friend-count" data-swiper-parallax="-500">
                                                <a href="#" class="friend-count-item">
                                                    <div class="h6 text-primary"><?= totalCopier($value->friend_id); ?></div>
                                                    <div class="title">Copiers</div>
                                                </a>
                                                <a href="#" class="friend-count-item">
                                                    <div class="h6 text-success">24%</div>
                                                    <div class="title">Average Profit</div>
                                                </a>
                                                <a href="#" class="friend-count-item">
                                                    <div class="h6 text-danger"><?= totalFollower($value->friend_id); ?></div>
                                                    <div class="title">Followers</div>
                                                </a>
                                            </div>
                                            <div class="control-block-button" data-swiper-parallax="-100">
                                                <span onclick="addFriendUnfriendFollowUnfollow(this)" data-actiontype="<?= ((userinfois($value->friend_id, 'is_friend')) ? 'remove' : 'add'); ?>" data-friendid="<?= $value->friend_id; ?>" class="btn btn-control bg-success cursor-pointer-finger" data-toggle="tooltip" data-original-title="<?= ((userinfois($value->friend_id, 'is_friend')) ? 'Uncopy' : 'Copy'); ?>">
                                                    <i class="fa fa-copy"></i>
                                                </span>

                                                <span onclick="addFriendUnfriendFollowUnfollow(this)" data-actiontype="<?= ((userinfois($value->friend_id, 'is_follow')) ? 'unfollow' : 'follow'); ?>" data-friendid="<?= $value->friend_id; ?>" class="btn btn-control bg-primary" data-toggle="tooltip" data-original-title="<?= ((userinfois($value->friend_id, 'is_follow')) ? 'Unfollow' : 'Follow'); ?>">
                                                    <i class="fa fa-heart"></i>
                                                </span>

                                            </div>
                                        </div>

                                        <div class="swiper-slide">
                                            <div class="friend-count" data-swiper-parallax="-500">
                                                <a href="#" class="friend-count-item">
                                                    <div class="h6 text-success">+ 988.88</div>
                                                    <div class="title">Best Position</div>
                                                </a>

                                                <a href="#" class="friend-count-item">
                                                    <div class="h6 text-danger">-10.00</div>
                                                    <div class="title">Worst Position</div>
                                                </a>
                                            </div>

                                            <div class="friend-since" data-swiper-parallax="-100">
                                                <span>Ratings: <?= totalRating($value->friend_id); ?></span>
                                                <div class="my-rating" data-userid="<?= $value->friend_id; ?>" data-rating="<?= totalRating($value->friend_id); ?>"></div>
                                                <div style="display: none; clear: left"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- If we need pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                        <!-- ... end Friend Item -->

                    </div>
                </div>

                {% endforeach; %}

            </div>




            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!--
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">12</a></li>
                    -->
                    <!-- Tanmoy Paginatins -->
                    <li class="page-item<?php if ($pageno <= 1) {
                                            echo ' disabled';
                                        } ?>">
                        <a class="page-link" href="<?php if ($pageno <= 1) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno - 1);
                                                    } ?>" tabindex="-1">Previous</a>
                    </li>


                    <li class="page-item<?php if ($pageno >= $total_pages) {
                                            echo ' disabled';
                                        } ?>">
                        <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno + 1);
                                                    } ?>">Next</a>
                    </li>


                </ul>
            </nav>
        </div>

        <div class="col col-xl-3 order-xl-1 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">

            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Assending</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg></a>
                </div>

                <!-- W-Friend-Pages-Added -->

                <ul class="widget w-friend-pages-added notification-list friend-requests">

                    <li class="inline-items" style="border-left: 4px solid #263858;">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">By Follower</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="#">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">By Copier</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="#">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">By Profit Ratio</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="#">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Days in System</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="#">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Rating</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="#">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>


                </ul>

                <!-- .. end W-Friend-Pages-Added -->
            </div>

            <!-- W-Socials -->
            <?php
            if (isset($additionAlInfo->facebook) || isset($additionAlInfo->twitter) || isset($additionAlInfo->twitter)) {
            ?>
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Social Share</h6>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg></a>
                    </div>
                    <div class="ui-block-content">
                        <div class="widget w-socials">
                            <h6 class="title">Share On Social Networks:</h6>
                            <?php
                            if (isset($additionAlInfo->facebook)) {
                                if ($additionAlInfo->facebook != '') {
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
                            if (isset($additionAlInfo->twitter)) {
                                if ($additionAlInfo->twitter != '') {
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
                            if (isset($additionAlInfo->linkedin)) {
                                if ($additionAlInfo->linkedin != '') {
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
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- ... end W-Socials -->

        </div>
    </div>
</div>


<!-- Model for user report -->

<div class="modal fade" id="user-report-popup" tabindex="-1" role="dialog" aria-labelledby="user-report-popup" aria-hidden="true">
    <div class="modal-dialog window-popup fav-page-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="<?= publicUrl('assets/user/svg-icons/sprites/icons.svg') ?>#olymp-close-icon"></use>
                </svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Report User</h6>
            </div>

            <div class="modal-body">
                <form>
                    <div class="row">

                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="reportUser" checked value="pretending to be someone">
                                    Pretending to be someone
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="reportUser" value="fake account">
                                    Fake account
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="reportUser" value="fake name">
                                    Fake name
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="reportUser" value="posting inappropriate things">
                                    Posting inappropriate things
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="reportUser" value="harassment or bullying">
                                    Harassment or bullying
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="reportUser" value="something else">
                                    Something else
                                </label>
                            </div>


                            <button class="btn btn-primary btn-lg full-width">Submit</button>
                        </div>


                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- ... end Model for user report -->

{% endblock %}


{% block pushInEnd %}
<!-- Trader Following & Coping Script -->
<script src="../public/assets/user/plugins/add-follow-js/add-following.js"></script>

<!-- SVG Rating  -->
<script src="../public/assets/user/plugins/star-rating-svg/src/jquery.star-rating-svg.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function() {
        // basic use comes with defaults values
        $(".my-rating").starRating({
            starSize: 25,
            onHover: function(currentIndex, currentRating, $el) {
                let thisIsObjt = $el;
                if (currentIndex != 0) {
                    $(thisIsObjt).next().show();
                    $(thisIsObjt).next().text(currentIndex);
                } else {
                    $(thisIsObjt).next().hide();
                }
            },
            onLeave: function(currentIndex, currentRating, $el) {
                $($el).next().hide();
            },
            callback: function(currentRating, $el) {
                let thisIsObjt = $el;
                giveStarRatting(currentRating, $(thisIsObjt).data('userid'));
            }
        });
    });



    // Function For Star Ratting
    function giveStarRatting(givenrat, useridpass) {
        let givenRatting = givenrat;
        let userIdget = useridpass;
        $.ajax({
            url: 'star-ratting',
            type: 'POST',
            dataType: 'json',
            data: {
                givenratting: givenRatting,
                user_id: userIdget
            },
            success: function(data) {
                console.log(data)
            },
            error: function(e) {
                console.log(e)
            }
        });

    }

    // report a user
    $(document).on('click', '.user-report', function() {
        const userId = $(this).data('userid');
        $('#user-report-popup').off('submit', '**').on('submit', 'form', function(event) {
            event.preventDefault();
            const reportNote = $('input[name="reportUser"]:checked').val();
            $.ajax({
                url: 'reportUser',
                type: 'post',
                dataType: 'json',
                data: {
                    userId,
                    reportNote
                },
                success: function(data) {
                    $('#user-report-popup').modal('hide');
                    if (data.status === 'success') {
                        Swal.fire(
                            'Reported!',
                            'Your report has been submitted successfully.',
                            'success'
                        );
                    } else if (data.status === 'already reported') {
                        Swal.fire(
                            'Already Reported!',
                            'You have alredy submitted report for this user.',
                            'error'
                        );
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })
    })

    // block a user
    function blockUser(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to block this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, block user'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'blockUser',
                    dataType: 'json',
                    data: {
                        id
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            Swal.fire(
                                'Blocked!',
                                'You have successfully blocked the user.',
                                'success'
                            );
                        } else if (data.status === 'already blocked') {
                            Swal.fire(
                                'Already Blocked!',
                                'You have alredy blocked the user.',
                                'error'
                            );
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            }
        })
    }
</script>
{% endblock %}