$(document).ready(function () {
    var Admin = {
        'newsletterAdmin' : function () {

            var $body = $('body');

            $body.on('change', '.riderSelect', function (e, data) {
                if (!(data && data.triggered)) {
                    var teamSelect = $(this).parent().parent().find('.teamSelect');
                    teamSelect.val(null).trigger('change', {'triggered': true});
                }
            });

            $body.on('change', '.teamSelect', function (e, data) {
                if (!(data && data.triggered)) {
                    var riderSelect = $(this).parent().parent().find('.riderSelect');
                    riderSelect.val(null).trigger('change', {'triggered' : true});
                }
            });
        }
    };

    Admin.newsletterAdmin();
});
