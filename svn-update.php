<?php
/**
 * FileName: svn-update.php
 * Description: svn自动更新脚本
 * Author: Bigpao
 * Email: bigpao.luo@gmail.com
 * HomePage: 
 * Version: 0.0.1
 * LastChange: 2015-11-27 10:54:27
 * History:
 */

/* project admin */
const UPDATE_ADMIN_COMMAND = '2>&1 /var/www/html/utils-tools/svn-update/shells/admin.sh';

/* project biz */
const UPDATE_BIZ_COMMAND = '2>&1 /var/www/html/utils-tools/svn-update/shells/biz.sh';
//const UPDATE_BIZ_COMMAND_HTML = 'svn update /var/www/html/m.51lianying.com/html/biz/* --username lwh --password 123456';

/* project mobi */
const UPDATE_MOBI_COMMAND = '2>&1 /var/www/html/utils-tools/svn-update/shells/mobi.sh';

/* project wap */
const UPDATE_WAP_COMMAND = '2>&1 /var/www/html/utils-tools/svn-update/shells/wap.sh';

/* project www */
const UPDATE_WWW_COMMAND = '2>&1 /var/www/html/utils-tools/svn-update/shells/www.sh';

/* project weixin */
const UPDATE_WEIXIN_COMMAND = '2>&1 /var/www/html/utils-tools/svn-update/shells/weixin.sh';

/* ZC-Project Update */
const UPDATE_ZC_COMMAND = '2>&1 /var/www/html/utils-tools/svn-update/shells/zhongchou.sh';


/* XDS-Project Update */
const UPDATE_XDS_COMMAND = '2>&1 /var/www/html/utils-tools/svn-update/shells/xds.sh';


$project = isset($_POST['project']) ? $_POST['project'] : false;

$response = array( 'code' => 0 );

if(!$project = trim($project)){
    $response['code'] = 1;
    $response['msg'] = 'the project type cant empty :(';
    goto END;
}

$response['msg'] = " :-)  the project [" . $project . "] update OK.";
switch($project){
    case 'admin':
        $result_set = shell_exec(UPDATE_ADMIN_COMMAND); /* execute command */
        $response['data'][] = explode("\n", $result_set);
        break;
    case 'biz':
        $result_set = shell_exec(UPDATE_BIZ_COMMAND);
        $response['data'][] = explode("\n", $result_set);
        break;
    case 'mobi':
        $result_set = shell_exec(UPDATE_MOBI_COMMAND);
        $response['data'][] = explode("\n", $result_set);
        break;
    case 'wap':
        $result_set = shell_exec(UPDATE_WAP_COMMAND);
        $response['data'][] = explode("\n", $result_set);
        break;
    case 'www':
        $result_set = shell_exec(UPDATE_WWW_COMMAND);
        $response['data'][] = explode("\n", $result_set);
        break;
    case 'weixin':
        $result_set = shell_exec(UPDATE_WEIXIN_COMMAND);
        $response['data'][] = explode("\n", $result_set);
        break;
    case 'zc':
        $result_set = shell_exec(UPDATE_ZC_COMMAND);
        $response['data'][] = explode("\n", $result_set);
        break;

    case 'xds':
        $result_set = shell_exec(UPDATE_XDS_COMMAND);
        $response['data'][] = explode("\n", $result_set);
        break;
    default:
        $response['code'] = 1;
        $response['msg'] = 'Oops! the project not found in svn repository.';
        break;
}

END:
echo json_encode($response);
