<?php
/**
 * Chain utility calls
 *
 * @package utility
 */

namespace Utility;

class Chain
{
    /**
     * The subject of the chain
     *
     * @var mixed
     */
    public $subject;

    /**
     * The current Utility class to chain
     *
     * @var string|object
     */
    protected $class;

    /**
     * Start a new chain
     *
     * @param mixed $subject
     * @param string|object $class
     */
    public function __construct($subject, $class)
    {
        $this->subject = $subject;
        $this->class = $class;
        return $this;
    }

    /**
     * Break the chain and return subject
     *
     * @return mixed
     */
    public function break()
    {
        return $this->subject;
    }

    /**
     * Swap Utility class along the chain
     *
     * @param string|object $class
     * @return void
     */
    public function swap($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * Dispatch method calls to Utility class and pass in subject as the first argument
     *
     * @param string $method
     * @param array $arguments
     * @return void
     */
    public function __call($method, $arguments)
    {
        $arguments = array_merge([$this->subject], $arguments);
        $this->subject = call_user_func_array([$this->class, $method], $arguments);
        return $this;
    }

    /**
     * Start a new chain
     *
     * @param mixed $subject
     * @param string|object $class
     * @return void
     */
    public static function start($subject, $class) {
        return new self($subject, $class);
    }
}
