<select name="exp_post" class="selectpicker sort_ads">
    <optgroup label="Опыт работы в данной сфере">
        <option value='9'>Не указан</option>
        <?php
        if($page_type == "plus_jobs")
            echo "<option value='0'>Не требуется</option>";
        else 
            echo "<option value='0'>Отсутствует</option>";
        ?>
        <option value='1'>от 1 года</option>
        <option value='2'>от 2 лет</option>
        <option value='3'>от 3 лет</option>
        <option value='4'>от 5 лет</option>
        <option value='5'>от 10 лет</option>
    </optgroup>
</select>


