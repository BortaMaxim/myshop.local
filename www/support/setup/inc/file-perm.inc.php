<?php
if(!defined('SETUPINC')) die('Kwaheri!');
?>
    <div id="main">
            <h1 style="color:#FF7700;">Доступность файла конфигурации</h1>
            <div id="intro">
             <p>
             Инсталятору osTicket необходимо чтобы к файлу конфигурации <b>include/ost-config.php</b> был предоставлен доступ на запись.
             </p>
            </div>
            <h3>Необходимые действия: <font color="red"><?php echo $errors['err']; ?></font></h3>
            Пожалуйста ознакомьтесь с иструкции по предоставлению прав доступа на чтение и запись пользователем на вашем сервере.
            <ul>
                <li><b>CLI</b>:<br><i>chmod 0666  include/ost-config.php</i></li>
                <li><b>FTP</b>:<br>Используя FTP клиент выбери файл и выберите chmod (смена атрибутов) и дайте все права к файлу.</li>
                <li><b>Cpanel</b>:<br>Нажмите на файл, выберите смену прав, и дайте все права на файл.</li>
            </ul>
            <div id="bar">
                <form method="post" action="install.php">
                    <input type="hidden" name="s" value="config">
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