<?php
/**
 * Created by PhpStorm.
 * User: pecalleja
 * Date: 29/09/2017
 * Time: 10:31 PM
 */

namespace AppBundle\DataFixtures\ORM;

class MoviesDataFixtures
{
    /**
     * Generador aleatorio de descripciones en forma de parrafo
     *
     * @var int minimo
     * @var int maximo
     * @var string idioma
     * @return  string Descripción aleatoria generada.
     */
    static public function  getDescripcionParrafo($minimo, $maximo, $idioma = 'es')
    {
        $texto = MoviesDataFixtures::getDescripcion($idioma);
        $frases = array_flip($texto);
        $numeroFrases = rand($minimo, $maximo);
        return implode(' ', array_rand($frases, $numeroFrases));
    }

    /**
     * Generador aleatorio de descripciones en forma de linea
     *
     * @var string idioma
     * @return  string Descripción aleatoria generada.
     */
    static public function  getDescripcionLinea($idioma = 'es')
    {
        $texto = MoviesDataFixtures::getDescripcion($idioma);
        return $texto[array_rand($texto)];
    }

    /**
     * Obtiene el texto de la descripcion en forma de arreglo
     *
     * @var int
     * @return  string Descripción aleatoria generada.
     */
    static public function  getDescripcion($idioma = 'es')
    {
        $dumy_text = array(
            'es' => array(
                'Una mañana, tras un sueño intranquilo,',
                'Gregorio Samsa se despertó convertido en un monstruoso insecto.',
                'Estaba echado de espaldas sobre un duro caparazón y, al alzar la cabeza,',
                'vio su vientre convexo y oscuro, surcado por curvadas callosidades,',
                'sobre el que casi no se aguantaba la colcha, ',
                'que estaba a punto de escurrirse hasta el suelo. Numerosas patas,',
                'penosamente delgadas en comparación con el grosor normal de sus ',
                'piernas, se agitaban sin concierto.',
                '- ¿Qué me ha ocurrido? No estaba soñando. Su habitación, una habitación normal',
                'aunque muy pequeña, tenía el aspecto habitual.',
                'Sobre la mesa había desparramado un muestrario de paños',
                ' Samsa era viajante de comercio-, y de la pared colgaba una estampa',
                'recientemente recortada de una revista ilustrada y puesta en un marco dorado.',
                'La estampa mostraba a una mujer tocada con un gorro de pieles, envuelta en ',
                'una estola también de pieles, y que, muy erguida,',
                'esgrimía un amplio manguito, asimismo de piel, que ocultaba todo su antebrazo.',
                'Gregorio miró hacia la ventana; estaba nublado, y sobre el cinc del alféizar '
            ),
            'en' => array(
                'One morning, when Gregor Samsa woke from troubled dreams,',
                'he found himself transformed in his bed into a horrible vermin.',
                'He lay on his armour-like back, and if he lifted his head a little',
                'he could see his brown belly, slightly domed and divided',
                'by arches into stiff sections. The bedding was hardly able to c',
                'over it and seemed ready to slide off any moment. His many legs,' ,
                'pitifully thin compared with the size of the rest of him, waved ;',
                'about helplessly as he looked. "What\'s happened to me?" he thought.',
                'It wasn\'t a dream. His room, a proper human room although a little too',
                'small, lay peacefully between its four familiar walls. A collection of t',
                'extile samples lay spread out on the table - Samsa was a travelling ',
                'salesman - and above it there hung a picture that he had recently cut ',
                'out of an illustrated magazine and housed in a nice, gilded frame. ',
                'It showed a lady fitted out with a fur hat and fur boa who sat ',
                'upright, raising a heavy fur muff that covered the whole of her ',
                'lower arm towards the viewer. Gregor then turned to look out ',
                'the window at the dull weather.',
            )
        );
        return $dumy_text[$idioma];
    }

    /**
     * Generador aleatorio de nombres de personas.
     * Aproximadamente genera un 50% de hombres y un 50% de mujeres.
     *
     * @return string Nombre aleatorio generado
     */
    static public function getNombre()
    {
        $hombres = array(
            'Antonio', 'José', 'Manuel', 'Francisco', 'Juan', 'David',
            'José Antonio', 'José Luis', 'Jesús', 'Javier', 'Francisco Javier',
            'Carlos', 'Daniel', 'Miguel', 'Rafael', 'Pedro', 'José Manuel',
            'Ángel', 'Alejandro', 'Miguel Ángel', 'José María', 'Fernando',
            'Luis', 'Sergio', 'Pablo', 'Jorge', 'Alberto'
        );
        $mujeres = array(
            'María Carmen', 'María', 'Carmen', 'Josefa', 'Isabel', 'Ana María',
            'María Dolores', 'María Pilar', 'María Teresa', 'Ana', 'Francisca',
            'Laura', 'Antonia', 'Dolores', 'María Angeles', 'Cristina', 'Marta',
            'María José', 'María Isabel', 'Pilar', 'María Luisa', 'Concepción',
            'Lucía', 'Mercedes', 'Manuela', 'Elena', 'Rosa María'
        );
        $apellido = array(
            'Perez', 'Gonzalez','Rodriguez','Garcia','Domingues','Puebla','Romero',
            'Cardenas', 'Lugo', 'Arias', 'Suares', 'Vazquez', 'Palacio', 'Navas',
            'Reyes', 'Acosta', 'Canto', 'Ayala', 'Ortiz', 'Claus', 'Fernandez',
            'Diaz','Martinez','Ramirez','Torres','Ruiz','Aguirre','Benitez','Medina',
            'Flores', 'Alvarez', 'Sosa', 'Romero', 'Rios', 'Cabrera', 'Morales','Moreno'
        );

        $apellidos = $apellido[array_rand($apellido)]." ".$apellido[array_rand($apellido)];

        if (rand() % 2) {
            return $hombres[array_rand($hombres)]." ".$apellidos;
        } else {
            return $mujeres[array_rand($mujeres)]." ".$apellidos;
        }
    }

}