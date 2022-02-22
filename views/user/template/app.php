<!DOCTYPE html>
<html lang="en">

<head>

	<title>{% yield title %}</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">


	<!-- Main Font -->
	<script src="<?php echo(getBaseUrl()) ?>/public/assets/user/js/libs/webfontloader.min.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl()) ?>/public/assets/user/Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/Bootstrap/dist/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/bootstrap4-glyphicons/css/bootstrap-glyphicons.min.css">


	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/css/fonts.min.css">
	<!-- Croppie Js css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/plugins/croppieJs/croppie.css">
	<!--PNotify-->
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/plugins/pnotify/pnotify.custom.css">

	<!-- Toast -->
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/plugins/toast/jquery.toast.css">

	<!-- Liveicon Evelotoin -->
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/plugins/livicons-evolution/css/LivIconsEvo.css">
	<!-- flaticon  -->
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/plugins/flaticon/uicons-regular-rounded.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/css/custom.css">
	
	{% yield pushInHead %}

	<style>
		.back-icon .lievo-svg-wrapper {top: -7px;}
		.camment-icom .lievo-svg-wrapper {left: 17px;}
		/* .author-thumb img {width: 40px !important;} */

        li.notification-item{background-color: #E0E0E0;}
		.author-thumb img {width: 40px !important;}
	</style>

</head>

<body class="page-has-left-panels page-has-right-panels">



	<!-- Preloader -->

	<div id="hellopreloader">
		<div class="preloader">
			<svg width="45" height="45" stroke="#fff">
				<g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
					<circle cx="22" cy="22" r="6" stroke="none">
						<animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22" />
						<animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0" />
						<animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0" />
					</circle>
					<circle cx="22" cy="22" r="6" stroke="none">
						<animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22" />
						<animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0" />
						<animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0" />
					</circle>
					<circle cx="22" cy="22" r="8">
						<animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite" values="6;1;2;3;4;5;6" />
					</circle>
				</g>
			</svg>

			<div class="text">Loading ...</div>
		</div>
	</div>

	<!-- ... end Preloader -->


	<!-- Fixed Sidebar Left -->

	<div class="fixed-sidebar">
		<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

			<a href="news_feed" class="logo">
				<div class="img-wrap">
					<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/logo.png" alt="Olympus">
				</div>
			</a>

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<ul class="left-menu">
					<li>
						<a href="#" class="js-sidebar-open">
							<div class="livicon-evo" data-options="
                                        name: list.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="http://tradebook.test/user/reports/withdraw-report" title="withdraw-report">
							<div class="livicon-evo" data-options="
                                        name: bar-chart.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
				
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: bank.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: calculator.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: check-alt.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: users.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="pages" title="pages">
							<div class="livicon-evo" data-options="
                                        name: file-import.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: us-dollar.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: timer.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: morph-bar-chart.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: servers.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="livicon-evo" data-options="
                                        name: gear.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #788EA6;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
							</div>
						</a>
					</li>

				</ul>
			</div>
		</div>

		<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
			<a href="02-ProfilePage.html" class="logo">
				<div class="img-wrap">
					<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/logo.png" alt="Olympus">
				</div>
				<div class="title-block">
					<h6 class="logo-title">olympus</h6>
				</div>
			</a>

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<ul class="left-menu">
					<li>
						<a href="#" class="js-sidebar-open">
							<div class="livicon-evo" data-options="name: remove.svg;size: 30px; style:lines; strokeColor: #888da8; "></div>
							<span class="left-menu-title">Collapse Menu</span>
						</a>
					</li>
					<li>
						<a href="news_feed">
							<div class="livicon-evo" data-options="name: notebook.svg;size: 30px; style:lines; strokeColor: #888da8; "></div>
							<span class="left-menu-title">Newsfeed</span>
						</a>
					</li>
				</ul>

				<div class="profile-completion">
					<div class="skills-item">
						<div class="skills-item-info">
							<span class="skills-item-title">Profile Completion</span>
							<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76" data-from="0"></span><span class="units">76%</span></span>
						</div>
						<div class="skills-item-meter">
							<span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
						</div>
					</div>

					<span>Complete <a href="#">your profile</a> so people can know more about you!</span>

				</div>
			</div>

		</div>
	</div>

	<!-- ... end Fixed Sidebar Left -->


	<!-- Fixed Sidebar Left -->

	<div class="fixed-sidebar fixed-sidebar-responsive">

		<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
			<a href="#" class="logo js-sidebar-open">
				<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/logo.png" alt="Olympus">
			</a>

		</div>

		<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
			<a href="#" class="logo">
				<div class="img-wrap">
					<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/logo.png" alt="Olympus">
				</div>
				<div class="title-block">
					<h6 class="logo-title">olympus</h6>
				</div>
			</a>

			<div class="mCustomScrollbar" data-mcs-theme="dark">

				<div class="control-block">
					<div class="author-page author vcard inline-items">
						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/author-page.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>
						<a href="profile" class="author-name fn">
							<div class="author-title">
								<?= userinfois(selfInfo('id')); ?> <svg class="olymp-dropdown-arrow-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
								</svg>
							</div>
							<span class="author-subtitle">SPACE COWBOYX</span>
						</a>
					</div>
				</div>

				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">MAIN SECTIONS</h6>
				</div>

				<ul class="left-menu">
					<li>
						<a href="#" class="js-sidebar-open">
							<svg class="olymp-close-icon left-menu-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
							</svg>
							<span class="left-menu-title">Collapse Menu</span>
						</a>
					</li>
					<li>
						<a href="mobile-index.html">
							<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="NEWSFEED">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
							</svg>
							<span class="left-menu-title">Newsfeed</span>
						</a>
					</li>
					<li>
						<a href="Mobile-28-YourAccount-PersonalInformation.html">
							<svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
							</svg>
							<span class="left-menu-title">Fav Pages Feed</span>
						</a>
					</li>
					<li>
						<a href="Mobile-28-YourAccount-PersonalInformation.html">
							<svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
							</svg> pages
							<span class="left-menu-title">Fav Pages Feed</span>
						</a>
					</li>
					<li>
						<a href="mobile-29-YourAccount-AccountSettings.html">
							<svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FRIEND GROUPS">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use>
							</svg>
							<span class="left-menu-title">Friend Groups</span>
						</a>
					</li>
					<li>
						<a href="Mobile-30-YourAccount-ChangePassword.html">
							<svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="MUSIC&PLAYLISTS">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use>
							</svg>
							<span class="left-menu-title">Music & Playlists</span>
						</a>
					</li>
					<li>
						<a href="Mobile-31-YourAccount-HobbiesAndInterests.html">
							<svg class="olymp-weather-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="WEATHER APP">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-weather-icon"></use>
							</svg>
							<span class="left-menu-title">Weather App</span>
						</a>
					</li>
					<li>
						<a href="Mobile-32-YourAccount-EducationAndEmployement.html">
							<svg class="olymp-calendar-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="CALENDAR AND EVENTS">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
							</svg>
							<span class="left-menu-title">Calendar and Events</span>
						</a>
					</li>
					<li>
						<a href="Mobile-33-YourAccount-Notifications.html">
							<svg class="olymp-badge-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Community Badges">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-badge-icon"></use>
							</svg>
							<span class="left-menu-title">Community Badges</span>
						</a>
					</li>
					<li>
						<a href="Mobile-34-YourAccount-ChatMessages.html">
							<svg class="olymp-cupcake-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Friends Birthdays">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use>
							</svg>
							<span class="left-menu-title">Friends Birthdays</span>
						</a>
					</li>
					<li>
						<a href="Mobile-35-YourAccount-FriendsRequests.html">
							<svg class="olymp-stats-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Account Stats">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
							</svg>
							<span class="left-menu-title">Account Stats</span>
						</a>
					</li>
					<li>
						<a href="#">
							<svg class="olymp-manage-widgets-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Manage Widgets">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon"></use>
							</svg>
							<span class="left-menu-title">Manage Widgets</span>
						</a>
					</li>
				</ul>

				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">YOUR ACCOUNT</h6>
				</div>

				<ul class="account-settings">
					<li>
						<a href="#">

							<svg class="olymp-menu-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
							</svg>

							<span>Profile Settings</span>
						</a>
					</li>
					<li>
						<a href="#">
							<svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
							</svg>

							<span>Create Fav Page</span>
						</a>
					</li>
					<li>
						<a href="#">
							<svg class="olymp-logout-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
							</svg>

							<span>Log Out</span>
						</a>
					</li>
				</ul>



			</div>
		</div>
	</div>

	<!-- <?php echo(getBaseUrl())?>. end Fixed Sidebar Left -->


	<!-- Fixed Sidebar Right -->

	<div class="fixed-sidebar right">
		<div class="fixed-sidebar-right sidebar--small" id="sidebar-right">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<ul class="chat-users">
					<!--
				<li class="inline-items js-chat-open">
					<div class="author-thumb">
						<img alt="author" src="/public/assets/user/img/avatar67-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>
                -->

				</ul>
			</div>

			<div class="search-friend inline-items">
				<a href="#" class="js-sidebar-open">
					<div class="livicon-evo" data-options="name: list.svg;size: 30px; style:lines; strokeColor: #888da8;"></div>
				</a>
			</div>

			<a href="#" class="olympus-chat inline-items js-chat-open">
				<div class="camment-icom livicon-evo" data-options="name: comments.svg;size: 35px; style:lines;  strokeColor: #fff;"></div>
			</a>

		</div>

		<div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

			<div class="mCustomScrollbar" data-mcs-theme="dark">

				<div class="ui-block-title ui-block-title-small">
					<a href="#" class="title">Close Friends</a>
					<a href="#">Settings</a>
				</div>

				<ul class="chat-users">
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar67-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Carol Summers</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>

					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar62-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Mathilda Brinker</a>
							<span class="status">AT WORK!</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>

					</li>

					<li class="inline-items js-chat-open">


						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar68-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Carol Summers</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>


					</li>

					<li class="inline-items js-chat-open">


						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar69-sm.jpg" class="avatar">
							<span class="icon-status away"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Michael Maximoff</a>
							<span class="status">AWAY</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>


					</li>

					<li class="inline-items js-chat-open">


						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar70-sm.jpg" class="avatar">
							<span class="icon-status disconected"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Rachel Howlett</a>
							<span class="status">OFFLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>


					</li>
				</ul>


				<div class="ui-block-title ui-block-title-small">
					<a href="#" class="title">MY FAMILY</a>
					<a href="#">Settings</a>
				</div>

				<ul class="chat-users">
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar64-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Sarah Hetfield</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>
					</li>
				</ul>


				<div class="ui-block-title ui-block-title-small">
					<a href="#" class="title">UNCATEGORIZED</a>
					<a href="#">Settings</a>
				</div>

				<ul class="chat-users">
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar71-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Bruce Peterson</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>


					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar72-sm.jpg" class="avatar">
							<span class="icon-status away"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Chris Greyson</a>
							<span class="status">AWAY</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>

					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar63-sm.jpg" class="avatar">
							<span class="icon-status status-invisible"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Nicholas Grisom</a>
							<span class="status">INVISIBLE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>
					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar72-sm.jpg" class="avatar">
							<span class="icon-status away"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Chris Greyson</a>
							<span class="status">AWAY</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>
					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar71-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Bruce Peterson</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>
					</li>
				</ul>

			</div>

			<div class="search-friend inline-items">
				<form class="form-group">
					<input class="form-control" placeholder="Search Friends." value="" type="text">
				</form>

				<a href="#" class="settings">
					<div class="livicon-evo" data-options="name: settings.svg;size: 30px; style: lines; eventOn: parent;"></div>
				</a>

				<span class="js-sidebar-open">
					<div class="livicon-evo" data-options="name: remove.svg;size: 30px; style:lines"></div>
				</span>
			</div>

			<a href="#" class="olympus-chat inline-items js-chat-open">

				<h6 class="olympus-chat-title">OLYMPUS CHAT</h6>
				<div class="livicon-evo" data-options="name: comments.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
			</a>

		</div>
	</div>

	<!-- . end Fixed Sidebar Right -->


	<!-- Fixed Sidebar Right-Responsive -->

	<div class="fixed-sidebar right fixed-sidebar-responsive" id="sidebar-right-responsive">

		<div class="fixed-sidebar-right sidebar--small">
			<a href="#" class="js-sidebar-open">
				<svg class="olymp-menu-icon">
					<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
				</svg>
				<svg class="olymp-close-icon">
					<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
				</svg>
			</a>
		</div>

		<div class="fixed-sidebar-right sidebar--large">
			<div class="mCustomScrollbar" data-mcs-theme="dark">

				<div class="ui-block-title ui-block-title-small">
					<a href="#" class="title">Close Friends</a>
					<a href="#">Settings</a>
				</div>

				<ul class="chat-users">
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar67-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Carol Summers</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>

					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar62-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Mathilda Brinker</a>
							<span class="status">AT WORK!</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>

					</li>

					<li class="inline-items js-chat-open">


						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar68-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Carol Summers</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>


					</li>

					<li class="inline-items js-chat-open">


						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar69-sm.jpg" class="avatar">
							<span class="icon-status away"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Michael Maximoff</a>
							<span class="status">AWAY</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>


					</li>

					<li class="inline-items js-chat-open">


						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar70-sm.jpg" class="avatar">
							<span class="icon-status disconected"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Rachel Howlett</a>
							<span class="status">OFFLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>


					</li>
				</ul>


				<div class="ui-block-title ui-block-title-small">
					<a href="#" class="title">MY FAMILY</a>
					<a href="#">Settings</a>
				</div>

				<ul class="chat-users">
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar64-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Sarah Hetfield</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>
					</li>
				</ul>


				<div class="ui-block-title ui-block-title-small">
					<a href="#" class="title">UNCATEGORIZED</a>
					<a href="#">Settings</a>
				</div>

				<ul class="chat-users">
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar71-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Bruce Peterson</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>


					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar72-sm.jpg" class="avatar">
							<span class="icon-status away"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Chris Greyson</a>
							<span class="status">AWAY</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>

					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar63-sm.jpg" class="avatar">
							<span class="icon-status status-invisible"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Nicholas Grisom</a>
							<span class="status">INVISIBLE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>
					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar72-sm.jpg" class="avatar">
							<span class="icon-status away"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Chris Greyson</a>
							<span class="status">AWAY</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>
					</li>
					<li class="inline-items js-chat-open">

						<div class="author-thumb">
							<img alt="author" src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar71-sm.jpg" class="avatar">
							<span class="icon-status online"></span>
						</div>

						<div class="author-status">
							<a href="#" class="h6 author-name">Bruce Peterson</a>
							<span class="status">ONLINE</span>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg>

							<ul class="more-icons">
								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
									</svg>
								</li>

								<li>
									<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon">
										<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use>
									</svg>
								</li>
							</ul>

						</div>
					</li>
				</ul>

			</div>

			<div class="search-friend inline-items">
				<form class="form-group">
					<input class="form-control" placeholder="Search Friends.." value="" type="text">
				</form>

				<a href="29-YourAccount-AccountSettings.html" class="settings">
					<svg class="olymp-settings-icon">
						<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-settings-icon"></use>
					</svg>
				</a>

				<a href="#" class="js-sidebar-open">
					<svg class="olymp-close-icon">
						<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
					</svg>
				</a>
			</div>

			<a href="#" class="olympus-chat inline-items js-chat-open">

				<h6 class="olympus-chat-title">OLYMPUS CHAT</h6>
				<svg class="olymp-chat---messages-icon">
					<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
				</svg>
			</a>
		</div>

	</div>

	<!-- . end Fixed Sidebar Right-Responsive -->


	<!-- Header-BP -->

	<header class="header" id="site-header">

		<div class="page-title">
			<h6>Profile Page</h6>
		</div>

		<div class="header-content-wrapper">
			<form class="search-bar w-search notification-list friend-requests">
				<div class="form-group with-button">
					<input class="form-control js-user-search" placeholder="Search here people or pages." type="text">
					<button>
						<svg class="olymp-magnifying-glass-icon">
							<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
						</svg>
					</button>
				</div>
			</form>

			<a href="#" class="link-find-friend">Find Friends</a>

			<div class="control-block">

				<div class="control-icon more has-items">
					<div class="livicon-evo" data-options="
                                        name: comments.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
					</div>
					<div id="messages-level" class="label-avatar bg-purple">2</div>

					<div class="more-dropdown more-with-triangle triangle-top-center">
						<div class="ui-block-title ui-block-title-small">
							<h6 class="title">Chat / Messages</h6>
							<a href="#">Mark all as read</a>
							<a href="edit-profile?tab=message-notifc">Settings</a>
						</div>

						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<ul class="notification-list chat-message">
								<li class="message-unread">
									<div class="author-thumb">
										<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar59-sm.jpg" alt="author">
									</div>
									<div class="notification-event">
										<a href="#" class="h6 notification-friend">Diana Jameson</a>
										<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule<?php echo(getBaseUrl())?>.</span>
										<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
									</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
										</svg>
									</span>
									<div class="more">
										<svg class="olymp-three-dots-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
										</svg>
									</div>
								</li>


								<li>
									<div class="author-thumb">
										<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar61-sm.jpg" alt="author">
									</div>
									<div class="notification-event">
										<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
										<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with<?php echo(getBaseUrl())?>.</span>
										<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
									</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
										</svg>
									</span>
									<div class="more">
										<svg class="olymp-three-dots-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
										</svg>
									</div>
								</li>



							</ul>
						</div>

						<a href="#" class="view-all bg-purple">View All Messages</a>
					</div>
				</div>

				<div class="control-icon more has-items">
					<div class="livicon-evo" data-options="
                                        name: globe.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
					</div>

					<?php
					// Notification Count
					$notifications = \App\Models\Notification::where('n_for', '=', selfInfo('id'));
					$result = $notifications->get();

                    $notifications = \App\Models\Notification::where('n_for', '=', selfInfo('id'));
                    $totalNotificationCount = $notifications->count();
                    $unReadNotificationCount = $notifications->where('n_read', '=', 0)->count();



					?>

					<div id="notifications-level" class="label-avatar bg-danger <?= (($unReadNotificationCount == 0) ? 'dd-none' : NULL); ?>"><?= $unReadNotificationCount; ?></div>

					<div class="more-dropdown more-with-triangle triangle-top-center">
						<div class="ui-block-title ui-block-title-small">
							<h6 class="title">Notifications</h6>
							<a href="#">Mark all as read</a>
							<a href="edit-profile?tab=info-notifc">Settings</a>
						</div>

						<audio id="notificationSound">
							<source src="<?php echo(getBaseUrl())?>/public/assets/user/mp3/notifivation.mp3" type="audio/mpeg">
						</audio>


						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<ul id="notifications-list" class="notification-list">
								<?php
								if ($totalNotificationCount == 0) {
									echo "<li class='text-center'>You Have No Notification Yet</li>";
								}

								foreach ($result as $value) {
									$notificationRightIcon = '';
                                    // Profile Image
                                    $profileImagePath = '<?php echo(getBaseUrl())?>/public/uploads/user/'.userinfois( $value->n_from, 'profile_photo');


                                    if ($value->n_type == 'follow') {
										$notificationRightIcon = 'olymp-happy-face-icon';
									} else if ($value->n_type == 'unfollow') {
										$notificationRightIcon = 'olymp-happy-face-icon';
									} else if ($value->n_type == 'post_share') {
										$notificationRightIcon = 'olymp-share-icon';
									} else if ($value->n_type == 'like') {
										$notificationRightIcon = 'olymp-heart-icon';
									} else if ($value->n_type == 'comment') {
										$notificationRightIcon = 'olymp-comments-post-icon';
									}
								?>

									<li id="notification-list-wrapper" class="<?= (($value->n_read == 0) ? 'notification-item': '');?>" data-notifiid="<?= $value->id;?>">
										<div class="author-thumb">
											<img src="<?= $profileImagePath; ?>" alt="author">
										</div>
										<div class="notification-event">
											<div><a href="profile?id=<?= $value->n_from; ?>" class="h6 notification-friend"><strong><?= userinfois($value->n_from); ?></strong></a> <?= $value->notification; ?></div>
											<span class="notification-date"><time class="entry-date updated"><?= timeis($value->created_at, 'moment'); ?></time></span>
										</div>
										<span class="notification-icon">
											<svg class="<?= $notificationRightIcon; ?>">
												<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#<?= $notificationRightIcon; ?>"></use>
											</svg>
										</span>

										<div class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
											</svg>
											<svg class="olymp-little-delete">
												<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
											</svg>
										</div>
									</li>

								<?php
								}
								?>

							</ul>
						</div>

						<a href="#" class="view-all bg-primary">View All Notifications</a>
					</div>
				</div>

				<div class="author-page author vcard inline-items more">
					<div class="author-thumb">
						<?php
						$profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', (Auth('user')->id))->where("attachmentable_type", "user")->first();
						if (!empty($profilePicture->name)) {
							echo '<img src="<?php echo(getBaseUrl())?>/public/uploads/user/' . $profilePicture->name . '" alt="author">';
						} else {
							echo '<img width="100%" src="<?php echo(getBaseUrl())?>/public/uploads/user/no-profile.jpg" alt="nature">';
						}
						?>

						<span class="icon-status online"></span>
						<div class="more-dropdown more-with-triangle">
							<div class="mCustomScrollbar" data-mcs-theme="dark">
								<div class="ui-block-title ui-block-title-small">
									<h6 class="title">Your Account</h6>
								</div>

								<ul class="account-settings">
									<li>
										<a href="edit-profile">

											<div class="livicon-evo" data-options="name: morph-menu-collapse.svg;size: 30px; style:lines;  strokeColor: #888da8;"></div>

											<span>Profile Settings</span>
										</a>
									</li>
									<li>
										<a href="">
											<div class="livicon-evo" data-options="name: morph-star.svg;size: 30px; style:lines;  strokeColor: #888da8;"></div>
											<span>Lock Screen</span>
										</a>
									</li>
									<li>
										<a href="logout">
											<div class="livicon-evo" data-options="name: rocket.svg;size: 30px; style:lines;  strokeColor: #888da8;"></div>

											<span>Log Out</span>
										</a>
									</li>
								</ul>
							</div>

						</div>
					</div>
					<a href="profile" class="author-name fn">
						<div class="author-title">
							<?php $user = auth('user'); ?>
							<?= userinfois($user->id); ?> <svg class="olymp-dropdown-arrow-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
							</svg>
						</div>
						<span class="author-subtitle">SPACE COWBOY</span>
					</a>
				</div>

			</div>
		</div>

	</header>

	<!--. end Header-BP -->


	<!-- Responsive Header-BP -->

	<header class="header header-responsive" id="site-header-responsive">

		<div class="header-content-wrapper">
			<ul class="nav nav-tabs mobile-app-tabs" role="tablist">
				<!--
                <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#request" role="tab">
						<div class="control-icon has-items">
							<svg class="olymp-happy-face-icon">
								<use xlink:href="/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
							</svg>
							<div class="label-avatar bg-blue">6</div>
						</div>
					</a>
				</li>
                -->
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#chat" role="tab">
						<div class="control-icon has-items">
							<svg class="olymp-chat---messages-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
							</svg>
							<div class="label-avatar bg-purple">2</div>
						</div>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#notification" role="tab">
						<div class="control-icon has-items">
							<svg class="olymp-thunder-icon">
								<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-thunder-icon"></use>
							</svg>
							<div class="label-avatar bg-primary">8</div>
						</div>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#search" role="tab">
						<svg class="olymp-magnifying-glass-icon">
							<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
						</svg>
						<svg class="olymp-close-icon">
							<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
						</svg>
					</a>
				</li>
			</ul>
		</div>

		<!-- Tab panes -->
		<div class="tab-content tab-content-responsive">

			<div class="tab-pane " id="request" role="tabpanel">

				<div class="mCustomScrollbar" data-mcs-theme="dark">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">FRIEND REQUESTS</h6>
						<a href="#">Find Friends</a>
						<a href="#">Settings</a>
					</div>
					<ul class="notification-list friend-requests">
						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar55-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Tamara Romanoff</a>
								<span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
							</div>
							<span class="notification-icon">
								<a href="#" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>

								<a href="#" class="accept-request request-del">
									<span class="icon-minus">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>

							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
							</div>
						</li>
						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar56-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Tony Stevens</a>
								<span class="chat-message-item">4 Friends in Common</span>
							</div>
							<span class="notification-icon">
								<a href="#" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>

								<a href="#" class="accept-request request-del">
									<span class="icon-minus">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>

							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
							</div>
						</li>
						<li class="accepted">
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar57-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">her wall</a>.
							</div>
							<span class="notification-icon">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
								</svg>
							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<svg class="olymp-little-delete">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
								</svg>
							</div>
						</li>
						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar58-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Stagg Clothing</a>
								<span class="chat-message-item">9 Friends in Common</span>
							</div>
							<span class="notification-icon">
								<a href="#" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>

								<a href="#" class="accept-request request-del">
									<span class="icon-minus">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>

							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
							</div>
						</li>
					</ul>
					<a href="#" class="view-all bg-blue">Check all your Events</a>
				</div>

			</div>

			<div class="tab-pane " id="chat" role="tabpanel">

				<div class="mCustomScrollbar" data-mcs-theme="dark">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Chat / Messages</h6>
						<a href="#">Mark all as read</a>
						<a href="#">Settings</a>
					</div>

					<ul class="notification-list chat-message">
						<li class="message-unread">
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar59-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Diana Jameson</a>
								<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule<?php echo(getBaseUrl())?>.</span>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
								</svg>
							</span>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
							</div>
						</li>

						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar60-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Jake Parker</a>
								<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
								</svg>
							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
							</div>
						</li>
						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar61-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
								<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with<?php echo(getBaseUrl())?>.</span>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
								</svg>
							</span>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
							</div>
						</li>

						<li class="chat-group">
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar11-sm.jpg" alt="author">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar12-sm.jpg" alt="author">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar13-sm.jpg" alt="author">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar10-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
								<span class="last-message-author">Ed:</span>
								<span class="chat-message-item">Yeah! Seems fine by me!</span>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
								</svg>
							</span>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
							</div>
						</li>
					</ul>

					<a href="#" class="view-all bg-purple">View All Messages</a>
				</div>

			</div>

			<div class="tab-pane " id="notification" role="tabpanel">

				<div class="mCustomScrollbar" data-mcs-theme="dark">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Notifications</h6>
						<a href="#">Mark all as read</a>
						<a href="#">Settings</a>
					</div>

					<ul class="notification-list">
						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar62-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-comments-post-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
								</svg>
							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<svg class="olymp-little-delete">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
								</svg>
							</div>
						</li>

						<li class="un-read">
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar63-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
								</svg>
							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<svg class="olymp-little-delete">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
								</svg>
							</div>
						</li>

						<li class="with-comment-photo">
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar64-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-comments-post-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
								</svg>
							</span>

							<div class="comment-photo">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/comment-photo1.jpg" alt="photo">
								<span>“She looks incredible in that outfit! We should see each<?php echo(getBaseUrl())?>.”</span>
							</div>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<svg class="olymp-little-delete">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
								</svg>
							</div>
						</li>

						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar65-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
								</svg>
							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<svg class="olymp-little-delete">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
								</svg>
							</div>
						</li>

						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar66-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-heart-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
								</svg>
							</span>

							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<svg class="olymp-little-delete">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
								</svg>
							</div>
						</li>
					</ul>

					<a href="#" class="view-all bg-primary">View All Notifications</a>
				</div>

			</div>

			<div class="tab-pane " id="search" role="tabpanel">


				<form class="search-bar w-search notification-list friend-requests">
					<div class="form-group with-button">
						<input class="form-control js-user-search" placeholder="Search here people or pages<?php echo(getBaseUrl())?>." type="text">
					</div>
				</form>


			</div>

		</div>
		<!-- <?php echo(getBaseUrl())?>. end  Tab panes -->

	</header>

	<!-- <?php echo(getBaseUrl())?>. end Responsive Header-BP -->
	<div class="header-spacer"></div>

	<div style="background-color:#edf2f6 !important">
	   {% yield content %}
	</div>





	<!-- Playlist Popup -->

	<div class="window-popup playlist-popup" tabindex="-1" role="dialog" aria-labelledby="playlist-popup" aria-hidden="true">

		<a href="" class="icon-close js-close-popup">
			<svg class="olymp-close-icon">
				<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
			</svg>
		</a>

		<div class="mCustomScrollbar">
			<table class="playlist-popup-table">

				<thead>

					<tr>

						<th class="play">
							PLAY
						</th>

						<th class="cover">
							COVER
						</th>

						<th class="song-artist">
							SONG AND ARTIST
						</th>

						<th class="album">
							ALBUM
						</th>

						<th class="released">
							RELEASED
						</th>

						<th class="duration">
							DURATION
						</th>

						<th class="spotify">
							GET IT ON SPOTIFY
						</th>

						<th class="remove">
							REMOVE
						</th>
					</tr>

				</thead>

				<tbody>
					<tr>
						<td class="play">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</td>
						<td class="cover">
							<div class="playlist-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/playlist19.jpg" alt="thumb-composition">
							</div>
						</td>
						<td class="song-artist">
							<div class="composition">
								<a href="#" class="composition-name">We Can Be Heroes</a>
								<a href="#" class="composition-author">Jason Bowie</a>
							</div>
						</td>
						<td class="album">
							<a href="#" class="album-composition">Ziggy Firedust</a>
						</td>
						<td class="released">
							<div class="release-year">2014</div>
						</td>
						<td class="duration">
							<div class="composition-time">
								<time class="published" datetime="2017-03-24T18:18">6:17</time>
							</div>
						</td>
						<td class="spotify">
							<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
						</td>
						<td class="remove">
							<a href="#" class="remove-icon">
								<svg class="olymp-close-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
								</svg>
							</a>
						</td>
					</tr>

					<tr>
						<td class="play">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</td>
						<td class="cover">
							<div class="playlist-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/playlist6.jpg" alt="thumb-composition">
							</div>
						</td>
						<td class="song-artist">
							<div class="composition">
								<a href="#" class="composition-name">The Past Starts Slow and Ends</a>
								<a href="#" class="composition-author">System of a Revenge</a>
							</div>
						</td>
						<td class="album">
							<a href="#" class="album-composition">Wonderize</a>
						</td>
						<td class="released">
							<div class="release-year">2014</div>
						</td>
						<td class="duration">
							<div class="composition-time">
								<time class="published" datetime="2017-03-24T18:18">6:17</time>
							</div>
						</td>
						<td class="spotify">
							<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
						</td>
						<td class="remove">
							<a href="#" class="remove-icon">
								<svg class="olymp-close-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
								</svg>
							</a>
						</td>
					</tr>

					<tr>
						<td class="play">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</td>
						<td class="cover">
							<div class="playlist-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/playlist7.jpg" alt="thumb-composition">
							</div>
						</td>
						<td class="song-artist">
							<div class="composition">
								<a href="#" class="composition-name">The Pretender</a>
								<a href="#" class="composition-author">Kung Fighters</a>
							</div>
						</td>
						<td class="album">
							<a href="#" class="album-composition">Warping Lights</a>
						</td>
						<td class="released">
							<div class="release-year">2014</div>
						</td>
						<td class="duration">
							<div class="composition-time">
								<time class="published" datetime="2017-03-24T18:18">6:17</time>
							</div>
						</td>
						<td class="spotify">
							<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
						</td>
						<td class="remove">
							<a href="#" class="remove-icon">
								<svg class="olymp-close-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
								</svg>
							</a>
						</td>
					</tr>

					<tr>
						<td class="play">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</td>
						<td class="cover">
							<div class="playlist-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/playlist8.jpg" alt="thumb-composition">
							</div>
						</td>
						<td class="song-artist">
							<div class="composition">
								<a href="#" class="composition-name">Seven Nation Army</a>
								<a href="#" class="composition-author">The Black Stripes</a>
							</div>
						</td>
						<td class="album">
							<a href="#" class="album-composition ">Icky Strung (LIVE at Cube Garden)</a>
						</td>
						<td class="released">
							<div class="release-year">2014</div>
						</td>
						<td class="duration">
							<div class="composition-time">
								<time class="published" datetime="2017-03-24T18:18">6:17</time>
							</div>
						</td>
						<td class="spotify">
							<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
						</td>
						<td class="remove">
							<a href="#" class="remove-icon">
								<svg class="olymp-close-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
								</svg>
							</a>
						</td>
					</tr>

					<tr>
						<td class="play">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</td>
						<td class="cover">
							<div class="playlist-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/playlist9.jpg" alt="thumb-composition">
							</div>
						</td>
						<td class="song-artist">
							<div class="composition">
								<a href="#" class="composition-name">Leap of Faith</a>
								<a href="#" class="composition-author">Eden Artifact</a>
							</div>
						</td>
						<td class="album">
							<a href="#" class="album-composition">The Assassins’s Soundtrack</a>
						</td>
						<td class="released">
							<div class="release-year">2014</div>
						</td>
						<td class="duration">
							<div class="composition-time">
								<time class="published" datetime="2017-03-24T18:18">6:17</time>
							</div>
						</td>
						<td class="spotify">
							<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
						</td>
						<td class="remove">
							<a href="#" class="remove-icon">
								<svg class="olymp-close-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
								</svg>
							</a>
						</td>
					</tr>

					<tr>
						<td class="play">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</td>
						<td class="cover">
							<div class="playlist-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/playlist10.jpg" alt="thumb-composition">
							</div>
						</td>
						<td class="song-artist">
							<div class="composition">
								<a href="#" class="composition-name">Killer Queen</a>
								<a href="#" class="composition-author">Archiduke</a>
							</div>
						</td>
						<td class="album">
							<a href="#" class="album-composition ">News of the Universe</a>
						</td>
						<td class="released">
							<div class="release-year">2014</div>
						</td>
						<td class="duration">
							<div class="composition-time">
								<time class="published" datetime="2017-03-24T18:18">6:17</time>
							</div>
						</td>
						<td class="spotify">
							<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
						</td>
						<td class="remove">
							<a href="#" class="remove-icon">
								<svg class="olymp-close-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
								</svg>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>

	<!-- . end Playlist Popup -->


	<a class="back-to-top" href="#">
		<div class="back-icon livicon-evo" data-options="name: arrow-top.svg;size: 35px;style:lines; strokeColor: #fff;"></div>
	</a>


	<!-- Window-popup-CHAT for responsive min-width: 768px -->
	<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">

		<div class="modal-content">
			<div class="modal-header">
				<span class="icon-status online"></span>
				<h6 class="title">Chat</h6>
				<div class="more">
					<svg class="olymp-three-dots-icon">
						<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
					</svg>
					<svg class="olymp-little-delete js-chat-open">
						<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
					</svg>
				</div>
			</div>
			<div class="modal-body">
				<div class="mCustomScrollbar">
					<ul class="notification-list chat-message chat-message-field">
						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
							</div>
							<div class="notification-event">
								<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
							</div>
						</li>

						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/author-page.jpg" alt="author" class="mCS_img_loaded">
							</div>
							<div class="notification-event">
								<span class="chat-message-item">Don’t worry Mathilda!</span>
								<span class="chat-message-item">I already bought everything</span>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
							</div>
						</li>

						<li>
							<div class="author-thumb">
								<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
							</div>
							<div class="notification-event">
								<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
							</div>
						</li>
					</ul>
				</div>

				<form class="need-validation">

					<div class="form-group">
						<textarea class="form-control" placeholder="Press enter to post<?php echo(getBaseUrl())?>."></textarea>
						<div class="add-options-message">
							<a href="#" class="options-message">
								<svg class="olymp-computer-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
								</svg>
							</a>
							<div class="options-message smile-block">

								<svg class="olymp-happy-sticker-icon">
									<use xlink:href="<?php echo(getBaseUrl())?>/public/assets/user/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use>
								</svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat1.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat2.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat3.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat4.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat5.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat6.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat7.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat8.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat9.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat10.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat11.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat12.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat13.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat14.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat15.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat16.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat17.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat18.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat19.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat20.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat21.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat22.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat23.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat24.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat25.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat26.png" alt="icon">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo(getBaseUrl())?>/public/assets/user/img/icon-chat27.png" alt="icon">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>

	</div>

	<!-- . end Window-popup-CHAT for responsive min-width: 768px -->


	<!-- JS Scripts -->
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/jQuery/jquery-3.4.1.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/jquery.appear.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/jquery.mousewheel.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/perfect-scrollbar.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/jquery.matchHeight.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/svgxuse.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/imagesloaded.pkgd.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/Headroom.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/velocity.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/ScrollMagic.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/jquery.waypoints.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/jquery.countTo.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/popper.min.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/material.min.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/bootstrap-select.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/smooth-scroll.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/selectize.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/swiper.jquery.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/moment.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/daterangepicker.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/fullcalendar.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/isotope.pkgd.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/ajax-pagination.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/Chart.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/chartjs-plugin-deferred.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/circle-progress.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/loader.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/run-chart.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/jquery.magnific-popup.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/jquery.gifplayer.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/mediaelement-and-player.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/mediaelement-playlist-plugin.min.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/sticky-sidebar.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/ion.rangeSlider.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/leaflet.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs/MarkerClusterGroup.js"></script>

	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/main.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/js/libs-init/libs-init.js"></script>
	<script defer src="<?php echo (getBaseUrl()) ?>/public/assets/user/fonts/fontawesome-all.js"></script>
	<script src="<?php echo (getBaseUrl()) ?>/public/assets/user/Bootstrap/dist/js/bootstrap.bundle.js"></script>

	<!-- Croppie Js  -->
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/croppieJs/croppie.min.js"></script>
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/croppieJs/croppie.js"></script>

	<!--PNotify-->
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/pnotify/pnotify.custom.js"></script>

	<!-- Toast -->
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/toast/jquery.toast.js"></script>

	<!-- Live Icon -->
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/livicons-evolution/js/LivIconsEvo.defaults.js"></script>
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/livicons-evolution/js/tools/snap.svg-min.js"></script>
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/livicons-evolution/js/tools/TweenMax.min.js"></script>
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/livicons-evolution/js/tools/DrawSVGPlugin.min.js"></script>
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/livicons-evolution/js/tools/MorphSVGPlugin.min.js"></script>
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/livicons-evolution/js/tools/verge.min.js"></script>
	<script src="<?php echo(getBaseUrl())?>/public/assets/user/plugins/livicons-evolution/js/LivIconsEvo.min.js"></script>


	<script src="<?php echo(getBaseUrl())?>/public/assets/user/js/custom.js"></script>
	<!-- Start SocketIO -->
	<script src="https://cdn.socket.io/4.0.1/socket.io.min.js" integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous"></script>
	<script>
		var cUserId = <?= selfInfo('id'); ?>;
		var cUserName = "<?= selfInfo('first_name'); ?>";

		/* *********************************************************
		 *   Reset The Notification Count
		 ********************************************************* */
        let preNotificationId = null;
		$("#notifications-list li").mouseover(function() {

            let thisObjectIs = $(this);
            let notificationId = thisObjectIs.data('notifiid');

            if(notificationId != preNotificationId){


                preNotificationId = notificationId;

                $.ajax({
                    url: 'reset-notification',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        op: 'resetnotification',
                        notifi_id: notificationId
                    },
                    success: function(data) {
                        if (data.success) {
                            let courrent_unread_notification = $('#notifications-level').text();



                            // Update Unread Notification Number
                            if(courrent_unread_notification > 1){
                                $('#notifications-level').text(courrent_unread_notification - 1)
                            }else {
                                $('#notifications-level').text('');
                                $('#notifications-level').hide();
                            }
                            thisObjectIs.removeClass('notification-item');
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });

            }




		});


	</script>
	<script src="<?php echo(getBaseUrl())?>/public/socket/socket.js"></script>
	<!-- End SocketIO -->
	{% yield pushInEnd %}
	
</body>

</html>