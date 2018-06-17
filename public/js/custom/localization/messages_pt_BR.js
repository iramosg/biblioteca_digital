(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else if (typeof module === "object" && module.exports) {
		module.exports = factory( require( "jquery" ) );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: PT (Portuguese; português)
 * Region: BR (Brazil)
 */
$.extend( $.validator.messages, {

	// Core
	required: "<p class='help-text danger'>Este campo &eacute; requerido</p>.",
	remote: "<p class='help-text danger'>Por favor, corrija este campo</p>.",
	email: "<p class='help-text danger'>Por favor, forne&ccedil;a um endere&ccedil;o de email v&aacute;lido</p>.",
	url: "<p class='help-text danger'>Por favor, forne&ccedil;a uma URL v&aacute;lida</p>.",
	date: "<p class='help-text danger'>Por favor, forne&ccedil;a uma data v&aacute;lida</p>.",
	dateISO: "<p class='help-text danger'>Por favor, forne&ccedil;a uma data v&aacute;lida (ISO)</p>.",
	number: "<p class='help-text danger'>Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido</p>.",
	digits: "<p class='help-text danger'>Por favor, forne&ccedil;a somente d&iacute;gitos</p>.",
	creditcard: "<p class='help-text danger'>Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido</p>.",
	equalTo: "<p class='help-text danger'>Por favor, forne&ccedil;a o mesmo valor novamente</p>.",
	maxlength: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres</p>." ),
	minlength: $.validator.format( "<p class='help-text danger'><p class='help-text danger'>Por favor, forne&ccedil;a ao menos {0} caracteres.</p>" ),
	rangelength: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento</p>." ),
	range: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a um valor entre {0} e {1}</p>." ),
	max: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a um valor menor ou igual a {0}</p>." ),
	min: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a um valor maior ou igual a {0}</p>." ),
	step: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a um valor m&acute;tiplo de {0}</p>." ),

	// Metodos Adicionais
	maxWords: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a com {0} palavras ou menos</p>." ),
	minWords: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a pelo menos {0} palavras</p>." ),
	rangeWords: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a entre {0} e {1} palavras</p>." ),
	accept: "<p class='help-text danger'>Por favor, forne&ccedil;a um tipo v&aacute;lido</p>.",
	alphanumeric: "<p class='help-text danger'>Por favor, forne&ccedil;a somente com letras, n&uacute;meros e sublinhados</p>.",
	bankaccountNL: "<p class='help-text danger'>Por favor, forne&ccedil;a com um n&uacute;mero de conta banc&aacute;ria v&aacute;lida</p>.",
	bankorgiroaccountNL: "<p class='help-text danger'>Por favor, forne&ccedil;a um banco v&aacute;lido ou n&uacute;mero de conta</p>.",
	bic: "<p class='help-text danger'>Por favor, forne&ccedil;a um c&oacute;digo BIC v&aacute;lido</p>.",
	cifES: "<p class='help-text danger'>Por favor, forne&ccedil;a um c&oacute;digo CIF v&aacute;lido</p>.",
	creditcardtypes: "<p class='help-text danger'>Por favor, forne&ccedil;a um n&uacute;mero de cart&atilde;o de cr&eacute;dito v&aacute;lido</p>.",
	currency: "<p class='help-text danger'>Por favor, forne&ccedil;a uma moeda v&aacute;lida</p>.",
	dateFA: "<p class='help-text danger'>Por favor, forne&ccedil;a uma data correta</p>.",
	dateITA: "<p class='help-text danger'>Por favor, forne&ccedil;a uma data correta</p>.",
	dateNL: "<p class='help-text danger'>Por favor, forne&ccedil;a uma data correta</p>.",
	extension: "<p class='help-text danger'>Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida</p>.",
	giroaccountNL: "<p class='help-text danger'>Por favor, forne&ccedil;a um n&uacute;mero de conta corrente v&aacute;lido</p>.",
	iban: "<p class='help-text danger'>Por favor, forne&ccedil;a um c&oacute;digo IBAN v&aacute;lido</p>.",
	integer: "<p class='help-text danger'>Por favor, forne&ccedil;a um n&uacute;mero n&atilde;o decimal</p>.",
	ipv4: "<p class='help-text danger'>Por favor, forne&ccedil;a um IPv4 v&aacute;lido</p>.",
	ipv6: "<p class='help-text danger'>Por favor, forne&ccedil;a um IPv6 v&aacute;lido</p>.",
	lettersonly: "<p class='help-text danger'>Por favor, forne&ccedil;a apenas com letras</p>.",
	letterswithbasicpunc: "<p class='help-text danger'>Por favor, forne&ccedil;a apenas letras ou pontua&ccedil;ões</p>.",
	mobileNL: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero v&aacute;lido de telefone</p>.",
	mobileUK: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero v&aacute;lido de telefone</p>.",
	nieES: "<p class='help-text danger'>Por favor, forne&ccedil;a um NIE v&aacute;lido</p>.",
	nifES: "<p class='help-text danger'>Por favor, forne&ccedil;a um NIF v&aacute;lido</p>.",
	nowhitespace: "<p class='help-text danger'>Por favor, n&atilde;o utilize espa&ccedil;os em branco</p>.",
	pattern: "<p class='help-text danger'>O formato fornenecido &eacute; inv&aacute;lido</p>.",
	phoneNL: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero de telefone v&aacute;lido</p>.",
	phoneUK: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero de telefone v&aacute;lido</p>.",
	phoneUS: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero de telefone v&aacute;lido</p>.",
	phonesUK: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero de telefone v&aacute;lido</p>.",
	postalCodeCA: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero de c&oacute;digo postal v&aacute;lido</p>.",
	postalcodeIT: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero de c&oacute;digo postal v&aacute;lido</p>.",
	postalcodeNL: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero de c&oacute;digo postal v&aacute;lido</p>.",
	postcodeUK: "<p class='help-text danger'>Por favor, fornece&ccedil;a um n&uacute;mero de c&oacute;digo postal v&aacute;lido</p>.",
	postalcodeBR: "<p class='help-text danger'>Por favor, forne&ccedil;a um CEP v&aacute;lido</p>.",
	require_from_group: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a pelo menos {0} destes campos</p>." ),
	skip_or_fill_minimum: $.validator.format( "<p class='help-text danger'>Por favor, optar entre ignorar esses campos ou preencher pelo menos {0} deles</p>." ),
	stateUS: "<p class='help-text danger'>Por favor, forne&ccedil;a um estado v&aacute;lido</p>.",
	strippedminlength: $.validator.format( "<p class='help-text danger'>Por favor, forne&ccedil;a pelo menos {0} caracteres</p>." ),
	time: "<p class='help-text danger'>Por favor, forne&ccedil;a um hor&aacute;rio v&aacute;lido, no intervado de 00:00 e 23:59</p>.",
	time12h: "<p class='help-text danger'>Por favor, forne&ccedil;a um hor&aacute;rio v&aacute;lido, no intervado de 01:00 e 12:59 am/pm</p>.",
	url2: "<p class='help-text danger'>Por favor, fornece&ccedil;a uma URL v&aacute;lida</p>.",
	vinUS: "<p class='help-text danger'>O n&uacute;mero de identifica&ccedil;&atilde;o de ve&iacute;culo informada (VIN) &eacute; inv&aacute;lido</p>.",
	zipcodeUS: "<p class='help-text danger'>Por favor, fornece&ccedil;a um c&oacute;digo postal americano v&aacute;lido</p>.",
	ziprange: "<p class='help-text danger'>O c&oacute;digo postal deve estar entre 902xx-xxxx e 905xx-xxxx</p>",
	cpfBR: "<p class='help-text danger'>Por favor, forne&ccedil;a um CPF v&aacute;lido.</p>"
} );
return $;
}));