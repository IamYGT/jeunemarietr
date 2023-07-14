<?php
if($_GET['sil']){
    
   	$idd=$_GET['sil'];
	 
	 $resim_sorgu=$db->query("select * from haberler where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	 unlink('../../resimler/'.$resim_sorgu['resim']);
	$simdi=$db->query("delete from haberler where id='$idd'")->fetch(PDO::FETCH_ASSOC);
    
}
?>
<br><br>
<a href="haber-ekle" class="btn btn-outline-secondary px-5"><i class="bx bx-plus mr-1"></i>Haber Ekle</a>
<br><br>
	<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Haber Adı</th>
										<th>Haber Resmi</th>
									
										<th>Haber Etiketi</th>
										<th>Haber Linki</th>
										<th>Eklenme Tarihi </th>
										<th>İşlem</th>
									</tr>
								</thead>
								<tbody>
								    <?php foreach($habercek as $urun){?>
									<tr>
										<td><?=$urun['adi']?></td>
										<td><a data-fancybox="gallery" href="../resimler/<?=$urun['resim']?>"><img src="../resimler/<?=$urun['resim']?>" width="100"></a></td>
								
										<td><?=$urun['etiket']?></td>
										<td><?=$urun['linki']?></td>
										<td><?=$urun['tarih']?></td>
										<td><div class="dropdown">
											<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">İşlem Seç</button>
											<ul class="dropdown-menu" style="">
												<li><a class="dropdown-item" href="haber-ekle?islem=duzenle&id=<?=$urun['id']?>">Düzenle</a>
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