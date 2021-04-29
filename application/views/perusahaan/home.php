<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box box-solid box-basic">
  <div class="box-header">
    <div class="col-sm-3 ">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-perusahaan"><i class="fa  fa-plus"></i> Tambah Data  Manual</button>
    </div>
    <div class="col-md-5">
    </div>
     <div class="col-md-1">
      <!--   <button class="form-control btn btn-success" data-toggle="modal" data-target="#import-perusahaan"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button> -->
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('perusahaan/export'); ?>" class="form-control btn btn-success"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
   
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Perusahaan</th>
          <th>Nama Petugas Perusahaan</th>
          <th>Nomor Telpon</th>
          <th>Wilayah</th>
          <th>PIC</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-perusahaan">
		
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_perusahaan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPerusahaan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'perusahaan';
  $data['url'] = 'perusahaan/import';
  echo show_my_modal('modals/modal_import', 'import-perusahaan', $data);
?>