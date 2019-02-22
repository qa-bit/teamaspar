$(document).ready(function () {

    var FIMJR = 6;

    if (!$('#race-records').size())
        return;

    var modalitySelector = $('.race-modality-selector');
    var modalityClassificationSelector = $('.race-modality-classification-selector');

    var riders = JSON.parse($('#race-records').attr('riders'));

    var collectionNode = $('.score-table .score-row');

    var count = collectionNode.size();

    var selectedModality = null;
    var selectedModalityClassification = null;

    var riderExists = function (rider) {
        var exists = false;

        $('.score-table .score-row').find('[data-rider-id]').each(function () {
            var currentId = parseInt($(this).val());
            if (currentId === parseInt(rider.id))
                exists = true;
        });


        return exists;
    };


    var deleteRiders = function () {
        $('.score-table .score-row').remove();
        count = 0;
    };


    var addRider = function (rider) {

        var prototype = $('.score-data-prototype').attr('data-prototype').replace(/__index__/g, count);
        var newNode = $(prototype);

        newNode.find('.rider-name').html(rider.name);
        newNode.find('input').val(0);
        newNode.find('.rider-id').val(rider.id);

        $('.score-table').append(newNode);
        count++;


    };

    var addRiders = function (modality) {
        for (var i=0; i < riders[modality].length; i++) {
            var rider = riders[modality][i];
            if (!riderExists(rider)) {
                if (selectedModality != FIMJR )
                    addRider(rider);
                else {
                    console.error(selectedModalityClassification == rider.modalityClassification);
                    if (selectedModalityClassification == rider.modalityClassification) {
                        addRider(rider);
                    }
                }
            }
        }
    };

    var modality = modalitySelector.val();
    addRiders(modality);

    var checkSubmodality = function () {

        var selector = $('.race-modality-classification-selector');
        var modality = $('.race-modality-selector').val();

        if (parseInt(modality) == FIMJR) {
            selector.parent().parent().show();
            // if (!selector.val()) {
            //     var first = selector.find('option').eq(1).attr('value');
            //     selector.val(first);
            //     selectedModalityClassification = first;
            // }
        } else {
            selector.val();
            selector.parent().parent().hide();
            selectedModalityClassification = null;
        }

        selectedModality = modality;

    };

    modalitySelector.on('change', function () {
        var modality = $(this).val();
        checkSubmodality(modality);
        deleteRiders();
        addRiders(modality);
    });

    modalityClassificationSelector.on('change', function () {
        selectedModalityClassification = $(this).val();
        if (selectedModalityClassification) {
            checkSubmodality(selectedModality);
            deleteRiders();
            addRiders(selectedModality);
        }
    });


    checkSubmodality();
});