    // 显示消息提示
    function showMessage(messages, type) {
        type = type || 'notice';
        var messageText = Array.isArray(messages) ? messages.join('<br>') : messages;

        // 移除已存在的消息
        $('.gate-message').remove();

        // 创建消息元素
        var iconHtml = '';
        if (type === 'success') {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
        } else if (type === 'error') {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
        } else {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>';
        }

        var $message = $('<div class="gate-message ' + type + '">' +
            iconHtml +
            '<div class="message-content">' + messageText + '</div>' +
            '<div class="message-close">' +
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>' +
            '</div>' +
        '</div>');

        $('body').append($message);

        // 显示消息
        setTimeout(function() {
            $message.addClass('show');
        }, 10);

        // 点击关闭
        $message.find('.message-close').on('click', function() {
            $message.removeClass('show');
            setTimeout(function() {
                $message.remove();
            }, 300);
        });

        // 自动关闭
        setTimeout(function() {
            if ($message.hasClass('show')) {
                $message.removeClass('show');
                setTimeout(function() {
                    $message.remove();
                }, 300);
            }
        }, 5000);
    }

    // 检查并显示 Typecho 的通知消息
    (function() {
        var prefix = '<?php echo \Typecho\Cookie::getPrefix(); ?>',
            notice = $.cookie(prefix + '__typecho_notice'),
            noticeType = $.cookie(prefix + '__typecho_notice_type'),
            path = '<?php echo \Typecho\Cookie::getPath(); ?>',
            domain = '<?php echo \Typecho\Cookie::getDomain(); ?>',
            secure = <?php echo json_encode(\Typecho\Cookie::getSecure()); ?>;

        if (notice && noticeType) {
            var messages = $.parseJSON(notice);
            showMessage(messages, noticeType);

            // 清除 cookie
            $.cookie(prefix + '__typecho_notice', null, {path: path, domain: domain, secure: secure});
            $.cookie(prefix + '__typecho_notice_type', null, {path: path, domain: domain, secure: secure});
        }
    })();
