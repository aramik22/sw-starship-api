# SW-STARSHIP-API

Descripción: La Api consume datos de swapi y agrega funcionalidades para agregar quitar y establecer cantidades de vehículos y starships.
Fué desarrollada en Laravel >=7.29, requiere PHP >=7.25, y sqlite3. Se utilizo dicho motor de base de datos.
A su vez se desarrolló una Web integrando AdminLTE a Laravel, con el objetivo de poder utilizar todas las funcionalidades de dicha api.
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
  }......
#### GET `/api/show_starship`

Devuelve una Starship por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/show_starship

```

{
	"name": "CR90 corvette"
	
}

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

#### GET `/api/get_total_count_starship`

Devuelve la popiedad total_count de una Starship por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/get_total_count_starship

```

{
	"name": "CR90 corvette"
	
}

{
  "total_count": "444"
} 

#### GET `/api/show_all_vehicles`

Devuelve todos las vehicles de nuestro universo.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:*

```shell
curl -v –X GET http://localhost:8000/api/show_all_vehicles -H "Content-Type:application/json" 

```

Respuesta:

 {
    "vehicle_id": "1",
    "name": "Sand Crawler",
    "model": "Digger Crawler",
    "manufacturer": "Corellia Mining Corporation",
    "cost_in_credits": "150000",
    "length": "36.8",
    "max_atmosphering_speed": "30",
    "crew": "46",
    "passengers": "30",
    "cargo_capacity": "50000",
    "consumables": "2 months",
    "vehicle_class": "wheeled",
    "total_count": "200"
  }....
#### GET `/api/show_vehicle`

Devuelve un Vehicle por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 


```shell
http://localhost:8000/api/show_vehicle

```

{
	"name": "Snowspeeder"
	
}

Respuesta:

{
  "vehicle_id": "5",
  "name": "Snowspeeder",
  "model": "t-47 airspeeder",
  "manufacturer": "Incom corporation",
  "cost_in_credits": "unknown",
  "length": "4.5",
  "max_atmosphering_speed": "650",
  "crew": "2",
  "passengers": "0",
  "cargo_capacity": "10",
  "consumables": "none",
  "vehicle_class": "airspeeder",
  "total_count": "0"
}
#### GET `/api/get_total_count_vehicle`

Devuelve la propiedad total_count de un Vehicle por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/get_total_count_vehicle

```

{
	"name": "Snowspeeder"
	
}

Respuesta:

{
  "total_count": "444"
} 
#### PUT `/api/set_total_count_vehicle`

Setea la propiedad total_count de un Vehicle por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/set_total_count_vehicle

```

{
	"name": "Snowspeeder",
	"total_count": "19"
	
}

Respuesta: The new total of Snowspeeder is 19

#### PUT `/api/set_total_count_vehicle_by_id`

Setea la propiedad total_count de un Vehicle por su id.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/set_total_count_vehicle_by_id

```

{
	"vehicle_id": "2",
	"total_count": "3"
	
}

Respuesta: The new total is 3

#### PUT `/api/set_total_count_starship`

Setea la propiedad total_count de una Starship por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/set_total_count_starship

```

{
	"name": "Y-wing",
	"total_count": "23"
	
}

Respuesta: The new total of Y-wing is 23

#### PUT `/api/set_total_count_starship_by_id`

Setea la propiedad total_count de una Starship por su id.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/set_total_count_starship_by_id

```

{
	"starship_id": "7",
	"total_count": "45"
	
}

Respuesta: The new total is 45

#### PUT `/api/add_total_count_starship`

Suma a la propiedad total_count de una Starship por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/add_total_count_starship

```

{
	"name": "Y-wing",
	"add": "3"
	
}

Respuesta: The new total of Y-wing is 26

#### PUT `/api/add_total_count_starship_by_id`

Suma a la propiedad total_count de una Starship por su id.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/add_total_count_starship_by_id

```

{
	"starship_id": "8",
	"add": "41"
	
}

Respuesta: The new total is 41

#### PUT `/api/add_total_count_vehicle`

Suma a la propiedad total_count de un Vehicle por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/add_total_count_vehicle

```

{
	"name": "Bantha-II cargo skiff",
	"add": "11"
	
}

Respuesta: TThe new total of Bantha-II cargo skiff is 11

#### PUT `/api/add_total_count_vehicle_by_id`

Suma a la propiedad total_count de un Vehicle por su id.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/add_total_count_vehicle_by_id

```

{
	"vehicle_id": "14",
	"add": "57"
	
}

Respuesta: The new total is 57

#### PUT `/api/subtract_total_count_vehicle`

Resta a la propiedad total_count de un Vehicle por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/subtract_total_count_vehicle

```

{
	"name": "Bantha-II cargo skiff",
	"subtract": "1"
	
}

Respuesta: TThe new total of Bantha-II cargo skiff is 11

#### PUT `/api/subtract_total_count_vehicle_by_id`

Resta a la propiedad total_count de un Vehicle por su id.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/subtract_total_count_vehicle_by_id

```
{
	"vehicle_id": "14",
	"subtract": "3"
	
}

Respuesta: The new total is 57

#### PUT `/api/subtract_total_count_starship`

Resta a la propiedad total_count de una Starship por su nombre.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/subtract_total_count_starship

```

{
	"name": "Y-wing",
	"subtract": "3"
	
}

Respuesta: The new total of Y-wing is 26

#### PUT `/api/subtract_total_count_starship_by_id`

Resta a la propiedad total_count de una Starship por su id.

##### *Headers:*

| Name | Value |
| --- |---| --- |
| Content-Type | application/json |

##### *Ejemplo:* 

```shell
http://localhost:8000/api/subtract_total_count_starship_by_id

```
{
	"starship_id": "8",
	"subtract": "1"
	
}

Respuesta: The new total is 41

#### GET `/sincronize_starships`

Vuelve a bajar todas las Starships de Swapi


##### *Ejemplo:*

```shell
http://localhost:8000/sincronize_starships

```
#### GET `/sincronize_vehicles`

Vuelve a bajar todos los Vehicles de Swapi


##### *Ejemplo:*

```shell
http://localhost:8000/sincronize_vehicles

```

## WEB documentacion

La Web fué desarrollada con el fín de implementar la API y a su vez tener una Interface Visual para complementar el Projecto.
Usé AdminLTE el cuál lo integré a LARAVEL utilizando blade.
Desde la WEB se puede consultar cada vehicle y starship, ver sus datos, su total_count, y poder hacer un SET de dicha propiedad. A su vez cada Vehicle o Starship cuenta con una imagen representativa, las mismas son a modo de ejemplo y pueden no ser las reales.


#### HOME PAGE `/home`

En esta página tenemos los datos de todos los vehículos y starships de nuestro universo.

```shell
http://localhost:8000/home
```


```shell
http://dynagroup.mooo.com:8071/sw-starship-api/home
```

#### STARSHIPS PAGE `/starships`

En esta página tenemos los datos de todos los starships de nuestro universo.

```shell
http://localhost:8000/starships
```
```shell
http://dynagroup.mooo.com:8071/sw-starship-api/starships
```

#### STARSHIP PAGE `/starship`

En esta página tenemos la info del starship seleccionado y podremos setear el nuevo total_count.

```shell
http://localhost:8000/starship/1
```
```shell
http://dynagroup.mooo.com:8071/sw-starship-api/starship/1
```

#### VEHICLES PAGE `/vehicles`

En esta página tenemos los datos de todos los vehicles de nuestro universo.

```shell
http://localhost:8000/vehicles
```
```shell
http://dynagroup.mooo.com:8071/sw-starship-api/vehicles
```

#### VEHICLE PAGE `/vehicle`

En esta página tenemos la info del vehicle seleccionado y podremos setear el nuevo total_count.

```shell
http://localhost:8000/vehicle/7
```
```shell
http://dynagroup.mooo.com:8071/sw-starship-api/vehicle/7
```


## TEST 

Cree algunos test en Feature.

## DATABASE 

La misma esta hecha con sqlite3 en /database
Son 4 tablas, vehicles, starships, vehicles_images y starships_images.
Para no perder las imágenes cargadas al momento de resincronizar con swapi en caso de hacerlo, las mismas fueron vinculadas utilizando el campo "name" de vehicles y starships, que es unique, en lugar de usar un id para hacerlo.

<p align="center"><a><img src="https://i.ibb.co/0qsbR9t/Captura-de-pantalla-de-2021-01-10-16-32-30.png" width="800"></a></p>
