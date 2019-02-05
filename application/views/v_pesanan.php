
  <div class="block-header">

</div>
  <div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
          
        <div class="header">
              <center><h1>History Pesanan</h1></center><br>
            <?php
                $notifikasi = $this->session->flashdata('notif');
                if($notifikasi != null){
                    echo '<div class="alert alert-danger">'.$notifikasi.'</div>';
                }
            ?>
             
        </div>
        
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No</td>
			<td>No. Nota</td>
			<td>Nama Pembeli</td>
			<td>Tanggal Beli</td>
			<td>Grand Total</td>
			<!-- <td>Detail</td> -->
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach($tampil_pesanan as $psn):
		$no++; ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $psn->id_nota ?></td>
			<td><?= $psn->nama_pembeli ?></td>
			<td><?= $psn->tgl?></td>
			<td><?= $psn->grandtotal?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<div class="modal-footer">
      </div>
    </div>
  </div>
</div>