{% extends user/template/app %}


{% block title %}Profile{% endblock %}

{% block pushInHead %}
    <style type="text/css">

    </style>
{% endblock %}

{% block content %}
!-- Top Header-Profile --><

<div class="container">
	<div class="row">

		<div class="col-md-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<div class="post__author author vcard inline-items pl-5">
						<img src="../public/assets/user/img/author-page.jpg" alt="author">
			
						<div class="author-date pl-5 my-3">
							<?php 
								$user = auth('user');
							?>
							<a class="h6 post__author-name fn" href=""><?= userinfois($user->id); ?></a>
						</div>
					</div>
					<div class="pl-5 my-3" style="float: right;">
						<button type="button" class="btn btn-md-2 btn-breez">Copy</button>
					</div>
				</div>
				

				<div class="row">
					<div class="col col-xl-8 m-auto col-lg-8 col-md-12">
						<ul class="nav nav-tabs social-menu-tabs" role="tablist">

							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
									<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="NEWSFEED"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
									Feed
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
									<svg class="olymp-info-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-info-icon"></use></svg>
									Stats
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab"href="#blog" role="tab">
									<svg class="olymp-stats-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>
									Portfolio
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab"  href="#chart" role="tab">
									<svg class="olymp-thunder-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-stats-icon"></use></svg>
									Chart
								</a>
							</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<!-- ... end Top Header-Profile -->
<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col-md-12">
			<div class="tab-content">
				<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="ui-block">
					
								<article class="hentry post has-post-thumbnail">
								
									<div class="post__author author vcard inline-items">
										<img src="../public/assets/user/img/avatar3-sm.jpg" alt="author">
								
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">Sarah Hetfield</a>
											<div class="post__date">
												<time class="published" datetime="2004-07-24T18:18">
													March 2 at 9:06am
												</time>
											</div>
										</div>
								
										<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown">
												<li>
													<a href="#">Edit Post</a>
												</li>
												<li>
													<a href="#">Delete Post</a>
												</li>
												<li>
													<a href="#">Turn Off Notifications</a>
												</li>
												<li>
													<a href="#">Select as Featured</a>
												</li>
											</ul>
										</div>
								
									</div>
								
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
										pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
										mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.
									</p>
								
									<div class="post-additional-info inline-items">
								
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-heart-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
											<span>0 Likes</span>
										</a>
								
										<div class="comments-shared">
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-speech-balloon-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
												<span>0 Comments</span>
											</a>
								
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-share-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
												<span>2 Shares</span>
											</a>
										</div>
								
								
									</div>
								
									<div class="control-block-button post-control-button">
								
										<a href="#" class="btn btn-control">
											<svg class="olymp-like-post-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
										</a>
								
										<a href="#" class="btn btn-control">
											<svg class="olymp-comments-post-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
										</a>
								
										<a href="#" class="btn btn-control">
											<svg class="olymp-share-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
										</a>
								
									</div>
								
								</article>
							</div>
						</div>
					</div>
				</div>
		
				<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="true">
					<div class="row">
						<div class="col-md-12">
							
					
							<div class="ui-block">
								
									<div id="chartdiv"></div>
								
							</div>
							
								
							
						</div>

						<div class="col-md-6">
							
					
							<div class="ui-block">
								<div class="ui-block-content row">
									<div class="col-md-6"><h2>Average Risk Score of the Last 7 Days</h2></div>
									<div class="col-md-12">
										<div id="chartdiv4"></div>
										<h3 style="text-align: center;"> Avg. Monthly Risk Score (1Y) </h3>
										<p>Max Drawdown</p>
								
									</div>
									<div class="col-md-12">
										<div class="performance-line">
											<div class="performance-percent"><span>-27.04%</span> <p>Daily</p></div>
											<div class="performance-percent performance-percent2"><span>-43.00%</span><p>Weekly</p> </div>
											<div  class="performance-percent"><span >-79.17%</span> <p>Yearly</p></div>
										</div>	
									</div>
								</div>
							</div>
							
								
							
						</div>

						<div class="col-md-6">
							<div class="ui-block">
								<div class="ui-block-content row">
									<div class="col-md-12">
										<h2>Copiers</h2>
										<h4 class="pl-5">8</h4>
									</div>
									<div class="col-md-12">
										<div id="chartdiv5"></div>

										<h2 style="text-align: center;"><span _ngcontent-xcx-c35="" class="negative procent">-1 (-11.11%)</span> Copiers Last 7d </h2>
										<p>AUM Range</p>
										<h4>$50K-$100K</h4>
										<h4>Copy Assets Under Management</h4>
									</div>

								</div>
									
							</div>	
						</div>

						<div class="col-md-12">
							<div class="ui-block">
								<div class="ui-block-content row">
									<div class="col-md-12"><h2> Trading </h2></div>
									
									<div class="col-md-4 row">
										<div class="col-4"><img class="trading-arrows " src="../public/assets/user/img/transfer.png"></div>
										<div class="col-6"><h2>47.495%</h2><p>Total Trades</p></div>
									</div>

									<div class="col-md-4">
										<div  class="top-colum-stats" style="text-align: center;">
											<div class="top-trade-stat"><p><span  class="positive"><span  class="sprite"></span>10.54%</span><span> Avg. Profit </span></p></div>
											<div class="top-trade-stat"><p><span  class="negative"><span  class="sprite"></span>-14.27%</span><span> Avg. Loss </span></p></div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="top-trade-profit" style="float: right;">
											
											<h3 class="top-trade-profit-procent">82.43%</h3>
											<p class="profit">Profitable</p>
										</div>
									</div>

									<div class="col-md-12 row">
										<div class="col-lg-1"></div>
										<div class="col-lg-2" style="background-color: #52BDF5; height: 20px;"></div>
										<div class="col-lg-2" style="background-color: #E85D5D;"></div>
										<div class="col-lg-2" style="background-color: #FFDD8C;"></div>
										<div class="col-lg-2" style="background-color: #B9DF7C;"></div>
										<div class="col-lg-2" style="background-color: #A284C0;"></div>
									</div>

									<div class="col-md-12 row">
										<div class="col-md-1"></div>
										<div class="col-md-2">
											<div class="my-2" style="height: 20px; width: 20px; background-color:#52BDF5 ;">
												<span class="pl-5">CURRENCIES</span>
												<h4 class="pl-5">78.37%</h4>
											</div>
										</div>
										<div class="col-md-2">
											<div class="my-2" style="height: 20px; width: 20px; background-color:#E85D5D ;">
												<span class="pl-5">CRYPTO</span>
												<h4 class="pl-5">18.147%</h4>
											</div>
										</div>
										<div class="col-md-2">
											<div class="my-2" style="height: 20px; width: 20px; background-color:#FFDD8C ;">
												<span class="pl-5">STOCKS</span>
												<h4 class="pl-5">62.81%</h4>
											</div>
										</div>
										<div class="col-md-2">
											<div class="my-2" style="height: 20px; width: 20px; background-color:#B9DF7C ;">
												<span class="pl-5">ETFS</span>
												<h4 class="pl-5">62.81%</h4>
											</div>
										</div>
										<div class="col-md-2">
											<div class="my-2" style="height: 20px; width: 20px; background-color:#A284C0 ;">
												<span class="pl-5">COMMODITIES</span>
												<h4 class="pl-5">62.81%</h4>
											</div>
										</div>
									</div>

									

								</div>
							</div>	
						</div>

						<div class="col-md-12">
							<div class="ui-block">
								<div class="ui-block-content">
									<div class="row">
										<div class="col-md-12"><h3>Frequently Traded</h3></div>

										<div class="col-md-12">

											<div class="ui-block">
								
												
												<div class="birthday-item inline-items badges row">
														<div class="col-md-2">
															<div class="author-thumb">
																<img src="../public/assets/user/img/badge1.png" alt="author">
																
															</div>
														</div>
															<div class="col-md-2">
															<div class="birthday-author-name">
																<h6 class="top-trade-topic">6.17%<span>(24 Trades)</span></h6>
																<h3>GBPUSD</h3>
															</div>
														</div>
													<div class="col-md-3">
														<div class="top-colum-stats" style="text-align: center;">
															<div class="top-trade-stat"><p><span class="positive"><span class="sprite"></span>10.54%</span><span> Avg. Profit </span></p></div>
															<div class="top-trade-stat"><p><span class="negative"><span class="sprite"></span>-14.27%</span><span> Avg. Loss </span></p></div>
														</div>
													</div>
												
													<div class="col-md-5">
														<div class="top-trade-profit" style="float: right;">
															
															<h3 class="top-trade-profit-procent">82.43%</h3>
															<p class="profit">Profitable</p>
														</div>
													</div>
												
												</div>
								
											</div>
								
											<div class="ui-block">
								
												
												<div class="birthday-item inline-items badges row">
														<div class="col-md-2">
															<div class="author-thumb">
																<img src="../public/assets/user/img/badge1.png" alt="author">
																
															</div>
														</div>
															<div class="col-md-2">
															<div class="birthday-author-name">
																<h6 class="top-trade-topic">6.17%<span>(24 Trades)</span></h6>
																<h3>GBPUSD</h3>
															</div>
														</div>
													<div class="col-md-3">
														<div class="top-colum-stats" style="text-align: center;">
															<div class="top-trade-stat"><p><span class="positive"><span class="sprite"></span>10.54%</span><span> Avg. Profit </span></p></div>
															<div class="top-trade-stat"><p><span class="negative"><span class="sprite"></span>-14.27%</span><span> Avg. Loss </span></p></div>
														</div>
													</div>
												
													<div class="col-md-5">
														<div class="top-trade-profit" style="float: right;">
															
															<h3 class="top-trade-profit-procent">82.43%</h3>
															<p class="profit">Profitable</p>
														</div>
													</div>
												
												</div>
								
											</div>
								
											
								
										</div>
									</div>
								</div>
							</div>	
						</div>

						<div class="col-md-12">
							<div class="ui-block">
								<div class="ui-block-content row">
									<div class="col-md-12"><h3>Additional Stats</h3></div>
									<div class="col-md-3 additional"><h4>19.40</h4><p>Trades Per Week</p></div>
									<div class="col-md-3 additional additional-percent"><h4>1 Week</h4><p>Avg. Holding Time</p></div>
									<div class="col-md-3 additional additional-percents"><h4>11/30/20</h4><p>Active Since</p></div>
									<div class="col-md-3 additional"><h4>45.00%</h4><p>Profitable Weeks</p></div>
								</div>
							</div>	
						</div>


					</div>
				</div>
		
				<div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
					<div class="row">
						
						<div class="col-12">
			
							
							<ul class="table-careers">
								<li class="header-spacer">
									<span class="position bold">MARKET</span>
									<span class="position bold">BUY/SELL</span>
									<span class="position bold">INVESTED</span>
									<span class="position bold">P/L(%)</span>
									<span class="position bold">VALUE</span>
									<span class="position bold">SELL</span>
									<span class="position bold">BUY</span>
								</li>
							
								<li>
									<span><img src="../public/assets/user/img/alibaba.png" width="54" alt="author"><p class="position bold">Alibaba</p></span>
									<span>Buying</span>
									<span>5.59%</span>
									<span>61.28%</span>
									<span>2.12%</span>
									<span>
										<div class="input-group number-spinner number-spinner--secondary">
											<span class="input-group-btn data-dwn input-group-prepend">
												<button class="btn btn-default btn-info" data-dir="dwn">
													<span>S</span>
													<div class="ripple-container">
														<div class="ripple ripple-on ripple-out" style=" background-color: rgb(255, 255, 255); transform: scale(5.17795);">
														</div>
													</div>
												</button>
											</span>
											<div class="form-group"><input disabled type="text" class="form-control text-center" value="20" min="-50" max="50" style="
												border: 1px solid;"></div>
											
										</div>
									</span>
									<span>

										<div class="input-group number-spinner number-spinner--secondary">
											<span class="input-group-btn data-dwn input-group-prepend">
												<button class="btn btn-default btn-info" data-dir="dwn">
													<span>B</span>
													<div class="ripple-container">
														<div class="ripple ripple-on ripple-out" style=" background-color: rgb(255, 255, 255); transform: scale(5.17795);">
														</div>
													</div>
												</button>
											</span>
											<div class="form-group"><input disabled type="text" class="form-control text-center" value="20" min="-50" max="50" style="
												border: 1px solid;"></div>
											
										</div>
									</span>
								</li>

								<li>
									<span><img src="../public/assets/user/img/alibaba.png" width="54" alt="author"><p class="position bold">Alibaba</p></span>
									<span>Buying</span>
									<span>5.59%</span>
									<span>61.28%</span>
									<span>2.12%</span>
									<span>
										<div class="input-group number-spinner number-spinner--secondary">
											<span class="input-group-btn data-dwn input-group-prepend">
												<button class="btn btn-default btn-info" data-dir="dwn">
													<span>S</span>
													<div class="ripple-container">
														<div class="ripple ripple-on ripple-out" style=" background-color: rgb(255, 255, 255); transform: scale(5.17795);">
														</div>
													</div>
												</button>
											</span>
											<div class="form-group"><input disabled type="text" class="form-control text-center" value="734646" min="-50" max="50" style="
												border: 1px solid;"></div>
											
										</div>
									</span>
									<span>

										<div class="input-group number-spinner number-spinner--secondary">
											<span class="input-group-btn data-dwn input-group-prepend">
												<button class="btn btn-default btn-info" data-dir="dwn">
													<span>B</span>
													<div class="ripple-container">
														<div class="ripple ripple-on ripple-out" style=" background-color: rgb(255, 255, 255); transform: scale(5.17795);">
														</div>
													</div>
												</button>
											</span>
											<div class="form-group"><input disabled type="text" class="form-control text-center" value="200225" min="-50" max="50" style="
												border: 1px solid;"></div>
											
										</div>
									</span>
								</li>


								<li>
									<span class="position bold">Balance</span>
									<span class="position bold"></span>
									<span class="position bold"></span>
									<span class="position bold"></span>
									<span class="position bold"></span>
									<span class="position bold">10.00% (Balance)</span>
									
									
								</li>
							
								
							</ul>
			
						</div>
					</div>
				</div>

				<div class="tab-pane" id="chart" role="tabpanel" aria-expanded="true">
					<div class="ui-block">
								
						<div id="chartdiv3"></div>
					
				</div>
				
				</div>
			</div>

		
		</div>

		<!-- ... end Main Content -->

	</div>
</div>

{% endblock %}


{% block pushInEnd %}
   <script>

   </script>
{% endblock %}







