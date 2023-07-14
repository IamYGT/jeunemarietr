<section class="ls section_padding_top_150 section_padding_bottom_140 columns_padding_30">
				<div class="container">
					<div class="row vertical-tabs color4">
						<div class="col-sm-5">
							<!-- Nav tabs -->
							<ul class="nav" role="tablist">
							    <?php foreach($ssscek as $sss){?>
								<li <?php if($sss['sira']==1){?>class="active"<?php }?>> <a href="#vertical-tab<?=$sss['id']?>" role="tab" data-toggle="tab"><?=$sss['adi']?></a> </li>
							<?php }?>
							</ul>
						</div>
						<div class="col-sm-7">
							<!-- Tab panes -->
							<div class="tab-content no-border">
							     <?php foreach($ssscek as $sss){?>
								<div class="tab-pane fade in  <?php if($sss['sira']==1){?>active<?php }?>" id="vertical-tab<?=$sss['id']?>">
									<h3 class="poppins"><?=$sss['adi']?></h3>
									<p><?=$sss['aciklama']?></p>	</div>
						<?php }?>
							</div>
						</div>
					</div>
				</div>
			</section>