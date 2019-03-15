<?php
function Ads_check($arr_ads, $type_function){

    switch ($arr_ads['city']) {

    case "izhevsk":
    $city = "Ижевскe";
    break;

    case "Izhevsk":
    $city = "Ижевскe";
    break;

    case "sarapul":
    $city = "Сарапулe";
    break;

    case "igra":
    $city = "Игрe";
    break;

    case "votkinsk":
    $city = "Воткинскe";
    break;	

    case "mozhga":
    $city = "Можгe";
    break;

    case "cambarka":
    $city = "Камбаркe";
    break;

    case "other":
    $city = "Ином городе";
    break;

    case "all":
    $city = "любом городе";
    break;

    case "all_city":
    $city = "любом городе";
    break;

    default:
    $city = "любом городе";
    break;
    }



    switch ($arr_ads['type']) {
    case "build":
        $type = "Строительство";
        break;
    case "chef":
        $type = "Кулинария";
        break;
    case "finance":
        $type = "Финансы";
        break;
    case "education":
        $type = "Образование";
        break;
    case "pc":
        $type = "IT сфера";
        break;	
    case "security":
        $type = "Охрана, безопасность";
        break;

    case "tourism":
        $type = "Туризм";
        break;	

    case "auto":
        $type = "Транспорт";
        break;	

    case "uprpers":
        $type = "Управление персоналом";
        break;	

    case "beauty":
        $type = "Салоны красоты, парикмахерские";
        break;	

    case "marketing":
        $type = "Маркетинг, продажи";
        break;	

    case "art":
        $type = "Искусство";
        break;	

    case "sport":
        $type = "Спорт";
        break;	

    case "production":
        $type = "Производство";
        break;

    case "gov":
        $type = "Госслужба";
        break;

    case "other":
        $type = "Прочее";
        break;

    case "school":
        $type = "Для школьников";
        break;

    case "student":
        $type = "Для студентов";
        break;

    case "home":
        $type = "Домашняя";
        break;

    case "lawyer":
        $type = "Юриспруденция";
        break;

    case "pens":
        $type = "Пенсионерам";
        break;

    case "medical":
        $type = "Медицина";
        break;		

    default:
        $type = "Не указана";
        break;
    }

if($type_function == "resume" or $type_function == "about_resume"){
    $graph = $arr_ads['graph_exp_gen_age'][0];
    $exp = $arr_ads['graph_exp_gen_age'][1];
    $gender = $arr_ads['graph_exp_gen_age'][2];
    
}

if($type_function == "jobs"){
    $graph = $arr_ads['graph_gender'][0];
    $gender = $arr_ads['graph_gender'][1];
    $exp = $arr_ads['exp'];
}


    switch ($arr_ads['payment']) {
    case 0:
        $payment = "не указана";
        break;

    case 1:
        $payment = "по договоренности";
        break;

    default:
        $payment = number_format($arr_ads['payment'], 0, ',', ' ')."Р";
        break;
    }
    

if($type_function != "services") {
    switch ($gender) {
    case "0":
        $gender = "Женский";
        break;

    case "1":
        $gender = "Мужской";
        break;
    
    case "2":
        $gender = "Не важно";
        break;    

    default:
        $gender = "Не указан";
        break;
    }

    switch ($graph) {
    case "0":
        $graph = "По договоренности";
        break;
    case "1":
        $graph = "Полный рабочий день";
        break;
    case "2":
        $graph = "Сменный график";
        break;
    case "3":
        $graph = "Свободный график";
        break;
    default:
        $graph = "Не указан";
        break;		
    }


    switch ($exp) {
        
    case 0:
        if($type_function == "resume" or $type_function == "about_resume")
            $exp = "Отсутствует";    
        else
            $exp = "Не требуется";
        break;
        
    case 1:
        $exp = "От 1 года";
        break;		
    case 2:
        $exp = "От 2 лет";
        break;		
    case 3:
        $exp = "От 3 лет";
        break;		
    case 4:
        $exp = "От 5 лет";
        break;
    case 5:
        $exp = "От 10 лет";
        break;		
    default:
        $exp = "Не указан";
        break;		
    }
    
    $return_array = array(
    "city" => $city,
    "type" => $type,
    "payment" => $payment,
    "graph" => $graph,
    "exp" => $exp,
    "gender" => $gender,
    );
}
else {
    $return_array = array(
    "city" => $city,
    "type" => $type,
    "payment" => $payment,
    );  
}



    
    return $return_array;


}