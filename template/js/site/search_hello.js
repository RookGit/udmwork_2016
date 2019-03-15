function change_search_type(num_search) {
         	switch (num_search) {
         	  case 1:
         		$("#search_type_1").attr("class","hello_search_type_active");
         		$("#search_type_2").attr("class","hello_ads_type");
         		$("#search_type_3").attr("class","hello_ads_type");
         		$(".form_login").attr("action","/jobs");
         		break;
         		
         	  case 2:
         		$("#search_type_1").attr("class","hello_ads_type");
         		$("#search_type_2").attr("class","hello_search_type_active");
         		$("#search_type_3").attr("class","hello_ads_type");
         		$(".form_login").attr("action","/resume");
         		break;
         		
         	  case 3:
         		$("#search_type_1").attr("class","hello_ads_type");
         		$("#search_type_2").attr("class","hello_ads_type");
         		$("#search_type_3").attr("class","hello_search_type_active");
         		$(".form_login").attr("action","/services");
         		break;
         	}			
         }