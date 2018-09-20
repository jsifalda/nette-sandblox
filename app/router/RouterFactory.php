<?php

declare(strict_types=1);

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): Nette\Application\IRouter
	{
		$router = new RouteList;
		$adminList = new RouteList('Admin');
		$adminList[] = new Route('admin/<presenter>/<action>[/<id>]', 'Dashboard:default');
		$router[] = $adminList;
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}
}
