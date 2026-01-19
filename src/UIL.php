<?php

namespace yii\uil;

use yii\helpers\Html;

class UIL
{
    private const BASE_CLASS = 'uil';

    public static function i(string $icon, ?string $content = null): string
    {
        $class = implode('-', [
            self::BASE_CLASS,
            $icon,
        ]);

        return Html::tag('i', $content ?? '', [
            'class' => [
                self::BASE_CLASS,
                $class,
            ],
        ]);
    }

    public static function icon(string $icon, ?string $content = null): string
    {
        return self::i($icon, $content);
    }
}