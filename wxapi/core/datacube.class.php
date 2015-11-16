<?php
namespace wxapi\core;

/**
 * 数据统计
 */
class datacube {

    protected static $queryurl = array(
        // 用户分析
        'user' => array(
            // 获取用户增减数据（getusersummary）
            'summary' => 'https://api.weixin.qq.com/datacube/getusersummary?',
            // 获取累计用户数据（getusercumulate）
            'cumulate' => 'https://api.weixin.qq.com/datacube/getusercumulate?',
        ),
        // 图文分析
        'article' => array(
            'summary' => '/datacube/getarticlesummary?',//获取图文群发每日数据（getarticlesummary）
            'total' => '/datacube/getarticletotal?',//获取图文群发总数据（getarticletotal）
            'read' => '/datacube/getuserread?',//获取图文统计数据（getuserread）
            'readhour' => '/datacube/getuserreadhour?',//获取图文统计分时数据（getuserreadhour）
            'share' => '/datacube/getusershare?',//获取图文分享转发数据（getusershare）
            'sharehour' => '/datacube/getusersharehour?',//获取图文分享转发分时数据（getusersharehour）
        ),
        // 消息分析
        'upstreammsg' => array(
            'summary' => '/datacube/getupstreammsg?',//获取消息发送概况数据（getupstreammsg）
            'hour' => '/datacube/getupstreammsghour?',//获取消息分送分时数据（getupstreammsghour）
            'week' => '/datacube/getupstreammsgweek?',//获取消息发送周数据（getupstreammsgweek）
            'month' => '/datacube/getupstreammsgmonth?',//获取消息发送月数据（getupstreammsgmonth）
            'dist' => '/datacube/getupstreammsgdist?',//获取消息发送分布数据（getupstreammsgdist）
            'distweek' => '/datacube/getupstreammsgdistweek?',//获取消息发送分布周数据（getupstreammsgdistweek）
            'distmonth' => '/datacube/getupstreammsgdistmonth?',//获取消息发送分布月数据（getupstreammsgdistmonth）
        ),
        // 接口分析
        'interface' => array(
            // 获取接口分析数据（getinterfacesummary）
            'summary' => 'https://api.weixin.qq.com/datacube/getinterfacesummary?',
            // 获取接口分析分时数据（getinterfacesummaryhour）
            'summaryhour' => 'https://api.weixin.qq.com/datacube/getinterfacesummaryhour?',
        )
    );

    protected static $action = 'post';

    /**
     * @descrpition 获取统计数据
     * @param $type string 数据分类(user|article|upstreammsg|interface)分别为(用户分析|图文分析|消息分析|接口分析)
     * @param $subtype string 数据子分类，参考 queryurl 常量定义部分
     * @param string $begin_date 开始时间
     * @param string $end_date   结束时间
     * @return boolean|array 成功返回查询结果数组，其定义请看官方文档
     */
    public static function getdatacube($type, $subtype, $begin_date, $end_date = '') {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        if (!isset(self::$DATACUBE_URL_ARR[$type]) || !isset(self::$DATACUBE_URL_ARR[$type][$subtype]))
            return false;
$result = $this->http_post(self::API_BASE_URL_PREFIX.self::$DATACUBE_URL_ARR[$type][$subtype].'access_token='.$this->access_token,self::json_encode($data));
        
        // self::$queryurl = self::$queryurl . $accesstoken;

        // 开始
        // $template = array(
        //     'touser'=>$tousername,
        //     'msgtype'=>'text',
        //     'text'=>array(
        //         'content'=>$content,
        //     ),
        // );
        $template = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date ? $end_date : $begin_date
        );
        // $template = json_encode($template);
        
        return curl::callwebserver(self::$queryurl, $template, self::$action);
    }
}