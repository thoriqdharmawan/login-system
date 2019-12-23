        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
         <div class="col-lg-6">
          <form action="<?= base_url('menu/editsubmenu'); ?>" method="post">

            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" value="<?= $submenu['title']; ?>">
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
                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $submenu['url']; ?>">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= $submenu['icon']; ?>">
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
