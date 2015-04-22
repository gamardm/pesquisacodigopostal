<?php

namespace lib;



use GuzzleHttp\Client;

class PesquisaCodigoPostalAPI {


	function __construct()
	{
		$this->apiConnect = new Client();
		$this->url = \Config::get('api-codigopostal-laravel::url');

		$this->options = [ 'headers' => [ 'X-Auth-Token' => \Config::get('api-codigopostal-laravel::token')]];

	}

	 function obterConcelhos(){

		return var_dump(\Config::get('api-codigopostal-laravel::token'));
	}

	public function codigoPostalExiste($cp4, $cp3){

		$url 		= $this->url.'/v1/cp/exists/'.$cp4.'/'.$cp3;


		$page_data 	= $this->apiConnect->get($url,$this->options);
		$response 	= $page_data->json();

		return $response;
	}

	public function codigoPostal($cp4,$cp3){

		$url 		= $this->url.'/v1/cp/'.$cp4.'/'.$cp3;

		$page_data 	= $this->apiConnect->get($url,$this->options);

		$response 	= $page_data->json();

		return $response;
	}

	public function codigoPostal4Digitos($cp4,$offset){

		$url 		= $this->url.'/v1/cp/'.$cp4.'?offset='.$offset;

		$page_data 	= $this->apiConnect->get($url,$this->options);

		$response 	= $page_data->json();

		return $response;
	}

	public function obterCodigoPostalPorMoradaELocalidade($morada,$localidade){

		return $morada." -". $localidade;
	}

	public function countCodigoPostalPrincipal($cp4){



		$url 		= $this->url.'/v1/cp/count/'.$cp4.'';

		$page_data 	= $this->apiConnect->get($url,$this->options);

		$response 	= $page_data->json();

		return $response;

	}

	public function countCodigoPostal($cp4,$cp3){

		$url 		= $this->url.'/v1/cp/count/'.$cp4.'/'.$cp3.'';


		$page_data 	= $this->apiConnect->get($url,$this->options);

		$response 	= $page_data->json();

		return $response;

	}

}