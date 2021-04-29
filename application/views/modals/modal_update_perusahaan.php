<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Perusahaan</h3>

  <form id="form-update-perusahaan" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataPerusahaan->id; ?>">

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
       <b>No Formulir</b>
      </span>
      <input type="text" class="form-control" placeholder="No Form" name="noformulir" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->noformulir; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Tanggal Formulir</b>
      </span>
      <input type="date" class="form-control" placeholder="Tanggal Form" name="tglformulir" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->tglformulir; ?>">
    </div>


    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>No telpon</b>
      </span>
      <input type="text" class="form-control" placeholder="No Telpon" name="notelp" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->notelp; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Nama Petugas Perusahaan</b>
      </span>
      <input type="text" class="form-control" placeholder="Nama Petugas Perusahaan" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->nama; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Nama Perusahaan</b>
      </span>
      <input type="text" class="form-control" placeholder="Nama Perusahaan" name="perusahaan" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->perusahaan; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <b>Wilayah</b>
      </span>
      </span>
      <input type="text" class="form-control" placeholder="Wilayah" name="wilayah" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->wilayah; ?>">
    </div>

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
          <b>Jumlah TK</b>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah TK" name="tk" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->tk; ?>">

      <span class="input-group-addon" id="sizing-addon2">
          <b>Jumlah Program</b>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Program" name="program" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->program; ?>">
    </div>

    <div class="input-group form-group">
      
      <span class="input-group-addon" id="sizing-addon2">
          <b>Upah</b>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Upah" name="upah" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->upah; ?>">
    </div>

     <div class="input-group form-group">
      
      <span class="input-group-addon" id="sizing-addon2">
          <b>Jumlah Iuran Awal</b>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Iuran" name="hitung" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->hitung; ?>">
    </div>

    <div class="input-group form-group">
      
      <span class="input-group-addon" id="sizing-addon2">
          <b>PIC</b>
      </span>
      <input type="text" class="form-control" placeholder="PIC" name="id_pic" aria-describedby="sizing-addon2" value="<?php echo $dataPerusahaan->id_pic; ?>">
    </div>
    

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>