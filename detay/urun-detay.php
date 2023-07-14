<section class="ls section_padding_top_150 section_padding_bottom_150 columns_padding_30">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-9 col-lg-9 col-md-push-3 col-lg-push-3">
							<div itemscope="" itemtype="http://schema.org/Product" class="product type-product row columns_padding_30 columns_margin_bottom_30">
								<div class="col-sm-6">
									<div class="with-corner-label">
										<div class="images text-center"> <a href="resimler/<?=$urunler['resim']?>" itemprop="image" class="woocommerce-main-image zoom prettyPhoto" data-gal="prettyPhoto[product-gallery]">
						            <img src="resimler/<?=$urunler['resim']?>" class="attachment-shop_single wp-post-image" alt="" title="">
						        </a>
											<div class="corner-label hot">hot</div>
										</div>
										<!--eof .images -->
									</div>
									<div class="thumbnails-wrap">
										<div id="product-thumbnails" class="owl-carousel thumbnails product-thumbnails" data-margin="10" data-nav="false" data-dots="true" data-responsive-lg="4" data-responsive-md="4" data-responsive-sm="3" data-responsive-xs="2" data-responsive-xxs="2">
										<a href="resimler/<?=$urunler['resim']?>" class="zoom first" title="" data-gal="prettyPhoto[product-gallery]">
					                <img src="resimler/<?=$urunler['resim']?>" class="attachment-shop_thumbnail" alt="">
					            </a>
					            <?php
					            $urunimgcek =$db->query("select * from urun_img where urun_id='$id' and tur='urunler'")->fetchAll(PDO::FETCH_ASSOC);
					            foreach($urunimgcek as $urunimg){
					            ?>
					            <a href="resimler/<?=$urunimg['img']?>" class="zoom first" title="<?=$adi?>" data-gal="prettyPhoto[product-gallery]">
					                <img src="resimler/<?=$urunimg['img']?>" class="attachment-shop_thumbnail" alt="<?=$adi?>">
					            </a> 
					            
<?php }?>					            
					            </div>
									</div>
									<!-- eof .images -->
								</div>
								<div class="summary entry-summary col-sm-6">
									<h1 itemprop="name" class="product_title"><?=$urunler['adi']?></h1>
									<div class="product-rating"> 
										<div class="star-rating"> <span style="width:100%">
								 </span>
										</div>
									</div> 
									<div class="short-description">
										<p><?=$urunler['onaciklama']?></p>
									</div>
									
									<div class="product_meta highlightlinks">
										<ul class="list1 feature-list bottommargin_0">
										
											<li><span class="grey">Kategori:</span> <a href="<?=$katlar['seo']?>"><?=$katlar['adi']?></a></li>
										
										</ul>
									</div>
								</div>
								<!-- .summary.col- -->
							</div>
							<!-- .product.row -->
							<div class="woocommerce-tabs">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs wc-tabs" role="tablist">
									<li class="active"><a href="#details_tab" role="tab" data-toggle="tab">Açıklama</a></li>
								
								</ul>
								<!-- Tab panes -->
								<div class="tab-content big-padding top-color-border">
									<div class="tab-pane fade in active" id="details_tab">
										<p><?=$urunler['aciklama']?></p>
									</div>
									
								</div>
								<!-- eof .tab-content -->
							</div>
							<!-- .woocommerce-tabs -->
							<div class="related-products">
								<h2> Tüm Ürünler</h2>
								<div class="owl-carousel with_shadow_items" data-dots="false" data-nav="true" data-loop="true" data-autoplay="true" data-responsive-lg="3" data-responsive-md="3" data-responsive-sm="3" data-responsive-xs="2">
								<?php foreach($uruncek as $urun1){?>
									<article class="product vertical-item text-center men">
										<div class="item-media-wrap bottommargin_25">
											<div class="item-media"> <a href="<?=$urun1['seo']?>">
                                    <img src="resimler/<?=$urun1['resim']?>" alt="<?=$urun1['adi']?>" />
                                    <img src="resimler/<?=$urun1['resim']?>" alt="<?=$urun1['adi']?>" />
                                </a>
											
											</div>
										</div>
										<div class="item-content">
											<h3 class="entry-title"> <a href="<?=$urun1['seo']?>"><?=$urun1['adi']?></a> </h3>
											
										</div>
									</article>
									<?php }?>
								</div>
							</div>
						</div>
						<!--eof .col-sm-8 (main content)-->
						<aside class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-md-pull-9 col-lg-pull-9 col-sm-offset-3 col-md-offset-0">
							<div class="widget widget_categories">
								<h3 class="widget-title">Ürünler</h3>
								<ul class="greylinks">
								 <?php foreach($urunkategoricek as $urunkat1){?>
									<li> <a href="<?=$urunkat1['seo']?>"><?=$urunkat1['adi']?></a>
										<ul>
										    <?php
										    $katid=$urunkat1['id'];
										    $kat1cek=$db->query("select * from urun_kategori where kategori='$katid'")->fetchAll(PDO::FETCH_ASSOC);
										    foreach($kat1cek as $kat1){
										    ?>
											<li> <a href="<?=$kat1['seo']?>"><?=$kat1['adi']?></a>  </li>
										<?php }?>
										</ul>
									</li>
									<?php }?>
								</ul>
							</div>
						
						</aside>
					</div>
				</div>
			</section>