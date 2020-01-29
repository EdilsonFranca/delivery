class MoneyHelper {
    
    constructor() {
        throw new Error('Esta classe não pode ser instanciada');
    }
    
    static floatToMoneyText(value) {
        var text = (value < 1 ? "0" : "") + Math.floor(value * 100);
        text = "R$ " + text;
         return text.substr(0, text.length - 2) + "," + text.substr(-2);
    }

    static moneyTextToFloat(text) {
        var cleanText = text.replace("R$ ", "").replace(",", ".");
        return parseFloat(cleanText);
    }

}