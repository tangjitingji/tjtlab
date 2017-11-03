<?php

/**
 * Created by PhpStorm.
 * User: tangjiting
 * Date: 2017/11/1
 * Time: 下午9:37
 */
class ModifyPasswordAction extends CommonAction
{
    public function modifypassword()
    {
        $this->display();
    }

    public function doModify()
    {

        $userid=$_SESSION['userid'];
        $password['userpsw']=$_POST['newpwd'];

        $user=M('tjt_studentinfo');
        $where['userid']=$userid;
        $user->where($where)->save($password);

    }

}