<section id="testimonials" class="ls ms parallax overlay_color section_padding_top_150 section_padding_bottom_150">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<div class="owl-carousel" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-dots="true" data-nav="true">
							<?php foreach($yorumcek as $yorum){?>
                            	<blockquote>
									<div class="avatar"> <img src="resimler/<?=$yorum['resim']?>" alt="<?=$yorum['adi']?>"> </div>
									<p><?=$yorum['aciklama']?></p> <cite><?=$yorum['adi']?></cite> </blockquote>
								<?php }?>
								
							</div>
						</div>
					</div>
				</div>
			</section>