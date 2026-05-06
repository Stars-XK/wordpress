(function($) {
    $(document).ready(function() {
        initNavTabs();
        initFormValidation();
        initColorPickers();
    });

    function initNavTabs() {
        $('.nav-tab').on('click', function(e) {
            e.preventDefault();
            
            $('.nav-tab').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            
            var target = $(this).attr('href');
            $('.section-content').hide();
            $(target).show();
        });
    }

    function initFormValidation() {
        $('form.godmaincode-form').on('submit', function(e) {
            var isValid = true;
            var apiKey = $('#godmaincode_weather_api_key').val();
            
            if (apiKey && apiKey.length < 30) {
                isValid = false;
                alert('Please enter a valid OpenWeatherMap API key.');
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    function initColorPickers() {
        if ($('.color-picker').length) {
            $('.color-picker').wpColorPicker();
        }
    }
})(jQuery);