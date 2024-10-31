<?php
if (!defined('WPINC')) {
    die;
}

//更新方法都寫這，方法必須要回傳 true 才算更新完成。
class Mxp_Update_PIXNET2WP {
    public static $version_list = array('2.0.0', '2.0.1', '2.0.2', '2.0.3', '2.0.4', '2.0.5', '2.0.6', '2.0.7', '2.0.8', '2.0.9', '2.1.0', '2.1.1', '2.1.2', '2.2.0', '2.2.1', '2.2.2');

    public static function apply_update($ver) {
        $index = array_search($ver, self::$version_list);
        if ($index === false) {
            echo "<script>console.log('update version: {$ver}, in index: {$index}');</script>";
            return false;
        }
        for ($i = $index + 1; $i < count(self::$version_list); ++$i) {
            $new_v = str_replace(".", "_", self::$version_list[$i]);
            if (defined('WP_DEBUG') && WP_DEBUG === true) {
                echo "<script>console.log('mxp_update_to_v{$new_v}');</script>";
            }
            if (call_user_func(array(__CLASS__, "mxp_update_to_v{$new_v}")) === false) {
                echo "<script>console.log('current version: {$ver}, new version: {$new_v}');</script>";
                return false;
            }
        }
        return true;
    }
    /**
     *    更新區塊
     */
    public static function mxp_update_to_v2_0_0() {
        //起始提交版本
        return true;
    }
    public static function mxp_update_to_v2_0_1() {
        //強化下載圖片方式，穩定處理下載圖片。
        return true;
    }
    public static function mxp_update_to_v2_0_2() {
        //更改更新使用方法避免錯誤
        //新增說明頁與補上導流量的JS程式碼片段於說明頁面
        return true;
    }
    public static function mxp_update_to_v2_0_3() {
        //更新支援 WordPress 版本 5.1
        return true;
    }
    public static function mxp_update_to_v2_0_4() {
        //更新支援 WordPress 版本 5.2
        //修正文章列表顯示錯誤問題
        return true;
    }
    public static function mxp_update_to_v2_0_5() {
        //修正文章標題過濾HTML問題
        return true;
    }
    public static function mxp_update_to_v2_0_6() {
        // 新增重新設定匯入狀態功能
        // 修正重複新增圖片資料問題
        // 修正重複發文與留言的問題
        return true;
    }
    public static function mxp_update_to_v2_0_7() {
        // 修正下載圖片時能跟進轉址的問題
        return true;
    }
    public static function mxp_update_to_v2_0_8() {
        // 修正重複下載圖片時會影響精選圖片的問題
        return true;
    }
    public static function mxp_update_to_v2_0_9() {
        // 修正相對路徑圖片抓取判斷錯誤問題
        // 新增重新匯入時也重新下載圖片的選項
        return true;
    }
    public static function mxp_update_to_v2_1_0() {
        // 修正圖片抓取判斷錯誤問題，圖片結構正規化處理
        // 修正媒體庫重複匯入問題（檔案沒重複）
        return true;
    }
    public static function mxp_update_to_v2_1_1() {
        // 修正圖片抓取時間過長問題，連結超過 5秒、下載超過 15秒的圖片就跳掉不抓了
        return true;
    }
    public static function mxp_update_to_v2_1_2() {
        // * 修正分析HTML結構造成匯入內容丟失問題
        // * 支援版本上調 WordPress 5.9
        return true;
    }
    public static function mxp_update_to_v2_2_0() {
        // 調整外掛收費方案文案
        return true;
    }
    public static function mxp_update_to_v2_2_1() {
        // 補上除錯資訊
        return true;
    }
    public static function mxp_update_to_v2_2_2() {
        // 新增不匯入標籤的選項
        return true;
    }
}