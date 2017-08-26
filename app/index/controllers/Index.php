<?php
/**
 * @name IndexController
 * @author root
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Yaf_Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/YafDemo/index/index/index/name/root 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
        var_dump($this->getRequest()->getParams());
        echo $_SERVER['REQUEST_URI']."*************";
		//1. fetch query 取参数
		$get = $this->getRequest()->getQuery("get", "default value");

        echo $get;

		//2. fetch model
		$model = new SampleModel();

        $mm=new mmModel();

        echo $mm->fun();

        $dir_mm=new dir_dirModel();
        echo $dir_mm->dirfun();


		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);


        //4.使用全局库
        $mysql= new DB_Mysql();
        $mysql->select();

		$this->display('index');
		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        //return TRUE;
	}
    public function showAction(){
        echo "this is index index show Action";
    }
    public $actions=array(

    );
}
