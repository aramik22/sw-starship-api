# SW-STARSHIP-API

Descripción: La Api consume datos de swapi y agrega funcionalidades para agregar quitar y establecer cantidades de vehículos y starships.
Fué desarrollada en Laravel, requiere PHP >=7.25, y sqlite3. Se utilizo dicho motor de base de datos.
A su vez se desarrolló una Web integrando AdminLTE a Laravel, con el objetivo de poder utilizar todas las funcionalidades de dicha api.
La Web se encuentra disponible Online en  http://dynagroup.mooo.com:8071/sw-starship-api/home
La Api sincroniza con swapi bajando todos los datos a nuestra DB y generando nuestro universo paralelo de Star Wars.


## INSTALACION:

Descargar Repo y correr el servidor de Laravel con php artisan serve, ello nos habilitará el projecto en el puerto 8000.


## API documentacion

RESPUESTAS DE LA API

| Valor | Descripcion |
| --- | --- |
| 200 OK | Respuesta Correcta | 
| 400 Bad Request | Para error de Parámetros | 
| 404 Not found | Cuando no hay ninguna respuesta encontrada | 


---

#### GET `/api/show_all_starships`

Devuelve todas las starships de nuestro universo.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:*

```shell
curl -v –X GET http://localhost:8000/api/show_all_starships -H "Content-Type:application/json" 

```

Respuesta:

  {
    "starship_id": "1",
    "name": "CR90 corvette",
    "model": "CR90 corvette",
    "manufacturer": "Corellian Engineering Corporation",
    "cost_in_credits": "3500000",
    "length": "150",
    "max_atmosphering_speed": "950",
    "crew": "30-165",
    "passengers": "600",
    "cargo_capacity": "3000000",
    "consumables": "1 year",
    "hyperdrive_rating": "2.0",
    "MGLT": "60",
    "starship_class": "corvette",
    "total_count": "444"
  }
