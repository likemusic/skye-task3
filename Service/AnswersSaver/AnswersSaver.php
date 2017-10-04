<?php

namespace App\Service\AnswersSaver;

use App\Entity\StudentInterface;
use App\Service\AnswersSaver\SavedToInterface\MongoInterface;
use App\Service\AnswersSaver\SavedToInterface\MySqlInterface;
use App\Service\AnswersSaver\SavedToInterface\RedisInterface;

/**
 * Class AnswersSaver
 * @package App\Service\AnswersSaver
 */
class AnswersSaver
{
    /**
     * @var array - [interface => method for save]
     */
    private $mapping = [
        MySqlInterface::class => 'saveToMySQL',
        RedisInterface::class => 'saveToRedis',
        MongoInterface::class => 'saveToMongo',
    ];

    /**
     * @param StudentInterface $student
     * @param array $answer
     */
    public function save(StudentInterface $student, array $answer)
    {
        $methodNames = $this->getCallbacks($answer);

        $this->applyCallbacks($student, $answer, $methodNames);
    }

    /**
     * @param $answer
     * @return string[]
     */
    private function getCallbacks($answer)
    {
        $callbacks = [];

        foreach ($this->mapping as $interfaceName => $methodName) {
            if($answer instanceof  $interfaceName) {
                $callbacks[] = $methodName;
            }
        }

        return $callbacks;
    }

    /**
     * @param StudentInterface $student
     * @param array $answer
     * @param string[] $methodNames
     */
    private function applyCallbacks(StudentInterface $student, $answer, $methodNames)
    {
        foreach ($methodNames as $methodName) {
            call_user_func([$this, $methodName], $student, $answer);
        }
    }
}
