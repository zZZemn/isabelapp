<?php
include("components/header.php");
?>

<h4 class="page-title"><i class="bi bi-egg-fried"></i> Restaurant</h4>
<div class="container mt-4 table-container">
    <table class="table table-striped">
        <thead class="table-header">
            <tr>
                <th>#</th>
                <th>Restaurant</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php
            $count = 1;
            $getResto = $db->getResto();
            while ($resto = $getResto->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $resto['RESTO_NAME'] ?></td>
                    <td><?= $resto['ADDRESS'] ?></td>
                    <td> <button class="btn btn-dark btn-deactivate-resto" data-id="<?= $resto['RESTO_ID'] ?>"><i class="bi bi-lock-fill"></i> Deactivate</button> </td>
                </tr>
            <?php
                $count++;
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include("components/footer.php");
?>
<script>
    $(document).ready(function() {
        $('.nav-manage').addClass('nav-selected');
        $('.nav-resto').addClass('nav-selected');
    });
</script>