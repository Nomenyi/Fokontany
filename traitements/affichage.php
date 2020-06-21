<?php
echo '<table id="resultat" class="table table-hover">';
  echo '<thead style="color: white;">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Village</th>
                <th scope="col">Commune</th>
            </tr>
        </thead>';

class TableRows extends RecursiveIteratorIterator {
     function __construct($it) {
         parent::__construct($it, self::LEAVES_ONLY);
     }

     function current() {
         return "<td class='table-light'>" . parent::current(). "</td>";
     }

     function beginChildren() {
         echo "<tr>";
     }

     function endChildren() {
         echo "</tr>" . "\n";
     }
}

$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$nb = $conn->prepare("SELECT COUNT(*) FROM fokontany");
$nb->execute();
$nbb = $nb->fetch();

$nbr = $nbb[0];
$pages = ceil($nbr / $limit);

if ($page == 1) {
    $previous = $page;
} else{
    $previous = $page - 1;
}

if ($page == $pages) {
    $next = $page;
} else{
    $next = $page + 1;
}

try {
     $stmt = $conn->prepare("SELECT id, name, commune FROM fokontany ORDER BY name ASC LIMIT $start, $limit");
     $stmt->execute();

     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
         echo $v;
     }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>  

<div>
    <ul class="pagination pagination-sm">
        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=<?=$previous?>">&laquo;</a>
        </li>

        <li class="page-item" class="page-item disabled">
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
        </li>

        <?php for ($i=5; $i <= ($pages/100); $i++) : ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=1734">1734</a>
        </li>

        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=1735">1735</a>
        </li>

        <li class="page-item" class="page-item disabled">
            <a class="page-link" href="index.php?page=1736">1736</a>
        </li>
        
        <li class="page-item">
            <a class="page-link" href="index.php?page=<?=$next?>">&raquo;</a>
        </li>
    </ul>
</div>