module.exports = { 
	
	validateData: ( Form, Fields ) => {

		let errors = [];
		let formData = Form.serializeArray();

		$.each(
			formData, 
			(k, v) => {
				if ( v.name in Fields ) {
					$.each(
						Fields[v.name], 
						(idx, item) =>{
							if ( item.check(v.value) === false ) {
								errors.push({
									name: v.name,
									message: item.message
								});
								
							}
						}
					);
				}
			}
		);

		return errors;
	},

	renderValidation: ( Form, Errors ) => {

		$.each(
			Errors,
			(k, v) => {
				Form.find(`[for = ${v.name}]`).html( v.message );
				Form.find(`[name ="${v.name}"]`).addClass('is-invalid');
			}
		)

	},

	resetValidation: ( Form ) => {
		$(Form).find('input').removeClass('is-invalid');
	}
}