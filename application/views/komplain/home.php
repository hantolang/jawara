<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box box-solid box-basic">
  <div class="box-header">
    
    <div class="col-md-1">
        <a href="<?php echo base_url('komplain/export'); ?>" class="form-control btn btn-success"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export </a>
    </div>
   
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Komplain</th>
          <th>Kantor Cabang</th>
          <th>Nomor Telpon</th>
          <th>Nama Peserta</th>
          <th>Jenis</th>
          <th>Petugas TL</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-komplain">
		
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_komplain; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPerusahaan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'komplain';
  $data['url'] = 'komplain/import';
  echo show_my_modal('modals/modal_import', 'import-komplain', $data);
?>