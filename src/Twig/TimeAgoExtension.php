<?php

namespace Eschmar\TimeAgoBundle\Twig;

use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Provides a simple twig filter for expressing time difference in words.
 *
 * @author Marcel Eschmann, @eschmar
 **/
class TimeAgoExtension extends \Twig\Extension\AbstractExtension
{
    public const TRANSLATION_NAMESPACE = 'time_ago';

    /**
     * @var TranslatorInterface
     **/
    private $translator;

    /**
     * @var string
     **/
    private $format;

    public function __construct(TranslatorInterface $translator, $format)
    {
        $this->translator = $translator;
        $this->format = $format;
    }

    public function getName(): string
    {
        return 'time_ago_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new \Twig\TwigFilter('ago', [$this, 'agoFilter']),
        ];
    }

    /**
     * Returns relative time in words (translated).
     *
     * @author Marcel Eschmann, @eschmar
     **/
    public function agoFilter(\DateTimeInterface $date, string $format = null): string
    {
        $diff = time() - $date->format('U');
        $format = $format ?: $this->format;

        $prefix = self::TRANSLATION_NAMESPACE;
        $prefix .= $diff > -5 ? '.past' : '.future';

        $diff = abs($diff);
        $days = floor($diff / 86400);

        if ($days >= 7) return $date->format($format);
        if ($days >= 1) return $this->translator->trans($prefix . '.days', ['#' => $days, '%count%' => $days]);

        if ($diff < 60) return $this->translator->trans($prefix . '.now');

        $m = floor($diff / 60);
        if ($diff < 120) return $this->translator->trans($prefix . '.minutes', ['%count%' => 1]);
        if ($diff < 3600) return $this->translator->trans($prefix . '.minutes', ['#' => $m, '%count%' => $m]);

        $h = floor($diff / 3600);
        if ($diff < 7200) return $this->translator->trans($prefix . '.hours', ['%count%' => 1]);
        if ($diff < 86400) return $this->translator->trans($prefix . '.hours', ['#' => $h, '%count%' => $h]);

        return $date->format($format);
    }

}
