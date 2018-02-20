$(document).ready(function () {
        Dropzone.autoDiscover = false;
    
        var inputReordering = function (inputs) {
            var txt = [];

            inputs.each(function () {
                if ($(this).val() != '' && $(this).val != null) {
                    txt.push($(this).val())
                }
            });

            inputs.val(null);

            _.each(txt, function (i, index) {
                inputs.eq(index).val(i);
            })
        };

        var imgReordering = function (files) {
            var i = 0;
            _.each(files, function (f) {
                f.index = i;
                i++;
            });

            return files;
        };
    
        $('.dropzone').each(function () {

            var url = $(this).attr('url');
            var multiple = $(this).attr('multiple') === 'true';
            var maxFiles = parseInt($(this).attr('maxfiles'));

            var inputs = $(this).parent().find('input');

            inputReordering(inputs);

            var testImages = $(this).parent().find('.imgtest');

            var DZ = new Dropzone('#' + $(this).attr('id'), {
                    url: url,
                    timeout: 75000,
                    uploadMultiple : false,
                    maxFiles: maxFiles,
                    acceptedFiles: 'image/*',
                    addRemoveLinks : true,
                    dictDefaultMessage : "Arrastra imagenes aquí",
                    dictFallbackMessage : "Navegador no soportado",
                    dictFallbackText : "",
                    dictFileTooBig : "Fichero demasiado grande ({{filesize}}MiB). Tamaño máximo: {{maxFilesize}}MiB.",
                    dictInvalidFileType : "Tipo de fichero no permitido.",
                    dictResponseError : "Error {{statusCode}} ",
                    dictCancelUpload : "Cancelar subida",
                    dictCancelUploadConfirmation : "¿Seguro que quieres cancelar?",
                    dictRemoveFile : "Eliminar",
                    dictMaxFilesExceeded : "No puedes subir mas ficheros",
                    init: function() {

                        this.on('maxfilesexceeded', function (file) {
                            //console.error('exceeded', file);
                            if (!file.mock)
                                this.removeFile(file);
                        });

                        this.on('addedfile', function (data) {

                            if (data.mock === true) {
                                this.files.push(data);
                            }

                            inputReordering(inputs);

                        });

                        this.on('removedfile', function (file, data) {
                            inputs.eq(file.index).val('');
                            //console.error('REMOVED FILES',file,this.files);
                            inputReordering(inputs);
                            this.files = imgReordering(this.files);
                            console.error(this.files);
                            //testImages.eq(file.index).attr('src', '');
                        }) ;

                        this.on('maxfilesreached', function (file) {
                            /*
                             console.error('max reached');
                             console.error('FILES', this.files);
                             console.error(this);
                             */
                            $(this.element).addClass('dz-max-files-reached');

                        });
                    },
                    success : function (file, data) {
                        console.error('success', file, data);
                        if (typeof data.files.url != 'undefined')
                        {
                            var idx = 0;
                            inputs.each( function () {
                                if ($(this).val() == '') {
                                    file.index = idx;

                                    $(this).val(data.files.url);

                                    return false;
                                }
                                idx++;
                            });

                        }

                    },
                    assignIndex : function (file, index) {

                    }
                }
            );


            if ( $('form').attr('editing') === "true") {
                var i = 0;
                var baseUrl = $('html').attr('baseUrl').replace('app_dev.php', '').replace('app.php', '');

                inputs.each(function () {
                    var previousValue = $(this).val();
                    if (previousValue) {
                        var mock = {'name': 'Foto' + i, size : null, index : i, mock : true};

                        // console.error('index', mock.index);

                        DZ.emit('addedfile', mock);
                        DZ.emit('thumbnail', mock, baseUrl + previousValue);
                        DZ.emit("complete",  mock);

                        //console.error('maxfiles', DZ.options.maxFiles, i);

                        if (DZ.options.maxFiles == i) {

                            DZ.emit('maxfilesreached', mock);
                            DZ.emit('maxfilesexceeded', mock);
                        }
                    }

                    i++;
                });
            }

        });

    }
);