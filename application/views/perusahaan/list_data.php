<?php
  $no = 1;
  foreach ($dataPerusahaan as $perusahaan) {
    ?>
    <tr>
      <td width = "1%"><?php echo $no; ?></td>
      <td><?php echo $perusahaan->perusahaan; ?></td>
       <td><?php echo $perusahaan->nama; ?></td>
        <td><?php echo $perusahaan->notelp; ?></td>
         <td><?php echo $perusahaan->wilayah; ?></td>
         <td><?php echo $perusahaan->id_pic; ?></td>



      <td class="text-center" style="min-width:230px;">

        <button class="btn btn-warning update-dataPerusahaan" data-id="<?php echo $perusahaan->id; ?>"><i class="glyphicon glyphicon-pencil"></i></button>

        <button class="btn btn-danger konfirmasiHapus-perusahaan" data-id="<?php echo $perusahaan->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
        
        <button class="btn btn-info detail-dataPerusahaan" data-id="<?php echo $perusahaan->id; ?>"><i class="glyphicon glyphicon-info-sign"></i></button>

      </td>
    </tr>
    <?php
    $no++;
  }
?>
