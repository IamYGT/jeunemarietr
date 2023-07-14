<section id="products" class="ls fluid_padding_0 columns_padding_0">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="section_header">Ürünler</h2>
							<div class="filters carousel_filters"> 
                            
                            <a href="#" data-filter="*">Tümü</a>
                            <?php foreach($urunkategoricek as $urunk){?>
                             <a href="#" data-filter=".<?=$urunk['seo']?>"><?=$urunk['adi']?></a>
                           <?php }?>
                               
                                </div>
							<div class="owl-carousel products-carousel gallery-carousel" data-nav="true" data-dots="false"
							    data-responsive-xlg="5" data-responsive-sm="3" data-responsive-xs="2" data-responsive-xxs="1" data-filters=".carousel_filters" data-margin="30">
								
                                <?php
                                foreach($uruncek as $urun){
									
									$katid = $urun['kategori'];
									$katla=$db->query("select * from urun_kategori where id='$katid'")->fetch(PDO::FETCH_ASSOC);
								?>
                                <article class="product vertical-item text-center with-corner-label <?=$katla['seo']?>">
									<div class="item-media-wrap bottommargin_25">
										<div class="item-media"> <a href="<?=$urun['seo']?>">
                                    <img src="resimler/<?=$urun['resim']?>" alt="<?=$urun['adi']?>"/>
                                    <img src="resimler/<?=$urun['resim']?>" alt="<?=$urun['adi']?>"/>
                                </a>
											
										</div>
										
									</div>
									<div class="item-content">
										<h3 class="entry-title"> <a href="<?=$urun['seo']?>"><?=$urun['adi']?></a> </h3>
										
									</div>
								</article>
					<?php }?>
							</div>
						</div>
					</div>
				</div>
			</section>