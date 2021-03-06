$(() => {
    /*_______   SET VARIATION ID    _______*/
    $(document).on('click', 'a.attribute', function() {
        const id = $(this).data('id');
        $('input[name="variation_id"]').val(id);
    });

    /*_______   SET PRICE ID    _______*/
    $(document).on('click', 'a.stock', function() {
        const id = $(this).data('id'),
            option = $(this).data('option')
        $('input[name="variation_id"]').val(id);
        $('input[name="option"]').val(option);
    });

    /*_______   SET STOCK    _______*/
    $(document).on('click', 'a.extra_price', function() {
        const id = $(this).data('id'),
            option = $(this).data('option')
        $('input[name="variation_id"]').val(id);
        $('input[name="option"]').val(option);
    });


    /*__________________________________________  Set Brand Id To Update  _______*/
    $('.update_brand').on('click', function() {
        let brandId = $(this).attr('data-id');
        let brandName = $(this).attr('data-name');
        $('#brand #btn_update_brand').html("Update");
        $('#brand .modal-title').html("Update Brand");

        $('#brand #brand_id').val(brandId);
        $('#brand #name').val(brandName);
    });
    $(document).on('click', 'button#create_brand', function() {
        $('form#create_brand input[name="name"]').val('');
        $('#brand #brand_id').val("");
        $('#brand #btn_update_brand').html("Create");
        $('#brand .modal-title').html("Create Brand");
    });

    /*__________________________________________  Set Banner To Create/Update  _____________________*/
    let $bannerForm = $('form.create_banner');

    $(document).on('click', '.btn_add_banner', function() {
        $('input[name="_method"]').remove();

        $bannerForm.trigger('reset');
        $('.create_banner input[name="image"]').attr('required', true)
            .next('.custom-file-label').html("Choose Image");
        $('.create_banner img').attr('src', '');
        $('.create_banner textarea[name="description"]').html('');

        $('.modal-title').html('Create ' + $(this).attr('data-modal-title'));
        $('button.submit').html('Create');
    });
    $(document).on('click', '#banners .update_banner', function() {
        $bannerForm.prepend('<input type="hidden" name="_method" value="PUT">');

        $('.create_banner .banner_id').val($(this).attr('data-id'));
        $('.create_banner input[name="image"]').attr('required', false)
            .next('.custom-file-label').html($(this).attr('data-image'));
        $('.create_banner input[name="title"]').val($(this).attr('data-title'));
        $('.create_banner input[name="link"]').val($(this).attr('data-link'));
        $('.create_banner input[name="alt"]').val($(this).attr('data-alt'));
        $('.create_banner textarea[name="description"]').html($(this).attr('data-description'));

        $('.create_banner img').attr('src', '/images/banners/' + $(this).attr('data-image'));

        $('.modal-title').html('Update ' + $(this).attr('data-modal-title'));
        $('button.submit').html('Update');
    });



    /**
     * ===========================================================================    COUPONS
     * */
    //  SHOW / HIDE COUPON CODE FIELD
    $('#coupon-view form input#manual').on('click', () => {
        $('#coupon-code-field').show(300);
    });
    $('#coupon-view form input#automatic').on('click', () => {
        $('input[name="code"]').val(null);
        $('#coupon-code-field').hide(200);
    });


    /**
     * ===========================================================================    ORDERS
     * */
    //  SHOW HIDE COURIER FIELDS
    $(document).on('change', '#order-view form#update-order-status #status', function() {
        if($(this).val().toLowerCase() === 'completed') {
            $('form#update-order-status input[name="courier"]').attr('required', true);
            $('form#update-order-status input[name="tracking_number"]').attr('required', true);
            $('form#update-order-status #courier').show(200);
        } else {
            $('form#update-order-status input[name="courier"]').attr('required', false);
            $('form#update-order-status input[name="tracking_number"]').attr('required', false);
            $('form#update-order-status #courier').hide(100);
        }
    });



    /**
     * ON ACTION FETCH FROM SERVER  */

    $('#section').on('change', async function() {
        const sectionId = $(this).val();
        const response = await fetch('/products/get-categories/' + sectionId, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        });
        const data = await response.json();

        let options = '<option selected hidden value="">Select *</option>';
        $(data).each(function() {
            options += `<option value="${$(this)[0].id}">${$(this)[0].title}</option>`;
        });

        $('#sub_category_modal #category').html(options);
    });
});



/***********************************************************************************    UPDATE STATUS */
$(document).on('click', '.update_status', function() {
    const status = $(this).children('i').attr('status');
    const id = $(this).data('id');
    const model = $(this).data('model');

    updateStatus(model, id, status, $(this));
});
/********************************************************************************
 * UPDATE STATUSES DYNAMIC FUNCTION
 * ********************************************************************************/

const updateStatus = (model, id, status, element) => {
    $.ajax({
        data: {model, id, status},
        method: 'PATCH',
        url: '/admin/status/toggle-update',
        success: response => {
            if(response.status === 0) {
                element.html('<i class="fas fa-toggle-off" status="Inactive"></i>');
            } else{
                element.html('<i class="fas fa-toggle-on" status="Active"></i>');
            }
        },
        error: error => {
            console.log(error);
            alert("Something went wrong!");
        },
    });
}
