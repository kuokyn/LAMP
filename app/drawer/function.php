<?php

function drawer()
{
    // Если передали параметр
    if (isset($_GET['num'])) {
        // Если переданный параметр не число
        if (!is_numeric($_GET['num'])) {
            echo 'Введите число в десятичном формате';
        } else {
            $num = (int)$_GET['num'];

            //Минимальные значения фигуры при 0 размерах
            $height = 100;
            $width = 100;
            $shape = 0;
            $color = 000000;

            // если передали не ноль
            if ($num != 0) {
                // инициализируем данные
                $height = 0;
                $width = 0;
                $shape = $num % 4;
                $color = substr(paramtohex($num), 0, 6);

                // умножаем переданое число на 35 с помощью битовых операций
                $a = 35;
                $b = $num;
                while ($b | 0) {
                    if ($b & 1) {
                        $height += $a;
                        $width += $a;
                    }
                    $a <<= 1;
                    $b >>= 1;
                }

                // делаем ширину в 2 раза больше высоты
                $width >>= 1;
            }
            echo '<b>' . "Переданное число:  " . '</b>' . $num . '<br>';
            echo '<b>' . "Высота фигуры:  " . '</b>' . $height . '<br>';
            echo '<b>' . "Ширина фигуры: " . '</b>' . $width . '<br>';
            echo '<b>' . "Цвет фигуры (hex):  " . '</b>' . $color . '<br>';

            $svg_code = '<svg width = "' . $height . '" height= "' . $width . '">';
            switch ($shape) {

                //Круг
                case 0:
                    echo '<b>' ."Форма фигуры:  Круг"  .'</b>'. '<br><br>';
                    $height = min($height, $width);
                    $svg_code .= '<circle cx="' . $height / 2 . '" cy ="' . $width / 2 . '" r="' . $height / 2 . '" fill = "#' . $color . '" />';
                    break;

                //Эллипс
                case 1:
                    echo '<b>' ."Форма фигуры:  Эллипс"  .'</b>'. '<br><br>';
                    $svg_code .= '<ellipse cx="' . $height / 2 . '" cy ="' . $width / 2 . '" rx="' . $height / 2 . '" ry="' . $width / 2 . '" fill = "#' . $color . '" />';
                    break;

                //Квадрат
                case 2:
                    echo '<b>' ."Форма фигуры:  Квадрат"  .'</b>'. '<br><br>';
                    $height = min($height, $width);
                    $svg_code .= '<rect x="0" y="0" width="' . $height . '" height="' . $width . '" fill="#' . $color . '" />';
                    break;

                //Прямоугольник
                case 3:
                    echo '<b>' ."Форма фигуры:  Прямоугольник"  .'</b>'. '<br><br>';
                    $svg_code .= '<rect x="0" y="0" width="' . $height . '" height="' . $width . '" fill="#' . $color . '" />';
                    break;

            }

            $svg_code .= '</svg>';
            echo $svg_code;
        }
    } else {
        echo "Пожалуйста, передайте параметр";
    }
}

function paramtohex($number)
{
    return strrev(unpack('h*', pack('d', $number))[1]);
}

drawer();
