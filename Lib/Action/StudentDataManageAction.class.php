<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class StudentDataManageAction extends CommonAction {

	//导入用户数据
	function import() {
		$this->display();
	}

	function doImport() {
		import('ORG.Util.ExcelToArrary');//导入excelToArray类
		if (! empty ( $_FILES)){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('xls', 'xlsx');// 设置附件上传类型
			$upload->savePath =  './Uploads/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
		}else{
			$this->error('(⊙o⊙)~没上传数据就导入?!Are you kidding me?!');
		}

		$ExcelToArrary=new ExcelToArrary();//实例化
		$res=$ExcelToArrary->read($info[0]['savepath'].$info[0]['savename'],"UTF-8",$info[0]['extension']);//传参,判断office2007还是office2003
		$res = array_slice($res,1); //为了去掉Excel里的表头,也就是$res数组里的$res[0];

		foreach ( $res as $k => $v ){ //循环excel表
			$data[$k]['userid'] = $v [0];//创建二维数组
			$data[$k]['username'] = $v [1];
			$data[$k]['userpsw'] = $v [2];
		}

		$result=M('tjt_studentinfo')->addAll($data);
		if(!$result){
			$this->error('导入数据库失败');
			exit();
		}else{
//			$this->success('导入数据库成功');
			$filename = './Uploads/'.$info[0]['savename'];//上传文件绝对路径
			if (unlink($filename)) {
				$this->success ( '导入数据库成功' );
			}else{
				$this->error('缓存删除失败');
			}
		}

		// 设置一个导入数量上限
		if (count($data) > 10000) {
			throw new Exception('最多一次导入1万条数据,或联系管理员');
		}

	}


	//导出用户数据
	function output(){
		$this->display();
	}

	function exportExcel($filename,$title,$data){

		//导出xls 开始
		if (!empty($title)){
			foreach ($title as $k => $v) {
				$title[$k]=iconv("UTF-8", "GB2312",$v);
			}
			$title= implode("\t", $title);
			echo "$title\n";
		}
		if (!empty($data)){
			foreach($data as $key=>$val){
				foreach ($val as $ck => $cv) {
					$data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
				}
				$data[$key]=implode("\t", $data[$key]);
			}
			echo implode("\n",$data);
		}
		header("Content-type:application/octet-stream");
		header("Accept-Ranges:bytes");
		header("Content-type:application/vnd.ms-excel");
		header("Content-Disposition:attachment;filename=".$filename.".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	}


	public function exportExcel2($expTitle,$expCellName,$expTableData){
		ob_end_clean();
		//$xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
		$fileName = $_SESSION['studentInfo'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
		$cellNum = count($expCellName);
		$dataNum = count($expTableData);

		Vendor("PHPExcel.Classes.PHPExcel");


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
				$objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
			}
		}
		if (!empty($expTitle)){
			foreach ($expTitle as $k => $v) {
				$expTitle[$k]=iconv("UTF-8", "GB2312",$v);
			}
			$expTitle= implode("\t", $expTitle);
			echo "$expTitle\n";
		}
		if (!empty($expTableData)){
			foreach($expTableData as $key=>$val){
				foreach ($val as $ck => $cv) {
					$data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
				}
				$expTableData[$key]=implode("\t", $expTableData[$key]);
			}
			echo implode("\n",$expTableData);
		}

		ob_end_clean();//清除缓存以免乱码出现

		header('pragma:public');
		header('Content-type:application/vnd.ms-excel;name="'.$expTitle.'.xls"');
		header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}

	function push($name,$datau)
	{
		Vendor("PHPExcel.Classes.PHPExcel");
		error_reporting(E_ALL);
		date_default_timezone_set('Asia/Shanghai');
		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("tangjiting");
		$objPHPExcel->getProperties()   ->setLastModifiedBy("tangjiting");
		$objPHPExcel->getProperties()  ->setKeywords("excel");
		$objPHPExcel->getProperties()  ->setCategory("result file");

		$num=1;
		$objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $num, 'userid');
		$objPHPExcel->setActiveSheetIndex() ->setCellValue('B' . $num, 'username');
		$objPHPExcel->setActiveSheetIndex() ->setCellValue('C' . $num, 'userpwd');

		foreach ($datau as $v) {
			$num ++;
			$objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $num, $v['userid']);
			$objPHPExcel->setActiveSheetIndex() ->setCellValue('B' . $num, $v['username']);
			$objPHPExcel->setActiveSheetIndex() ->setCellValue('C' . $num, $v['userpwd']);

		}

		$objPHPExcel->getActiveSheet()->setTitle('User');
		$objPHPExcel->setActiveSheetIndex(0);
		if (!empty($datau)){
			foreach($datau as $key=>$val){
				foreach ($val as $ck => $cv) {
					$datau[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
				}
				$datau[$key]=implode("\t", $datau[$key]);
			}
			echo implode("\n",$datau);
		}
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $name . '.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	/**
	 *
	 * 导出Excel
	 */
	function expUser(){//导出Excel
		$str = date ( 'Ymdhis' );
		$ename=$str.'Excelfile';    //生成的Excel文件文件名
		$edata= M("tjt_studentinfo");   //查出数据
		$edataa = $edata -> select();

		$xlsName  = "UserInfo";
		$xlsCell  = array(
			array('userid','学号'),
			array('username','姓名'),
			array('userpsw','密码'),
		);
		$xlsModel = M('tjt_studentinfo');

		$xlsData  = $xlsModel->Field('userid,username,userpsw')->select();


		$this->exportExcel2($xlsName,$xlsCell,$xlsData);
		//$this->push($xlsName,$xlsData);
		//$this->push($ename,$edataa);

	}

	function search(){
		$obj_model  = M('tjt_studentinfo');
		$where = array();
		//根据姓名查找
		$username = isset($_GET['username']) ? addslashes($_GET['username']) : '';
		//根据学号查找
		$userid = isset($_GET['userid']) ? addslashes($_GET['userid']) : '';
		$where['username'] = array('like', "%$username%");
		$where['userid'] = array('like', "%$userid%");
		//$where['_logic'] = 'or';

		$list = $obj_model->where($where)->order(' userid desc ')->select();

		$this->assign ( "admins", $list);
		//$this->assign ( "admins", $list2);
		$this->assign('username', $username);
		//var_dump("page_list",$show);
//		$this->assign ( "page", $show ); // 赋值分页输出
		$this->display ();
	}
}
?>
