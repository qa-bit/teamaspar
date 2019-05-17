$(document).ready(function () {
    var Admin = {
        newsletterAdmin : function () {

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
        },
        CKEDITORConfig : function () {

            if (typeof CKEDITOR != 'undefined') {

                CKEDITOR.on('dialogDefinition', function (ev) {
                    var dialogName = ev.data.name;
                    var dialog = ev.data.definition.dialog;

                    if (dialogName == 'image') {
                        dialog.on('show', function () {
                            this.selectPage('Upload');
                        });
                    }
                });
            }
        }
    };
    Admin.newsletterAdmin();
    Admin.CKEDITORConfig();
});
