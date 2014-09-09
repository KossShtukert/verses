<?php

class HomeController extends BaseController
{
	public function showIndex() {
		$this->setContent(View::make('index'));
	}
}