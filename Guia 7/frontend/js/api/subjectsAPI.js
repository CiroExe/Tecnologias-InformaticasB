/**
*    File        : frontend/js/api/subjectsAPI.js
*    Project     : CRUD PHP
*    Author      : Tecnologías Informáticas B - Facultad de Ingeniería - UNMdP
*    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
*    Date        : Mayo 2025
*    Status      : Prototype
*    Iteration   : 3.0 ( prototype )
*/

//Importa la funcion 'createAPI' de la "fabrica" de APIS.
import { createAPI } from './apiFactory.js';
//Exporta para que otros modulos puedan ejecutar la funcion con el nombre subjectsAPI.
export const subjectsAPI = createAPI('subjects');