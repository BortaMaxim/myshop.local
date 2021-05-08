<?php
if(!defined('SETUPINC')) die('Kwaheri!');
?>
	<div id="main">
            <h1>Спасибо Вам за выбор osTicket!</h1>
            <div id="intro">
             <p>Мы рады, что вы выбрали osTicket для обеспечения поддержкой ваших пользователей!</p>
            <p>Данный инсталятор поможет вам шаг за шагом пройти весь процесс установки. Всего несколько минут нужно вам, чтобы обеспечить ваших пользователей системой поддержки!</p>
            </div>
            <h2>Необходимые требования</h3>
            <p>Перед тем как приступить к установке, мы проверим конфигурацию вашего сервера, чтобы убедится, что он подходит под минимальные требования необходимые для установки и запуска osTicket.</p>
            <h3>Обязательные требования: <font color="red"><?php echo $errors['prereq']; ?></font></h3>
            Эти параметры необходимы для установки и работы osTicket.
            <ul class="progress">
                <li class="<?php echo $installer->check_php()?'yes':'no'; ?>">
                PHP версиии 4.3 или выше - (<small><b><?php echo PHP_VERSION; ?></b></small>)</li>
                <li class="<?php echo $installer->check_mysql()?'yes':'no'; ?>">
                MySQL версии 4.4 или выше - (<small><b><?php echo extension_loaded('mysql')?'модуль загружен':'модуль не загружен!'; ?></b></small>)</li>
            </ul>
            <h3>Рекомендуемые требования:</h3>
            Вы можете использовать osTicket без данных расширений PHP, но в таком случае не будет доступен весь функционал системы.
            <ul class="progress">
                <li class="<?php echo extension_loaded('mcrypt')?'yes':'no'; ?>">Mcrypt</li>
                <li class="<?php echo extension_loaded('gd')?'yes':'no'; ?>">Gdlib</li>
                <li class="<?php echo extension_loaded('imap')?'yes':'no'; ?>">PHP IMAP</li>
            </ul>
            <div id="bar">
                <form method="post" action="install.php">
                    <input type="hidden" name="s" value="prereq">
                    <input class="btn"  type="submit" name="submit" value="Продолжить &raquo;">
                </form>
            </div>
    </div>
	<div id="sidebar">
            <h3>Нужна помощь?</h3>
            <p>
            В случае возникновении каких-либо проблем при установке или работы системы osTicket вы можете обратится к нашему форуму к сообществу пользователей данной системы. Возможно вместе мы найдем причины вашей проблемы и поможем устранить ее. Вы можете присоединится к нашему <a target="_blank" href="http://osticket.ru/forum/">форуму</a> прямо сейчас!
            </p>
    </div>