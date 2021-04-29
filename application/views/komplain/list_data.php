<?php
  $no = 1;
  foreach ($dataKomplain as $komplain) {
    ?>
    <tr>
      <td width = "1%"><?php echo $no; ?></td>
      <td><?php echo $komplain->waktu; ?></td>
       <td><?php echo $komplain->cabang; ?></td>
        <td><?php echo $komplain->no_hp; ?></td>
         <td><?php echo $komplain->nama; ?></td>
         <td><?php echo $komplain->jenis; ?></td>
         <td><?php echo $komplain->p_pickup; ?></td>



      <td class="text-center" style="min-width:230px;">

        <button class="btn btn-warning update-dataKomplain" data-id="<?php echo $komplain->id; ?>"><i class="glyphicon glyphicon-search"></i></button>

        <button class="btn btn-danger konfirmasiHapus-komplain" data-id="<?php echo $komplain->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>
