$().ready(function () {
    $("#form").validate({
        rules: {
            lecturer_name: {
                required: true,
                minlength: 5
            },
            phone: {
                required: true,
                minlength:7
            },
            email: {
                required: true
            },
            address: {
                required: true
            }
        },
        messages: {
            lecturer_name: {
              required: "Please enter lecturer name",
              minlength: "Lecturer Name must contain at least 4 words"
            },

            phone: {
              required: "Please enter your phone number",
              minlength: "Enter correct number"
            },

            email: {
                required: "Please provide a email"
            },

            address: {
              required: "Please select category for your blog"
            },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    })
});
