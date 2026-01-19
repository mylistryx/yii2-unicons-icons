<?php

namespace yii\uil;

use yii\helpers\Html;
use function array_filter;
use function implode;

abstract class Icon
{
    private const BASE_CLASS = 'uil';

    private const ITEM_TAG = 'i';

    private array $addClasses = [];

    private ?string $icon = null;
    private ?string $content = null;

    public static function i(string $icon, ?string $content = null): static
    {
        $icon = new static();
        $icon->icon = $icon;
        $icon->content = $content;

        return $icon;
    }

    public function __toString(): string
    {
        $class = implode('-', [
            self::BASE_CLASS,
            $this->icon,
        ]);

        $classes = $this->addClasses;
        $classes[] = $class;
        $classes[] = self::BASE_CLASS;

        return Html::tag(self::ITEM_TAG, $this->content ?? '', [
            'class' => array_filter(array_unique($classes)),
        ]);
    }

    public static function icon(string $icon, ?string $content = null): string
    {
        return static::i($icon, $content);
    }

    public function addClass(string $class): static
    {
        $this->addClasses[] = $class;

        return $this;
    }

    public function addClasses(array $classes): static
    {
        $this->addClasses = array_merge($this->addClasses, $classes);

        return $this;
    }
}