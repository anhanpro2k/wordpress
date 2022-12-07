<?php

/**
 * Undocumented class
 */
class MonaCore extends Setup_Theme {

	public function load_core() {
		parent::__construct();
		$this->include_files();
	}

	public function include_files() {
		$regsiter_load_files = [
			'app/controllers'           => [
				'method'   => '',
				'autoload' => array(
					'mona-class-notice.php',
					'class-mona-posts.php',
					'class-mona-singlePost.php',
					'class-mona-elements.php'
				),
			],
			'app/ajax'                  => [
				'method'   => '',
				'autoload' => array(
					'default-ajax.php',
					'mentor-ajax.php'
				),
			],
			'app/modules/comments'      => [
				'method'   => '',
				'autoload' => '',
			],
			'app/modules/login'         => [
				'method'   => '',
				'autoload' => '',
			],
			'app/modules/widgets'       => [
				'method'   => '',
				'autoload' => array(
					'class.callback.php',
					'class.widget.php'
				),
			],
			'app/modules/widgets/admin' => [
				'method'   => '',
				'autoload' => array(
					'widget-default-text.php',
				),
			],
			'core'                      => [
				'method'   => '',
				'autoload' => [
					'walker-menu.php',
					'regsiter-post-type.php',
					'customizer.php',
					'hooks.php',
					'functions.php',
				],
			],
		];

		if ( is_array( $regsiter_load_files ) ) {
			foreach ( $regsiter_load_files as $path => $file ) {
				$filePath     = $path;
				$autoladFiles = $file['autoload'];
				if ( ! empty ( $autoladFiles ) ) {
					foreach ( $autoladFiles as $loadFile ) {
						$file_path = get_template_directory() . '/' . $filePath . '/' . $loadFile;
						if ( file_exists( $file_path ) ) {
							require_once( $file_path );
						}
					}
				}
			}
		}
	}

}