<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Komplain</h3>

  <form id="form-update-komplain" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataKomplain->id; ?>">

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
       <b>Waktu Pengajuan</b>
      </span>
      <input type="text" class="form-control" placeholder="waktu" name="waktu" aria-describedby="sizing-addon2" value="<?php echo $dataKomplain->waktu; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Kantor Cabang</b>
      </span>
      <input type="text" class="form-control" placeholder="Kantor Cabang" name="cabang" aria-describedby="sizing-addon2" value="<?php echo $dataKomplain->cabang; ?>">
    </div>


    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Nomor HP</b>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Hp" name="no_hp" aria-describedby="sizing-addon2" value="<?php echo $dataKomplain->no_hp; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Nama Peserta</b>
      </span>
      <input type="text" class="form-control" placeholder="Nama Peserta" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataKomplain->nama; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Nomor e-KTP</b>
      </span>
      <input type="text" class="form-control" placeholder="Nomor e-KTP" name="nik" aria-describedby="sizing-addon2" value="<?php echo $dataKomplain->nik; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Jenis Komplain</b>
      </span>
      <input type="text" class="form-control" placeholder="Jenis Komplain" name="jenis" aria-describedby="sizing-addon2" value="<?php echo $dataKomplain->jenis; ?>">
    </div>
     
     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
          <b>Isi Keluhan</b>
      </span>
      <textarea class="form-control" placeholder="Isi Keluhan" name="keluhan" aria-describedby="sizing-addon2"><?php echo $dataKomplain->keluhan; ?></textarea> 
      </div>

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
          <b>Hasil Tindak Lanjut</b>
      </span>
      <textarea type="text" class="form-control" placeholder="Hasil TL" name="tl" aria-describedby="sizing-addon2"><?php echo $dataKomplain->tl; ?></textarea>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
          <b>PIC Tindak Lanjut</b>
      </span>
      <input type="text" class="form-control" placeholder="PIC TL" name="p_pickup" aria-describedby="sizing-addon2" value="<?php echo $dataKomplain->p_pickup; ?>">
    </div>

     
    <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
    </div>
  </form>
</div>