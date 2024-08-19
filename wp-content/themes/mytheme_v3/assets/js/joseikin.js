
//AJAX SEARCH AREA
jQuery(document).ready(function($) {
    $('#region').on('change', function() {
        var region_id = $(this).val();
        var $prefecture = $('#prefecture');
        
        if(region_id !== "") {
            $.ajax({
                url: "ajaxurl",
                type: 'POST',
                data: {
                    action: 'get_prefectures_by_region',
                    region_id: region_id,
                },
                success: function(response) {
                    $prefecture.removeAttr('disabled');
                    $prefecture.html(response);
                },
                error: function() {
                    $prefecture.attr('disabled', 'disabled');
                    $prefecture.html('<option value="">NONE</option>');
                }
            });
        } else {
            $prefecture.attr('disabled', 'disabled');
            $prefecture.html('<option value="">都道府県で選択</option>');
        }
    });
});