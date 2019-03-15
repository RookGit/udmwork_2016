<div class='admin_menu'>
<?php
if($page == "resume")
echo "<a target='_blank' href='/admin_menu/move_to_jobs/$page/$ads_id' class='btn btn-default btn-block'>Переместить в вакансии</a>";	

if($page == "jobs")
echo "<a target='_blank' href='/admin_menu/move_to_resume/$page/$ads_id' class='btn btn-default btn-block'>Переместить в резюме</a>";	

echo "<a target='_blank' href='/admin_menu/block_ads/$page/$ads_id' class='btn btn-warning btn-block'>Забанить объявление</a>"
. "<a target='_blank' href='/admin_menu/block_user/$page/$ads_id' class='btn btn-warning btn-block'>Забанить пользователя</a>"
. "<a target='_blank' href='/admin_menu/user_accout/$page/$ads_id' class='btn btn-success btn-block'>Аккаунт пользователя</a>"
. "<a target='_blank' href='/admin_menu/plus_see_this/$page/$ads_id' class='btn btn-primary btn-block'>Добавить 5 просмотров</a>"
. "<a target='_blank' href='/admin_menu/plus_random_see/$page/$ads_id' class='btn btn-primary btn-block'>Всем X просмотров</a>"
. "<a target='_blank' href='/admin_menu/plus_random_see_week/$page/$ads_id' class='btn btn-primary btn-block'>Всем X просмотров за неделю</a>"
. "<a target='_blank' href='/admin_menu/plus_random_see_week/$page/$ads_id' class='btn btn-primary btn-block'>Всем X просмотров за неделю</a>"
. "<a target='_blank' href='/admin_menu/plus_see/$page/$ads_id' class='btn btn-primary btn-block'>Всем 3 просмотра</a>"
. "<a target='_blank' href='/admin_menu/suspicious_ads/$page/$ads_id' class='btn btn-danger btn-block'>Подозрительное объявление</a>"
. "<a target='_blank' href='/admin_menu/suspicious_user/$page/$ads_id' class='btn btn-danger btn-block'>Подозрительный пользователь</a>"
. "<a target='_blank' href='/admin_menu/delete_ads/$page/$ads_id' class='btn btn-danger btn-block'>Удалить объявление</a>"
. "<a target='_blank' href='/admin_menu/delete_no_moder_ads/$page/$ads_id' class='btn btn-danger btn-block'>Удалить не валидные объявления</a>"
. "</div>";