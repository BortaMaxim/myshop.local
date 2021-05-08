<?php
if(!defined('SETUPINC')) die('Kwaheri!');
?>
    <div id="main">
            <h1 style="color:#FF7700;">Создайте файл конфигурации!</h1>
            <div id="intro">
             <p>Для установки osTicket необходимо наличие файла конфигурации <b>include/ost-config.php</b>. Образец файла конфигурации находится в каталоге <b>include/ost-sampleconfig.php</b>.
             </p>
            </div>
            <h3>Необходимые действия: <font color="red"><?php echo $errors['err']; ?></font></h3>
            Переименуйте образец файла конфигурации находящийся в каталоге <b>include</b><br /> из <b>ost-sampleconfig.php</b> в <b>ost-config.php</b> и нажмите кнопку "Продолжить". Убедитесь, что файл доступен для записи.
            <ul>
                <li><b>CLI:</b><br><i>cp include/ost-sampleconfig.php include/ost-config.php</i></li>
                <li><b>FTP:</b><br> используя ftp клиент переименуйте файл</li>
                <li><b>Cpanel:</b><br> переименуйте файл через диспетчер файлов</li>
            </ul>
            <p>Если вы не можете найти образец файла конфигурации, убедитесь, что вы загрузили все файлы из каталога 'upload' или обратитсь к <a target="_blank" href="http://osticket.ru/Installation">инструкции по установке</a></p>
            <div id="bar">
                <form method="post" action="install.php">
                    <input type="hidden" name="s" value="config">
                    <input class="btn" type="submit" name="submit" value="Продолжить &raquo;">
                </form>
            </div>
    </div>
	<div id="sidebar">
            <h3>Нужна помощь?</h3>
            <p>
            В случае возникновении каких-либо проблем при установке или работы системы osTicket вы можете обратится к нашему форуму к сообществу пользователей данной системы. Возможно вместе мы найдем причины вашей проблемы и поможем устранить ее. Вы можете присоединится к нашему <a target="_blank" href="http://osticket.ru/forum/">форуму</a> прямо сейчас!
            </p>
    </div>