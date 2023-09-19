<?php
require_once 'secure.php';

$size = 10;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);

} else {
    $page = 1;
}
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
} else {
    $id = 1;
}
$test = 123;
$studentMap = new StudentMap();
$count = $studentMap->count();
$student = $studentMap->findStudentsFromGroup($id, $page * $size - $size, $size);
$header = 'Список студентов';
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1>Список студентов</h1>
                <ol class="breadcrumb">
                    <li><a href="/index.php"><i class="fa
fa-dashboard"></i> Главная</a></li>
                    <li class="active">Список
                        студентов</li>
                </ol>
            </section>

            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if ($student) {
                    ?>

                    <table id="example2" class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>Ф.И.О</th>
                                <th>Выберите предмет</th>
                                <th>Дата рождения</th>
                                <th>Группа</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($student as $student) {
                                echo '<tr>';
                                echo '<td><a href="profile-student.php?id=' . $student->user_id . '">' . $student->fio . '</a></td>';
                                echo '<td><select class="form-control" name="gruppa_id">' . Helper::printSelectOptions($student->gruppa_id, (new GruppaMap())->arrGruppas()) . '</select></td>';
                                echo '<td>' . $student->birthday . '</td>';
                                echo '<td>' . $student->gruppa . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo 'Ни одного студента не найдено';
                } ?>
            </div>
            <div class="box-body">
                <?php Helper::paginator($count, $page, $size); ?>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>