<?php

namespace Eschmar\TimeAgoBundle\Twig;

use Symfony\Component\Translation\TranslatorInterface;

/**
 * Provides a simple twig filter for expressing time difference in words.
 *
 * @author Marcel Eschmann, @eschmar
 **/
class TimeAgoExtension extends \Twig_Extension
{
    const YEAR = 31536000;
    const MONTH = 2678400;
    const WEEK = 604800;
    const DAY = 86400;
    const HOUR = 3600;
    const MINUTE = 60;

    /**
     * @var TranslatorInterface
     **/
    private $translator;

    /**
     * @var string
     **/
    private $format;

    /**
     * @var int
     **/
    private $threshold;

    public function __construct(TranslatorInterface $translator, $format, $threshold)
    {
        $this->translator = $translator;
        $this->format = $format;
        $this->threshold = $threshold;
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
            new \Twig_SimpleFilter('ago', [$this, 'agoFilter']),
        ];
    }

    /**
     * Returns relative time in words (translated).
     *
     * @return string
     * @author Marcel Eschmann, @eschmar
     **/
    public function agoFilter(\DateTime $date, $format = null, $threshold = null)
    {
        $diff = time() - $date->format('U');
        $threshold = $threshold ?: $this->threshold;
        $prefix = 'time_ago.'. ($diff > -5 ? 'past' : 'future');

        foreach ([
            'years' => self::YEAR,
            'months' => self::MONTH,
            'weeks' => self::WEEK,
            'days' => self::DAY,
            'hours' => self::HOUR,
            'minutes' => self::MINUTE,
                     ] as $key => $unit) {
            $units = floor(abs($diff) / $unit);
            if ($units >= 1) {
                if (false !== $threshold && $unit > $threshold) {
                    goto end;
                }
                return $this->translator->transChoice(
                    sprintf('%s.%s', $prefix, $key),
                    $units,
                    ['#' => $units]
                );
            }
        }
        if (abs($diff) < self::MINUTE){
            return $this->translator->trans($prefix . '.now');
        }
        end:
        return $date->format($format ? $format : $this->format);
    }

}
