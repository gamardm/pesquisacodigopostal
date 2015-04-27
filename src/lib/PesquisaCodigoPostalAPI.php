<?php

namespace lib;



use GuzzleHttp\Client;

class PesquisaCodigoPostalAPI {


	function __construct()
	{
		$this->apiConnect = new Client();
		$this->url = 'http://api.pesquisacodigopostal.pt';

		$this->options = [ 'headers' => [ 'X-Auth-Token' => \Config::get('api-codigopostal-laravel::token')]];

	}


	private function call($url){

		$page_data 	= $this->apiConnect->get($url,$this->options);
		$response 	= $page_data->json();

		return $response;
	}

	public function codigoPostalExiste($cp4, $cp3){

		$url 		= $this->url.'/v1/cp/exists/'.$cp4.'/'.$cp3;

		return $this->call($url);
	}

	public function codigoPostal($cp4,$cp3,$offset){

		$url 		= $this->url.'/v1/cp/'.$cp4.'/'.$cp3.'?offset='.$offset;

		return $this->call($url);

	}

	public function codigoPostal4Digitos($cp4,$offset){

		$url 		= $this->url.'/v1/cp/'.$cp4.'?offset='.$offset;

		return $this->call($url);

	}

	public function obterCodigoPostalPorMoradaELocalidade($morada,$localidade, $offset){

		$url 		= $this->url.'/v1/morada/'.$morada.'/localidade/'.$localidade.'?offset='.$offset;

		return $this->call($url);

	}

	public function obterCodigoPostalPorMorada($morada, $offset){

		$url 		= $this->url.'/v1/morada/'.$morada.'?offset='.$offset;

		return $this->call($url);

	}
	public function countCodigoPostalPorMoradaELocalidade($morada, $localidade){

		$url 		= $this->url.'/v1/count/morada/'.$morada.'/localidade/'.$localidade;

		return $this->call($url);

	}

	public function countCodigoPostalPorMorada($morada){
		$url 		= $this->url.'/v1/count/morada/'.$morada;

		return $this->call($url);
	}

	public function countCodigoPostalPrincipal($cp4){


		$url 		= $this->url.'/v1/cp/count/'.$cp4.'';

		return $this->call($url);


	}

	public function countCodigoPostal($cp4,$cp3){

		$url 		= $this->url.'/v1/cp/count/'.$cp4.'/'.$cp3.'';

		return $this->call($url);


	}

}