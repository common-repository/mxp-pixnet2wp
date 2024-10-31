<?php
if (!defined('WPINC')) {
	die;
}
if (get_option("mxp_pixnet2wp_account", "") == "") {
	echo "請先至設定頁設定Pixnet痞客邦資訊！";
	exit;
}

if (isset($_GET['cate_num'])) {
	include plugin_dir_path(__FILE__) . "posts-list.php";
} else if (isset($_GET['reset_cate_status'])) {
	global $wpdb;
	$cate_id = sanitize_text_field(intval($_GET['reset_cate_status']));
	$table_name = $wpdb->prefix . 'mxp_pixnet_post_log';
	$wpdb->update(
		$table_name,
		array(
			'is_import' => 0,
		),
		array('post_cate' => $cate_id),
		array(
			'%d',
		),
		array('%d')
	);
	echo "<script>location.href='" . filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL) . "';</script>";
} else {
	if (isset($_POST['pixnet2wp-options-post']) && wp_verify_nonce($_POST['pixnet2wp-options-post'], 'mxp-pixnet2wp-options-post') && isset($_POST['cate_num']) && isset($_POST['cate_name'])) {
		$result = Mxp_PIXNET2WP::set_cate_list(
			sanitize_text_field($_POST['cate_name']),
			sanitize_text_field(intval($_POST['cate_num']))
		);
		if ($result !== true) {
			echo "<p><font color=red>{$result}</font></p>";
		}
	}
//先輸出分類採集數據
	$data = Mxp_PIXNET2WP::get_cate_list();
	echo "<ul>";
	foreach ($data as $row) {
		$cate_name = esc_html($row['cate_name']);
		$count = esc_html($row['count']);
		$post_cate = sanitize_text_field(intval($row['post_cate']));
		$url = esc_url(admin_url('admin.php?page=mxp-pixnet2wp-options&cate_num=' . $post_cate));
		echo "<li>分類名：<a href='{$url}'>{$cate_name}</a>（{$count} 筆資料）</li>";
	}
	echo "</ul>";
	?>
	<form method="post" id="mainform" action="" enctype="multipart/form-data">
		<h2>匯入分類資訊</h2>
		痞客邦分類名稱：<input type="text" name="cate_name" size="12"/>（識別當前作業用，可隨意）</br>
		痞客邦分類編號：<input type="text" name="cate_num" size="12"/>（痞客邦分類網址：http://<?php echo get_option("mxp_pixnet2wp_account"); ?>.pixnet.net/blog/category/XXX, XXX即是分類編號）</br>
		<?php wp_referer_field(admin_url('admin.php?page=mxp-pixnet2wp-option'))?>
		<?php wp_nonce_field('mxp-pixnet2wp-options-post', 'pixnet2wp-options-post')?>
		<input type="submit" name="submit" class="button button-primary" id="get_cate_btn" onclick="this.value='處理中，請稍候！'"/>
	</form>
	<script>
	jQuery(document).ready(function(){
		jQuery('#mainform').submit(function(){
	    	jQuery(this).find(':input[type=submit]').prop('disabled', true);
		});
	});
	</script>
	<?php
if (isset($_POST['pixnet2wp-options-post']) && wp_verify_nonce($_POST['pixnet2wp-options-post'], 'mxp-pixnet2wp-options-post') && isset($_POST['cate_num']) && isset($_POST['cate_name'])) {
		if ($result === true) {
			echo "完成痞客邦分類匯入！";
		}
	}
}