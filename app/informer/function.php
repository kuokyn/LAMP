<table>
    <tr>
        <th>Это столбец</th>
        <th>Информация</th>
        <th>Команда</th>
    </tr>
    <?php
    echo "<td> Дата </td><td>" . exec('date') . "</td><td> date </td></tr>";
    echo "<td> Текущая директория   </td><td>" . exec('pwd') . "</td><td> pwd </td></tr>";
    echo "<td> Содержимое директории  </td><td>";
    exec('ls', $output1) . print_r($output1);
    echo "</td><td> ls </td></tr>";
    echo "<td> Имя юзера </td><td>" . exec('whoami') . "</td><td> whoami </td></tr>";
    echo "<td> ID  </td><td>" . exec('id') . "</td><td> id </td></tr>";
    echo "<td> Имя хоста  </td><td>" . exec('hostname') . "</td><td> id </td></tr>";
    echo "<td> Текущие процессы  </td><td>";
    exec('ps', $output2);
    print_r($output2);
    echo "</td><td> ps </td></tr>";
    ?>
</table>


