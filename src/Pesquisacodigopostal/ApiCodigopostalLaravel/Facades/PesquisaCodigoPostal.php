<?php
/**
 * Created by PhpStorm.
 * User: gama
 * Date: 12/04/15
 * Time: 20:36
 */
namespace Pesquisacodigopostal\ApiCodigopostalLaravel\Facades;
use Illuminate\Support\Facades\Facade;

class PesquisaCodigoPostal extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'pesquisacodigopostal'; }

}