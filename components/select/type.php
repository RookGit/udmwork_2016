<select name="type_post" class="selectpicker sort_ads">
    <optgroup label="Направление">
        <option value='all_type'>Направление</option>
        
        <option value='school'>Для школьников</option>
        <option value='student'>Для студентов</option>
        <option value='home'>Домашняя</option>
        <option value='gov'>Госслужба</option>
        <option value='art'>Искусство</option>
        <option value='pc'>IT сфера</option>
        <option value='chef'>Кулинария</option>
        <option value='marketing'>Маркетинг, продажи</option>
        <option value='medical'>Медицина</option>
        <option value='education'>Образование</option>
        <option value='security'>Охрана, безопасность</option>
        <option value='pens'>Пенсионерам</option>
        <option value='production'>Производство</option>
        <option value='beauty'>Салоны красоты, парикмахерские</option>
        <option value='sport'>Спорт</option>
        <option value='build'>Строительство</option>
        <option value='auto'>Транспорт</option>
        <option value='tourism'>Туризм</option>
        <option value='uprpers'>Управление персоналом</option>
        <option value='finance'>Финансы</option>
        <option value='lawyer'>Юриспруденция</option>
        <option value='other'>Прочее</option>
        <?php if(!isset($page_type)) 
        echo "<option value='all_type'>Показать все</option>";
        ?>
    </optgroup>
</select>