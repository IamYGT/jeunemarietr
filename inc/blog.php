<section id="blog" class="ls section_padding_top_150 section_padding_bottom_150">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h2 class="section_header text-center">Blog &amp; Haberler</h2>
							
							<div class="row columns_margin_bottom_20">
								<?php foreach($habercek as $haber){?>
								<div class="col-xs-12 col-sm-6">
									<article class="side-item side-md">
										<div class="row v-center">
											<div class="col-xs-12 col-md-6">
												<div class="item-media"> <a href="<?=$haber['seo']?>">
		                					<img src="resimler/<?=$haber['resim']?>" alt="<?=$haber['adi']?>">
		                				</a> </div>
											</div>
											<div class="col-xs-12 col-md-6">
												<div class="item-content">
													<div class="entry-meta small-text greylinks"> <span class="date">
											
                							</span> </div>
													<h3 class="entry-title small"><a href="<?=$haber['seo']?>"><?=$haber['adi']?></a></h3> <a href="<?=$haber['seo']?>" class="more-link">İnceleyin</a> </div>
											</div>
										</div>
									</article>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</section>