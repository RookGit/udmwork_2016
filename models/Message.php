<?php
// 0 - заголовок, 1 - сообщение, 2 - стиль кнопки и окна,
// 3 - ссылка кнопки, 4 - название кнопки ..
// x - ссылка кнопки, y - название кнопки

function plus_window_message($message_array)
{
    echo "<div class='starter-template window_message window_message_$message_array[2]'>";
    echo "<h1 class='header_message header_message_$message_array[2]'>$message_array[0]</h1>";
    echo "<p class='lead message'>$message_array[1]</p>";

    for ($i = 0; $i < (count($message_array) - 3) / 2; $i++) {
        echo "<a href='/" . $message_array[3 + 2 * $i] . "' type='button' class='btn button_message button_" . $message_array[2] . "'>
                        " . $message_array[4 + 2 * $i] . "</a>";
    }
    echo "</div>";

}
