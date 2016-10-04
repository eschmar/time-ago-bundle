<?php

namespace Eschmar\TimeAgoBundle\Twig;

use Symfony\Component\Translation\TranslatorInterface;

/**
 * Twig integration for TimeAgoHelper class.
 *
 * @author Marcel Eschmann, @eschmar
 **/
class TimeAgoExtension extends \Twig_Extension
{
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

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'time_ago_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('ago', array($this, 'agoFilter')),
        ];
    }

    /**
     * Returns relative time in words (translated).
     *
     * @return string
     * @author Marcel Eschmann, @eschmar
     **/
    public function agoFilter(\DateTime $date, $format = null)
    {
        $diff = time() - $date->format('U');
        $format = $format ? $format : $this->format;

        $prefix = $diff > -5 ? '.past' : '.future';
        $diff = abs($diff);
        $days = floor($diff / 86400);

        if ($days >= 7) return $date->format($format);
        if ($days > 1) return $this->translator->trans('time_ago' . $prefix . '.days', ['#' => $days]);

        if ($diff < 60) return $this->translator->trans('time_ago' . $prefix . '.now');
        if ($diff < 120) return $this->translator->trans('time_ago' . $prefix . '.minute');
        if ($diff < 3600) return $this->translator->trans('time_ago' . $prefix . '.minutes', ['#' => floor($diff / 60)]);
        if ($diff < 7200) return $this->translator->trans('time_ago' . $prefix . '.hour');
        if ($diff < 86400) return $this->translator->trans('time_ago' . $prefix . '.hours', ['#' => floor($diff / 3600)]);

        return $date->format($format);
    }

} // END class TimeAgoExtension extends \Twig_Extension
