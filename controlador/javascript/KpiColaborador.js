/**
 * Interprete de JS a PHP : KpiControlador
 */

var MLUtility = {
	POST: async function (datos) {
		let result = await fetch('./JavaScriptPhP.php', {
            method: "POST",
            body: JSON.stringify(datos),
            headers: {"Content-type": "application/json; charset=UTF-8"}
        });
        return await result.json();
	}
}