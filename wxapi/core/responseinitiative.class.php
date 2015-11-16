<?php
namespace wxapi\core;

/**
 * 发送主动响应
 */
class responseinitiative {

    protected static $queryurl = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=';

    protected static $action = 'post';

    /**
     * @descrpition 文本
     * @param $tousername
     * @param $content 回复的消息内容（换行：在content中能够换行，微信客户端就支持换行显示）
     * @return string
     */
    public static function text($tousername, $content) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        self::$queryurl = self::$queryurl . $accesstoken;

        // 开始
        $template = array(
            'touser' => $tousername,
            'msgtype' => 'text',
            'text' => array(
                'content' => $content,
            ),
            'customservice' => array(
                'kf_account' => "1001@yzyylm",
            )
        );
        $template = common::json_encode($template);
        return curl::callwebserver(self::$queryurl, $template, self::$action);
    }

    /**
     * @descrpition 图片
     * @param $tousername
     * @param $mediaid 通过上传多媒体文件，得到的id。
     * @return string
     */
    public static function image($tousername, $mediaid) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        self::$queryurl = self::$queryurl . $accesstoken;

        // 开始
        $template = array(
            'touser' => $tousername,
            'msgtype' => 'image',
            'image' => array(
                'media_id' => $mediaid,
            ),
        );
        $template = common::json_encode($template);
        return curl::callwebserver(self::$queryurl, $template, self::$action);
    }

    /**
     * @descrpition 语音
     * @param $tousername
     * @param $mediaid 通过上传多媒体文件，得到的id
     * @return string
     */
    public static function voice($tousername, $mediaid) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        self::$queryurl = self::$queryurl . $accesstoken;

        // 开始
        $template = array(
            'touser' => $tousername,
            'msgtype' => 'voice',
            'voice' => array(
                'media_id' => $mediaid,
            ),
        );
        $template = common::json_encode($template);
        return curl::callwebserver(self::$queryurl, $template, self::$action);
    }

    /**
     * @descrpition 视频
     * @param $tousername
     * @param $mediaid 通过上传多媒体文件，得到的id
     * @param $title 标题
     * @param $description 描述
     * @return string
     */
    public static function video($tousername, $mediaid, $thumbmediaid, $title, $description) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        self::$queryurl = self::$queryurl . $accesstoken;

        // 开始
        $template = array(
            'touser'=>$tousername,
            'msgtype'=>'video',
            'video'=>array(
                'media_id' => $mediaid,
                "thumb_media_id" => $thumbmediaid,
                'title' => $title,
                'description' => $description,
            ),
        );
        $template = common::json_encode($template);
        return curl::callwebserver(self::$queryurl, $template, self::$action);
    }

    /**
     * @descrpition 音乐
     * @param $tousername
     * @param $title 标题
     * @param $description 描述
     * @param $musicurl 音乐链接
     * @param $hqmusicurl 高质量音乐链接，WIFI环境优先使用该链接播放音乐
     * @param $thumbmediaid 缩略图的媒体id，通过上传多媒体文件，得到的id
     * @return string
     */
    public static function music($tousername, $title, $description, $musicurl, $hqmusicurl, $thumbmediaid) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        self::$queryurl = self::$queryurl . $accesstoken;

        // 开始
        $template = array(
            'touser'=>$tousername,
            'msgtype'=>'music',
            'music'=>array(
                'title' => $title,
                'description' => $description,
                'musicurl' => $musicurl,
                'hqmusicurl' => $hqmusicurl,
                'thumb_media_id' => $thumbmediaid,
            ),
        );
        $template = common::json_encode($template);
        return curl::callwebserver(self::$queryurl, $template, self::$action);
    }

    /**
     * 图文消息 - 单个项目的准备工作，用于内嵌到self::news()中。现调用本方法，再调用self::news()
     *              多条图文消息信息，默认第一个item为大图,注意，如果调用本方法得到的数组总项数超过10，则将会无响应
     * @param $title 标题
     * @param $description 描述
     * @param $picurl 图片链接，支持JPG、PNG格式，较好的效果为大图360*200，小图200*200
     * @param $url 点击图文消息跳转链接
     * @return string
     */
    public static function newsitem($title, $description, $picurl, $url) {
        return $template = array(
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'picurl' => $picurl,
        );
    }

    /**
     * 图文 - 先调用self::newsitem()再调用本方法
     * @param $tousername
     * @param $item 数组，每个项由self::newsitem()返回
     * @return string
     */
    public static function news($tousername, $item) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        self::$queryurl = self::$queryurl . $accesstoken;

        // 开始
        $template = array(
            'touser' => $tousername,
            'msgtype' => 'news',
            'news' => array(
                'articles' => $item
            ),
        );
        $template = common::json_encode($template);
        return curl::callwebserver(self::$queryurl, $template, self::$action);
    }
}