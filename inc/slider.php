<section class="intro_section page_mainslider cs all-scr-cover">
				<div class="flexslider" data-dots="false" data-nav="true">
					<ul class="slides">
                    <?php foreach($slidercek as $slider){?>
						<li>
							<div class="slide-image-wrap"> <img src="resimler/<?=$slider['resim']?>" alt="<?=$slider['adi']?>" /> </div>
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
										<div class="slide_description_wrapper">
											<div class="slide_description">
												<div class="intro-layer to_animate" data-animation="fadeInUp">
													<p> <span class="light_bg_color small-text"><?=$title?></span> </p>
												</div>
												<div class="intro-layer to_animate" data-animation="fadeInUp">
													<p> <?=$slider['adi']?></p>
												</div>
												<div class="intro-layer to_animate" data-animation="fadeInUp">
													<p> <span class="small-text big-spacing"><?=$slider['aciklama']?></span> </p>
												</div>
												<div class="intro-layer to_animate" data-animation="fadeInUp">
													<div class="slide_buttons"> <a href="<?=$slider['linki']?>" class="theme_button min_width_button">İnceleyin</a> </div>
												</div>
											</div>
											<!-- eof .slide_description -->
										</div>
										<!-- eof .slide_description_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</li>
						<?php }?>
						
					</ul>
				</div>
			</section>