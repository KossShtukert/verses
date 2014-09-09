<?php

class BaseController extends Controller
{
	/**
	 * Layout
	 *
	 * @var string
	 */
	protected $layout = 'layout.main';

	/**
	 * Page title
	 *
	 * @var string
	 */
	protected $title = 'Verses';

	/**
	 * @var null|User
	 */
	protected $user = null;

	/**
	 * Stats
	 *
	 * @var array
	 */
	protected $states = [
		'active'  => 'Active',
		'deleted' => 'Deleted',
		'frozen'  => 'Frozen'
	];

	public function __construct() {
		$this->user = Auth::getUser();

		$this->beforeFilter('csrf', ['on' => 'post']);
	}

	/**
	 * @return null|User
	 */
	protected function getUser() {
		return Auth::getUser();
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout() {
		if (!is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * Set layout content
	 *
	 * @param      $content
	 * @param null $title
	 */
	protected function setContent($content, $title = null) {
		$this->layout->content = $content;

		$this->layout->title = $title ? $title . " &middot; " . $this->title : $this->title;
	}
}