"use strict"

function ShortForm(form) {
	this.form = form;
	this.checkInput($(this.form).find("input[name=full-link]"));
}

ShortForm.prototype = {
	submit: function () {
		let object = this;
		object.hideMessage();
		$.ajax({
			url: "/ajax.php",
			method: "post",
			dataType: "json",
			data: {
				link: $(object.form).find("input[name=full-link]").val()
			},
			success: function (data) {
				if (data.status) {
					$(object.form)[0].reset();
				}

				object.showMessage(data.message);
			},
			error: function (error) {
				object.showMessage("Произошла ошибка");
			}
		})
		return false;
	},

	checkInput: function (input) {
		if ($(input).val().length > 0)
			$(this.form).find("input[type=submit]").removeClass("disabled");
		else
			$(this.form).find("input[type=submit]").addClass("disabled");
	},

	showMessage: function (message) {
		$(this.form).find(".form-result").html(message).slideDown(200);
	},

	hideMessage: function () {
		$(this.form).find(".form-result").hide();
	}
}