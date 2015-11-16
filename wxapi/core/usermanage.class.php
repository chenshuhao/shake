<?php
namespace wxapi\core;

/**
 * 用户管理类
 */
class usermanage {

    /**
     * @descrpition 创建分组,一个公众账号，最多支持创建100个分组。
     * @param $groupname 分组名字（30个字符以内）utf-8
     * @return json {"group": {"id": 107,"name": "test"}}
     */
    public static function creategroup($groupname) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/groups/create?access_token=' . $accesstoken;
        $data = '{"group":{"name":"' . $groupname . '"}}';
        return curl::callwebserver($queryurl, $data, 'post');
    }

    /**
     * @descrpition 获取分组列表
     * @return json {"groups":[{"id": 0,"name": "未分组", "count": 72596}]}
     */
    public static function getgrouplist() {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/groups/get?access_token=' . $accesstoken;
        $data = '';
        return curl::callwebserver($queryurl, $data, 'get');
    }

    /**
     * @descrpition 查询用户所在分组
     * @param $openid 用户唯一openid
     * @return json {"groupid": 102}
     */
    public static function getgroupbyopenid($openid) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/groups/getid?access_token=' . $accesstoken;
        $data = '{"openid":"' . $openid . '"}';
        return curl::callwebserver($queryurl, $data, 'post');
    }

    /**
     * @descrpition 修改分组名
     * @param $groupid 要修改的分组id
     * @param $groupname 新分组名
     * @return json {"errcode": 0, "errmsg": "ok"}
     */
    public static function editgroupname($groupid, $groupname) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/groups/update?access_token=' . $accesstoken;
        $data = '{"group":{"id":' . $groupid . ',"name":"' . $groupname . '"}}';
        return curl::callwebserver($queryurl, $data, 'post');
    }

    /**
     * @descrpition 移动用户分组
     * @param $openid 要移动的用户openid
     * @param $to_groupid 移动到新的组id
     * @return json {"errcode": 0, "errmsg": "ok"}
     */
    public static function editusergroup($openid, $to_groupid) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token=' . $accesstoken;
        $data = '{"openid":"' . $openid . '","to_groupid":' . $to_groupid . '}';
        return curl::callwebserver($queryurl, $data, 'post');
    }

    /**
     * @descrpition 批量移动用户分组
     * @param $openid_list 要移动的用户openid,（size不能超过50）
     * array(
     *     'ogTMntzqEOg1QNx_DvQ-7Jr9nJjw',
     *     'ogTMntzqEOg1QNx_DvQ-7Jr9nJjw'
     * );
     * ["ogTMntzqEOg1QNx_DvQ-7Jr9nJjw","ogTMntzqEOg1QNx_DvQ-7Jr9nJjw"]
     * @param $to_groupid 移动到新的组id
     * @return json {"errcode": 0, "errmsg": "ok"}
     */
    public static function batcheditusergroup($openid_list, $to_groupid) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/groups/members/batchupdate?access_token=' . $accesstoken;
        $data = '{"openid_list":' . json_encode($openid_list) . ',"to_groupid":' . $to_groupid . '}';
        return curl::callwebserver($queryurl, $data, 'post');
    }

    /**
     * @descrpition 删除用户分组,删除一个用户分组，删除分组后，所有该分组内的用户自动进入默认分组。
     * @param $groupid 要删除的用户分组id
     * @return json {"errcode": 0, "errmsg": "ok"}
     */
    public static function delgroup($groupid) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/groups/delete?access_token=' . $accesstoken;
        $data = '{"group":{"id":' . $to_groupid . '}}';
        return curl::callwebserver($queryurl, $data, 'post');
    }

    /**
     * @descrpition 获取用户基本信息
     * @param $openid 用户唯一openid
     * @param $lang 语言
     * @return json {
     * "subscribe": 1,    //用户是否订阅该公众号标识，值为0时，代表此用户没有关注该公众号，拉取不到其余信息
     * "openid": "ogTMntzqEOg1QNx_DvQ-7Jr9nJjw",
     * "nickname": "liuan",
     * "sex": 1,          //用户的性别，值为1时是男性，值为2时是女性，值为0时是未知
     * "language": "zh_CN",
     * "city": "扬州",
     * "province": "江苏",
     * "country": "中国",
     * "headimgurl":    "http://wx.qlogo.cn/mmopen/ajNVdqHZLLDtdkINwIYF4J7JtYwVERbG6roQocVy7YyYXtZzEzia5Bhwg0By4OmRoanbDEBMo6oCOYCyjRv8wFg/0",
     * "subscribe_time": 1442054503
     * "remark": \u5feb\u4e86\u5feb\u4e86
     * "groupid": 100
     * }
     * remark,公众号运营者对粉丝的备注，公众号运营者可在微信公众平台用户管理界面对粉丝添加备注
     * unionid字段 只有在用户将公众号绑定到微信开放平台账号后，才会出现。建议调用前用isset()检测一下
     */
    public static function getuserinfo($openid, $lang = 'zh_CN') {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . $accesstoken . '&openid=' . $openid . '&lang=' . $lang;
        return curl::callwebserver($queryurl, '', 'get');
    }

    /**
     * @descrpition 批量获取用户基本信息
     * 开发者可通过该接口来批量获取用户基本信息。最多支持一次拉取100条。
     * @return json {
     * "subscribe": 1,    //用户是否订阅该公众号标识，值为0时，代表此用户没有关注该公众号，拉取不到其余信息
     * "openid": "ogTMntzqEOg1QNx_DvQ-7Jr9nJjw",
     * "nickname": "liuan",
     * "sex": 1,          //用户的性别，值为1时是男性，值为2时是女性，值为0时是未知
     * "language": "zh_CN",
     * "city": "扬州",
     * "province": "江苏",
     * "country": "中国",
     * "headimgurl":    "http://wx.qlogo.cn/mmopen/ajNVdqHZLLDtdkINwIYF4J7JtYwVERbG6roQocVy7YyYXtZzEzia5Bhwg0By4OmRoanbDEBMo6oCOYCyjRv8wFg/0",
     * "subscribe_time": 1442054503
     * "remark": \u5feb\u4e86\u5feb\u4e86
     * "groupid": 100
     * }
     * remark,公众号运营者对粉丝的备注，公众号运营者可在微信公众平台用户管理界面对粉丝添加备注
     * unionid字段 只有在用户将公众号绑定到微信开放平台账号后，才会出现。建议调用前用isset()检测一下
     */
    public static function batchgetuserinfo($openid_list) {






        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=' . $accesstoken;
        $data = '{"user_list":' . json_encode($openid_list) . '}';
        return curl::callwebserver($queryurl, $data, 'post');
    }

    /**
     * @descrpition 获取关注者列表
     * @param $next_openid 第一个拉取的openid，不填默认从头开始拉取,一次拉取调用最多拉取10000个关注者的openid
     * @return json {"total":2,"count":2,"data":{"openid":["openid1","openid2"]},"next_openid":"next_openid"}
     */
    public static function getfanslist($next_openid = '') {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        if (empty($next_openid)) {
            $queryurl = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=' . $accesstoken;
        } else {
            $queryurl = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=' . $accesstoken . '&next_openid=' . $next_openid;
        }
        return curl::callwebserver($queryurl, '', 'get');
    }

    /**
     * 设置备注名 开发者可以通过该接口对指定用户设置备注名，该接口暂时开放给微信认证的服务号。
     * @param $openid 用户的openid
     * @param $remark 新的昵称
     * @return array('errorcode'=>0, 'errmsg'=>'ok') 正常时是0
     */
    public static function setremark($openid, $remark) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=' . $accesstoken;
        $data = json_encode(array('openid'=>$openid, 'remark'=>$remark));
        return curl::callwebserver($queryurl, $data, 'post');
    }

    /**
     * @descrpition 获取网络状态
     * @return string network_type:wifi wifi网络。network_type:edge 非wifi,包含3G/2G。network_type:fail 网络断开连接
     */
    public static function getnetworkstate() {
        echo "WeixinJSBridge.invoke('getNetworkType',{},
		function(e){
	    	WeixinJSBridge.log(e.err_msg);
	    });";
    }
}