<?php
if($_GET['sil']){
    
   	$idd=$_GET['sil'];
	 
	 $resim_sorgu=$db->query("select * from hizmet_kategori where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	 unlink('../../resimler/'.$resim_sorgu['resim']);
	$simdi=$db->query("delete from hizmet_kategori where id='$idd'")->fetch(PDO::FETCH_ASSOC);
    
}
?>
<br><br>
<a href="hizmet-kategori-ekle" class="btn btn-outline-secondary px-5"><i class="bx bx-plus mr-1"></i>Hizmet Kategori Ekle</a>
<br><br>
	<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Hizmet Kategori Adı</th>
										<th>Hizmet Kategori Resmi</th>
										
										<th>Hizmet Kategori Etiketi</th>
										<th>Hizmet Kategori Linki</th>
										<th>Eklenme Tarihi </th>
										<th>İşlem</th>
									</tr>
								</thead>
								<tbody>
								    <?php foreach($hizmetkategoricek as $urun){?>
									<tr>
										<td><?=$urun['adi']?></td>
										<td><a data-fancybox="gallery" href="../resimler/<?=$urun['resim']?>"><img src="../resimler/<?=$urun['resim']?>" width="100"></a></td>
								
										<td><?=$urun['etiket']?></td>
											<td><?=$urun['linki']?></td>
										<td><?=$urun['tarih']?></td>
										<td><div class="dropdown">
											<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">İşlem Seç</button>
											<ul class="dropdown-menu" style="">
												<li><a class="dropdown-item" href="hizmet-kategori-ekle?islem=duzenle&id=<?=$urun['id']?>">Düzenle</a>
												</li>
												<li><a class="dropdown-item" href="?sil=<?=$urun['id']?>">Sil</a>
												</li>
											
											</ul>
										</div></td>
									</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>