var KpWordpressFormUserScript = {
    init : function () {
        this.bindFormSubmit();
    },

    bindFormSubmit : function () {
        jQuery('.kp-wordpress-form-submit button[type="submit"]').on('click', function(event) {
           event.preventDefault();

           
        });
    }
}

jQuery(document).ready(function() {
    KpWordpressFormUserScript.init();
});