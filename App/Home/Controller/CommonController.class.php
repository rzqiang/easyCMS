<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 公共控制器
 */
class CommonController extends Controller {

	/**
	 * 空操作，用于输出404页面
	 */
    protected $checkLogin = true;
    
	protected function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->show('<b>Hello, I am 404, nice to meet you!</b>');
		exit;
	}
        
    public function _initialize(){
        $data = [];
        if(!$this->checkLogin){

            return $this->success('请验证身份','/index/login');
        } 
    }
    
    
	
}
