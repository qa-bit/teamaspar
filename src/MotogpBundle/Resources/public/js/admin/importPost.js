$(document).ready(function () {

    var node = $('.newsletter-post-selector');
    
    
    var newModalWindow = function () {
        var w = $('#modal-window').clone();

        w.attr('id', 'modal-import');

        w.find('.close, button').remove();

        w.find('.modal-body').html('Importando post <i class="fa fa-spin fa-gear"></i>').addClass('text-center');

        w.modal('show');

        return w;
    };


    var newMedia = function (imageUrl) {
        var prototypeText = $('.data-prototype').attr('data-prototype').replace(/__index__/g, window.mediaIndex);

        var pt = $(prototypeText);

        pt.find('.uploadFile').val(imageUrl);

        $('.collection').append(pt);
        window.mediaIndex++;
    };


    var setFeaturedMedia = function (data, basePath) {
        var featuredMediaDZ = $('#featured-featuredMedia').get(0).dropzone;

        featuredMediaDZ.removeAllFiles();

        if (data.featuredMedia && data.featuredMedia.reference) {
            var mock = {'name': name , size : null, mock : true};

            var path = '/uploads/media/' + data.featuredMedia.reference;

            featuredMediaDZ.emit('addedfile', mock);
            featuredMediaDZ.emit('thumbnail', mock, path);
            featuredMediaDZ.emit("complete",  mock);


            featuredMediaDZ.emit('maxfilesreached', mock);
            featuredMediaDZ.emit('maxfilesexceeded', mock);


            var uploadFile = $('.featured-media-description').find('[data-field="uploadFile"]');

            var url = basePath + data.featuredMedia.reference;

            uploadFile.val(url);


        }
    };

    var hideModal = function (mw) {
        mw.modal('hide');
    };

    node.change(function () {
        var formBaseName = '#'+ $(this).attr('id').replace('post', '');
        var url = "/api/posts/" + $(this).val();
        var basePath = $('div[baseData]').attr('baseData').replace('app', 'web/uploads/media/');

        var mw = newModalWindow();

        $.ajax({
            'method' : 'GET',
            'url' : url,
            'success' : function (data) {
                $(formBaseName + 'name').val(data.name);
                $(formBaseName + 'nameEN').val(data.nameEN);
                $(formBaseName + 'description').html(data.description);
                $(formBaseName + 'descriptionEN').html(data.descriptionEN);


                CKEDITOR.instances[$(formBaseName + 'description').attr('id').replace('#', null)].setData(data.description);
                CKEDITOR.instances[$(formBaseName + 'descriptionEN').attr('id').replace('#', null)].setData(data.descriptionEN);


                if (data.gallery)

                    $(formBaseName + 'gallery').val(data.gallery.id);

                var mediasDZ = $('#post-medias').get(0).dropzone;

                mediasDZ.removeAllFiles();
                window.mediaIndex = 0;

                for (var m=0; m < data.medias.length; m++) {

                    var mock = {'name': data.medias[m].title , size : null, mock: true, index: m};

                    var path = '/uploads/media/' + data.medias[m].reference;
                    
                    newMedia(basePath + data.medias[m].reference);

                    mediasDZ.emit('addedfile', mock);
                    mediasDZ.emit('thumbnail', mock, path);
                    mediasDZ.emit("complete",  mock);

                    mediasDZ.emit('maxfilesreached', mock);
                    mediasDZ.emit('maxfilesexceeded', mock);

                }

                setFeaturedMedia(data, basePath);
                hideModal(mw);

            }
        })

    });
});