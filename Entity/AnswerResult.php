<?php

namespace App\Entity;

/**
 * Class AnswerResult
 * @package App\Entity
 */
class AnswerResult
{
    /**
     * @var bool
     */
    private $isCorrect;

    /**
     * @var float
     */
    private $score;

    public function __construct(bool $isCorrect, float $score)
    {
    }
}
