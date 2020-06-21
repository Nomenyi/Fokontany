<div>
    <ul class="pagination pagination-sm">
        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=<?=$previous?>">&laquo;</a>
        </li>

        <!-- <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=2">2</a>
        </li>

        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=3">3</a>
        </li>

        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=4">4</a>
        </li>

        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=200">...</a>
        </li> -->

        <?php for ($i=1; $i <= $pages; $i++) : ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <!-- <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=1734">1734</a>
        </li>

        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=1735">1735</a>
        </li>

        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=1736">1736</a>
        </li> -->
        
        <li class="page-item">
            <a class="page-link" href="index.php?page=<?=$next?>">&raquo;</a>
        </li>
    </ul>
</div>