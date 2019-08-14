<?php
/**
 * 扫描目录所有文件，并生成treegrid数据
 * @param string $path     目录
 * @param string $filter   过滤文件名
 * @return array
 */
function scan_dir($path, $filter = SITE_DIR) {
	$result = array();
	$path = realpath($path);

	$path = str_replace(array('/', '\\'), DS, $path);
	$filter = str_replace(array('/', '\\'), DS, $filter);

	$list = glob($path . DS . '*');

	foreach ($list as $key => $filename) {
		$result[$key]['path'] = str_replace($filter, '', $filename);
		$result[$key]['name'] = basename($filename);
		$result[$key]['mtime'] = date('Y-m-d H:i:s', filemtime($filename));

		if (is_dir($filename)) {
			$result[$key]['type'] = 'dir';
			$result[$key]['size'] = '-';
		} else {
			$result[$key]['type'] = 'file';
			$result[$key]['size'] = format_bytes(filesize($filename), ' ');
		}
	}
	return $result;
}

/**
 * 上传目录列表
 * @param string $path 目录名
 * @return array
 */
function file_list_upload($path){
	$config  = C('TMPL_PARSE_STRING');
	switch (strtoupper(C('FILE_UPLOAD_TYPE'))){
		case 'FTP':
			$storage = new \Common\Plugin\Ftp();
			$list    =  $storage->ls($path);
			foreach($list as &$item){
				$item['path'] = ltrim($item['path'], UPLOAD_PATH);
				$item['url']  = str_replace('\\', '/', $item['path']);
			}
			return $list;
			break;

		default:
			$path = realpath($path);
			$path = str_replace(array('/', '\\'), DS, $path);
			$list = glob($path . DS . '*');
			$res  = array();
			foreach ($list as $key => $filename) {
				array_push($res, array(
					'type'  => (is_dir($filename) ? 'dir' : 'file'),
					'name'  => basename($filename),
					'path'  => ltrim(str_replace(realpath(UPLOAD_PATH), '', $filename), DS),
					'size'  => format_bytes(filesize($filename), ' '),
					'mtime' => date('Y-m-d H:i:s', filemtime($filename)),
					'url'   => ltrim(str_replace(array(realpath(UPLOAD_PATH), '\\'), array('', '/'), $filename), '/'),
				));
			}
			return $res;
	}
}

/**
 * 生成UUID
 * @return string 返回UUID字符串
 */
function uuid() {
	$uuid = M()->query('SELECT UUID() AS uuid;');
	return $uuid[0]['uuid'];
}

/**
 * 生成弹出层上传链接
 * @param $callback
 * @param string $ext
 * @return string
 */
function url_upload($callback, $ext = 'jpg|jpeg|png|gif|bmp'){
	$query = array('callback'=>$callback, 'ext'=>$ext);
	$query['sign'] = sign($query);
	return U('Storage/public_dialog', $query);
}

/**
 *  tp的过滤太弱了，有点儿心虚，还是自己写一个吧
 * 
 */
function myfilter($data,$is_ajax=1,$level=1){
    $flag = true;
    if(is_array($data)){
        foreach ($data as $value){
            if(filter_level($value,$level) == false){
                $flag = false;
                break;
            }
        }
    }else{
        if(filter_level($value,$level) == false){
            $flag = false;
        }
    }
    if($flag == false){
        if($is_ajax == 1){
            //异步接口
            $result  =  array();
            $result['status']  =  2;
            $result['info'] =  '参数有误';
            $result['data'] = '';
            header("Content-Type:text/html; charset=utf-8");
            exit(json_encode($result));
        }else{
            return false;
        }
    }else{
        return $data;
    }
}
/**
 *  过滤
 */
function filter_level($value,$level=1){
    if($level == 1){
        $param = '//';
    }else{
        $param = '//';
    }
}











