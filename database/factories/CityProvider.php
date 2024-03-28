<?php

namespace Database\Factories;

use Faker\Provider\Base;

class CityProvider extends Base
{
    protected static $citiesRu = [
        "Анаа", "Аррабури", "Эль-Ариш", "Аннаба", "Апалачикола",
        "Авелино Вьейра", "Аахен", "Аррайас", "Аварадам, Каяна Айрстрип", "Аранука",
        "Ольберг", "Маламала", "Эль-Айн", "Анако", "Хьюстон", "Анапа", "Тирструп",
        "Апалапсили", "Алтай", "Асау", "Сураллах", "Аракса", "Эль-Гайда", "Кетсальтенанго",
        "Абакан", "Асаба", "Альбасет", "Абадан", "Аллентаун", "Абайянг", "Абингдон",
        "Акапулько", "Аккра", "Альбина", "Абу-Симбел", "Аль-Баха", "Haliwen", "Абуджа",
        "Abau", "Албери", "Албани", "Абердин", "Абердин", "Аба", "Албасет", "Абердин"
    ];

    protected static $citiesEn = [
        "Anaa", "Arrabury", "El Arish", "Annaba", "Apalachicola",
        "Avelino Vieira", "Aachen", "Arraias", "Awaradam, Cayana Airstrip", "Aranuka",
        "Aalborg", "Malamala", "Al Ain", "Anaco", "Houston", "Anapa", null,
        "Apalapsili", "Altai", "Asau", "Surallah", "Araxa", "Al Ghaydah", "Quetzaltenango",
        "Abakan", "Asaba", "Albacete", "Abadan", "Allentown", "Abaiang", "Abingdon",
        "Acapulco", "Accra", "Albina", "Abu Simbel", "Al-Baha", "Ampara", "Abuja",
        "Abau", "Albury", "Albany", "Aberdeen", "Aberdeen", "Abu", "Albacete", "Aberdeen"

    ];

    public static function cityRu()
    {
        return static::randomElement(static::$citiesRu);
    }

    public static function cityEn()
    {
        return static::randomElement(static::$citiesEn);
    }
}
