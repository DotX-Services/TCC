new Cleave('#inputCPF', {
    blocks: [3, 3, 3, 2],
    delimiters: ['.', '.', '-'],
    numericOnly: true
});

new Cleave('#inputCEP', {
    blocks: [5, 3],
    delimiters: ['-'],
    numericOnly: true
});

new Cleave('#inputTelefone', {
    blocks: [0, 2, 5, 4],
    delimiters: ['(' ,') ', ' '],
    numericOnly: true
});