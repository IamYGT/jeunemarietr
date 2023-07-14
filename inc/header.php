<section class="page_topline ds background_cover">
				<div class="container-fluid">
					<div class="row flex-wrap v-center">
						<div class="col-xs-12 col-md-10 text-center text-md-left">
							<div class="inline-content big-spacing"> <span>
						<i class="qtyler-phone rightpadding_5"></i>
						<?=$telefon1?>
					</span> <span>
						<i class="qtyler-envelope rightpadding_5"></i>
						<a style="    color: #363636;" href="mailto:<?=$email1?>" class="__cf_email__" data-cfemail="cdbcb9b4a1a8bf8da8b5aca0bda1a8e3aea2a0"><?=$email1?></a>
					</span> <span>
						<i class="qtyler-map-marker rightpadding_5"></i>
						<?=$adres1?>
					</span> </div>
						</div>
						<div class="col-xs-12 col-md-2 text-center text-md-right ">

							<div class="dropdown search-dropdown"> <a id="search" data-target="#" href="index-2.html" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false" class="theme_button small_button round_button bg_button margin_0">
						<i class="qtyler-search" aria-hidden="true"></i>
					</a>
								<div class="dropdown-menu ls" role="menu" aria-labelledby="search">
									<div class="widget_search">
										<form method="get" class="searchform form-inline" action="https://html.modernwebtemplates.com/qtyler/">
											<div class="form-group-wrap">
												<div class="form-group with_button margin_0"> <label class="sr-only" for="topline-search">Search for:</label> <input id="topline-search" type="text" value="" name="search" class="form-control" placeholder="Search Keyword"> <button type="submit" class="theme_button">Search</button> </div>
											</div>
										</form>
									</div> <i class="qtyler-close dropdown-close" aria-hidden="true"></i> </div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<header class="page_header header_darkgrey header_v1 toggler_xxs_right">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 display-flex v-center">
							<div class="header_left_logo"> <a href="./" class="logo">
                        <img src="resimler/<?=$logo?>" alt="<?=$title?>">
                    </a> </div>
							<div class="header_mainmenu text-center">
								<!-- main nav start -->
								<nav class="mainmenu_wrapper">
									<ul class="mainmenu nav sf-menu">
										<li> <a href="./">Anasayfa</a></li>
										<li> <a href="#">Kurumsal</a>
											<ul>
											    <?php foreach($sayfacek as $a){?>
												<li> <a href="<?=$a['seo']?>"><?=$a['adi']?></a> </li>
											<?php }?>
												<li> <a href="referanslar">Referanslar</a> </li>
											</ul>
										</li>
										<li> <a href="#">Ürünler</a>
											<ul>
											<?php
											foreach($urunkategoricek as $urunk){
											?>
												<li> <a href="<?=$urunk['seo']?>"><?=$urunk['adi']?></a>
													<ul>
													    <?php
													    $altid = $urunk['id'];
													    $altcek=$db->query("select * from urun_kategori where kategori='$altid'")->fetchAll(PDO::FETCH_ASSOC);
													    foreach($altcek as $alt){
													    ?>
														<li> <a href="<?=$alt['seo']?>"><?=$alt['adi']?></a> </li>
													<?php }?>
													</ul>
												</li>
										<?php }?>
											</ul>
										</li>
											<li> <a href="hizmetler">Hizmetler</a></li>
											<li> <a href="galeri">Galeri</a></li>
											<li> <a href="sss">S.S.S</a></li>
											<li> <a href="blog">Blog</a></li>
										<li> <a href="iletisim">İletişim</a></li>
									</ul>
								</nav>
								<!-- eof main nav -->
								<!-- header toggler --><span class="toggle_menu"><span></span></span>
							</div>
							<!--
							<div class="header_right_buttons text-right">
								<ul class="inline-dropdown inline-block">
									<li class="dropdown login-dropdown"> <a id="login" data-target="#" href="index-2.html" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false" class="theme_button small_button round_button bg_button margin_0">
                                <i class="qtyler-user" aria-hidden="true"></i>
                            </a>
										<div class="dropdown-menu small-text darklinks" aria-labelledby="login"> <strong class="grey">currency</strong><br> <a href="#" class="active">usd</a><br> <a href="#">eur</a><br> <a href="#">gbp</a>
											<hr> <strong class="grey">My Account</strong><br> <a href="#">log in</a><br> <a href="#">register</a> </div>
									</li>
									<li class="dropdown cart-dropdown"> <a id="cart" data-target="#" href="index-2.html" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false" class="theme_button small_button round_button bg_button margin_0">
                                <i class="qtyler-shop-bag" aria-hidden="true"></i>

                                <span class="count">3</span>
                            </a>
										<div class="dropdown-menu" aria-labelledby="cart">
											<div class="widget widget_shopping_cart">
												<div class="widget_shopping_cart_content">
													<ul class="cart_list product_list_widget">
														<li class="media">
															<div class="media-left media-middle"> <a href="shop-product.html">
								<img src="images/shop/03.jpg" alt="">
							</a> </div>
															<div class="media-body media-middle"> <a href="#" class="remove" title="Remove this item"></a>
																<p class="darklinks"> <a href="shop-product.html">Heather grey pullover</a> </p> <span class="product-quantity">
								<span class="price">$29.95</span> <span>x 1</span> </span>
															</div>
														</li>
														<li class="media">
															<div class="media-left media-middle"> <a href="shop-product.html">
								<img src="images/shop/05.jpg" alt="">
							</a> </div>
															<div class="media-body media-middle"> <a href="#" class="remove" title="Remove this item"></a>
																<p class="darklinks"> <a href="shop-product.html">Slim short dress</a> </p> <span class="product-quantity">
								<span class="price">$34.95</span> <span>x 2</span> </span>
															</div>
														</li>
													</ul>
													<p class="total grey"> <span>Subtotal:</span> <span class="price">$69.94</span> </p>
													<p class="buttons"> <a href="shop-cart.html" class="theme_button">View cart</a> <a href="shop-cart.html" class="theme_button color1">Checkout</a> </p>
												</div>
											</div>
										</div>
									</li>
									<li class="dropdown social-dropdown"> <a id="social" data-target="#" href="index-2.html" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false" class="theme_button small_button round_button bg_button margin_0">
                                <i class="qtyler-share" aria-hidden="true"></i>
                            </a>
										<div class="dropdown-menu"> <a class="social-icon socicon-facebook dark-icon" href="#" title="Facebook"></a> <a class="social-icon socicon-googleplus dark-icon" href="#" title="Google Plus"></a> <a class="social-icon socicon-linkedin dark-icon" href="#" title="Linkedin"></a>											<a class="social-icon socicon-twitter dark-icon" href="#" title="Twitter"></a> <a class="social-icon socicon-instagram dark-icon" href="#" title="Instagram"></a> </div>
									</li>
								</ul>
							</div>
							-->
						</div>
					</div>
				</div>
			</header>
