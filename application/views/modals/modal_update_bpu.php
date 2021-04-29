<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Detail Data Potensi BPU</h3>

  <form id="form-update-komplain" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataBpu->id; ?>">

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
       <b>Waktu Pengajuan</b>
      </span>
      <input type="text" class="form-control" placeholder="waktu" name="waktu" aria-describedby="sizing-addon2" value="<?php echo $dataBpu->waktu; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Nama Calon Peserta</b>
      </span>
      <input type="text" class="form-control" placeholder="Nama Peserta" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataBpu->nama; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Nomor e-KTP</b>
      </span>
      <input type="text" class="form-control" placeholder="NIK" name="nik" aria-describedby="sizing-addon2" value="<?php echo $dataBpu->nik; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Jenis Usaha</b>
      </span>
      <input type="text" class="form-control" placeholder="Usaha" name="usaha" aria-describedby="sizing-addon2" value="<?php echo $dataBpu->usaha; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Alamat Kab/kota</b>
      </span>
      <input type="text" class="form-control" placeholder="Kab/Kota" name="kab" aria-describedby="sizing-addon2" value="<?php echo $dataBpu->kab; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Jumlah Program</b>
      </span>
      <input type="text" class="form-control" placeholder="Jml program" name="prog" aria-describedby="sizing-addon2" value="<?php echo $dataBpu->prog; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>No HP</b>
      </span>
      <input type="text" class="form-control" placeholder="HP" name="no_hp" aria-describedby="sizing-addon2" value="<?php echo $dataBpu->no_hp; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
          <b>PIC Tindak Lanjut</b>
      </span>
      <input type="text" class="form-control" placeholder="PIC TL" name="p_pickup" aria-describedby="sizing-addon2" value="<?php echo $dataBpu->p_pickup; ?>">
    </div>

     
    <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
    </div>
  </form>
</div>