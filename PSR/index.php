<pre>
<?php
//PSR - 0 !не рекомендуется его использовать аналог PSR-4
spl_autoload_register(function ($class) {
    include  $class . '.php';
});

use app\class\User;

//PSR-1
//Test.php -> Class Test
//Class NewTest -> NewTest - camelcase
//TEST_CONST -> Test::TEST_CONST

//PSR-2 - это расширение PSR-1
/**
 * вложенность
 * function test() {
 * ....
 * .... - пробелами сейчас
 * ---- - tab раньше
 * }
 *
 * скобки и снос скобок
 *  function test() { - не правильно
 *
 *  }
 *
 *  function test() - правильно
 *  {
 *
 *  }
 *
 *  $test=123; - не правильно
 *  $test = 123; - правильно
 *
 *  $test = [$a,$b,$c]; - не правильно
 *  $test = [$a, $b, $c]; - правильно
 *
 *  public function init(): bool
 *  {
 *      if ($this->isCreatedInRemoteResource() && $this->isUpdatedInRemoteResource() && $this->isAuthorized() && $this->isAdmin()) { - не правильно
 *          return true;
 *      }
 *      return false;
 *  }
 *
 *  public function init(): bool - правильно
 *  {
 *      if (
 *          $this->isCreatedInRemoteResource() &&
 *          $this->isUpdatedInRemoteResource() &&
 *          $this->isAuthorized() &&
 *          $this->isAdmin()
 *      ) {
 *          return true;
 *      }
 *      return false;
 *  }
 *
 *
 * */

//PSR-3 - интерфейс для логов

/**
 * Описывает общий интерфейс логирования
 *
 * Сообщение ДОЛЖНО быть строкой или объектом, реализующим __toString().
 *
 * Сообщение МОЖЕТ содержать плейсхолдеры в форме: {foo}, где foo
 * будут заменены данными контекста из ключа "foo".
 *
 * Контекстный массив может содержать произвольные данные, единственное предположение,
 * которое могут сделать разработчики, заключается в том, что если экземпляр Exception дается
 * для создания трассировки стека, он ДОЛЖЕН находиться в ключе «exception».
 *
 */
interface LoggerInterface
{
    /**
     * Чрезвычайная ситуация. Система непригодна для использования.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function emergency($message, array $context = array());

    /**
     * Действия должны быть приняты немедленно.
     *
     * Пример: весь веб-сайт недоступен, база данных недоступна и т. д. Это должно вызвать SMS-уведомления и разбудить вас.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function alert($message, array $context = array());

    /**
     * Критические условия.
     *
     * Пример: компонент приложения недоступен, неожиданное исключение.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function critical($message, array $context = array());

    /**
     * Ошибки времени выполнения, которые не требуют немедленных действий, но обычно должны регистрироваться и отслеживаться.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function error($message, array $context = array());

    /**
     * Исключительные случаи, не являющиеся ошибками.
     *
     * Пример: использование устаревших API, неправильное использование API, нежелательные вещи, которые не обязательно являются неправильными.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function warning($message, array $context = array());

    /**
     * Обычные, но важные события.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function notice($message, array $context = array());

    /**
     * Интересные события.
     *
     * Пример: вход пользователя в систему, запись лога SQL.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function info($message, array $context = array());

    /**
     * Подробная отладочная информация.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function debug($message, array $context = array());

    /**
     * Логирование с заданным уровнем.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return void
     */
    public function log($level, $message, array $context = array());
}

//PSR-4 - замена PSR-0

//PSR-12 - это расширение PSR-2

