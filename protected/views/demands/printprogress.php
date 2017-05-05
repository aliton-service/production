<script>
    function ready() {
        print();
    }

    document.addEventListener("DOMContentLoaded", ready);
</script>    
<h1>Ход работы по заявке №<?php echo $Demand_id ?></h1>
<?php
    if (count($Progress) > 0) {
        echo '<table style=\'border: 0; border-spacing: 0px 0px;\'>';
        echo '  <tbody>';
        
        echo '  <tr>';
        echo '      <td style=\'width: 100px; border: 1px solid black\'>Дата сообщения</td>';
        echo '      <td style=\'width: 150px; border: 1px solid black\'>Администрируюший</td>';
        echo '      <td style=\'width: 150px; border: 1px solid black\'>План. дата вып.</td>';
        echo '      <td style=\'width: 150px; border: 1px solid black\'>Дата вып.</td>';
        echo '      <td style=\'width: 250px; border: 1px solid black\'>Действие</td>';
        echo '      <td style=\'width: 150px; border: 1px solid black\'>Исполнители</td>';
        echo '      <td style=\'width: 150px; border: 1px solid black\'>№ Заявки</td>';
        echo '  </tr>';
        
        for($i=0; $i < count($Progress); $i++ ) {
            
            if ($Progress[$i]['date']  == '')
                $DateCreate = '';
            else
                $DateCreate = date("d.m.Y", strtotime($Progress[$i]['date']));
            
            if ($Progress[$i]['plandateexec']  == '')
                $DatePlan = '';
            else
                $DatePlan = date("d.m.Y", strtotime($Progress[$i]['plandateexec']));
            
            if ($Progress[$i]['dateexec']  == '')
                $DateExec = '';
            else
                $DateExec = date("d.m.Y", strtotime($Progress[$i]['dateexec']));
            
            echo '  <tr>';
            echo '      <td style=\'width: 100px; border: 1px solid black\'>' . $DateCreate . '</td>';
            echo '      <td style=\'width: 150px; border: 1px solid black\'>' . $Progress[$i]['EmployeeName'] . '</td>';
            echo '      <td style=\'width: 100px; border: 1px solid black\'>' . $DatePlan . '</td>';
            echo '      <td style=\'width: 100px; border: 1px solid black\'>' . $DateExec . '</td>';
            echo '      <td style=\'width: 350px; border: 1px solid black\'>' . $Progress[$i]['report'] . '</td>';
            echo '      <td style=\'width: 150px; border: 1px solid black\'>' . $Progress[$i]['othername'] . '</td>';
            echo '      <td style=\'width: 100px; border: 1px solid black\'>' . $Progress[$i]['demand_id'] . '</td>';
            echo '  </tr>';
        }
        
        echo '  </tbody>';
        echo '</table>';
    }
    echo ''
?>

