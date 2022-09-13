<?php

function drawer()
{
    // Если что-то ввели
    if (isset($_GET['num'])) {
        // Если введенная строка - это не число
        if (!is_numeric($_GET['num'])) {
            echo 'Введите число в десятичном формате';
        }
        $num = (int)$_GET['num'];

        //Минимальные значения фигуры при 0 размерах
        $height = 100;
        $width = 100;
        $shape = 0;
        $color = 000000;
        if ($num != 0) {
            $height = 0;
            $width = 0;
            // инициализируем данные
            $shape = $num % 4;
            $color = substr(floathex($num), 0, 6);
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
            $width >>= 1;
        }
        echo "Переданное число:  " . $num . '<br>';
        echo "Высота фигуры:  " . $height . '<br>';
        echo "Ширина фигуры: " . $width . '<br>';
        echo "Цвет фигуры (hex):  " . $color . '<br>';

        $svg_code = '<svg width = "' . $height . '" height= "' . $width . '">';
        switch ($shape) {
            //Круг
            case 0:
                echo "Форма фигуры:  Круг" . '<br><br>';
                $height = min($height, $width);
                $svg_code .= '<circle cx="' . $height / 2 . '" cy ="' . $width / 2 . '" r="' . $height / 2 . '" fill = "#' . $color . '" />';
                break;
            //Эллипс
            case 1:
                echo "Форма фигуры:  Эллипс" . '<br><br>';
                $svg_code .= '<ellipse cx="' . $height / 2 . '" cy ="' . $width / 2 . '" rx="' . $height / 2 . '" ry="' . $width / 2 . '" fill = "#' . $color . '" />';
                break;
            //Квадрат
            case 2:
                echo "Форма фигуры:  Квадрат" . '<br><br>';
                $height = min($height, $width);
                $svg_code .= '<rect x="0" y="0" width="' . $height . '" height="' . $width . '" fill="#' . $color . '" />';
                break;
            //Прямоугольник
            case 3:
                echo "Форма фигуры:  Прямоугольник" . '<br><br>';
                $svg_code .= '<rect x="0" y="0" width="' . $height . '" height="' . $width . '" fill="#' . $color . '" />';
                break;

        }

        $svg_code .= '</svg>';
        echo $svg_code;
    }

}

function floathex($number)
{
    return strrev(unpack('h*', pack('d', $number))[1]);
}

drawer();
