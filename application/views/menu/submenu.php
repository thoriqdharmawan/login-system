        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="row">
              <div class="col-lg">
                  <?php if(validation_errors()): ?>
                    <div class="alert alert-danger " role="alert">
                        <?= validation_errors(); ?>
                    </div>
                  <?php endif; ?>
                    <?=  form_error('menu', '<div class="alert alert-danger " role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message'); ?>

                  <a class="btn btn-primary mb-3" href="" data-toggle="modal" data-target="#newSubmenuModal">Add new submenu</a>
                 
              <table class="table table-hover">
                  <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($submenu as $sm): ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td><?= $sm['icon']; ?></td>
                        <td><?= $sm['is_active']; ?></td>
                        <td>
                            <a class="badge badge-success" href="<?= base_url('menu/editsubmenu/').$sm['id']; ?>" >edit</a> | 
                            <a class="badge badge-danger" href="<?= base_url('menu/deletesubmenu/').$sm['id']; ?>">delete</a>
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
<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu/submenu') ?>" method="post">

            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
            </div>

            <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="">Select Menu</option>
                    <?php foreach($menu as $m): ?>
                        
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>

                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
            </div>

            <div class="form-grup">
                <div class="form-check">
                    <input name="is_active" class="form-check-input" type="checkbox" value="1" id="is_active" checked>
                    <label class="form-check-label" for="is_active">
                        Active?
                    </label>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </div>
        </form>
    </div>
  </div>
</div>

