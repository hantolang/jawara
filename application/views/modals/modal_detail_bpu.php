<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-bank"></i> Detail Potensi BPU dari Kantor Cabang</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID Potensi</th>
            <th>Tanggal Pengajuan</th>
            <th>Nama Calon Peserta</th>
            <th>Nomor e-KTP</th>
            <th>Jenis Usaha</th>
            <th>Alamat Kab/Kota</th>
            <th>Jumlah Program</th>
            <th>No HP</th>
            <th>PIC Tindak Lanjut</th>
            
            
          </tr>
        </thead>
        <tbody id="data-bpu">
         
              <tr>
                <td><?php echo $dataBpu->id; ?></td>
                <td><?php echo $dataBpu->waktu; ?></td>
                <td><?php echo $dataBpu->cabang;?></td>
                <td><?php echo $dataBpu->nama; ?></td>
                <td><?php echo $dataBpu->nama; ?></td>
                <td><?php echo $dataKomplain->nik; ?></td>
                <td><?php echo $dataKomplain->jenis; ?></td>
                <td><?php echo $dataKomplain->keluhan; ?></td>
                <td><?php echo $dataKomplain->tl; ?></td>
                <td><?php echo $dataKomplain->p_pickup; ?></td>
                              
              </tr>
            
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>