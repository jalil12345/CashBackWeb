export function formatCashback(cashbackStr) {
    // Convert the cashback rate to a float and format it to remove unnecessary trailing zeros
    let cashbackValue = parseFloat(cashbackStr);
    // Format the number to trim unnecessary zeros
    return cashbackValue.toFixed(8).replace(/\.?0+$/, '');
}