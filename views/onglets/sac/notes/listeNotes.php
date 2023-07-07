
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href='../../../../assets/main/fontawesome-free/css/all.min.css'>
<!-- DataTables -->
<link rel="stylesheet" href="../../../../assets/sac/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../../../assets/sac/css/responsive.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../../../assets/main/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="" style="">
    <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12 mt-5">
                        <p>
                            Notes de <b>
                                <?php
                                    switch ($user['account_type']){
                                        case 'etudiant':
                                            echo $user['first_name'].' '.$user['last_name']
                                            .' ('.$user['level'].' '.$user['parcours'].')';
                                            break;
                                        case 'enseignant':
                                            echo $module['name'].' '.$module['module_id']
                                            .' ('.$user['first_name'].' '.$user['last_name'].')
                                            <a href="/sac/notes/add/?id='.$user['id'].'&module_id='.$module['module_id'].'">
                                                <input type="button" class="float-right btn btn-primary" value="Ajouter Une Note" />
                                            </a>
                                            ';
                                            break;
                                    }
                                ?>
                            </b>
                        </p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Toutes les notes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <?php
                                            switch ($user['account_type']){
                                                case 'etudiant':
                                                    ?>
                                                    <tr>
                                                        <th>Code Module</th>
                                                        <th>Nom Module</th>
                                                        <th>Niveau</th>
                                                        <th>Note Obtenue</th>
                                                        <th>Sur</th>
                                                    </tr>
                                                    <?php
                                                    break;
                                                case 'enseignant':
                                                    ?>
                                                    <tr>
                                                        <th>Matricule Etudiant</th>
                                                        <th>Nom Etudiant</th>
                                                        <th>Niveau</th>
                                                        <th>Note Obtenue</th>
                                                        <th>Sur</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    <?php
                                                    break;
                                            }
                                        ?>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($notes as $note) {
                                            switch ($user['account_type']) {
                                                case 'etudiant':
                                                    echo '<tr>
                                                                <td>' . $note['module_id'] . '</td>
                                                                <td>' . $note['name'] . '</td>
                                                                <td>' . $note['level'] . '</td>';
                                                    break;
                                                case 'enseignant':
                                                    echo '<tr>
                                                                <td>' . $note['user_id'] . '</td>
                                                                <td>' . $note['first_name'] .' '.$note['last_name'].'</td>
                                                                <td>' . $note['level'] . '</td>';
                                                    break;
                                            }
                                            if($note['note'] < ($note['note_max']/2))
                                                echo '<td class="bg-danger">'.$note['note'].'</td>';
                                            else if($note['note'] >= ($note['note_max']/2))
                                                echo '<td class="bg-success">'.$note['note'].'</td>';
                                            else if($note['note'] == null)
                                                echo '<td class="bg-primary">'.$note['note'].'</td>';

                                            echo '<td>'.$note['note_max'].'</td>';


                                            // afichage des action si enseignant as icon
                                            switch ($user['account_type']){
                                                case 'enseignant':
                                                    echo '<td style="width:15px;justify-content:center">
                                                                <a href="/sac/notes/update/?note_id='.$note['id'].'&enseignant_id='.$user['id'].'&module_id='.$module['module_id'].'">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <i id="'.$note['id'].'"  class="fas fa-trash-alt cursor-pointer text-danger delete-note"></i>
                                                            </td>';
                                                    break;
                                            }

                                            echo '</tr>';
                                        }
                                    ?>

                                    <tr>
                                        <th>Code Module</th>
                                        <th>Nom Module</th>
                                        <th>Niveau</th>
                                        <th>Note Obtenue</th>
                                        <th>Sur</th>
                                        <?php
                                            switch ($user['account_type']){
                                                case 'enseignant':
                                                    echo '<th>Actions</th>';
                                                    break;
                                            }
                                        ?>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2023 <a href="/about">Esekoly</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

<!-- jQuery -->
<script src="../../../../assets/sac/notes/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../../assets/sac/notes/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../../../assets/sac/notes/js/jquery.dataTables.min.js"></script>
<script src="../../../../assets/sac/notes/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../../assets/sac/notes/js/dataTables.responsive.min.js"></script>
<script src="../../../../assets/sac/notes/js/main.js"></script>

<script>

    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>