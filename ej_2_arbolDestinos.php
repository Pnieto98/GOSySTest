<?php
// Your code here!
$ejemploDestinos1 = [
    [
        "nombre" => "America",
        "hijos" => [
            [
                "nombre" => "Argentina",
                "hijos" => [
                    [
                        "nombre" => "Buenos Aires",
                        "hijos" => [
                            [
                                "nombre" => "Pilar",
                                "hijos" => [["nombre" => "Manzanares"]]
                            ]
                        ]
                    ],
                    ["nombre" => "Córdoba"]
                ],
            ],
            [
                "nombre" => "Venezuela",
                "hijos" => [
                    ["nombre" => "Caracas"],
                    ["nombre" => "Vargas"]
                ]
            ]
        ]
    ]
];

$ejemploDestinos2 = [
    [
        "nombre" => "America",
        "hijos" => [
            [
                "nombre" => "Argentina",
                "hijos" => [
                    ["nombre" => "Buenos Aires"],
                    ["nombre" => "Córdoba"],
                    ["nombre" => "Santa Fe"]
                ],
            ],
            [
                "nombre" => "EEUU",
                "hijos" => [
                    ["nombre" => "Arizona"],
                    ["nombre" => "Florida"]
                ]
            ]
        ]
    ],
    [
        "nombre" => "Europa",
        "hijos" => [
            ["nombre" => "España"],
            ["nombre" => "Italia"],
        ]
    ]
];

$buscador = buscarDestinos("nombre", $ejemploDestinos2, "ee");


/**
 * Función para buscar destinos en base a la key del array y el valor a matchear
 * 
 * @param string $key
 * @param array $destinos
 * @param string $value
 * 
 * @return array
 */
function buscarDestinos(string $key, array $destinos,  string $substring)
{
    $match = [];
    # Compruebo que exista en el array la key indicada
    if (isset($destinos[$key])) {
        # Ingonoro mayus y minus, busco el valor indicado de derecha a izquierda en el substring del array
        if (strripos($destinos[$key], $substring,  -strlen($destinos[$key])) !== false) {
            # Si existe lo pusheo en el array de match
            $match[] = $destinos[$key];
        }
    }
    # Recorro el array
    foreach ($destinos as $destinos_hijo) {
        # Consulto si el $destino_hijo es un array para evitar error de compilación/exception
        if (is_array($destinos_hijo))  $match = array_merge($match, buscarDestinos($key, $destinos_hijo, $substring)); # Aplico recursividad para recorrer los hijos y mergeo resultado
    }
    return $match;
}
