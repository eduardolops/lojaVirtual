<?php

namespace app\classes;
use \app\interfaces\iCarrinho;


class carrinho implements iCarrinho{

	private $sessionId;
	private $debug;

	public function __construct($sessionId){
		$this->sessionId = $sessionId;

		if(!isset($_SESSION[$sessionId]['carrinho'])){
			$_SESSION[$sessionId]['carrinho'] = array();
		}
	}

	public function adicionarCarrinho($id){
		if(!isset($_SESSION[$this->sessionId]['carrinho'][$id])){
			$_SESSION[$this->sessionId]['carrinho'][$id] = array();
			$_SESSION[$this->sessionId]['carrinho'][$id]['qtde'] = 0;
		}

		if($_SESSION[$this->sessionId]['carrinho'][$id]['qtde'] > 0){
			$_SESSION[$this->sessionId]['carrinho'][$id]['qtde'] += 1;
		}else{
			$_SESSION[$this->sessionId]['carrinho'][$id]['qtde'] = 1;
		}

	}
	public function atualizarCarrinho($id,$qtde){
		if(isset($_SESSION[$this->sessionId]['carrinho'][$id])){
			$_SESSION[$this->sessionId]['carrinho'][$id]['qtde'] = $qtde;
		}
	}

	public function deletarProdutoCarrinho($id){
		if(isset($_SESSION[$this->sessionId]['carrinho'][$id])){
			unset($_SESSION[$this->sessionId]['carrinho'][$id]);
		}
	}

	public function deletarCarrinho(){
		unset($_SESSION[$this->sessionId]['carrinho']);
	}

	public function produtosCarrinho(){
		if(isset($_SESSION[$this->sessionId]['carrinho'])){
			return $_SESSION[$this->sessionId]['carrinho'];
		}
	}

	public function debugCarrinho(){
		$this->debug = '<pre>';
		$this->debug.= var_dump($_SESSION[$this->sessionId]['carrinho']);
		$this->debug.= '</pre>';
		return $this->debug;
	}

}