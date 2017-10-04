<?php

namespace App\Controller;

use App\Entity\AnswerResult;
use App\Entity\Exercise\ExerciseInterface;
use App\System\Http\RequestInterface;
use App\System\Http\ResponseInterface;

/**
 * Class Exercises
 * @package App\Controller
 */
class Exercises
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function getAnswersResults(RequestInterface $request) : ResponseInterface
    {
        $answers = $request->all();//получаем данные из запроса
        $this->validateAnswers($answers);//валидируем данные

        $answersResults = $this->getResults($answers);

        return $this->convertAnswersResultsToResponse($answersResults);
    }

    /**
     * @param array $answers
     */
    private function validateAnswers($answers)
    {
        //todo: implement
    }

    /**
     * @param array $answers
     * @return AnswerResult[]
     */
    private function getResults($answers) : array
    {
        $answersResults = [];

        foreach ($answers as $answer) {
            $answersResults[] =  $this->getResult($answer);
        }

        return $answersResults;
    }

    /**
     * @param array $answer
     * @return AnswerResult
     */
    private function getResult($answer) : AnswerResult
    {
        $exercise = $this->getExerciseById($answer['exerciseId']);

        return $exercise->getAnswerResult($answer['answer']);
    }

    /**
     * @param $excerciseId
     * @return ExerciseInterface
     */
    private function getExerciseById($excerciseId) : ExerciseInterface
    {
        //todo: implement;
    }

    /**
     * @param AnswerResult[] $answerResults
     * @return ResponseInterface
     */
    private function convertAnswersResultsToResponse(array $answerResults) : ResponseInterface
    {
        //todo: implement;
    }
}