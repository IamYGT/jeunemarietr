<section class="ls section_padding_top_150 section_padding_bottom_150 columns_margin_bottom_0 columns_padding_30 service-single-item">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="item-media-wrap">
								<div class="item-media"> <img src="resimler/<?=$hizmetler['resim']?>" alt="<?=$hizmetler['adi']?>"> </div>
							</div>
						</div>
					</div>
					<div class="row columns_margin_top_0">
						<div class="col-xs-12 col-md-8 col-lg-9">
							<article class="vertical-item content-padding big-padding with_shadow">
								<div class="item-content">
									<h1 class="entry-title"><?=$hizmetler['adi']?></h1>
									<p><?=$hizmetler['aciklama']?></p>
								
								</div>
							</article>
						</div>
						<aside class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-3">
							<div class="widget widget_nav_menu">
								<h3 class="widget_title">Tüm Hizmetler </h3>
								<div>
									<ul class="menu greylinks">
									    <?php foreach($hizmetcek as $hizmet){?>
										<li class=""> <a href="<?=$hizmet['seo']?>"><?=$hizmet['adi']?></a> </li>
									<?php }?>
									</ul>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</section>