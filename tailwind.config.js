/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["**/*.{php,js}"],
	theme: {
		extend: {},
	},
	plugins: [require("daisyui")],
	daisyui: {
		themes: ["cupcake"],
	},
};
