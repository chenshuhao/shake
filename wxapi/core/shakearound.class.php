<?php
namespace wxapi\core;

/**
 * 微信摇一摇周边
 */
class shakearound {

	/**
     * 申请开通功能
     * 申请开通摇一摇周边功能。
     * 成功提交申请请求后，工作人员会在三个工作日内完成审核。
     * 若审核不通过，可以重新提交申请请求。
     * 若是审核中，请耐心等待工作人员审核，在审核中状态不能再提交申请请求。
     *
     * @return json
     * {
     * 		"data": {
     *   		"apply_time": 1432026025,// 提交申请的时间戳
     *     		"audit_comment": "test",// 审核备注，包括审核不通过的原因
     *       	"audit_status": 1, //审核状态。0：审核未通过、1：审核中、2：审核已通过；审核会在三个工作日内完成
     *        	"audit_time": 0// 确定审核结果的时间戳；若状态为审核中，则该时间值为0
     *      },
     *      "errcode": 0,
     *      "errmsg": "success."
     * }
     */
    public static function accountregister() {//no
    	// 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $url = 'https://api.weixin.qq.com/shakearound/account/register?access_token=' . $accesstoken;
        // https://api.weixin.qq.com/shakearound/account/register?access_token=ACCESS_TOKEN
        

        return curl::callwebserver($url, '', 'post');
    }

	/**
     * 查询审核状态
     * 查询已经提交的开通摇一摇周边功能申请的审核状态。在申请提交后，工作人员会在三个工作日内完成审核。
     *
     * @return json
     * {
     * 		"data": {
     *   		"apply_time": 1432026025,// 提交申请的时间戳
     *     		"audit_comment": "test",// 审核备注，包括审核不通过的原因
     *       	"audit_status": 1, //审核状态。0：审核未通过、1：审核中、2：审核已通过；审核会在三个工作日内完成
     *        	"audit_time": 0// 确定审核结果的时间戳；若状态为审核中，则该时间值为0
     *      },
     *      "errcode": 0,
     *      "errmsg": "success."
     * }
     */
    public static function accountauditstatus() {
    	// 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/shakearound/account/auditstatus?access_token=' . $accesstoken;
        $queryaction = 'get';
        return curl::callwebserver($queryurl, '', $queryaction);
    }

    /**
     * 申请设备ID，申请配置设备所需的UUID、Major、Minor。
     * 若激活率小于50%，不能新增设备。
     * 申请成功后返回批次ID，可用返回的批次ID通过“查询设备ID申请状态”接口查询目前申请的审核状态。
     * 若单次申请的设备ID数量小于500个，系统会进行快速审核；若单次申请的设备ID数量大于等 500个 ，会在三个工作日内完成审核。
     * 如果已审核通过，可用返回的批次ID通过“查询设备列表”接口拉取本次申请的设备ID。 通过接口申请的设备ID，需先配置页面，若未配置页面，则摇不出页面信息。
     * 一个公众账号最多可申请200000个设备ID，如需申请的设备ID数超过最大限额，请邮件至zhoubian@tencent.com
     *
     * @param array $data
     * array(
     *      "quantity" => 3,// 申请的设备ID 的数量，单次新增设备超过500 个,需走人工审核流程(必填)
     *      "apply_reason" => "测试",// 申请理由，不超过100个汉字或200个英文字母(必填)
     *      "comment" => "测试专用",// 备注，不超过15个汉字或30个英文字母(非必填)
     *      "poi_id" => 1234 // 设备关联的门店ID，关联门店后，在门店1KM的范围内有优先摇出信息的机会。(非必填)
     * )
     * @return 
     */
    public static function deviceapplyid($quantity, $apply_reason, $comment, $poi_id = null) {
    	// 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/shakearound/device/applyid?access_token=' . $accesstoken;
        $queryaction = 'post';
        $template = array(
            "quantity" => $quantity,
            "apply_reason" => $apply_reason,
            "comment" => $comment,
            "poi_id" => $poi_id
        );
        $template = json_encode($template);
        return curl::callwebserver($queryurl, $template, $queryaction);
    }



    /**
     * 新增页面
     * 新增摇一摇出来的页面信息，包括在摇一摇页面出现的主标题、副标题、图片和点击进去的超链接。
     * 其中，图片必须为用素材管理接口上传至微信侧服务器后返回的链接。
     * @param  [type] $title       在摇一摇页面展示的主标题，不超过6个汉字或12个英文字母
     * @param  [type] $description 在摇一摇页面展示的副标题，不超过7个汉字或14个英文字母
     * @param  [type] $icon_url    在摇一摇页面展示的图片。图片需先上传至微信侧服务器，用“素材管理-上传图片素材”接口上传图片，返回的图片URL再配置在此处
     * @param  [type] $page_url    [description]
     * @param  string $comment     页面的备注信息，不超过15个汉字或30个英文字母
     * @return [type]              
     * {
     * "data": {
     * "page_id": 28840
     * }
     * "errcode": 0,
     * "errmsg": "success."
     * }
     */
    public static function pageadd($title, $description, $icon_url, $page_url, $comment = '') {
    	// 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/shakearound/page/add?access_token=' . $accesstoken;
        $queryaction = 'post';
        $data = array();
        $data = array(
            "title" => $title,
            "description" => $description,
            "icon_url" => $icon_url,
            "page_url" => $page_url,
            "comment" => $comment
        );
        $data = json_encode($data);
        return curl::callwebserver($queryurl, $data, $queryaction);
    }

    /**
     * 编辑页面信息
     * 编辑摇一摇出来的页面信息，包括在摇一摇页面出现的主标题、副标题、图片和点击进去的超链接。
     * @param  [type] $page_id 指定页面的id（必填）
     * @return [type] 
     * {
     * "data": {
     * 
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }         
     */
//    public static function pagedelete($page_id) {
//    	// 获取access_token
//        $accesstoken = accesstoken::getaccesstoken();
//        $queryurl = 'https://api.weixin.qq.com/shakearound/page/delete?access_token=' . $accesstoken;
//        $queryaction = 'post';
//        $data = array();
//        $data['page_id'] = $page_id;
//        return curl::callwebserver($queryurl, $data, $queryaction);
//    }
//
//    /**
//     * 查询页面列表
//     * 查询已有的页面，包括在摇一摇页面出现的主标题、副标题、图片和点击进去的超链接。
//     * 提供两种查询方式，可指定页面ID查询，也可批量拉取页面列表。
//     * @param  [type] $page_id 指定页面的id（必填）
//     * @return [type]
//     * {
//     * "data": {
//     *
//     * },
//     * "errcode": 0,
//     * "errmsg": "success."
//     * }
//     */
//    public static function pagedelete($page_id) {
//    	// 获取access_token
//        $accesstoken = accesstoken::getaccesstoken();
//        $queryurl = 'https://api.weixin.qq.com/shakearound/page/delete?access_token=' . $accesstoken;
//        $queryaction = 'post';
//        $data = array();
//        $data['page_id'] = $page_id;
//        return curl::callwebserver($queryurl, $data, $queryaction);
//    }
//
//    /**
//     * 删除页面
//     * 删除已有的页面，包括在摇一摇页面出现的主标题、副标题、图片和点击进去的超链接。
//     * 只有页面与设备没有关联关系时，才可被删除。
//     * @param  [type] $page_id 指定页面的id（必填）
//     * @return [type]
//     * {
//     * "data": {
//     *
//     * },
//     * "errcode": 0,
//     * "errmsg": "success."
//     * }
//     */
//    public static function pagedelete($page_id) {
//    	// 获取access_token
//        $accesstoken = accesstoken::getaccesstoken();
//        $queryurl = 'https://api.weixin.qq.com/shakearound/page/delete?access_token=' . $accesstoken;
//        $queryaction = 'post';
//        $data = array();
//        $data['page_id'] = $page_id;
//        return curl::callwebserver($queryurl, $data, $queryaction);
//    }

    /**
     * 上传图片素材
     * 上传在摇一摇功能中需使用到的图片素材，素材保存在微信侧服务器上。
     * 图片格式限定为：jpg,jpeg,png,gif。
     *
     * 若图片为在摇一摇页面展示的图片，则其素材为icon类型的图片，图片大小建议120px*120 px，限制不超过200 px *200 px，图片需为正方形。
     *
     * 若图片为申请开通摇一摇周边功能需要上传的资质文件图片，则其素材为license类型的图片，图片的文件大小不超过2MB，尺寸不限，形状不限。
     *
     * @param $filename，文件绝对路径,图片名字(必填)
     * @param $type, icon：摇一摇页面展示的icon图；license：申请开通摇一摇周边功能时需上传的资质文件；若不传type，则默认type=icon
     * @return 
     * {
     * "data": {
     * "pic_url":
     * "http://shp.qpic.cn/wechat_shakearound_pic/0/1428377032e9dd2797018cad79186e03e8c5aec8dc/120"
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * 图片url地址，若type=icon，可用在“新增页面”和“编辑页面”的“icon_url”字段；若type= license，可用在“申请入驻”的“qualification_cert_urls”字段
     * http://shp.qpic.cn/wx_shake_bus/0/1446098396e9dd2797018cad79186e03e8c5aec8dc/120
     */
    public static function materialadd($filename, $type = 'icon') {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/shakearound/material/add?access_token=' . $accesstoken . '&type=' . $type;
        $data = array();
        $data['media'] = '@' . $filename;
        return curl::callwebserver($queryurl, $data, 'post', 1, 0);
    }

    //==================================================================================================================

	/**
     * @param $appay_id
     * @param $num
     *
     * @return array|bool
     */
    static public function getDriveListByApplyId($appay_id,$num)
    {
        $accesstoken = accesstoken::getaccesstoken();
        if(!$accesstoken) return false;
        $queryurl = 'https://api.weixin.qq.com/shakearound/device/search?access_token=' . $accesstoken ;

        if($num > 50){
            $return = array();
            for($i=0;$i<$num;$i+=49){
                $data = json_encode(array(
                    'type'=>3,
                    'apply_id'=>(int)$appay_id,
                    'begin' => (int)$i,
                    'count' => (int)$i+49
                ));
                $res = curl::callwebserver($queryurl, $data, 'post');
                if($res['errmsg'] == 'success.') array_merge($return,$res['data']['devices']);
            }

            if(!$return) return false;
            return $return;

        }else{
            $data = json_encode(array(
                'type'=>3,
                'apply_id'=>(int)$appay_id,
                'begin' => 0,
                'count' => (int)$num
            ));

            $res = curl::callwebserver($queryurl, $data, 'post');
            if($res['errmsg'] == 'success.') return $res['data']['devices'];
            return false;
        }
    }

	/**
     * @param $apply_id
     *
     * @return bool
     */
    static public function getRegStatus($apply_id)
    {
        $accesstoken = accesstoken::getaccesstoken();
        if(!$accesstoken) return false;
        $queryurl = 'https://api.weixin.qq.com/shakearound/device/applystatus?access_token=' . $accesstoken ;

        $data = json_encode(array(
            'apply_id'=>(int)$apply_id
        ));


        $res = curl::callwebserver($queryurl, $data, 'post');
        if($res['errmsg'] == 'success.'){
           return $res['data'];
        }

        return false;


    }




}