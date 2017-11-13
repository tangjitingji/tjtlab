<?php
//返回咨询师完整信息
function ini_consultor() {
    $consultor = M('Admininfo');
    $rows = $consultor->where("role=1 OR role=2 OR role=3")->select();//只显示咨询师
    $grows = array();
    foreach($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['name'];
        $grows[] = $row;
    }
    return $grows;
}

//返回值班咨询师的完整信息(counsel_psychologist)(预约预检模块暂时用到)
function ini_psychologist() {
    $consultor = M('Counsel_psychologist');
    $rows = $consultor->select();
    $grows = array();
    foreach($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['name'];
        $grows[] = $row;
    }
    return $grows;
}


//返回时间段的完整信息
function ini_counsel_period() {
    $period = M('Counsel_period');
    $rows = $period->where("status=1")->select();
    $grows = array();
    foreach ($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['start_time']."-".$value['end_time'];
        $grows[]  = $row;
    }
    return $grows;
}


//返回咨询室的完整信息
function ini_counsel_room() {
    $room = M('Counsel_room');
    $rows = $room->where("status=1")->select();
    $grows = array();
    foreach ($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['address'];//在前端下拉列表显示的字段
        $grows[]  = $row;
    }
    return $grows;
}

//返回一级、二级咨询师完整信息
function ini_consultor_2() {
    $consultor = M('Admininfo');
    $rows = $consultor->where("role=1 OR role=2")->select();//只显示一级、二级咨询师
    $grows = array();
    foreach($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['name'];
        $grows[] = $row;
    }
    return $grows;
}
//返回完整的入学年份信息,如2011级
function ini_grade() {
    $grade = M('Grade');
    $rows = $grade->select();
    $grows = array();
    foreach ($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['grade_name']."级";
        $grows[]  = $row;
    }
    return $grows;
}
function ini_roles(){
    $role = M('Admintype');
    $rows = $role->select();
    $rrows = array();
    foreach ($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['adminType_name'];
        $rrows[]  = $row;
    }
    return $rrows;
}
//返回完整的院系信息(二维数组),如(("title" => xx学院","id" => "1"),("title" => "xx学院","id" => "2"),...)
function ini_department(){
	
	//这里删除了DepartmentModel,因为department表里没有school_id字段,这个Model现在已经不必存在了
    $department = M("Department");
    $rows = $department->select();
    $drows = array();
    foreach ($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['department_name'];
        $drows[] = $row;
    }
    return $drows;
}
//返回完整的教育背景信息
function ini_education() {
    $education = M('Education');
    $rows = $education->select();
    $erows = array();
    foreach ($rows as $value) {
        $row = array();
        $row['id'] = $value['id'];
        $row['title'] = $value['education_name'];
        $erows[] = $row;
    }
    return $erows;
}

function ini_suggestions(){
	$consultsuggestion = M('interview_suggestion');
	$rows = $consultsuggestion->select();
	$srow = array();
	foreach($rows as $value){
		$row = array();
		$row['id'] = $value['id'];
		$row['title'] = $value['name'];
		$srow[] = $row;
	}
	return $srow;
}

/*
划分5个等级: 正常,关注,追踪,高危 ,警戒
 */
function ini_level(){
    $levelArray = array();
    $levelArray[] = array('id'=>0,'title'=>'全部');
    $levelArray[] = array('id'=>1,'title'=>'正常');
    $levelArray[] = array('id'=>9,'title'=>'异常');
    $levelArray[] = array('id'=>2,'title'=>'关注');
    $levelArray[] = array('id'=>3,'title'=>'追踪');
    $levelArray[] = array('id'=>4,'title'=>'高危');
    $levelArray[] = array('id'=>5,'title'=>'警戒');
    return $levelArray;
}

function exportExcel2($expTitle,$expCellName,$expTableData){
    $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
    $fileName = $xlsTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
    $cellNum = count($expCellName);
    $dataNum = count($expTableData);
    vendor("PHPExcel.Classes.PHPExcel");

    $objPHPExcel = new PHPExcel();
    $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

    $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
    // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
    for($i=0;$i<$cellNum;$i++){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
    }
    // Miscellaneous glyphs, UTF-8
    for($i=0;$i<$dataNum;$i++){
        for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), ' '.$expTableData[$i][$expCellName[$j][0]]);
        }
    }

    header('pragma:public');
    header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
    header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
}

function exportexcel($data=array(),$title=array(),$filename='report')
{
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel;charset=GBK");
    header("Content-Disposition:attachment;filename=".$filename.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    //导出xls 开始
    if (!empty($title)){
        foreach ($title as $k => $v) {
            $title[$k]=iconv("UTF-8", "GBK",$v);
        }
        $title= implode("\t", $title);
        echo "$title\n";
    }
    if (!empty($data)){
        $i = 1;
        foreach($data as $key=>$val){
            foreach ($val as $ck => $cv) {
                $data[$key][$ck]=iconv("UTF-8", "GBK", $cv);
            }
            $data[$key]=implode("\t", $data[$key]);
            $data[$key]=$i."\t".$data[$key];
            $i++;
        }
        echo implode("\n",$data);
    }
}

/*
 * 分配咨询师情况
 */
function ini_alloc(){
    $allocArray = array();
    $allocArray[] = array('id'=>0,'title'=>'全部');
    $allocArray[] = array('id'=>1,'title'=>'已分配');
    $allocArray[] = array('id'=>2,'title'=>'未分配');
    return $allocArray;
}
/**
 * 给定主键ID、表名、要查询的字段，返回该字段值
 * @param 	主键ID 	$id
 * @param 	表名	 	$tabel_name
 * @param 	字段名 	$entry_name
 * @return 	字段值
 */
function id2name($id , $tabel_name , $entry_name) {
    $Tabel = M($tabel_name);
    $lists = $Tabel->getById($id);
    return $lists[$entry_name];
}
/**
 * 学号转uid
 */
function convertStuIdToUid($studentId) {
    $map1['studentId'] = array("eq", "$studentId");
    $studentModel = D("Usre://Student");
    $uid = $studentModel->where($map1)->getField('id');
    return $uid;
}
/**
 * 给定列名、表名、相应列的列值，返回其它列的字段值
 * @param 	列名 		 $col_name
 * @param 	表名	 	 $tabel_name
 * @param 	相应列的列值 	 $entry_name
 * @return 	字段值
 */
function col2name($col_name , $col_value , $table_name , $entry_name) {
    $Table = M($table_name);
    $map[$col_name] = array('eq',$col_value);
    $row = $Table->where($map)->find();
    return $row[$entry_name];
}
/**
 * 处理时间格式：09-01-2015 --> 2015-01-09
 */
function date2date($date){
    $temp = explode("-",$date);
    $date = $temp[2]."-".$temp[1]."-".$temp[0];
    return $date;
}

function ini_consultors_arr() {
    $consultor = M('Admininfo');
    $map['role'] = array("BETWEEN",'1,3');
    $consultors = $consultor->where($map)->select();
    $consultors_arr = array('0'=>'未分配');
    foreach($consultors as $c) {
        $consultors_arr[$c['id']] = $c['name'];
    }
    return $consultors_arr;
}

function ini_interviewType_arr() {
    $results = M ( 'interviewtype' )->field('index,name')->select();
    $interviewType_arr = array();
    foreach( $results as $res) {
        $interviewType_arr[$res['index']] = $res['name'];
    }
    return $interviewType_arr;
}

function ini_suggestion_arr() {
    $results = M('Consultsuggestion')->field('index,name')->select();
    $suggestions = array();
    foreach($results as $res) {
        $suggestions[$res['index']] = $res['name'];
    }
    return $suggestions;
}
// 返回攻读学位关联数组  id=>education_name
function ini_education_arr() {
    $results = M('Education')->field('id, education_name')->select();
    $educations = array();
    foreach($results as $res) {
        $educations[$res['id']] = $res['education_name'];
    }
    return $educations;
}
// 返回学院关联数组  id=>department_name
function ini_department_arr() {
    $results = M('department')->field('id, department_name')->select();
    $department = array();
    foreach($results as $res) {
        $department[$res['id']] = $res['department_name'];
    }
    return $department;
}
// 返回入学年份关联数组  id=>grade_name
function ini_grade_arr() {
    $results = M('grade')->field('id, grade_name')->select();
    $grade = array();
    foreach($results as $res) {
        $grade[$res['id']] = $res['grade_name'];
    }
    return $grade;
}
// 返回学生类型关联数组  id=>stu_type_name
function ini_stuType_arr() {
    $results = M('stu_type')->field('id, stu_type_name')->select();
    $stuType = array();
    foreach($results as $res) {
        $stuType[$res['id']] = $res['stu_type_name'];
    }
    return $stuType;
}
// 返回攻读学位关联数组  education_name=>id
function ini_educationName_arr() {
    $results = M('Education')->field('id, education_name')->select();
    $educations = array();
    foreach($results as $res) {
        $educations[$res['education_name']] = $res['id'];
    }
    return $educations;
}
// 返回学院关联数组  department_name=>id
function ini_departmentName_arr() {
    $results = M('department')->field('id, department_name')->select();
    $department = array();
    foreach($results as $res) {
        $department[$res['department_name']] = $res['id'];
    }
    return $department;
}
// 返回入学年份关联数组  grade_name=>id
function ini_gradeName_arr() {
    $results = M('grade')->field('id, grade_name')->select();
    $grade = array();
    foreach($results as $res) {
        $grade[$res['grade_name']] = $res['id'];
    }
    return $grade;
}
// 返回学生类型关联数组  stu_type_name=>id
function ini_stuTypeName_arr() {
    $results = M('stu_type')->field('id, stu_type_name')->select();
    $stuType = array();
    foreach($results as $res) {
        $stuType[$res['stu_type_name']] = $res['id'];
    }
    return $stuType;
}
/**
 * 递归重组节点信息为多维数据
 * @param unknown $node 要处理的节点数组
 * @param number $pid 父级ID
 */
function node_merge($node, $access = null, $pid = 0) {
    $arr = array();
    foreach($node as $v) {
        if(is_array($access)) {
            $v['access'] = in_array($v['id'], $access) ? 1 : 0;
        }
        if($v['pid'] == $pid) {
            $v['child'] = node_merge($node, $access, $v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}

function option($v) {
    if($v == 0)
        echo "<span>不确定</span>";
    if($v == 1)
        echo "<span class='green'>无明显危险</span>";
    if($v == 2)
        echo "<span class='lightblue'>低度危险</span>";
    if($v == 3)
        echo "<span class='yellow'>中度危险</span>";
    if($v == 4)
        echo "<span class='red'>高度危险</span>";
}

function schemes($array) {
    $sch_arr = array(
        0=>"无需干预",1=>"即时监护，防自杀、自残",2=>"即时监护，防暴力攻击",
        3=>"通知院系",4=>"通知家长",5=>"请精神科会诊/送精神病院门诊",6=>"直接送精神病院",
        7=>"预约咨询",8=>"其他"
    );
    foreach($array as $item) {
        echo "<span class='btn btn-warning' style='cursor:default;margin:5px;'>".$sch_arr[$item]."</span>";
    }
}

function main_crisis($v) {
    echo "<span class='btn btn-danger' style='cursor:default;margin-left:5px;'>";
    switch($v) {
        case 0: echo "自杀倾向";break;
        case 1: echo "自残倾向";break;
        case 2: echo "攻击倾向";break;
        case 3: echo "校园性侵犯";break;
        case 4: echo "学业危机";break;
        case 5: echo "离校出走";break;
        case 6: echo "与犯罪相关";break;
        case 7: echo "危险性行为";break;
        case 8: echo "其他";break;
    }
    echo "</span>";
}

function level($score) {
    if($score == 0)
        echo "<span class='badge badge-success'>正常</span>";
    else if($score == 1 || $score == 2)
        echo "<span class='badge badge-info'>关注</span>";
    else if($score >= 3 && $score <= 5)
        echo "<span class='badge badge-warning'>追踪</span>";
    else if($score >= 6 && $score <= 8)
        echo "<span class='badge badge-pink'>高危</span>";
    else if($score >=9)
        echo "<span class='badge badge-danger'>警戒</span>";
}

function msubstr($str,$start,$end,$encoding) {
    $sub = mb_substr($str,$start, $end, $encoding);
    if(strlen($sub) == strlen($str)) {
        return $sub;
    }else{
        return $sub."...";
    }
}

/*系统日志录入*/
function WLog(){
	$log=M('operationlog');
    //获取当前操作者id
    $user_id=session('admin_userid');
    //根据id通过查询admininfo表获取操作者名字
    $user_name=M('admininfo')->field('name')->where("`id` = $user_id")->find();
    $user_name_1=array_values($user_name);
    //dump($user_name['name']);
    //获取当前时间
    $time=date('Y-m-d h:i:s');
    //获取当前控制器名
    $operation=ACTION_NAME;
    //保存当前数据
    $data['consultorId']=$user_id;
    $data['name']=$user_name['name'];
    $data['time']=$time;
    $data['operation']=$operation;
    $resualt=$log->add($data);




	
}
/*
 */


/**
 * 例如 给preview表的preview_record这一列加密
 * @param $key 伪秘钥
 * @param $ivv 伪初始向量
 * @param $data 伪初始向量
 * @return string 返回加密后的数据
 */
function aesencrypt($key, $ivv, $data){
//    $privateKey = md5(strval($key).md5(strval($ivv)));
//    $iv = substr(md5(strval($key)),2,16);
//    $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $privateKey, $data, MCRYPT_MODE_CBC, $iv);
//    $edata = base64_encode($encrypted);
//    return $edata;
    return $data;
}

/**
 * 例如 给preview表的preview_record 这一列解密
 *
 * @param $key 伪秘钥
 * @param $ivv 伪初始向量
 * @param $edata 待解密数据
 * @return string 返回真实数据
 */
function aesdecrypt($key, $ivv, $edata){
//    $privateKey = md5(strval($key).md5(strval($ivv)));
//    $iv = substr(md5(strval($key)),2,16);
//    $encrypted = base64_decode($edata);
//    $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encrypted, MCRYPT_MODE_CBC, $iv);
//    $data = rtrim($decrypted,"\0");
//    return $data ;
    return $edata;

}



?>
