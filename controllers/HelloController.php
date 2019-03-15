<?php


include_once ROOT. '/models/Hello.php';

final class HelloController {

	public function actionForDevelopers()
	{
		require_once(ROOT . '/views/hello/for_developers.php');
		return true;
	}

	public function actionIndex()
	{
		require_once(ROOT . '/views/hello/index.php');
		return true;
	}

	public function actionTags()
	{
		require_once(ROOT . '/views/hello/tags.php');
		return true;
	}

}

