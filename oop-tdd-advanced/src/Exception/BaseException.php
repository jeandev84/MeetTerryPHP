<?php
declare(strict_types=1);

namespace Framework\Exception;

use Exception;
use Throwable;

/**
 * BaseException
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Exception
 */
abstract class BaseException extends Exception
{

     /**
      * @var array
     */
     protected array $data = [];


     /**
      * @param string $message
      * @param array $data
      * @param int $code
      * @param Throwable|null $previous
     */
     public function __construct(
         string $message = "",
         array $data = [],
         int $code = 0,
         ?Throwable $previous = null
     )
     {
         $this->data = $data;
         parent::__construct($message, $code, $previous);
     }


     /**
      * @param string $key
      * @param $value
      * @return void
     */
     public function setData(string $key, $value): void
     {
         $this->data[$key] = $value;
     }


     /**
      * @return array
     */
     public function getExtractData(): array
     {
        if (count($this->data) === 0) {
            return $this->data;
        }

        return json_decode(json_encode($this->data), true);
     }
}