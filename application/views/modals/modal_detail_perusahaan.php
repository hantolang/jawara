<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-bank"></i> Detail Calon Perusahaan yang akan mendaftar</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nomor Telpon</th>
            <th>Tanggal Formulir</th>
            <th>Nomor Telpon</th>
            <th>Nama Petugas Perusahaan</th>
            <th>Nama Perusahaan</th>
            <th>Wilayah</th>
            <th>Jumlah TK</th>
            <th>Program</th>
            <th>Upah</th>
            <th>Jumlah Iuran</th>
            <th>PIC</th>
            
          </tr>
        </thead>
        <tbody id="data-perusahaan">
         
              <tr>
               <td><?php echo $dataPerusahaan->noformulir; ?></td>
                <td><?php echo $dataPerusahaan->tglformulir; ?></td>
                  <td><?php echo $dataPerusahaan->notelp; ?></td>
                   <td><?php echo $dataPerusahaan->nama; ?></td>
                    <td><?php echo $dataPerusahaan->perusahaan; ?></td>
                     <td><?php echo $dataPerusahaan->wilayah; ?></td>
                      <td><?php echo $dataPerusahaan->tk; ?></td>
                        <td><?php echo $dataPerusahaan->program; ?></td>
                        <td><?php echo $dataPerusahaan->upah; ?></td>
                         <td><?php echo $dataPerusahaan->hitung; ?></td>
                          <td><?php echo $dataPerusahaan->id_pic; ?></td>
               
              </tr>
            
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>