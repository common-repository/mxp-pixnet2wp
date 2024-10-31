<?php
if (!defined('WPINC')) {
    die;
}

if (!empty($_POST)) {
    if (!isset($_POST['pixnet2wp-setting-page']) || !wp_verify_nonce($_POST['pixnet2wp-setting-page'], 'mxp-pixnet2wp-setting-page')) {
        die;
    }
    $re_download_img = sanitize_text_field($_POST['mxp_pixnet2wp_re_download_img']);
    $enable_log      = sanitize_text_field($_POST['mxp_enable_debug']);
    $complete_remove = sanitize_text_field($_POST['mxp_complete_remove']);
    $post_status     = sanitize_text_field($_POST['mxp_pixnet2wp_post_status']);
    $comment_status  = sanitize_text_field($_POST['mxp_pixnet2wp_post_comment_status']);
    $ping_status     = sanitize_text_field($_POST['mxp_pixnet2wp_post_ping_status']);
    $tag_status      = sanitize_text_field($_POST['mxp_pixnet2wp_post_tags_status']);
    $post_type       = sanitize_text_field($_POST['mxp_pixnet2wp_post_type']);
    $post_tags       = sanitize_text_field($_POST['mxp_pixnet2wp_post_tags']);
    $post_cate       = sanitize_text_field($_POST['mxp_pixnet2wp_post_category']);
    $pixnet_account  = sanitize_text_field($_POST['mxp_pixnet2wp_account']);
    $post_author     = sanitize_text_field($_POST['mxp_pixnet2wp_post_author']);
    $cm_admin_name   = sanitize_text_field($_POST['mxp_pixnet2wp_post_comment_admin_displayname']);
    $cm_admin_email  = sanitize_text_field($_POST['mxp_pixnet2wp_post_comment_admin_email']);
    $pixnet_name     = sanitize_text_field($_POST['mxp_pixnet2wp_blogname']);

}
if (isset($re_download_img) && isset($enable_log) && isset($complete_remove) && isset($post_status) && isset($comment_status) && isset($ping_status) && isset($tag_status) && isset($post_type) && isset($post_tags) && isset($pixnet_account) && isset($post_cate) && isset($post_author) && isset($cm_admin_name) && isset($cm_admin_email)) {
    update_option("mxp_pixnet2wp_re_download_img", $re_download_img);
    update_option("mxp_enable_debug", $enable_log);
    update_option("mxp_complete_remove", $complete_remove);
    update_option("mxp_pixnet2wp_post_status", $post_status);
    update_option("mxp_pixnet2wp_post_comment_status", $comment_status);
    update_option("mxp_pixnet2wp_post_ping_status", $ping_status);
    update_option("mxp_pixnet2wp_post_tags_status", $tag_status);
    update_option("mxp_pixnet2wp_post_type", $post_type);
    update_option("mxp_pixnet2wp_post_tags", $post_tags);
    update_option("mxp_pixnet2wp_post_category", $post_cate);
    update_option("mxp_pixnet2wp_post_author", $post_author);
    update_option("mxp_pixnet2wp_post_comment_admin_displayname", $cm_admin_name);
    update_option("mxp_pixnet2wp_post_comment_admin_email", $cm_admin_email);
    update_option("mxp_pixnet2wp_account", $pixnet_account);
    update_option("mxp_pixnet2wp_blogname", $pixnet_name);
    if ($pixnet_account != "") {
        $reg = Mxp_PIXNET2WP::register($pixnet_account, $pixnet_name);
        if (isset($reg['message'])) {
            echo $reg['message'];
        } else {
            update_option("mxp_pixnet2wp_user_id", $reg['user_id']);
            update_option("mxp_pixnet2wp_auth_token", $reg['auth_code']);
            update_option("mxp_pixnet2wp_pay_user", $reg['pay_user']);
            update_option("mxp_pixnet2wp_post_quota", $reg['post_quota']);
            update_option("mxp_pixnet2wp_usage", $reg['usage']);
        }
    } else {
        echo "無法更新使用者註冊資訊，請填入必要痞客邦編號！";
    }
    echo "搬家設定更新成功！";
    update_option("mxp_pixnet2wp_agree_terms", "yes");
}

$pixnet2wp = Mxp_PIXNET2WP::get_instance();
$pay_user  = false;
if (get_option("mxp_pixnet2wp_pay_user") != "" && get_option("mxp_pixnet2wp_pay_user") == 1) {
    $pay_user = true;
} else {
    $pay_user = false;
}
?>
<form action="" method="POST" id="main_setting_form">
<h2>匯入Pixnet 痞客邦資訊</h2>
<p>痞客邦編號：
    <input type="text" name="mxp_pixnet2wp_account" size="30" value="<?php echo get_option("mxp_pixnet2wp_account", ""); ?>" />（痞客邦部落格網址：http://XXX.pixnet.net/blog, XXX即是編號）
</p>
<p>痞客邦名稱：
    <input type="text" name="mxp_pixnet2wp_blogname" size="30" value="<?php echo get_option("mxp_pixnet2wp_blogname", ""); ?>" />
</p>
<?php if (get_option("mxp_pixnet2wp_auth_token", "") != ""): ?>
<p>用戶編號：
    <input type="text" size="5" value="<?php echo get_option("mxp_pixnet2wp_user_id", ""); ?>" disabled/>
</p>
<p>授權碼：
    <input type="text" size="30" value="<?php echo get_option("mxp_pixnet2wp_auth_token", ""); ?>" disabled/>（複製此授權碼，貼至痞客邦<strong>站台簡介</strong>區域內容中，用以驗證所有權，避免他人濫用此工具盜取文章。）
</p>
<h2>痞客邦搬家系統資訊（如有更新，請使用「更新資訊」按鈕更新服務狀態）</h2>
<p>你好，希望這套搬家工具能夠幫助你朝向自由、不受拘束與永保持學習的自媒體之路。</p>
<p>對於此項服務，你的身份為：【<?php echo $pay_user == true ? "<font color=red>已授權進階用戶</font>" : '<a href="https://www.mxp.tw/pchome2wp_apply/" target="blank">一般用戶</a>'; ?>】</p>
<?php if ($pay_user != true): ?>
<p><strong>本外掛將於 2023/05/01 調整搬家外掛使用方案，詳情請參考作者外掛公告「<a href="https://www.mxp.tw/pchome2wp_apply/" target="blank">Pixnet 痞客邦匯入工具</a>」。</strong></p>
<p>對於「一般用戶」與「進階授權」用戶的差異，僅有授權用戶會於匯入時包含痞客邦標籤以及留言內容，得以在搜尋引擎最佳化上得到方便的轉換。若你覺得這是一項重要的功能，請參考「<a href="https://www.mxp.tw/pchome2wp_apply/" target="blank">申請使用進階版 Pixnet 痞客邦匯入工具</a>」，提出申請。<strong>注意：一個痞客邦網站對應一個轉移網域，如有測試需求請聯絡作者，否則無法提供授權轉移，請再次購買授權。</strong></p>
<?php endif;?>
<?php if ($pay_user == true): ?>
<p>2023/05/01 後所有搬家使用者皆為進階授權用戶。唯有搬家文章數量限制 300 篇，若有超過此需求者，請參考作者網站「<a href="https://www.mxp.tw/pchome2wp_apply/" target="blank">Pixnet 痞客邦匯入工具</a>」公告，付費購買匯入篇數額度。</p>
<?php endif;?>
<p><strong>目前用量（匯入篇數）：</strong><?php echo get_option("mxp_pixnet2wp_usage", "0") . "/" . get_option("mxp_pixnet2wp_post_quota", "0"); ?></p>
<?php endif;?>
<h2>網站預設資訊</h2>
<p>匯入指定發文使用者：
<?php wp_dropdown_users(array('name' => 'mxp_pixnet2wp_post_author', 'selected' => get_option("mxp_pixnet2wp_post_author", "1")));?>
</p>
<p>匯入文章預設分類：
<?php wp_dropdown_categories(array('name' => 'mxp_pixnet2wp_post_category', 'hide_empty' => 0, 'selected' => get_option("mxp_pixnet2wp_post_category", "1")));?>
</p>
<p>匯入文章能見度狀態：
<select name="mxp_pixnet2wp_post_status">
<option value="publish" <?php selected(get_option("mxp_pixnet2wp_post_status", "publish"), "publish");?>>已發表</option>
<option value="pending" <?php selected(get_option("mxp_pixnet2wp_post_status"), "pending");?>>待審中</option>
<option value="draft" <?php selected(get_option("mxp_pixnet2wp_post_status"), "draft");?>>草稿</option>
<option value="private" <?php selected(get_option("mxp_pixnet2wp_post_status"), "private");?>>私密</option>
</select>
</p>
<p>允許留言：
<input type="radio" name="mxp_pixnet2wp_post_comment_status" value="open" <?php checked('open', get_option("mxp_pixnet2wp_post_comment_status", "open"));?>>是 </input>
<input type="radio" name="mxp_pixnet2wp_post_comment_status" value="closed" <?php checked('closed', get_option("mxp_pixnet2wp_post_comment_status"));?>>否</input>
</p>
<p>留言中管理員顯示名稱：
<input type="text" name="mxp_pixnet2wp_post_comment_admin_displayname" value="<?php echo get_option("mxp_pixnet2wp_post_comment_admin_displayname", "版主"); ?>"></input>【<?php echo $pay_user == true ? "<font color=red>已授權</font>" : '<a href="https://www.mxp.tw/pchome2wp_apply/" target="blank">付費用戶功能</a>'; ?>】
</p>
<p>留言中管理員顯示信箱：
<input type="text" name="mxp_pixnet2wp_post_comment_admin_email" value="<?php echo get_option("mxp_pixnet2wp_post_comment_admin_email", ""); ?>"></input>【<?php echo $pay_user == true ? "<font color=red>已授權</font>" : '<a href="https://www.mxp.tw/pchome2wp_apply/" target="blank">付費用戶功能</a>'; ?>】
</p>
<p>允許通告：
<input type="radio" name="mxp_pixnet2wp_post_ping_status" value="open" <?php checked('open', get_option("mxp_pixnet2wp_post_ping_status", "open"));?>>是 </input>
<input type="radio" name="mxp_pixnet2wp_post_ping_status" value="closed" <?php checked('closed', get_option("mxp_pixnet2wp_post_ping_status"));?>>否</input>
</p>
<p>文章類型：
<?php
$ps = get_post_types(array('public' => true));
echo '<select name="mxp_pixnet2wp_post_type">';
foreach ($ps as $key => $value) {
    echo '<option value="' . $value . '"' . selected(get_option("mxp_pixnet2wp_post_type", "post"), $value) . '>' . $value . '</option>';
}
echo '</select>';
?>
</p>
<p>使用標籤：
<input type="radio" name="mxp_pixnet2wp_post_tags_status" value="open" <?php checked('open', get_option("mxp_pixnet2wp_post_tags_status", "open"));?>>是 </input>
<input type="radio" name="mxp_pixnet2wp_post_tags_status" value="closed" <?php checked('closed', get_option("mxp_pixnet2wp_post_tags_status"));?>>否</input>
</p>
<p>額外匯入文章標籤：
<input type="text" name="mxp_pixnet2wp_post_tags" size="30" value="<?php echo get_option("mxp_pixnet2wp_post_tags", ""); ?>" />（逗點（,）分隔）【<?php echo $pay_user == true ? "<font color=red>已授權</font>" : '<a href="https://www.mxp.tw/pchome2wp_apply/" target="blank">付費用戶功能</a>'; ?>】
</p>
<h2>開發者功能</h2>
<p>刪除外掛時連帶全部設定資料：
<input type="radio" name="mxp_complete_remove" value="yes" <?php checked('yes', get_option("mxp_complete_remove", "yes"));?>>是 </input>
<input type="radio" name="mxp_complete_remove" value="no" <?php checked('no', get_option("mxp_complete_remove", "yes"));?>>否</input>
</p>
<p>Log文件記錄：
<input type="radio" name="mxp_enable_debug" value="yes" <?php checked('yes', get_option("mxp_enable_debug", "yes"));?>>是 </input>
<input type="radio" name="mxp_enable_debug" value="no" <?php checked('no', get_option("mxp_enable_debug"));?>>否</input>
</p>
<p>重新匯入時是否重新下載圖片：
<input type="radio" name="mxp_pixnet2wp_re_download_img" value="yes" <?php checked('yes', get_option("mxp_pixnet2wp_re_download_img"));?>>是 </input>
<input type="radio" name="mxp_pixnet2wp_re_download_img" value="no" <?php checked('no', get_option("mxp_pixnet2wp_re_download_img", "no"));?>>否</input>
</p>
<p>
<?php
$list = Mxp_PIXNET2WP::get_plugin_logs();
if (!empty($list)) {
    echo '<ul>';
    for ($i = 0; $i < count($list); ++$i) {
        echo '<li><a target="_blank" href="' . $list[$i] . '">' . $list[$i] . '</a></li>';
    }
    echo '</ul>';
}
?>
</p>
<p>
    <?php wp_referer_field(admin_url('admin.php?page=mxp-pixnet2wp'))?>
    <?php wp_nonce_field('mxp-pixnet2wp-setting-page', 'pixnet2wp-setting-page')?>
    <input type="submit" id="save" value="更新資訊" class="button action" /></p>
</form>
<script>
jQuery(document).ready(function(){
    jQuery('#main_setting_form').submit(function(){
        if (<?php echo get_option("mxp_pixnet2wp_agree_terms", "no") == "no" ? "confirm('更新資訊功能將會提交網站網域、痞客邦編號等資訊至痞客邦搬家系統，並註冊、更新搬家資訊，同意即表示接受，繼續下一步。')" : "1"; ?>){
            jQuery(this).find(':input[type=submit]').prop('disabled', true);
            return true;
        } else {
            return false;
        }
    });
});
</script>
<p>當前版本：<?php echo Mxp_PIXNET2WP::$version; ?></p>
<p>聯絡作者：<a href="https://www.mxp.tw/contact/" target="blank">江弘竣（阿竣）</a></p>
<p>贊助作者：<a href="https://mxp.tw/lw" target="blank">覺得有幫助嗎？請作者一杯咖啡吧！</a></p>