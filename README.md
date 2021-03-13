## Laravel project ContinentsAPI

Documentation to ContinentsAPI
APIs.

-   [How to run project](#how)
-   [Dummy data](#dummy)
-   [API methods](#api)
    -   [Continent](#continent)
        -   [Get all continents](#continent-all)
        -   [Get continent](#continent-get)
        -   [Get continent countries](#continent-country)
        -   [Post](#continent-post)
        -   [Put](#continent-put)
        -   [Delete](#continent-delete)
    -   [Country](#country)
        -   [Get](#country-get)
        -   [Post](#country-post)
        -   [Put](#country-put)
        -   [Delete](#country-delete)
-   [HTTP Response Codes](#responses)

## <a name="how"></a>How to run project:

-   Create a database locally
-   Rename `.env.example` file to `.env`inside your project root and fill the database information.
-   Open the console and cd your project root directory
-   Run `composer install` or `php composer.phar install`
-   Run `php artisan migrate`
-   Run `php artisan db:seed` to run seeders, if any.
-   Run `php artisan serve`

#### You can now access your project at localhost:8000 :)

### If for some reason your project stop working do these:

-   `composer install`
-   `php artisan migrate`

# <a name="dummy">Dummy data

Run `php artisan db:seed`

Creates 5 continents with 5 countries each.

# <a name="api"></a>API methods

| Url                                          | Method | Description                  |
| -------------------------------------------- | ------ | ---------------------------- |
| /continent                                   | get    | Get all continents           |
| /continent/{continentId}                     | get    | Get continent by id          |
| /continent                                   | post   | Add new continent            |
| /continent/{continentId}                     | put    | Update continent by id       |
| /continent/{continentId}                     | delete | Delete continent by id       |
| /continent/{continentId}/country             | get    | Get continent countries      |
| /continent/{continentId}/country/{countryId} | get    | Get country                  |
| /continent/{continentId}/country/            | post   | Add new country to continent |
| /continent/{continentId}/country/{countryId} | put    | Update country by id         |
| /continent/{continentId}/country/{countryId} | delete | Delete country by id         |

## <a name="continent"></a>Continent

### <a name="continent-all">Get all

```no-highlight
Get http://127.0.0.1:8000/continent
```

#### Optional body parameters

| Name   | Type            |
| ------ | --------------- |
| search | text or integer |
| date   | date            |

#### Response

```json

```

### <a name="continent-get">Get continent

```no-highlight
Get http://127.0.0.1:8000/continent/{continentId}
```

#### Response

```json
{
    "continents": [
        {
            "id": 1,
            "name": "Asia",
            "area": 7639385,
            "population": 486220,
            "density": "94",
            "created_at": "2021-03-10 20:58:02"
        },
        {
            "id": 2,
            "name": "Africa",
            "area": 8125717,
            "population": 336050,
            "density": "120",
            "created_at": "2021-03-10 20:58:03"
        },...
    ]
}
```

### <a name="continent-country">Get continent countries

```no-highlight
Get http://127.0.0.1:8000/continent/{continentId}/country
```

#### Optional body parameters

| Name   | Type            |
| ------ | --------------- |
| search | text or integer |
| date   | date            |

#### Response

```json
{
    "countries": [
        {
            "id": 16,
            "name": "USA",
            "area": 25791,
            "population": 3253,
            "phone_code": 648,
            "continent_id": 4,
            "created_at": "2021-03-10 20:58:03"
        },
        {
            "id": 17,
            "name": "Mexico",
            "area": 59498,
            "population": 3007,
            "phone_code": 802,
            "continent_id": 4,
            "created_at": "2021-03-10 20:58:03"
        },...
    ]
}
```

### <a name="continent-post">Post

```no-highlight
post http://127.0.0.1:8000/continent/
```

#### Body parameters

| Name       | Type    |
| ---------- | ------- |
| name       | string  |
| area       | integer |
| population | integer |
| density    | string  |

#### Response

```json
{
    "message": "Continent successfully created",
    "continent": {
        "name": "Australia",
        "area": "15400",
        "population": "984563",
        "density": "145",
        "created_at": "2021-03-13 18:07:37",
        "id": 6
    }
}
```

### <a name="continent-put">Put

```no-highlight
put http://127.0.0.1:8000/continent/{continentId}
```

#### Body parameters

| Name       | Type    |
| ---------- | ------- |
| name       | string  |
| area       | integer |
| population | integer |
| density    | string  |

#### Response

```json
{
    "message": "Continent successfully updated",
    "continent": {
        "id": 6,
        "name": "Australia",
        "area": "1",
        "population": "2",
        "density": "3",
        "created_at": "2021-03-13 18:07:37"
    }
}
```

### <a name="continent-delete">Delete

```no-highlight
delete http://127.0.0.1:8000/continent/{continentId}
```

#### Response

```json
{
    "message": "Continent successfully deleted"
}
```

## <a name="country"></a>Country

### <a name="country-get">Get country

```no-highlight
Get http://127.0.0.1:8000/continent/{continentId}/country/{countryId}
```

#### Response

```json
{
    "countries": [
        {
            "id": 21,
            "name": "Brazil",
            "area": 54910,
            "population": 2883,
            "phone_code": 960,
            "continent_id": 5,
            "created_at": "2021-03-10 20:58:03"
        },
        {
            "id": 22,
            "name": "Colombia",
            "area": 36364,
            "population": 3094,
            "phone_code": 986,
            "continent_id": 5,
            "created_at": "2021-03-10 20:58:03"
        },...
    ]
}
```

### <a name="country-post">Post

```no-highlight
post http://127.0.0.1:8000/country/{continentId}/country
```

#### Body parameters

| Name       | Type    |
| ---------- | ------- |
| name       | string  |
| area       | integer |
| population | integer |
| phone_code | integer |

#### Response

```json
{
    "message": "Country successfully created",
    "country": {
        "name": "Latvia",
        "area": "58769",
        "population": "14526",
        "phone_code": "347",
        "continent_id": 5,
        "created_at": "2021-03-13 18:09:46",
        "id": 26
    }
}
```

### <a name="country-put">Put

```no-highlight
put http://127.0.0.1:8000/country/{continentId}/country/{countryId}
```

#### Body parameters

| Name       | Type    |
| ---------- | ------- |
| name       | string  |
| area       | integer |
| population | integer |
| phone_code | integer |

#### Response

```json
{
    "message": "Country successfully updated",
    "country": {
        "id": 26,
        "name": "Latvia",
        "area": "1",
        "population": "2",
        "phone_code": "3",
        "continent_id": 5,
        "created_at": "2021-03-13 18:09:46"
    }
}
```

### <a name="country-delete">Delete

```no-highlight
delete http://127.0.0.1:8000/country/{continentId}/country/{countryId}
```

#### Response

```json
{
    "message": "Country successfully deleted"
}
```

## <a name="responses"></a>HTTP Response Codes

Each response will be returned with one of the following HTTP status codes:

-   `200` `OK` The request was successful
-   `400` `Bad Request` There was a problem with the request (security, malformed, data validation, etc.)
-   `403` `Forbidden` The credentials provided do not have permission to access the requested resource
-   `404` `Not found` An attempt was made to access a resource that does not exist in the API
-   `405` `Method not allowed` The resource being accessed doesn't support the method specified (GET, POST, etc.).
-   `500` `Server Error` An error on the server occurred
