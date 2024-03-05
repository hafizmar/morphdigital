export default {
    data: () => {
        return {
            isUpdating: false,
        }
    },
    methods: {
        alert(desc = "You've done a great job.", title = "Success!", type = "success") {

            var alertBox = $('<div class="alert alert-dismissible fade alert-'+ type +'" role="alert" tabindex="-1">' +
                '<strong>'+ title + '</strong> <span>'+ desc +'</span>' +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>');

            $('#alertNotification').append(alertBox);
            $('#alertNotification > .alert').addClass('show');
        },
    },
}