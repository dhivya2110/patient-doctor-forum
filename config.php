<?php 

#question types
$cardilogy_type = 1;
$neurology_type = 2;
$cardilogy_cum_neurology_type = 3;

#question category
$personal_category = 1;
$family_category = 1;
$vocation_category = 3;
$community_category = 4;
$social_category = 5;
$recreation_category = 6;
$nutrition_category  = 7;
$physical_activity_category = 8;

$question_category_list = array($personal_category, $family_category, $vocation_category, $community_category,
		 $social_category, $recreation_category, $nutrition_category, $physical_activity_category);

$question_type_list = array($cardilogy_type, $neurology_type, $cardilogy_cum_neurology_type);

#db-credentials
$db_username = 'root';
$db_password = '';
$db_name = 'forum';
$db_hostname = 'localhost';
?>