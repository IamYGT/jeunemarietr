<section class="ls section_padding_top_150 section_padding_bottom_150 columns_padding_30">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-9 col-lg-9 col-md-push-3 col-lg-push-3">
						
							<div class="columns-3">
								<ul id="products" class="products list-unstyled">
								    <?php
								    $uruncek1=$db->query("select * from urunler where kategori='$id'")->fetchAll(PDO::FETCH_ASSOC);
								    foreach($uruncek1 as $urun1){
								    ?>
									<li class="product type-product">
										<article class="vertical-item text-center with-corner-label men">
											<div class="item-media-wrap bottommargin_25">
												<div class="item-media"> <a href="<?=$urun1['seo']?>">
		                                    <img src="resimler/<?=$urun1['resim']?>" alt="<?=$urun1['adi']?>"/>
		                                    <img src="resimler/<?=$urun1['resim']?>" alt="<?=$urun1['adi']?>"/>
		                                </a>
												
												</div>
												<div class="corner-label hot"><?=$adi?></div>
											</div>
											<div class="item-content">
												<h3 class="entry-title"> <a href="<?=$urun1['seo']?>"><?=$urun1['adi']?></a> </h3>
											
											</div>
										</article>
									</li>
					<?php }?>
								</ul>
							</div>
					
						</div>
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
						<!-- eof aside sidebar -->
					</div>
				</div>
			</section>