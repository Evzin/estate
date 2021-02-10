import { validateData, renderValidation, resetValidation } from './validation';

const formSubmit = (Form, Fields, postData) => {

	resetValidation(Form);
	let formErrors = validateData(Form, Fields);	
	if ( formErrors.length > 0 ) {
		renderValidation(Form, formErrors);
	} else {
		resetValidation(Form);
		$(Form).find('.btn-submit .spinner-border').fadeIn();

		let Req = $.post(
			tc_ajax.url,
			postData
		);

		Req.done(
			resp => {
				$(Form).find('.btn-submit .spinner-border').fadeOut();
				if ( resp.success ) {
					window.location.href = "/";
				} else {
					console.log("ERR", resp.data.errors);
					renderValidation(Form, resp.data.errors);
				}
			}
		);
	}
}

export default formSubmit;