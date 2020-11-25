
// Update the Regions data list
function getRegions() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var regionTable = $('#regionData');
                    regionTable.empty();
                    $.each(data.regions, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalRegionAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'regionAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        regionTable.append('<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.code + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function regionAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var regionData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalRegionAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        regionData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + id;
        regionData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(regionData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">Region data has been ' + statusArr[type] + ' successfully.</p>');
                getRegions();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the region's data in the edit form
function editRegion(id) {
    $.ajax({
        type: 'GET',
        url: urlToRestApi + "/" + id,
        dataType: 'JSON',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.region.id);
            $('#code').val(data.region.code);
            $('#name').val(data.region.name);
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalRegionAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var regionFunc = "regionAction('add');";
        $('.modal-title').html('Add new region');
        if (type == 'edit') {
            regionFunc = "regionAction('edit');";
            $('.modal-title').html('Edit region');
            var rowId = $(e.relatedTarget).attr('rowID');
            editRegion(rowId);
        }
        $('#regionsubmit').attr("onclick", regionFunc);
    });

    $('#modalRegionAddEdit').on('hidden.bs.modal', function () {
        $('#regionsubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});



