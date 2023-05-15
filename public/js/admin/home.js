// Ui design
$('#saveUiDesignInfo').on('click', function(e) {
    let id = $(this).attr("data-id");
    id = id.split("_")[1];
    e.preventDefault();
    var form = $('form#uiDesignInfoInfoForm_' + id);
    var formData = form.serialize(); // serialize form data
    $.ajax({
        type: 'POST', // get HTTP method from form attribute
        url: '/admin/home-section-info', // get form action URL
        data: formData,
        success: function(response) {
            toastr.success(response.message);
            // handle server response
        },
        error: function(xhr, status, error) {
            toastr.error(error);
            // handle errors
        }
    });
});

function UiItemImage(input) {
    var id = input.getAttribute('data-id')
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imgUiDesignItem_' + id)
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function submitForm(formId) {
    var form = $('#' + formId); // get the form element
    var formData = new FormData(form[0]); // get form data

    $.ajax({
        url: '/admin/home-ui-design-process',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            $('#UiDesignListItem').html(data.html);
            console.log(data.html);
            toastr.success(data.message);
        },
        error: function(xhr, status, error) {
            toastr.error(error);
            console.log('Error submitting form.');
        }
    });
}

function readURLUiImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imgPreviewInput')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
$('#upload-uiDesign-form').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '/admin/home-ui-design-process',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            $('#UiDesignListItem').html(data.html);
            toastr.success(data.message);
            $("#imgPreviewInput").attr('src','/public/admin/assets/img/no-image.jpeg')
            $('#upload-uiDesign-form')[0].reset();
            // handle success response
        },
        error: function(xhr, status, error) {
            // handle error response
            toastr.error(error);
        }
    });
});

function UiDesignStatusProcess(id) {
    var form = $('form#uiDesignForm_' + id);
    var formData = form.serialize(); // serialize form data
    $.ajax({
        type: 'POST', // get HTTP method from form attribute
        url: '/admin/home-ui-design-status-process', // get form action URL
        data: formData,
        success: function(response) {
            // handle server response
            toastr.success(response.message);
            $('#UiDesignListItem').html(response.html)
        },
        error: function(xhr, status, error) {
            // handle errors
            toastr.error(error);
        }
    });
}
// pricing
$(document).ready(function() {

    var descriptionCounter = parseInt($('#func_count').val()) + 1;

    $("#add-description").click(function() {
        var newField = `
        <div class="col-lg-12 mt-3">
        <div class="form-group">
            <label for="description_${descriptionCounter}" class="form-label">quyền lợi</label>
            <input type="text" class="form-control" name="pricing_func[]" id="description_${descriptionCounter}">
        </div>
    </div>
`;

        $("#description-fields").append(newField);
        descriptionCounter++;
    });
});

$('#pricigTableSubmit').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '/admin/process-pricing-table',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            toastr.success(response.message);
            $('#pricigTableSubmit')[0].reset();
            // handle success response
            // Restart the page
            setTimeout(function() {
                window.location.href = response.redirect;
            }, 2000);
        },
        error: function(xhr, status, error) {
            // handle error response
            toastr.error(error);
        }
    });
});

// faq
function benefitProcess(id) {
    var form = $('form#faqQuestionForm' + id);
    var formData = form.serialize(); // serialize form data
    $.ajax({
        type: 'POST', // get HTTP method from form attribute
        url: '/admin/process-faq', // get form action URL
        data: formData,
        success: function(response) {
            // handle server response
            toastr.success(response.message);
            $('#faqQuestionBox').html(response.html)
        },
        error: function(xhr, status, error) {
            toastr.error(error);
            // handle errors
        }
    });
}

$('#faqForm_submit').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '/admin/process-faq',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#faqQuestionBox').html(response.html);
            toastr.success(response.message);
            $('#faqForm_submit')[0].reset();
            // handle success response
        },
        error: function(xhr, status, error) {
            // handle error response
            toastr.error(error);
        }
    });
});