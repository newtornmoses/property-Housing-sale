//get stripe aip key
// Stripe.setApiKey('');

$form = $('.checkoutForm');
$Formerrors = $('.Formerrors');
$form.submit(function(e) {
    e.preventDefault();

    //disable btn
    //$form.find('button').prop('disabled', true);
    //hide errors

    $form.find('.stripeToken').attr('value', 'Tok_343hhjsdf4343ss');
    $form.get(0).submit();
    // $Formerrors.addClass('hidden');

    // Stripe.card.createToken({
    //     name = $form.find('.name'),
    //     card_no = $form.find('.cardnumber'),
    //     exp_month = $form.find('.exp_month'),
    //     exp_year = $form.find('.exp_year'),
    //     cvc = $form.find('.cvc'),


    // }, stripeRequestHandler);

});


function stripeRequestHandler(status, request) {
    if (response.message.error) {
        $Formerrors.removeClass('hidden');
        $form.find('button').prop('disabled', false);

    } else {
        var token = response.id;

        $form.append($('<input type="hidden" name="srtiprToken"/>).val(token)'));
        $form.get(0).submit();
    }

}