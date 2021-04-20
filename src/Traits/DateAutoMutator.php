<?php

namespace VRusso\MagicDateMutator\Traits;

use Carbon\Carbon;

trait DateAutoMutator
{

    use \VRusso\TableStructure\Traits\FieldsInfo;

    private static $date_fields;
    private static $table_name;
    private static $database_format;

    public static function bootDateAutoMutator()
    {
        $class_name = get_called_class();
        self::$table_name = with(new $class_name)->getTable();
        self::$database_format = config('magic_date_mutator.database_format');
    }

    private function isDate($field) : bool
    {
        self::$date_fields = self::$date_fields ?: get_called_class()::getAllFieldsWithTypeOf('date');
        return in_array($field, self::$date_fields);
    }

    public function setAttribute($key, $value)
    {
        //@TODO: add datetime conversion
        if($this->isDate($key)) {

            $common_formats = ['d/m/Y','d-m-Y','Y-m-d'];
            foreach($common_formats as $format)
            {
                if(Carbon::canBeCreatedFromFormat($value, $format)) {
                    $value = Carbon::createFromFormat($format, $value)->format(self::$database_format);
                }
            }
//            $this->attributes[$key] = $value;
//            return $this;
        }

        return parent::setAttribute($key, $value);
    }

//    private function setDateOnlyMongo($value, $formats) {
//        if (array_key_exists('date-only', $formats) &&  $formats['date-only'])
//        {
//            if ($this instanceof \Jenssegers\Mongodb\Eloquent\Model)
//            {
//                $value->timezone('UTC')
//                    ->setTime(0,0,0);
//
//                return new \MongoDB\BSON\UTCDateTime($value);
//            }
//        }
//
//        return $value;
//    }

}
