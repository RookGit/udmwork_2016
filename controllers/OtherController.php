<?php


include_once ROOT. '/models/Hello.php';

final class OtherController {

	public function actionForDevelopers()
	{
		require_once(ROOT . '/views/other/for_developers.php');
		return true;
	}

	public function actionIndex()
	{
		require_once(ROOT . '/views/other/index.php');
		return true;
	}

	public function actionTags()
	{
		require_once(ROOT . '/views/other/tags.php');
		return true;
	}

}

