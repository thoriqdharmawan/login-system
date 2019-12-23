        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
         
          <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Tanggal daftar</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
            <?php foreach($semuauser as $u): ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $u['name']; ?></td>
                <td><?= $u['email']; ?></td>
                <td><?= date('d-M-Y',$u['date_created']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
