
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
                        Note de <b>
                            <?=
                                    $module['name'].' '.$module['module_id']
                                    .' ('.$user['first_name'].' '.$user['last_name'].')
                                    <a href="/sac/notes">
                                        <input type="button" class="float-right btn btn-primary" value="Voir les notes" />
                                    </a>
                                    ';
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
                            <h3 class="card-title">Ajouter la note</h3>

                                <?php
                                if(isset($error)){
                                    echo '<p class="text-danger float-right">'.$error.'</p>';
                                }
                                else if(isset($success)){
                                    echo '<p class="text-success float-right">'.$success.'</p>';
                                }
                                ?>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= '/sac/notes/add/?id='.$module['enseignant_id'].'&module_id='.$module['module_id'] ?>" method="post">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Matricule Etudiant</th>
                                    <th>Note Obtenue</th>
                                    <th>Sur</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                                <input type="number" name="etudiant" class="form-control" placeholder="Matricule Etudiant" required>
                                        </td>
                                        <td>
                                                <input type="number" name="note_obtenue" class="form-control" placeholder="Note Obtenue" required>
                                        </td>
                                        <td>
                                                <input type="number" name="sur" class="form-control" placeholder="Sur" required>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <div class="row justify-content-center">
                                                <input type="submit" class="w-50 btn btn-success" value="Ajouter">
                                            </div>
                                            <div class="row justify-content-center mt-3">
                                                <a href="/sac/etudiant" class="text-center">
                                                    Voir la liste des étudiants
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            </form>
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
