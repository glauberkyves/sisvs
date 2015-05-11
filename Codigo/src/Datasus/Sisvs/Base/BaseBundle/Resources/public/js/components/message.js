var Message = {
    message: {},
    addMessage: function (message, type, index) {
        if (undefined == type) {
            type = 'success';
        }

        var div = $('.message:first').find('.alert-' + type).html();

        if (undefined == div) {
            $('.message:first').html('<div class="alert alert-' + type + '">' + message + '</div>').removeClass('hide');
        } else {
            var content = $('.message:first').find('.alert-' + type).html();

            if (undefined == $('.alert-' + type + ':contains("' + message + '")').html()) {
                $('.message:first').find('.alert-' + type).html(content + '<br />' + message).removeClass('hide');
            }
        }

        if (undefined == index) {
            index = Math.random().toString(36).substring(7);
        }

        this.message[index] = message;
    },

    remove: function (index) {
        if (this.message[index]) {
            var text = $('.message:first').html().replace(this.message[index], '');
            text = text.replace('<br><br>', '');

            $('.message:first').html(text);

            if ($('.message:first .alert-error').text() == '') {
                this.clearMessage();
            }
        }
    },

    clearMessage: function () {
        $('.message:first').html('').addClass('hide');
    }
}
