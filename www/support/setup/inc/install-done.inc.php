<?php if(!defined('SETUPINC')) die('Kwaheri!');
$url=URL;
?>    
    <div id="main">
        <h1 style="color:green;">Поздравляем!</h1>
        <div id="intro">
        <p>Ваша установка osTicket успешно завершена. Вашим следующеим шагом является полная настройка системы в панели администрирования системы, но перед этим уделите пару минут для обеспечения безопасности вашей системы управления заявками.</p>
        
        <h2>Права доступа к файлу конфигурации</h2>
        Измените права доступа (chmod 0664) к файлу конфигурации ost-config.php, удалите право на запись.

        <h2>Удаление каталога установки</h2>
        Удалите каталог setup и все файлы находящиеся в данном каталоге.
        </div>
        <p>Below, you'll find some useful links regarding your installation.</p>
        <table border="0" cellspacing="0" cellpadding="5" width="580" id="links">
            <tr>
                    <td width="50%">
                        <strong>osTicket URL:</strong><Br>
                        <a href="<?php echo $url; ?>"><?php echo $url; ?></a>
                    </td>
                    <td width="50%">
                        <strong>Панель управления:</strong><Br>
                        <a href="../scp/admin.php"><?php echo $url; ?>scp</a>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                        <strong>Форум osTicket:</strong><Br>
                        <a href="http://osticket.ru/forum/">http://osticket.ru/forum/</a>
                    </td>
                    <td width="50%">
                        <strong>Сайт osTicket:</strong><Br>
                        <a href="http://osticket.ru/">http://osticket.ru/</a>
                    </td>
                </tr>
            </table>
    </div>
    <div id="sidebar">
            <h3>Что дальше?</h3>
            <p>После успешной установки вы можете зайти в <a href="../scp/admin.php" target="_blank">панель управления</a> с логином и паролем который вы указали в процессе установки. После входа вы можете более точнее настроить работу вашей системы управления заявками.</p>
            <p>В случае возникновении каких-либо проблем при установке или работы системы osTicket вы можете обратится к нашему форуму к сообществу пользователей данной системы. Возможно вместе мы найдем причины вашей проблемы и поможем устранить ее. Вы можете присоединится к нашему <a target="_blank" href="http://osticket.ru/forum/">форуму</a> прямо сейчас!</p>
   </div>