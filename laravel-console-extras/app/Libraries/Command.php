<?php

namespace FightTheIce\Console;

use FightTheIce\Events\Console\Command\Alert;
use FightTheIce\Events\Console\Command\Anticipate;
use FightTheIce\Events\Console\Command\Ask;
use FightTheIce\Events\Console\Command\AskWithCompletion;
use FightTheIce\Events\Console\Command\Call;
use FightTheIce\Events\Console\Command\CallSilent;
use FightTheIce\Events\Console\Command\Choice;
use FightTheIce\Events\Console\Command\Comment;
use FightTheIce\Events\Console\Command\Confirm;
use FightTheIce\Events\Console\Command\Error;
use FightTheIce\Events\Console\Command\Info;
use FightTheIce\Events\Console\Command\Line;
use FightTheIce\Events\Console\Command\Question;
use FightTheIce\Events\Console\Command\Secret;
use FightTheIce\Events\Console\Command\Table;
use FightTheIce\Events\Console\Command\Warn;
use Illuminate\Console\Command as I_Command;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends I_Command
{
    use LockableTrait;
    /**
     * Help text
     *
     * @var string
     */
    protected $help = '';

    /**
     * Executed Date Time
     * Epoch of the execution date and time
     *
     * @var string
     */
    protected $executedDateTime = '';

    /**
     * UUID
     * UUID of execution
     *
     * @var string
     */
    protected $uuid = '';

    /**
     * singleInstance
     * Should this command be locked to a single running instance?
     *
     * @access protected
     * @var boolean
     */
    protected $singleInstance = false;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setHelp($this->help);

        $this->executedDateTime = time();
        $this->uuid             = Str::uuid();
    }

    public function getExecutedDateTime()
    {
        return $this->executedDateTime;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Call another console command.
     *
     * @param  string  $command
     * @param  array   $arguments
     * @return int
     */
    public function call($command, array $arguments = [])
    {
        $return = parent::call($command, $arguments);

        event(new Call($this->getSignature(), array_merge($this->getArguments(), $this->getOptions()), $command, $arguments, $return));

        return $return;
    }

    /**
     * Call another console command silently.
     *
     * @param  string  $command
     * @param  array   $arguments
     * @return int
     */
    public function callSilent($command, array $arguments = [])
    {
        $return = parent::callSilent($command, $arguments);

        event(new CallSilent($this->getSignature(), array_merge($this->getArguments(), $this->getOptions()), $command, $arguments, $return));

        return $return;
    }

    /**
     * Confirm a question with the user.
     *
     * @param  string  $question
     * @param  bool    $default
     * @return bool
     */
    public function confirm($question, $default = false)
    {
        $answer = parent::confirm($question, $default);

        event(new Confirm($this, $question, $answer));

        return $answer;
    }

    /**
     * Prompt the user for input.
     *
     * @param  string  $question
     * @param  string|null  $default
     * @return mixed
     */
    public function ask($question, $default = null)
    {
        $answer = parent::ask($question, $default);

        event(new Ask($this, $question, $answer));

        return $answer;
    }

    /**
     * Prompt the user for input with auto completion.
     *
     * @param  string  $question
     * @param  array   $choices
     * @param  string|null  $default
     * @return mixed
     */
    public function anticipate($question, array $choices, $default = null)
    {
        $answer = parent::anticipate($question, $choices, $default);

        event(new Anticipate($this, $question, $answer));

        return $answer;
    }

    /**
     * Prompt the user for input with auto completion.
     *
     * @param  string  $question
     * @param  array   $choices
     * @param  string|null  $default
     * @return mixed
     */
    public function askWithCompletion($question, array $choices, $default = null)
    {
        $answer = parent::askWithCompletion($question, $choices, $default);

        event(new AskWithCompletion($this, $question, $answer));

        return $answer;
    }

    /**
     * Prompt the user for input but hide the answer from the console.
     *
     * @param  string  $question
     * @param  bool    $fallback
     * @return mixed
     */
    public function secret($question, $fallback = true)
    {
        $answer = parent::secret($question, $fallback);

        event(new Secret($this, $question, $answer));

        return $answer;
    }

    /**
     * Give the user a single choice from an array of answers.
     *
     * @param  string  $question
     * @param  array   $choices
     * @param  string|null  $default
     * @param  mixed|null   $attempts
     * @param  bool|null    $multiple
     * @return string
     */
    public function choice($question, array $choices, $default = null, $attempts = null, $multiple = null)
    {
        $answer = parent::choice($question, $choices, $default, $attempts, $multiple);

        event(new Choice($this, $question, $answer));

        return $answer;
    }

    /**
     * Format input to textual table.
     *
     * @param  array   $headers
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $rows
     * @param  string  $tableStyle
     * @param  array   $columnStyles
     * @return void
     */
    public function table($headers, $rows, $tableStyle = 'default', array $columnStyles = [])
    {
        $answer = parent::table($headers, $rows, $tableStyle, $columnStyles);

        event(new Table($this, $headers, $rows));

        return $answer;
    }

    /**
     * Write a string as information output.
     *
     * @param  string  $string
     * @param  int|string|null  $verbosity
     * @return void
     */
    public function info($string, $verbosity = null)
    {
        $answer = parent::info($string, $verbosity);

        event(new Info($this, $string));

        return $answer;
    }

    /**
     * Write a string as standard output.
     *
     * @param  string  $string
     * @param  string  $style
     * @param  int|string|null  $verbosity
     * @return void
     */
    public function line($string, $style = null, $verbosity = null)
    {
        $answer = parent::line($string, $style, $verbosity);

        event(new Line($this, $string));

        return $answer;
    }

    /**
     * Write a string as comment output.
     *
     * @param  string  $string
     * @param  int|string|null  $verbosity
     * @return void
     */
    public function comment($string, $verbosity = null)
    {
        $answer = parent::comment($string, $verbosity);

        event(new Comment($this, $string));

        return $answer;
    }

    /**
     * Write a string as question output.
     *
     * @param  string  $string
     * @param  int|string|null  $verbosity
     * @return void
     */
    public function question($string, $verbosity = null)
    {
        $answer = parent::question($string, $verbosity);

        event(new Question($this, $string));

        return $answer;
    }

    /**
     * Write a string as error output.
     *
     * @param  string  $string
     * @param  int|string|null  $verbosity
     * @return void
     */
    public function error($string, $verbosity = null)
    {
        $answer = parent::error($string, $verbosity);

        event(new Error($this, $string));

        return $answer;
    }

    /**
     * Write a string as warning output.
     *
     * @param  string  $string
     * @param  int|string|null  $verbosity
     * @return void
     */
    public function warn($string, $verbosity = null)
    {
        $answer = parent::warn($string, $verbosity);

        event(new Warn($this, $string));

        return $answer;
    }

    /**
     * Write a string in an alert box.
     *
     * @param  string  $string
     * @return void
     */
    public function alert($string)
    {
        $answer = parent::alert($string);

        event(new Alert($this, $string));

        return $answer;
    }

    /**
     * Execute the console command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return mixed
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->singleInstance == true) {
            if (!$this->lock()) {
                $output->writeln('The command is already running in another process.');

                return 0;
            }
        }

        $return = parent::execute($input, $output);

        if ($this->singleInstance == true) {
            $this->release();
        }

        return $return;
    }

    /**
     * extrapolate
     * Extrapolates the command signature
     *
     * @access public
     * @return array
     */
    public function extrapolate()
    {
        $data = TextParser::parse($this->getSignature());
        if (isset($data['arguments'])) {
            foreach ($data['arguments'] as &$d) {
                $d['value'] = $this->argument($d['argument']);
            }
        }

        if (isset($data['options'])) {
            foreach ($data['options'] as &$d) {
                $d['value'] = $this->option($d['option']);
            }
        }

        return $data;
    }
}
