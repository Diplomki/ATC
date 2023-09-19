<?php
require_once 'secure.php';
$size = 99;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$gruppaMap = new GruppaMap();
$count = $gruppaMap->count();
$gruppas = $gruppaMap->findAll($page * $size - $size, $size);
$header = 'Список групп';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1>
        <?= $header; ?>
    </h1>
    <ol class="breadcrumb">

        <li><a href="/index.php"><i class="fa fa-
dashboard"></i> Главная</a></li>

        <li class="active">
            <?= $header; ?>
        </li>
    </ol>
</section>
<div class="box-body">
    <div class="box-body">
        <?php
        if ($gruppas) {
            ?>

            <table id="example2" class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Специальность</th>
                        <th>Дата образования</th>
                        <th>Дата окончания</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($gruppas as $gruppa) {
                        echo '<tr>';

                        echo '<td><a href="list-student-gruppa.php?id=' . $gruppa->gruppa_id . '">' . $gruppa->name . '</a> ';

                        echo '<td>' . $gruppa->special . '</td>';

                        echo '<td>' . date(
                            "d.m.Y",
                            strtotime($gruppa->date_begin)
                        ) . '</td>';
                        echo '<td>' . date(
                            "d.m.Y",
                            strtotime($gruppa->date_end)
                        ) . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        <?php } else {
            echo 'Ни одной группы не найдено';
        } ?>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>