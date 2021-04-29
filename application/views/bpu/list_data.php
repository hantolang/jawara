<?php
  $no = 1;
  foreach ($dataBpu as $bpu) {
    ?>
    <tr>
      <td width = "1%"><?php echo $no; ?></td>
      <td><?php echo $bpu->waktu; ?></td>
       <td><?php echo $bpu->kab; ?></td>
        <td><?php echo $bpu->no_hp; ?></td>
         <td><?php echo $bpu->nama; ?></td>
         <td><?php echo $bpu->usaha; ?></td>
         <td><?php echo $bpu->p_pickup; ?></td>



      <td class="text-center" style="min-width:230px;">

        <button class="btn btn-warning update-dataBpu" data-id="<?php echo $bpu->id; ?>"><i class="glyphicon glyphicon-search"></i></button>

        <button class="btn btn-danger konfirmasiHapus-Bpu" data-id="<?php echo $bpu->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>
