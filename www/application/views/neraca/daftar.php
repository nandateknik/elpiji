<?php $this->load->view('layouts/menu');?>
<link href="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DataTangki</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Neraca LPG</li>
            </ol>
          </div>
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Neraca LPG</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Tanggal</th>
                        <th>Tangki Awal</th>
                        <th>Isi Tangki</th>
                        <th>Tangki Lo</th>
                        <th>Tangki Akhir</th>
                        <th>Isi Akhir</th>
                        <th>Gain</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($neraca as $list):?>
                            <tr>
                                <td><?=$list->tanggal?></td>
                                <td><?=number_format($list->tangki_awal)?></td>
                                <td><?=number_format($list->tangki_isi)?></td>
                                <td><?=number_format($list->tangki_lo)?></td>
                                <td><?=number_format($list->tangki_akhir)?></td>
                                <td><?=number_format($list->isi_akhir)?></td>
                                <td><?=number_format($list->gain)?></td>
                                <td>
                                  <a class="badge badge-warning" href="<?=site_url('neraca/edit/').$list->id?>"><i class="fa fa-pen"></i> Edit</a>
                                  <a class="badge badge-danger" onclick="hapus(<?=$list->id?>)" href="javascript:void(0);"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          </div>
<?php $this->load->view('layouts/copyright');?>

<script>
  function hapus(id) {
    Swal.fire({
      title: 'Apa Kamu Yakin?',
      text: "Data yang dihapus tidak bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "<?=site_url('neraca/delete/')?>"+id+"";
      }
    })
  }
</script>