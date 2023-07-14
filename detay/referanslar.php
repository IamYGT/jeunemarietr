<section class="ls section_padding_top_150 section_padding_bottom_150">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="isotope_container isotope row masonry-layout images-grid columns_margin_bottom_20">
							    <?php foreach($refcek as $ref){?>
								<div class="isotope-item col-xs-4 col-sm-3"> <a href="#" class="with_shadow">
                            <img src="resimler/<?=$ref['resim']?>" alt="<?=$ref['adi']?>">
                        </a> </div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</section>