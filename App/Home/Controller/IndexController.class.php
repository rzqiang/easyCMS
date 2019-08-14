<?php
/**
 * @author Str
 */
namespace Home\Controller;
use Home\Controller\CommonController;
class IndexController extends CommonController {
        
    
    public $checkLogin = true; 
    /**
    *  Home page
    */
	public function index(){
		$this->assign('name','Hello easyCMS');
		$this->display();
	}

    
}
