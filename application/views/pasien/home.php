<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pasien"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>No Telp</th>
          <th>Asal kota</th>
          <th>Jenis Kelamin</th>
          <th>Klinik</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-pasien">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_pasien; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPasien', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
$data['judul'] = 'Pasien';
$data['url'] = 'Pasien/import';
echo show_my_modal('modals/modal_import', 'import-pasien', $data);
?>