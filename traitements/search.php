<?php

    if (!empty($_GET["searchbtn"]) AND isset($_GET["searchbtn"])) {

        
        
        $notempty = !empty($_GET["name"]) AND !empty($_GET["searchsel"]);
        $isset = isset($_GET["name"]) AND isset($_GET["searchsel"]);

        if ($notempty AND $isset) {

            $type = htmlspecialchars(trim($_GET["searchsel"]));
            $name = htmlspecialchars(trim($_GET["name"]));

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

            if (htmlspecialchars(trim($_GET["searchsel"])) == "commune") {

                $nb = $conn->prepare("SELECT COUNT(*) FROM fokontany WHERE commune = ?");
                $nb->execute(array($_GET["name"]));
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
                    $stmt = $conn->prepare("SELECT id, name, commune FROM fokontany WHERE commune = ? ORDER BY name ASC LIMIT $start, $limit");
                    $stmt->execute(array($_GET["name"]));

                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

            } else if (htmlspecialchars(trim($_GET["searchsel"])) == "village") {

                $nb = $conn->prepare("SELECT COUNT(*) FROM fokontany WHERE name = ?");
                $nb->execute(array($_GET["name"]));
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
                    $stmt = $conn->prepare("SELECT id, name, commune FROM fokontany WHERE name = ? ORDER BY name ASC LIMIT $start, $limit");
                    $stmt->execute(array($_GET["name"]));

                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

            }
            
            $conn = null;
            echo "</table>";

            ?> 
            
            <div>
                

                    <ul class="pagination pagination-sm">
                        <li class="page-item" class="page-item disabled">
                            <a class="page-link" href="index.php?searchSel=<?=htmlspecialchars(trim($_GET["searchsel"]))?>&name=<?=$_GET["name"]?>&page=<?=$previous?>">&laquo;</a>
                        </li>

                        <?php for ($i=1; $i <= $pages; $i++) : ?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?searchSel=<?=htmlspecialchars(trim($_GET["searchsel"]))?>&name=<?=$_GET["name"]?>&page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        
                        <li class="page-item">
                            <a class="page-link" href="index.php?searchSel=<?=htmlspecialchars(trim($_GET["searchsel"]))?>&name=<?=$_GET["name"]?>&page=<?=$next?>">&raquo;</a>
                        </li>
                    </ul>

                
            </div>
            
            <?php

        } 
        

    } else {
        
        include "affichage.php";

    }

?>