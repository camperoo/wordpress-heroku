(function($) {

	var $context = $('#mc4wp-admin');

	// Ask for confirmation when someone tries to delete a form
	$context.find('.forms .submitdelete').click( function() {
		return confirm( "Are you sure you want to delete this form?" );
	});

	// Show send-welcome field only when double opt-in is disabled
	$context.find('input[name$="[double_optin]"]').change(function() {
		if($(this).val() == 0) {
			$context.find("#mc4wp-send-welcome").removeClass('hidden').find(':input').removeAttr('disabled');
		} else {
			$context.find("#mc4wp-send-welcome").addClass('hidden').find(':input').attr('disabled', 'disabled').attr('checked', false);
		}
	});

	// Show woocommerce settings only when woocommerce checkout is checked
	$context.find('input[name$="[show_at_woocommerce_checkout]"]').change(function() {
		$context.find('#woocommerce-settings').toggle( $(this).prop( 'checked') );
	});

	// Show replace-interests field only when update existing is enabled
	$context.find('input[name$="[update_existing]"]').change(function() {
		if($(this).val() == 1) {
			$context.find("#mc4wp-replace-interests").removeClass('hidden').find(':input').removeAttr('disabled');
		} else {
			$context.find("#mc4wp-replace-interests").addClass('hidden').find(':input').attr('disabled', 'disabled').attr('checked', false);
		}
	});

	// Show custom color only only when `custom-color` is selected
	$context.find("select[name$='[css]']").change(function() {
		$context.find("#mc4wp-custom-color").toggle(($(this).val() == 'custom-color'));
	});

	// init
	$context.find('.color-field').wpColorPicker();

})(jQuery);