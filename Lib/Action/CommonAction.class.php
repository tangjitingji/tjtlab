<?php
	class CommonAction extends Action{
		public function _initialize(){
			if(!isset($_SESSION['userid']) || $_SESSION['userid']==''){
				$this->redirect('Login/login');
			}
		}
	}
?>