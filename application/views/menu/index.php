        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="row">
              <div class="col-lg-6">
                    <?=  form_error('menu', '<div class="alert alert-danger " role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message'); ?>

                  <a class="btn btn-primary mb-3" href="" data-toggle="modal" data-target="#newMenuModal">Add new menu</a>
                 
              <table class="table table-hover">
                  <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($menu as $m): ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td>
                            <a class="badge badge-success" href="<?= base_url('menu/edit/').$m['id']; ?>">edit</a> | 
                            <a class="badge badge-danger" href="<?= base_url('menu/delete/').$m['id']; ?>">delete</a>
                        </td>
                    </tr>
                     <?php endforeach; ?>
                </tbody>
                </table>
              </div>
          </div>
         
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



      <!-- MODAL -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu') ?>" method="post">

            <div class="form-group">
                <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
  </div>
</div>