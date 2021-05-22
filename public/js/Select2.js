/**
 * *********************************************************    SELECT2
 */

/*_______________________________________________________________  GENERAL  _____________________*/
$('.select2').select2({
    theme: 'classic',
});
$('.select2-edit').select2({
    theme: "classic",
    multiple: false,
    tags: true,
    width: 'resolve',
});
/*_______________________________________________________________  GENERAL  _____________________*/
$('.select2-multiple').select2({
    theme: 'classic',
    multiple: true,
    tags: true,
    tokenSeparators: [',', ' ']
});

/*_______________________________________________________________  ADD VARIATION  _____________________*/
$('#add_variation').on('click', () => {
    $('#variation_row .form-row').clone().appendTo($('#variation_row .col'));
});




/*_______________________________________________________________  ADD VARIATION  _____________________*/
$('.variation#variation_attribute_s2').select2({
    placeholder: 'Select an attribute',
    width: 'resolve',
    theme: 'classic',
    tags: true,
    tokenSeparators: [',', ' ']
});
$('.variation#values_s2').select2({
    multiple: true,
    width: 'resolve',
    theme: 'classic',
    tags: true,
    tokenSeparators: [',', ' ']
});



/*_______________________________________________________________  COUPONS  _____________________*/
$('#categories_s2').select2({
    allowClear: true,
    width: 'resolve',
    theme: 'classic',
});