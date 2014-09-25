/**
 * User: Koss (karakurtkoss@gmail.com)
 * Date: 04.09.2014
 */
$(function () {
    'use strict';

    $('body').tooltip({
        selector: '[data-toggle=tooltip]',
        container: 'body'
    });

    $('.alert').animate({
            opacity: 0
        }, {
            duration: 5 * 1000,
            specialEasing: {
                width: 'linear',
                height: 'easeOutBounce'
            }
        }
    );

    $('.btn-change-password').on('click tap', function () {
        var me = $(this),
            change_password_block = $('.change-password-block'),
            btn_not_change_password = $('.btn-not-change-password'),
            password_fields = $('input[type="password"]');

        me.hide(10, function () {
            password_fields.prop('required', true);
            change_password_block.show();
            btn_not_change_password.show();
        });
    });

    $('.btn-not-change-password').on('click tap', function () {
        var me = $(this),
            change_password_block = $('.change-password-block'),
            btn_change_password = $('.btn-change-password'),
            password_fields = $('input[type="password"]');

        me.hide(10, function () {
            password_fields.prop('required', false);
            change_password_block.hide();
            btn_change_password.show();
        });
    });

    $('.btn-quick-add-verses').on('click tap', function () {
        $('.popover-quick-add-verses').popover({
            container: '.btn-quick-add-verses',
            delay: {"show": 500},
            placement: 'bottom',
            selector: $(this)
        }).show();
    });
});