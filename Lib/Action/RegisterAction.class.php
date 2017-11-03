<?php

/**
 * Created by PhpStorm.
 * User: tangjiting
 * Date: 2017/11/2
 * Time: 下午5:40
 */
class RegisterAction extends Action{
    public function register(){
        $this->display();
    }

    public function doReg(){
        if ($_POST['pw'] == $_POST['repw']){
            $arr = array('userid' => $_POST['id'],
                'username' => $_POST['name'],
                'userpsw' => $_POST['pw']);
            M('tjt_studentinfo')->add($arr);
            $this->success('注册成功',__APP__.'/Login/login');
        }else {
            $this->error('两次输入密码不一致！');
        }

    }
}
?>
