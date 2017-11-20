<?php

/**
 * Created by PhpStorm.
 * User: tangjiting
 * Date: 2017/11/1
 * Time: 下午9:12
 */
class LoginAction extends Action
{
    public function login()
    {
        $this->display();
    }

    public function doLogin()
    {
        $userid=$_POST['id'];
        $password=$_POST['pw'];
        $code=$_POST['code'];
//        trace($userid,'userid');
//        trace($password,'password');
//        trace($code,'code');
        if(md5($code)!=$_SESSION['code']){
            $this->error('验证码不正确');
        }

        $user=M('tjt_studentinfo');
        $where['userid']=$userid;
        $where['userpsw']=$password;

        $arr=$user->field('userid')->where($where)->find();

        if($arr){
            $_SESSION['userid']=$userid;
            $_SESSION['userid']=$arr['userid'];

            $this->success('用户登录成功',__APP__.'/Index/index');
        }else{
            $this->error('该用户不存在或密码错误');
        }
    }
    public function doLogout(){
        $where['userid']=$_SESSION['userid'];
        $_SESSION=array();
        if(isset($_COOKIE[session_name()])){
            $user=M('tjt_studentinfo');
            setcookie(session_name(),'',time()-1,'/');
        }
        session_destroy();
        $this->redirect('Index/index');
    }

}