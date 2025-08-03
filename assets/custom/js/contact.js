// contact-support.js
$(document).ready(function () {
    $.ajax({
        url: base_url + 'get-support-details',
        method: 'GET',
        success: function (support) {
            if (support) {
                $('#support-email').text(support.support_email || 'N/A');
                $('#support-phone').text(support.support_contact || 'N/A');
            }
        },
        error: function () {
            console.error("Failed to load support details.");
        }
    });
});
