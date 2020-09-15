# OpenMulta

OpenMulita fue creado por Damian Delgado.

Es un framework en * PHP * y * MySql *. y se base en el patron de diseño MVC.

Es un sistema que funciona a traves del modulos. 

El flujo del sistema es marcado por las acciones.

El flujo interno del sistema es dado a través de POST
Los principales parámetros son. 

* 1) integracion. Marca si el camino va por un modulo o si va por algún sistema en particular 
* 2) modulo: Es el modulo que se va a utilizar
* 3) gestion: Va a marcar que controlar dentro el modulo se va a acceder
* 4) accion: Indica que acción se va a realizar.
* 5) formulario: Indica que vista se va a acceder. 
* 6) idioma: Es el idioma activo dentro el sistema.


## Modulos.

1) Sistema: Modulo principal encargado de controlar. Módulos, Gestiones, Acciones, Usuarios.

1.1) Modulos: Controla los módulos instalados en el sistema.

1.2) Gestiones: Controlas las gestiones que se puede utilizar en el modulo (Son controladores). 

1.3) Acciones: Son las acciones que se puede realizar dentro del sistema. 

1.4) Usuarios: Maneja los usuarios del sistema.


## Requisitos 

* PHP 5.5 o superiror.

* MySQL 5.6 o superiror / Maria DB 10.1.32-MariaDB o superiror



## Descargar
~~~
$ git clone https://github.com/OpenMulita/openMulita_alpha.git
~~~

## Instalación
La instalación solo consiste en crear las tablas trigger y funciones MySQL que precisa el sistema.  
Para realizar la instalación nos paramos en directorio principal y ejecutamos  ...

~~~  
$ php mulita instalacion 

~~~


