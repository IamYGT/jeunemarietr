<section class="ls section_padding_top_150 section_padding_bottom_150 columns_padding_30 columns_margin_bottom_40">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<section  class="ls ms" data-address="522 Chapel St, South Yarra VIC 3141, Australia">
								<?=$googlemaps?>
								
							</section>
						</div>
						<div class="clearfix toppadding_10"></div>
						<div class="col-xs-12 col-md-6">
							<h2>Bize Ulaşabilirsiniz</h2>
							<div class="toppadding_15"></div>
							<form class="contact-form row" method="post" action="tpanel/include/fonksiyonlar.php">
								<div class="col-xs-12">
								    <input type="hidden" name="link" value="../../iletisim">
									<div class="form-group bottommargin_0"> <label for="name">Ad Soyad </label> <input type="text" aria-required="true" size="30" value="" name="adsoyad" id="name" class="form-control with_icon" placeholder="Ad Soya "> <i class="qtyler-user grey"></i> </div>
								</div>
								<div class="col-xs-12">
									<div class="form-group bottommargin_0"> <label for="email">Email </label> <input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control with_icon" placeholder="Email "> <i class="qtyler-envelope grey"></i> </div>
								</div>
								<div class="col-xs-12">
									<div class="form-group bottommargin_0"> <label for="phone">Telefon</label> <input type="tel" size="30" value="" name="telefon" id="phone" class="form-control with_icon" placeholder="Telefon "> <i class="qtyler-phone grey"></i> </div>
								</div>
								<div class="col-xs-12">
									<div class="form-group bottommargin_0"> <label for="message">Mesajınız</label> <textarea aria-required="true" rows="3" cols="45" name="mesaj" id="message" class="form-control with_icon" placeholder="Mesajınız "></textarea> <i class="qtyler-comment grey"></i> </div>
								</div>
								<div class="col-xs-12 bottommargin_0">
									<div class="contact-form-submit"> <button type="submit" id="contact_form_submit" name="iletisim-formu" class="theme_button min_width_button margin_0">Gönder </button> </div>
								</div>
							</form>
						</div>
						<div class="col-xs-12 col-md-6">
							<h2>İletişim Bilgileri</h2>
							<div class="toppadding_20"></div>
							<ul class="list1 no-bullets">
								<li>
									<div class="media teaser media-icon-teaser">
										<div class="media-left media-middle">
											<div class="teaser_icon size_normal"> <i class="qtyler-phone highlight2"></i> </div>
										</div>
										<div class="media-body media-middle">
											<h3>Telefon</h3>
											<p><?=$telefon1?></p>
										</div>
									</div>
								</li>
								<li>
									<div class="media teaser media-icon-teaser">
										<div class="media-left media-middle">
											<div class="teaser_icon size_normal"> <i class="qtyler-envelope highlight3"></i> </div>
										</div>
										<div class="media-body media-middle">
											<h3>Email</h3>
											<p><a href="mailto:<?=$email1?>" class="__cf_email__" data-cfemail="304144495c5542705548515d405c551e535f5d"><?=$email1?></a></p>
										</div>
									</div>
								</li>
								<li>
									<div class="media teaser media-icon-teaser">
										<div class="media-left media-middle">
											<div class="teaser_icon size_normal"> <i class="qtyler-map-marker highlight"></i> </div>
										</div>
										<div class="media-body media-middle">
											<h3>Adres</h3>
											<p><?=$adres1?></p>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>