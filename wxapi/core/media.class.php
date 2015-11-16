<?php
namespace wxapi\core;

/**
 * 素材管理
 */
class media {
    
    /**
     * 多媒体上传。上传图片、语音、视频等文件到微信服务器，上传后服务器会返回对应的media_id，公众号此后可根据该media_id来获取多媒体。
     * 上传的多媒体文件有格式和大小限制，如下：
     * 图片（image）: 1M，支持JPG格式
     * 语音（voice）：2M，播放长度不超过60s，支持AMR\MP3格式
     * 视频（video）：10MB，支持MP4格式
     * 缩略图（thumb）：64KB，支持JPG格式
     * 媒体文件在后台保存时间为3天，即3天后media_id失效。
     *
     * @param $filename，文件绝对路径
     * @param $type, 媒体文件类型，分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb）
     * @return {"type":"TYPE","media_id":"MEDIA_ID","created_at":123456789}
     */
    public static function upload($filename, $type) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token='.$accessToken.'&type='.$type;
        $data = array();
        $data['media'] = '@' . $filename;
        return curl::callwebserver($queryurl, $data, 'post', 1 , 0);
    }

    /**
     * 下载多媒体文件
     * @param $mediaId 多媒体ID
     * @return 头信息如下
     *
     * HTTP/1.1 200 OK
     * Connection: close
     * Content-Type: image/jpeg
     * Content-disposition: attachment; filename="MEDIA_ID.jpg"
     * Date: Sun, 06 Jan 2013 10:20:18 GMT
     * Cache-Control: no-cache, must-revalidate
     * Content-Length: 339721
     * curl -G "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID"
     */
    public static function download($mediaId) {
        //获取ACCESS_TOKEN
        $accessToken = AccessToken::getAccessToken();
        $queryUrl = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$accessToken.'&media_id='.$mediaId;
        return Curl::callWebServer($queryUrl, '', 'GET', 0);
    }
















    /**
     * 获取素材总数
     * 开发者可以根据本接口来获取永久素材的列表，需要时也可保存到本地。
     *
     * 永久素材的总数，也会计算公众平台官网素材管理中的素材
     * 图片和图文消息素材（包括单图文和多图文）的总数上限为5000，其他素材的总数上限为1000
     * 
     * @param  boolean $format 默认返回json
     * @return [type]          [description]
     */
    public static function get_materialcount($format = false) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=' . $accesstoken;
        return curl::callwebserver($queryurl, '', 'get', $format);
    }

    /**
     * 获取素材列表
     * 在新增了永久素材后，开发者可以分类型获取永久素材的列表。
     *
     * 获取永久素材的列表，也会包含公众号在公众平台官网素材管理模块中新建的图文消息、语音、视频等素材（但需要先通过获取素材列表来获知素材的media_id）
     * 临时素材无法通过本接口获取
     * 
     * @param  string  $type   （必须）素材的类型，图片（image）、视频（video）、语音 （voice）、图文（news）
     * @param  int  $offset （必须）从全部素材的该偏移位置开始返回，0表示从第一个素材 返回
     * @param  int  $count  （必须）返回素材的数量，取值在1到20之间
     * @param  boolean $format 默认返回json
     * @return [type]          [description]
     */
    public static function batchget_material($type, $offset, $count, $format = false) {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $queryurl = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=' . $accesstoken;
        $data = array();
        $data = array(
            "type" => $type,
            "offset" => $offset,
            "count" => $count
        );
        $data = json_encode($data);
        return curl::callwebserver($queryurl, $data, 'post', $format);
    }
}