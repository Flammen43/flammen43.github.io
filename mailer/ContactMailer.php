<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';
/**
 * Mailer: класс-хелпер, отправляет почту администратору
 */
class ContactMailer
{
	/**
     * E-mail отправителя
     * @var string
     */
    private static $emailFrom = 'adminft@pumpagroup.ru';
    /**
     * E-mail получателя
     * @var string
     */
    private static $emailTo = 'a.baranov@pumpagroup.ru';

    /**
     * Отправляет писмо, если письмо отправлено,
     * возвращает TRUE, в противном случае FALSE.
     * @param string $name
     * @param string $email
     * @param string $message
     * @param string $message
     * @return boolean
     */
    public static function send($name, $theme,  $email,  $message)
    {
		// Формируем тело письма
		$body = "Имя: " . $name . "\nТема: " . $theme . "\nE-mail: " . $email . "\nСообщение: " . $message;

		// Создаем объект PHPMailer
        $mailer = new PHPMailer();
        // Настройки подключения
        $mailer->isSMTP();
        // Устанавливает хост почтового сервера (Mail.ru: smtp.mail.ru, Google: smtp.gmail.com)
        $mailer->Host = ' smtp.timeweb.ru';
        // Включает SMTP-авторизацию
        $mailer->SMTPAuth = true;
        // Логин или E-mail целиком
        $mailer->Username = self::$emailFrom;
        // Пароль от почтового ящика
        $mailer->Password = '2QyjJJte';
        // Протокол соединения
        $mailer->SMTPSecure = 'ssl';
        // Порт для исходящаей почты
        $mailer->Port = '465';

        // Устанавливает кодировку
        $mailer->CharSet = 'UTF-8';
        // Устанавливает E-mail и имя отправителя
        $mailer->setFrom(self::$emailFrom, 'Подтверждение - Анкета.');
        // Добавляет E-mail получателя
        $mailer->addAddress(self::$emailTo);
        // Настройка HTML-формата
        $mailer->isHTML(false);
        // Тема письма
        $mailer->Subject = 'Заполнена анкета';
        // Основное тело письма
        $mailer->Body = $body;

        // Отправляет письмо
        if ($mailer->send()) {
        	return true;
        }
    	return false;
    }
}