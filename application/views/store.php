<div class="block-header">
<h1 class="align-center">Store</h1>
</div>
  <div class="row clearfix">
      
  <?php foreach($tampil_motor as $tb):?>
<div class="col-lg-4 col-md-4 col-sm-8 col-xs-8">
    <div class="card">
          
        <div class="header">
              <center><h2 style="color:black!important;"><?=$tb->nama_motor?></h2></center><br>
            <?php
                $notifikasi = $this->session->flashdata('notif');
                if($notifikasi != null){
                    echo '<div class="alert alert-danger">'.$notifikasi.'</div>';
                }
            ?>
             
        </div>
                      			<div class="white-header" style="color:black!important;background-color:orange !important;font-weight:bold!important;">
						  			
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
									</div>
									
	                      		</div>
	                      		<div class="centered">
										<img src="<?=base_url('assets/img/')?><?=$tb->foto_cover?>" style="margin-left:10px"width="288" height="180">
                                  </div>
                                  
								  <div class="white-header" style="height:auto;margin-top:30px;color:black!important;">
								  <button class="hover"style="width:100%;border-radius:20px;border:none;background-color: #15A5BF;"><h3 style=color:#373C3A;><?="Rp. ".number_format($tb->harga,0,",",".")?></h3></button>
                      			</div>
                      		</div>
							
                      	</div>
		<?php endforeach ?>
</div>   	