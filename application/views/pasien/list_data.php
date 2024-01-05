<?php
foreach ($dataPasien as $pasien) {
?>
  <tr>
    <td style="min-width:230px;"><?php echo $pasien->pasien; ?></td>
    <td><?php echo $pasien->telp; ?></td>
    <td><?php echo $pasien->kota; ?></td>
    <td><?php echo $pasien->kelamin; ?></td>
    <td><?php echo $pasien->klinik; ?></td>
    <td class="text-center" style="min-width:230px;">
      <button class="btn btn-warning update-dataPasien" data-id="<?php echo $pasien->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
      <button class="btn btn-danger konfirmasiHapus-pasien" data-id="<?php echo $pasien->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
    </td>
  </tr>
<?php
}
?>