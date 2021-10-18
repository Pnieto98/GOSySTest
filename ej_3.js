let facturas = [
    {
        cliente: {
            nombre: "Coca Cola",
            tipo: "B2B"
        },
        pagada: false,
        items: [
            { subtotal: 1234.44, descripcion: 'asdfg' },
            { subtotal: 5678.88, descripcion: 'qwerty' }
        ]
    },
    {
        cliente: {
            nombre: "Juan Perez",
            tipo: "B2C"
        },
        pagada: false,
        items: [
            { subtotal: 5556.54, descripcion: 'asdfg' },
            { subtotal: 9632.21, descripcion: 'qwerty' }
        ]
    },
    {
        cliente: {
            nombre: "John Smith",
            tipo: "B2C"
        },
        pagada: true,
        items: [
            { subtotal: 1234.44, descripcion: 'asdfg' },
            { subtotal: 5678.88, descripcion: 'qwerty' }
        ]
    },
    {
        cliente: {
            nombre: "Esteban Quito",
            tipo: "B2C"
        },
        pagada: false,
        items: [
            { subtotal: 895.7, descripcion: 'asdfg' },
            { subtotal: 8542.34, descripcion: 'qwerty' },
            { subtotal: 9674.95, descripcion: 'qwerty' }
        ]
    }
];
/* Sumar el total adeudado (osea lo no pagado) 
por tipo de cliente sin usar bucles ni forEach */
let total = calcularTotal();
console.log(total);

function calcularTotal() {
    // Busco los diferentes tipos de facturas que hay (descartando los duplicados)
    let tipos = [];

    facturas.map((factura) => {
        if (!tipos.includes(factura.cliente.tipo)) {
            tipos.push(factura.cliente.tipo);
        }
    })
    // Sumo los subtotales de cada tipo
    return tipos.map(total => calcularTotalTipos(total))
        .reduce((total, subtotal) => total + subtotal)
        .toFixed(2); // Redondo a los dos decimos
}
function calcularTotalTipos(tipo) {
    // Verifico los tipos y que la factura este impaga
    return facturas.filter(factura => factura.cliente.tipo == tipo && factura.pagada != true)
        .map(factura => factura.items.map(item => item.subtotal))
        .reduce((total, subtotal) => total.concat(subtotal))
        .reduce((total, subtotal) => total + subtotal);
}