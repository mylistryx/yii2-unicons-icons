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

    private ?string $name = null;
    private ?string $content = null;

    public static function i(string $icon, ?string $content = null): static
    {
        return (new static())
            ->name($icon)
            ->content($content);
    }

    public function __toString(): string
    {
        $classes = $this->addClasses;

        $classes[] = self::BASE_CLASS;

        $classes[] = implode('-', [
            self::BASE_CLASS,
            $this->name,
        ]);

        return Html::tag(self::ITEM_TAG, $this->content ?? '', [
            'class' => array_filter(array_unique($classes)),
        ]);
    }

    public function name(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function content(?string $content = null): static
    {
        $this->content = $content;

        return $this;
    }

    public function addClass(string $class): static
    {
        $this->addClasses[] = $class;

        return $this;
    }

    public function addClasses(array $classes = []): static
    {
        $this->addClasses = array_merge($this->addClasses, $classes);

        return $this;
    }
}