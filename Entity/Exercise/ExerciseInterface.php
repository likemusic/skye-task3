<?php

namespace App\Entity\Exercise;

use App\Entity\AnswerResult;
use App\Entity\StudentInterface;

/**
 * Interface ExerciseInterface
 * @package App\Entity\Exercise
 */
interface ExerciseInterface
{
    /**
     * @param StudentInterface $student
     * @param $answer
     */
    public function saveAnswerToDb(StudentInterface $student, $answer);

    /**
     * @param $answer
     * @return AnswerResult
     */
    public function getAnswerResult($answer);
}
