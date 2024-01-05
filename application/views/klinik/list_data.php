<?php
$no = 1;
foreach ($dataKlinik as $klinik) {
?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $klinik->nama; ?></td>
    <td class="text-center" style="min-width:230px;">
      <button class="btn btn-warning update-dataKlinik" data-id="<?php echo $klinik->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
      <button class="btn btn-danger konfirmasiHapus-klinik" data-id="<?php echo $klinik->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      <button class="btn btn-info detail-dataKlinik" data-id="<?php echo $klinik->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
    </td>
  </tr>
<?php
  $no++;
}
?>