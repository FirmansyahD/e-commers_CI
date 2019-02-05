
  <div class="block-header">

</div>
  <div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
          
        <div class="header">
              <center><h1>Motor</h1></center><br>
            <?php
                $notifikasi = $this->session->flashdata('notif');
                if($notifikasi != null){
                    echo '<div class="alert alert-danger">'.$notifikasi.'</div>';
                }
            ?>
             <a href="#tambah" data-toggle="modal" class="btn btn-block bg-light-blue waves-effect">+Tambah</a>
        </div>
        
        <div class="body table-responsive">
 

<table id="example" class="table table-hover table-striped">
  <thead>
    <tr class="align-center">
      <td>No</td>
      <td>Foto</td>
      <td>nama motor</td>
      <td>tahun keluaran</td>
      <td>Kategori</td>
      <td>Harga</td>
      <td>Made in</td>
      <td>Stok</td>
      <td>Aksi</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($data_motor as $motor):
    $no++; ?>
    <tr class="align-center">
      <td><?= $no ?></td>
      <td><img src="<?=base_url('assets/img/'.$motor->foto_cover )?>" style="width: 40px"></td>
      <td><?= $motor->nama_motor ?></td>
      <td><?= $motor->tahun_keluaran ?></td>
      <td><?= $motor->nama_kategori ?></td>
      <td><?= $motor->harga ?></td>
      <td><?= $motor->made_in ?></td>
      
      <td><?= $motor->stok ?></td>
      <td><a href="#edit" onclick="edit('<?= $motor->id_motor ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
        <a href="<?=base_url('index.php/motor/hapus/'.$motor->id_motor)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Tambah motor</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/motor/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td><input type="hidden" name="id_motor" class="form-control"></td>
            </tr>
            <tr>
              <td>nama motor</td>
              <td><input type="text" name="nama_motor" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori"selected >
                
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Tahun Keluaran</td>
              <td><input type="number" name="tahun_keluaran" required class="form-control"></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required class="form-control"></td>
            </tr>
            <tr>
              <td>made_in</td>
              <td><input type="text" name="made_in" required class="form-control"></td>
            </tr>
             <td>Stok</td>
              <td><input type="number" name="stok" required class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="create" value="Simpan" class="btn btn-block btn-success">
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Edit motor</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/motor/motor_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_motor_lama" id="id_motor_lama">
          <table>
            <tr>
              <td><input type="hidden" name="id_motor" id="id_motor" class="form-control"></td>
            </tr>
            <tr>
              <td>nama motor</td>
              <td><input type="text" name="nama_motor" id="nama_motor" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="" id="id_kategori"selected>
                
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>tahun keluaran</td>
              <td><input type="number" name="tahun_keluaran" required id="tahun_keluaran" class="form-control"></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
            </tr>
            <tr>
              <td>made_in</td>
              <td><input type="text" name="made_in" required id="made_in" class="form-control"></td>
            </tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required id="stok" class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" id="foto_cover" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="edit" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function edit(a){
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/motor/edit_motor/"+a,
      dataType:"json",
      success:function(data){
        $("#id_motor").val(data.id_motor);
        $("#nama_motor").val(data.nama_motor);
        $("#tahun_keluaran").val(data.tahun_keluaran);
        $("#id_kategori").val(data.id_kategori);
        $("#harga").val(data.harga);
        $("#made_in").val(data.made_in);
        
        $("#stok").val(data.stok);
        $("#id_motor_lama").val(data.id_motor);
      }
    })
  }
</script>