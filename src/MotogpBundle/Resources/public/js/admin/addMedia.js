$(document).ready(function () {

    Dropzone.autoDiscover = false;

    var index = $('.collection .row').size();

    var newMedia = function (imageUrl) {
        var prototypeText = $('.data-prototype').attr('data-prototype').replace(/__index__/g, index);

        var pt = $(prototypeText);

        pt.find('.uploadFile').val(imageUrl);

        $('.collection').append(pt);
        index++;
    };

    //$('.add').click(newMedia);


    $('.dropzone').each(function () {

        var url = $(this).attr('url');
        var multiple = $(this).attr('multiple') === 'true';
        var maxFiles = parseInt($(this).attr('maxfiles'));

        var inputs = $(this).parent().find('input');


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
                    if (!file.mock)
                        this.removeFile(file);
                });

                this.on('addedfile', function (data, data2) {
                    $(data.previewElement).on('click', function () {
                        $('.collection-row').addClass('hidden');
                        $('.collection-row[index="'+ data.index + '"]').removeClass('hidden');
                    });

                    if (data.mock === true) {
                        this.files.push(data);
                    }


                });

                this.on('removedfile', function (file, data) {
                    $('.collection-row[index="'+ file.index +'"]').remove();
                }) ;

                this.on('maxfilesreached', function (file) {
                    $(this.element).addClass('dz-max-files-reached');

                });
            },
            success : function (file, data) {
                if (typeof data.files.url != 'undefined')
                {
                    file.index = index;
                    newMedia(data.files.url);
                }

            },
            assignIndex : function (file, index) {

            }
        });

        var previous = $('.collection .row');

        if ( previous.size() ) {
            var i = 0;

            previous.each(function () {

                var previousValue = $(this).attr('path');

                if (previousValue) {

                    var mock = {'name': 'Foto' + i, size : null, index : i, mock : true};

                    // console.error('index', mock.index);

                    DZ.emit('addedfile', mock);
                    DZ.emit('thumbnail', mock, previousValue);
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


});