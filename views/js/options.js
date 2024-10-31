(function($) {
    function save_items() {
        var catename = jQuery('#mxp_pixnet2wp_post_category').children("option").filter(":selected").text();
        if (confirm("確認，你正打算將本頁面所有文章搬家匯入至 " + catename + " 嗎？\n注意：此項操作進行時請勿離開本頁面，否則可能導致匯入不完整。")) {
            var do_list = jQuery('.mxp-import');
            for (var i = 0; i < do_list.length; ++i) {
                var id = $(do_list[i]).data('id');
                if (!$('#b_' + id).prop('disabled')) {
                    $('#b_' + id).trigger('click');
                }
            }
        }
    }

    $(document).ready(function() {
        $('#reset_import_status').click(function() {
            if (confirm("確認，你正打算將本頁面分類所有文章匯入狀態重新設定嗎？")) {
                var cate_id = $(this).data('cateid');
                location.href = location.origin + location.pathname + "?page=mxp-pixnet2wp-options&reset_cate_status=" + cate_id;
            }
        });
        $('.batch_submit').click(save_items);
        $('input[type="checkbox"').change(function() {
            if (this.checked) {
                $('#b_' + $(this).data('id')).prop('disabled', true);
            } else {
                $('#b_' + $(this).data('id')).prop('disabled', false);
            }
        });
        $('.mxp-import').click(function() {
            var id = $(this).data('id');
            var cate_id = $('#mxp_pixnet2wp_post_category').val();
            $('div#d_' + id).html('<font color=red>匯入中，</br>請勿離開此頁面或者刷新頁面。</br>如有等待時間過長或是錯誤發生</br>請至設定頁面下方「Log文件記錄」</br>提供給開發者。</font>');
            var data = {
                'action': 'mxp_options_import_action',
                'nonce': MXP_PIXNET2WP.nonce,
                'sid': id,
                'cate_id': cate_id
            };
            var self = this;
            $(this).prop('disabled', true);
            $(document).queue(function(next) {
                $.post(ajaxurl, data, function(res) {
                    if (res.success) {
                        $('div#d_' + id).html('<font color=blue>匯入成功！</font>');
                    } else {
                        $('div#d_' + id).html('<font color=red>' + res.data.msg + '</font>');
                        $(self).prop('disabled', false);
                    }
                    next();
                });
            });
        });
    });
})(jQuery)
