$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#region-id').on('change', function () {
        var regionId = $(this).val();
        if (regionId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'region_id=' + regionId,
                success: function (countries) {
                    /**/      $select = $('#country-id');
                            $select.find('option').remove();
                            $.each(countries, function (key, value)
                                {
                                $.each(value, function (childKey, childValue) {
                                $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                                });
                            });
                    /**/
                    /*      $('#country-id').html(countries);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }

                /**/                }
                 });
                 } else {
                 $('#country-id').html('<option value="">Select Region first</option>');
                 }
                 /**/});
});


