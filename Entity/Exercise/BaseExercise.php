<?php

namespace App\Entity\Exercise;

use App\Entity\AnswerResult;
use App\Entity\StudentInterface;
use App\Service\AnswersSaver\AnswerSaverInterface;

/**
 * Class Base
 * @package App\Entity\Exercise
 */
abstract class Base implements ExerciseInterface
{
    /**
     * @var array
     */
    private $validAnswer;

    /**
     * @var AnswerSaverInterface
     */
    private $answersSaver;

    /**
     * @var int
     */
    private $maxScore;

    /**
     * @var int
     */
    private $possibleAnswersCount;

    /**
     * @param StudentInterface $student
     * @param array $answer
     */
    public function saveAnswerToDb(StudentInterface $student, $answer)
    {
        $this->answersSaver->save($student, $answer);
    }

    /**
     * @param array $answer
     * @return AnswerResult
     */
    public function getAnswerResult($answer)
    {
        $result = new AnswerResult(
            $this->getIsCorrect($answer, $this->validAnswer),
            $this->getScore($answer, $this->validAnswer, $this->maxScore, $this->possibleAnswersCount)
        );

        return $result;
    }

    /**
     * @param $userAnswer
     * @param $validAnswer
     * @return bool
     */
    protected function getIsCorrect($userAnswer, $validAnswer)
    {
        //todo: implement
        return false;
    }

    /**
     * @param $userAnswer
     * @param $validAnswer
     * @param $maxScore
     * @param $possibleAnswersCount
     * @return float
     */
    protected function getScore($userAnswer, $validAnswer, $maxScore, $possibleAnswersCount)
    {
        //todo: implement
        return 0;
    }
}
