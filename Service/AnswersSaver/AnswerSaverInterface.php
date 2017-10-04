<?php

namespace App\Service\AnswersSaver;

use App\Entity\StudentInterface;

/**
 * Interface AnswerSaverInterface
 * @package App\Service\AnswersSaver
 */
interface AnswerSaverInterface
{
    /**
     * @param StudentInterface $student
     * @param array[] $answer
     * @return
     */
    public function save(StudentInterface $student, array $answer);
}
