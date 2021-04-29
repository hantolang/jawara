<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-bank"></i> Detail Komplain dari Kantor Cabang</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID Komplain</th>
            <th>Tanggal Komplain</th>
            <th>Kantor Cabang</th>
            <th>Nomor HP</th>
            <th>Nama Peserta</th>
            <th>Nomor e-KTP</th>
            <th>Jenis Komplain</th>
            <th>Isi Komplain</th>
            <th>Hasil Tindak Lanjut</th>
            <th>PIC Tindak Lanjut</th>
            
            
          </tr>
        </thead>
        <tbody id="data-komplain">
         
              <tr>
                <td><?php echo $dataKomplain->id; ?></td>
                <td><?php echo $dataKomplain->waktu; ?></td>
                <td><?php echo $dataKomplain->cabang;?></td>
                <td><?php echo $dataKomplain->no_hp; ?></td>
                <td><?php echo $dataKomplain->nama; ?></td>
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