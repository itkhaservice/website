<?php
    $conn = new mysqli('localhost', 'root', '');
    
    echo "--- Cau truc company_info.info ---
";
    $res1 = $conn->query("SHOW COLUMNS FROM company_info.info");
    if($res1) while($r = $res1->fetch_assoc()) echo $r['Field'] . " (" . $r['Type'] . ")\n";
    
    echo "\n--- Cau truc khaservice_db.table_setting ---
";
    $res2 = $conn->query("SHOW COLUMNS FROM khaservice_db.table_setting");
    if($res2) while($r = $res2->fetch_assoc()) echo $r['Field'] . " (" . $r['Type'] . ")\n";
?>
